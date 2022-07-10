<?php

require_once __DIR__ . '/lib/mysqli.php';

function insertMemo($link, $memo)
{
    $sql = <<<EOT
    INSERT INTO memo(
    content)VALUE(
    '$memo')
    EOT;
    $result = mysqli_query($link, $sql);
    if (!$result) {
        error_log('Error: fail to create memo');
        error_log('Debugging Error:' . mysqli_error($link));
    }
}

function validateMemo($memo)
{
    if (!$memo) {
        $error = 'メモを入力してください';
    } elseif (strlen($memo) > 1000) {
        $error = 'メモは1000字以内で入力して下さい';
    }
    return $error;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $memo = $_POST['memo'];

    $error = validateMemo($memo);
    if (!$error) {
        $link = dbConnect();
        insertMemo($link, $memo);
        header('Location:index.php');
        mysqli_close($link);
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>メモの登録</title>
</head>

<body>
    <h2>メモの登録</h2>
    <form action="create.php" method="post">
        <?php if ($error) : ?>
            <p><?php echo $error; ?></p>
        <?php endif; ?>
        <textarea name="memo" id="memo" cols="30" rows="10"><?php echo $_POST['memo']; ?></textarea>
        <input type="submit" value="登録する">
    </form>

</body>

</html>
