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

<p>The <A HREF="#0.7">0.7 branch</A>
features various API changes from earlier versions (notably everything is now in
a Xapian namespace, rather than having an Om or om_ prefix).  But you should
be able to build and use code written for the old API without making
any changes by using the supplied om/om.h compatibility header.</p>

<p>The latest release is <A HREF="news.php#0.7.5">0.7.5</A>
(xapian-examples hasn't changed since 0.7.3
so we've not repackaged it solely to bump the version;
similarly xapian-bindings hasn't changed since 0.7.4):</p>

<ul>
<li> <A HREF="http://www.tartarus.org/~olly/xapian-0.7/xapian-core-0.7.5.tar.gz">xapian-core</A>: the Xapian library itself
<li> <A HREF="http://www.tartarus.org/~olly/xapian-0.7/xapian-examples-0.7.3.tar.gz">xapian-examples</A>: small example programs
<li> <A HREF="http://www.tartarus.org/~olly/xapian-0.7/omega-0.7.5.tar.gz">omega</A>: Omega - an application built on Xapian, consisting of indexers and a CGI search frontend.
<li> <A HREF="http://www.tartarus.org/~olly/xapian-0.7/xapian-bindings-0.7.4.tar.gz">xapian-bindings</A>: SWIG bindings allowing Xapian to be used from various scripting languages
</ul>

</div>

<?php
include "cssnav.php";
?>

</body>
</html>
