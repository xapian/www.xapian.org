<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
<title>The Xapian Project : Bugs</title>
<? include "styleandmeta.php"; ?>
</head>

<body>

<div id="Content">

<!--
     The contents of this DIV are subject to the Mozilla Public
     License Version 1.1 (the "License"); you may not use this file
     except in compliance with the License. You may obtain a copy of
     the License at http://www.mozilla.org/MPL/
    
     Software distributed under the License is distributed on an "AS
     IS" basis, WITHOUT WARRANTY OF ANY KIND, either express or
     implied. See the License for the specific language governing
     rights and limitations under the License.
    
     The Original Code is the Bugzilla Bug Tracking System.
    
     The Initial Developer of the Original Code is Netscape Communications
     Corporation. Portions created by Netscape are
     Copyright (C) 1998 Netscape Communications Corporation. All
     Rights Reserved.
    
     Contributor(s): 

     Contributor(s): Terry Weissman <terry@mozilla.org>
-->
<H1>Bugs</H1>

<p>Welcome to <B>Bugzilla</B>, the xapian.org bug tracking system.

<p>Please choose one of the following options:</p>

<ul>
<li> <a href="/cgi-bin/bugzilla/query.cgi">Search existing bug reports</a>
<li> <a href="/cgi-bin/bugzilla/enter_bug.cgi">Create a new bug report</a>
<li> <a href="/cgi-bin/bugzilla/reports.cgi">Generate summary reports</a>
<li> <a href="/cgi-bin/bugzilla/createaccount.cgi">Open a new Bugzilla account</a>
<li> <a href="/cgi-bin/bugzilla/relogin.cgi">Forget the currently stored login</a>
<li> <a href="/cgi-bin/bugzilla/userprefs.cgi">Change password or user preferences</a>
</ul>
<script type="JavaScript" src="/bugzilla/localconfig.js"></script>
<script type="JavaScript" src="/bugzilla/quicksearch.js"></script>

<form name="f" action="/cgi-bin/bugzilla/show_bug.cgi" method="get"
      onsubmit="QuickSearch(); return false;"> 
 <p>Enter a bug number<!-- (FIXME: search terms don't work!)
 or some search terms-->:
  <input type="text" name="id">
  <input type="submit" value="Show">
  <a href="/bugzilla/quicksearch.html">[Help]</a>
 </p>
</form>

<script type="JavaScript">
<!--
document.forms['f'].id.focus();
//-->
</script>

</div>

<?php
include "cssnav.php";
?>

</body>
</html>
