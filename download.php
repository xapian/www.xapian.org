<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2//EN">
<html><head><title>The Xapian Project : Downloads</title></head>
<body bgcolor="#FFFFFF" text="#000000">
<?php
include "navbar.php";
print $navbar;
?>
<hr>

<center><h1>Downloads</h1></center>

The 0.6 branch features improved compression in the quartz database backend
(~20% smaller), but it can't read databases produced by 0.5.X or earlier.
Also the stemmers have been updated to Martin Porter's Snowball stemmers,
which give better (but therefore different) results.  Both of these mean
you'll need to rebuild your database when upgrading to 0.6 or later.

<P>
The revised quartz format shouldn't change further for a while
(and when it does, the old format will be supported), but the API is also
being cleaned up, and this work is not yet complete.  If you use omega
unmodified, this doesn't matter to you.  If you've written your own code,
you may wish to stay with 0.5.X and update it just once when the API changes
are complete.

<h2>0.5.4</h2>

The latest 0.5.X series release version is 0.5.5.  There are 3 tarballs
(xapian-examples hasn't changed since 0.5.1
so we've not uploaded just to bump the version):

<ul>
<li> <A HREF="http://www.tartarus.org/~olly/xapian-0.5.5/xapian-core-0.5.5.tar.gz">xapian-core</A>: the Xapian library itself
<li> <A HREF="http://www.tartarus.org/~olly/xapian-0.5.1/xapian-examples-0.5.1.tar.gz">xapian-examples</A>: small example programs
<li> <A HREF="http://www.tartarus.org/~olly/xapian-0.5.5/omega-0.5.5.tar.gz">omega</A>: Omega - an application built on Xapian, consisting of indexers and
a CGI search frontend.
</ul>

<h2>0.6.3</h2>

The latest release is 0.6.3:

<ul>
<li> <A HREF="http://www.tartarus.org/~olly/xapian-0.6/xapian-core-0.6.3.tar.gz">xapian-core</A>: the Xapian library itself
<li> <A HREF="http://www.tartarus.org/~olly/xapian-0.6/xapian-examples-0.6.3.tar.gz">xapian-examples</A>: small example programs
<li> <A HREF="http://www.tartarus.org/~olly/xapian-0.6/omega-0.6.3.tar.gz">omega</A>: Omega - an application built on Xapian, consisting of indexers and
a CGI search frontend.
</ul>

<hr>
<?=$navbar ?>
</body>
</html>
