<?php
require('config.php');

$name = strip_tags(utf8_decode($_POST['name']));
$comment = strip_tags(utf8_decode($_POST['comment']));

$insert = $conexion->query('INSERT INTO comments (name, text, date_added) VALUES ("'.$name.'", "'.$comment.'", now())');

if ($insert) {
    $row = array(
        'name' => $name,
        'comment'=> $comment,
        'date_show' => date('d/m/Y H:i:s')
    );
    echo json_encode($row);
}
?>