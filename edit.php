<?php 
	require('dbconnect_bbs2.php');

	$id=$_GET["id"];

	if(!empty($_GET)){
		$sql='UPDATE `tweets` SET `comment`=? WHERE `id`=?';

		$data=array($_POST['comment'],$_GET['id']);
		$stmt = $dbh->prepare($sql);
    	$stmt->execute($data);

    	// header("Location:bbs2.php");
	}



	$sql='SELECT * FROM `tweets`';

	$data = array();
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);

    $tweets = array();

    $tweets=$stmt->fetch(PDO::FETCH_ASSOC);
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
              <form class="form-group" method="post">
                  <div class="col-xs-offset-2 col-xs-11">
                    <!-- <img src="user_profile_img/<?php echo $feed['img_name']; ?>" width="60" > -->
                        <p><?php echo $tweets['nickname']; ?></p>
                        <p><?php echo $tweets['created']; ?></p>
                  </div>
                  <textarea name="feed" class="form-control"><?php echo $tweets['comment']; ?></textarea><br>
                  <input type="submit" value="更新" class="btn btn-primary btn-xs col-xs-offset-2 col-xs-8">
              </form>
          </div>  
      </div>
  </div>
</body>
</html>