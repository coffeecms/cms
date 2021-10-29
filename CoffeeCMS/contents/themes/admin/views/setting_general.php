<style>
.tab-content>.active {
    display: block;
    /* padding: 0px; */
    /* margin-left: 10px; */
}


#exTab1 .tab-content {
  color : white;
  background-color: #428bca;
  padding : 5px 15px;
}

#exTab2 h3 {
  color : white;
  background-color: #428bca;
  padding : 5px 15px;
}

/* remove border radius for the tab */


</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo get_text_by_lang('General Setting','admin');?></h1>
          </div><!-- /.col -->
      
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-md-12 col-sm-12">

		  <div class="row">
          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">
              <div class="card-header d-flex p-0">
                <!-- <h3 class="card-title p-3">Tabs</h3> -->
                <ul class="nav nav-pills  p-2">
                  <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab"><?php echo get_text_by_lang('General','admin');?></a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab"><?php echo get_text_by_lang('Site Information','admin');?></a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab"><?php echo get_text_by_lang('Admin Page','admin');?></a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab"><?php echo get_text_by_lang('Home Page','admin');?></a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_5" data-toggle="tab"><?php echo get_text_by_lang('Email','admin');?></a></li>
				  <li class="nav-item"><a class="nav-link" href="#tab_7" data-toggle="tab"><?php echo get_text_by_lang('Postback','admin');?></a></li>
				  <li class="nav-item"><a class="nav-link" href="#tab_9" data-toggle="tab"><?php echo get_text_by_lang('ID Length','admin');?></a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_6" data-toggle="tab"><?php echo get_text_by_lang('Updates','admin');?></a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_8" data-toggle="tab"><?php echo get_text_by_lang('Clean','admin');?></a></li>
                  
                
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">

						<div class="row" style="margin-top:10px;margin-bottom:10px;">
								<div class="col-lg-9">
									<span><?php echo get_text_by_lang('Timezone','admin');?>:</span>
								</div>
								<div class="col-lg-3">
									<select name="general[timezone]" id="timezone" class="form-control timezone setting-page1 select2js">
										<?php for ($i=0; $i < count($listTimeZones); $i++) { 
											echo '<option value="'.$listTimeZones[$i].'">'.$listTimeZones[$i].'</option>';
										} ?>
									</select>
								</div>

							</div>
						<div class="row" style="margin-top:10px;margin-bottom:10px;">
								<div class="col-lg-9">
									<span><?php echo get_text_by_lang('System status','admin');?>:</span>
								</div>
								<div class="col-lg-3">
									<select name="general[system_status]" id="system_status" class="form-control system_status setting-page1 select2js">
										<option value="working"><?php echo get_text_by_lang('Working','admin');?></option>
										<option value="underconstruction"><?php echo get_text_by_lang('Under construction','admin');?></option>
										<option value="comingsoon"><?php echo get_text_by_lang('Coming soon','admin');?></option>
									</select>
								</div>

							</div>
							
							<div class="row" style="margin-top:10px;margin-bottom:10px;">
								<div class="col-lg-9">
								<span><?php echo get_text_by_lang('Register user status','admin');?>:</span>
								</div>
								<div class="col-lg-3">
									<select name="general[register_user_status]" id="register_user_status" class="form-control register_user_status setting-page1 select2js">
									<option value="yes"><?php echo get_text_by_lang('Enable','admin');?></option>
										<option value="no"><?php echo get_text_by_lang('Disable','admin');?></option>

									</select>
								</div>

							</div>
							<div class="row" style="margin-top:10px;margin-bottom:10px;">
								<div class="col-lg-9">
								<span><?php echo get_text_by_lang('Verify email user after register completed','admin');?>:</span>
								</div>
								<div class="col-lg-3">
									<select name="general[register_verify_email]" id="register_verify_email" class="form-control setting-page1 select2js register_verify_email">
									<option value="yes"><?php echo get_text_by_lang('Enable','admin');?></option>
										<option value="no"><?php echo get_text_by_lang('Disable','admin');?></option>

									</select>
								</div>

							</div>
							<div class="row" style="margin-top:10px;margin-bottom:10px;">
								<div class="col-lg-9">
								<span><?php echo get_text_by_lang('Default member user group','admin');?>:</span>
								</div>
								<div class="col-lg-3">
									<select name="general[default_member_groupid]" id="default_member_groupid" class="form-control select2js  setting-page1 default_member_groupid">
									<?php
										$total=count($usergroups);

										$li='';

										for($i=0;$i<$total;$i++)
										{
												$li.='<option value="'.$usergroups[$i]['id'].'">'.$usergroups[$i]['title'].'</option>';
										}

										echo $li;
									?>
									</select>
								</div>

							</div>
							<div class="row" style="margin-top:10px;margin-bottom:10px;">
								<div class="col-lg-9">
								<span><?php echo get_text_by_lang('Default banned user group','admin');?>:</span>
								</div>
								<div class="col-lg-3">
									<select name="general[default_member_banned_groupid]" id="default_member_banned_groupid" class="form-control select2js setting-page1 default_member_banned_groupid">
									<?php
										$total=count($usergroups);

										$li='';

										for($i=0;$i<$total;$i++)
										{
												$li.='<option value="'.$usergroups[$i]['id'].'">'.$usergroups[$i]['title'].'</option>';
										}

										echo $li;
									?>
									</select>
								</div>

							</div>
							<div class="row" style="margin-top:10px;margin-bottom:10px;">
								<div class="col-lg-9">
								<span><?php echo get_text_by_lang('Default guest user group','admin');?>:</span>
								</div>
								<div class="col-lg-3">
									<select name="general[default_guest_groupid]" id="default_guest_groupid" class="form-control select2js setting-page1 default_guest_groupid">
									<?php
										$total=count($usergroups);

										$li='';

										for($i=0;$i<$total;$i++)
										{
												$li.='<option value="'.$usergroups[$i]['id'].'">'.$usergroups[$i]['title'].'</option>';
										}

										echo $li;
									?>
									</select>
								</div>

							</div>
							<div class="row" style="margin-top:10px;margin-bottom:10px;">
								<div class="col-lg-9">
								<span><?php echo get_text_by_lang('Default user level','admin');?>:</span>
								</div>
								<div class="col-lg-3">
									<select name="general[default_member_levelid]" id="default_member_levelid" class="form-control select2js setting-page1 default_member_levelid">
									<?php
										$total=count($usergroups);

										$li='';

										for($i=0;$i<$total;$i++)
										{
												$li.='<option value="'.$usergroups[$i]['id'].'">'.$usergroups[$i]['title'].'</option>';
										}

										echo $li;
									?>
									</select>
								</div>

							</div>

								<div class="row" style="margin-top:10px;margin-bottom:10px;">
								<div class="col-lg-10">
								<span><?php echo get_text_by_lang('Turn On','admin');?>/Off RSS feeds ?</span>
								</div>
								<div class="col-lg-2">
									<select name="general[rss_status]" id="rss_status" class="form-control enable_rss setting-page1 select2js">
									<option value="yes"><?php echo get_text_by_lang('Enable','admin');?></option>
									<option value="no" ><?php echo get_text_by_lang('Disabled','admin');?></option>
									</select>								
								</div>

							</div>
							<div class="row" style="margin-top:10px;margin-bottom:10px;">
								<div class="col-lg-10">
								<span><?php echo get_text_by_lang('Turn On','admin');?>/Off Sitemap ?</span>
								</div>
								<div class="col-lg-2">
									<select name="general[sitemap_status]" id="sitemap_status" class="form-control enable_sitemap setting-page1 select2js">
									<option value="yes"><?php echo get_text_by_lang('Enable','admin');?></option>
									<option value="no" ><?php echo get_text_by_lang('Disabled','admin');?></option>
									</select>								
								</div>

							</div>
							<div class="row" style="margin-top:10px;margin-bottom:10px;">
								<div class="col-lg-8">
								<span><?php echo get_text_by_lang('New user email template','admin');?>?</span>
								</div>
								<div class="col-lg-4">
									<select name="general[sitemap_status]" id="email_new_user_template" class="form-control email_new_user_template setting-page1 select2js">
									
									</select>								
								</div>

							</div>
							<div class="row" style="margin-top:10px;margin-bottom:10px;">
								<div class="col-lg-8">
								<span><?php echo get_text_by_lang('Forgot password email template','admin');?>?</span>
								</div>
								<div class="col-lg-4">
									<select name="general[sitemap_status]" id="email_forgotpassword_template" class="form-control email_forgotpassword_template setting-page1 select2js">
									
									</select>								
								</div>

							</div>
							<div class="row" style="margin-top:10px;margin-bottom:10px;">
								<div class="col-lg-8">
								<span><?php echo get_text_by_lang('Change password email template','admin');?>?</span>
								</div>
								<div class="col-lg-4">
									<select name="general[sitemap_status]" id="email_change_password_template" class="form-control email_change_password_template setting-page1 select2js">
									
									</select>								
								</div>

							</div>
							<div class="row" style="margin-top:10px;margin-bottom:10px;">
								<div class="col-lg-8">
								<span><?php echo get_text_by_lang('Admin Panel Language','admin');?>?</span>
								</div>
								<div class="col-lg-4">
								<input type="text" class="form-control system_admin_lang setting-page2" name="general[title]" id="title" value="" />
									
								</div>

							</div>
							<div class="row" style="margin-top:10px;margin-bottom:10px;">
								<div class="col-lg-8">
								<span><?php echo get_text_by_lang('Frontend Language','admin');?>?</span>
								</div>
								<div class="col-lg-4">
								<input type="text" class="form-control frontend_lang setting-page2" name="general[title]" id="title" value="" />
									
								</div>

							</div>
							<div class="row" style="margin-top:10px;margin-bottom:10px;">
								<div class="col-lg-8">
								<span><?php echo get_text_by_lang('System Setting','admin');?>/ <?php echo get_text_by_lang('Hooks Caches','admin');?></span>
								</div>
								<div class="col-lg-4 text-right">
								<button type="button" name="btnClearSystemCache" class="btn btn-info btnClearSystemCache"><?php echo get_text_by_lang('Clear','admin');?></button>								
								</div>

							</div>
							


					<p>
					<button type="button" name="btnSave" class="btn btn-info btnSavePage1"><?php echo get_text_by_lang('Save Changes','admin');?></button>
					</p>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
				  	<p><?php echo get_text_by_lang('System title','admin');?>:</p>
					<p>
					<input type="text" class="form-control system_title setting-page2" placeholder="<?php echo get_text_by_lang('Title','admin');?>..." name="general[title]" id="title" value="" />
					</p>
				  	<p><?php echo get_text_by_lang('Title','admin');?>:</p>
					<p>
					<input type="text" class="form-control site_title setting-page2" placeholder="<?php echo get_text_by_lang('Title','admin');?>..." name="general[title]" id="title" value="" />
					</p>
					<p><?php echo get_text_by_lang('Description','admin');?>:</p>
					<p>
					<input type="text" class="form-control site_description setting-page2" placeholder="<?php echo get_text_by_lang('Description','admin');?>..." name="general[descriptions]" id="descriptions" value="" />
					</p>
					<p><?php echo get_text_by_lang('Keywords','admin');?>:</p>		  		  			  
					<p>
					<input type="text" class="form-control site_keywords setting-page2" placeholder="Keywords..." name="general[keywords]" id="keywords" value="" />
					</p>
					<p>
					<button type="submit" name="btnSave" class="btn btn-info btnSavePage2"><?php echo get_text_by_lang('Save Changes','admin');?></button>
					</p>
				
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3">
				  	<p>
						<span><?php echo get_text_by_lang('Default page','admin');?>:</span>
					</p>

					<p class="" style="display:block;">
						<input type="text" class="form-control default_adminpage_url  setting-page3" name="general[default_page_url]" id="default_page_url" value="" placeholder="post/test_post.html" />
					</p>

					<p>
					<button type="button" name="btnSave" class="btn btn-info btnSavePage3"><?php echo get_text_by_lang('Save Changes','admin');?></button>
					</p>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_4">
						<p>
							<span><?php echo get_text_by_lang('Default page','admin');?>:</span>
						</p>

						<p class="" style="display:block;">
							<input type="text" class="form-control default_page setting-page4" name="general[default_page]" id="default_page" value="" placeholder="post/test_post.html" />
						</p>

						<p>
						<button type="button" name="btnSave" class="btn btn-info btnSavePage40"><?php echo get_text_by_lang('Save Changes','admin');?></button>
						</p>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_5">
						<div class="row" style="margin-top:10px;margin-bottom:10px;">
							<div class="col-lg-10">
							<span><?php echo get_text_by_lang('Enable SMTP','admin');?></span>
							</div>
							<div class="col-lg-2">
								<select name="general[sitemap_status]" id="email_smtp" class="form-control email_smtp setting-page1 select2js">
								<option value="yes"><?php echo get_text_by_lang('Enable','admin');?></option>
								<option value="no" ><?php echo get_text_by_lang('Disabled','admin');?></option>
								</select>								
							</div>

						</div>
						                  	
						<p>
							<span><?php echo get_text_by_lang('SMTP Host','admin');?>:</span>
						</p>

						<p class="" style="display:block;">
							<input type="text" class="form-control smtp_host setting-page4" name="general[default_page_url]" id="smtp_host" value="" placeholder="" />
						</p>
						                  	
						<p>
							<span><?php echo get_text_by_lang('SMTP Username','admin');?>:</span>
						</p>

						<p class="" style="display:block;">
							<input type="text" class="form-control smtp_username setting-page4" name="general[default_page_url]" id="smtp_username" value="" placeholder="" />
						</p>
						                  	
						<p>
							<span><?php echo get_text_by_lang('SMTP Password','admin');?>:</span>
						</p>

						<p class="" style="display:block;">
							<input type="text" class="form-control smtp_password setting-page4" name="general[default_page_url]" id="smtp_password" value="" placeholder="" />
						</p>
						                  	
						<p>
							<span><?php echo get_text_by_lang('SMTP Port','admin');?>:</span>
						</p>

						<p class="" style="display:block;">
							<input type="text" class="form-control smtp_port setting-page4" name="general[default_page_url]" id="smtp_port" value="" placeholder="" />
						</p>
						                  	
						<p>
							<span><?php echo get_text_by_lang('Sender Name','admin');?>:</span>
						</p>

						<p class="" style="display:block;">
							<input type="text" class="form-control email_sender_name setting-page4" name="general[default_page_url]" id="email_sender_name" value="" placeholder="" />
						</p>
						                  	
						<p>
							<span><?php echo get_text_by_lang('Sender Email','admin');?>:</span>
						</p>

						<p class="" style="display:block;">
							<input type="text" class="form-control email_sender setting-page4" name="general[default_page_url]" id="email_sender" value="" placeholder="" />
						</p>

						<p>
						<button type="button" name="btnSave" class="btn btn-info btnSavePage4"><?php echo get_text_by_lang('Save Changes','admin');?></button>
						</p>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_7">
						    	
						<p>
							<span><?php echo get_text_by_lang('Postback url when have new user','admin');?>:</span>
						</p>

						<p>
							<span>Parameters: {{user_id}}, {{username}}, {{email}}</span>
						</p>

						<p class="" style="display:block;">
							<input type="text" class="form-control post_back_when_add_new_user setting-page4" name="general[default_page_url]" id="post_back_when_add_new_user" value="" placeholder="" />
						</p>
						    	
						<p>
							<span><?php echo get_text_by_lang('Postback url when change user group','admin');?>:</span>
						</p>

						<p>
							<span>Parameters: {{user_id}}, {{username}}, {{group_id}}, {{group_title}}</span>
						</p>

						<p class="" style="display:block;">
							<input type="text" class="form-control post_back_when_change_user_group setting-page4" name="general[default_page_url]" id="post_back_when_change_user_group" value="" placeholder="" />
						</p>
						    	
						<p>
							<span><?php echo get_text_by_lang('Postback url when change user level','admin');?>:</span>
						</p>

						<p>
							<span>Parameters: {{user_id}}, {{username}}, {{level_id}}, {{level_title}}</span>
						</p>

						<p class="" style="display:block;">
							<input type="text" class="form-control post_back_when_change_user_level setting-page4" name="general[default_page_url]" id="post_back_when_change_user_level" value="" placeholder="" />
						</p>
						    	
						    	
						<p>
							<span><?php echo get_text_by_lang('Postback url when change post status','admin');?>:</span>
						</p>

						<p>
							<span>Parameters: {{user_id}}, {{username}}, {{post_id}}, {{post_title}}</span>
						</p>

						<p class="" style="display:block;">
							<input type="text" class="form-control post_back_when_change_post_status setting-page4" name="general[default_page_url]" id="post_back_when_change_post_status" value="" placeholder="" />
						</p>
						    	
						
						<p>
						<button type="button" name="btnSave" class="btn btn-info btnSavePage7"><?php echo get_text_by_lang('Save Changes','admin');?></button>
						</p>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="tab_6">
						<div class="row" style="margin-top:10px;margin-bottom:10px;">
						<?php if($has_update==false){ ?>
							<div class="col-lg-12">
								<span class='alert alert-success' style='width:100%;display:block;'><?php echo get_text_by_lang('There have not been any updates','admin');?></span>
							</div>
							<?php }else { ?>
								<div class="col-lg-12">
								<strong style='margin-bottom:5px;display:block;'><?php echo get_text_by_lang('We have detected an update package','admin');?></strong>
								<textarea class='form-control' style='height:200px;margin-bottom:15px;'><?php echo $update_info;?></textarea>

								<p>
								<button type="button" name="btnUpdateSystem" class="btn btn-info btnUpdateSystem"><?php echo get_text_by_lang('Start update system','admin');?></button>
								</p>

								</div>
								
							<?php } ?>

						</div>


                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="tab_8">
					<div class="row" style="margin-top:10px;margin-bottom:10px;">
						<div class="col-lg-8">
							<span><?php echo get_text_by_lang('Views data last 3 months before','admin');?></span>
							</div>
							<div class="col-lg-4 text-right">
							<button type="button" name="btnClearViewsData3Month" class="btn btn-info btnClearViewsData3Month"><?php echo get_text_by_lang('Clear','admin');?></button>								
						</div>
					</div>
					<div class="row" style="margin-top:10px;margin-bottom:10px;">
						<div class="col-lg-8">
							<span><?php echo get_text_by_lang('Activities last months','admin');?></span>
							</div>
							<div class="col-lg-4 text-right">
							<button type="button" name="btnClearActivitiesData1Month" class="btn btn-info btnClearActivitiesData1Month"><?php echo get_text_by_lang('Clear','admin');?></button>								
						</div>
					</div>
					<div class="row" style="margin-top:10px;margin-bottom:10px;">
						<div class="col-lg-8">
							<span><?php echo get_text_by_lang('Short urls not working','admin');?></span>
							</div>
							<div class="col-lg-4 text-right">
							<button type="button" name="btnClearShortUrlNotWorking" class="btn btn-info btnClearShortUrlNotWorking"><?php echo get_text_by_lang('Clear','admin');?></button>								
						</div>
					</div>


                  </div>
                  <!-- /.tab-pane -->

				  <div class="tab-pane" id="tab_9">
				  	<p><?php echo get_text_by_lang('Category id length','admin');?>:</p>
					<p>
					<input type="text" class="form-control system_category_id_len setting-page2" value="16" name="general[title]" id="title" value="" />
					</p>
				  	<p><?php echo get_text_by_lang('Post id length','admin');?>:</p>
					<p>
					<input type="text" class="form-control system_post_id_len setting-page2" value="16" name="general[title]" id="title" value="" />
					</p>
				  	<p><?php echo get_text_by_lang('User id length','admin');?>:</p>
					<p>
					<input type="text" class="form-control system_user_id_len setting-page2" value="16" name="general[title]" id="title" value="" />
					</p>
				  	
					<p>
					<button type="submit" name="btnSave" class="btn btn-info btnSavePage9"><?php echo get_text_by_lang('Save Changes','admin');?></button>
					</p>
				
                  </div>
                  <!-- /.tab-pane -->

                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- ./card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- END CUSTOM TABS -->
   
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->


        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script>

pageData['settingData']=<?php echo $settingData;?>;
pageData['user_group_mst']=<?php echo $user_group_mst;?>;
pageData['email_template_data']=<?php echo $email_template_data;?>;
pageData['user_level_mst']=<?php echo $user_level_mst;?>;

function prepareSettingData()
{
	var total=pageData['user_group_mst'].length;
	var li='';

	for (var i = 0; i < total; i++) {
		li+='<option value="'+pageData['user_group_mst'][i]['group_c']+'">'+pageData['user_group_mst'][i]['title']+'</option>';
	}

	$('.default_member_groupid').html(li).trigger('change');
	$('.default_member_banned_groupid').html(li).trigger('change');
	$('.default_guest_groupid').html(li).trigger('change');

	li='';
	total=pageData['user_level_mst'].length;
	for (var i = 0; i < total; i++) {
		li+='<option value="'+pageData['user_level_mst'][i]['level_id']+'">'+pageData['user_level_mst'][i]['title']+'</option>';
	}

	$('.default_member_levelid').html(li).trigger('change');

	
	total=pageData['email_template_data'].length;

	li='';
	for (var i = 0; i < total; i++) {
		li+='<option value="'+pageData['email_template_data'][i]['template_id']+'">'+pageData['email_template_data'][i]['title']+'</option>';
	}

	$('.email_forgotpassword_template').html(li).trigger('change');
	$('.email_change_password_template').html(li).trigger('change');
	$('.email_new_user_template').html(li).trigger('change');


	total=pageData['settingData'].length;

	for (var i = 0; i < total; i++) {
		pageData['settingData'][i]['key_c']=pageData['settingData'][i]['key_c'].trim();

		$('.'+pageData['settingData'][i]['key_c']).val(pageData['settingData'][i]['key_value']).trigger('change');
	}

}

$(document).ready(function(){

	prepareSettingData();
	$('.select2js').select2();


});

function setSelect(id,value)
{
	$('#'+id+' option').each(function(){
		var thisVal=$(this).val();

		if(thisVal==value)
		{
			$(this).attr('selected',true);
		}


	});
}

//btnSavePage1
$(document).on('click','.btnSavePage1',function(){
    var sendData={};

	var jsonData={};
    jsonData['timezone']=$('.timezone > option:selected').val();
    jsonData['system_status']=$('.system_status > option:selected').val();
    jsonData['register_user_status']=$('.register_user_status > option:selected').val();
    jsonData['register_verify_email']=$('.register_verify_email > option:selected').val();
    jsonData['default_member_groupid']=$('.default_member_groupid > option:selected').val();
    jsonData['default_member_banned_groupid']=$('.default_member_banned_groupid > option:selected').val();
    jsonData['default_member_levelid']=$('.default_member_levelid > option:selected').val();
    jsonData['default_guest_groupid']=$('.default_guest_groupid > option:selected').val();
    jsonData['enable_rss']=$('.enable_rss > option:selected').val();
    jsonData['enable_sitemap']=$('.enable_sitemap > option:selected').val();

    jsonData['email_forgotpassword_template']=$('.email_forgotpassword_template > option:selected').val();
    jsonData['email_new_user_template']=$('.email_new_user_template > option:selected').val();
    jsonData['email_change_password_template']=$('.email_change_password_template > option:selected').val();
    jsonData['system_admin_lang']=$('.system_admin_lang').val();
    jsonData['frontend_lang']=$('.frontend_lang').val();
   
    sendData['type']='1';
    sendData['save_data']=JSON.stringify(jsonData);

    postData(API_URL+'system_setting_update', sendData).then(data => {
      console.log(data); // JSON data parsed by `data.json()` call
      
      showAlertOK('','Done!');
    });        
});
$(document).on('click','.btnSavePage9',function(){
    var sendData={};

	var jsonData={};
    
    jsonData['system_category_id_len']=$('.system_category_id_len').val();
    jsonData['system_post_id_len']=$('.system_post_id_len').val();
    jsonData['system_user_id_len']=$('.system_user_id_len').val();
   
    sendData['type']='1';
    sendData['save_data']=JSON.stringify(jsonData);

    postData(API_URL+'system_setting_update', sendData).then(data => {
      console.log(data); // JSON data parsed by `data.json()` call
      
      showAlertOK('','Done!');
    });        
});

$(document).on('click','.btnSavePage2',function(){
    var sendData={};

	var jsonData={};
    jsonData['system_title']=$('.system_title').val();
    jsonData['site_title']=$('.site_title').val();
    jsonData['site_description']=$('.site_description').val();
    jsonData['site_keywords']=$('.site_keywords').val();
    
    sendData['type']='1';
    sendData['save_data']=JSON.stringify(jsonData);

    postData(API_URL+'system_setting_update', sendData).then(data => {
      console.log(data); // JSON data parsed by `data.json()` call
      
      showAlertOK('','Done!');
    });        
});

$(document).on('click','.btnSavePage3',function(){
    var sendData={};

	var jsonData={};
    jsonData['default_adminpage_url']=$('.default_adminpage_url').val();
    
    sendData['type']='1';
    sendData['save_data']=JSON.stringify(jsonData);

    postData(API_URL+'system_setting_update', sendData).then(data => {
      console.log(data); // JSON data parsed by `data.json()` call
      
      showAlertOK('','Done!');
    });        
});

$(document).on('click','.btnSavePage7',function(){
    var sendData={};

	var jsonData={};
    jsonData['post_back_when_add_new_user']=$('.post_back_when_add_new_user').val();
    jsonData['post_back_when_change_user_group']=$('.post_back_when_change_user_group').val();
    jsonData['post_back_when_change_user_level']=$('.post_back_when_change_user_level').val();
    jsonData['post_back_when_change_post_status']=$('.post_back_when_change_post_status').val();
    
    sendData['type']='1';
    sendData['save_data']=JSON.stringify(jsonData);

    postData(API_URL+'system_setting_update', sendData).then(data => {
      console.log(data); // JSON data parsed by `data.json()` call
      
      showAlertOK('','Done!');
    });        
});

$(document).on('click','.btnSavePage4',function(){
    var sendData={};

	var jsonData={};
    jsonData['email_smtp']=$('.email_smtp > option:selected').val();
    jsonData['smtp_host']=$('.smtp_host').val();
    jsonData['smtp_username']=$('.smtp_username').val();
    jsonData['smtp_password']=$('.smtp_password').val();
    jsonData['smtp_port']=$('.smtp_port').val();
    jsonData['email_sender_name']=$('.email_sender_name').val();
    jsonData['email_sender']=$('.email_sender').val();
    
    sendData['type']='1';
    sendData['save_data']=JSON.stringify(jsonData);

    postData(API_URL+'system_setting_update', sendData).then(data => {
      console.log(data); // JSON data parsed by `data.json()` call
      
      showAlertOK('','Done!');
    });        
});

$(document).on('click','.btnSavePage40',function(){
    var sendData={};

	var jsonData={};
    jsonData['default_page']=$('.default_page').val();
    
    sendData['type']='1';
    sendData['save_data']=JSON.stringify(jsonData);

    postData(API_URL+'system_setting_update', sendData).then(data => {
      console.log(data); // JSON data parsed by `data.json()` call
      
      showAlertOK('','Done!');
    });        
});

$(document).on('click','.btnClearSystemCache',function(){
    var sendData={};

    sendData['type']='1';

    postData(API_URL+'system_cache_clear', sendData).then(data => {
      console.log(data); // JSON data parsed by `data.json()` call
      showAlertOK('','Done!');
    });        
});

$(document).on('click','.btnClearViewsData3Month',function(){
    var sendData={};

    sendData['type']='1';

    postData(API_URL+'clear_view_data_last_months', sendData).then(data => {
      console.log(data); // JSON data parsed by `data.json()` call
      showAlertOK('','Done!');
    });        
});

$(document).on('click','.btnClearActivitiesData1Month',function(){
    var sendData={};

    sendData['type']='1';

    postData(API_URL+'clear_activities_data_last_months', sendData).then(data => {
      console.log(data); // JSON data parsed by `data.json()` call
      showAlertOK('','Done!');
    });        
});

$(document).on('click','.btnClearShortUrlNotWorking',function(){
    var sendData={};

    sendData['type']='1';

    postData(API_URL+'clear_shorturls_not_working', sendData).then(data => {
      console.log(data); // JSON data parsed by `data.json()` call
      showAlertOK('','Done!');
    });        
});


$(document).on('click','.btnUpdateSystem',function(){
    var sendData={};

    sendData['type']='1';

    postData(API_URL+'update_system', sendData).then(data => {
      console.log(data); // JSON data parsed by `data.json()` call
      showAlertOK('','Done!');
    });        
});



</script>