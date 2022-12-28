<?php
session_start();
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

 //自働採番
 $max=0 ;
 $fp = fopen("./data.csv" , 'r');    
 while($row = fgets($fp)){
     $row = explode(',' , $row);
     if($max < $row[0]){
         $max = $row[0];
     }
 }
 fclose($fp);

 $msg="";

if(isset($_POST['button']) && $_POST['button'] == 'up'){
    $msg="書き込みが完了しました";
        $fp = fopen('data.csv', 'a');
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        fputcsv($fp, [$max+1,$_POST['name'], $_POST['text'],"公開",date("Y/m/d($week)H:i:s"),]);
        rewind($fp);
    }
}

$fp = fopen('data.csv' , 'r');
while ($row = fgetcsv($fp)) {
    if($row[3] == "公開"){
        $rows[] = $row;
    }
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
<title>コメント</title>
    <link rel="stylesheet" type="text/css" href="css/style_new.css">
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <link rel="stylesheet" type="text/css" href="css/test.css">
    <script src="style.java"></script>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lora&family=Noto+Serif+JP:wght@200&display=swap" rel="stylesheet">

</head>
<body>


    <div id="box-nav">
      <ul class="inner-nav">
        <li class="box-logo"><a href="#"><img class="logo-img" src="img/logo_marukatu2.jpg" alt="まるかつロゴ"></a></li>
          <div>
            <a class="nav" href="./top_page_new.php"><li>TOP</li></a>
            <a class="nav" href="./menu_page.php"><li>おしながき</li></a>
            <a class="nav" href="./coment_new.php"><li>コメント</li></a>
            <a class="nav" href="./top_page_new.php#access_big"><li>アクセス</li></a>
            <a class="nav" href="./login.php"><li>管理者ログイン</li></a>
          </div>
      </ul>
    </div>
</header>

<div id="big_page">
    <div class="h1_title">
        <h1 class="h1_moji">お客様の声</h1>
    </div>
    <div id="little_page">
        <section>
            <p class="tyuui">※お書きいただいたお客様のメッセージは当店ホームページのトップページに記載されます。
                個人情報を書き込まないようにお願いいたします。
            </p>
            <a class="coment_link" href="./top_page_new.php#review"><p>コメントを見に行く</p></a>
            <p class="message"><?php echo $msg; ?></p> 
            <h2>新規投稿</h2>
            <form action="coment_new.php" method="post" autocomplete="off">
                <div id="coment_box">
                    <div id="name_box">
                        <span class="namae">名前</span><input class="text_box1" type="text" name="name" placeholder="匿名でお願いします" value="" >
                    </div>
                    <div id="letter_box">
                        <span class="namae">本文</span><textarea class="text_box2" type="text" name="text" placeholder="" value="" ></textarea>
                    </div>
                </div>
                <button type="submit" name="button" value="up">投稿</button>
                <!-- <button type="submit" name="button" value="check">消去</button> -->
            </form>
        </section>
        <section id="letter_list">
            <h2>投稿一覧</h2>
        <div id="box_scroll">
            <?php if (!empty($rows)): ?>
                <?php $_SESSION['rows'] = $rows;?>
                
                <?php foreach($rows as $key => $row){ ?>
                    <?php $sort[$key] = $row[0] ?>
                <?php } ?>
                <?php array_multisort($sort,SORT_DESC,$rows); ?>

                    <ul>
                    <?php foreach ($rows as $row){ ?>
                        <div id="coment">
                            <div class="small">
                                <li><?=$row[1]?>:<?=$row[4]?></li>
                            </div>
                            <li><?=$row[2]?></li>
                        </div>
                    <?php } ?>
                    </ul>
            <?php else: ?>
                <p>投稿はまだありません</p>
            <?php endif; ?>
        </div>
        </section>
    </div>
</div>

<div id="space">
</div>

<div id="big_footer">
  <div id="footer2">
    <!-- <img  class="logo" src="img/logo_marukatu.jpg" alt="marukatu"> -->
    <p id="©">©marukatu</p>
  </div>
</div>


</body>
</html>