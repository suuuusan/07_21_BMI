<!-- ログインしているかチェックする関数化している。してない場合はエラー表示 -->
<?php
session_start();
$u_name = $_SESSION['name'];
$u_height = $_SESSION['height'];
$u_weight = $_SESSION['weight'];

include("funcs.php");
loginCheck();
$pdo  = db_connect();

$msg = 'こんにちは' . htmlspecialchars($u_name, \ENT_QUOTES, 'UTF-8') . 'さん';
// $view = $u_weight;

// データ取得SQL作成 SELECT文
$sql = 'SELECT * FROM BMI ';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();


// SQL準備&実行



// データ登録処理後
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    exit('sqlError:' . $error[2]);
}
?>





<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>BMI data</title>
</head>

<body>
    <header style='background-color: lightgray;font-size:large;'><?= $msg ?></header>


    <!-- データフォーム入力 -->
    <form action="confirm2.php" method="POST">
        <table border='2'>
            <tr>
                <td>前回の身長</td>
                <td><?= $u_height  ?>cm</td>
            </tr>
            <tr>
                <td>前回の体重</td>
                <td><?= $u_weight  ?>kg</td>
            </tr>
            <tr>
                <td>身長</td>
                <td><input type="number" name="height" id="heightInput" size="10" value="160.0" step="0.5">cm</td>
            </tr>
            <tr>
                <td>体重</td>
                <td><input type="number" name="weight" id="weightInput" size="10" value="60.0" step="0.1">kg</td>
            </tr>
            <tr>
                <td><input type="button" value="BMI計算" id="bmibtn"></td>
                <td>
                    <div id="bminum"></div>
                </td>
            </tr>
            <tr>
                <td>体型</td>
                <td>
                    <div id="figure"></div>
                </td>
            </tr>
        </table>
        <button type="submit" class="btn btn-primary">確認する</button>
    </form>
    <button class="btn btn-success" onclick="location.href='logout.php'">ログアウト</button>

    <script src=main.js></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


</body>

</html>