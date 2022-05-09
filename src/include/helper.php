<?php

//XSS対策
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}

//パスワードを暗号化する文字列の生成
function makeSecurePassword($password): string
{
    return sha1($password . SALT);
}

function makeCsrfToken()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        return;
    }
    $token = sha1(openssl_random_pseudo_bytes(16));
    $_SESSION['token'] = $token;
}
