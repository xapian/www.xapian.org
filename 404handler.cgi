#!/usr/bin/perl
use strict;
use warnings;

my $docroot = '/srv/www/xapian.org';
my $path = $ENV{REDIRECT_URL};

my $trac_root_url = 'https://trac.xapian.org/'

if (!defined $path) {
    print <<"END";
Status: 404 Not Found
Content-Type: text/plain

404 Not Found
END
    exit 0;
}

sub redirect {
    print <<"END";
Location: $_[0]
Status: 301 Moved Permanently
Content-Type: text/plain

301 Moved Permanently
END
    exit 0;
}

if ($path eq '/C') {
    # Shortened URL from CVS or SVN commit email.
    my ($file, $rev, $rev2) = split /\?/, $ENV{REDIRECT_QUERY_STRING};
    my $redirect;
    if ($file =~ /^[0-9]+$/) {
	# This is a redirect to SVN - luckily CVS Xapian had no files with
	# entirely numeric names!
	($file, $rev) = ($rev, $file);
	$redirect = $trac_root_url;
	if ($rev2 ne '' && $file ne '') {
	    $redirect .= 'browser/' . $file . '?rev=' . $rev;
	} elsif ($file ne '') {
	    $redirect .= 'changeset/' . $rev . '/' . $file . '#file0';
	} else {
	    $redirect .= 'changeset/' . $rev;
	}
    } else {
	# CVS
	$redirect = 'http://svn.xapian.org/' . $file . '?root=XapianCVS';
	if ($rev eq '') {
	    # deleted file
	} elsif ($rev2 eq '') {
	    # added file
	    $redirect .= '&rev=' . $rev . '&content-type=text/vnd.viewcvs-markup';
	} else {
	    # updated file
	    $redirect .= '&r1=' . $rev . '&r2=' . $rev2;
	}
    }
    redirect($redirect);
}

if ($path =~ /\.\./) {
    fail();
}

# Drop trailing punctuations sometimes seen on URLs parsed from text.
# Also drop trailing / so the patterns below can work in that case too.
# And remove any bogus query or fragment in the path part of the URL.
if ($path =~ s@[])>"',.*/]+$@@ || $path =~ s/[#&].*//) {
    if ($path eq '/search' || -f "$docroot$path.html") {
	redirect("http://xapian.org$path");
    }
    if (-d "$docroot$path") {
	redirect("http://xapian.org$path/");
    }
    if (-f _ && $path =~ /(.*)\.html$/) {
	redirect("http://xapian.org$1");
    }
}

if ($path eq '' || $path eq 'http://xapian.org') {
    redirect("http://xapian.org/");
}

if ($path eq '/docs/bindings/tcl') {
    redirect("http://xapian.org/docs/bindings/tcl8/");
}

if ($path eq '/docs/bm') {
    redirect("http://xapian.org/docs/bm25");
}

if ($path eq '/docs/serialistion.html') {
    redirect("http://xapian.org/docs/serialisation");
}

# Redirect old URLs somewhere helpful.
if ($path eq '/omega.cgi') {
    redirect("http://xapian.org/search?$ENV{REDIRECT_QUERY_STRING}");
}
if ($path =~ /(.*)\.php$/)  {
    my $p = $1;
    if ($p eq '/bugs/index') {
	redirect("http://xapian.org/bugs");
    }
    if ($p eq '/cvs') {
	redirect("http://xapian.org/bleeding");
    }
    if ($p eq '/index') {
	redirect("http://xapian.org/");
    }
    if ($p eq '/news') {
	redirect("http://xapian.org/download");
    }
    if ($p eq '/search') {
	redirect("http://xapian.org$p?$ENV{REDIRECT_QUERY_STRING}");
    }
    if (-f "$docroot$p.html") {
	redirect("http://xapian.org$p");
    }
    fail();
}

if ($path =~ /(.*)\.htm$/)  {
    if (-f "$docroot$1.html") {
	redirect("http://xapian.org$1");
    }
    fail();
}

if ($path eq '/cgi-bin/bugzilla/show_bug.cgi') {
    if (exists $ENV{REDIRECT_QUERY_STRING} &&
	$ENV{REDIRECT_QUERY_STRING} =~ /\bid=(\d+)\b/) {
	redirect($trac_root_url. "ticket/$1");
    }
    fail();
}

if ($path =~ m,/cgi-bin/bugzilla, ||
    $path =~ m,/bugzilla,) {
    redirect($trac_root_url . "report/1");
}

# These won't work as they are valid URLs so won't reach the 404 handler:
# RedirectPermanent /index.html http://xapian.org/
# RedirectPermanent /omega.conf http://xapian.org/omega.cgi

fail();

sub fail {
    # Show nice error page with search box pre-filled based on the URL.

    my $query = $ENV{REDIRECT_URL};
    $query =~ s,^/+,,;
    $query =~ s,/+$,,;
    $query =~ s,\.\w+$,,;
    $query =~ s,[/".]+, ,g;

    # Escape suitably.
    $query =~ s/&/&amp;/g;
    $query =~ s/</&lt;/g;
    $query =~ s/>/&gt;/g;
    $query =~ s/"/&quot;/g;

    print <<"END";
Status: 404 Not Found
Content-Type: text/html; charset=utf-8

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Page not found</title>
<link rel="stylesheet" type="text/css" media="print" href="print.css" />
<link rel="icon" href="/apple-touch-icon-precomposed.png" sizes="180x180">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
<link rel="icon" href="/favicon.ico" type="image/x-icon" />
<style type="text/css" media="screen">
<!--
\@import "layout2.css";
//-->
</style>
</head>

<body>

<div id="Content">

<img src="xapian-logo.png" alt="The Xapian Project">

<p>The page you requested couldn't be found on the Xapian project website.</p>

<p>You can try searching for it using the form below:</p>

<form method="GET" action="search">
<input type="search" name="P" value="$query" size="20">
<input type="submit" value="Search">
</form>

</body>
</html>
END
    exit 0;
}
