<?php
session_start();
//0. 関数群の読み込み
include("funcs.php");
sschk();

//1. DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = db_conn();      //DB接続関数
} catch (PDOException $e) {
  exit('DBConnection Error:'.$e->getMessage());
}

//２．データ登録SQL作成
$sql = "SELECT * FROM gs_bm_table;";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
  //SQLエラーの場合
  sql_error($stmt);
}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $r = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<a href="bm_update_view.php?id='.h($r["id"]).'">';
    $view .= h($r["id"])." | ".h($r["name"])." | ".h($r["url"])." | ".h($r["comment"])." | ".h($r["datetime"]);
    // $view .= $res['id'].', '.$res['name'].', '.$res['url'].', '.$res['comment'].', '.$res['datetime'];
    $view .= '</a>';
    $view .= '<a href="bm_delete.php?id='.h($r["id"]).'">';
    $view .= "[削除]<br>";
    $view .= '</a>';
  }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ブックマーク表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
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
<div>
    <div class="container jumbotron"><?=$view?></div>
</div>
<!-- Main[End] -->

</body>
</html>
