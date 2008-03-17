<?php
list($file, $rev, $rev2) = explode('?', $QUERY_STRING);
if (ereg("^[0-9]+$", $file)) {
    // This is a redirect to SVN - luckily CVS Xapian had no files with
    // entirely numeric names!
    $tmp = $file;
    $file = $rev;
    $rev = $tmp;
    $redirect = 'http://svn.xapian.org/';
    if ($rev2 != '' && $file != '') {
	$redirect .= $file . '?rev=' . $rev . '&view=markup';
    } else if ($file != '') {
	$redirect .= $file . '?r1=' . ($rev-1) . '&r2=' . $rev;
    } else {
	$redirect .= '?rev=' . $rev;
    }
} else {
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
