<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理者画面</title>
</head>

<body>
    <h1>管理者画面</h1>
</body>

</html>

<?php
session_start();
include("funcs.php");
// loginCheck();

$pdo  = db_connect();

// データの取得 DESCは大きいものから降順に並べる
$sql = "SELECT * FROM BMI ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();

// 取得したデータを一覧表示
while ($row = $stmt->fetch()) {
    echo "<hr>{$row["id"]}:";
    echo $row["name"] . "/";
    echo $row["sex"] . "/";
    echo $row["grade"] . "/";
    echo "身長" . $row["height"] . "cm/";
    echo "体重" . $row["weight"] . "kg/";
    echo "BMI" . $row["bmi"] . "/";
    echo "(" . date("Y/m/d H:i", strtotime($row["dt"])) . ")";


    // 変更、削除、詳細表示へのリンク
    echo "<a href=update.php?u_id=" . $row["id"] . ">変更 </a>";
    echo "<a href=delate-confirm.php?u_id=" . $row["id"] . ">削除 </a>";
    echo "<a href=detail.php?u_id=" . $row["id"] . ">詳細 <a/>";
}
