<?php
require_once "../../include/initialize.php";

killSession();

render('user/logout', []);
