<?php
$url = $_SERVER['SCRIPT_URL'];
$redirect = preg_replace(',/+$,', '', $url, 1);
$redirect = preg_replace(',\.php$,', '', $redirect, 1);
$redirect = preg_replace(',^/index\b,', '/', $redirect, 1);
if ($redirect === '/bugs/index') $redirect = '/bugs';
if ($redirect === '') $redirect = '/';
if ($url !== $redirect) {
    if ($_SERVER['QUERY_STRING'] != '') {
	$redirect .= '?';
	$redirect .= $_SERVER['QUERY_STRING'];
    }
    header('Location: ' . $redirect, true, 301); 
    exit(0); 
} 
?> 
