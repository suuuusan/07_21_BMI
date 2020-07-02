<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>BMI data</title>
</head>

<body>
    <header style='background-color: lightgray;font-size:large;'>新規登録</header>

    <!-- データフォーム入力 -->
    <form action="confirm.php" method="POST">
        <table border='2'>
            <tr>
                <td>ログインID</td>
                <td><input type="text" name='lid' size="30"></td>
            </tr>
            <tr>
                <td>パスワード</td>
                <td><input type="text" name='lpw' size="30"></td>
            </tr>
            <tr>
                <td>名前</td>
                <td><input type="text" name='name' size="30"></td>
            </tr>
            <tr>
                <td>メールアドレス</td>
                <td><input type="mail" name='mail' size="30"></td>
            </tr>
            <tr>
                <td>性別</td>
                <td>
                    <!-- ２択ラジオボタン！！ -->
                    <input type="radio" name="sex" value="男性">男性
                    <input type="radio" name="sex" value="女性">女性
                </td>
            </tr>
            <tr>
                <td>学年</td>
                <td>
                    <!-- 選択メニュー!! -->
                    <select name="grade">
                        <option value=" ">▼選択</option>
                        <option>中学1年生</option>
                        <option>中学2年生</option>
                        <option>中学3年生</option>
                        <option>高校1年生</option>
                        <option>高校2年生</option>
                        <option>高校3年生</option>
                        <option>大学1年生</option>
                        <option>大学2年生</option>
                        <option>大学3年生</option>
                        <option>大学4年生</option>
                        <option>一般の方</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>身長</td>
                <td><input type="number" name="height" id="heightInput" size="10" value="000.0" step="0.5">cm</td>
            </tr>
            <tr>
                <td>体重</td>
                <td><input type="number" name="weight" id="weightInput" size="10" value="00.0" step="0.1">kg</td>
            </tr>
        </table>
        <button type="submit" class="btn btn-primary">確認する</button>

    </form>

    <!-- <script src=main.js></script> -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>