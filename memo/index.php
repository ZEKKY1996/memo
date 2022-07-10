<?php

require_once __DIR__ . '/lib/escape.php';
require_once __DIR__ . '/lib/mysqli.php';

function selectMemo($link)
{
    $memos = [];
    $sql = 'SELECT id,content,created_at FROM memo';
    $results = mysqli_query($link, $sql);
    while ($memo = mysqli_fetch_assoc($results)) {
        $memos[] = $memo;
    }
    mysqli_free_result($results);
    return $memos;
}
$link = dbConnect();
$memos = selectMemo($link);
$title = 'メモの一覧';
$content = __DIR__.'/view/index.php';
include __DIR__ . '/view/layout.php';
