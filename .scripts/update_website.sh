#!/bin/bash

# This script rebuilds the website by checking it out from CVS.
#
# We want to be able to run this script from cron (though we don't currently)
# so it should not unconditionally involve any operations (such as building the
# documentation) which are going to be very costly.
#
# To avoid this we implement such operations in a lazy way, only performing
# them when the source data has changed.
#
# Everything in the CVS module "www.xapian.org" will be put onto the website,
# except for things in "www.xapian.org/.scripts", such as this script.

set -e

projectdir="/u1/olly/xapian-website-update"
#cvsdir=":pserver:cvsuser:anonymous@cvs.xapian.org:/usr/data/cvs"
cvsdir="/usr/data/cvs"
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

version=`sed 's/.*version *= *"\([0-9.]*\)".*/\1/p;d' ${tmpdir}/${cvsmodule}/version.php`

echo "Latest Xapian release is $version"

tarball="/usr/data/www/oligarchy.co.uk/xapian/$version/xapian-core-$version.tar.gz"
if ! test -r $tarball ; then
  echo "$0: Latest release tarball doesn't exist: '$tarball'"
  exit 1
fi

mkdir "${cvsmodule}/docs"
tardir=`echo "$tarball"|sed 's!.*/!!;s/\.tar\.gz//'`
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
cp -a "$tardir"/docs/apidoc.pdf "$tmpdir/$cvsmodule/docs"
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

tarball="/usr/data/www/oligarchy.co.uk/xapian/$version/xapian-omega-$version.tar.gz"
if ! test -r $tarball ; then
  echo "$0: Latest release tarball doesn't exist: '$tarball'"
  exit 1
fi

tardir=`echo "$tarball"|sed 's!.*/!!;s/\.tar\.gz//'`
if test "$tarball" -nt stamp-unpack-omega-tarball ; then
  rm -rf "$tardir"
  tar zxf "$tarball"
  chmod go= "$tardir"
  chmod g+rws "$tardir"
  touch stamp-unpacked-omega-tarball
fi
mkdir "$tmpdir/$cvsmodule/docs/omega"
cp -a "$tardir"/docs/*.txt "$tmpdir/$cvsmodule/docs/omega"

tarball="/usr/data/www/oligarchy.co.uk/xapian/$version/xapian-bindings-$version.tar.gz"
if ! test -r $tarball ; then
  echo "$0: Latest release tarball doesn't exist: '$tarball'"
  exit 1
fi

tardir=`echo "$tarball"|sed 's!.*/!!;s/\.tar\.gz//'`
if test "$tarball" -nt stamp-unpack-bindings-tarball ; then
  rm -rf "$tardir"
  tar zxf "$tarball"
  chmod go= "$tardir"
  chmod g+rws "$tardir"
  touch stamp-unpacked-bindings-tarball
fi
mkdir "$tmpdir/$cvsmodule/docs/bindings"
for l in python php ruby tcl8 csharp ; do
  mkdir "$tmpdir/$cvsmodule/docs/bindings/$l"
  cp -a "$tardir/$l"/docs/* "$tmpdir/$cvsmodule/docs/bindings/$l"
done

cd "$tmpdir"

chmod -R g+rw "${tmpdir}"

# remove other stuff to be excluded.
rm -rf "${excludedir}"

# update website with new image: rsync is good. :)
# don't delete: we want to be able to upload files, and/or autogenerate
# files.
# FIXME: set it up to delete except for in certain directories which are
# generated, 
# rsync -a -C --delete --delete-after "${tmpdir}/${cvsmodule}/"* "${htmldir}/"
rsync -a -C "${tmpdir}/${cvsmodule}/"* "${htmldir}/"

# Clean up temporary directory.
rm -rf "${tmpdir}"

# rebuild omega's database
# FIXME: sort out permissions so this'll work for other people too
rm -rf /u1/olly/omega/data/default.tmp /u1/olly/omega/data/default.old

/u1/olly/install/bin/omindex --db /u1/olly/omega/data/default.tmp --url / /usr/data/www/xapian.org

mv /u1/olly/omega/data/default /u1/olly/omega/data/default.old
mv /u1/olly/omega/data/default.tmp /u1/olly/omega/data/default
# keep it just in case! rm -rf /u1/olly/omega/data/default.old

# return successfully.
exit 0
