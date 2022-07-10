<?php

require_once __DIR__ . '/../lib/mysqli.php';

function dropTable($link)
{
    $sql = 'DROP TABLE IF EXISTS memo;';
    $result = mysqli_query($link, $sql);
    if (!$result) {
        echo 'Error:テーブルを削除できません' . PHP_EOL;
        echo 'DebuggingError:' . mysqli_error($link) . PHP_EOL;
    }
    return $result;
}
function createTable($link)
{
    $sql = <<<EOT
    CREATE TABLE memo(
        id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
        content VARCHAR(1000),
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
        )DEFAULT CHARACTER SET=utf8mb4;
    EOT;
    $result = mysqli_query($link, $sql);
    if (!$result) {
        echo 'Error:テーブルを作成できません' . PHP_EOL;
        echo 'DebuggingError:' . mysqli_error($link) . PHP_EOL;
    }
    return $result;
}

$link = dbConnect();
dropTable($link);
createTable($link);
mysqli_close($link);
