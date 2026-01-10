<?php
//PHP:コード記述/修正の流れ
//1. insert.phpの処理をマルっとコピー。
//   POSTデータ受信 → DB接続 → SQL実行 → 前ページへ戻る
//2. $id = POST["id"]を追加
//3. SQL修正
//   "UPDATE テーブル名 SET 変更したいカラムを並べる WHERE 条件"
//   bindValueにも「id」の項目を追加
//4. header関数"Location"を「select.php」に変更


//1. POSTデータ取得 修正されたデータがdetail.phpから飛んできている
$name    = $_POST["name"  ];
$url     = $_POST["url" ];
$comment = $_POST["comment"];
$id      = $_POST["id"    ]; //heddeでPOSTで一緒に飛んでくる



//2. DB接続します
include("funcs.php");
$pdo = db_conn(); //returnから救い出している

//３．修正されたデータをSQLに書き込んでいる（更新）
$sql = "UPDATE gs_books_table SET name=:name, url=:url, comment=:comment WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name',    $name,    PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':url',     $url,     PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id',      $id,      PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
    sql_error($stmt); //実行
}else{
    redirect("select.php");
}








