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
<li> <A HREF="http://search.cpan.org/~olly/Search-Xapian/">Search::Xapian</A>: Perl bindings (on CPAN)</A>
<A HREF="http://search.cpan.org/~olly/Search-Xapian/Changes">[news]</A>
<!--
<br>
Note: the latest bindings on CPAN are currently for Xapian 0.9.6, but there are also
<A HREF="http://www.oligarchy.co.uk/xapian/trunk/Search-Xapian-0.9.9.0.tar.gz">updated bindings for 0.9.9 available</A>.
-->
</ul>

<p>The wiki contains a <a href="http://wiki.xapian.org/ReleaseNotes">summary of bugs, patches, and workarounds</a>
relating to the latest release.
</p>

<h1 id="deb">Debian and Ubuntu packages</h1>

<p>We now supply packages for Debian (stable, testing, and unstable) and Ubuntu
(dapper and edgy).  These packages have now been
accepted into the Debian archive, so if you're using testing or unstable you
can install them as you would any other Debian package (and they should be
part of the next Debian release "etch" too).  For Debian stable and Ubuntu, here's how
to get them from the xapian.org package repository:
</p>

<p>If you're running Debian stable add the following to your sources.list:
</p>

<blockquote><code>
deb http://www.xapian.org/debian stable main<br>
deb-src http://www.xapian.org/debian stable main
</code></blockquote>

<!--
<p>
If you're running Debian testing (and the packages haven't propagated in
Debian yet), add the following:
</p>

<blockquote><code>
deb http://www.xapian.org/debian unstable main<br>
deb-src http://www.xapian.org/debian unstable main
</code></blockquote>
-->

<p>
If you're running Ubuntu dapper, add the following:
</p>

<blockquote><code>
deb http://www.xapian.org/debian dapper main<br>
deb-src http://www.xapian.org/debian dapper main
</code></blockquote>

<p>
Ubuntu edgy has xapian-core packages (version 0.9.6-5), but not xapian-omega
or xapian-bindings.  If you're running Ubuntu edgy and want either of the
latter two, or just a newer xapian-core, add the following:
</p>

<blockquote><code>
deb http://www.xapian.org/debian edgy main<br>
deb-src http://www.xapian.org/debian edgy main
</code></blockquote>

<p>
The development version of Ubuntu (feisty) has all the xapian packages which
should get regularly updated from those in Debian unstable, so we don't
currently provide our own packages for feisty.  Once feisty is released we'll
probably provide backported packages of the latest version of Xapian.
</p>

<p>
Currently the Python, PHP, ruby, and tcl bindings are packaged for
Debian and Ubuntu.  The Perl, C#, and Java bindings aren't yet packaged.
</p>

<p>
Binary packages are currently built for i386 and amd64.  If you're on another
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
<span id="prompt">#</span> dpkg -i xapian-omega*.deb python-xapian*.deb
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
<span id="prompt">$</span> sudo dpkg -i xapian-omega*.deb python-xapian*.deb
</pre></blockquote>

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
<li><a href="http://www.altlinux.com/index.php?module=sisyphus&package=xapian">ALT Linux RPMs</a> of xapian-core only</li>
<li><a href="http://software.opensuse.org/download/server:/search/">SuSE RPMs</a> of xapian-core and omega
(and <a href="http://en.opensuse.org/Build_Service/User">instructions for use</a>)</li>
</ul>

<h1>Other Linux Distributions</h1>

<ul>
<li>Gentoo Portage has ebuilds for
<a HREF="http://gentoo-portage.com/dev-libs/xapian">xapian-core</a> and
<a HREF="http://gentoo-portage.com/dev-libs/xapian-bindings">xapian-bindings</a>
</li>
<li>FrugalWare Linux has packaged <a href="http://www.frugalware.org/packages/14387">xapian-core</a>.
</li>
<li>Zenwalk Linux has packaged <a href="http://users.zenwalk.org/user-accounts/oskar/pinot/">xapian-core</a>
(<a href="http://users.zenwalk.org/user-accounts/oskar/source/">sources</a>).
</ul>

<h1>FreeBSD Ports Collection</h1>

<p>Xapian is in the <A HREF="http://www.freshports.org/databases/xapian-core/">FreeBSD Ports Collection</A>.</p>

<h1>Cygwin</h1>

<p>
Reini Urban has put together
<a href="http://rurban.xarch.at/software/cygwin/contrib/xapian/">Cygwin packages</a>
for xapian-core and omega.  He's working on packaging the bindings too.
</p>

<h1>Compiling on MS Windows with MSVC</h1>

<p>You can download <a
href="http://www.lemurconsulting.com/Products/Xapian/Overview.shtml">makefiles for
compiling with MSVC</a>, originally put together by Ulrik Petersen, and further
refined and currently maintained by Charlie Hull.</p>

</div>

<?php
include "cssnav.php";
?>

</body>
</html>
