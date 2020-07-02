<?php
// XSS対応関数
function h($val)
{
    return htmlspecialchars($val, ENT_QUOTES);
}

// LOGIN認証しているかチェックする関数
function loginCheck()
{
    if (
        // issetは存在をチェック！でなければという意味。chk_ssidがあってかつsessionidと一致していなければエラー
        !isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"] != session_id()
    ) {
        echo "LOGIN Error!";
        exit();
    } else {
        // マイページ毎新しいsessionidが発行される
        session_regenerate_id(true);
        $_SESSION["chk_ssid"] = session_id();
        // echo $_SESSION["chk_ssid"];
    }
}

function db_connect()
{

    // DB接続の設定
    // DB名は`gsacf_x00_00`にする
    $dbn = 'mysql:dbname=gsacf_d06_21;charset=utf8;port=3306;host=localhost';
    $user = 'root';
    $pwd = '';

    try {
        //     // ここでDB接続処理を実行する
        $pdo = new PDO($dbn, $user, $pwd);
    } catch (PDOException $e) {
        //     // DB接続に失敗した場合はここでエラーを出力し，以降の処理を中止する
        echo json_encode(["db error" => "{$e->getMessage()}"]);
        exit('データベースに接続できませんでした');
    }
    return $pdo;
}
