<?php




if(isset($_GET['id'])){
    setcookie('id',$_GET['id'],time()+60*60*60);
    header("Location:operate_edit.php");
    exit;
}


if(date("w")==1){
     $week = "月";
}
if(date("w")==2){
    $week = "火";
}
if(date("w")==3){
    $week = "水";
}
if(date("w")==4){
    $week = "木";
}
if(date("w")==5){
    $week = "金";
}
if(date("w")==6){
    $week = "土";
}
if(date("w")==7){
    $week = "日";
}

if(isset($_POST['button']) && $_POST['button'] == 'up'){
        $fp = fopen('data.csv', 'a');
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        fputcsv($fp, [$_POST['name'], $_POST['text'], date("Y/m/d($week)H:i:s")]);
        rewind($fp);
    }
}

$fp = fopen('./data.csv' , 'r');
while ($row = fgetcsv($fp)) {
    $rows[] = $row;
}
fclose($fp);

// if(isset($_POST['button']) && $_POST['button'] == 'check'){
//     if($_SESSION["rows"]){
//         unset($_SESSION["rows"]);
//     }
// }


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header("Location:coment_new.php");
    exit;
}
?>

<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>まるかつ管理者ページ</title>
    <link rel="stylesheet" type="text/css" href="css/operate.css">
    <link rel="stylesheet" type="text/css" href="css/test.css">
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lora&family=Noto+Serif+JP:wght@200&display=swap" rel="stylesheet">
</head>
<body>


<div id="box-nav">
  <ul class="inner-nav">
    <li class="box-logo"><a href="#"><img class="logo-img" src="img/logo_marukatu2.jpg" alt="まるかつロゴ"></a></li>
      <div>
          <li class="nav_ope_text">管理者画面</li>
        <a class="nav" href="./top_page_new.php"><li>TOPページ</li></a>
        <a class="nav" href="./coment_new.php"><li>コメント</li></a>
        <a class="nav" href="./operate.php"><li>管理者画面TOP</li></a>
        <a class="nav" href="./operate_news.php"><li>商品管理</li></a>
      </div>
  </ul>
</div>

<div id="all_list">
    <section id="letter_list">
        <h2 class="all_list_text">投稿一覧</h2>
    <div id="box_scroll">
        <?php if (!empty($rows)): ?>
            <?php $_SESSION['rows'] = $rows;?>
                <ul>
                <?php foreach ($rows as $row){ ?>
                    <div id="coment">
                        <div class="small">
                            <li><?=$row[0]?>:<?=$row[1]?>:<?=$row[4]?></li>
                        </div>
                        <li><?=$row[2]?>(<?=$row[3]?>)</li>
                    </div>
                <?php } ?>
                </ul>
        <?php else: ?>
            <p>投稿はまだありません</p>
        <?php endif; ?>
    </div>
    </section>



<div id="change_button">
    <form action="./operate.php" method="get">
        <button type="submit" name="button" value="all">
            全て表示        
        </button>
        <button type="submit" name="button" value="koukai">
            公開中のみ表示        
        </button>
        <button type="submit" name="button" value="hikoukai">
            非公開中のみ表示     
        </button>
    </form>
</div>

<?php
if(isset($_GET['button']) && $_GET['button'] == 'all'){
    $rows=[];
    $fp = fopen('./data.csv' , 'r');
    while ($row = fgetcsv($fp)) {
        $rows[] = $row;
    }
    fclose($fp);
}
if(isset($_GET['button']) && $_GET['button'] == 'koukai'){
    $fp = fopen('data.csv' , 'r');
    $rows=[];
    while ($row = fgetcsv($fp)) {
        if($row[3] == "公開"){
            $rows[] = $row;
        }
    }
    fclose($fp);
}
if(isset($_GET['button']) && $_GET['button'] == 'hikoukai'){
    $fp = fopen('data.csv' , 'r');
    $rows=[];
    while ($row = fgetcsv($fp)) {
        if($row[3] == "非公開"){
            $rows[] = $row;
        }
    }
    fclose($fp);
}
?>
<!-- 全リスト表示 -->
<table class="table1">
    <tr>
    <th>No</th>
    <th>名前</th>
    <th>本文</th>
    <th>公開状況</th>
    <th>時間</th>
    <th>編集</th>
    </tr>
    <?php $red="black"; ?>
    <?php foreach($rows as $val1){ ?>
        <tr>
        <?php foreach($val1 as $val2){ ?>
            <?php if($val1[3]=="非公開"){ ?>
                <?php $red="red"; ?>
            <td style="color:<?php echo $red; ?>;">
                <?php echo $val2; ?>
            </td>     
            <?php }else{ ?>
            <td style="color:black;">
                <?php echo $val2; ?>
            </td>
            <?php } ?>        
        <?php } ?>
        <td>
            <a href="./operate.php?id=<?php echo $val1[0]; ?>&page_ck=edit">編集</a>
        </td>
        </tr>
    <?php } ?>
</table>

</div>

</body>
</html>