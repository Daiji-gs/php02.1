<?php
//【重要】
//insert.phpを修正（関数化）してからselect.phpを開く！！
session_start();
include("funcs.php");

//LOGINチェック → funcs.phpへ関数化しましょう！
sschk();


$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM gs_books_table";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();


//３．データ表示
$values = "";
if($status==false) {
  sql_error($stmt);
}

//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
$json = json_encode($values,JSON_UNESCAPED_UNICODE);

?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>登録書籍データ表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->

<!-- <header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">登録データ（クリックでホーム画面に戻る）</a>
      </div>
    </div>
  </nav>
</header> -->

<header>
    <?php echo $_SESSION["name"]; ?>さん
    <?php include("menu.php"); ?>
</header>

<!-- Head[End] -->


<!-- Main[Start] -->
<div class="container jumbotron">
  <table class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>No</th>
        <th>書籍名</th>
        <th>URL</th>
        <th>コメント</th>
        <th>登録日時</th>
      </tr>
    </thead>

    <tbody> <!-- XSS対策 -->
      <?php foreach($values as $v){ ?>
        <tr>
          <td><?= htmlspecialchars($v["id"] ?? "", ENT_QUOTES, "UTF-8") ?></td>
          <td><?= htmlspecialchars($v["name"] ?? "", ENT_QUOTES, "UTF-8") ?></td>
          <td>
            <?php if(!empty($v["url"])) { ?>
              <a href="<?= htmlspecialchars($v["url"], ENT_QUOTES, "UTF-8") ?>"
                 target="_blank" rel="noopener">
                <?= htmlspecialchars($v["url"], ENT_QUOTES, "UTF-8") ?>
              </a>
            <?php } ?>
          </td>

          <td><?= nl2br(htmlspecialchars($v["comment"] ?? "", ENT_QUOTES, "UTF-8")) ?></td>

          <td><?= htmlspecialchars($v["date"] ?? "", ENT_QUOTES, "UTF-8") ?></td>
          <?php if(isset($_SESSION["kanri_flg"]) && $_SESSION["kanri_flg"] == 1) { ?>
            <td><a href="detail.php?id=<?=h($v["id"])?>">📒更新</a></td>
            <td><a href="delete.php?id=<?=h($v["id"])?>">🚮削除</a></td>
          <?php } ?>

        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<!-- Main[End] -->


<script>
  //JSON受け取り
  const a = '<?php echo $json; ?>';
  console.log(JSON.parse(a));
</script>
</body>
</html>
