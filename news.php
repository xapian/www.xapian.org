<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2//EN">
<html><head><title>The Xapian Project : News</title></head>
<body bgcolor="#FFFFFF" text="#000000">
<?php
include "navbar.php";
print $navbar;
?>
<hr>

<center><h1>News</h1></center>

<h2>Xapian 0.5.4 <small>(2002-10-16)</small></h2>

<ul>
<li> Fixed a compilation error with "make check" when using GCC 3.2.

<li> PLATFORMS: checked 0.5.3 works on OpenBSD and Solaris 7.
</ul>

<h2>Xapian 0.5.3 <small>(2002-10-12)</small></h2>

<P>Notable changes: Improvements to the test suite, and internal code cleanups:

<ul>
<li> Internal code cleanups on Quartz Btree implementation.

<li> Minor documentation updates (TODO and PLATFORMS updated; Martin Porter's
  stemming paper removed - see the Snowball site for background stemmer
  info).

<li> Implemented QuartzAllTermsList::get_approx_size().

<li> Removed a couple of occurences of "using std::XXX;" from externally
  visible headers.

<li> With GCC, add warning flags "-Wall -W" rather than "-Wall -Wunused" (-Wall
  implies -Wunused anyway).  Fixed all the warnings this throws up, except in
  languages/ (that code is to be replaced with Snowball soon).

<li> Test suite: Disable colour test output if stdout isn't a terminal and
  reworked check for broken exception handling as the previous  version never
  seemed to fire.  Other assorted minor improvements.

<li> include/om/om.h is now removed on "make distclean" rather than "make clean".
</ul>

<h2>Xapian 0.5.2 <small>(2002-10-06)</small></h2>

<P>Further improvements to documentation and portability:

<ul>
<li> docs/: converted all text docs to HTML (except omsettings which will
  has odd markup (LaTeX?) and will probably soon be obsolete anyway).

<li> remote backend: Fixed handling of timeouts which are now in the past - fixes
  test failures with redhat/x86.

<li> quartz backend: now works on 64 bit platforms.

<li> test suite: try to spot mishandled exceptions and stop them causing bogus
  OMEXCEPT failures.
</ul>

<h2>Xapian 0.5.1 <small>(2002-10-02)</small></h2>

<P>This release fixes features improved documentation and some build system
portability fixes.

<ul>
<li> PLATFORMS: updated with more test results.

<li> docs/: tidied up layout of HTML documentation; converted the notes about
  BM25 into HTML; updated stemmer docs to reflect intention to use Snowball
  instead; included HTML versions of quickstart*.cc.

<li> automake 1.6.3 and autoconf 2.54 are now required for those working             from CVS to fix a problem with the generated Makefiles and Solaris
  make.

<li> net/Makefile.am: Fixed building of readquery.cc from readquery.ll.

<li> buildall script is now deprecated - use the new streamlined bootstrap script
  in preference.
</ul>

<h2>Xapian 0.5.0 <small>(2002-09-20)</small></h2>

The last release of the software that is now known as Xapian was 
OmSee 0.4.1 on November 24th 2000, not far from 2 years ago.

<P>
There's been a significant amount of development in this time,
so we've summarised the most notable changes and improvements:

<ul>
<li>
The project is now called "Xapian".  We've renamed the modules in the
light of this change:
  
<ul>
<li> "om" is now "xapian-core"
<li> "om-examples" is now "xapian-examples", and now contains small,
    instructive examples which demonstrate how to use Xapian to implement
    particularly features.
<li> Added "xapian-applications" which contains larger sample applications
</ul>

<li> Much improved build system - should now build "out of the box" on many
  Unix platforms.  Can now VPATH build with vendor tools on most platforms.
  Builds as cleanly as we can achieve with GCC 2.95.* (some bogus warnings due
  to compiler bugs).  Should build without warnings on GCC 3.0, 3.1,
  and 3.2.

<li> If using GCC, om/om.h now contains a check that the compiler used to
build Xapian and the compiler used to build the application have compatible
C++ ABIs.  So you get a clear error message early from the first attempt to
compile a file rather than a confusing error from the linker near the end
of the build.

<li> RPM packages are now available.  We intend to prepare Debian packages
  in the near future too.

<li> xapian-config no longer support "--uninst".  It's hard to make this work
reliably and portably, and the effort is better expended elsewhere.  Configure
with a prefix and install to a temporary directory instead.

<li> Xapian can now work with files &gt; 2Gb on OSes which support them.

<li> Restructured and reworked documentation.

<li> Removed thread locks.  We
 intend to be "thread-friendly" so different threads can access
  different objects without problems.  In the rare event that you want
  to concurrently call methods on the <em>same object</em> from different
  threads you need to create a mutex and lock it.
  Thus the thread lock overhead is only incurred when it's necessary.

<li> Indexgraph removed from core library.  It will reappear as an add-on
library at some point.
  
<li> Omega's query parser has now been reworked as a separate library.

<li> Terminology change - "keys" are now known as "values" to avoid confusion,
  since they're not like keys in a relational database.  The exception is
  when a value is used as a key in some operation, e.g.  "match_collapse_key".

<li>Database backends:

<ul>
<li> Auto backend: can now be used to create a new database.

<li> Auto backend: added support for "stub" databases - a text file
specifying the settings for the database to be opened (particularly
useful for allowing easy access to specific remote databases).

<li> Quartz backend: many fixes and improvements, and the code has been cleaned
up a lot.  Implemented deleting of items from postlists.

<li> Remote backend: implemented term_exists() and get_termfreq();

<li> Multi-backend: the document length is now fetched from the sub-postlist
  rather than the database, which provides a huge speed-up in some cases.

<li> Sleepycat backend: this experimental backend has been removed.

<li> Muscat 3.6 backends: now disabled by default.
</ul>

<li> Tests:

<ul>
<li> Test cases added for most bug fixes and new features.

<li> stemtest: rewritten in C++ rather than part C++, part perl.  Now 15%
   faster.

<li> includetest: removed - it's no longer useful now the code has matured.

<li> Removed problematic leak checking from testsuite.  We plan to use valgrind
  instead soon.

</ul>
<li> Matcher:

<ul>

<li> Fixed several matcher bugs which could cause incorrect results in
  some situations.

<li> Fix bug in expander due to nth_element being called on the wrong element.

<li> Added sorting within relevance bands to the matcher.

<li> Matcher now calculates percentages differently, such that 100% relevance is
  actually achievable.

<li> Matcher now uses a min-heap rather than nth-element to maintain the
  proto-mset.  This is cleaner and more efficient.

<li> New operator OP_ELITE_SET replaces match_max_or_terms option.

<li> Implemented multiple XOR queries.

<li> Add a new query operator, OP_WEIGHT_CUTOFF, which returns only
  those documents from a query which have a weight greater than a
  specified cutoff value.

<li> Removed OmBatchEnquire from system: it may return at a later date,
  but for now it is simply out of date and a maintainance liability,
  and gives no significant advantage.

<li> Added experimental match bias functors.

</ul>

<li> The API has been cleaned up in various places:

<ul>
<li> OmDocumentContents and OmIndexDoc merged to become OmDocument
<li> OmQuery interface cleaned up
<li> OmData and OmKey removed - methods which used them now just pass a string instead
<li> OmESetItem replaced by OmESetIterator; OmMSetItem by OmMSetIterator;
om_termname_list by OmTermIterator
<li> OmDocumentTerm and OmDocumentParams removed
<li> OmMSet::mbound replaced by
  OmMSet::matches_{lower_bound,estimated,upper_bound}, giving more information
<li> Xapian iterators now have default constructors
<li> Most API classes now have reference counted internals, so assignment and copying are cheap
<li> OmStem now has copy constructor and assignment operator
<li> and more...
</ul>

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
