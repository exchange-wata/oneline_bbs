<!-- thanksのやつ -->
<?php
  $nickname = $_POST['nickname'];
  $comment = $_POST['comment'];

  // 1,データベースに接続する 電話かける
  $dsn = 'mysql:dbname=oneline_bbs;host=localhost'; 
  $user = 'root';
  $password = '';
  $dbh = new PDO($dsn, $user, $password); 
  $dbh->query('SET NAMES utf8');

  // 2,SQL文を実行  オーダーする
  $sql = "INSERT INTO `tweets` SET `nickname`='".$nickname."', `comment`='".$comment."' , `created`=NOW()"; 
      // sqlで時間を取っているため、$_POSTしなくて良い
  echo $sql . "<br>";
  $stmt = $dbh->prepare($sql); 
  $stmt->execute();

  // 3,データベースを切断する  電話切る
  $dbh = null;

header("Location: bbs_no_css.php");


?>
