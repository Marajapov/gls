<?php
include("credit.php");
$lang = $_GET['lang'];

/****video****/
$qr_project = mysql_query("SELECT m.name, m.description, m.url, m.updated_at
FROM medias m
WHERE m.url !=  ''
ORDER BY m.updated_at DESC
LIMIT 50", $db) or die(mysql_error());
while ($myrow = mysql_fetch_array($qr_project, MYSQL_ASSOC)) {
    $deps[] = array(
        'youID' => $myrow["url"],
        'name' => $myrow["name"],
        'desc' => $myrow["description"],
        'date' => $myrow["updated_at"],

    );
}
$cDeps = count($deps);
$youtubeConstant = "https://www.googleapis.com/youtube/v3/videos?key=AIzaSyCLG1j0M9ZwkYgnal1lTTvocBnLupzrNhc&part=snippet%2Cstatistics&id=";
$youVideoLink = "https://www.youtube.com/watch?v=";
$youtubeImageFirst = "http://i.ytimg.com/vi/";
$youtubeImageSecond = "/hqdefault.jpg";
for ($i = 0; $i < $cDeps; $i++) {
    $contentOfVideo = $deps[$i]['desc'];
    $dateOfPublishedOfVideo = $deps[$i]['date'];
    $youVideoLink .= $deps[$i]['youID'];
    $youtubeImageFirst .= $deps[$i]['youID'];
    $youtubeImageFirst .= $youtubeImageSecond;
    $nameOfVideo = $deps[$i]['name'];
    $n = str_replace("<span>", ". ", str_replace("</span>", ". ", $nameOfVideo));
    $d = str_replace("<span>", ". ", str_replace("</span>", " ", $contentOfVideo));
    $finishYoutube[] = array(
        'youVideoLink' => $youVideoLink,
        'nameOfVideo' => strip_tags($n),
        'contentOfVideo' => strip_tags($d),
        'dateOfPublishedOfVideo' => substr($dateOfPublishedOfVideo, 0, 10),
        'youtubeImageFirst' => $youtubeImageFirst,
    );

    $youtubeConstant = "http://gdata.youtube.com/feeds/api/videos/";
    $youVideoLink = "https://www.youtube.com/watch?v=";
    $youtubeImageFirst = "http://i.ytimg.com/vi/";
}
/****video****/
$finCount2 = count($deps2);
header('Content-type: text/xml');
header("Access-Control-Allow-Origin: *");

echo '<answer><result>true</result>';
$finCount = count($finishYoutube);
for ($jk = 0; $jk < $finCount; $jk++) {

    echo '<video>';
    echo '<videoId>' . ($jk + 1) . '</videoId>';
    echo '<youVideoLink>' . $finishYoutube[$jk]['youVideoLink'] . '</youVideoLink>';
    echo '<nameOfVideo>' . str_replace("&", "And", str_replace("&bull;", " - ", str_replace("&mdash;", " - ", str_replace("&ndash;", " - ", str_replace("&rdquo;", " \" ", str_replace("&ldquo;", " \" ", str_replace("&raquo;", " \" ", str_replace("&laquo;", " \" ", str_replace("&nbsp;", " ", $finishYoutube[$jk]['nameOfVideo']))))))))) . '</nameOfVideo>';
    if ($finishYoutube[$jk]['contentOfVideo'] != null)
        echo '<contentOfVideo>' . str_replace("&", "And", str_replace("&bull;", " - ", str_replace("&mdash;", " - ", str_replace("&ndash;", " - ", str_replace("&rdquo;", " \" ", str_replace("&ldquo;", " \" ", str_replace("&raquo;", " \" ", str_replace("&laquo;", " \" ", str_replace("&nbsp;", " ", $finishYoutube[$jk]['contentOfVideo']))))))))) . '</contentOfVideo>';
    else {
        echo '<contentOfVideo>   </contentOfVideo>';
    }
    echo '<dateOfPublishedOfVideo>' . $finishYoutube[$jk]['dateOfPublishedOfVideo'] . '</dateOfPublishedOfVideo>';
    echo '<youtubeImageFirst>' . $finishYoutube[$jk]['youtubeImageFirst'] . '</youtubeImageFirst>';
    echo '</video>';


}
echo '</answer>';
?>