<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2//EN">
<html><head><title>The Xapian Project : CVS</title></head>
<body bgcolor="#FFFFFF" text="#000000">
<?php
include "navbar.php";
print $navbar;
?>
<hr>

<center><h1>CVS</h1></center>

<hr>
<P><B>Note:</B> the Xapian CVS moved from sourceforge to a faster, more reliable
server.  To continue using an already checked out CVS tree, execute this command from the top-level "xapian" directory (the one containing xapian-core, etc):

<pre>
find . -name CVS -type d -print|perl -ne 'chomp;open R,"&gt;$_/Root";print R ":pserver:cvsuser@cvs.xapian.org:/usr/data/cvs\n"'
</pre>

Or for those with CVS write access and accounts on ixion:

<pre>
find . -name CVS -type d -print|perl -ne 'chomp;open R,"&gt;$_/Root";print R "cvs.xapian.org:/usr/data/cvs\n"'
</pre>
<hr>

<P>The Xapian CVS tree (including file history from the original Omsee project)
can be browsed online on the <a
href="http://cvs.xapian.org/">Xapian CVS server</a>.
To get the latest version of Xapian directly from our CVS, follow these steps:
<ol>
<li> Log in anonymously into the CVS: <tt>cvs -d:pserver:cvsuser@cvs.xapian.org:/usr/data/cvs login</tt>
(password is <tt>anonymous</tt>)
<li> Check out the latest version: <tt>cvs -z3 -d:pserver:cvsuser@cvs.xapian.org:/usr/data/cvs co xapian</tt>
<li> In the newly created <tt>xapian/xapian-core</tt>,
    <tt>xapian/xapian-examples</tt>, and
    <tt>xapian/xapian-applications/omega</tt> directories, issue the command
    <tt>./bootstrap</tt> - this will run various developer tools to produce a
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
