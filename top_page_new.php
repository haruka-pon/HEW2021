<?php
// session_start();

$fp = fopen('data.csv' , 'r');
while ($row = fgetcsv($fp)) {
  if($row[3] == "公開"){
    $rows[] = $row;
  }
}
fclose($fp);


?>



<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>まるかつTOPページ</title>
    <link rel="stylesheet" type="text/css" href="css/style_new.css">
    <link rel="stylesheet" type="text/css" href="css/test.css">
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


<header id="header">
  <div class="main_imgBox">
    <img class="main_logo" src="./img/marukatu_logo_toumei.png" alt="まるかつ">
    <div class="main_img" style="background-image: url(img/top/kirei1.jpg)"></div>
    <div class="main_img" style="background-image: url(img/top/kirei2.jpg)"></div>
    <div class="main_img" style="background-image: url(img/top/kirei3.jpg)"></div>
  </div>
    <div id="box-nav">
      <ul class="inner-nav">
        <li class="box-logo"><a href="#"><img class="logo-img" src="img/logo_marukatu2.jpg" alt="まるかつロゴ"></a></li>
          <div>
            <a class="nav" href="./top_page_new.php"><li>TOP</li></a>
            <a class="nav" href="./menu_page.php"><li>おしながき</li></a>
            <a class="nav" href="./coment_new.php"><li>コメント</li></a>
            <a class="nav" href="#access_big"><li>アクセス</li></a>
            <a class="nav" href="./login.php"><li>管理者ログイン</li></a>
          </div>
      </ul>
    </div>
</header>



<div id="kodawari_top">
    <!-- <h2 class="kodawari_top_moji">こだわり</h2> -->
</div>

<!-- 固定背景 -->
<div id="area">
  <h2 class="h2_title_shop">まるかつとは</h2>
  <div class="flex1">
    <img src="./img/shop.jpg" alt="" width=340px height=233px>
    <p>飲食店で約17年修行した経験があって、しかも料理のセンスもあるのでしょうか(あると思います!)、負けず嫌いでこだわる性格もプラスに働いて、おいしいとんかつが出来るようになっていきました。友人からもおだてられて、単純な私は、ますますおいしいとんかつづくりにのめり込みました。
      そして開業したのが「まるかつ」です。</p>
  </div>
  <div class="flex2">
    <p>なんかどこかで聞いたような名前ですが、親しんでほしいという気持ちで名付けました。フランチャイズではありません。か弱き個人店です。
      おかげさまで開業してから多くのお客様に来ていただくことができました。</p>
      <img src="./img/orner.jpg" alt="">
    </div>   
</div>
<div class="cd-fixed-bg cd-bg-1">
  <h2 class="sec_tit">
    <img src="./img/kodawari_text.png" alt="こだわり" width="400" height="90">
  </h2>
</div>

<div id="kodawari">
  <div id="kodawari_image">
  </div>
  <div id="kodawari_moji">
    <h2>奈良のとんかつ屋さん</h2>
    <p>食に妥協を許さず</p>
    <p>長い間研究を重ねてたどり着いた</p>
    <p>ならの美味しいとんかつ屋さん</p>
    <p>「まるかつ」</p>
    <p>かつ本来のサクッとジューシーな美味しさに、</p>
    <p>食材や素材のひとつひとつまで心を配り、</p>
    <p>健康的で上質なおいしさを追及し続けます</p>
    <p>季節を彩るまるかつの味をお楽しみください</p>
  </div>
</div>

<div id="review">
  <h2 class="voice">お客様の声</h2>
  <a class="link" href="./coment_new.php"><p>コメントを書き込む</p></a>
  <div class="sample02">
  <?php if (!empty($rows)): ?>
      <ul class="ul1">
        <?php shuffle($rows); ?>
        <?php foreach ($rows as $row){ ?>
          <li><?=$row[2]?> </li>
        <?php } ?>
      </ul>
      <ul class="ul2">
      <?php shuffle($rows); ?>
        <?php foreach ($rows as $row){ ?>
          <li><?=$row[2]?> </li>
        <?php } ?>
      </ul>
      <ul class="ul3">
      <?php shuffle($rows); ?>
        <?php foreach ($rows as $row){ ?>
          <li><?=$row[2]?> </li>
        <?php } ?>
      </ul>
      <ul class="ul4">
      <?php shuffle($rows); ?>
        <?php foreach ($rows as $row){ ?>
          <li><?=$row[2]?> </li>
        <?php } ?>
      </ul>
      <ul class="ul5">
      <?php shuffle($rows); ?>
        <?php foreach ($rows as $row){ ?>
          <li><?=$row[2]?> </li>
        <?php } ?>
      </ul>
      <ul class="ul6">
      <?php shuffle($rows); ?>
        <?php foreach ($rows as $row){ ?>
          <li><?=$row[2]?> </li>
        <?php } ?>
      </ul>
      <!-- <ul class="ul7">
      <?php shuffle($rows); ?>
        <?php foreach ($rows as $row){ ?>
          <li><?=$row[2]?> </li>
        <?php } ?>
      </ul> -->
  <?php else: ?>
    <p class="madanai">投稿はまだありません</p>
  <?php endif; ?>
  </div>
</div>

<div id="caption">
    <h2 class="title_osinagaki">おしながき</h2>
  <div id="box_big1">
    <div id="box1_cover">
      <p class="title_kondate">献立</p>
      <p class="detail_kondate">銘柄豚をはじめ、揚げ油にパン粉、ソース、付け合わせまでこだわり抜いた自慢の逸品。</p>
    </div>
    <div id="box1"> 
      <input type="radio" name="photo1" id="img1" checked>
      <input type="radio" name="photo1" id="img2">
      <input type="radio" name="photo1" id="img3">
      <div class="slide">
       <img src="img/menu_tonkatu/rosukatu.jpg" alt="">
       <img src="img/menu_tonkatu/hirekatu.jpg" alt="">
       <img src="img/menu_tonkatu/negisiorosu.jpg" alt="">
      </div>
      <ul class="thumbnail">
       <li>
        <label for="img1">
         <img src="./img/menu_tonkatu/rosukatu.jpg" alt=""></label>
       </li>
       <li>
        <label for="img2">
         <img src="./img/menu_tonkatu/hirekatu.jpg" alt=""></label>
       </li>
       <li>
        <label for="img3">
         <img src="./img/menu_tonkatu/negisiorosu.jpg" alt=""></label>
       </li>
      </ul>
    </div>
  </div>

  <div id="box_big2">
    <div id="box2_cover">
      <p class="title_kondate">季節の献立</p>
      <p class="class="detail_kondate"">四季の味覚を一椀一鉢に心を込めておもてなし。季節の移ろいをご堪能ください。</p>
    </div>
    <div id="box2"> 
      <input type="radio" name="photo2" id="img4" checked>
      <input type="radio" name="photo2" id="img5">
      <input type="radio" name="photo2" id="img6">
      <div class="slide2">
       <img src="img/menu_seasonal/kakifurai.jpg" alt="">
       <img src="img/menu_don/rosukatutamago.jpg" alt="">
       <img src="img/menu_ebi/ebihirekatu.jpg" alt="">
      </div>
      <ul class="thumbnail2">
       <li>
        <label for="img4">
         <img src="./img/menu_seasonal/kakifurai.jpg" alt=""></label>
       </li>
       <li>
        <label for="img5">
         <img src="./img/menu_don/rosukatutamago.jpg" alt=""></label>
       </li>
       <li>
        <label for="img6">
         <img src="./img/menu_ebi/ebihirekatu.jpg" alt=""></label>
       </li>
      </ul>
    </div>
  </div>
  <a class="menu_link" href="./menu_page.php">メニュー<br>一覧へ</a>
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
    <p id="©">©marukatu</p>
    <!-- <a id="ope" href="./operate.php"><p>管理者画面へ</p></a> -->
  </div>
</div>

</head>
</body>