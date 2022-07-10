<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <header class="navbar shadow-sm">
        <a class="navbar-brand text-dark" href="index.php">メモ管理アプリ</a>
    </header>
    <div class="container">
        <h3 class="mt-4"><?php echo $title ?></h3>
        <?php include $content ?>
    </div>
</body>

</html>
