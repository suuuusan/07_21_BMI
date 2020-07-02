<?php

session_start();

// SESSIONを初期化
$_SESSION = array();

// cookieに保存しているsessionIDの保存期間を過去にして破棄する
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 42000, '/');
}

// サーバー側でのセッションIDの破棄
session_destroy();

// 処理後リダイレクト
header("Location:login.php");
exit();
