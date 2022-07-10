<?php

require_once __DIR__ . '/lib/escape.php';
require_once __DIR__ . '/lib/mysqli.php';

function deleteMemo($link)
{
    $id = $_POST['delete'];
    $sql = <<<EOT
    DELETE FROM memo WHERE id = '$id'
    EOT;
    mysqli_query($link, $sql);
}
$link = dbConnect();
deleteMemo($link);

header('Location:index.php');
