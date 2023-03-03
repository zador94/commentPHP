<?php
if (isset($_REQUEST['name']) && isset($_REQUEST['comment'])) {
    $dateComment = date('d.m.Y H:i:s');
    $fileWrite = fopen("comment.txt", 'a');
    if($fileWrite) {
        $comment = "$dateComment - {$_REQUEST['name']} : {$_REQUEST['comment']}\n";
        fwrite($fileWrite, $comment);
        fclose($fileWrite);

        $screenReading = fopen("comment.txt", "r+");
        if ($screenReading) {
            $comments = file("comment.txt");
            rsort($comments);
            foreach ($comments as $item) {
                echo $item . "<br>";
            }
        }
        else {
            echo 'не удалось открыть файл';
        }
    }
    else {
        echo 'файл не удалось записать';
    }
}
