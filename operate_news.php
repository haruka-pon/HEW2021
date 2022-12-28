<!-- 自働採番 -->
<?php



if(isset($_GET['id'])){
    setcookie('id',$_GET['id'],time()+60*60*60);
    header("Location:operate_news_edit.php");
    exit;
}

 $max=0 ;
 $fp = fopen("./news.csv" , 'r');    
 while($row = fgets($fp)){
     $row = explode(',' , $row);
     if($max < $row[0]){
         $max = $row[0];
     }
 }
 fclose($fp);

if(isset($_POST['button']) && $_POST['button'] == 'up'){
    if(empty($_POST['name'])){
        header("Location:operate_news.php");
        exit;
    }
        $fp = fopen('news.csv', 'a');
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        fputcsv($fp, [$max+1,$_POST['img'],$_POST['name'],"公開",$_POST['detail'],$_POST['price'],]);
        rewind($fp);
    }
}

$fp = fopen('news.csv' , 'r');
while ($row = fgetcsv($fp)) {
    // if($row[3] == "公開"){
        $rows[] = $row;
    // }
}
fclose($fp);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header("Location:operate_news.php");
    exit;
  }
?>
<head>
<meta charset="UTF-8">
<title>まるかつ管理者</title>


<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- BootstrapのCSS読み込み -->
    <link href="./bootstrap/bootstrap/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery読み込み -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- BootstrapのJS読み込み -->
    <script src="./bootstrap/bootstrap/bootstrap/js/bootstrap.min.js"></script>




    <!-- <link rel="stylesheet" type="text/css" href="css/operate.css"> -->
    <link rel="stylesheet" type="text/css" href="css/news.css">    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lora&family=Noto+Serif+JP:wght@200&display=swap" rel="stylesheet">
</head>
<body>


<div id="box-nav">
  <ul class="inner-nav">
    <li class="box-logo"><a href="#"><img class="logo-img" src="img/logo_marukatu2.jpg" alt="まるかつロゴ"></a></li>
      <div>
        <li class="nav_ope_text">管理者画面</li>
        <a class="nav_block" href="./top_page_new.php"><li>TOPページ</li></a>
        <a class="nav_block" href="./coment_new.php"><li>コメント</li></a>
        <a class="nav_block" href="./operate.php"><li>管理者画面TOP</li></a>
        <a class="nav_block" href="./operate_news.php"><li>商品管理</li></a>
      </div>
  </ul>
</div>

<div id="all_list">
    <section id="letter_list">
        <h2 class="all_list_text">商品一覧</h2>

    <!-- 商品一覧 -->
<div id="box_scroll">
<?php if (!empty($rows)): ?>
    <div id="tonkatu_osinagaki" class="back">
        <?php foreach($rows as $row ){ ?>
            <div class="category">
                <?php echo $row[0]; ?>:(<?=$row[3]?>)<br>
                <img class="img" src="./img/menu_seasonal/<?php echo $row[1] ?>" alt="" width="170px"><br>
                <?php echo $row[2]; ?><br>
                (<?php echo $row[4]; ?>)<br>
                <?php echo $row[5]; ?>円<br>
            </div>
        <?php } ?>
    </div>
<?php else: ?>
    <p>投稿はまだありません</p>
<?php endif; ?>
</div>

</section>

<div id="change_button">
    <form action="./operate_news.php" method="get">
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
    $fp = fopen('./news.csv' , 'r');
    while ($row = fgetcsv($fp)) {
        $rows[] = $row;
    }
    fclose($fp);
}
if(isset($_GET['button']) && $_GET['button'] == 'koukai'){
    $fp = fopen('news.csv' , 'r');
    $rows=[];
    while ($row = fgetcsv($fp)) {
        if($row[3] == "公開"){
            $rows[] = $row;
        }
    }
    fclose($fp);
}
if(isset($_GET['button']) && $_GET['button'] == 'hikoukai'){
    $fp = fopen('news.csv' , 'r');
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
    <th>画像</th>
    <th>名前</th>
    <th>公開状況</th>
    <th>詳細</th>
    <th>値段</th>
    <th>編集</th>
    </tr>
    <?php $red="black"; ?>
    <?php if (!empty($rows)): ?>
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
            <a href="./operate_news.php?id=<?php echo $val1[0]; ?>&page_ck=edit">編集</a>
        </td>
        </tr>
    <?php } ?>
    <?php else: ?>
            <p>投稿はまだありません</p>
    <?php endif; ?>
</table>


    <form action="operate_news.php" method="post" autocomplete="off">
        <div id="input_box">
            <h3>商品登録</h3>
            <div id="name_box">
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label"><span class="img">画像のリンク</span></label>
                    <div class="col-sm-10">
                        <input class="form-control" id="inputPassword" type="text" name="img" placeholder="menu_seasonalフォルダ内の画像のリンク" value="" >
                    </div>
                </div>
            </div>
            <div id="name_box">
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label"><span class="namae">名前</span></label>
                    <div class="col-sm-10">    
                        <input class="form-control" type="text" name="name" placeholder="例)とんかつ" value="" >
                    </div>
                </div>
            </div>
            <div id="name_box">
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label"><span class="detail">詳細</span></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="detail" placeholder="30文字以内" value="" >
                    </div>
                </div>    
            </div>
            <div id="name_box">
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label"><span class="price">値段</span></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="price" placeholder="例)1,200" value="" >
                    </div>
                </div>
           </div>
            <button type="submit" name="button" value="up">投稿</button>
        </div>
    </form>

</div>



</body>
</html例