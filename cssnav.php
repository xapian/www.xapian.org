<div id="Menu">
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
 "docs/" => "docs",
 "support" => "commercial support",
 "download" => "download",
 "cvs" => "cvs",
 "bugs" => "bugs",
 "search" => "search this website"
);
function navlink(&$n, $f) {
  global $this, $pages;
  if ($f == $this) {
    $n = "<span id=\"current\">".$n."</span>";
  } else {
    if ($f == "index")
      $f = ".";
    else if (!preg_match("!(\.\w+|/)$!", $f))
      $f .= ".php";
    $n = '<a href="'.$f.'">'.$n.'</a>';
  }
}
array_walk($pages, "navlink");
print join("<br/>\n", $pages);
if ($this != "search") {
print "<br/>\n<form method=\"GET\" action=\"search.php\"><input name=\"P\" size=\"14\" /></form>\n";
}

?>

</div>
