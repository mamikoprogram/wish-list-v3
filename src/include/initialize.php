<?php
require_once dirname(__FILE__) . "/const.php";
require_once dirname(__FILE__) . "/helper.php";
require_once dirname(__FILE__) . "/db.php";
require_once dirname(__FILE__) . "/user.php";

session_start();
makeCsrfToken();
