<?php
load_menu_data();

?>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
    
      <span class="brand-text font-weight-light">Coffee CMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <?php coffee_content_hook('admin_panel_top_menu_left');?>
          
         <?php foreach (Configs::$_['menu_data'] as $menu) { ?>
          <?php if(is_null($menu['parent_menu_id'])==true && !isset(Configs::$_['hide_admin_menu'][$menu['menu_id']])){ ?>
            <?php if(menu_hasChild($menu['menu_id'])==true){ ?>
              
              <?php coffee_content_hook('admin_panel_before_menu_'.$menu['menu_id']);?>

              <?php if(isset(Configs::$_['user_group_menu_permissions'][Configs::$_['user_data']['group_c']][$menu['menu_id']])){ ?>
              <li class="nav-item menu-<?php echo $menu['menu_id'];?>">
                  <a href="#" class="nav-link">
                    <i class="<?php echo $menu['icon_text'];?>"></i>
                    <p>
                      <?php echo get_text_by_lang($menu['title'],'admin');?>
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview" style="display: none;">
                  <?php coffee_content_hook('admin_panel_top_menu_'.$menu['menu_id']);?>
                    <?php foreach (menu_allChild($menu['menu_id']) as $subMenu) { ?>

                    <?php if(isset(Configs::$_['user_group_menu_permissions'][Configs::$_['user_data']['group_c']][$subMenu['menu_id']])){ ?>
                      <li class="nav-item menu-<?php echo $subMenu['menu_id'];?>">
                        <a href="<?php echo SITE_URL.$subMenu['page_url'];?>" class="nav-link">
                          <i class="<?php echo $subMenu['icon_text'];?>"></i>
                          <p><?php echo get_text_by_lang($subMenu['title'],'admin');?></p>
                        </a>
                      </li>
                      <?php } ?>
                    <?php } ?>


                    
                    <?php coffee_content_hook('admin_panel_bottom_menu_'.$menu['menu_id']);?>
                  </ul>
                </li>  
                <?php } ?>
                <?php coffee_content_hook('admin_panel_after_menu_'.$menu['menu_id']);?>         
            <?php }else { ?>
            <?php coffee_content_hook('admin_panel_before_menu_'.$menu['menu_id']);?>

            <?php if(isset(Configs::$_['user_group_menu_permissions'][Configs::$_['user_data']['group_c']][$menu['menu_id']])){ ?>
            <li class="nav-item menu-<?php echo $menu['menu_id'];?>">
              <a href="<?php echo SITE_URL.$menu['page_url'];?>" class="nav-link">
                <i class="<?php echo $menu['icon_text'];?>"></i>
                <p>
                  <?php echo get_text_by_lang($menu['title'],'admin');?>
                </p>
              </a>
            </li>  
            <?php } ?>

            <?php coffee_content_hook('admin_panel_after_menu_'.$menu['menu_id']);?>

            <?php } ?>
          <?php } ?>
        <?php } ?>
        <!-- <li class="nav-header">Website:<br> <a href="http://coffeecms.net/">CoffeeCMS.Net</a></li>
        <li class="nav-header">Contact email:<br> CoffeeCMSTeam@gmail.com</li>
         -->
        <?php coffee_content_hook('admin_panel_bottom_menu_left');?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>