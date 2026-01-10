<?php
//１．PHP
//select.phpのPHPコードをマルっとコピーしてきます。
//※SQLとデータ取得の箇所を修正します。
$id = $_GET["id"]; //GETで受け取る
include("funcs.php");
$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM gs_books_table WHERE id=:id";  //:コロンを付けている。。。。。。。なぜ？
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT 文字の場合 PDO::PARAM_STR)
$status = $stmt->execute();


//３．データ表示
$values = "";
if($status==false) {
  sql_error($stmt);
}

//一つのデータだけ取得
$v =  $stmt->fetch(); //１レコードのみ取得
?>


<!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
理由：入力項目は「登録/更新」はほぼ同じになるからです。
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="update.php"> <!--updateに飛ばしたい-->
  <div class="jumbotron">
   <fieldset>
    <legend>フリーアンケート・更新</legend>
     <label>書籍名：<input type="text" name="name" value="<?=$v["name"]?>"></label><br>
     <label>URL：<input type="text" name="url" value="<?=$v["url"]?>"></label><br>
     <label>コメント：<textArea name="comment" rows="4" cols="40"><?=$v["comment"]?></textArea></label><br>
     <input type="hidden" name="id" value="<?=$v["id"]?>">
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>



