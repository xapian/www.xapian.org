<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
<title>The Xapian Project : Downloads</title>
<? include "styleandmeta.php"; ?>
</head>

<body>

<div id="Content">

<h1>Downloads</h1>

<p>The 0.8 branch
features greatly improved database update speed with quartz, improved
compression of quartz termlist tables, many improvements to the documentation,
many portability improvements, and new bindings allowing Xapian to be used
from Java and TCL.</p>

<p id="0.8">The latest release is <B>0.8.1</B> (all
users of 0.8.0 should definitely upgrade):</p>

<ul>
<li> <A HREF="http://www.oligarchy.co.uk/xapian/0.8.1/xapian-core-0.8.1.tar.gz">xapian-core</A>: the Xapian library itself
<A HREF="http://cvs.xapian.org/xapian/xapian-core/NEWS?rev=v0-8-1">[news]</A>
<li> <A HREF="http://www.oligarchy.co.uk/xapian/0.8.1/xapian-examples-0.8.1.tar.gz">xapian-examples</A>: small example programs
<A HREF="http://cvs.xapian.org/xapian/xapian-examples/NEWS?rev=v0-8-1">[news]</A>
<li> <A HREF="http://www.oligarchy.co.uk/xapian/0.8.1/omega-0.8.1.tar.gz">omega</A>: Omega - an application built on Xapian, consisting of indexers and a CGI search frontend.
<A HREF="http://cvs.xapian.org/xapian/xapian-applications/omega/NEWS?rev=v0-8-1">[news]</A>
<li> <A HREF="http://www.oligarchy.co.uk/xapian/0.8.1/xapian-bindings-0.8.1.tar.gz">xapian-bindings</A>: SWIG and JNI bindings allowing Xapian to be used from various other languages
<A HREF="http://cvs.xapian.org/xapian/xapian-bindings/NEWS?rev=v0-8-1">[news]</A>
</ul>

<h1>Debian packages</h1>

<p>We now supply Debian packages.  Here's how to get them.
</p>

<p>If you're running Debian stable add the following to your sources.list:
</p>

<blockquote><code>
deb http://www.xapian.org/debian stable main<br>
deb-src http://www.xapian.org/debian stable main
</code></blockquote>

<p>
If you're running Debian unstable or testing, add the following:
</p>

<blockquote><code>
deb http://www.xapian.org/debian unstable main<br>
deb-src http://www.xapian.org/debian unstable main
</code></blockquote>

<p>
Note that these packages are still incomplete: while they should work
well enough for most purposes, they fail lintian tests due to manpages
for some of the binaries being missing.  In addition, only the python
bindings are packaged so far, and the omega package doesn't perform any
automatic configuration (ideally, it would be possible to configure it
at install time to index, for example, the system documentation).
There are also some other lintian failure with the stable packages,
which don't look serious but need addressing.
</p>

<p>
Note also that packages are only built for i386.  If you're on another
architecture, you can build your own by adding the "deb-src" line above,
then:
</p>

<blockquote><code>
# su -<br>
# apt-get update<br>
# apt-get build-dep xapian-core<br>
# exit<br>
$ fakeroot apt-get source -b xapian-core<br>
# su -<br>
# dpkg -i libxapian2* libxapian-dev* xapian-doc* xapian-tools*<br>
# apt-get build-dep xapian-bindings xapian-omega<br>
# exit<br>
$ fakeroot apt-get source -b xapian-bindings xapian-omega
</code></blockquote>

<p>
If you're on stable, you'll need to install a swig 1.3.20 or later from
<a href="http://www.backports.org/package.php?search=swig">backports.org</a>.
</p>

<p>Any assistance (getting these packages into Debian, reporting problems
which aren't listed above or in the TODO lists in each package, or
fixing any of these problem) will be gratefully accepted.
</p>

</div>

<?php
include "cssnav.php";
?>

</body>
</html>
