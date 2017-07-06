<?php
// Ward Bradt
// June 1, 2017
// Used help from:
// https://stackoverflow.com/questions/14998961/php-write-file-from-input-to-txt
if(isset($_POST['userName']) && isset($_POST['comment'])) {
    $name = $_POST['userName']."\n";
	$comment = $_POST['comment']."\n";

    $ret = file_put_contents('names.txt', $name, FILE_APPEND | LOCK_EX);
    $ret2 = file_put_contents('comments.txt', $comment, FILE_APPEND | LOCK_EX);
	if($ret == false || $ret2 == false) {
        die('There was an error writing this file');
    }
    else {
        echo "$ret + $ret2 bytes written to files";
    }
}
else {
   	die('no post data to process');
}
?>