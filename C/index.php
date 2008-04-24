<?php
list($file, $rev, $rev2) = explode('?', $_SERVER['QUERY_STRING']);
if (ereg("^[0-9]+$", $file)) {
    // This is a redirect to SVN - luckily CVS Xapian had no files with
    // entirely numeric names!
    $tmp = $file;
    $file = $rev;
    $rev = $tmp;
    $redirect = 'http://trac.xapian.org/';
    if ($rev2 != '' && $file != '') {
	$redirect .= $file . '?rev=' . $rev;
    } else if ($file != '') {
	$redirect .= 'changeset/' . $rev . '/' . $file . '#file0';
    } else {
	$redirect .= 'changeset/' . $rev;
    }
} else {
    // CVS
    $redirect = 'http://svn.xapian.org/' . $file . '?root=XapianCVS';
    if ($rev == '') {
     // deleted file
    } else if ($rev2 == '') {
     // added file
     $redirect .= '&rev=' . $rev . '&content-type=text/vnd.viewcvs-markup';
    } else {
     // updated file
     $redirect .= '&r1=' . $rev . '&r2=' . $rev2;
    }
}
header('Location: ' . $redirect);
?>
