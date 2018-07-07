<?php
  
  session_start();

	require('dbconnect_bbs2.php');

  // 元の情報を表示する用
	$id=$_GET["id"];

  $sql='SELECT * FROM `tweets` WHERE `id`=?';

  $data = array($id);
  $stmt = $dbh->prepare($sql);
  $stmt->execute($data);

  $tweet=$stmt->fetch(PDO::FETCH_ASSOC);


  // 更新
	if(!empty($_POST)){
    $comment=$_POST['comment'];

		$edit_sql='UPDATE `tweets` SET `comment`=? WHERE `id`=?';

		$edit_data=array($comment,$id);
		$edit_stmt = $dbh->prepare($edit_sql);
    $edit_stmt->execute($edit_data);

    	header("Location:bbs2.php");
	}

  // var_dump($comment);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<div class="container">
      <div class="row">
        <!-- ここにコンテンツの内容 -->
          <div class="col-xs-4 col-xs-offset-4">
              <form class="form-group" method="post" action="edit.php?id=<?php echo $_GET['id']; ?>">
                  <div class="col-xs-offset-2 col-xs-11">
                    <!-- <img src="user_profile_img/<?php echo $feed['img_name']; ?>" width="60" > -->
                        <p><?php echo $tweet['nickname']; ?></p>
                        <p><?php echo $tweet['created']; ?></p>
                  </div>
                  <textarea name="comment" class="form-control"><?php echo $tweet['comment']; ?></textarea><br>
                  <input type="submit" value="更新" class="btn btn-primary btn-xs col-xs-offset-2 col-xs-8">
              </form>
          </div>  
      </div>
  </div>
</body>
</html>