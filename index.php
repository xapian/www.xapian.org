<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
<? include "version.php"; ?>
<head>
<title>The Xapian Project</title>
<? include "styleandmeta.php"; ?>
</head>

<body>

<div id="Content">

<img src="xapian-logo.png" alt="The Xapian Project">

<p>Welcome to the Xapian project website.</p>

<p>Xapian is an Open Source Probabilistic Information Retrieval library,
released under the GPL.  It's written in C++, with bindings to allow use
from other languages (Perl, Python, PHP, Java, TCL, and C# are currently
supported).</p>

<p>Xapian is designed to be a highly adaptable toolkit to allow developers
to easily add advanced indexing and search facilities to their own
applications.</p>

<p>If you're after a packaged search engine for your website, you
should take a look at Omega, which is an application we supply built upon
Xapian.  But unlike most other website search solutions, Xapian's
versatility allows you to extend Omega to meet your needs as they grow.</p>

<p>The <a href="download.php">latest stable version is <?echo $version;?></a>,
released on <?echo $release_date;?>.

</div>

<?php
include "cssnav.php";
?>

</body>
</html>
