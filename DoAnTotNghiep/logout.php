<?php 

require 'classes/Auth.php';
session_start();
Auth::logout();
exit;