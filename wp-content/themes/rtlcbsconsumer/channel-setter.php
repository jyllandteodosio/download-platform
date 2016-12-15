<?php
switch_to_blog( 1 );
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
restore_current_blog();