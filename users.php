<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
<title>Xapian Users</title>
<? include "styleandmeta.php"; ?>
</head>

<body>

<div id="Content">

<h1>Xapian Users</h1>

<p>The following organisations are known to use Xapian. Please let us know if
you know of any more!</p>
<?php
// we should probably require a "Xapian powered" or similar link back
// in exchange - for now we need to get the list going though, so don't
// be strict about this...
?>
<img align=right src="xapian-powered.png">
<p>
<a href="#tweakers">Tweakers.net</a> |
<a href="#diezeit">Die Zeit</a> |
<a href="#qoop">Qoop</a> |
<a href="#ananova">Ananova</a> |
<a href="#react">React</a> |
<a href="#theyworkforyou">TheyWorkForYou</a> |
<a href="#venda">Venda</a> |
<a href="#webtop">Webtop</a>
<? /* | <a href="#gmane">Gmane</a>*/ ?>
</p>

<hr>

<p id="tweakers">Organisation: <a href="http://tweakers.net/">Tweakers.net</a> - the largest Dutch ICT-website<br>
Application:
<a href="http://gathering.tweakers.net/forum/find">Forum search engine</a><br>
Languages: Dutch<br>
Document types: Complete forum discussions<br>
Database size: Over 850000 documents, about 15GB of uncompressed, 10GB compressed database size.
</p>

<?php
/*
extra data: number of documents, size of index, number
of machines the system runs on, number of users and thus queries per day
etc...generally anything that says something about performance.
*/
?>
<p id="diezeit">Organisation: <a href="http://www.zeit.de/">Die Zeit</a> -
German Newspaper<br>
Application: Currently in use internally, with use on the live site planned<br>
Languages: German<br>
</p>

<p id="qoop">Organisation: <a href="http://www.qoop.nl/">Qoop</a> -
Online Auction Site<br>
Application: <a href="http://www.qoop.nl/index.php?page=%2Fzoeken_omega.php">Searching online auctions</a><br>
Languages: Dutch<br>
Database size: around 400000 documents<br>
</p>

<p id="ananova">Organisation: <a href="http://www.ananova.com/">Ananova</a> -
a News Site owned by <a href="http://web.orange.co.uk/">Orange</a><br>
Application: Used internally to allow journalists to search archives of news
stories<br>
Languages: English<br>
Document types: news stories<br>
Note: The archive search was available to the public.
It's no longer linked to from the rest of the Ananova site, but you can
still <a href="http://www.ananova.com/search/">try it out</a> (the web search
option no longer works)
</p>

<p id="react">Organisation: <a href="http://www.react.nl/index.php">React</a>
- Supplier of Forum Software<br>
Application: Searching discussion forums - sites include
<a href="http://www.amsterdam.nl/">the city of Amsterdam</a>,
the dutch broadcasting organization <a href="http://www.vpro.nl/">VPRO</a>,
<a href="http://www.webpiraat.nl/index.wp/find/">Webpiraat</a>, and <a href="http://forum.gkv.nl/forum/find">GKV</a> (a dutch interchurch organization)<br>
Languages: Dutch<br>
Document types: forum topics<br>
<?php
/*
Together there are 12.994.235 messages which are packed in 872.202 
topics over all the boards that we monitor. We index 1 topic as 1 document.
*/
?>
</p>

<p id="theyworkforyou">Organisation: <a href="http://www.theyworkforyou.com/"
>TheyWorkForYou.com</a><br>
Application: Searching Hansard, the UK House of Commons Official Report<br>
Languages: English<br>
Database size: at least 400,000 documents

<p id="venda">Organisation: <a href="http://www.venda.com/">Venda Ltd</a><br>
Application: Searching products for ecommerce sites<br>
Document types: SQL database records<br>
</p>

<p id="webtop">Organisation: Webtop Ltd (now defunct -
<a href="http://web.archive.org/web/20000708023501/http://www.webtop.com/index.html">archive.org snapshot</a>)<br>
Application: Global Web Search Engine<br>
Languages: Many!<br>
Document types: mainly HTML<br>
Database size: around 500,000,000 pages<br>
Note: Webtop used an early version of Xapian to provide a search of
half a billion webpages using 30 Intel boxes with sub-second retrieval times.
Unfortunately Webtop's parent company stopped trading in 2001.
</p>

<?php
/*
<p id="gmane">Organisation: Gmane.org (in development)<br>
Application: Searching archives of mailing lists (Gmane allows these to be viewed as newsgroups)<br>
Location: <a href="http://www.gmane.org">www.gmane.org</a><br>
Document types:<br>
Database size: around 15,000,000 pages<br>
Note:
</p>
*/
?>
</div>

<?php
include "cssnav.php";
?>

</body>
</html>
