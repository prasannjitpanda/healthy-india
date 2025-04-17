<?php
$baseUrl = "https://www.fitindiahealth.in/"; // Apne site ka URL yahan daalein
$pages = array(
  "index.html",
  "privacy.html",
  "fitness/index.html",
  "fitness/article1.html",
  "fitness/article2.html",
  "fitness/article3.html",
  "fitness/article4.html",
  "fitness/article5.html",
  "recipes.html",
  "mind.html"
);

$xml = '<?xml version="1.0" encoding="UTF-8"?>';
$xml .= "\n" . '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

foreach ($pages as $page) {
    $xml .= "<url>\n";
    $xml .= "<loc>" . $baseUrl . $page . "</loc>\n";
    $xml .= "<changefreq>weekly</changefreq>\n";
    $xml .= "<priority>0.8</priority>\n";
    $xml .= "</url>\n";
}

$xml .= "</urlset>";

file_put_contents("sitemap.xml", $xml);
echo "Sitemap generated successfully!";
?>