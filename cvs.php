<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
<title>The Xapian Project : CVS</title>
<? include "styleandmeta.php"; ?>
</head>

<body>

<div id="Content">

<h1>CVS</h1>

<p>The Xapian CVS tree (including file history from the original Omsee project)
can be browsed online on the <a
href="http://cvs.xapian.org/xapian/">Xapian CVS server</a>.
To get the latest version of Xapian directly from our CVS, follow these steps:</p>
<ol>
<li> Check out the latest version:
 <ul>
<!-- Sadly not all versions of CVS support putting the password in like this:
<tt>cvs -z3 -d:pserver:cvsuser:anonymous@cvs.xapian.org:/usr/data/cvs co xapian</tt>
-->
<!-- Further sadness - this doesn't work portably either:
 <li> <tt>echo anonymous|cvs -z3 -d:pserver:cvsuser@cvs.xapian.org:/usr/data/cvs login</tt>
-->
 <li> <tt>cvs -z3 -d:pserver:cvsuser@cvs.xapian.org:/usr/data/cvs login</tt>
 <li> enter the password <tt>anonymous</tt>
 <li> <tt>cvs -z3 -d:pserver:cvsuser@cvs.xapian.org:/usr/data/cvs co xapian</tt>
</ul>
<li> In the newly created <tt>xapian</tt>
    directory, run the command <tt>./bootstrap</tt> - this will run various
    developer tools to produce a
    source tree like you'd get from unpacking release source tarballs.
</ol>
<p>
We plan to set up an automatic snapshot system which will try to compile and
run the library testsuite every night, and upload a snapshot if all tests pass.
This is not currently operational, but you can
<A HREF="http://www.tartarus.org/~olly/HEAD/">download completely untested
CVS snapshots</A>,
which are generated every 20 minutes (so long as the code in CVS isn't too
broken for even "make dist" to work).</p>

</div>

<?php
include "cssnav.php";
?>

</body>
</html>
