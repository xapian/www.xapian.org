<? include "niceurl.php"; ?>
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
do development yourself, you can access our version control system.
Currently this runs on <a href="http://subversion.apache.org/">Subversion</a>
(known as SVN for short), with a read-only
<a href="http://git-scm.com/">Git</a> mirror.
</p>

<p>
The Subversion repository includes
a complete history of the code, including that from the original
Open Muscat project (when converting to SVN we dropped old nightly snapshot
tags and a few
others which it seems highly unlikely anyone would find useful - if you
really need these for some reason, contact us for a copy of the archived
Xapian CVS tree.)
Additionally, we've recreated copy and rename operations into the Subversion
history (CVS doesn't support copy or rename directly.)</p>

<h2>Access Details</h2>

<p>Note: If you just want to look at the history of a few files, you may find
it easier and quicker to 
<a href="http://trac.xapian.org/browser">browse our SVN repository online (using trac)</a>
(or <a href="http://svn.xapian.org/">using viewvc</a>).</p>

<h3 id="svn">Using Subversion</h3>

<p>
To get the very latest version of Xapian (including the Search::Xapian Perl
bindings) from our repository, follow these steps:
</p>

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

<h3 id="git">Using Git</h3>

<p>
We have a read-only git mirror of the SVN repository.  This is updated
automatically in response to commits to SVN, so should be at most a
few minutes behind.
<p>

<p>
Check out like so:
</p>

<ol>
<li> <tt>git clone git://git.xapian.org/xapian</tt>

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
All branches should be available via git (you can list them with
<code>git branch -r</code>) and new branches and tags should get added
automatically now.
</p>

<?php if ($_SERVER['QUERY_STRING'] != "") { ?>

<h2>Write Access</h2>

<p>
We provide write access in one of two ways, either using WebDAV over https or
over ssh (generally you'll be given one sort of access <b>or</b> the other, not
both).  There's a section describing how to set up for each below.
</p>

<h3>WebDAV over https</h3>

<p>
If your username is <i>fred</i> then execute the following command:
</p>

<blockquote><tt>
svn --username fred ls https://svn-dav.xapian.org:8443/xapian/
</tt></blockquote>

<p>
The certificate we use for HTTPS is issued by <a href="http://www.cacert.org/"
>CAcert</a> so unless your subversion client is already configured to trust
such certificates you will get the following warning:
</p>

<blockquote><pre>
Error validating server certificate for 'https://svn.xapian.org:8443':
 - The certificate hostname does not match.
Certificate information:
 - Hostname: svn-dav.xapian.org
 - Valid: from Sun, 19 Apr 2009 03:48:43 GMT until Tue, 19 Apr 2011 03:48:43 GMT
 - Issuer: http://www.CAcert.org, CAcert Inc.
 - Fingerprint: 2a:72:69:71:fd:da:dc:97:0c:f5:de:2a:73:8b:f5:78:51:26:ba:72
(R)eject, accept (t)emporarily or accept (p)ermanently?
</pre></blockquote>

<p>
If you do, verify the fingerprint is as above.  If the fingerprint
doesn't match, or you have other concerns, talk to the other developers
and don't just accept the certificate.  If you're happy with it, you
can either accept it temporarily (and be asked to confirm it for every
"session", though not every remote svn operation), or permanently.  We
recommend you accept it permanently as otherwise you need to recheck
the fingerprint repeatedly which makes it more likely you might accidentally
accept a spoofed certificate (so press <i>p</i>).
</p>

<p>
You'll then be asked for your password:
</p>

<blockquote><pre>
Authentication realm: &lt;https://svn.xapian.org:8443&gt; Xapian Subversion Repository
Password for 'fred':
</pre></blockquote>

<p>
Assuming you type your password correctly, you should get a list of the top
level directories in the SVN tree:
</p>

<blockquote><pre>
branches/
tags/
trunk/
</pre></blockquote>

<p>
Your password <b>may</b> be cached in plaintext in your home directory -
if your machine isn't well secured, you should ensure that it is being
encrypted, or disable this caching.  See the relevant <a
href="http://subversion.tigris.org/faq.html#plaintext-passwords">Subversion
FAQ entry</a> for more information.
</p>

<p>
Now you can check out a tree with commit access like so:
</p>

<blockquote><tt>
svn co https://svn-dav.xapian.org:8443/xapian/trunk xapian
</tt></blockquote>

<h3>ssh</h3>

<p>
You will need to do a small amount of configuration as we use userv to provide
additional security.
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
