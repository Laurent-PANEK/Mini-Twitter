<?php

require_once "includes/Session.php";
Session::getInstance()->delete('connected');
header("Location: /index.php");