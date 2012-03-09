<? include "niceurl.php"; ?>
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

<div style="padding:1em;background-color:#dff;border:1px solid #999;
      font:13px/18px verdana, arial, helvetica, sans-serif;">
Xapian will apply to take part in <a href="http://code.google.com/soc/">Google's Summer of Code</a> this year - here's our <a href="http://trac.xapian.org/wiki/GSoCProjectIdeas">list of project ideas</a>.
</div>
<br>

<p>Welcome to the Xapian project website.</p>

<p>Xapian is an Open Source Search Engine Library, released under the
<a href="http://www.opensource.org/licenses/gpl-license.php">GPL</a>.
It's written in <a href="/docs/apidoc/html/annotated.html">C++</a>,
with bindings to allow use from
<a href="/docs/bindings/perl/Search/Xapian.html">Perl</a>,
<a href="/docs/bindings/python/">Python</a>,
<a href="/docs/bindings/php/">PHP</a>,
<a href="http://svn.xapian.org/trunk/xapian-bindings/java/README?revision=HEAD" xhref="/docs/bindings/java/">Java</a>,
<a href="/docs/bindings/tcl8/">Tcl</a>,
<a href="/docs/bindings/csharp/">C#</a>,
<a href="/docs/bindings/ruby/">Ruby</a> and
<a href="/docs/bindings/lua/">Lua</a> (so far!)</p>

<p>Xapian is a highly adaptable toolkit which allows developers
to easily add advanced indexing and search facilities to their own
applications.  It supports the Probabilistic Information Retrieval
model and also supports a rich set of boolean query operators.</p>

<p>If you're after a packaged search engine for your website, you
should take a look at <a href="/docs/omega/overview.html">Omega</a>:
an application we supply built upon
Xapian.  Unlike most other website search solutions, Xapian's
versatility allows you to extend Omega to meet your needs as they grow.</p>

<p>The <a href="<?echo $announce;?>">latest stable version is <?echo $version;?></a>,
released on <?echo $release_date;?>.</p>

<?if ($version_o !== null) {?>
<p>The <a href="<?echo $announce_o;?>"
>latest <?echo $branch_o;?> release is <?echo $version_o;?></a>,
released on <?echo $release_date_o;?>.</p>
<?}?>

<?if ($version_d !== null) {?>
<p>The <a href="<?echo $announce_d;?>"
>latest development version is <?echo $version_d;?></a>,
released on <?echo $release_date_d;?>.</p>
<?}?>

</div>

<?php
include "cssnav.php";
?>

</body>
</html>
