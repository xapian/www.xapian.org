<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
<title>The Xapian Project : Recent Changes</title>
<? include "styleandmeta.php"; ?>
</head>

<body>

<div id="Content">

<h1>Recent Changes</h1>

<A NAME="0.8.0"><H2>Xapian 0.8.0 <small>(2004-04-20)</small></H2></A>

<H3>API</H3>

<ul>
<li> Throw an exception when an empty query is used to build in the binary
operator Query constructor (previously this caused a segfault.  Added
regression test.

<li> Made the TradWeight constructor explicit.  This is technically an API change
as before you could pass a double where a Xapian::Weight was required - now
you must pass Xapian::TradWeight(2.0) instead of 2.0.  That seems desirable,
and it's unlikely any existing code will be affected.

<li> Added "explicit" qualifier to constructors for internal use which take a
single parameter.

<li> Renamed Xapian::Document::add_term_nopos to Xapian::Document::add_term
(with forwarding wrapper method for compatibility with existing code).

<li> The reference counting mechanism used by most API classes now handles
creating a new object slightly more efficiently.

<li> Xapian::QueryParser: Don't use a raw term for a term which starts with a
digit.
</ul>

<H3>testsuite</H3>

<ul>
<li> apitest, quartztest: Added a couple of tests, and commented out some test
lines which fail in debug builds.

<li> quartztest: cause a test to fail if there's still a directory after a call
to rmdir(), or if there isn't a directory after calling mkdir().

<li> apitest: Check returned docids are the expected values in a couple more
cases.  Improved wording of a comment.
</ul>

<H3>quartz backend</H3>

<ul>
<li> We now merge a batch of changes into a posting list in a single pass which
relieves an update bottleneck in previous versions.

<li> When storing the termlist, pack the wdf into the same byte as the reuse
length when possible - doing so typically makes the termlist 14% smaller!
This change is backward compatible (0.7 database will work with 0.8, but
databases built or updated with 0.8 won't work with 0.7).

<li> quartzcheck: Check the structure within the postlist Btree as well as
the Btree structures themselves.

<li> Reduced code duplication in the btree manager and btreechecking code.

<li> quartzdump: Backslash escape space and backslash in output rather than hex
encoding them; renamed start-term and end-term to start-key and end-key;
removed rather pointless "Calling next" message; if there's an error, write
it to stderr not stdout, and exit with return code 1.

<li> Corrected a number of comments in the source.

<li> Removed several needless inclusions of quartz_table_entries.h.

<li> Removed OLD_TERMLIST_FORMAT code - it has been disabled for since 0.6.0.

<li> Removed all the quartz lexicon code and docs.  It's been disabled for ages,
and we've not missed it.
</ul>

<H3>build system</H3>

<ul>
<li> XO_LIB_XAPIAN autoconf macro can now be called without arguments in the
common case where you want the test to fail if Xapian isn't found.

<li> Fixed the configure test for valgrind - it wasn't working correctly when
valgrind was installed but was too a version to support VALGRIND_COUNT_ERRORS
and VALGRIND_COUNT_LEAKS.

<li> GCC 2.95 supported -Wno-long-long and is our minimum recommended version, so
unconditionally use -Wno-long-long with GCC, and don't test for it on other
compilers (the old test incorrectly decided to use it with SGI's compiler
resulting in a warning for every file compiled).
</ul>

<H3>documentation</H3>

<ul>
<li> Updated the quickstart tutorial and removed the warning that "this
document isn't up to date".

<li> docs/intro_ir.html: Added a link to "Information Retrieval" by Keith van
Rijsbergen which can be downloaded from his website!

<li> docs/quartzdesign.html: Some minor improvements.

<li> docs/matcherdesign.html: Merged in more details from a message sent to the
mailing list.

<li> docs/queryparser.html: Grammar fixes.

<li> Doxygen wasn't picking up the documentation for PostingIterator and
PositionListIterator - fixed.  Added doxygen comments for Xapian::Stopper
and Xapian::QueryParser.

<li> PLATFORMS: Updated with many results from tinderbox and from users.

<li> AUTHORS: Updated the list of contributors.

<li> HACKING: XAPIAN_DEBUG_TYPES should be XAPIAN_DEBUG_FLAGS.

<li> HACKING: Updated to mention that building from CVS requires 
`./configure --enable-maintainer-mode' (or use bootstrap).

<li> HACKING: Added notes about using "using", and pointers to a couple of useful
C++ web resources.
</ul>

<H3>portability</H3>

<ul>
<li> Solaris: Code tweaks for compiling with Sun's C++ compiler.

<li> IRIX: Code tweaks for compiling with SGI's C++ compiler.

<li> NetBSD mkdir() doesn't cope with a trailing / on the path - fixed our code to
cope with this.

<li> mingw/cygwin: Only use O_SYNC (on the debug log) if the headers define it.

<li> backends/quartz/quartz_table_manager.cc: Fix for building on mingw.

<li> mingw: Added configure test for link() to avoid infinite loop in our C++
wrapper for link.

<li> mingw and cygwin both need -Wl,--enable-runtime-pseudo-reloc passing when
linking.  Arrange for xapian-config to include this, and check that the ld
installed is a new enough version (or at least that it was at configure
time).  Also pass to programs linked as part of the xapian-core build.

<li> cygwin: Close a QuartzDatabase or QuartzWritableDatabase before trying to
overwrite it - cygwin doesn't allow use to delete open/locked files...

<li> backends/quartz/quartz_termlist.cc: Use Xapian::doccount instead of
unsigned int in set_entries().

<li> Database::Internal::Internal::keep_alive() should be
Database::Internal::keep_alive().

<li> Make Xapian::Weight::Weight() protected rather than private as we want to be
able to call it from derived classes (GCC 3.4 flags this, other compilers
seem to miss it).
</ul>

<H3>debug code</H3>

<ul>
<li> Open debug log with flag O_WRONLY so that we can actually write to it!

<li> backends/quartz/quartz_values.cc: Fixed problem with dereferencing
a pointer to the end of a string in debug output.
</ul>

<H3>examples</H3>

<ul>
<li> delve: `delve -v DATABASE' now reports the number of terms.

<li> Added or improved the short description of each example at the top of
its source file.

<li> Replaced the rather peculiar msearch with quest - a simpler command line
search program which uses Xapian::QueryParser.

<li> simpleindex: We were ignoring the last paragraph if it had no trailing \n
- fixed (bug#24).
</ul>

<H3>omega</H3>

<ul>
<li> scriptindex: Change default to *not* overwriting the database (use
--overwrite if you really want to do this); -u is now accepted but ignored.

<li> scriptindex: Use getopt for option parsing.

<li> omindex: Added --overwrite option which forces an existing database to be
deleted before indexing begins.

<li> templates/xml: Correct spelling of `relavence' to `relevance'.  NB: if you're
parsing the XML output, you'll need to fix this spelling in your parser!

<li> templates/xml: Now set HTTP header: "Content-Type: application/html".

<li> templates/xml: Remove unused OmegaScript code:
`$set{topterms,$or{$ne{$msize,0},$query}}'.

<li> indextext.cc,omindex.cc,scriptindex.cc: Updated to use add_term() instead of
add_term_nopos().

<li> omega: Added $httpheader Omegascript to allow arbitrary HTTP headers and
alternative Content-Type headers to be specified.

<li> omega: If the probabilistic query was bad, don't try to run the match.

<li> omega: Don't crash if there's a date filter but no probabilistic query.

<li> omindex/scriptindex: Raw terms with a multicharacter prefix are now indexed
with a : inserted (e.g. as XFOO:Rterm).  This matches what the query parser
does.

<li> omindex/scriptindex: Don't create R terms for terms which start with a digit.

<li> omindex: Use O_STREAMING and/or posix_fadvise() when reading files to be
indexed (if available).  This helps to keep the Xapian database in cache,
and should greatly improve indexing throughput.

<li> docs/scriptindex.txt: Make more explicit that boolean produces a *single*
boolean term.

<li> docs/cgiparams.txt: Note that START and END should be in the format YYYYMMDD.
</ul>

<H3>bindings</H3>

<ul>
<li> README: Started collecting information on supporting Xapian from even
more languages.

<li> Added configure tests to enable bindings only where the necessary tools
are installed and have a supported version.  ./configure --without-LANGUAGE
allows particular languages to be forcibly disabled.

<li> Added Xapian::Document::add_term() - the new name for add_term_nopos().

<li> A couple of Xapian::Query constructors weren't being wrapped - fixed.

<li> Added Eric B. Ridge's JNI bindings for Java.  The JNI bindings themselves
have been well tested, but integration with the xapian-bindings configure
system hasn't been tested at all - please alert us to any problems.

<li> Xapian can now be used from TCL.

<li> Python: MSet now provides a Python iterator.

<li> Python: OMMSET_* and OMESET_* renamed to MSET_* and ESET_*.

<li> Python: enable directors for MatchDecider, to allow subclassing in Python.

<li> Python: Added basic documentation, and some examples.
</ul>

<A NAME="0.7.5"><H2>Xapian 0.7.5 <small>(2003-11-26)</small></H2></A>

<H3>API</H3>

<ul>
<li> Xapian::QueryParser now supports prefixes on phrases and expressions (e.g.
author:(twain OR poe) subject:"space flight").

<li> Added missing default constructors for TermIterator, PostingIterator, and
PositionIterator classes.

<li> Fixed PositionIterator assignment operator.
</ul>

<H3>testsuite</H3>

<ul>
<li> queryparsertest: Added testcase for new phrase and expression prefix support.

<li> apitest: Added regression tests for API fixes.
</ul>

<H3>backends</H3>

<ul>
<li> quartzcompact: Fix the name that the meta file gets copied to (was
/path/to/dbdirmeta rather than /path/to/dbdir/meta).
</ul>

<H3>build system</H3>

<ul>
<li> Changed to using AM_MAINTAINER_MODE.  If you're doing development work on
Xapian itself, you should configure with "--enable-maintainer-mode" and
ideally use GNU make.

<li> Fixed configure test for fdatasync to work (I suspect a change in a recent
autoconf broke it as it relied on autoconf internal naming).

<li> Fully updated to reflect move of libbtreecheck.la from backends/quartz
to testsuite.  btreetest and quartzcheck should build correctly now.
</ul>

<H3>documentation</H3>

<ul>
<li> Added first cut of documentation for Xapian::QueryParser query syntax.

<li> Fixed incorrectly formatted doxygen documentation comments which resulted in
some missing text in the collated API and internal classes documentation.

<li> Documented --enable-maintainer-mode and problems with BSD make in HACKING.

<li> Fixed typo in docs/scalability.html.

<li> PLATFORMS: Updated from the tinderbox.
</ul>

<H3>omega</H3>

<ul>
<li> omega: Parsing of the probabilistic query is now delayed until we need some
information from it.  This means that we can now use options set by the
omegascript template to control the behaviour of the query parser.
$set{stemmer,...} now controls the stemming language (e.g. $set{stemmer,fr})
and $setmap{prefix,...} now sets the QueryParser prefix map (e.g.
$setmap{prefix,subject,XT,abstract,XA}).

<li> omega: Fixed $setmap not to add bogus entries.

<li> docs/omegascript.txt: Expanded documentation of $set and $setmap to list
values which Omega itself makes use of.

<li> omega: Cleaned up the start up code quite a bit.

<li> omega: Removed the unfinished code for caching omegascript command
expansions.  Added code to cache $dbsize.  The only other value correctly
marked for caching is already being cached!
</ul>

<H2 id="0.7.4">Xapian 0.7.4 <small>(2003-10-02)</small></H2>

<H3>API</H3>

<ul>
<li> Fixed small memory leak if Xapian::Enquire::set_query() is called more than
once.

<li> Xapian::ESet now has reference counted internals (library interface version
bumped because of this).

<li> Removed unused OmDocumentTerm::termfreq member variable.

<li> OmDocumentTerm ctor now takes wdf, and replaced set_wdf() with inc_wdf() and
dec_wdf().

<li> Removed unused open_document() method from SubMatch and derived classes.

<li> Calls made by the matcher to Document::Internal::open_document() now use the
lazy flag provided for precisely this purpose, but apparently never used -
this should give quite a speed boost to any matcher options which use values
(e.g. sort, collapse).
</ul>

<H3>testsuite</H3>

<ul>
<li> Finished off support for running tests under valgrind to check for memory
leaks and access to uninitialised variables.

<li> apitest: Sped up deldoc4.

<li> btreetest: Removed superfluous `/'s from constructed paths.

<li> quartztest: adddoc2 now checks that there weren't any extra values created.
</ul>

<H3>backends</H3>

<ul>
<li> quartz: don't start the document's TermIterator from scratch on every
iteration in replace_document().  Should be a small performance win.

<li> quartz: Pass 0 for the lexicon/postlist table when creating a termlist just
to find the doc length.

<li> quartz: quartz_table_entries.cc: Removed rather unnecessary use of
const_cast.

<li> quartz: quartz_table.cc: Removed unused variable.

<li> quartz: Improved encapsulation of class Btree.
</ul>

<H3>build system</H3>

<ul>
<li> libbtreecheck.la now has an explicit dependency on libxapian.la.

<li> We now set the dependencies for libxapian correctly so that linking
applications will pull in other required libraries.

<li> matcher/Makefile.am: Ship networkmatch.cc even if "make dist" is run from a
tree with the remote backend disabled.

<li> configure.in: Sorted out tests for gethostbyname and gethostbyaddr using
standard autoconf macros.

<li> configure.in: If fork is found, but socketpair isn't, automatically disable
the remote backend rather than configure dying with an error.

<li> autoconf/: Removed various unused autoconf macros.
</ul>

<H3>portability</H3>

<ul>
<li> xapian-config.in: Link with libxapianqueryparser before libxapian, since
that's the dependency order.

<li> Removed or replaced uses of &lt;iostream&gt; and &lt;iosfwd&gt; in the library sources
- we don't need or want the library to pull in cin and friends.

<li> extra/queryparser.yy: Fixed to build with Sun's C++ compiler.

<li> Make the dummy source file C++ rather than C so that automake tells libtool
that this is a C++ library - vital for correct linking on some platforms.

<li> Makefile.am: Pass -no-undefined to libtool so that we can build build a DLL
on MS Windows.

<li> configure.in: Fixed check for socketpair - we were automatically disabling
the remote backend on platforms where socketpair is in libsocket
(such as Solaris).

<li> Use O_BINARY for binary I/O if it exists.

<li> common/utils.h: mkdir() only takes one argument on mingw.

<li> common/utils.h,testsuite/backendmanager.cc: Touch file using open() rather
than system().

<li> common/utils.cc: Fixed to compile if snprintf isn't available.
</ul>

<H3>documentation</H3>

<ul>
<li> docs/scalability.html: Fixed slip (32GB should be 32TB);  Added note about
Linux 2.4 and ext2 filesize limits.

<li> PLATFORMS: Updated.

<li> NEWS: Fixed a few typos.
</ul>

<H3>bindings</H3>

<ul>
<li> xapian.i: using namespace std in SWIG parsed segment to sort out typemaps.
</ul>

<H3>packaging</H3>

<ul>
<li> Updated RPM packaging.
</ul>

<H3>omega</H3>

<ul>
<li> omega: $topdoc now ensures the match has been run; $date no longer ensures
the match has been run.

<li> omega: Fixed to build with Sun's C++ compiler.
</ul>

<H2 id="0.7.3">Xapian 0.7.3 <small>(2003-08-08)</small></H2>

<H3>API</H3>

<ul>
<li> MSetIterator: Fixed MSetIterator::get_document() to work when get_mset() was
  called with first != 0 (regression test msetiterator3).
</ul>

<H3>testsuite</H3>

<ul>
<li> internaltest: Changed test exception1 to actually test something (hopefully
  what was originally intended!)

<li> Added long option support to the testsuite programs (and quartzdump).

<li> Testsuite now builds on platforms for which we use our own stringstream
  implementation.

<li> Only use \r in test output if the output is a tty.

<li> Increased default timeout used by tests running on the remote backend from 10
  seconds to 5 minutes to avoid tests failing just because the machine running
  them is slow and/or busy.

<li> Fixed check for broken exception handling - we were getting "Xapian::"
  prefixed to one version and not on the other.

<li> tests/runtest: Set srcdir if it isn't already to make it easy to manually run
  test programs from a VPATH build.

<li> apitest: Check termfreq in allterms4.
</ul>

<H3>backends</H3>

<ul>
<li> quartz: Fixed allterms TermIterator to not give duplicate terms when a
  posting list is chunked; added regression test (allterms4).

<li> quartz: Check for EINTR when reading or writing blocks and retry the
  operation.  This should mean quartz won't fail falsely if a signal is
  received (e.g. if alarm() is used).
</ul>

<H3>build system</H3>

<ul>
<li> Renamed libomqueryparser to libxapianqueryparser - for backward compatibility
  we still provide a library with the old name for now.

<li> xapian.m4: Added XO_LIB_XAPIAN to replace OM_PATH_XAPIAN.  XO_LIB_XAPIAN will
  automagically enable use of "xapian-config --ltlibs" if A[CM]_PROG_LIBTOOL is
  used in configure.in.

<li> xapian-config: Now supports linking with libtool - using libtool means that
  the run-time library path is set and that you can now link with an
  uninstalled libxapian.  Also xapian-config will now work once xapian-core's
  configure has been run, rather than only after "make all".

<li> xapian-config: Now automatically tries to link libxapianqueryparser too.

<li> bootstrap: Removed bootstrap scripts in favour of top-level bootstrap which
  creates a top-level configure you can optionally use to configure all checked
  out Xapian modules with one command, and which creates a top level Makefile
  to build all checked out Xapian modules with one command.

<li> Added versioning information to libxapian and libxapianqueryparser.

<li> xapian-example/omega: Use libtool and XO_LIB_XAPIAN so we can link with an
  uninstalled Xapian, and so the run time load path gets built into the
  binaries (no need to set LD_LIBRARY_PATH just because you install Xapian with
  a non-standard prefix).

<li> configure: Stop the API documentation from being regenerated when
  include/xapian/version.h changes (since it's generated by configure).

<li> Fixed "make dist" in VPATH builds.
</ul>

<H3>portability</H3>

<ul>
<li> common/getopt.h: #include &lt;stdlib.h&gt;, &lt;stdio.h&gt;, and &lt;unistd.h&gt; before
  defining getopt as a macro - this avoids problems with clobbering prototypes
  of getopt() in system headers.

<li> bin/quartzcompact.cc: Need stdio.h for rename().

<li> languages/Makefile.am: Fixed compilation for compilers other than GCC.

<li> Moved rset serialisation into a method of RSet::Internal, so
  omrset_to_string() is now just glue code.  This eliminates the need for it to
  be a friend of RSet::Internal which Sun's C++ compiler didn't seem to be able
  to cope with.
</ul>

<H3>documentation</H3>

<ul>
<li> Fix incorrect documentation comment for Enquire::set_set_forward().  (Looked
  like a cut&amp;paste error)

<li> COPYING: Updated FSF address, and reinstated missing section: "How to Apply
  These Terms to Your New Programs"

<li> PLATFORMS: Updated some linux results: RH7.3 on x86, and Debian on alpha and
  arm; Updated FreeBSD success report; Updated with results from the tinderbox.

<li> docs/mkdoc.pl: Don't choke on a comment at the end of the DIST_SUBDIRS line
  in a Makefile.am.

<li> HACKING: Improved note about why libtool 1.5 is needed.

<li> HACKING: Added note about additional tools needed for building a
  distribution.
</ul>

<H3>bindings</H3>

<ul>
<li> Fixed VPATH builds.

<li> python: Fixed to link with libomqueryparser.

<li> guile,tcl8: Updated typemaps to SWIG 1.3 style.
</ul>

<H3>omega</H3>

<ul>
<li> omindex.cc: Added missing `#include &lt;errno.h&gt;'.

<li> omindex/scriptindex: Fixed signed character issue in accent normalisation.

<li> omindex: fixed memory and file descriptor leak on indexing a zero-sized file.

<li> omindex: Fixed sense of test for unreadable files.

<li> omindex: Improved log messages to distinguish re-indexed/added.

<li> omindex,omega,scriptindex: Fixed to compile with mingw.

<li> omindex: Fixed to compile with GNU getopt so we can build on non-glibc
  platforms.
</ul>

<H3>examples</H3>

<ul>
<li> msearch: Quick fix to get mingw building going.

<li> getopt: Copied over our fixes for better C++ compatibility.

<li> simplesearch: Stem search terms.

<li> simpleindex: Fixed not to run words together between lines.

<li> simpleindex: Create database if it doesn't exist.
</ul>

<H2 id="0.7.2">Xapian 0.7.2 <small>(2003-07-11)</small></H2>

<H3>testsuite</H3>

<ul>
<li> Fixed NULL pointer dereference when a test threw an unexpected exception.
</ul>

<H3>backends</H3>

<ul>
<li> Quartz: When asked to create a quartz database, try to create the directory
  if it doesn't already exist.  Then we don't have to do it in every single
  Xapian program which wants to create a database...
</ul>

<H3>portability</H3>

<ul>
<li> common/getopt.h: Fixed to work better with C++ compilers on non-glibc
  platforms.

<li> common/utils.h: missing #include &lt;ctype.h&gt;

<li> Quartz: Defined _XOPEN_SOURCE=500 for GLIBC so we get pread() and pwrite().

<li> common/utils.h: Improved mingw implementation of rmdir().
</ul>

<H3>documentation</H3>

<ul>
<li> PLATFORMS: Added MacOS X 10.2 success report.

<li> Improvements to doxygen-generated documentation.
</ul>

<H3>bindings</H3>

<ul>
<li> Moved to separate xapian-bindings module.

<li> Added configure check for SWIG version (require at least 1.3.14).

<li> bindings/swig/xapian.i: Fixed over-enthusiastic automatic conversion of
  termname to std::string.

<li> PHP4 bindings much closer to working once again; updated guile and tcl8
  somewhat.
</ul>

<H3>omega</H3>

<ul>
<li> omega: If the same database is listed more than once, only search the first
  occurrence.
 
<li> omega: use snprintf to help guard against buffer overflows.
</ul>

<H2 id="0.7.1">Xapian 0.7.1 <small>(2003-07-08)</small></H2>

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

<H2 id="0.7.0">Xapian 0.7.0 <small>(2003-07-03)</small></H2>

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
  Perl and Java bindings dropped; for Perl, use Search::Xapian from CPAN; New
  Java JNI bindings will be released shortly.
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

</div>

<?php
include "cssnav.php";
?>

</body>
</html>
