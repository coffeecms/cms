
    <main>



<!-- row -->
<div class='row'>
  <!-- left -->
  <div class='col-lg-9 col-md-9 col-sm-9 '>
    <div class='row margin-top-10'>
     
      <div class='col-lg-12 col-md-12 col-sm-12 '>
        <?php
        $total=count($listPost);

        $li='';

        for ($i=0; $i < $total; $i++) { 
            $li.='
                <!-- item -->
                <div class="card margin-bottom-30" >
                <div class="card-body">
                    <h5 class="card-title">'.$listPost[$i]['title'].'</h5>
                    <div class="post-attr block margin-top-20 margin-bottom-20">
                    <small class="margin-right-20"><i class="fas fa-calendar-alt"></i> '.$listPost[$i]['ent_dt'].'</small>
        
                    <small class="margin-right-20"><i class="fas fa-eye"></i> '.$listPost[$i]['views'].'</small>

                    <small><i class="fas fa-folder"></i> <a href="'.SITE_URL.'category/'.$listPost[$i]['category_friendly_url'].'_'.$listPost[$i]['category_c'].'">'.$listPost[$i]['category_title'].'</a></small>
                    </div>
        
                    <p class="card-text">'.substr($listPost[$i]['content'],0,300).'...</p>
                    <a href="'.SITE_URL.'post-'.$listPost[$i]['friendly_url'].'.html" class="btn btn-primary pull-right">READ MORE</a>
                </div>
                </div>
                <!-- item -->

            ';
        }

        echo $li;

        ?>
                <nav aria-label="..." class='pull-right'>
        <ul class="pagination">

            <li class="page-item <?php if((int)$page==0){ echo 'disabled';} ?>">
            <a class="page-link" href="<?php echo SITE_URL;?>?page=<?php echo $page_prev;?>" tabindex="-1" aria-disabled="true">Previous</a>
            </li>

            <?php if((int)$page > 1){ ?>
            <li class="page-item"><a class="page-link" href="<?php echo SITE_URL;?>?page=<?php echo $page_prev;?>"><?php echo $page_prev;?></a></li>
            <?php } ?>

            <li class="page-item active" aria-current="page">
            <a class="page-link" href="<?php echo SITE_URL;?>?page=<?php echo $page;?>"><?php echo $page;?></a>
            </li>
            <li class="page-item"><a class="page-link" href="<?php echo SITE_URL;?>?page=<?php echo $page_next;?>"><?php echo $page_next;?></a></li>
            <li class="page-item">
            <a class="page-link" href="<?php echo SITE_URL;?>?page=<?php echo $page_next;?>">Next</a>
            </li>
        </ul>
        </nav>
      </div>

    </div>
  </div>
  <!-- left -->

  <!-- right -->
  <div class='col-lg-3 col-md-3 col-sm-3 '>
        <!-- item -->
        <div class="card  margin-top-10 margin-bottom-30" >
          <div class="card-body">
            <h5 class="card-title">Search</h5>

            <div class="card-text">
              <div class="input-group mb-3">
                <input type="text" class="form-control input-search-keywords" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <button class='btn btn-primary btnSearch'><i class='fas fa-search'></i></button>
              </div>

            </div>
          </div>
        </div>
        <!-- item -->
        <!-- item -->
        <div class="card  margin-top-10 margin-bottom-30" >
          <div class="card-body">
            <h5 class="card-title">Categories</h5>

            <div class="card-text">
              <ul class='ul-nostyle no-padding break-point'>
                <?php 
                $total=count($listCat);

                $li='';

                for ($i=0; $i < $total; $i++) { 
                    $li.="<li><a href='".SITE_URL."category/".$listCat[$i]['friendly_url']."_".$listCat[$i]['category_c']."'>".$listCat[$i]['title']."</a></li>";
                }

                echo $li;

                ?>

                
              </ul>

            </div>
          </div>
        </div>
        <!-- item -->
        <!-- item -->
        <div class="card  margin-top-10 margin-bottom-30" >
          <div class="card-body">
            <h5 class="card-title">Tags</h5>

            <div class="card-text">

                <?php 
                $total=count($listTags);

                $li='';

                for ($i=0; $i < $total; $i++) { 
                    $li.="<a class='btn btn-primary btn-none margin-right-20 margin-bottom-20 text-black' href='".SITE_URL."tag/".$listTags[$i]['tag']."'>".$listTags[$i]['tag']."</a>";
                }

                echo $li;
                
                ?>

            </div>
          </div>
        </div>
        <!-- item -->
  </div>
  <!-- right -->
</div>

<!-- row -->



</main>
