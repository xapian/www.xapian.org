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

<li> Portable to most Unix platforms (known to work on x86 Linux, FreeBSD,
  OpenBSD, and Solaris).  A port to Microsoft Windows should be possible.

<li> Written in C++.  Bindings allow the library to be used from languages
  supported by <a href="http://www.swig.org/">SWIG</a> (including PHP, Python,
  Perl, and Java).  Note: the bindings are disabled in current
  Xapian releases as they rely on features only in development versions of SWIG.

<li> Open Source - licensed under the GPL.

<li> Ranked probablistic search - important words get more weight that unimportant
  words, so the most relevant documents are more likely to be come near the
  top of the results list.

<li> Relevance feedback - given one or more documents, Xapian can suggest the most
  relevant index terms to expand a query, suggest related documents, categorise
  documents, etc.

<li> Phrase and proximity searching - users can search find places where words
  occur in an exact phrase, or words occur within a specified number of words,
  either in a specified order, or in any order.

<li> Full range of boolean search operators ("stock NOT market", etc).  Some
  users like to have these as they feel it gives them more control.  The
  results of the boolean search are ranked.

<li> Supports stemming of search terms (e.g. a search for "football" would
  match documents which mention "footballs" or "footballer").  This helps
  to find relevant documents which might otherwise be missed.  Stemmers
  are supplied For many languages (currently Danish, Dutch, English, French,
  German, Italian, Norwegian, Portuguese, Spanish, and Swedish; Russian
  and Finnish should be added shortly).

<li> Supports files &gt; 2GB where supported by the OS (Linux and Solaris both
  do) - useful for really large document collections.
</ul>

As well as the library, we supply a number of small example programs, and
a larger application - an indexing and CGI-based application called omega:

<ul>

<li> Indexer supplied can index HTML, PDF, PostScript, and plain text.  Adding
  support for indexing other formats is easy where conversion filters are
  available (e.g. Microsoft Word).  The current indexer works using the
  filing system - a remote web crawler could be hooked in instead.

<li> CGI search front-end supplied with highly customisable appearance.  This can
  also be customised to output results in XML or CSV - this is useful if you are
  using dynamically generating pages (e.g. with PHP or mod_perl) and just want
  raw search results which you can process in your own code.

</ul>

<hr>
<?=$navbar ?>
<br>
<A href="http://sourceforge.net"><IMG
src="http://sourceforge.net/sflogo.php?group_id=35626&type=1" width="88" height="31" border="0" alt="SourceForge Logo"></A>
<small>
The Xapian project makes use of Sourceforge for <a href="http://sourceforge.net/projects/xapian/">project infrastructure</a>.
</small>
</body>
</html>
