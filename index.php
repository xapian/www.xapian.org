<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2//EN">
<html><head><title>The Xapian Project</title></head>
<body bgcolor="#FFFFFF" text="#000000">
<?php
include "navbar.php";
print $navbar;
?>
<hr>

<center><h1>The Xapian Project</h1></center>
Welcome to the Xapian project website.

<P>Xapian is an Open Source Probabilistic Information Retrieval library,
released under the GPL.  It's written in C++, and bindings are under development
to allow use from other languages (Perl and Python are working; PHP, Java,
Guile, and Tcl need more work).

<P>Xapian is designed to be a highly adaptable toolkit to allow developers
to easily add advanced indexing and search facilities to applications.

<P>If you're after a packaged "search engine" to search your website, you
should take a look at Omega, which is an application we supply built upon
Xapian.  But unlike most other website search solutions, Xapian's
versatility allows you to extend Omega to meet your needs as they grow.

<P>
<FORM METHOD=GET ACTION="omega.cgi">
Search the Xapian website:<br>
<INPUT NAME=P SIZE=32> <INPUT TYPE=submit VALUE=Search BORDER=0>
</FORM>

<hr>
<?=$navbar ?>
</body>
</html>
