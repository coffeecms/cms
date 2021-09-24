
$(document).on('click','#shortcode-js-aznews_newrow',function(){
    CKEDITOR.instances.editor.insertHtml('[aznew_row]Content here[/aznew_row]');
    hideModalWidgets();
});

$(document).on('click','#shortcode-js-aznews_rowfull',function(){
    CKEDITOR.instances.editor.insertHtml('[aznew_rowfull]Content here[/aznew_rowfull]');
    hideModalWidgets();
});

$(document).on('click','#shortcode-js-aznews_col5050',function(){
    CKEDITOR.instances.editor.insertHtml('[aznew_col class="col-lg-6 col-md-6 col-sm-6 "]Left[/aznew_col][aznew_col class="col-lg-6 col-md-6 col-sm-6 "]Right[/aznew_col]');
    hideModalWidgets();
});

$(document).on('click','#shortcode-js-aznews_col3070',function(){
    
    CKEDITOR.instances.editor.insertHtml('[aznew_col class="col-lg-4 col-md-4 col-sm-4 "]Left[/aznew_col][aznew_col class="col-lg-8 col-md-8 col-sm-8 "]Right[/aznew_col]');
    hideModalWidgets();
});


$(document).on('click','#shortcode-js-aznews_col7030',function(){
    
    CKEDITOR.instances.editor.insertHtml('[aznew_col class="col-lg-8 col-md-8 col-sm-8 "]Left[/aznew_col][aznew_col class="col-lg-4 col-md-4 col-sm-4 "]Right[/aznew_col]');
    hideModalWidgets();
});


$(document).on('click','#shortcode-js-aznews_col4060',function(){
    
    CKEDITOR.instances.editor.insertHtml('[aznew_col class="col-lg-5 col-md-5 col-sm-5 "]Left[/aznew_col][aznew_col class="col-lg-7 col-md-7 col-sm-7 "]Right[/aznew_col]');
    hideModalWidgets();
});

$(document).on('click','#shortcode-js-aznews_col6040',function(){
    
    CKEDITOR.instances.editor.insertHtml('[aznew_col class="col-lg-7 col-md-7 col-sm-7 "]Left[/aznew_col][aznew_col class="col-lg-5 col-md-5 col-sm-5 "]Right[/aznew_col]');
    hideModalWidgets();
});

$(document).on('click','#shortcode-js-aznews_menu',function(){
    
    CKEDITOR.instances.editor.insertHtml('[aznews_menu][/aznews_menu]');
    hideModalWidgets();
});

// $(document).on('click','#shortcode-js-aznews_megamenu',function(){
//     
//     CKEDITOR.instances.editor.insertHtml('[aznews_megamenu][/aznews_megamenu]');
// });

$(document).on('click','#shortcode-js-aznews_lastestpost_layout1',function(){
    
    // CKEDITOR.instances.editor.insertHtml('[aznews_lastestpost_layout1][/aznews_lastestpost_layout1]');
    hideModalWidgets();

    $('#modal_aznews_lastestpost_layout1').modal('show');

});
$(document).on('click','.btnCreate_LastestPost_Layout_1',function(){
    
    // CKEDITOR.instances.editor.insertHtml('[aznews_lastestpost_layout1][/aznews_lastestpost_layout1]');
    // hideModalWidgets();

    var li_attr='';

    pageData['aznews_lastestpost_layout1_post_thumbnail']=$('.aznews_lastestpost_layout1_post_thumbnail > option:selected').val().toLowerCase();

    pageData['aznews_lastestpost_layout1_post_limit']=$('.aznews_lastestpost_layout1_post_limit').val();
    pageData['aznews_lastestpost_layout1_post_tags']=$('.aznews_lastestpost_layout1_post_tags').val();
    pageData['aznews_lastestpost_layout1_post_category']='';

    $('.aznews_lastestpost_layout1_post_category > option:selected').each(function(){
        pageData['aznews_lastestpost_layout1_post_category']+=$(this).val()+',';
    });

    pageData['aznews_lastestpost_layout1_post_types']=$('.aznews_lastestpost_layout1_post_types > option:selected').val().toLowerCase();
    pageData['aznews_lastestpost_layout1_sort_by']=$('.aznews_lastestpost_layout1_sort_by > option:selected').val();
    pageData['aznews_lastestpost_layout1_sort_type']=$('.aznews_lastestpost_layout1_sort_type > option:selected').val();

    if(pageData['aznews_lastestpost_layout1_post_limit'].length==0 || parseInt(pageData['aznews_lastestpost_layout1_post_limit'])<=0)
    {
        pageData['aznews_lastestpost_layout1_post_limit']='10';
    }

    var theCode='[aznews_lastestpost_layout1 sort_type="'+pageData['aznews_lastestpost_layout1_sort_type']+'" sort_by="'+pageData['aznews_lastestpost_layout1_sort_by']+'" type="'+pageData['aznews_lastestpost_layout1_post_types']+'" categories="'+pageData['aznews_lastestpost_layout1_post_category']+'" thumbnail="'+pageData['aznews_lastestpost_layout1_post_thumbnail']+'" limit="'+pageData['aznews_lastestpost_layout1_post_limit']+'" tags="'+pageData['aznews_lastestpost_layout1_post_tags']+'"][/aznews_lastestpost_layout1]';

    CKEDITOR.instances.editor.insertHtml(theCode);
});

$(document).on('click','#shortcode-js-aznews_lastestpost_layout2',function(){
    
    hideModalWidgets();

    $('#modal_aznews_lastestpost_layout2').modal('show');

});
$(document).on('click','.btnCreate_LastestPost_Layout_2',function(){
    
    // CKEDITOR.instances.editor.insertHtml('[aznews_lastestpost_layout1][/aznews_lastestpost_layout1]');
    // hideModalWidgets();

    pageData['aznews_lastestpost_layout2_post_thumbnail']=$('.aznews_lastestpost_layout2_post_thumbnail > option:selected').val().toLowerCase();

    pageData['aznews_lastestpost_layout2_post_limit']=$('.aznews_lastestpost_layout2_post_limit').val();
    pageData['aznews_lastestpost_layout2_post_tags']=$('.aznews_lastestpost_layout2_post_tags').val();
    pageData['aznews_lastestpost_layout2_post_category']='';

    $('.aznews_lastestpost_layout2_post_category > option:selected').each(function(){
        pageData['aznews_lastestpost_layout2_post_category']+=$(this).val()+',';
    });
    pageData['aznews_lastestpost_layout2_post_types']=$('.aznews_lastestpost_layout2_post_types > option:selected').val().toLowerCase();
    pageData['aznews_lastestpost_layout2_sort_by']=$('.aznews_lastestpost_layout2_sort_by > option:selected').val();
    pageData['aznews_lastestpost_layout2_sort_type']=$('.aznews_lastestpost_layout2_sort_type > option:selected').val();

    if(pageData['aznews_lastestpost_layout2_post_limit'].length==0 || parseInt(pageData['aznews_lastestpost_layout2_post_limit'])<=0)
    {
        pageData['aznews_lastestpost_layout2_post_limit']='10';
    }

    var theCode='[aznews_lastestpost_layout2 sort_type="'+pageData['aznews_lastestpost_layout2_sort_type']+'" sort_by="'+pageData['aznews_lastestpost_layout2_sort_by']+'" type="'+pageData['aznews_lastestpost_layout2_post_types']+'" categories="'+pageData['aznews_lastestpost_layout2_post_category']+'" thumbnail="'+pageData['aznews_lastestpost_layout2_post_thumbnail']+'" limit="'+pageData['aznews_lastestpost_layout2_post_limit']+'" tags="'+pageData['aznews_lastestpost_layout2_post_tags']+'"][/aznews_lastestpost_layout2]';

    CKEDITOR.instances.editor.insertHtml(theCode);
});

$(document).on('click','#shortcode-js-aznews_lastestpost_layout3',function(){
    
    hideModalWidgets();

    $('#modal_aznews_lastestpost_layout3').modal('show');

});
$(document).on('click','.btnCreate_LastestPost_Layout_3',function(){
    
    // CKEDITOR.instances.editor.insertHtml('[aznews_lastestpost_layout1][/aznews_lastestpost_layout1]');
    // hideModalWidgets();

    pageData['aznews_lastestpost_layout3_post_thumbnail']=$('.aznews_lastestpost_layout3_post_thumbnail > option:selected').val().toLowerCase();

    pageData['aznews_lastestpost_layout3_post_limit']=$('.aznews_lastestpost_layout3_post_limit').val();
    pageData['aznews_lastestpost_layout3_post_tags']=$('.aznews_lastestpost_layout3_post_tags').val();
    pageData['aznews_lastestpost_layout3_post_category']='';

    $('.aznews_lastestpost_layout3_post_category > option:selected').each(function(){
        pageData['aznews_lastestpost_layout3_post_category']+=$(this).val()+',';
    });
    pageData['aznews_lastestpost_layout3_post_types']=$('.aznews_lastestpost_layout3_post_types > option:selected').val().toLowerCase();
    pageData['aznews_lastestpost_layout3_sort_by']=$('.aznews_lastestpost_layout3_sort_by > option:selected').val();
    pageData['aznews_lastestpost_layout3_sort_type']=$('.aznews_lastestpost_layout3_sort_type > option:selected').val();

    if(pageData['aznews_lastestpost_layout3_post_limit'].length==0 || parseInt(pageData['aznews_lastestpost_layout3_post_limit'])<=0)
    {
        pageData['aznews_lastestpost_layout3_post_limit']='10';
    }

    var theCode='[aznews_lastestpost_layout3 sort_type="'+pageData['aznews_lastestpost_layout3_sort_type']+'" sort_by="'+pageData['aznews_lastestpost_layout3_sort_by']+'" type="'+pageData['aznews_lastestpost_layout3_post_types']+'" categories="'+pageData['aznews_lastestpost_layout3_post_category']+'" thumbnail="'+pageData['aznews_lastestpost_layout3_post_thumbnail']+'" limit="'+pageData['aznews_lastestpost_layout3_post_limit']+'" tags="'+pageData['aznews_lastestpost_layout3_post_tags']+'"][/aznews_lastestpost_layout3]';

    CKEDITOR.instances.editor.insertHtml(theCode);
});

$(document).on('click','#shortcode-js-aznews_lastestpost_layout4',function(){
    
    hideModalWidgets();

    $('#modal_aznews_lastestpost_layout4').modal('show');

});

$(document).on('click','.btnCreate_LastestPost_Layout_4',function(){
    
    // CKEDITOR.instances.editor.insertHtml('[aznews_lastestpost_layout1][/aznews_lastestpost_layout1]');
    // hideModalWidgets();

    pageData['aznews_lastestpost_layout4_post_thumbnail']=$('.aznews_lastestpost_layout4_post_thumbnail > option:selected').val().toLowerCase();

    pageData['aznews_lastestpost_layout4_post_limit']=$('.aznews_lastestpost_layout4_post_limit').val();
    pageData['aznews_lastestpost_layout4_post_tags']=$('.aznews_lastestpost_layout4_post_tags').val();
    pageData['aznews_lastestpost_layout4_post_category']='';

    $('.aznews_lastestpost_layout4_post_category > option:selected').each(function(){
        pageData['aznews_lastestpost_layout4_post_category']+=$(this).val()+',';
    });
    pageData['aznews_lastestpost_layout4_post_types']=$('.aznews_lastestpost_layout4_post_types > option:selected').val().toLowerCase();
    pageData['aznews_lastestpost_layout4_sort_by']=$('.aznews_lastestpost_layout4_sort_by > option:selected').val();
    pageData['aznews_lastestpost_layout4_sort_type']=$('.aznews_lastestpost_layout4_sort_type > option:selected').val();

    if(pageData['aznews_lastestpost_layout4_post_limit'].length==0 || parseInt(pageData['aznews_lastestpost_layout4_post_limit'])<=0)
    {
        pageData['aznews_lastestpost_layout4_post_limit']='10';
    }

    var theCode='[aznews_lastestpost_layout4 sort_type="'+pageData['aznews_lastestpost_layout4_sort_type']+'" sort_by="'+pageData['aznews_lastestpost_layout4_sort_by']+'" type="'+pageData['aznews_lastestpost_layout4_post_types']+'" categories="'+pageData['aznews_lastestpost_layout4_post_category']+'" thumbnail="'+pageData['aznews_lastestpost_layout4_post_thumbnail']+'" limit="'+pageData['aznews_lastestpost_layout4_post_limit']+'" tags="'+pageData['aznews_lastestpost_layout4_post_tags']+'"][/aznews_lastestpost_layout4]';

    CKEDITOR.instances.editor.insertHtml(theCode);
});

$(document).on('click','#shortcode-js-aznews_lastestpost_layout5',function(){
    
    hideModalWidgets();

    $('#modal_aznews_lastestpost_layout5').modal('show');

});
$(document).on('click','.btnCreate_LastestPost_Layout_5',function(){
    
    // CKEDITOR.instances.editor.insertHtml('[aznews_lastestpost_layout1][/aznews_lastestpost_layout1]');
    // hideModalWidgets();

    pageData['aznews_lastestpost_layout5_post_thumbnail']=$('.aznews_lastestpost_layout5_post_thumbnail > option:selected').val().toLowerCase();

    pageData['aznews_lastestpost_layout5_post_limit']=$('.aznews_lastestpost_layout5_post_limit').val();
    pageData['aznews_lastestpost_layout5_post_tags']=$('.aznews_lastestpost_layout5_post_tags').val();
    pageData['aznews_lastestpost_layout5_post_category']='';

    $('.aznews_lastestpost_layout5_post_category > option:selected').each(function(){
        pageData['aznews_lastestpost_layout5_post_category']+=$(this).val()+',';
    });
    pageData['aznews_lastestpost_layout5_post_types']=$('.aznews_lastestpost_layout5_post_types > option:selected').val().toLowerCase();
    pageData['aznews_lastestpost_layout5_sort_by']=$('.aznews_lastestpost_layout5_sort_by > option:selected').val();
    pageData['aznews_lastestpost_layout5_sort_type']=$('.aznews_lastestpost_layout5_sort_type > option:selected').val();

    if(pageData['aznews_lastestpost_layout5_post_limit'].length==0 || parseInt(pageData['aznews_lastestpost_layout5_post_limit'])<=0)
    {
        pageData['aznews_lastestpost_layout5_post_limit']='10';
    }

    var theCode='[aznews_lastestpost_layout5 sort_type="'+pageData['aznews_lastestpost_layout5_sort_type']+'" sort_by="'+pageData['aznews_lastestpost_layout5_sort_by']+'" type="'+pageData['aznews_lastestpost_layout5_post_types']+'" categories="'+pageData['aznews_lastestpost_layout5_post_category']+'" thumbnail="'+pageData['aznews_lastestpost_layout5_post_thumbnail']+'" limit="'+pageData['aznews_lastestpost_layout5_post_limit']+'" tags="'+pageData['aznews_lastestpost_layout5_post_tags']+'"][/aznews_lastestpost_layout5]';

    CKEDITOR.instances.editor.insertHtml(theCode);
});


$(document).on('click','#shortcode-js-aznews_populartags',function(){
    
    CKEDITOR.instances.editor.insertHtml('[aznews_populartags][/aznews_populartags]');
    hideModalWidgets();
});

$(document).on('click','#shortcode-js-aznews_slide',function(){
    CKEDITOR.instances.editor.insertHtml('[aznews_slide][/aznews_slide]');
    hideModalWidgets();
});

$(document).on('click','#shortcode-js-aznews_videopost_layout1',function(){
    CKEDITOR.instances.editor.insertHtml('[aznews_videopost_layout1][/aznews_videopost_layout1]');
    hideModalWidgets();
});

$(document).on('click','#shortcode-js-aznews_gallery_layout1',function(){
    CKEDITOR.instances.editor.insertHtml('[aznews_gallery_layout1][/aznews_gallery_layout1]');
    hideModalWidgets();
});

$(document).on('click','#shortcode-js-aznews_gallery_layout2',function(){
    CKEDITOR.instances.editor.insertHtml('[aznews_gallery_layout2][/aznews_gallery_layout2]');
    hideModalWidgets();
});



function prepare_aznews_postcategories()
{
  var total=pageData['listCat'].length;

  var li='';

  var td='';

  li+='<option value="">Choose categories</option>';


  for (var i = 0; i < total; i++) {
    li+='<option value="'+pageData['listCat'][i]['category_c']+'">'+pageData['listCat'][i]['title']+'</option>';

  }


  $('.other_post_category').html(li).trigger('change');


}

function prepare_aznews_posttype()
{
  var total=pageData['listPostType'].length;

  li='<option value="">Choose a type</option>';

  for (var i = 0; i < total; i++) {
    li+='<option value="'+pageData['listPostType'][i]['type_c']+'">'+pageData['listPostType'][i]['title']+'</option>';
  }

  $('.other_post_type').html(li).trigger('change');
}

setTimeout(function(){ 

    prepare_aznews_posttype();
    prepare_aznews_postcategories();

    $('.selectjs').each(function(){
        var target=$(this).attr('data-parent');
          $(this).select2({
              dropdownParent: $("#"+target)
          });
      });
},1000);



