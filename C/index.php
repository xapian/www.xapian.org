<?php
list($file, $rev, $rev2) = explode('?', $QUERY_STRING);
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
?>
