<?php

add_hook('before_view_admin','CoffeeStatsMenu');

function CoffeeStatsMenu()
{
    $filePath=PLUGINS_PATH.'CoffeeStats/lang/vi/admin.php';

    require_once($filePath);

    $filePath=PLUGINS_PATH.'CoffeeStats/hook_admin_menu_left.php';

    require_once($filePath);


}

