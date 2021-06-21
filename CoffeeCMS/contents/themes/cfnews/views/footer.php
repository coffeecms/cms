
    <footer>
    <div class='row'>
        <div class='col-lg-12 col-md-12 col-sm-12'>
            <div class=' bg-black' style='padding-left:20px;padding-top:50px;padding-bottom:50px;'>
            <h6>EditedCFNews All rights reserved. Theme by Coffee Team Powered by CoffeeCMS</h6>
            </div>
        </div>
    </div>
    </footer>



</div>

<script>

$(document).on('click','.btnSearch',function(){
    var k=$('.input-search-keywords').val().trim();

    if(k.length > 0)
    {
        location.href='<?php echo SITE_URL;?>search?k='+k;
    }
    
});


</script>
</body>

</html>