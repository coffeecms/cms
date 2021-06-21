<?php 


add_hook('aznews_newrow');


function aznews_newrow($inputData)
{
    $listShortCodeData=parse_shortcode_data('aznews_newrow',$inputData);

    $total=count($listShortCodeData);

    $result='';

    if((int)$total > 0)
    {   
        



        $inputData=$result;
    }

    return $inputData;
}