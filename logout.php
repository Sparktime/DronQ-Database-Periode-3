<?php
require 'db.php';
require 'userController.php';

session_start() ;
session_destroy() ;
header('location: .');

   