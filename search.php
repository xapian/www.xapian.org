<? include "niceurl.php"; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
<title>The Xapian Project : Search</title>
<? include "styleandmeta.php"; ?>
</head>

<body>

<div id="Content">
<? virtual("/omega.cgi?FMT=xapian.org&".$_SERVER['QUERY_STRING']); ?>
</div>

<?php
include "cssnav.php";
?>

</body>
</html>
