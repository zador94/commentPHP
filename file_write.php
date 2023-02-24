<?php
if (isset($_REQUEST['name']) && isset($_REQUEST['surname']) && isset($_REQUEST['comment'])) {
    $dateComment = date('d.m.Y H:i:s');
    $fileWrite = fopen("comment.txt", 'a+') or die('не удалось записать файл');
    $comment = $_REQUEST['name'] . ' ' . $_REQUEST['surname'] . "\r\n" . $dateComment . ' ' . $_REQUEST['comment'] . "\r\n";
    fwrite($fileWrite, $comment);
    fclose($fileWrite);

    $screenReading = fopen("comment.txt", "r+") or die("не удалось открыть файл");
    while (!feof($screenReading)) {
        $readingString = htmlentities(fgets($screenReading));
        echo $readingString . "<br/>";
    }
    fclose($screenReading);
}
