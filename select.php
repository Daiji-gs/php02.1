<?php
    //エラー表示
    ini_set("display_errors", 1);

    //1.  DB接続します
    try {
      //Password:MAMP='root',XAMPP=''
    $pdo = new PDO(
        'mysql:dbname=gsyamanaka_php02;charset=utf8;host=mysql3112.db.sakura.ne.jp',
        'gsyamanaka_php02',
        'gsyamanaka_php02'
    );
    } catch (PDOException $e) {
      exit('DBConnectError!!:'.$e->getMessage());
    }

    //２．データ登録SQL作成
    $stmt = $pdo->prepare("SELECT * FROM gs_books_table");
    $status = $stmt->execute();

    //３．データ表示
    $view="";
    if($status==false) {
      //execute（SQL実行時にエラーがある場合）
      $error = $stmt->errorInfo();
      exit("SQLError!!:".$error[2]);
    }

    //全データ取得
    $values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
    //JSONに値を渡す場合に使う
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
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">登録データ（クリックでホーム画面に戻る）</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->


<!-- Main[Start] -->
<!-- <div> -->
    <!-- <div class="container jumbotron">
      <table>
        <?php foreach($values as $v){ ?>
          <tr>
            <td><?= $v["name"]?></td>
            <td><?= $v["url"]?></td>
            <td><?= $v["comment"]?></td>
          </tr>
        <?php } ?>
      </table>
    </div> -->

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

    <tbody>
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
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>




<!-- </div> -->
<!-- Main[End] -->


<script>
  //JSON受け取り



</script>
</body>
</html>
