<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2//EN">
<html><head><title>The Xapian Project : Downloads</title></head>
<body bgcolor="#FFFFFF" text="#000000">
<?php
include "navbar.php";
print $navbar;
?>
<hr>

<center><h1>Downloads</h1></center>

The 0.7 branch features various API changes (notably everything is now in
a Xapian namespace, rather than having an Om or om_ prefix).  Old code
should still build if you use the supplied om/om.h compatibility header.
However, the changes between 0.6.5 and 0.7.0 are extensive so you should
test carefully before deploying 0.7 in a production environment (and
let us know how you get on).

<P>
The 0.6 branch features improved compression in the quartz database backend
(~20% smaller), but it can't read databases produced by 0.5.X or earlier.
Also the stemmers have been updated to Martin Porter's Snowball stemmers,
which give better (but therefore different) results.  Both of these mean
you'll need to rebuild your database when upgrading to 0.6 or later.

<P>
The revised quartz format shouldn't change further for a while
(and when it does, the old format will be supported).

<h2>0.5.4</h2>

The latest 0.5.X series release version is <A HREF="#0.5.5">0.5.5</A>.
There are 3 tarballs (xapian-examples hasn't changed since 0.5.1
so we've not repackaged it solely to bump the version):

<ul>
<li> <A HREF="http://www.tartarus.org/~olly/xapian-0.5.5/xapian-core-0.5.5.tar.gz">xapian-core</A>: the Xapian library itself
<li> <A HREF="http://www.tartarus.org/~olly/xapian-0.5.1/xapian-examples-0.5.1.tar.gz">xapian-examples</A>: small example programs
<li> <A HREF="http://www.tartarus.org/~olly/xapian-0.5.5/omega-0.5.5.tar.gz">omega</A>: Omega - an application built on Xapian, consisting of indexers and
a CGI search frontend.
</ul>

<h2>0.6.5</h2>

The latest 0.6.X series release is <A HREF="#0.6.5">0.6.5</A>
(xapian-examples hasn't changed since 0.6.3
so we've not repackaged it solely to bump the version):

<ul>
<li> <A HREF="http://www.tartarus.org/~olly/xapian-0.6/xapian-core-0.6.5.tar.gz">xapian-core</A>: the Xapian library itself
<li> <A HREF="http://www.tartarus.org/~olly/xapian-0.6/xapian-examples-0.6.3.tar.gz">xapian-examples</A>: small example programs
<li> <A HREF="http://www.tartarus.org/~olly/xapian-0.6/omega-0.6.5.tar.gz">omega</A>: Omega - an application built on Xapian, consisting of indexers and
a CGI search frontend.
</ul>

<h2>0.7.1</h2>

The latest release is <A HREF="#0.7.1">0.7.1</A>:
(xapian-examples hasn't changed since 0.7.0
so we've not repackaged it solely to bump the version):

<ul>
<li> <A HREF="http://www.tartarus.org/~olly/xapian-0.7/xapian-core-0.7.1.tar.gz">xapian-core</A>: the Xapian library itself
<li> <A HREF="http://www.tartarus.org/~olly/xapian-0.7/xapian-examples-0.7.0.tar.gz">xapian-examples</A>: small example programs
<li> <A HREF="http://www.tartarus.org/~olly/xapian-0.7/omega-0.7.1.tar.gz">omega</A>: Omega - an application built on Xapian, consisting of indexers and
a CGI search frontend.
</ul>

<A NAME="news"><center><h1>News</h1></center></A>

<A NAME="0.7.1"><H2>Xapian 0.7.1 <small>(2003-07-08)</small></H2></A>

<H3>testsuite</H3>

<ul>
<li> Fixed testsuite programs to not try to use "rm -rf" under mingw.
</ul>

<H3>backends</H3>

<ul>
<li> Quartz: Use pread() and pwrite() on platforms which support them.  Doing so
  avoids one syscall per block read/write.

<li> Quartz block count is now unsigned, which should nearly double the size of
  database for a given block size.  Not tested this yet.
</ul>

<H3>omega</H3>

<ul>
<li> omindex: Fixed compilation problem in 0.7.0.
</ul>

<H3>documentation</H3>

<ul>
<li> Added new document discussing scalability issues.

<li> PLATFORMS: Updated.
</ul>

<A NAME="0.7.0"><H2>Xapian 0.7.0 <small>(2003-07-03)</small></H2></A>

<H3>API</H3>

<ul>
<li> Moved everything into a Xapian namespace, which the main header now being
  xapian.h (rather than om/om.h).

<li> Three classes have been renamed for better naming consistency:
  OmOpeningError is now Xapian::DatabaseOpeningError, OmPostListIterator is
  now Xapian::PostingIterator, and OmPositionListIterator is now
  Xapian::PositionIterator.

<li> xapian.h includes &lt;iosfwd&gt; rather than &lt;iostream&gt;
  - if you were relying on
  the implicit inclusion, you'll need to add an explicit "#include &lt;iostream&gt;".

<li> Replaced om_termname with explicit use of std::string - om_termname was just
  a typedef for std::string and the typedef doesn't really buy us anything.

<li> Older code can be compiled by continuing to use om/om.h which uses #define
  and other tricks to map the old names onto the new ones.

<li> Define XAPIAN_VERSION (e.g. 0.7.0), XAPIAN_MAJOR_VERSION (e.g. 0), and
  XAPIAN_MINOR_VERSION (e.g. 7).

<li> Updated omega and xapian-examples to use Xapian namespace.
</ul>

<H3>queryparser</H3>

<ul>
<li> Xapian::QueryParser: Accent normalisation added; Improved error reporting;
  Fixed to handle the most common examples found in the wild which used to give
  "parse error".
</ul>

<H3>bindings</H3>

<ul>
<li> Python bindings brought up to date - use ./configure --enable-bindings to
  build them.  Requires Python &gt;= 2.0 - may require Python &gt;= 2.1.
  
<li> Enabled optional building of bindings as part of normal build process.  Old
  Perl and Java bindings dropped; for Perl, use Search::Xapian from CPAN; Java
  JNI bindings will be replaced with a SWIG-based implmentation.
</ul>

<H3>internal implementation changes</H3>

<ul>
<li> Removed one wrapper layer from the internal implementation of most API
  classes.

<li> Xapian::Stem now uses reference counted internals.

<li> Internally a lot of cases of unnecessary header inclusion have been removed
  or replaced with forward declarations of classes.  This should speed up
  compilation and recompilation of the Xapian library.

<li> Suppress warnings in Snowball generated C code.

<li> Reworked query serialisation in the remote backend so that the code is now
  all in one place.  The serialisation is now rather more compact and no longer
  relies on flex for parsing.
</ul>

<H3>testsuite</H3>

<ul>
<li> Moved all the core library tests to tests subdirectory.

<li> apitest now allows backend to be specified with "-b" rather than having to
  mess with environmental variables.

<li> Testsuite programs can now hook into valgrind for leak checking, undefined
  variable checking, etc.
</ul>

<H3>backends</H3>

<ul>
<li> Fixed parsing of port number in remote stub databases.

<li> Quartz: Improved error message when asked to open a pre-0.6 Quartz database.

<li> Quartz backend: Workaround for shared_level problem turns out to
  be arguably the better approach, so made it permanent and tidied up
  code.
</ul>

<H3>build system</H3>

<ul>
<li> Build system fixed to never leave partial files in place of the expected
  output if a build is interrupted.

<li> quartzcheck, quartzdump, and quartzcompact are now built by "make" rather
  than only by "make check".

<li> xapian-config: Removed --prefix and --exec-prefix - you can't reliably
  install Xapian with a different prefix to the one it was configured with,
  yet these options give the impression you can.
</ul>

<H3>miscellaneous</H3>

<ul>
<li> Fixed sending debug output to a file with XAPIAN_DEBUG_LOG with a value which
  didn't contain "%%" (%% expands to the current PID).

<li> Fixed Xapian::MSetIterator::get_collapse_count() to work as intended.
</ul>

<H3>omega</H3>

<ul>
<li> omindex,scriptindex: Normalise accents in probabilistic terms.

<li> omindex: Read output from pstotext and pdftotext via pipes rather
  than temporary files to side-step the whole problem of secure temporary file
  creation; Use pdfinfo to get the title and keywords from when indexing a PDF;
  Safe filename escaping tweaked to not escape common safe punctuation.

<li> omindex: Implement an upper limit on the length of URL terms - this is a
  slightly conservative 240 characters.  If the URL term would be longer than
  this, its last few bytes are replaced by a hash of the tail of the URL.  This
  means that (apart from hopefully very rare collisions) urlterms should still
  be unique ids for documents.  This is forward and backward compatible for
  URLs less than 240 characters.

<li> omindex: Clean up processing of HTML documents:
  <ul>
  <li> Ignore the contents of &lt;script&gt; and &lt;style&gt; tags in HTML.
  <li> Strip initial whitespace in each tag in an HTML document.
  <li> Try not to split words in half when truncating title and summary.
  </ul>

<li> query.cc: Set STEM_LANGUAGE near the start of the file so it's easy
  for users to change until we get better configurability.

<li> omega: Replaced half-hearted logging support with flexible OmegaScript-based
  approach with new $log command.  Also added $now to allow the current
  date/time to be logged.

<li> templates/xml: added collapse info to xml template.
</ul>

<H3>documentation</H3>

<ul>
<li> Assorted minor documentation improvements.

<li> PLATFORMS: Updated.
</ul>

<H3>rpms</H3>

<ul>
<li> Improved RPM packaging of xapian-core and omega.
</ul>

<A NAME="0.6.5"><H2>Xapian 0.6.5 <small>(2003-04-10)</small></H2></A>

<ul>
<li> OmEnquire: optimised the handling when sort_bands == 1 and fixed incorrect
  results in this and some other sorting cases; added some sorting testcases.
  
<li> OmMSetIterator: added get_collapse_count() which returns a lower bound on
  the number of items which were removed by collapsing onto the current item.

<li> OmStem: added default OmStem constructor and "none" language.  Both of these
  give a stemmer object which leaves terms unchanged which should allow for
  simpler logic in programs using Xapian.  The default constructor also removes
  the need to mess with pointers in some cases.

<li> Automatically disable the remote backend if we don't have fork() since the
  remote backend requires it in several places.

<li> Fixed to build with debug enabled.
 
<li> testsuite: fixed to still build when some backends are disabled.

<li> extra/parsequerytest.cc: Fixed to build with GCC 2.95.

<li> Testsuite: Added regression test for Quartz bug which caused problems with
  long terms on machines with signed chars.

<li> testsuite/index_utils.cc: Handling of ^x was just downright wrong due to a
  typo.

<li> Improved portability: Fix for 64 bit machines.  Fixed btreetest to build with
 older compilers lacking &lt;sstream&gt;.  Xapian is now much closer to building
  with Sun's CFront-based Sun Pro C++ compiler, and with a Linux to mingw
  cross-compiler.

<li> PLATFORMS: Updated with the results of many test builds.

<li> Improved RPM packaging of xapian-core and omega.

<li> Documentation: Use http://www.doxygen.org/ as URL for doxygen; Fixed bad link
  to our own website in overview.html; code_structure.html now only includes
  directories in the build system.

<li> HACKING: updated.

<li> Removed bugs/todo.xml, TODO, TODO.release, docs/todo.html, and
  docs/todo-release.html from the distribution.  Bugs and todo items will be
  tracked in Bugzilla instead.

<li> Install docs in /usr/share/doc/xapian-core instead of /usr/share/xapian-core.

<li> omega: If xP and P are both empty, there may be a boolean query, so don't
  force first page of hits.

<li> omega: Fixed off-by-one error in rounding down topdoc - it was possible to
  get to an empty page of hits if there were exactly a multiple of HITSPERPAGE
  matches and the matcher over-estimated the number of matches and Omega
  displayed page links.

<li> omega: Fixed handling of multiple DB parameters to be as documented.

<li> omega: Added $collapsed to report get_collapse_count() for the current hit.

<li> omega: Added $transform{} which does regexp manipulation (currently disabled
  until configure tests for regexp library are added)
	  
<li> omega: Added $uniq{} to eliminate duplicates from a sorted list.
	  
<li> omega: Don't force page 1 for a query with repeated terms!

<li> omega: removed duplicates from terms listed in term frequencies.

<li> omega: Added cgi parameter COLLAPSE to collapse on key values

<li> omega: Added $value{key[,docid]} support to omegascript

<li> omega: Renamed DATE1, DATE2, and DAYSMINUS to the more meaningful START, END,
  and SPAN (NB SPAN is days before END, or after START, or before today -
  whereas SPAN was before *DATE1* or before today).  The old parameters names
  are supported (with the original semantics) for now.

<li> omega: Actually install documentation!

<li> templates/query: propagate B boolean filters

<li> templates/godmode: removed link to EuroFerret image

<li> templates/godmode: added value dumping, for values from 0-255

<li> omindex: Report correct version number (was hard-wired to 1.0!)

<li> scriptindex: Allow '_' in fieldnames.  Diagnose bad characters in fieldnames
  better.

<li> dbi2omega: Added DBUSER and DBPASSWD environmental variable support so that
  password protected DBs can easily be used

<li> scriptindex.cc: added missing "#include &lt;stdio.h&gt;" which caused
  builds to fail for some platforms.
</ul>

<H2>Xapian 0.6.4 <small>(2002-12-24)</small></H2>

<ul>
<li> Quartz backend: Fixed double setting of position list when updating a
  document with term position information (overall result was correct, just
  inefficient); when deleting a position_list, don't check if it's empty,
  just ask the layer below to delete it and let it handle the case when
  there's nothing to delete; Fixed unpacking of termlist on platforms where
  char is signed.

<li> OmQueryParser: Added support for searching probabilistic fields (using
  &lt;field&gt;:&lt;term&gt;); the unstem multimap now includes "." on the end of a
  term if it was there in the query.

<li> Don't include "om.h" as a dependency for the api docs since it's generated
  a configure time and the dependency was forcing users to regenerate the
  documentation, which requires doxygen to be installed.

<li> Bindings: Python bindings updated to work with the updated API (still
  disabled by default).

<li> Muscat 3.6 backend: Fixed to build with the new database factory functions;
  fixed compilation warnings; Muscat 3.6 DA and DB databases don't support
  positional information.  Instead of throwing an exception when we try to
  access it, return an empty position list (like a quartz database with no
  position information would).  This allows copydatabase to be used to convert
  a Muscat 3.6 database to a quartz one.

<li> Documentation: quartzdesign and todo list updated.

<li> quartzcheck: default mode changed to "v" rather than "+", since "+" is too
  verbose for a btree of any size; if you pass a quartz database directory,
  quartzcheck will now check all the tables which make up a quartz database.

<li> quartzcompact: new tool which makes a copy of a quartz database with full
  compaction turned on - this results in a smaller database which is faster
  to search.  The next update will result in a lot of block splitting though
  (since all blocks are as full as possible).

<li> omega: Added $unstem to map a stemmed term to the form(s) used in the query;
  $queryterms now only includes the first occurence of each stemmed form;
  $prettyterm makes use of the unstem map; prefer MINHITS to MIN_HITS and
  RAWSEARCH to RAW_SEARCH since none of the other CGI parameter names have
  _ separating words (continue to support old names for now); fixed default
  template to not generate topterms twice, and fixed topterms to not stick
  outside the green box; corrected omegascript docs - it's $setrelevant
  not $set_relevant.

<li> scriptindex: index=nopos with new indexnopos action; index and indexnopos now
  take an optional prefix argument; index=nopos is handled specially for
  backwards compatibility; added new data action to generate terms for date
  range searching.
</ul>

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

<A NAME="0.5.5"><h2>Xapian 0.5.5 <small>(2002-12-04)</small></h2></A>

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
