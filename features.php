<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2//EN">
<html><head><title>The Xapian Project : Features</title></head>
<body bgcolor="#FFFFFF" text="#000000">
<?php
include "navbar.php";
print $navbar;
?>
<hr>

<center><h1>Features</h1></center>

Features of Xapian include:
<ul>

<li> Free Software/Open Source - licensed under the GPL.

<li> Portable to most Unix platforms (known to work on Linux (on x86, alpha,
  sparc and powerpc), FreeBSD, OpenBSD, and Solaris).  Builds for Microsoft
  Windows, but currently untested.

<li> Written in C++.  Perl bindings are available in the module
  <a href="http://cpan.perl.org/modules/by-module/Search/">Search::Xapian
  on CPAN</a>.  <a href="http://www.swig.org/">SWIG</a> bindings allow the
  library to be used from supported languages (including PHP, Python,
  and Java).  Note: the SWIG bindings are disabled in current releases
  as they rely on features only in development versions of SWIG, but this
  should be resolved soon.

<li> Ranked probablistic search - important words get more weight than
unimportant words, so the most relevant documents are more likely to come near
the top of the results list.

<li> Relevance feedback - given one or more documents, Xapian can suggest the
most relevant index terms to expand a query, suggest related documents,
categorise documents, etc.

<li> Phrase and proximity searching - users can search for words
  occuring in an exact phrase or within a specified number of words,
  either in a specified order, or in any order.

<li> Full range of structured boolean search operators ("stock NOT market",
  etc).  The results of the boolean search are ranked by the probablistic
  weights.  Boolean filters can also be applied to restrict a probabilistic
  search.

<li> Supports stemming of search terms (e.g. a search for "football" would
  match documents which mention "footballs" or "footballer").  This helps
  to find relevant documents which might otherwise be missed.  Stemmers
  are currently included for Danish, Dutch, English, Finnish, French,
  German, Italian, Norwegian, Portuguese, Russian, Spanish, and Swedish.

<li> Supports database files &gt; 2GB where supported by the OS
  - essential for scaling to large document collections.

<li> Platform independent data formats - you can build a database on one
  machine and search it on another.

<li> Allows simultaneous update and searching.  New documents become searchable
right away.

</ul>

As well as the library, we supply a number of small example programs, and
a larger application - an indexing and CGI-based application called omega:

<ul>

<li> Indexer supplied can index HTML, PHP, PDF, PostScript, and plain text.
  Adding support for indexing other formats is easy where conversion filters
  are available (e.g. Microsoft Word).  The supplied indexer works using the
  filing system - we're close to being able to hook up to the htdig web
  crawler which will allow remote sites to be indexed too.

<li> You can also index data from any SQL or other RDBMS supported by the
<A HREF="http://dbi.perl.org/">Perl DBI module</A>.
That includes MySQL, PostgreSQL, SQLite, Sybase, MS SQL, LDAP, and ODBC.

<li> CGI search front-end supplied with highly customisable appearance.  This
can also be customised to output results in XML or CSV, which is useful if you
are dynamically generating pages (e.g. with PHP or mod_perl) and just want
raw search results which you can process in your own page layout code.

</ul>

<hr>
<?=$navbar ?>
</body>
</html>
