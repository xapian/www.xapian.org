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

<h2>Categories</h2>

<ul>
<li><a href="#searchweb">Search Websites</a></li>
<li><a href="#newsweb">News Websites</a></li>
<li><a href="#commweb">Community Websites</a></li>
<li><a href="#otherweb">Other Websites</a></li>
<li><a href="#desktop">Desktop Search Applications</a></li>
<li><a href="#webapps">Web Based Applications</a></li>
<li><a href="#frameworks">Software Frameworks</a></li>
</ul>

<?php
// We should probably require a "Xapian powered" or similar link back
// in exchange - for now we need to get the list going though, so don't
// be strict about this...
/*
extra data: number of documents, size of index, number
of machines the system runs on, number of users and thus queries per day
etc...generally anything that says something about performance.
*/


// http://www.osservatoriobalcani.org/
// search at http://www.opencontent.it/cgi-bin/omega/omega?DB=ob&FMT=ob

// http://clickchronicle.com/

// iusethis
?>

<img align=right src="xapian-powered.png"><br><hr>

<h2 id="searchweb">Search Websites</h2>

<ul>
<li id="beeblex"><div class="orgname"><a href="http://www.beeblex.com/">BeebleX</a></div>
Application: Searching all things PHP related<br>
Document types: Mailing lists, News, Articles, Forums, Documentation, Blogs, Job listings<br>
Database size: over 1.1 million documents<br>
</li>

<li id="citebase"><div class="orgname"><a href="http://citebase.eprints.org/help/">Citebase</a></div>
Application: <a href="http://citebase.eprints.org/">Searching academic papers</a><br>
Languages: Mostly English<br>
Database size: around 300,000 papers<br>
</li>

<li id="srpko"><div class="orgname"><a href="http://www.srpko.com/">Srpko</a></div>
Application: Searching documents related to Serbia and Montenegro<br>
Document types: Web pages, News articles, Wikipedia pages, Dictionary entries<br>
Database size: over 8.4 million pages<br>
</li>

<li id="kug"><div class="orgname"><a href="http://kug.ub.uni-koeln.de/">Library of the University of Cologne</a></div>
Application: Searching the library's OPAC (Online Public Access Catalogue) with <a href="http://www.openbib.org/">OpenBib</a><br>
Languages: German<br>
Database size: over 5.2 million title entries split across 133 separate databases<br>
</li>

</ul>

<hr>

<h2 id="newsweb">News Websites</h2>

<ul>
<li id="diezeit"><div class="orgname"><a href="http://www.zeit.de/">Die Zeit</a> -
German Newspaper</div>
Application: <a href="http://suche.zeit.de/suche">Searching newspaper articles</a>; also powers internal search facilities for newspaper staff.<br>
Languages: German<br>
</li>

<li id="abcsok"><div class="orgname">ABC Startsiden</div>
Application: Search through 3 years worth of Norwegian news<br>
Location: <a href="http://nyheter.abcsok.no/">ABCSok</a><br>
Languages: Norwegian<br>
Document types: News stories
</li>

<li id="ananova"><div class="orgname"><a href="http://www.ananova.com/">Ananova</a> - a News website</div>
Application: Used internally to allow journalists to search archives of news
stories<br>
Languages: English<br>
Document types: news stories<br>
Note: The archive search was available to the public, but Ananova have now
removed it from their public site.
</li>
</ul>

<hr>

<h2 id="commweb">Community Websites</h2>

<ul>
<li id="tweakers"><div class="orgname"><a href="http://tweakers.net/">Tweakers.net</a> - the largest Dutch ICT-website</div>
Application:
<a href="http://gathering.tweakers.net/forum/find">Forum search engine</a><br>
Languages: Dutch<br>
Document types: Complete forum discussions<br>
Database size: Over 850000 documents, about 15GB of uncompressed, 10GB compressed database size.
</li>

<li id="theyworkforyou"><div class="orgname"><a href="http://www.theyworkforyou.com/" >TheyWorkForYou.com</a></div>
Application: Searching Hansard, the UK House of Commons Official Report; also email alerts<br>
Languages: English<br>
Database size: around 500,000 documents; 0.5G of source data.
</li>

<li id="react"><div class="orgname"><a href="http://www.react.nl/index.php">React</a> - Supplier of Forum Software</div>
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
</li>

<li id="daviswiki"><div class="orgname"><a href="http://www.daviswiki.org/">Davis Wiki</a></div>
Application: <a href="http://www.daviswiki.org/index.cgi/Wiki_20Developers">Searching a wiki for Davis, California, USA</a><br>
Document types: MoinMoin Wiki pages<br>
Database size: around 8000 pages<br>
</li>
 
<li id="rocwiki"><div class="orgname"><a href="http://rocwiki.org/">RocWiki</a></div>
Application: search for wiki about Rochester, NY, USA<br>
Document types: wiki pages<br>
Database size: around 3000 pages<br>
</li>

<li id="gaze"><div class="orgname"><a href="http://www.mysociety.org/">mysociety.org</a></div>
Application: <a href="http://www.mysociety.org/?p=83">web api to gazeteer service</a>, built using Search::Xapian
</li>

<li id="spin"><div class="orgname"><a href="http://spin.de/">spin.de</a></div>
Application: Free online community with profiles, chat, boards, blogs, games, and more<br>
Languages: German<br>
Document types: User profiles, forums, mails, and help documents<br>
Database size: 1.89 million documents to date
</li>
</ul>

<hr>

<h2 id="otherweb">Other Websites</h2>

<ul>
<li id="gmane"><div class="orgname"><a href="http://www.gmane.org/">Gmane</a></div>
Application: Searching archives of mailing lists (Gmane allows these to be viewed as newsgroups, or on the web)<br>
Location: <a href="http://search.gmane.org/">search.gmane.org</a><br>
Database size: 46 million messages and counting!
</li>

<li id="qoop"><div class="orgname"><a href="http://www.qoop.nl/">Qoop</a> - Online Auction Site</div>
Application: Searching online auctions<br>
Languages: Dutch<br>
Database size: around 850,000 documents<br>
</li>

<li id="camcity"><div class="orgname"><a href="http://www.cambridge.gov.uk/">Cambridge City Council</a></div>
Application: <a href="http://www.cambridge-cityservices-faqs.co.uk/">Providing an FAQ search</a><br>
Languages: English<br>
Database size: designed to support at least 30,000 questions/answers<br>
</li>

<li id="orange"><div class="orgname"><a href="http://www.orange.co.uk/">Orange</a> - mobile phone company</div>
Application: WAP search for users of Orange mobile phones<br>
</li>

<li id="divmod"><div class="orgname"><a href="http://www.divmod.com/">Divmod</a> - Webmail and VOIP provider</div>
Application: Searching email
</li>

<li id="procare"><div class="orgname"><a href="http://www.procarestores.com/">ProCare Stores</a></div>
Application: <a href="http://www.procarestores.com/product/general_catalog/index.php">Product Search</a> for on-line store<br>
Database size: 9000 products<br>
</li>

</ul>

<hr>

<h2 id="desktop">Desktop Search Applications</h2>

<ul>
<li id="recoll"><div class="orgname"><a href="http://www.lesbonscomptes.com/recoll/">Recoll</a></div>
Application: Recoll is a personal full text indexing system<br>
</li>

<li id="pinot"><div class="orgname"><a href="http://pinot.berlios.de/">Pinot</a></div>
Application: Pinot is a metasearch tool for the Free Desktop<br>
</li>
</ul>

<hr>

<h2 id="webapps">Web Based Applications</h2>

<ul>
<li id="roundup"><div class="orgname"><a href="http://roundup.sourceforge.net/">Roundup</a></div>
Application: Issue Tracker which can use Xapian for searching
</ul>

<?php
// MailManager - opensource web application for customer service and help desk
// email management http://www.logicalware.org/
?>
<hr>

<h2 id="frameworks">Software Frameworks</h2>

<ul>
<li id="catalyst"><div class="orgname"><a href="http://catalyst.perl.org/">Catalyst</a></div>
Catalyst is a Web Development Framework which includes
<a href="http://search.cpan.org/~mramberg/Catalyst-Model-Xapian-0.02/lib/Catalyst/Model/Xapian.pm">support for using Xapian as a search engine</a>.
</li>

<li id="synd"><div class="orgname"><a href="http://www.synd.info/">Synd</a></div>
Synd is a software framework written in PHP, used primarily for building
dynamic websites.  It <a href="http://www.synd.info/api/default/_core_index_XapianIndex_class_inc.html"
>allows Xapian to be used</a> to provide an integrated search engine.
</li>

<li id="flyingdog"><div class="orgname"><a href="http://www.flyingdog.biz/">Flying Dog Software</a></div>
Application: Flying Dog Software's Powerslave Content Management System <a
href="http://live.homepage.fdog.de/flyingdog/powerslave,id,1,_language,uk,,nodeid,1.html?xv_query=+xapian&amp;nodeid=1&amp;id=1&amp;_language=uk&amp;_country=&amp;xv_start=0">integrates Xapian to provide searching</a>
(<a href="http://live.homepage.fdog.de/flyingdog/powerslave,id,1,_language,de,,nodeid,1.html?xv_query=xapian&amp;nodeid=1&amp;id=1&amp;_language=uk&amp;_country=&amp;xv_start=0">oder auf Deutsch</a>)
</li>

<li id="venda"><div class="orgname"><a href="http://www.venda.com/" rel="nofollow">Venda Ltd</a></div>
Application: Searching products on numerous ecommerce sites including
<a href="http://www.bbcshop.com/">The BBC Shop</a>,
<a href="http://www.shop.bt.com/">British Telecom's Shop</a>,
<a href="http://www.virginmegastores.co.uk/">Virgin Megastores</a>,
and
<a href="http://www.mothercare.com/">Mothercare</a>.
<br>
Document types: SQL database records<br>
</li>

</ul>

<hr>

</div>

<?php
include "cssnav.php";
?>

</body>
</html>
