<?php
$vote = $_REQUEST['vote'];

//get content of textfile
$filename = "poll_result.txt";
$content = file($filename);
//print_r($content);
//die();

//put content in array
$array = explode("-", $content[0]);
$perfect = $array[0];
$good = $array[1];
$notbad = $array[2];
//echo $notbad;
//die();

if ($vote == 1) {
    $perfect = $perfect + 1;
}
if ($vote == 2) {
    $good = $good + 1;
}
if ($vote == 3) {
    $notbad = $notbad + 1;
}

//insert votes to txt file
$insertvote = $perfect."-".$good."-".$notbad;
$fp = fopen($filename,"w");
fputs($fp,$insertvote);
fclose($fp);
?>

<ul class="list-group">
    <li class="list-group-item">
        <span>Отлично</span><span class="pull-right"><?php echo(100*round($perfect/($perfect+$good+$notbad),3)); ?>%</span>
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo(100*round($perfect/($perfect+$good+$notbad),3)); ?>%;">
                <span class="sr-only"><?php echo(100*round($perfect/($perfect+$good+$notbad),3)); ?>% Complete</span>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <span>Хорошо</span><span class="pull-right"><?php echo(100*round($good/($perfect+$good+$notbad),3)); ?>%</span>
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo(100*round($good/($perfect+$good+$notbad),3)); ?>%;">
                <span class="sr-only"><?php echo(100*round($good/($perfect+$good+$notbad),3)); ?>% Complete</span>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <span>Удовлетворительно</span><span class="pull-right"><?php echo(100*round($notbad/($perfect+$good+$notbad),3)); ?>%</span>
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo(100*round($notbad/($perfect+$good+$notbad),3)); ?>%;">
                <span class="sr-only"><?php echo(100*round($notbad/($perfect+$good+$notbad),3)); ?>% Complete</span>
            </div>
        </div>
    </li>
</ul>