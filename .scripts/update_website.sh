#!/bin/bash

# This script builds the website by checking it out from CVS.
# It will be run hourly, so should not automatically involve any operations
# (such as building the documentation) which are going to be very costly.
# We implement such operations in a lazy way, only performing them when
# the source data has changed.
#
# Everything in the CVS module "www.xapian.org" will be put onto the website,
# except for things in "www.xapian.org/.scripts", such as this script.

set -e

# FIXME : need to avoid having to update this...
tarball="/usr/data/www/oligarchy.co.uk/xapian/0.8.1/xapian-core-0.8.1.tar.gz"

projectdir="/u1/olly/xapian-website-update"
cvsdir=":pserver:cvsuser:anonymous@cvs.xapian.org:/usr/data/cvs"
cvsmodule="www.xapian.org"
htmldir="/usr/data/www/xapian.org"

tmpdir="${projectdir}/mkwebsite_$$"
excludedir="${tmpdir}/${cvsmodule}/.scripts"

# Where this script resides in CVS
scriptpath_cvs="${tmpdir}/${cvsmodule}/.scripts/update_website.sh"
# Where this script is running from
scriptpath_active="${projectdir}/update_website.sh"

###

# Prepare temporary directory
rm -rf "$tmpdir"
mkdir -p "$tmpdir"
chmod go= "$tmpdir"
chmod g+rws "$tmpdir"

# Check website out of CVS
cd "$tmpdir"
umask 0002
cvs -Ql -d "$cvsdir" export -r HEAD "$cvsmodule"
if ! cmp "$scriptpath_cvs" "$scriptpath_active" >/dev/null 2>&1 ; then
  # copy new version of script ready to replace old version
  cp -a "$scriptpath_cvs" "${scriptpath_active}_new" >/dev/null 2>&1
  mv "${scriptpath_active}_new" "$scriptpath_active"
  exec "$scriptpath_active"
  exit 1
fi

mkdir "${cvsmodule}/docs"
tardir="`echo \"$tarball\"|sed 's!.*/!!;s/\.tar\.gz//'`"
cd "$projectdir"
if test "$tarball" -nt stamp-unpacked-tarball ; then
  rm -rf "$tardir"
  tar zxf "$tarball"
  chmod go= "$tardir"
  chmod g+rws "$tardir"
  touch stamp-unpacked-tarball
fi
cp -a "$tardir"/docs/*.html "$tmpdir/$cvsmodule/docs"
mkdir "$tmpdir/$cvsmodule/docs/apidoc" 2> /dev/null || :
cp -a "$tardir"/docs/apidoc/html "$tmpdir/$cvsmodule/docs/apidoc"
if test stamp-unpacked-tarball -nt stamp-run-ps2pdf ; then
  ps2pdf12 "$tardir"/docs/apidoc.ps apidoc.pdf
  touch stamp-run-ps2pdf
fi
cp -a apidoc.pdf "$tmpdir/$cvsmodule/docs"
if test stamp-unpacked-tarball -nt stamp-built-sourcedoc ; then
  cd "$tardir"
  ./configure --enable-maintainer-mode
  cd docs
  make doxygen_source_docs
  cd "$projectdir"
  touch stamp-built-sourcedoc
fi
mkdir "$tmpdir/$cvsmodule/docs/sourcedoc" 2> /dev/null || :
cp -a "$tardir"/docs/sourcedoc/html "$tmpdir/$cvsmodule/docs/sourcedoc"
cd "$tmpdir"

chmod -R g+rw "${tmpdir}"

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

# rebuild omega's database
# FIXME: sort out permissions so this'll work for other people too
rm -rf /u1/olly/omega/data6/default.tmp /u1/olly/omega/data6/default.old
LD_LIBRARY_PATH=/u1/olly/install-0.6/lib /u1/olly/install-0.6/bin/omindex --db /u1/olly/omega/data6/default.tmp --url / /usr/data/www/xapian.org
mv /u1/olly/omega/data6/default /u1/olly/omega/data6/default.old
mv /u1/olly/omega/data6/default.tmp /u1/olly/omega/data6/default
# keep it just in case! rm -rf /u1/olly/omega/data6/default.old

# return successfully.
exit 0
