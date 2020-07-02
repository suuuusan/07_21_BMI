<?php
session_start();
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

include("funcs.php");

$pdo  = db_connect();


// date登録sql作成
$sql = "SELECT * FROM BMI WHERE u_id=:lid AND u_pw=:lpw ";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid', $lid);
$stmt->bindValue(':lpw', $lpw);
$res = $stmt->execute();

// sql実行時にエラーがある場合
if ($res == false) {
    $error = $stmt->errorInfo();
    exit("QueryError:" . $error[2]);
}

// 抽出データを取得する
// $count= $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能
$val = $stmt->fetch(); //1レコードだけ取得方法
// error 表示用
$error_message = "";

// 該当レコードがあればSESSIONに値を代入
if ($_POST["lid"] == "master" && $_POST["lpw"] == "0001") {
    $_SESSION["chk_ssid"] = session_id();
    $_SESSION["name"] = $val['name'];
    // 認証オケの時
    header("Location:masterpage.php");
} else if ($val['id'] != "") {
    $_SESSION["chk_ssid"] = session_id();
    $_SESSION["name"] = $val['name'];
    $_SESSION["height"] = $val['height'];
    $_SESSION["weight"] = $val['weight'];
    // 認証オケの時
    header("Location:index.php");
} else {
    // 該当idがなかった場合
    header("Location:login.php");
    // echo "該当するID,パスワードが見つかりませんでした。</br>";
    // echo "もう一度入力して下さい。";

}
$error_message = "*ID、もしくはパスワードが間違っています。,<br>もう一度入力して下さい。";
exit();
