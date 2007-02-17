<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
<title>The Xapian Project : Mailing Lists</title>
<? include "styleandmeta.php"; ?>
</head>

<body>

<div id="Content">

<h1>Mailing Lists</h1>

<p>There are three mailing lists relating to Xapian:</p>
<ul>
<li> <tt><a href="http://lists.xapian.org/mailman/listinfo/xapian-discuss">xapian-discuss</a></tt> for general discussions about the Xapian project
[<a href="http://gmane.org/info.php?group=gmane.comp.search.xapian.general">Gmane</a>]
<li> <tt><a href="http://lists.xapian.org/mailman/listinfo/xapian-devel">xapian-devel</a></tt> for technical discussions about the development of Xapian 
[<a href="http://gmane.org/info.php?group=gmane.comp.search.xapian.devel">Gmane</a>]
<li> <tt><a href="http://lists.xapian.org/mailman/listinfo/xapian-commits">xapian-commits</a></tt> receives details of SVN commits (can be a <em>lot</em> of messages)
[<a href="http://gmane.org/info.php?group=gmane.comp.search.xapian.cvs">Gmane</a>]
</ul>

<p>The [Gmane] links take you to the Gmane news gateway which allows you to
read these list with a newsreader, or browse the archives on the web.</p>

<p>
We don't currently have a dedicated announcements list.  If you just wish to
hear when new versions become available, you can
"<a href="http://freshmeat.net/subscribe/40427/">subscribe</a>" to
release announcements via the
<a href="http://freshmeat.net/projects/xapian/">Xapian project page on
freshmeat</a>.
New releases are announced there and on xapian-discuss.
</p>

<h2>Searching the lists</h2>

<form method="get" action="http://search.gmane.org/">
<p>
Search
<select name="group">
<option value="gmane.comp.search.xapian.general">xapian-discuss</option>
<option value="gmane.comp.search.xapian.devel">xapian-devel</option>
</select>
list archives for <input type="text" name="query">
<input type="submit" value="Search">
</p>
</form>

</div>

<?php
include "cssnav.php";
?>

</body>
</html>
