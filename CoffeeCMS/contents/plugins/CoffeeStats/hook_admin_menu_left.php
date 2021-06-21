<?php

$str= '

<li class="nav-item menu-cf-commerce">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-chart-bar"></i>
    <p>
    '.get_text_by_lang('Coffee Stats','admin').' <i class="right fas fa-angle-left"></i>
    </p>
  </a>

  <ul class="nav nav-treeview" style="display: none;">
   
    <li class="nav-item">
    <a href="'.SITE_URL.'admin/plugin_page_url?plugin=coffeestats&page=trackings" class="nav-link">
    <i class="nav-icon fas fa-tag"></i>
    <p>'.get_text_by_lang('Trackings','admin').'</p>
    </a>
    </li>
                  
  </ul>
</li>



';

if(!isset(Configs::$_['admin_panel_after_menu_11011011']))
{
    Configs::$_['admin_panel_after_menu_11011011']=[];
}

array_push(Configs::$_['admin_panel_after_menu_11011011'],$str);