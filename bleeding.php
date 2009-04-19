<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
<title>The Xapian Project : Bleeding Edge</title>
<? include "styleandmeta.php"; ?>
</head>

<body>

<div id="Content">

<h1>Bleeding Edge</h1>

<p>
If you want a stable version of Xapian, we recommend using a
<a href="download">released version</a>.  But if you're happy to cope
with potential breakage and want to try the latest development code, or
do development yourself, you can access our version control system
which runs on Subversion (known as SVN for short.)
</p>

<p>
The Subversion repository includes
a complete history of the code, including that from the original
Open Muscat project (when converting to SVN we dropped old nightly snapshot
tags and a few
others which it seems highly unlikely anyone would find useful - these
can still be used in the now frozen Xapian CVS tree - see below.)
Additionally, we've recreated copy and rename operations into the Subversion
history (CVS doesn't support copy or rename directly.)</p>

<h2>Access Details</h2>

<p>Note: If you just want to look at the history of a few files, you may find
it easier and quicker to 
<a href="http://trac.xapian.org/browser">browse our SVN repository online (using trac)</a>
(or <a href="http://svn.xapian.org/">using viewvc</a>).</p>

<p>
To get the very latest version of Xapian from our repository, follow these
steps:
<ol>
<li> <tt>svn co svn://svn.xapian.org/xapian/trunk xapian</tt>

<li> Read the "Building from SVN" section in <a href="http://svn.xapian.org/trunk/xapian-core/HACKING?view=co"><tt>xapian-core/HACKING</tt></a> - in particular make sure you have the required tools installed.

<li> In the newly created <tt>xapian</tt> directory, run the command
    <tt>./bootstrap</tt> - this will run various developer tools to produce a
    source tree like you'd get from unpacking release source tarballs.

<li> <tt>bootstrap</tt> will create a top level <tt>configure</tt> script,
    which you can use to configure the whole source tree together.

<li> If you're looking to do development work on Xapian, then the rest of
    <tt>xapian-core/HACKING</tt> is recommended reading.
</ol>

<p>
The latest Search::Xapian (Perl bindings for Xapian) development sources are
now in the tree checked out by the above command.
</p>

<?php if ($_SERVER['QUERY_STRING'] != "") { ?>
<p>
If you have write access, you need to do a small amount of configuration
as we use userv to provide additional security.
</p>

<p>
For access on atreus itself, simply create a <tt>[tunnels]</tt> section in your
<tt>~/.subversion/config</tt> file, and add to it the line:
</p>

<blockquote><tt>
userv = userv xapian-svn svnserve
</tt></blockquote>

<p>
Then you can check out a tree with commit access like so:
</p>
       
<blockquote><tt>
svn co svn+userv:///xapian/trunk xapian
</tt></blockquote>
</p>

<p>
For remote access via ssh, again create a <tt>[tunnels]</tt> section in your
<b>local</b> <tt>~/.subversion/config</tt> file, but instead add this line:
</p>

<blockquote><tt>
ssh+userv=bash -c 'user=${0/@*};host=${0/$user@};ssh $host userv $user svnserve'
</tt></blockquote>

<p>
Then you can check out a tree with commit access like so:
</p>
       
<blockquote><tt>
svn co svn+ssh+userv://xapian-svn@svn.xapian.org/xapian/trunk xapian
</tt></blockquote>
<?php } ?>

<h2>Snapshots</h2>

<p>
We plan to set up an automatic snapshot system which will try to compile and
run the library testsuite every night, and upload a snapshot if all tests pass.
This is not currently operational, but you can
<A HREF="http://oligarchy.co.uk/xapian/trunk/">download completely untested
snapshots</A>,
which are generated once an hour (so long as the code in SVN isn't too
broken for even <tt>make dist</tt> to work).</p>

<p>
The snapshots are built automatically on various different platforms - you
can view the results of these builds in our <a
href="http://oligarchy.co.uk/tinderbox/xapian/status.html">tinderbox</a>
and also MinGW and MSVC build in
<a href="http://buildbot.enfoldsystems.com/xapian/">buildbot</a>.
</p>

<h2>CVS</h2>

<p>Prior to April 2005 we used CVS as our version control system.  The SVN tree
contains the full history, except some useless really old tags weren't
converted.  The (now frozen) Xapian CVS tree
is preserved, but not currently accessible online.
<!--can still be browsed online
at http://cvs.xapian.org/xapian/ should you really want to (we've not
made this a link, to try to avoid people browsing it without really reading
this paragraph and getting confused - such people almost certainly want to
<a href="http://svn.xapian.org/">browse our SVN repository online</a> instead!)
-->
</p>

</div>

<?php
include "cssnav.php";
?>

</body>
</html>
