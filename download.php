<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2//EN">
<html><head><title>The Xapian Project : Downloads</title></head>
<body bgcolor="#FFFFFF" text="#000000">
<?php
include "navbar.php";
print $navbar;
?>
<hr>

<center><h1>Downloads</h1></center>

The quartz backend is undergoing major changes in the 0.6 series, so you may
need to rebuild your databases after installing each 0.6.X release.  If you're
just experimenting with Xapian, or developing an application, this is unlikely
to be a problem.  If you have a large deployed system, you may wish to stick
with 0.5.X until 0.7.0, then you'll have to rebuild just once.

<h2>0.5.4</h2>

The latest 0.5.X series release version is 0.5.4.  There are 3 tarballs
(xapian-examples hasn't changed since 0.5.1, and omega hasn't changed since
0.5.3 so we've not uploaded just to bump the version):

<ul>
<li> <A HREF="http://www.tartarus.org/~olly/xapian-0.5.3/xapian-core-0.5.3.tar.gz">xapian-core</A>: the Xapian library itself
<li> <A HREF="http://www.tartarus.org/~olly/xapian-0.5.1/xapian-examples-0.5.1.tar.gz">xapian-examples</A>: small example programs
<li> <A HREF="http://www.tartarus.org/~olly/xapian-0.5.3/omega-0.5.3.tar.gz">omega</A>: Omega - an application built on Xapian, consisting of indexers and
a CGI search frontend.
</ul>

<h2>0.6.1</h2>

The latest release is 0.6.1 (xapian-examples and omega haven't changed, so
are still at 0.6.0):

<ul>
<li> <A HREF="http://www.tartarus.org/~olly/xapian-0.6/xapian-core-0.6.1.tar.gz">xapian-core</A>: the Xapian library itself
<li> <A HREF="http://www.tartarus.org/~olly/xapian-0.6/xapian-examples-0.6.0.tar.gz">xapian-examples</A>: small example programs
<li> <A HREF="http://www.tartarus.org/~olly/xapian-0.6/omega-0.6.0.tar.gz">omega</A>: Omega - an application built on Xapian, consisting of indexers and
a CGI search frontend.
</ul>

<hr>
<?=$navbar ?>
</body>
</html>
