<?php
session_start();
//0. 関数群の読み込み
include("funcs.php");
sschk();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ブックマーク登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="bm_register.php">ブックマーク登録</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="bm_list_view.php">ブックマーク表示</a></div>
    <?php if ($_SESSION['kanri_flg'] == 1) : ?>
      <div class="navbar-header"><a class="navbar-brand" href="us_register.php">ユーザー登録</a></div>
      <div class="navbar-header"><a class="navbar-brand" href="us_list_view.php">ユーザー表示</a></div>
      <!-- endifとセミコロンで閉じる -->
    <?php endif; ?>
    <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="bm_insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>ブックマーク登録</legend>
     <label>書籍名：<input type="text" name="name"></label><br>
     <label>書籍URL：<input type="text" name="url"></label><br>
     <label>書籍コメント：<textArea name="comment" rows="10" cols="200"></textArea></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->

</body>
</html>
