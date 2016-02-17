<?php
include("credit.php");
$lang = $_GET['lang'];

if ($lang == 'ru') {
    $qr_result2 = mysql_query("SELECT news.id, news.titleRu, news.contentRu, news.thumbnail, news.thumbnail_big, news.updated_at
FROM posts news
WHERE news.titleRu != ''
AND news.titleRu NOT LIKE  'http%'
AND news.titleRu NOT LIKE  'photo%'
AND news.thumbnail !=  ''
AND news.thumbnail_big !=  ''
ORDER BY news.updated_at DESC
LIMIT 100", $db) or die(mysql_error());
} else if ($lang == 'kg') {
    $qr_result2 = mysql_query("SELECT news.id, news.title, news.content, news.thumbnail, news.thumbnail_big, news.updated_at
FROM posts news
WHERE news.title !=  ''
AND news.title NOT LIKE  'http%'
AND news.title NOT LIKE  'photo%'
AND news.thumbnail !=  ''
AND news.thumbnail_big !=  ''
ORDER BY news.updated_at DESC
LIMIT 100", $db) or die(mysql_error());
} else {
    $qr_result2 = mysql_query("SELECT news.id, news.titleRu, news.contentRu, news.thumbnail, news.thumbnail_big, news.updated_at
FROM posts news
WHERE news.titleRu != ''
AND news.titleRu NOT LIKE  'http%'
AND news.titleRu NOT LIKE  'photo%'
AND news.thumbnail !=  ''
AND news.thumbnail_big !=  ''
ORDER BY news.updated_at DESC
LIMIT 100", $db) or die(mysql_error());
}
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
if ($lang == "ru") {
    while ($myrow2 = mysql_fetch_array($qr_result2, MYSQL_ASSOC)) {

        $html = $myrow2["contentRu"];
        $doc = new DOMDocument();
        @$doc->loadHTML($html);
        $tags = $doc->getElementsByTagName('iframe');
        foreach ($tags as $tag) {
            $youtubeImageFirst .= str_replace("//www.youtube.com/embed/", "", $tag->getAttribute('src'));
            $youtubeImageFirst .= $youtubeImageSecond;

            $deps2[] = array(
                'id' => $myrow2["id"],
                'titleRu' => $myrow2["titleRu"],
                'contentRu' => strip_tags($myrow2["contentRu"]),
                'body_value' => strip_tags($myrow2["body_value"]),
                'thumbnail' => $myrow2["thumbnail"],
                'thumbnail_big' => $myrow2["thumbnail_big"],
                'updated_at' => $myrow2["updated_at"],
                'video_url' => str_replace("//www.youtube.com/embed/", $youVideoLink, $tag->getAttribute('src')),
                'video_pic' => $youtubeImageFirst,

            );
            $youtubeImageFirst = "http://i.ytimg.com/vi/";
        }
    }
} else if ($lang == "kg") {
    while ($myrow2 = mysql_fetch_array($qr_result2, MYSQL_ASSOC)) {
        $html = $myrow2["content"];
        $doc = new DOMDocument();
        @$doc->loadHTML($html);
        $tags = $doc->getElementsByTagName('iframe');
        foreach ($tags as $tag) {
            $youtubeImageFirst .= str_replace("//www.youtube.com/embed/", "", $tag->getAttribute('src'));
            $youtubeImageFirst .= $youtubeImageSecond;

            $deps2[] = array(
                'id' => $myrow2["id"],
                'titleRu' => $myrow2["title"],
                'contentRu' => strip_tags($myrow2["content"]),
                'body_value' => strip_tags($myrow2["body_value"]),
                'thumbnail' => $myrow2["thumbnail"],
                'thumbnail_big' => $myrow2["thumbnail_big"],
                'updated_at' => $myrow2["updated_at"],
                'video_url' => str_replace("//www.youtube.com/embed/", $youVideoLink, $tag->getAttribute('src')),
                'video_pic' => $youtubeImageFirst,

            );
            $youtubeImageFirst = "http://i.ytimg.com/vi/";
        }
    }
} else {
    while ($myrow2 = mysql_fetch_array($qr_result2, MYSQL_ASSOC)) {

        $html = $myrow2["contentRu"];
        $doc = new DOMDocument();
        @$doc->loadHTML($html);
        $tags = $doc->getElementsByTagName('iframe');
        foreach ($tags as $tag) {
            $youtubeImageFirst .= str_replace("//www.youtube.com/embed/", "", $tag->getAttribute('src'));
            $youtubeImageFirst .= $youtubeImageSecond;

            $deps2[] = array(
                'id' => $myrow2["id"],
                'titleRu' => $myrow2["titleRu"],
                'contentRu' => strip_tags($myrow2["contentRu"]),
                'body_value' => strip_tags($myrow2["body_value"]),
                'thumbnail' => $myrow2["thumbnail"],
                'thumbnail_big' => $myrow2["thumbnail_big"],
                'updated_at' => $myrow2["updated_at"],
                'video_url' => str_replace("//www.youtube.com/embed/", $youVideoLink, $tag->getAttribute('src')),
                'video_pic' => $youtubeImageFirst,

            );
            $youtubeImageFirst = "http://i.ytimg.com/vi/";
        }
    }
}
$finCount2 = count($deps2);
header('Content-type: text/xml');
header("Access-Control-Allow-Origin: *");

echo '<answer><result>true</result>';
$finCount = count($finishYoutube);
for ($jk2 = 0; $jk2 < $finCount2; $jk2++) {

    $contRu = htmlspecialchars_decode($deps2[$jk2]['contentRu']);
    $bodVal = htmlspecialchars_decode($deps2[$jk2]['body_value']);
    echo '<news>';
    echo '<news_id>' . ($jk2 + 1) . '</news_id>';
    echo '<news_title>' . $deps2[$jk2]['titleRu'] . '</news_title>';
    echo '<news_date>' . substr($deps2[$jk2]['updated_at'], 0, 10) . '</news_date>';
    echo '<news_image>http://ktrk.kg/' . $deps2[$jk2]['thumbnail_big'] . '</news_image>';
    echo '<news_contentRu>' . str_replace("&", "And", str_replace("&bull;", " - ", str_replace("&mdash;", " - ", str_replace("&ndash;", " - ", str_replace("&rdquo;", " \" ", str_replace("&ldquo;", " \" ", str_replace("&raquo;", " \" ", str_replace("&laquo;", " \" ", str_replace("&nbsp;", " ", $contRu))))))))) . '</news_contentRu>';
    echo '<news_body>' . str_replace("&", "And", str_replace("&bull;", " - ", str_replace("&mdash;", " - ", str_replace("&ndash;", " - ", str_replace("&rdquo;", " \" ", str_replace("&ldquo;", " \" ", str_replace("&raquo;", " \" ", str_replace("&laquo;", " \" ", str_replace("&nbsp;", " ", $bodVal))))))))) . '</news_body>';
    echo '<news_video>' . $deps2[$jk2]['video_url'] . '</news_video>';
    echo '<news_video_pic>' . $deps2[$jk2]['video_pic'] . '</news_video_pic>';
    echo '</news>';
    $contRu = "";
    $bodVal = "";
}
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