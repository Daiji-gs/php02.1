<?php
//エラー表示
ini_set("display_errors", 1); // 1=表示、0=非表示

//1. POSTデータ取得
$name    = $_POST["name"];
$url     = $_POST["url"];
$comment = $_POST["comment"];


//2. DB接続します
include("funcs.php");
$pdo = db_conn(); //returnから救い出している


//３．データ登録SQL作成(***INSERT INTO gs_books_table***)
$sql="INSERT INTO gs_books_table(name,url,comment,date)VALUES(:name, :url, :comment, sysdate());"; //ここで箱を作っている。
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name',    $name,    PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)　ここで上記の箱に安全に情報を入れる
$stmt->bindValue(':url',     $url,     PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("SQLError!!:".$error[2]);
}else{
  //５．index.phpへリダイレクト
 header("Location: select.php"); //Locationの頭は大文字。:とindexの間には、スペースがある。
 exit();
}
?>
