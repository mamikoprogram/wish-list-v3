<?php

/**
 * XSS対策
 *
 * @param $str
 *
 * @return string
 */
function h($str): string
{
    return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}

/**
 * セキュアなパスワード文字列を作成
 *
 * @param $password
 *
 * @return string
 */
function makeSecurePassword($password): string
{
    return sha1($password . SALT);
}

/**
 * @return void
 */
function makeCsrfToken(): void
{
    if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
        return;
    }
    $token = sha1(openssl_random_pseudo_bytes(16));
    $_SESSION['token'] = $token;
}
