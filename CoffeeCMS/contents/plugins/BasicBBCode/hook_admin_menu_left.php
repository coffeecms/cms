<?php

$str= '<li class="nav-item menu-12945656 menu-12945656">
<a href="#" class="nav-link">
  <i class="http://localhost/lioncms/nav-icon fas fa-bahai"></i>
  <p>
    BasicBBCode Test                      <i class="right fas fa-angle-left"></i>
  </p>
</a>
<ul class="nav nav-treeview" style="display: none;">
                                        <li class="nav-item">
    <a href="http://localhost/lioncms/admin/setting_general" class="nav-link">
      <i class="nav-icon fas fa-tag"></i>
      <p>Hooked Menu</p>
    </a>
  </li>
                   
                                        </ul>
</li>';

array_push(Configs::$_['admin_panel_bottom_menu_left'],$str);