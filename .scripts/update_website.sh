#! /bin/sh

# This script builds the website by checking it out from CVS.
# It will be run hourly, so should not involve any operations
# (such as building the documentation) which are going to be
# very costly.
#
# Everything in the CVS module "website" will be put onto the website,
# except for things in "website/.scripts", such as this script.

projectdir="/home/groups/x/xa/xapian"
cvsdir=":pserver:anonymous@cvs1:/cvsroot/xapian"
cvsmodule="website"

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
cvs -Ql -d "${cvsdir}" export -r HEAD "${cvsmodule}"

# copy new version of script ready to replace old version, and remove other
# stuff to be excluded.
cp -a "${scriptpath_cvs}" "${scriptpath_active}_new" >/dev/null 2>&1 
rm -rf "${excludedir}"

# update website with new image: rsync is good. :)
rsync -a -r -C --delete --delete-after "${tmpdir}/${cvsmodule}/" "${htmldir}"

# Clean up temporary directory.
rm -rf "${tmpdir}"

# put new script in place.
mv "${scriptpath_active}_new" "${scriptpath_active}" >/dev/null 2>&1 

# return successfully.
exit 0;
