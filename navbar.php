<?php
if (preg_match("!([^/]*)\.php!", $_SERVER['PHP_SELF'], $m)) {
  $this = $m[1];
} else {
  $this = '?';
}
$pages = array(
 "index" => "home",
 "features" => "features",
 "history" => "history",
 "lists" => "mailing lists",
 "docs/" => "documentation",
 "download" => "download",
 "cvs" => "cvs",
 "bugs" => "bugs"
);
function navlink(&$n, $f) {
  global $this, $pages;
  if ($f == $this) {
    $n = "<b>".$n."</b>";
  } else {
    if ($f == "index")
      $f = ".";
    else if (!preg_match("!(\.\w+|/)$!", $f))
      $f .= ".php";
    $n = '<a href="'.$f.'">'.$n.'</a>';
  }
}
array_walk($pages, "navlink");
$navbar = "<center>".join(" | ", $pages)."</center>";
?>
