<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
<title>The Xapian Project : Downloads</title>
<? include "styleandmeta.php"; ?>
</head>

<body>

<div id="Content">

<h1>Downloads</h1>

<p>The <A HREF="#0.7">0.7 branch</A>
features various API changes from earlier versions (notably everything is now in
a Xapian namespace, rather than having an Om or om_ prefix).  But you should
be able to build and use code written for the old API without making
any changes by using the supplied om/om.h compatibility header.</p>

<p>The latest release is <A HREF="news.php#0.7.4">0.7.4</A>
(xapian-examples hasn't changed since 0.7.3
so we've not repackaged it solely to bump the version):</p>

<ul>
<li> <A HREF="http://www.tartarus.org/~olly/xapian-0.7/xapian-core-0.7.4.tar.gz">xapian-core</A>: the Xapian library itself
<li> <A HREF="http://www.tartarus.org/~olly/xapian-0.7/xapian-examples-0.7.3.tar.gz">xapian-examples</A>: small example programs
<li> <A HREF="http://www.tartarus.org/~olly/xapian-0.7/omega-0.7.4.tar.gz">omega</A>: Omega - an application built on Xapian, consisting of indexers and a CGI search frontend.
<li> <A HREF="http://www.tartarus.org/~olly/xapian-0.7/xapian-bindings-0.7.4.tar.gz">xapian-bindings</A>: SWIG bindings allowing Xapian to be used from various scripting languages
</ul>

<h1 id="news">News</h1>

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
