#! /bin/sh

# This script builds the website by checking it out from CVS.
# It will be run hourly, so should not involve any operations
# (such as building the documentation) which are going to be
# very costly.
#
# Everything in the CVS module "website" will be put onto the website,
# except for things in "website/.scripts", such as this script.

set -e

projectdir="/home/groups/x/xa/xapian"
cvsdir=":pserver:anonymous@cvs1:/cvsroot/xapian"
cvsmodule="www.xapian.org"

tmpdir="${projectdir}/mkwebsite_$$"
htmldir="${projectdir}/htdocs"
excludedir="${tmpdir}/${cvsmodule}/.scripts"

# Where this script resides in CVS
scriptpath_cvs="${tmpdir}/${cvsmodule}/.scripts/update_website.sh"
# Where this script is running from
scriptpath_active="${projectdir}/update_website.sh"


######################
# BEGIN doing things


# Prepare temporary directory
rm -rf "${tmpdir}"
mkdir -p "${tmpdir}"
chmod go= "${tmpdir}"
chmod g+s "${tmpdir}"

# Check website out of CVS
cd "${tmpdir}"
umask 0002
cvs -Ql -d "${cvsdir}" export -r HEAD "${cvsmodule}"
cvs -Ql -d "${cvsdir}" export -r HEAD "xapian/xapian-core"
cd xapian/xapian-core
./buildall
./configure
cd docs
make
make doxygen_source_docs
mkdir "${tmpdir}/${cvsmodule}/docs"
mv *.html apidoc sourcedoc "${tmpdir}/${cvsmodule}/docs" 
cd ../../..
rm -rf xapian

chmod -R g+w "${tmpdir}"

# copy new version of script ready to replace old version, and remove other
# stuff to be excluded.
cp -a "${scriptpath_cvs}" "${scriptpath_active}_new" >/dev/null 2>&1 
rm -rf "${excludedir}"

# update website with new image: rsync is good. :)
# don't delete: we want to be able to upload files, and/or autogenerate
# files.
# FIXME: set it up to delete except for in certain directories which are
# generated, 
# rsync -a -r -C --delete --delete-after "${tmpdir}/${cvsmodule}/"* "${htmldir}/"
rsync -a -r -C "${tmpdir}/${cvsmodule}/"* "${htmldir}/"

# Clean up temporary directory.
rm -rf "${tmpdir}"

# put new script in place.
mv "${scriptpath_active}_new" "${scriptpath_active}" >/dev/null 2>&1 

# return successfully.
exit 0
