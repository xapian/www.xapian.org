<? include "niceurl.php"; ?>
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

<p>
The following organisations are known to use Xapian.  If you are using
Xapian or know someone who is, please add an entry to
<a href="http://trac.xapian.org/wiki/MoreUsers">the wiki</a>.
</p>

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

http://www.bivio.biz/f/bOP/README

*/
?>

<img align=right src="xapian-powered.png"><br><hr>

<h2 id="searchweb">Search Websites</h2>

<ul>

<!-- URLs checked 2010-10-03 -->
<li id="citebase"><div class="orgname"><a href="http://citebase.eprints.org/help/">Citebase</a></div>
Application: <a href="http://citebase.eprints.org/">Searching academic papers</a><br>
Languages: Mostly English<br>
Database size: around 300,000 papers <small>(2006-02-06)</small><br>
</li>

<!-- URLs checked 2010-10-03 -->
<li id="kug"><div class="orgname"><a href="http://kug.ub.uni-koeln.de/">Library of the University of Cologne</a></div>
Xapian is used with <a href="http://www.openbib.org/">OpenBib</a> to search
the library's OPAC (Online Public Access Catalogue)<br>
Languages: German<br>
Database size: nearly 10 million title entries split across 186 separate databases
<small>(2010-10-03)</small><br>
</li>

</ul>

<hr>

<h2 id="newsweb">News Websites</h2>

<ul>

<!-- URLs checked 2010-10-03 -->
<li id="diezeit"><div class="orgname"><a href="http://www.zeit.de/">Die Zeit</a> -
German Newspaper</div>
Application: <a href="http://suche.zeit.de/suche">Searching newspaper articles</a>; also powers internal search facilities for newspaper staff.<br>
Languages: German<br>
</li>

<!-- URLs checked 2010-10-03 -->
<li id="abcsok"><div class="orgname">ABC Startsiden</div>
Application: Search through 3 years worth of Norwegian news<br>
Location: <a href="http://nyheter.abcsok.no/">ABCSok</a> and <a href="http://overblikk.no/">Overblikk</a><br>
Languages: Norwegian<br>
Document types: News stories
</li>

<!-- URLs checked 2009-03-14 -->
<li id="balcani"><div class="orgname"><a href="http://www.osservatoriobalcani.org/">Osservatorio Balcani</a> (<a href="http://www.osservatoriobalcani.org/article/frontpage/161">The Observatory on the Balkans</a>)</div>
Application: Searching articles about the Balkans<br>
Languages: Italian, English, and others<br>
</li>

</ul>

<hr>

<h2 id="commweb">Community Websites</h2>

<ul>

<!-- URLs checked 2009-03-14 -->
<li id="tweakers"><div class="orgname"><a href="http://tweakers.net/">Tweakers.net</a> - the largest Dutch ICT-website</div>
Application:
<a href="http://gathering.tweakers.net/forum/find">Forum search engine</a><br>
Languages: Dutch<br>
Document types: Complete forum discussions<br>
Database size: Over 850,000 documents, about 15GB of uncompressed, 10GB compressed database size. <small>(2008-07-14)</small>
</li>

<!-- URLs checked 2009-03-14 -->
<li id="theyworkforyou"><div class="orgname"><a href="http://www.theyworkforyou.com/" >TheyWorkForYou.com</a></div>
Application: Searching Hansard, the UK House of Commons Official Report; also email alerts<br>
Languages: English<br>
Database size: around 500,000 documents; 0.5G of source data. <small>(2006-02-06)</small>
</li>

<!-- URLs checked 2009-03-14 -->
<li id="react"><div class="orgname"><a href="http://www.react.nl/index.php">React</a> - Supplier of Forum Software</div>
Application: Searching discussion forums - sites include
<a href="http://www.amsterdam.nl/">the city of Amsterdam</a>,
the Dutch broadcasting organization <a href="http://www.vpro.nl/">VPRO</a>,
<a href="http://www.webpiraat.nl/wp/find/">Webpiraat</a>, and <a href="http://forum.gkv.nl/forum/find">GKV</a> (a Dutch interchurch organization)<br>
Languages: Dutch<br>
Document types: forum topics<br>
Database size: around 900,000 topics <small>(2004-08-19)</small>
<?php
/*
Together there are 12.994.235 messages which are packed in 872.202
topics over all the boards that we monitor. We index 1 topic as 1 document.
*/
?>
</li>

<!-- URLs checked 2009-03-14 -->
<li id="gaze"><div class="orgname"><a href="http://www.mysociety.org/">mysociety.org</a></div>
Application: <a href="http://www.mysociety.org/2005/09/15/gaze-web-service/">web api to gazetteer service</a>, built using Search::Xapian
</li>

<!-- URLs checked 2009-03-14 -->
<li id="spin"><div class="orgname"><a href="http://www.spin.de/">spin.de</a></div>
Application: Free online community with profiles, chat, boards, blogs, games, and more<br>
Languages: German<br>
Document types: User profiles, forums, mails, and help documents<br>
Database size: 1.89 million documents <small>(2007-03-29)</small>
</li>

<!-- URLs checked 2009-03-14 -->
<li id="whatdotheyknow"><div class="orgname"><a href="http://www.whatdotheyknow.com/">WhatDoTheyKnow.com</a></div>
Application: Searching UK Freedom of Information Act requests and responses
</li>

<!-- URLs checked 2009-03-14 -->
<li id="ubuntuusersde"><div class="orgname"><a href="http://ubuntuusers.de/">UbuntuUsers.de</a></div>
Application: Official German Portal for Ubuntu Linux
</li>
</ul>

<hr>

<h2 id="otherweb">Other Websites</h2>

<ul>

<!-- URLs checked 2010-09-01 -->
<li id="gmane"><div class="orgname"><a href="http://www.gmane.org/">Gmane</a></div>
Application: Searching archives of mailing lists (Gmane allows these to be viewed as newsgroups, or on the web)<br>
Location: <a href="http://search.gmane.org/">search.gmane.org</a><br>
Database size: 80 million messages <small>(2010-09-01)</small>
</li>

<!-- URLs checked 2009-05-18 -->
<li id="debian"><div class="orgname"><a href="http://debian.org/">Debian GNU/Linux</a></div>
Debian use Xapian for:
<ul>
<li> <a href="http://lists.debian.org/search.html">Debian Mailing List Archive Search</a><br>
Languages: Danish, Dutch, English, Finnish, French, German, Hungarian, Italian, Portuguese, Romanian, Russian, Spanish, Swedish, and Turkish<br>
Database size: 3.9 million messages <small>(2009-05-18)</small>
</li>
<li> <a href="http://wiki.debian.org/">Debian Wiki Search</a><br>
Database size: over 6700 pages <small>(2009-05-18)</small>
<!-- Runs moinmoin with Xapian support, see: http://wiki.debian.org/SystemInfo
 Size from: http://wiki.debian.org/PageSize -->
</li>

<li> <a href="http://packages.debian.org/">Searching their archive of software packages</a><br>
Database size: over 30000 packages <small>(2009-03-16)</small>
</li>
<li> <a href="http://debtags.alioth.debian.org/">Debtags Package Tagging</a> uses Xapian for its
<a href="http://debtags.alioth.debian.org/fts.html">full text search</a>,
<a href="http://debtags.alioth.debian.org/ssearch.html">smart search</a>,
and <a href="http://debtags.alioth.debian.org/edit.html">tag editor</a>.
</li>

</ul>
</li>

<!-- URLs checked 2009-03-14 -->
<li id="qoop"><div class="orgname"><a href="http://www.qoop.nl/">Qoop</a> - Online Auction Site</div>
Application: Searching online auctions<br>
Languages: Dutch<br>
Database size: around 1.2 million documents <small>(2009-03-14)</small>
</li>

<!-- URLs checked 2009-03-14 -->
<li id="procare"><div class="orgname"><a href="http://www.procarestores.com/">ProCare Stores</a></div>
Application: <a href="http://www.procarestores.com/product/general_catalog/index.php">Product Search</a> for on-line store<br>
Database size: 9000 products <small>(2006-04-08)</small>
</li>

<!-- URLs checked 2009-03-14 -->
<li id="grokbase"><div class="orgname"><a href="http://grokbase.com/">grokbase</a></div>
Application: Searching mailing list archive
</li>

<!-- URLs checked 2009-03-14 -->
<li id="iusethis"><div class="orgname"><a href="http://osx.iusethis.com/">i use this</a></div>
Provides a way to organise your Mac OS X applications and
discover new ones (also available for iPhone and Microsoft Windows
applications).
</li>

<!-- URLs checked 2009-03-14 -->
<li id="mydeco"><div class="orgname"><a href="http://mydeco.com/">mydeco</a></div>
Application: Home decoration website
</li>

<!-- URLs checked 2009-03-15 -->
<li id="whosaid"><div class="orgname"><a href="http://sandwich.ukcod.org.uk/~matthew/subtitles/">Who Said...</a></div>
Application: Subtitle search for Doctor Who episodes.
</li>

</ul>

<hr>

<h2 id="desktop">Desktop Search Applications</h2>

<ul>

<!-- URLs checked 2009-03-14 -->
<li id="recoll"><div class="orgname"><a href="http://www.recoll.org/">Recoll</a></div>
Application: Recoll is a personal full text search tool
</li>

<!-- URLs checked 2009-03-14 -->
<li id="pinot"><div class="orgname"><a href="http://pinot.berlios.de/">Pinot</a></div>
Application: Pinot is a personal search and metasearch tool for the Free Desktop
</li>

<!-- URLs checked 2009-03-14 -->
<li id="olpc"><div class="orgname"><a href="http://laptop.org/">one laptop per child</a></div>
Application: The One Laptop Per Child (OLPC) project is building a low-cost laptop for the world's poorest children.  The datastore search is implemented using
Xapian.<br>
</li>

</ul>

<hr>

<h2 id="webapps">Web Based Applications</h2>

<ul>

<!-- URLs checked 2009-03-14 -->
<li id="roundup"><div class="orgname"><a href="http://roundup.sourceforge.net/">Roundup</a></div>
Application: Roundup is an Issue Tracker which can use Xapian for searching
</li>

<!-- URLs checked 2009-03-14 -->
<li id="sycamore"><div class="orgname"><a href="http://www.projectsycamore.org/">Sycamore Wiki Engine</a></div>
Application: Wiki Engine with built in Xapian-powered search<br>
Example deployments:
<ul>
<li> <a href="http://wikispot.org/">Wiki Spot</a> - searching across hundreds of wikis - around 25,000 pages <small>(2007-08-23)</small>
</li>
<li> <a href="http://daviswiki.org/">Davis, California, USA</a>: 13,290 pages <small>(2009-03-14)</small><!-- size from http://daviswiki.org/Recent_Changes -->
</li>
<li> <a href="http://rocwiki.org/">Rochester, NY, USA</a>: 8,929 pages <small>(2009-03-13)</small><!-- size from http://rocwiki.org/System_Info -->
</li>
</ul>
</li>

<!-- URLs checked 2009-03-14 -->
<li id="mailmanager"><div class="orgname"><a href="http://sourceforge.net/projects/mailmanager">MailManager</a></div>
Application: Open source web application providing email management for customer service, help desk, etc.
</li>

<!-- URLs checked 2009-03-14 -->
<li id="moinmoin"><div class="orgname"><a href="http://moinmo.in/">MoinMoin</a></div>
Application: Wiki software with <a href="http://moinmo.in/HelpOnXapian">Xapian search</a> (as of version 1.6)
</li>

<!-- URLs checked 2010-08-24 -->
<li id="lxr"><div class="orgname"><a href="http://lxr.linux.no/">LXR</a></div>
Application: LXR, the Linux Cross Referencer
</li>

<!-- URLs checked 2010-08-24 -->
<li id="ikiwiki"><div class="orgname"><a href="http://ikiwiki.info/">ikiwiki</a></div>
Application: Wiki software with Xapian search (as of version 2.49)
</li>

<!-- URLs checked 2010-08-24 -->
<li id="automne"><div class="orgname"><a href="http://www.automne.ws/">automne</a></div>
French Web content management software.  Xapian powers the <a href="http://www.automne.ws/web/168-rechercher.php">website search</a> and is available as a module version 4.0.0 (in beta as of 2009-03-06).
</li>

<!-- URLs checked 2009-03-16 -->
<li id="ovirt"><div class="orgname"><a href="http://ovirt.org/">oVirt</a></div>
oVirt provides management of virtual machines via a
web-based virtual machine management console, and uses Xapian to provide
search functionality.
</li>

</ul>

<hr>

<h2 id="frameworks">Software Frameworks</h2>

<ul>

<!-- URLs checked 2009-03-14 -->
<li id="catalyst"><div class="orgname"><a href="http://www.catalystframework.org/">Catalyst</a></div>
Catalyst is a Web Development Framework which includes
<a href="http://search.cpan.org/~mramberg/Catalyst-Model-Xapian-0.03/lib/Catalyst/Model/Xapian.pm">support for using Xapian as a search engine</a>.
</li>

<!-- URLs checked 2009-03-14 -->
<li id="synd"><div class="orgname"><a href="http://www.synd.info/">Synd</a></div>
Synd is a software framework written in PHP, used primarily for building
dynamic websites.  It allows Xapian to be used to provide an integrated search engine.
</li>

<!-- URLs checked 2009-03-14 -->
<li id="djapian"><div class="orgname"><a href="http://code.google.com/p/djapian/">Djapian</a></div>
Djapian provides integration between Xapian and
<a href="http://www.djangoproject.com/">Django</a> (a high-level Python Web
framework that encourages rapid development and clean, pragmatic design).
</li>

<!-- URLs checked 2009-03-14 -->
<li id="flax"><div class="orgname"><a href="http://www.flax.co.uk">Flax</a></div>
Flax is an enterprise search platform based on Xapian, with a web-based
administration system, scheduled indexing, and more.  It's written in Python.
</li>

<!-- URLs checked 2009-03-14 -->
<li id="acts_as_xapian"><div class="orgname"><a href="http://github.com/frabcus/acts_as_xapian/wikis">acts_as_xapian</a></div>
acts_as_xapian provides Xapian support for the <a href="http://www.rubyonrails.org/">Ruby on Rails</a> web framework.
</li>

<!-- URLs checked 2009-03-14 -->
<li id="couchdb"><div class="orgname"><a href="http://gitorious.org/projects/couchdb-xapian">CouchDB Xapian</a></div>
CouchDB Xapian is a search interface to CouchDB documents, that uses the Xapian Ruby bindings.
</li>

<!-- URLs checked 2009-03-14 -->
<li id="orexapian"><div class="orgname"><a href="http://pypi.python.org/pypi/ore.xapian/">ore.xapian</a></div>
ore.xapian is a Xapian Content Indexing/Searching Framework for Zope3
</li>



<!--
<li id="venda"><div class="orgname"><a href="http://www.venda.com/" rel="nofollow">Venda Ltd</a></div>
Application: Searching products on numerous ecommerce sites including
<a href="http://www.bbcshop.com/">The BBC Shop</a>,
<a href="http://www.shop.bt.com/">British Telecom's Shop</a>,
and
<a href="http://www.mothercare.com/">Mothercare</a>.
<br>
Document types: SQL database records<br>
</li>
-->

</ul>

<hr>

</div>

<?php
include "cssnav.php";
?>

</body>
</html>
