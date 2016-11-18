<?php

// if(!isset($_SESSION['channel']) && is_user_logged_in ()){
  // echo "dummer";
  if(!isset($_GET['channel'])){
    /* Set default toggled channel (used when the user is not yet clicking any channel.) */
    if(!isset($_SESSION['channel']) || $_SESSION['channel'] == 'none'){
      if(set_channel_access('entertainment', true) == 0)
        if( set_channel_access('extreme', true) == 0){
          $_SESSION['channel'] = 'entertainment';
          // $_SESSION['channel'] = 'none';
        }
    }
  }else if(isset($_GET['channel'])){
    /* Set channel session based on toggled channel (used if the user clicks a channel in the header). */
    if(set_channel_access($_GET['channel']) == 0)
      $_SESSION['channel'] = 'none';
  }

  if(!check_if_have_channel_access('entertainment') && !check_if_have_channel_access('extreme')){
    if(isset($_GET['channel'])){
        if($_GET['channel'] == 'entertainment')
          $_SESSION['channel'] = 'entertainment';
        elseif ($_GET['channel'] == 'extreme') {
          $_SESSION['channel'] = 'extreme';
        }
      }
    }

