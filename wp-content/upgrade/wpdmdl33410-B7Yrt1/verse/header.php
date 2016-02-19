<?php

/**
 * Load selected header style
 * function located in /admin/ThemeEngine.class.php
 */

    WPEdenThemeEngine::HeaderStyle();
    
    if( WPEdenThemeEngine::GetOption('customizer', 'active') == 'active' )
        get_template_part('customizer');