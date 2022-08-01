<?php

function render(string $template, array $vars = []): void
{
    extract($vars, EXTR_OVERWRITE);
    require dirname(__FILE__) . "/../templates/{$template}.php";
}

/**
 * 部品化されたHTMLを出力する
 *
 * @param string $element 要素名
 * @param array $vars 利用される変数を連想配列で指定
 * @return void
 */
function element(string $element, array $vars = []): void
{
    extract($vars, EXTR_OVERWRITE);
    include dirname(__FILE__) .
        "/../templates/elements/{$element}.php";
}
