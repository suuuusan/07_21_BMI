<?php
session_start();

// 入力した値の検証、加工
// $lid = chkString($_POST["lid"], "ログインID");
// $lpw = chkString($_POST["lpw"], "パスワード");
// $name = chkString($_POST["name"], "名前");
// $mail = chkString($_POST["mail"], "名前");
// $sex = chkString($_POST["sex"], "性別");
// $grade = chkString($_POST["grade"], "学年");
$height = chkString($_POST["height"], "身長");
$weight = chkString($_POST["weight"], "体重");
// $bmi = chkString($_POST["bmi"], "BMI");

$height /= 100;
$bmi = $weight / ($height * $height);
$bmi = round($bmi, 2);
$height *= 100;




// // 入力値をセッション変数に格納
// $_SESSION["lid"] = $lid;
// $_SESSION["lpw"] = $lpw;
// $_SESSION["name"] = $name;
// $_SESSION["mail"] = $mail;
// $_SESSION["sex"] = $sex;
// $_SESSION["grade"] = $grade;
$_SESSION["height"] = $height;
$_SESSION["weight"] = $weight;
$_SESSION["bmi"] = $bmi;



function chkString($temp = "", $field, $accept_empty = false)
{
    // 未入力チェック
    if (empty($temp) and !$accept_empty) {
        echo "{$field}を入力して下さい";
        exit;
    }

    // 入力内容の安全性チェック
    $temp = htmlspecialchars($temp, ENT_QUOTES, "UTF-8");

    return $temp;
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>BMI</title>
</head>

<body>
    <header style='background-color: lightgray;font-size:large;'>確認画面</header>

    <!-- 入力確認form -->
    <form action="submit.php" method="POST">
        <table border="2">
            <!-- <tr>
                <td>ログインID</td>
                <td>
                    <?php echo $lid; ?>
                </td>
            </tr>
            <tr>
                <td>パスワード</td>
                <td>
                    <?php echo $lpw; ?>
                </td>
            </tr>
            <tr>
                <td>名前</td>
                <td>
                    <?php echo $name; ?>
                </td>
            </tr>
            <tr>
                <td>メールアドレス</td>
                <td>
                    <?php echo $mail; ?>
                </td>
            </tr>
            <tr>
                <td>性別</td>
                <td>
                    <?php echo $sex; ?>
                </td>
            </tr>
            <tr>
                <td>学年</td>
                <td>
                    <?php echo $grade; ?>
                </td>
            </tr> -->
            <tr>
                <td>身長</td>
                <td>
                    <?php echo $height . 'cm'; ?>
                </td>
            </tr>
            <tr>
                <td>体重</td>
                <td>
                    <?php echo $weight .
                        'kg'; ?>
                </td>
            </tr>
            <tr>
                <td>BMI</td>
                <td>
                    <?php echo $bmi; ?>
                </td>
            </tr>
        </table>
        <button type="submit" class="btn btn-primary">入力OK</button>
    </form>
    <button class="btn btn-danger" onclick="location.href='register.php'">入力画面へ戻る</button>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


</body>

</html>