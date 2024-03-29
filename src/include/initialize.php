<?php

/**
 * index.php から実行されたときのカレントディレクトリ
 * /var/www/learning
 *
 * wish/new.php から実行されたときのカレントディレクトリ
 * /var/www/learning/wish
 */

require_once dirname(__FILE__) . "/const.php";
require_once dirname(__FILE__) . "/db.php";
require_once dirname(__FILE__) . "/helper.php";
require_once dirname(__FILE__) . "/view.php";
require_once dirname(__FILE__) . "/user.php";
require_once dirname(__FILE__) . "/wish.php";


session_start();
makeCsrfToken();
