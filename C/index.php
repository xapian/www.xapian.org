<?php
list($file, $rev, $rev2) = explode('?', $QUERY_STRING);
if (ereg("^[0-9]+$", $file)) {
    // This is a redirect to SVN - luckily CVS Xapian had no files with
    // entirely numeric names!
    $tmp = $file;
    $file = $rev;
    $rev = $tmp;
?>
<HTML><BODY>
<pre>
No links currently, but paste this command to view diffs in a terminal:

<?php
if ($rev2 != "" && $file != "") {
?>
svn cat -r<?echo $rev, " ", $file;?>
<?php
} else {
?>
svn diff -r<?echo $rev-1;?>:<?echo $rev; if ($file != "") echo " ", $file;?>
<?php
}
?>

</pre></BODY></HTML>
<?php
} else {
    $redirect = 'http://cvs.xapian.org/' . $file;
    if ($rev == '') {
     // deleted file
    } else if ($rev2 == '') {
     // added file
     $redirect .= '?rev=' . $rev . '&content-type=text/vnd.viewcvs-markup';
    } else {
     // updated file
     $redirect .= '.diff?r1=' . $rev . '&r2=' . $rev2;
    }
    header('Location: ' . $redirect);
}
?>
