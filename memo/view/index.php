<a href="new.php">メモを登録する</a>
<form action="search.php" method="post">
    <input type="text" name="search" id="search">
    <input class="btn btn-primary align-baseline" type="submit" value="検索する">
</form>

<?php foreach ($memos as $memo) : ?>
    <section class="card mt-3">
        <div class="d-flex card-title form-group mb-0">
            番号：<p class="mr-4"><?php echo escape($memo['id']) ?></p>
            登録日時：<?php echo escape($memo['created_at']) ?>
        </div>
        <div class="card-body form-group">
            <?php echo nl2br(escape($memo['content'])) ?>
        </div>
    </section>
<?php endforeach; ?>
<p class="mt-4 mb-0">削除するメモ番号を入力</p>
<form action="delete.php" method="post">
    <input type="number" name="delete" id="delete" min="1">
    <input class="btn btn-primary align-baseline" type="submit" value="削除する">
</form>
