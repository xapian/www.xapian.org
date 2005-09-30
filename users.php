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
<p>
<a href="#tweakers">Tweakers.net</a> |
<a href="#diezeit">Die Zeit</a> |
<a href="#qoop">Qoop</a> |
<a href="#ananova">Ananova</a> |
<a href="#react">React</a> |
<a href="#theyworkforyou">TheyWorkForYou</a> |
<a href="#venda">Venda</a> |
<a href="#citebase">Citebase</a> |
<a href="#flyingdog">Flying Dog Software</a> |
<a href="#camcity">Cambridge City Council</a> |
<a href="#divmod">Divmod</a> |
<a href="#webtop">Webtop</a> |
<a href="#gmane">Gmane</a> |
<a href="#daviswiki">Davis Wiki</a> |
<a href="#orange">Orange</a> |
<a href="#recoll">Recoll</a> |
<a href="#beeblex">BeebleX</a> |
<a href="#srpko">Srpko</a>
</p>
<img align=right src="xapian-powered.png">

<br>
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
Application: <a href="http://suche.zeit.de/suche">Searching newspaper articles</a>; also powers internal search facilities for newspaper staff.
Languages: German<br>
</p>

<p id="qoop">Organisation: <a href="http://www.qoop.nl/">Qoop</a> -
Online Auction Site<br>
Application: <a href="http://www.qoop.nl/index.php?page=%2Fzoeken_omega.php">Searching online auctions</a><br>
Languages: Dutch<br>
Database size: around 400,000 documents<br>
</p>

<p id="ananova">Organisation: <a href="http://www.ananova.com/">Ananova</a> -
a News website<br>
Application: Used internally to allow journalists to search archives of news
stories<br>
Languages: English<br>
Document types: news stories<br>
Note: The archive search was available to the public, but Ananova have now
removed it from their public site.
</p>

<p id="react">Organisation: <a href="http://www.react.nl/index.php">React</a>
- Supplier of Forum Software<br>
Application: Searching discussion forums - sites include
<a href="http://www.amsterdam.nl/">the city of Amsterdam</a>,
the dutch broadcasting organization <a href="http://www.vpro.nl/">VPRO</a>,
<a href="http://www.webpiraat.nl/index.wp/find/">Webpiraat</a>, and <a href="http://forum.gkv.nl/forum/find">GKV</a> (a dutch interchurch organization)<br>
Languages: Dutch<br>
Document types: forum topics<br>
Database size: around 900,000 topics
<?php
/*
Together there are 12.994.235 messages which are packed in 872.202 
topics over all the boards that we monitor. We index 1 topic as 1 document.
*/
?>
</p>

<p id="theyworkforyou">Organisation: <a href="http://www.theyworkforyou.com/"
>TheyWorkForYou.com</a><br>
Application: Searching Hansard, the UK House of Commons Official Report; also email alerts<br>
Languages: English<br>
Database size: around 500,000 documents; 0.5G of source data.

<p id="venda">Organisation: <a href="http://www.venda.com/">Venda Ltd</a><br>
Application: Searching products for ecommerce sites<br>
Document types: SQL database records<br>
</p>

<p id="citebase">Organisation: <a href="http://citebase.eprints.org/help/index.php">Citebase</a><br>
Application: <a href="http://citebase.eprints.org/">Searching academic papers</a><br>
Languages: Mostly English<br>
Database size: around 300,000 papers<br>
</p>

<p id="flyingdog">Organisation: <a href="http://www.flyingdog.biz/flyingdog/powerslave,id,1,_language,uk,_country,,nodeid,1.html">Flying Dog Software</a>
(<a href="http://www.flyingdog.biz/flyingdog/powerslave,id,1,_language,de,_country,,nodeid,1.html">oder auf Deutsch</a>)<br>
Application: Flying Dog Software's Powerslave Content Management System <a
href="http://www.flyingdog.biz/flyingdog/content/show.php3?id=74&amp;nodeid=7&amp;_language=uk">integrates Xapian to provide searching</a>
</p>

<p id="camcity">Organisation: <a href="http://www.cambridge.gov.uk/">Cambridge City Council</a><br>
Application: <a href="http://www.cambridge-cityservices-faqs.co.uk/">Providing an FAQ search</a><br>
Languages: English<br>
Database size: designed to support at least 30,000 questions/answers<br>
</p>

<p id="divmod">Organisation: <a href="http://www.divmod.com/">Divmod</a>
- Webmail and VOIP provider<br>
Application: Searching email

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

<p id="gmane">Organisation: <a href="http://www.gmane.org/">Gmane</a><br>
Application: Searching archives of mailing lists (Gmane allows these to be viewed as newsgroups, or on the web)<br>
Location: <a href="http://search.gmane.org/">search.gmane.org</a><br>
Database size: around 28,000,000 messages
</p>

<p id="daviswiki">Organisation: <a href="http://www.daviswiki.org/">Davis Wiki</a><br>
Application: <a href="http://www.daviswiki.org/index.cgi/Wiki_20Developers?action=highlight&value=xapian">Searching a wiki for Davis, California, USA</a><br>
Document types: MoinMoin Wiki pages<br>
Database size: over 1000 pages<br>
</p>
 
<p id="orange">Organisation: <a href="http://www.orange.co.uk/">Orange</a> -
mobile phone company<br>
Application: WAP search for users of Orange mobile phones<br>
</p>

<p id="recoll">Application: <a href="http://perso.wanadoo.fr/dockes/recoll/">Recoll</a> is a personal full text indexing system
</p>

<p id="beeblex">Organisation: BeebleX<br>
Application: Searching all things PHP related<br>
Location: <a href="http://www.beeblex.com/">BeebleX</a><br>
Document types: Mailing lists, News, Articles, Forums, Documentation, Blogs, Job listings<br>
Database size: over 890,000 documents<br>
</p>

<p id="srpko">Organisation: Srpko<br>
Application: Searching documents related to Serbia and Montenegro<br>
Location: <a href="http://www.srpko.com/">Srpko</a><br>
Document types: Web pages, News articles, Wikipedia pages, Dictionary entries<br>
Database size: over 5,000,000 pages<br>
</p>

<?php
/*
Synd is a software framework written in PHP, used primarily for building
dynamic websites.  It allows Xapian to be used to provide an integrated search
engine.
http://synd.grow.nu/snaps/README.html
*/
?>

</div>

<?php
include "cssnav.php";
?>

</body>
</html>
