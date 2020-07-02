<?php
session_start();
if (empty($_SESSION)) {
    exit;
}

include("funcs.php");

$pdo  = db_connect();

$height *= 100;



// 入力内容の取得($_SESSIONから)
$lid = htmlspecialchars($_SESSION["lid"], ENT_QUOTES, "UTF-8");
$lpw = htmlspecialchars($_SESSION["lpw"], ENT_QUOTES, "UTF-8");
$name = htmlspecialchars($_SESSION["name"], ENT_QUOTES, "UTF-8");
$mail = htmlspecialchars($_SESSION["mail"], ENT_QUOTES, "UTF-8");
$sex = htmlspecialchars($_SESSION["sex"], ENT_QUOTES, "UTF-8");
$grade = htmlspecialchars($_SESSION["grade"], ENT_QUOTES, "UTF-8");
$height = htmlspecialchars($_SESSION["height"], ENT_QUOTES, "UTF-8");
$weight = htmlspecialchars($_SESSION["weight"], ENT_QUOTES, "UTF-8");
$bmi = htmlspecialchars($_SESSION["bmi"], ENT_QUOTES, "UTF-8");

// データの追加
$sql = "INSERT INTO BMI (u_id,u_pw,name,mail,sex,grade,height,weight,bmi,dt)
        VALUES(:lid, :lpw,:name,:mail, :sex, :grade, :height,:weight,:bmi,NOW())";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":lid", $lid);
$stmt->bindParam(":lpw", $lpw);
$stmt->bindParam(":name", $name);
$stmt->bindParam(":mail", $mail);
$stmt->bindParam(":sex", $sex);
$stmt->bindParam(":grade", $grade);
$stmt->bindParam(":height", $height);
$stmt->bindParam(":weight", $weight);
$stmt->bindParam(":bmi", $bmi);


$status = $stmt->execute();

// セッションデータの破棄
$_SESSION = array();
session_destroy();

// データ登録処理後
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    exit('sqlError:' . $error[2]);
} else {
    // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
    header('Location:masterpage.php');
}
