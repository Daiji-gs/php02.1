<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">登録データ一覧</a>
            <?php if(isset($_SESSION["kanri_flg"]) && $_SESSION["kanri_flg"] == 1) { ?>
                <a class="navbar-brand" href="user.php">ユーザー登録</a>
            <?php } ?>
            <a class="navbar-brand" href="logout.php">ログアウト</a>
        </div>
    </div>
</nav>