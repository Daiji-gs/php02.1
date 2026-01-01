<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>書籍データベース</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">書籍データベース</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="insert.php">
  <div class="container">
    <div class="page-wrap">
      <div class="form-card">
        <fieldset>
          <legend>書籍登録</legend>

          <div class="form-group">
            <label>書籍名</label>
            <input type="text" name="name" class="form-control">
          </div>

          <div class="form-group">
            <label>書籍URL</label>
            <input type="text" name="url" class="form-control">
          </div>

          <div class="form-group">
            <label>書籍コメント</label>
            <textarea name="comment" class="form-control"></textarea>
          </div>

          <div class="form-group">
            <label>登録日時</label>
            <input type="text" class="form-control"
                   value="<?= date('Y-m-d H:i:s') ?>" readonly>
          </div>

          <button type="submit" class="btn btn-primary">送信</button>
        </fieldset>
      </div>
    </div>
  </div>
</form>

<!-- Main[End] -->


</body>
</html>
