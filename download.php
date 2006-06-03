<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
<? include "version.php"; ?>
<head>
<title>The Xapian Project : Downloads</title>
<? include "styleandmeta.php"; ?>
</head>

<body>

<div id="Content">

<h1>Downloads</h1>

<p>The <? echo $branch ?> branch
features a few API changes, the most notable being a rewritten QueryParser
which is reentrant, has encapsulated internals, and parses better than the old
one.  Note that the examples are now a subdirectory of xapian-core, so there
is no longer a separate xapian-examples download (most of the size of the
xapian-examples download was due to configure and other generated files!)
</p>

<p id="<? echo $branch ?>">The latest release is <B><? echo $version ?></B>:</p>

<ul>
<li> <A HREF="http://www.oligarchy.co.uk/xapian/<? echo $version ?>/xapian-core-<? echo $version ?>.tar.gz">xapian-core</A>: the Xapian library itself
<A HREF="http://svn.xapian.org/*checkout*/tags/<? echo $version ?>/xapian-core/NEWS">[news]</A>
<li> <A HREF="http://www.oligarchy.co.uk/xapian/<? echo $version ?>/omega-<? echo $version ?>.tar.gz">omega</A>: Omega - an application built on Xapian, consisting of indexers and a CGI search frontend.
<A HREF="http://svn.xapian.org/*checkout*/tags/<? echo $version ?>/xapian-applications/omega/NEWS">[news]</A>
<li> <A HREF="http://www.oligarchy.co.uk/xapian/<? echo $version ?>/xapian-bindings-<? echo $version ?>.tar.gz">xapian-bindings</A>: SWIG and JNI bindings allowing Xapian to be used from various other programming languages
<A HREF="http://svn.xapian.org/*checkout*/tags/<? echo $version ?>/xapian-bindings/NEWS">[news]</A>
<li> <A HREF="http://search.cpan.org/~kilinrax/Search-Xapian/">Search::Xapian</A>: Perl bindings (on CPAN)</A>
<A HREF="http://search.cpan.org/~kilinrax/Search-Xapian/Changes">[news]</A>
<br>
Note: the latest bindings on CPAN are currently for Xapian 0.9.2, but there are <A HREF="http://article.gmane.org/gmane.comp.search.xapian.general/2919">updated bindings for 0.9.6 available</A>.
</ul>

<h1 id="deb">Debian and Ubuntu packages</h1>

<p>We now supply packages for Debian (stable, testing, and unstable) and Ubuntu
(breezy and dapper).  Here's how to get them.
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
If you're running Ubuntu breezy, add the following:
</p>

<blockquote><code>
deb http://www.xapian.org/debian breezy main<br>
deb-src http://www.xapian.org/debian breezy main
</code></blockquote>

<p>
And if you're running Ubuntu dapper, add the following:
</p>

<blockquote><code>
deb http://www.xapian.org/debian dapper main<br>
deb-src http://www.xapian.org/debian dapper main
</code></blockquote>

<p>
Note that currently only the python bindings are packaged for debian/ubuntu,
and the omega package doesn't perform any
automatic configuration (ideally, it would be possible to configure it
at install time to index, for example, the system documentation).
</p>

<p>
Note also that packages are only currently built for i386 (x86-64 packages
will hopefully be coming soon).  If you're on another
architecture, you can build your own by adding the "deb-src" line above,
then for Debian:
</p>

<blockquote><pre>
<span id="prompt">$</span> su -
<i>enter your root password</i>
<span id="prompt">#</span> apt-get update
<span id="prompt">#</span> apt-get build-dep xapian-core
<span id="prompt">#</span> exit
<span id="prompt">$</span> fakeroot apt-get source -b xapian-core
<span id="prompt">$</span> su -
<i>enter your root password</i>
<span id="prompt">#</span> dpkg -i libxapian* xapian-doc* xapian-tools*
<span id="prompt">#</span> apt-get build-dep xapian-bindings xapian-omega
<span id="prompt">#</span> exit
<span id="prompt">$</span> fakeroot apt-get source -b xapian-bindings xapian-omega
<span id="prompt">$</span> su -
<i>enter your root password</i>
<span id="prompt">#</span> dpkg -i xapian-omega*.deb python2.4-xapian*.deb
<span id="prompt">#</span> exit
</pre></blockquote>

<p>
Or for Ubuntu (Ubuntu doesn't have a root login by default, so you need to
use sudo):
</p>

<blockquote><pre>
<span id="prompt">$</span> sudo apt-get update
<i>enter your root password</i>
<span id="prompt">$</span> sudo apt-get install fakeroot
<span id="prompt">$</span> sudo apt-get build-dep xapian-core
<span id="prompt">$</span> fakeroot apt-get source -b xapian-core
<span id="prompt">$</span> sudo dpkg -i libxapian* xapian-doc* xapian-tools*
<span id="prompt">$</span> sudo apt-get build-dep xapian-bindings xapian-omega
<span id="prompt">$</span> fakeroot apt-get source -b xapian-bindings xapian-omega
<span id="prompt">$</span> sudo dpkg -i xapian-omega*.deb python2.4-xapian*.deb
</pre></blockquote>

<p>
If you want Xapian bindings for a different Python version, change "python2.4"
in the last line to reflect the version you want.  By default packages are
currently built for all Python versions which are packaged for a particular
release.
</p>

<p>
Any assistance (getting these packages into Debian, reporting problems
which aren't noted above or in the TODO lists in each package, or
fixing any of these problems) will be gratefully accepted.
</p>

<h1 id="RPM">RPM packages</h1>

<p>Fabrice Colin has built
<a href="/RPM/">RPM packages for Fedora Core 5</a>
- there are binary packages (for i386, x86_64, and ppc) and source RPMs.</p>

<p>If you have Fedora Core 5, copy <a href="/RPM/xapian.repo">xapian.repo</a>
into <code>/etc/yum/repos.d/</code> and then you can install the packages
using yum:</p>
<blockquote><pre>
<span id="prompt">$</span> su
<i>enter your root password</i>
<span id="prompt">#</span> cd /etc/yum/repos.d
<span id="prompt">#</span> wget http://www.xapian.org/RPM/xapian.repo
<span id="prompt">#</span> yum install xapian-omega xapian-bindings-php xapian-bindings-python xapian-bindings-tcl8
</pre></blockquote>

<p>
The source RPMs (the three files that end in ".src.rpm") are
not distribution specific - you can build binary RPMs from those with:
</p>
<blockquote><pre>
<span id="prompt">$</span> rpmbuild --rebuild
</pre></blockquote>

<p>These RPM-based distributions have their own RPM packages which might
be better tailored:
</p>

<ul>
<li><a href="http://www.altlinux.com/index.php?module=sisyphus&package=xapian">ALT Linux</a></li>
</ul>

<h1>Gentoo packages</h1>

<p>Xapian is in <A HREF="http://gentoo-portage.com/dev-libs/xapian">Gentoo
Portage</A>.</p>

<h1>FreeBSD Ports Collection</h1>

<p>Xapian is in the <A HREF="http://www.freebsd.org/cgi/ports.cgi?query=xapian&stype=name">FreeBSD Ports Collection</A>.</p>

</div>

<?php
include "cssnav.php";
?>

</body>
</html>
