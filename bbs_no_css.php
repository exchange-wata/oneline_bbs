<!-- indexとcheck -->
<?php
  // ここにDBに登録する処理を記述する
  //DBに接続して、Read(SELECT)処理を記述する


// 1,データベースに接続する 電話かける
$dsn = 'mysql:dbname=oneline_bbs;host=localhost'; 
$user = 'root';
$password = '';
$dbh = new PDO($dsn, $user, $password); 
$dbh->query('SET NAMES utf8');

// 2,SQL文を実行  オーダーする
$sql = 'SELECT * FROM `tweets`';
$stmt = $dbh->prepare($sql); 
$stmt->execute();

// 3,データベースを切断する  電話切る
$dbh = null;

// 4,取り出し　デリバリー
$tweets = array(); 
// 空箱に初期値を入れる
while (1) {
  $rec = $stmt->fetch(PDO::FETCH_ASSOC); 
  if ($rec == false) {
    break; 
  }
  $tweets[] = $rec; 
  // // 箱の箱に入れるイメージー＞つぶやきを一個ずつ追加する
  // echo "<pre>";
  // var_dump($tweets);
  // echo "</pre>";
  // echo "<hr>";
  // // 確認用


}   
//ここの閉じカギカッコないとエラーでる＝whileの閉じかご



?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>セブ掲示版</title>
</head>
<body>
    <form method="post" action="post_tweet.php">
      <p><input type="text" name="nickname" placeholder="nickname"></p>
      <p><textarea type="text" name="comment" placeholder="comment"></textarea></p>
      <p><button type="submit" >つぶやく</button></p>
    </form>
    <!-- ここにニックネーム、つぶやいた内容、日付を表示する -->
    <?php 
      for ($i=0; $i < count($tweets) ; $i++) { 
         // 配列の回数分繰り返す。
        //以下、echoで二次元配列の取り出し方
        echo $tweets[$i]["nickname"] . "<br>";
        echo $tweets[$i]["comment"] . "<br>";
        echo $tweets[$i]["created"] . "<br>";
       } 

    ?>

</body>
</html>