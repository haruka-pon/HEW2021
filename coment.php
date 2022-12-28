<?php

$fp = fopen('data.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    fputcsv($fp, [$_POST['name'], $_POST['text']]);
    rewind($fp);
}
while ($row = fgetcsv($fp)) {
    $rows[] = $row;
}
fclose($fp);

if(isset($_POST['button']) && $_POST['button'] == 'check'){
    unset($_SESSION("rows"));
}

?>

<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>掲示板</title>
    <link rel="stylesheet" type="text/css" href="css/style_new.css">
    <link rel="stylesheet" type="text/css" href="css/test.css">
    <script src="style.java"></script>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lora&family=Noto+Serif+JP:wght@200&display=swap" rel="stylesheet">

</head>
<body>

<h1></h1>
<section>
    <h2>新規投稿</h2>
    <form action="" method="post">
        名前: <input type="text" name="name" placeholder="匿名でお願いします" value="" ><br>
        本文: <input type="text" name="text" placeholder="" value=""><br>
        <button type="submit">投稿</button>
    </form>
</section>
<section>
    <h2>投稿一覧</h2>
<?php if (!empty($rows)): ?>
    <div class="sample02">
    <ul>
<?php foreach ($rows as $row): ?>
        <li><?=$row[1]?> :<?=$row[0]?></li>
<?php endforeach; ?>
    </ul>
    </div>
<?php else: ?>
    <p>投稿はまだありません</p>
<?php endif; ?>
</section>


<?php if($row){ ?>
    <?php foreach ($rows as $row){ ?>
        <li><?=$row[1]?> :<?=$row[0]?></li>
    <?php } ?>
<?php } ?>

 


</body>
</html>