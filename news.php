<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2//EN">
<html><head><title>The Xapian Project : News</title></head>
<body bgcolor="#FFFFFF" text="#000000">
<?php
include "navbar.php";
print $navbar;
?>
<hr>

<center><h1>News</h1></center>

<H2>Xapian 0.6.3 <small>(2002-12-14)</small></H2>

<ul>
<li> Updated PLATFORMS and todo list.  Noted in HACKING that Bison 1.50 seems to
  work with Xapian.

<li> OmQueryParser now creates an "unstem" multimap to allow probabilistic
  query terms to be converted back to the form the user originally typed.

<li> Updated documentation for remote protocol description and the quickstart
  tutorial which were both very out of date.

<li> No longer use OmSettings to pass matcher parameters.  This completes the
  removal of OmSettings.
  
<li> Added workaround for problem with cursors sharing levels in the btree.
  This should fix sporadic problems with large databases (small databases
  have fewer btree levels so aren't affected).

<li> Stub databases now work again, though with a different format.  The new
  format allows multiple databases to be specified in the stub file.

<li> OmEnquire::get_eset() now takes a flags argument of bit constants |-ed
  together instead of 2 bools.

<li> Applied Martin Porter's better fix for the btree sequential addition bug
  which Richard fixed a few months ago.  Richard's fix resulted in a correct
  btree, but didn't always utilise space as efficiently as possible.

<li> Fixed the remote backend to handle weighting schemes after the OmSettings
  changes.  You can now even implement your own weighting scheme and use it
  with the remote backend provided you register it with SocketServer at
  runtime (this feature has been on the todo list for ages).
</ul>

<H2>Xapian 0.6.2 <small>(2002-12-07)</small></H2>

<ul>
<li> Set env var XAPIAN_SIG_DFL to stop the testsuite installing its
  signal handler (may be useful with some debugging tools).

<li> backends/quartz/btree.cc: max_item_size wasn't being set due to
  some over-zealous code pruning.  It was defaulting to 0, and
  was causing the code to write off the end of allocated memory
  blocks.

<li> matcher/localmatch.cc: fixed handling of wtscheme() - we were
  trying to use it for the extra weights, and then double
  deleting it!

<li> common/omdebug.cc,common/omdebug.h: Fixed permissions on newly
  created log file (was getting 000!); Simplified class internals;
  Renamed env vars: OM_DEBUG_FILE is now XAPIAN_DEBUG_LOG,
  OM_DEBUG_TYPES is now XAPIAN_DEBUG_FLAGS (old versions still work
  for now).

<li> testsuite/testsuite.cc: Fixed so running "gdb .libs/apitest"
  finds srcdir (for an in-tree build at least).

<li> Fixed to compile with --enable-debug=full.

<li> docs/remote.html: Updated from OmSettings to factory functions.

<li> PLATFORMS: ixion is actually Linux 2.2.

<li> OmWritableDatabase now has a default constructor.

<li> Weighting scheme now specified by passing OmWeight object to OmEnquire.
  This also allows user weighting schemes (just subclass OmWeight and
  pass in an instance of this new class).  [This doesn't currently work
  with the remote backend.]

<li> No longer use OmSettings to specify parameters for constructing databases.
  Instead there's a factory function for each database type - temporary naming
  scheme is OmXxx__open(), mostly because it's easy to grep for later.
  Instead of create and overwrite flags, we pass in a value - a new possible
  opening mode is "create or open".  [At present stub databases and the
  machinery in InMemory to allow the multierrhandler1 test aren't working.
  Everything else should be.]

<li> OmEnquire::get_eset() takes parameters instead of an OmSettings object.

<li> Fixed reversed sense of use_query_terms (and fixed reversed sense test in
  apitest which meant this wasn't spotted).

<li> Documentation: Link to annotated class lists in doxygen generated
  documentation instead of the rather empty index pages; added doxygen
  markup so that apidoc now documents header files; updated todo list.

<li> Documentation: intro doc thing was very out of date in places - fixed.

<li> Omega: index .php files as HTML, with the PHP code stripped out; omindex
  return non-zero return code if an unexpected exception is caught; fixed
  HTML parser to not read one character past the end of the document in
  some cases; updated in line with OmSettings related changes to the API;
  Fixed $dbname to return "default" for the default database instead of "";
  templates/query: Removed now unused xDEFAULTOP hidden field, and superfluous
  "}"; dbi2omega now more efficient and can be restricted to listed fields.
  </ul>

<H2>Xapian 0.6.1 <small>(2002-11-28)</small></H2>

<ul>
<li> Fixed to compile with GCC 3.0.

<li> PLATFORMS: Updated.
</ul>

<H2>Xapian 0.6.0 <small>(2002-11-27)</small></H2>

<ul>
<li> Quartz database backend: lexicon disabled (./configure CXXFLAGS=-DUSE_LEXICON
  to reenable it), and encoding schemes simplified and made more compact;
  extended and added test cases; minimum block size is now 2048 bytes (as
  documented before, but now we actually enforce this); btree checking code
  split off and only linked in when required; tidied up btreetest's output.

<li> Replaced our stemmers with those from Snowball.  These give better results,
  and are actively maintained by Martin Porter (who wrote the original Xapian
  stemmers too).  It also means that Xapian now has stemmers for Finnish,
  and Russian, and an implementation of Lovins' English stemmer.

<li> Assorted improvements to the documentation, especially the documentation
  of the internals of the Quartz backend.

<li> Removed the three uses of RTTI (typeid() and dynamic_cast&lt;&gt;) - one was
  totally superfluous, and the other two easily avoided.

<li> Omega and simpleindex example: limit probabilistic term length to 64
  characters to stop the index filling up with junk terms which nobody will
  ever search for.

<li> Omega: Added dbi2omega perl script to dump any database which perl DBI can
  access into the dump format expected by scriptindex.
</ul>

<h2>Xapian 0.5.5 <small>(2002-12-04)</small></h2>

<ul>
<li> Fixed compilation with --enable-debug.

<li> Minor documentation updates.

<li> Omega: Fixed paging on default database; removed xDEFAULTOP from the query
  template as it's no longer used; removed bogus unmatched '}' from query
  template; added dbi2omega perl script to dump any database which perl DBI
  can access into the dump format expected by scriptindex; limit length of
  probabilistic terms generated to 64 characters.
</ul>

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
</body>
</html>
