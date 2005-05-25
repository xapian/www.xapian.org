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
 "users" => "current users",
 "support" => "commercial support",
 "download" => "download",
 "bleeding" => "bleeding edge",
 "bugs" => "bugs",
 "contact" => "contact us",
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
print "<p>",join("</p>\n<p>", $pages),"</p>\n";
if ($this != "search") {
print "<br>\n<form method=\"GET\" action=\"search.php\"><div><input name=\"P\" size=\"14\"></div></form>\n";
}

?>

</div>
