<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2//EN">
<html><head><title>The Xapian Project : CVS</title></head>
<body bgcolor="#FFFFFF" text="#000000">
<?php
include "navbar.php";
print $navbar;
?>
<hr>

<center><h1>CVS</h1></center>

<P>The Xapian CVS tree (including file history from the original Omsee project)
can be browsed online on the <a
href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/xapian/">Xapian CVS server</a>.
To get the latest version of Xapian directly from our CVS, follow these steps:
<ol>
<li> Log in anonymously into the CVS: <tt>cvs -d:pserver:anonymous@cvs.xapian.org:/cvsroot/xapian login</tt>
(Just hit return when you are asked for the password.)
<li> Check out the latest version: <tt>cvs -z3 -d:pserver:anonymous@cvs.xapian.org:/cvsroot/xapian co xapian</tt>
<li> In the newly created <tt>xapian/xapian-core</tt>,
    <tt>xapian/xapian-examples</tt>, and
    <tt>xapian/xapian-applications/omega</tt> directories, issue the command
    <tt>./buildall</tt> - this will run various developer tools to produce a
    source tree like you'd get from unpacking a release source tarball.
</ol>
<p>
We plan to set up an automatic snapshot system which will try to compile and
run the library testsuite ever night, and upload a snapshot if all tests pass.
This is not currently operational though.

<hr>
<?=$navbar ?>
</body>
</html>
