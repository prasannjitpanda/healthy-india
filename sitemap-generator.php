<?php
$baseUrl = "https://www.fitindiahealth.in/"; // Apna domain URL yahan daal

function getHtmlFiles($dir) {
    $rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
    $files = [];

    foreach ($rii as $file) {
        if (!$file->isDir() && pathinfo($file, PATHINFO_EXTENSION) === 'html') {
            $filePath = str_replace("\\", "/", $file->getPathname());
            $filePath = ltrim(str_replace(__DIR__, "", $filePath), "/");
            $files[] = $filePath;
        }
    }

    return $files;
}

$allHtmlPages = getHtmlFiles(__DIR__);

$xml = new DOMDocument("1.0", "UTF-8");
$urlset = $xml->createElement("urlset");
$urlset->setAttribute("xmlns", "http://www.sitemaps.org/schemas/sitemap/0.9");

foreach ($allHtmlPages as $page) {
    $url = $xml->createElement("url");
    $loc = $xml->createElement("loc", htmlspecialchars($baseUrl . $page));
    $url->appendChild($loc);
    $urlset->appendChild($url);
}

$xml->appendChild($urlset);
$xml->formatOutput = true;
$xml->save("sitemap.xml");

echo "Sitemap generated automatically!";
?>
