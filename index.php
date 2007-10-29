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

<p>Xapian is an Open Source Search Engine Library, released under the
<a href="http://www.opensource.org/licenses/gpl-license.php">GPL</a>.
It's written in <a href="/docs/apidoc/html/annotated.html">C++</a>,
with bindings to allow use from
<a href="http://svn.xapian.org/README?revision=HEAD&root=Search-Xapian" xhref="/docs/bindings/perl/">Perl</a>,
<a href="/docs/bindings/python/">Python</a>,
<a href="/docs/bindings/php/">PHP</a>,
<a href="http://svn.xapian.org/trunk/xapian-bindings/java/README?revision=HEAD" xhref="/docs/bindings/java/">Java</a>,
<a href="/docs/bindings/tcl8/">Tcl</a>,
<a href="/docs/bindings/csharp/">C#</a> and
<a href="/docs/bindings/ruby/">Ruby</a> (so far!)</p>

<p>Xapian is a highly adaptable toolkit which allows developers
to easily add advanced indexing and search facilities to their own
applications.  It supports the Probabilistic Information Retrieval
model and also supports a rich set of boolean query operators.</p>

<p>If you're after a packaged search engine for your website, you
should take a look at Omega: an application we supply built upon
Xapian.  Unlike most other website search solutions, Xapian's
versatility allows you to extend Omega to meet your needs as they grow.</p>

<p>The <a href="download.php">latest stable version is <?echo $version;?></a>,
released on <?echo $release_date;?>.

</div>

<?php
include "cssnav.php";
?>

</body>
</html>
