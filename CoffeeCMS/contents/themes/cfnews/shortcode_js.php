<?php

register_plugin_shortcode_js(array(
	'code'=>'cfnews_newrow',
	'title'=>'New Row',
	'html_embed'=>'',
	'thumbnail'=>THEMES_URL.'cfnews/sc_images/newrow.png',
	'js_embed'=>THEMES_URL.'cfnews/js/widgets.js',
	'css_embed'=>THEMES_URL.'cfnews/css/widgets.css',
));


register_plugin_shortcode_js(array(
	'code'=>'cfnews_rowfull',
	'title'=>'New row full width',
	'html_embed'=>'',
	'thumbnail'=>THEMES_URL.'cfnews/sc_images/rowfull.png',
	'js_embed'=>'',
	'css_embed'=>'',
));

register_plugin_shortcode_js(array(
	'code'=>'cfnews_col5050',
	'title'=>'Column left 50% - Right 50%',
	'html_embed'=>'',
	'thumbnail'=>THEMES_URL.'cfnews/sc_images/col5050.png',
	'js_embed'=>'',
	'css_embed'=>'',
));

register_plugin_shortcode_js(array(
	'code'=>'cfnews_col3070',
	'title'=>'Column left 30% - Right 70%',
	'html_embed'=>'',
	'thumbnail'=>THEMES_URL.'cfnews/sc_images/col3070.png',
	'js_embed'=>'',
	'css_embed'=>'',
));

register_plugin_shortcode_js(array(
	'code'=>'cfnews_col7030',
	'title'=>'Column left 70% - Right 30%',
	'html_embed'=>'',
	'thumbnail'=>THEMES_URL.'cfnews/sc_images/col7030.png',
	'js_embed'=>'',
	'css_embed'=>'',
));

register_plugin_shortcode_js(array(
	'code'=>'cfnews_col4060',
	'title'=>'Column left 40% - Right 60%',
	'html_embed'=>'',
	'thumbnail'=>THEMES_URL.'cfnews/sc_images/col4060.png',
	'js_embed'=>'',
	'css_embed'=>'',
));

register_plugin_shortcode_js(array(
	'code'=>'cfnews_col6040',
	'title'=>'Column left 60% - Right 40%',
	'html_embed'=>'',
	'thumbnail'=>THEMES_URL.'cfnews/sc_images/col6040.png',
	'js_embed'=>'',
	'css_embed'=>'',
));

register_plugin_shortcode_js(array(
	'code'=>'cfnews_menu',
	'title'=>'Menu',
	'html_embed'=>'',
	'thumbnail'=>THEMES_URL.'cfnews/sc_images/menu.png',
	'js_embed'=>'',
	'css_embed'=>'',
));

// register_plugin_shortcode_js(array(
// 	'code'=>'cfnews_megamenu',
// 	'title'=>'Mega Menu',
// 	'html_embed'=>'',
// 	'thumbnail'=>THEMES_URL.'cfnews/sc_images/megamenu.png',
// 	'js_embed'=>'',
// 	'css_embed'=>'',
// ));

register_plugin_shortcode_js(array(
	'code'=>'cfnews_lastestpost_layout1',
	'title'=>'Lastest Post Layout 1',
	'html_embed'=>'<div class="modal fade" id="modal_cfnews_lastestpost_layout1"  style="z-index:99999999;" data-backdrop="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg ">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title " id="exampleModalLabel">'.get_text_by_lang("Lastest Post Shortcode Layout 1","admin").'</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body modal_cfnews_lastestpost_layout1_body">
			<table class="table  table-striped table-valign-middle">
				<tbody>
					<tr>
						<td>Show thumbnail</td>
						<td><select class="form-control cfnews_lastestpost_layout1_post_thumbnail selectjs" data-parent="modal_cfnews_lastestpost_layout1"><option class="yes">Yes</option><option class="no">No</option></select></td>
					</tr>
					<tr>
						<td>Categories</td>
						<td><select class="form-control cfnews_lastestpost_layout1_post_category other_post_category   selectjs" data-parent="modal_cfnews_lastestpost_layout1" multiple="multiple"><option class="yes">Yes</option><option class="no">No</option></select></td>
					</tr>
					<tr>
						<td>Post type</td>
						<td><select class="form-control cfnews_lastestpost_layout1_post_types other_post_type   selectjs" data-parent="modal_cfnews_lastestpost_layout1"><option class="yes">Yes</option><option class="no">No</option></select></td>
					</tr>

					<tr>
						<td>Limit show</td>
						<td><input type="text" value="10" class="form-control cfnews_lastestpost_layout1_post_limit" /></td>
					</tr>
					<tr>
						<td>Tags</td>
						<td><input type="text" value="" class="form-control cfnews_lastestpost_layout1_post_tags" /></td>
					</tr>
					<tr>
					<td>Sort by</td>
					<td><select class="form-control cfnews_lastestpost_layout1_sort_by  selectjs" data-parent="modal_cfnews_lastestpost_layout1"><option class="views">Views</option><option class="sort_order">Sort order</option><option class="ent_dt">Create date</option><option class="upd_dt">Lastest update</option></select></td>
				</tr>
					<tr>
					<td>Sort type</td>
					<td><select class="form-control cfnews_lastestpost_layout1_sort_type  selectjs" data-parent="modal_cfnews_lastestpost_layout1"><option class="asc">Asc</option><option class="desc">Desc</option></select></td>
				</tr>

				</tbody>
			</table>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-success btnCreate_LastestPost_Layout_1"><i class="fas fa-save"></i> '.get_text_by_lang("Create","admin").'</button>
		  <button type="button" class="btn btn-danger btnCloseAlert" data-dismiss="modal"><i class="fas fa-times"></i> '.get_text_by_lang("Close","admin").'</button>
		</div>
	  </div>
	</div>
  </div>
  ',
	'thumbnail'=>THEMES_URL.'cfnews/sc_images/lastestpost_layout1.png',
	'js_embed'=>'',
	'css_embed'=>'',
));

register_plugin_shortcode_js(array(
	'code'=>'cfnews_lastestpost_layout2',
	'title'=>'Lastest Post Layout 2',
	'html_embed'=>'<div class="modal fade" id="modal_cfnews_lastestpost_layout2"  style="z-index:99999999;" data-backdrop="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg ">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title " id="exampleModalLabel">'.get_text_by_lang("Lastest Post Shortcode Layout 2","admin").'</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body modal_cfnews_lastestpost_layout2_body">
			<table class="table  table-striped table-valign-middle">
				<tbody>
					<tr>
						<td>Show thumbnail</td>
						<td><select class="form-control cfnews_lastestpost_layout2_post_thumbnail  selectjs" data-parent="modal_cfnews_lastestpost_layout2"><option class="yes">Yes</option><option class="no">No</option></select></td>
					</tr>
					<tr>
					<td>Categories</td>
					<td><select class="form-control cfnews_lastestpost_layout2_post_category other_post_category   selectjs" data-parent="modal_cfnews_lastestpost_layout2" multiple="multiple"><option class="yes">Yes</option><option class="no">No</option></select></td>
				</tr>
					<tr>
					<td>Post type</td>
					<td><select class="form-control cfnews_lastestpost_layout2_post_types other_post_type  selectjs" data-parent="modal_cfnews_lastestpost_layout2"><option class="yes">Yes</option><option class="no">No</option></select></td>
				</tr>
					<tr>
						<td>Limit show</td>
						<td><input type="text" value="10" class="form-control cfnews_lastestpost_layout2_post_limit" /></td>
					</tr>
					<tr>
					<td>Tags</td>
					<td><input type="text" value="" class="form-control cfnews_lastestpost_layout2_post_tags" /></td>
					</tr>
					<tr>
					<td>Sort by</td>
					<td><select class="form-control cfnews_lastestpost_layout2_sort_by  selectjs" data-parent="modal_cfnews_lastestpost_layout2"><option class="views">Views</option><option class="sort_order">Sort order</option><option class="ent_dt">Create date</option><option class="upd_dt">Lastest update</option></select></td>
				</tr>
					<tr>
					<td>Sort type</td>
					<td><select class="form-control cfnews_lastestpost_layout2_sort_type  selectjs" data-parent="modal_cfnews_lastestpost_layout2"><option class="asc">Asc</option><option class="desc">Desc</option></select></td>
				</tr>
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-success btnCreate_LastestPost_Layout_2"><i class="fas fa-save"></i> '.get_text_by_lang("Create","admin").'</button>
		  <button type="button" class="btn btn-danger btnCloseAlert" data-dismiss="modal"><i class="fas fa-times"></i> '.get_text_by_lang("Close","admin").'</button>
		</div>
	  </div>
	</div>
  </div>',
	'thumbnail'=>THEMES_URL.'cfnews/sc_images/lastestpost_layout2.png',
	'js_embed'=>'',
	'css_embed'=>'',
));

register_plugin_shortcode_js(array(
	'code'=>'cfnews_lastestpost_layout3',
	'title'=>'Lastest Post Layout 3',
	'html_embed'=>'<div class="modal fade" id="modal_cfnews_lastestpost_layout3"  style="z-index:99999999;" data-backdrop="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg ">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title " id="exampleModalLabel">'.get_text_by_lang("Lastest Post Shortcode Layout 3","admin").'</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body modal_cfnews_lastestpost_layout3_body">
			<table class="table  table-striped table-valign-middle">
				<tbody>
					<tr>
						<td>Show thumbnail</td>
						<td><select class="form-control cfnews_lastestpost_layout3_post_thumbnail  selectjs" data-parent="modal_cfnews_lastestpost_layout3"><option class="yes">Yes</option><option class="no">No</option></select></td>
					</tr>
					<tr>
					<td>Categories</td>
					<td><select class="form-control cfnews_lastestpost_layout3_post_category other_post_category   selectjs" data-parent="modal_cfnews_lastestpost_layout3" multiple="multiple"><option class="yes">Yes</option><option class="no">No</option></select></td>
				</tr>
					<tr>
					<td>Post type</td>
					<td><select class="form-control cfnews_lastestpost_layout3_post_types other_post_type  selectjs" data-parent="modal_cfnews_lastestpost_layout3"><option class="yes">Yes</option><option class="no">No</option></select></td>
				</tr>
					<tr>
						<td>Limit show</td>
						<td><input type="text" value="10" class="form-control cfnews_lastestpost_layout3_post_limit" /></td>
					</tr>
					<tr>
					<td>Tags</td>
					<td><input type="text" value="" class="form-control cfnews_lastestpost_layout3_post_tags" /></td>
					</tr>
					<tr>
					<td>Sort by</td>
					<td><select class="form-control cfnews_lastestpost_layout3_sort_by  selectjs" data-parent="modal_cfnews_lastestpost_layout3"><option class="views">Views</option><option class="sort_order">Sort order</option><option class="ent_dt">Create date</option><option class="upd_dt">Lastest update</option></select></td>
				</tr>
					<tr>
					<td>Sort type</td>
					<td><select class="form-control cfnews_lastestpost_layout3_sort_type  selectjs" data-parent="modal_cfnews_lastestpost_layout3"><option class="asc">Asc</option><option class="desc">Desc</option></select></td>
				</tr>
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-success btnCreate_LastestPost_Layout_3"><i class="fas fa-save"></i> '.get_text_by_lang("Create","admin").'</button>
		  <button type="button" class="btn btn-danger btnCloseAlert" data-dismiss="modal"><i class="fas fa-times"></i> '.get_text_by_lang("Close","admin").'</button>
		</div>
	  </div>
	</div>
  </div>',
	'thumbnail'=>THEMES_URL.'cfnews/sc_images/lastestpost_layout3.png',
	'js_embed'=>'',
	'css_embed'=>'',
));

register_plugin_shortcode_js(array(
	'code'=>'cfnews_lastestpost_layout4',
	'title'=>'Lastest Post Layout 4',
	'html_embed'=>'<div class="modal fade" id="modal_cfnews_lastestpost_layout4"  style="z-index:99999999;" data-backdrop="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg ">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title " id="exampleModalLabel">'.get_text_by_lang("Lastest Post Shortcode Layout 4","admin").'</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body modal_cfnews_lastestpost_layout4_body">
			<table class="table  table-striped table-valign-middle">
				<tbody>
					<tr>
						<td>Show thumbnail</td>
						<td><select class="form-control cfnews_lastestpost_layout4_post_thumbnail  selectjs" data-parent="modal_cfnews_lastestpost_layout4"><option class="yes">Yes</option><option class="no">No</option></select></td>
					</tr>
					<tr>
					<td>Categories</td>
					<td><select class="form-control cfnews_lastestpost_layout4_post_category other_post_category   selectjs" data-parent="modal_cfnews_lastestpost_layout4" multiple="multiple"><option class="yes">Yes</option><option class="no">No</option></select></td>
					</tr>
					<tr>
					<td>Post type</td>
					<td><select class="form-control cfnews_lastestpost_layout4_post_types other_post_type  selectjs" data-parent="modal_cfnews_lastestpost_layout4"><option class="yes">Yes</option><option class="no">No</option></select></td>
				</tr>
					<tr>
						<td>Limit show</td>
						<td><input type="text" value="10" class="form-control cfnews_lastestpost_layout4_post_limit" /></td>
					</tr>
					<tr>
					<td>Tags</td>
					<td><input type="text" value="" class="form-control cfnews_lastestpost_layout4_post_tags" /></td>
					</tr>
					<tr>
					<td>Sort by</td>
					<td><select class="form-control cfnews_lastestpost_layout4_sort_by  selectjs" data-parent="modal_cfnews_lastestpost_layout4"><option class="views">Views</option><option class="sort_order">Sort order</option><option class="ent_dt">Create date</option><option class="upd_dt">Lastest update</option></select></td>
				</tr>
					<tr>
					<td>Sort type</td>
					<td><select class="form-control cfnews_lastestpost_layout4_sort_type  selectjs" data-parent="modal_cfnews_lastestpost_layout4"><option class="asc">Asc</option><option class="desc">Desc</option></select></td>
				</tr>
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-success btnCreate_LastestPost_Layout_4"><i class="fas fa-save"></i> '.get_text_by_lang("Create","admin").'</button>
		  <button type="button" class="btn btn-danger btnCloseAlert" data-dismiss="modal"><i class="fas fa-times"></i> '.get_text_by_lang("Close","admin").'</button>
		</div>
	  </div>
	</div>
  </div>',
	'thumbnail'=>THEMES_URL.'cfnews/sc_images/lastestpost_layout4.png',
	'js_embed'=>'',
	'css_embed'=>'',
));

register_plugin_shortcode_js(array(
	'code'=>'cfnews_lastestpost_layout5',
	'title'=>'Lastest Post Layout 5',
	'html_embed'=>'<div class="modal fade" id="modal_cfnews_lastestpost_layout5"  style="z-index:99999999;" data-backdrop="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg ">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title " id="exampleModalLabel">'.get_text_by_lang("Lastest Post Shortcode Layout 5","admin").'</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body modal_cfnews_lastestpost_layout5_body">
			<table class="table  table-striped table-valign-middle">
				<tbody>
					<tr>
						<td>Show thumbnail</td>
						<td><select class="form-control cfnews_lastestpost_layout5_post_thumbnail  selectjs" data-parent="modal_cfnews_lastestpost_layout5"><option class="yes">Yes</option><option class="no">No</option></select></td>
					</tr>
					<tr>
					<td>Categories</td>
					<td><select class="form-control cfnews_lastestpost_layout5_post_category other_post_category   selectjs" data-parent="modal_cfnews_lastestpost_layout5" multiple="multiple"><option class="yes">Yes</option><option class="no">No</option></select></td>
					</tr>
					<tr>
					<td>Post type</td>
					<td><select class="form-control cfnews_lastestpost_layout5_post_types other_post_type  selectjs" data-parent="modal_cfnews_lastestpost_layout5"><option class="yes">Yes</option><option class="no">No</option></select></td>
				</tr>
					<tr>
						<td>Limit show</td>
						<td><input type="text" value="10" class="form-control cfnews_lastestpost_layout5_post_limit" /></td>
					</tr>
					<tr>
					<td>Tags</td>
					<td><input type="text" value="" class="form-control cfnews_lastestpost_layout5_post_tags" /></td>
					</tr>
					<tr>
					<td>Sort by</td>
					<td><select class="form-control cfnews_lastestpost_layout5_sort_by  selectjs" data-parent="modal_cfnews_lastestpost_layout5"><option class="views">Views</option><option class="sort_order">Sort order</option><option class="ent_dt">Create date</option><option class="upd_dt">Lastest update</option></select></td>
				</tr>
					<tr>
					<td>Sort type</td>
					<td><select class="form-control cfnews_lastestpost_layout5_sort_type  selectjs" data-parent="modal_cfnews_lastestpost_layout5"><option class="asc">Asc</option><option class="desc">Desc</option></select></td>
				</tr>
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-success btnCreate_LastestPost_Layout_5"><i class="fas fa-save"></i> '.get_text_by_lang("Create","admin").'</button>
		  <button type="button" class="btn btn-danger btnCloseAlert" data-dismiss="modal"><i class="fas fa-times"></i> '.get_text_by_lang("Close","admin").'</button>
		</div>
	  </div>
	</div>
  </div>',
	'js_embed'=>'',
	'css_embed'=>'',
));

register_plugin_shortcode_js(array(
	'code'=>'cfnews_populartags',
	'title'=>'Popular Tags',
	'html_embed'=>'',
	'js_embed'=>'',
	'css_embed'=>'',
));


register_plugin_shortcode_js(array(
	'code'=>'cfnews_slide',
	'title'=>'Slide',
	'html_embed'=>'',
	'js_embed'=>'',
	'css_embed'=>'',
));

register_plugin_shortcode_js(array(
	'code'=>'cfnews_videopost_layout1',
	'title'=>'Video Post Layout 1',
	'html_embed'=>'',
	'js_embed'=>'',
	'css_embed'=>'',
));

register_plugin_shortcode_js(array(
	'code'=>'cfnews_videopost_layout2',
	'title'=>'Video Post Layout 2',
	'html_embed'=>'',
	'js_embed'=>'',
	'css_embed'=>'',
));

register_plugin_shortcode_js(array(
	'code'=>'cfnews_videopost_layout3',
	'title'=>'Video Post Layout 3',
	'html_embed'=>'',
	'js_embed'=>'',
	'css_embed'=>'',
));

register_plugin_shortcode_js(array(
	'code'=>'cfnews_gallery_layout1',
	'title'=>'Gallery Layout 1',
	'html_embed'=>'',
	'js_embed'=>'',
	'css_embed'=>'',
));

register_plugin_shortcode_js(array(
	'code'=>'cfnews_gallery_layout2',
	'title'=>'Gallery Layout 2',
	'html_embed'=>'',
	'js_embed'=>'',
	'css_embed'=>'',
));
