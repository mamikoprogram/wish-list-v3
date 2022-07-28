<?php

function render(string $template, array $vars = []): void
{
    extract($vars, EXTR_OVERWRITE);
    require dirname(__FILE__) . "/../templates/{$template}.php";
}

function element(string $element, array $vars = []): void
{
    extract($vars, EXTR_OVERWRITE);
    include dirname(__FILE__) .
        "/../templates/elements/{$element}.php";
}
