<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo Configs::$_['site_title'];?></title>
    <meta name="description" content="<?php echo Configs::$_['site_description'];?>">
    <meta name="keywords" content="<?php echo Configs::$_['site_keywords'];?>">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="<?php echo THEMES_URL;?>cfnews/assets/fontawesome/css/all.css" rel="stylesheet" />
  <link href="<?php echo THEMES_URL;?>cfnews/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo THEMES_URL;?>cfnews/assets/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link href="<?php echo THEMES_URL;?>cfnews/assets/css/custom.css?v=<?php echo date('is');?>" rel="stylesheet" />
  <!-- Scripts
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script src="<?php echo THEMES_URL;?>cfnews/assets/js/jquery.min.js"></script>
  <script src="<?php echo THEMES_URL;?>cfnews/assets/js/bootstrap.min.js"></script>
  <script src="<?php echo THEMES_URL;?>cfnews/assets/moment/min/moment.min.js"></script>
  <script src="<?php echo THEMES_URL;?>cfnews/assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

</head>

<body>
  <div class='container'>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light navbar-bg">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <?php 
                    $total=count(Configs::$_['menu_data']);

                    $li='';
                    $subLi='';

                    $totalSub=0;

                    for ($i=0; $i < $total; $i++) { 
                        
                        if(menu_hasChild(Configs::$_['menu_data'][$i]['menu_id']))
                        {
                            $totalSub=count(Configs::$_['sub_menu_data']);

                            $li.='
                                    <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    '.Configs::$_['menu_data'][$i]['title'].'
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            ';

                            foreach (menu_allChild(Configs::$_['menu_data'][$i]['menu_id']) as $subMenu) { 
                                $li.='<li><a class="dropdown-item" href="'.SITE_URL.$subMenu['title'].'">'.$subMenu['title'].'</a></li>';
                            }

                            $li.='
                                </ul>
                                </li>
                            ';
                        }
                        else
                        {
                                $li.='
                                <li class="nav-item">
                                <a class="nav-link"  href="'.SITE_URL.Configs::$_['menu_data'][$i]['page_url'].'">'.Configs::$_['menu_data'][$i]['title'].'</a>
                            </li>                        
                            ';
                        }

                    }

                    echo $li;

                ?>


            </ul>
          </div>
        </div>
      </nav>
    </header>
