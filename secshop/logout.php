<?php
/**
 * Created by PhpStorm.
 * User: yang.yu01
 * Date: 2018/11/19
 * Time: 12:19 PM
 */
session_start();
session_destroy();
header("Location: login.php");