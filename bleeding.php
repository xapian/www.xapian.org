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
<a href="download.php">released version</a>.  But if you're happy to cope
with potential breakage and want to try the latest development code, or
do development yourself, you can access our version control system.
</p>

<h2>Subversion</h2>

<p>As of April 2005, we've switched version control systems from CVS to
Subversion (also known as SVN for short).  The Subversion repository includes
a complete history of the code, including that from the original
Open Muscat project (when converting to SVN we dropped old nightly snapshot
tags and a few
others which it seems highly unlikely anyone would find useful - these
can still be used in the now frozen Xapian CVS tree).
Additionally, we've recreated copy and rename operations into the Subversion
history (CVS doesn't support copy or rename directly).</p>

<p>Our Subversion repository can also be
<a href="http://svn.xapian.org/">browsed online</a>.</p>

<p>
To get the very latest version of Xapian from our repository, follow these
steps:
<ol>
<li> <tt>svn co svn://svn.xapian.org/xapian/trunk xapian</tt>
</blockquote>
<li> In the newly created <tt>xapian</tt>
    directory, run the command <tt>./bootstrap</tt> - this will run various
    developer tools to produce a
    source tree like you'd get from unpacking release source tarballs.
<li> <tt>bootstrap</tt> will create a top level <tt>configure</tt> script,
    which you can use to configure the whole source tree together.
<li> If you're looking to do development work on Xapian, then
  <tt>xapian-core/HACKING</tt> is recommended reading.
</ol>

<p>
We plan to set up an automatic snapshot system which will try to compile and
run the library testsuite every night, and upload a snapshot if all tests pass.
This is not currently operational, but you can
<A HREF="http://www.oligarchy.co.uk/xapian/trunk/">download completely untested
snapshots</A>,
which are generated every 20 minutes (so long as the code in SVN isn't too
broken for even <tt>make dist</tt> to work).</p>

<?php if ($QUERY_STRING != "") { ?>
<p>
If you have write access, you need to do a small amount of configuration
as we use userv to provide additional security.
</p>

<p>
For access on ixion itself, simply create a <tt>[tunnels]</tt> section in your
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
ssh+userv = sh -c 'ssh $0 userv xapian-svn svnserve'
</tt></blockquote>

<p>
Then you can check out a tree with commit access like so:
</p>
       
<blockquote><tt>
svn co svn+ssh+userv://svn.xapian.org/xapian/trunk xapian
</tt></blockquote>
<?php } ?>

<h2>CVS</h2>

<p>If you're interested in source archeology, you can
<a href="http://cvs.xapian.org/xapian/">browse</a>
the (now frozen) Xapian CVS tree online.  
And you can check out a source tree from CVS like so:</p>
<ul>
 <li> <tt>cvs -z3 -d:pserver:cvsuser@cvs.xapian.org:/usr/data/cvs login</tt>
 <li> enter the password <tt>anonymous</tt>
 <li> <tt>cvs -z3 -d:pserver:cvsuser@cvs.xapian.org:/usr/data/cvs co xapian</tt>
</ul>

</div>

<?php
include "cssnav.php";
?>

</body>
</html>
