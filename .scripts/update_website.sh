#!/bin/bash

# This script builds the website by checking it out from CVS.
# It will be run hourly, so should not involve any operations
# (such as building the documentation) which are going to be
# very costly.
#
# Everything in the CVS module "www.xapian.org" will be put onto the website,
# except for things in "www.xapian.org/.scripts", such as this script.

set -e

# FIXME : need to avoid having to update this...
tarball="xapian-core-0.5.3.tar.gz"

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
rm -rf "$tmpdir"
mkdir -p "$tmpdir"
chmod go= "$tmpdir"
chmod g+s "$tmpdir"

# Check website out of CVS
cd "$tmpdir"
umask 0002
cvs -Ql -d "$cvsdir" export -r HEAD "$cvsmodule"
if ! cmp "$scriptpath_cvs" "$scriptpath_active" ; then
  # copy new version of script ready to replace old version
  cp -a "$scriptpath_cvs" "${scriptpath_active}_new" >/dev/null 2>&1
  mv "${scriptpath_active}_new" "$scriptpath_active"
  exec "$scriptpath_active"
  exit 1
fi

mkdir "${cvsmodule}/docs"
tardir="`echo \"$tarball\"|sed 's/\.tar\.gz//'`"
cd "$projectdir"
if "$tarball" -nt stamp-unpacked-tarball ; then
  rm -rf "$tardir"
  tar zxf "$tarball"
  chmod go= "$tardir"
  chmod g+s "$tardir"
  touch stamp-unpacked-tarball
fi
cp -a "$tardir"/docs/*.html "$tardir"/docs/apidoc "${cvsmodule}/docs"
if stamp-unpacked-tarball -nt stamp-run-ps2pdf ; then
  ps2pdf12 "$tardir"/docs/apidoc.ps apidoc.pdf
  touch stamp-run-ps2pdf
fi
cp -a apidoc.pdf "${cvsmodule}/docs"
#if stamp-unpacked-tarball -nt stamp-built-sourcedoc ; then
#  cd "$tardir"
#  # no compiler on sf web server, so configure fails!
#  # FIXME is there any easy may around this?
#  ./configure 
#  cd docs
#  make doxygen_source_docs
#  cd "$tardir"
#  touch stamp-built-sourcedoc
#fi
#cp -a "$tardir"/docs/sourcedoc "${cvsmodule}/docs"
cd "$tmpdir"

chmod -R g+w "${tmpdir}"

# remove other stuff to be excluded.
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
