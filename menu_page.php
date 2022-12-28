<?php
$fp = fopen('news.csv' , 'r');
while ($row = fgetcsv($fp)) {
    // if($row[3] == "公開"){
        $rows[] = $row;
    // }
}
fclose($fp);
?>

<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>まるかつメニューページ</title>
    <link rel="stylesheet" type="text/css" href="css/style_new.css">
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <script src="style.java"></script>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lora&family=Noto+Serif+JP:wght@200&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./bxslider-4-4.2.12/dist/jquery.bxslider.css">
    <!-- <link rel="stylesheet" href="/path/to/jquery.bxslider.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="./bxslider-4-4.2.12/dist/jquery.bxslider.min.js"></script>
    <!-- <script src="path/to/jquery.bxslider.min.js"></script> -->

  <script>
    $(document).ready(function(){
      $('.slider').bxSlider();
    });
  </script>

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

<div  class="menu_header">
  <h1>おしながき</h1>
</div>


<div id="wrapper">
  <div id="wrapper_top">
    <h2>献立</h2>
    <p class="p1">素材の仕込みから、調理、盛り付けまで一つひとつにこだわり仕上げています。
      御膳やかつ重など多彩なメニューよりお召し上がりいただけます。</p>
    <p class="p2">令和3年1月8日、新型コロナウイルス対策として発令された緊急事態宣言に伴い、 一部商品の販売を中止する場合がございます。詳細は各店舗までお問い合わせください。
      何卒、ご理解賜りますようお願い申し上げます。</p>
  </div>
  <div id="tonkatu_osinagaki">
    <h2 class=""><img src="./img/menu_name/teiban_menu.png" alt=""></h2>
      <div class="category">
          <img class="img" src="./img/menu_tonkatu/rosukatu.jpg" alt="">
          <p class="name">ロースかつ定食</p>
          <p class="deta">ロースかつ(120g)</p>
          <p>1,280円</p>
      </div>
      <div class="category">
          <img class="img" src="./img/menu_tonkatu/atugirirosu.jpg" alt="">
          <p class="name">厚切りロースかつ定食</p>
          <p>1,780円</p>
          <p class="deta">※15分ほどお時間かかります</p>
      </div>
      <div class="category">
          <img class="img" src="./img/menu_tonkatu/hirekatu.jpg" alt="">
          <p class="name">ヒレかつ定食</p>
          <p class="deta">ヒレかつ(120g)</p>
          <p>1,480円</p>
      </div>
      <div class="category">
          <img class="img" src="./img/menu_tonkatu/negisiorosu.jpg" alt="">
          <p class="name">ねぎ塩ロースかつ定食</p>
          <p class="deta">ロースかつ(120g)</p>
          <p>1,380円</p>
      </div>
  </div>

  <div id="tonkatu_osinagaki" class="back">
    
      <h2 class=""><img src="./img/menu_name/gentei_menu.png" alt=""></h2>
  

      <?php foreach($rows as $row){ ?>
        <?php if($row[3] == "公開"){ ?>
          <div class="category">
            <img class="img" src="./img/menu_seasonal/<?php echo $row[1] ?>" alt="">
            <p class="name"><?php echo $row[2]; ?></p>
            <p class="deta">(<?php echo $row[4]; ?>)</p>
            <p><?php echo $row[5]; ?>円</p>
            </div>
          <?php } ?>
      <?php } ?>
</div>

  <div id="tonkatu_osinagaki">
    <h2 class=""><img src="./img/menu_name/ebi_menu.png" alt=""></h2>
      <div class="category">
          <img class="img" src="./img/menu_ebi/ebihurai.jpg" alt="">
          <p class="name">大えびフライ(1本)</p>
          <p>480円</p>
      </div>
      <div class="category">
          <img class="img" src="./img/menu_ebi/ebimori.jpg" alt="">
          <p class="name">えびフライ盛り(5本)</p>
          <p>2,230円</p>
      </div>
      <div class="category">
          <img class="img" src="./img/menu_ebi/ebirosu.jpg" alt="">
          <p class="name">えびフライ＆ロースかつ定食</p>
          <p>1,370円</p>
      </div>
      <div class="category">        
          <img class="img" src="./img/menu_ebi/ebi_teisoku.jpg" alt="">
          <p class="name">えびフライ＆ヒレかつ定食</p>
          <p>1,470円</p>
      </div>
  </div>

  <div id="tonkatu_osinagaki">
    <h2 class=""><img src="./img/menu_name/don_menu.png" alt=""></h2>
    <div class="category">
        <img class="img" src="./img/menu_don/sosukatu.jpg" alt="">
        <p class="name">ソースかつ丼</p>
        <p>730円</p>
    </div>
    <div class="category">
        <img class="img" src="./img/menu_don/rosukatutamago.jpg" alt="">
        <p class="name">ロースかつ玉子だしかつ丼</p>
        <p>730円</p>
    </div>
    <div class="category">
        <img class="img" src="./img/menu_don/hirekatutamago.jpg" alt="">
        <p class="name">ヒレかつ玉子だしかつ丼</p>
        <p>780円</p>
    </div>
    <div class="category">
        <img class="img" src="./img/menu_don/tikinnkatu.jpg" alt="">
        <p class="name">チキンかつ丼</p>
        <p>680円</p>
    </div>
  </div>
</div>

<div id="access_big">
  <div id="access">
    <h2 class="access_moji">アクセス</h2>
    <div id="address1">
      <div id="address_ul">
        <ul>
        <li>まるかつ本店</li>
        <li>〒630-8441　奈良県奈良市神殿町667-1</li>
        <li>電話：0742-81-4568</li>
        <li>まるかつ通販事業部：0742-93-6686</li>
        <li>共同駐車場 : 50台</li>
        <li>営業時間 : 11:00～22:00</li>
        <li>※ラストオーダー（最終ご入店） 21:30</li>
        <li>※お持ち帰りも継続いたします</li>
        <li>定休日 : 年中無休</li>
        </ul>
      </div>
      <iframe  class="map" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13127.345974817761!2d135.81985000000003!3d34.658832000000004!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf76a85d6ac33e6bd!2z44G-44KL44GL44Gk!5e0!3m2!1sja!2sjp!4v1612924599780!5m2!1sja!2sjp" width="600" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    <div class="flex_img">
      <a href="https://lin.ee/2vs3Vi7of"><img class="link_img" src="img/access/line-bn-tuhanc.jpg" alt=""></a>
      <a href="https://lin.ee/jdLHw6H"><img class="link_img" src="img/access/line-bn-koshikib.jpg" alt=""></a>
      <a href="https://line.me/S/sticker/10072661"><img class="link_img" src="img/access/linestamp-bn.jpg" alt=""></a>
  </div>
  <div id="sns_link">
    <a href="https://www.instagram.com/marukatsu_nara/?hl=ja"><img src="img/insta_logo.png" alt="instagram"></a>
    <a href="https://twitter.com/marukatsunara"><img src="img/twitter_logo.png" alt="twitter"></a>
    <a href="https://line.me/R/ti/p/%40902pxczo"><img src="img/line_logo.png" alt="line"></a>
  </div>
  </div>
</div>

<div id="big_footer">
<div id="footer2">
  <!-- <img  class="logo" src="img/logo_marukatu.jpg" alt="marukatu"> -->
  <p id="©">©marukatu</p>
</div>
</div>
<!-- 流れるこめんと -->
</head>
</body>