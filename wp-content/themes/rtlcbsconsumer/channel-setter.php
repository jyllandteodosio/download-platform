<?php
  if(!isset($_GET['channel'])){
    /* Set default toggled channel (used when the user is not yet clicking any channel.) */
    if( !isset($_SESSION['channel']) ){
      $_SESSION['channel'] = 'entertainment';
    }
  }else if(isset($_GET['channel'])){
    $_SESSION['channel'] = $_GET['channel'];
  }