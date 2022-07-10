<?php

require_once __DIR__ . '/lib/escape.php';
require_once __DIR__ . '/lib/mysqli.php';

function searchMemo($link)
{
    $memos = [];
    $search = trim($_POST['search']);
    $sql = <<<EOT
    SELECT * FROM memo WHERE content LIKE '%$search%'
    EOT;
    $results = mysqli_query($link, $sql);
    while ($memo = mysqli_fetch_assoc($results)) {
        $memos[] = $memo;
    }
    mysqli_free_result($results);
    return $memos;
}
$link = dbConnect();
$memos = searchMemo($link);

$title = 'メモの一覧';
$content = __DIR__ . '/view/index.php';
include __DIR__ . '/view/layout.php';
