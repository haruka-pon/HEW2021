<?php

$err1='';
$err2='';
$err3='';

if(isset($_POST['button']) && $_POST['button'] == 'check'){    
    if($_POST['address'] == ''){
        $err1='未入力';
    }

    if($_POST['pass'] == ''){
        $err2='未入力';
    } 

        if($_POST['address'] == "marukatu" && $_POST['pass'] == "marukatu"){
            header("Location: ./operate.php");
            exit();
        }
    $err3="間違ってます";
}

?> 

<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>まるかつログインページ</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lora&family=Noto+Serif+JP:wght@200&display=swap" rel="stylesheet">

    <!-- <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Sample</title> -->
    <!-- BootstrapのCSS読み込み -->
    <!-- <link href="./bootstrap/bootstrap/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- jQuery読み込み -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
    <!-- BootstrapのJS読み込み -->
    <!-- <script src="js/bootstrap.min.js"></script> -->

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
          </div>
        
      </ul>
    </div>

  <div id="login">
    <h1>管理者ログインページ</h1>
    <img class="big_logo" src="./img/logo_marukatu2.jpg" alt="">
    <form method="POST" action="./login.php" autocomplete="off">
      <div id="table_box">  
        <table class='table'>
        <tr>
        <td>ユーザーID</td>
        <td>
        <input type="text" name="address" placeholder="user id" value="marukatu">
        </td>
        <td class="red"><?php  echo $err1; ?></td>
        </tr>

        <tr>
        <td>パスワード</td>
        <td>

        <input type="password" name="pass" placeholder="Password" value="marukatu">
        </td>
        <td class="red"><?php echo $err2; ?></td>
        </tr>
        <tr>
          <td>
        <button type="submit" name="button" value="check">ログイン</button>
        </td>  
        </tr>
        </table>
      </div>
    </form>
  </div>


<p class="red"><?php echo $err3;?></p>

</body>
</html>
