<?php
  if(!isset($_GET['channel'])){
    $_SESSION['channel'] = 'entertainment';
  }else if(isset($_GET['channel'])){
    $_SESSION['channel'] = $_GET['channel'];
  }