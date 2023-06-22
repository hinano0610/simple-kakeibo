<?php
//dbconnect.phpを読み込む→　DBに接続　
include_once('./dbconnect.php');


$date = $_POST["date"];
$title = $_POST["title"];
$amount = $_POST["amount"];
$type = $_POST["type"];

//INSERT文の作成
$sql = "INSERT INTO records(title, amount, date, type, created_at, updated_at) VALUES(:title, :amount, :date, :type, now(), now())";

 //先ほど作成したsqlを実行できるように準備
$stmt = $pdo->prepare($sql);

//値の設定
$stmt->bindParam(':title',$title,PDO::PARAM_STR);
$stmt->bindParam(':type',$type,PDO::PARAM_INT);
$stmt->bindParam(':amount',$amount,PDO::PARAM_INT);
$stmt->bindParam(':date',$date,PDO::PARAM_STR);

//SQLを実行
$stmt->execute();
//index.phpに移動
header('Location: ./index.php');
exit;

 



?>