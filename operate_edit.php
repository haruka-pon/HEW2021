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
 
//管理画面に戻るボタン押されたとき
if(isset($_POST['button']) && $_POST['button'] == 'back_top'){
    setcookie('id','',time()-60*60*60);
    header("Location: operate.php");
    exit();
}

$no = $_COOKIE['id'];
$name='';
$fp = fopen('./data.csv' , 'r');
$i=0;
$list=[];
while($value = fgets($fp)){
        $list[] = explode("," , $value);
        if($no == $list[$i][0]){
            $name = $list[$i][1];
            $text = $list[$i][2];
            $time = $list[$i][4];
            $edit = $list[$i][3];
        }
    $i++;
}
fclose($fp);

$fp = fopen('./data.csv' , 'r');
while ($row = fgetcsv($fp)) {
    $rows[] = $row;
}
fclose($fp);

// 公開、非公開にするボタンを押されたとき
if(isset($_POST['button']) && $_POST['button'] == 'change'){
    
    foreach($rows as $key => $val){
        if($val[0] == $no){
            if($edit == "非公開"){
                $edit2 = "公開";
            }
            if($edit == "公開"){
                $edit2 = "非公開";
            }
            $val[3] = $edit2;
            $rows[$key] = $val;
        }
    }
        
    $fp = fopen('./data.csv' , 'w');
    foreach($rows as $val){
        fputcsv($fp,$val);
    }
    fclose($fp);

    header("Location: operate_edit.php");
    exit();
}

?>

<!doctype html>
<html lang="ja">    
<head>         
<meta charset="utf-8">
<title>編集</title>

<link rel="stylesheet" type="text/css" href="css/operate_edit.css">
<link rel="stylesheet" type="text/css" href="css/test.css">

</head>
<body>

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

<table>
<tr><th>No:</th><td><?php echo $no; ?></td></tr>
<tr><th>名前:</th><td><?php echo $name; ?></td></tr>
<tr><th>時間:</th><td><?php echo $time; ?></td></tr>
<tr><th>本文:</th><td><?php echo $text; ?></td></tr>
<tr><th>公開状況:</th><td><?php echo $edit; ?></td></tr>
</table>


<?php $change="" ?>
<?php if($edit=="公開"){
    $change = "非公開";
} ?>
<?php if($edit=="非公開"){
    $change = "公開";
} ?>

<div id="button_box">
    <form action="operate_edit.php" method="post">
        <button type="submit" name="button" value="change">
            <?php echo $change; ?>にする
        </button>
    </form>
    <form method="post" action="operate_edit.php">
        <button type="submit" name="button" value="back_top">戻る</button>
    </form>
</div>
</body>
</html> 