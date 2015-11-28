<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>HelpMe - profile</title>
	<meta name="generator" content="Bootply" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="<?php echo base_url();?>asset/css/learn_style.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>asset/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link href="<?php echo base_url();?>asset/home/css/styles.css" rel="stylesheet" type="text/css"/>
</head>
<body>
	<div class="wrapper">
		<div class="box">
			<div class="row row-offcanvas row-offcanvas-left">


				<!-- main right col -->
				<div class="column col-sm-10 col-xs-11" id="main">

					<!-- top nav -->
					<div class="navbar navbar-blue navbar-static-top">
						<div class="navbar-header">
							<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a href="/" class="navbar-brand logo">b</a>
						</div>
						<nav class="collapse navbar-collapse" role="navigation">
							<form class="navbar-form navbar-left" action="<?=site_url('home_control/search')?>" method="get">
								<div class="input-group input-group-sm" style="max-width:360px;">
									<input type="text" class="form-control" placeholder="Search" name="search-term" id="srch-term">
									<div class="input-group-btn">
										<button class="btn btn-default" type="submit" name="searchForm" value="searchForm"><i class="glyphicon glyphicon-search"></i></button>
									</div>
								</div>
							</form>
							<ul class="nav navbar-nav">
									<li>
										<a href="<?php echo site_url('home_control') ?>"><i class="glyphicon glyphicon-home"></i> Home</a>
									</li>
									<li>
										<a href="<?php echo site_url('profile_control') ?>"><i class="glyphicon glyphicon-th-large"></i> Profile</a>
									</li>
									<li>
										<a href="<?php echo site_url('askhelp_control') ?>"><i class="glyphicon glyphicon-bullhorn"></i> AskHelp</a>
									</li>
									<li>
										<a href="<?php echo site_url('map_control') ?>"><i class="glyphicon glyphicon-map-marker"></i> Map</a>
									</li>
								</ul>
							<ul class="nav navbar-nav navbar-right">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-comment"></i></a>
									<ul class="dropdown-menu" id="topNav">
										<?php foreach ($request_list->result() as $notification)
										{
											if($notification->approval == 'pending' && $notification->status == 'F')
											{?>
												<li><a href=""> <?php echo $notification->id ?> </a></li>
												<button id="button_<?php echo $notification->id; ?>"> Confirm </button>
												<button id="delete_<?php echo $notification->id; ?>"> Delete </button>
											<?php } 
										} ?>
									</ul>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i></a>
									<ul class="dropdown-menu">
										<li><a href="">More</a></li>
										<li><a href="">More</a></li>
										<li><a href="">More</a></li>
										<li><a href="">More</a></li>
										<li><a href="<?php echo site_url('home_control/logout') ?>">Log out</a></li>
									</ul>
								</li>
							</ul>
						</nav>
					</div>
					<!-- /top nav -->

					<div class="padding">
						<div class="full col-sm-9">

							<!-- content -->
							<div class="row">

								<!-- main col left -->
								<div class="col-sm-5">
									<div class="panel panel-info">
										<div class="panel-heading">
											Name
										</div>
										<div class="panel-body">
											<div class="col-md-4">
												<?php foreach ($user->result() as $column)
												{ ?>
													<div id="thumblist">
														<a href="#image1">
															<!--what the user sees before clicking anything-->
															<img src="<?php echo base_url(); echo $column->picture ?>" class="thumb" style="max-width:150px;max-height:150px;width:auto;height:auto;">
														</a>
														<div id="image1" class="lightbox">
															<!--what the user sees after clicking the first image-->
															<a href="#_">
																<!--no need for a left arrow because there is no previous image to go to-->
																<img src="<?php echo base_url(); echo $column->picture ?>" />
																<!--this is the actual image that 'grows'-->
															</a>
															<a href="#_">
																<!--this href takes out out of full screen. -->
																<img src="http://i.imgur.com/6JOeXGB.png" class="exit" />
																<!--exit button-->
															</a>
															<?php echo form_open_multipart('profile_control/do_upload'); ?>
																<input id="browse" type="file" name="userfile" size="20" style="text-align: center; position: absolute;left:42%;margin-top:20px;">

																</br>

																<input id = "browse_submit" type="submit" value="upload" style="text-align: center; position: absolute;left:42%;margin-top:30px;">
															</form>
														</div>													
													</div>
												</div>
												<div class="col-md-offset-1 col-md-7">
													<p>
														E-mail : <?php echo $column->email; ?>
													</p>
													<p>
														Specification :
													</p>
													<p>
														Area : <?php echo $column->address; ?>
													</p>
													<p>
														Helpful Rate :
													</p>
													<div class="rating" style="float:left">
														<span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
													</div>
												</div>
											<?php } ?>
										</div>
									</div>

									<div class="panel panel-default">
										<div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Bootstrap Examples</h4></div>
										<div class="panel-body">
											<div class="list-group">
												<a href="http://bootply.com/tagged/modal" class="list-group-item">Modal / Dialog</a>
												<a href="http://bootply.com/tagged/datetime" class="list-group-item">Datetime Examples</a>
												<a href="http://bootply.com/tagged/datatable" class="list-group-item">Data Grids</a>
											</div>
										</div>
									</div>

									<div class="well">
										<form class="form-horizontal" role="form">
											<h4>What's New</h4>
											<div class="form-group" style="padding:14px;">
												<textarea class="form-control" placeholder="Update your status"></textarea>
											</div>
											<button class="btn btn-primary pull-right" type="button">Post</button><ul class="list-inline"><li><a href=""><i class="glyphicon glyphicon-upload"></i></a></li><li><a href=""><i class="glyphicon glyphicon-camera"></i></a></li><li><a href=""><i class="glyphicon glyphicon-map-marker"></i></a></li></ul>
										</form>
									</div>

									<div class="panel panel-default">
										<div class="panel-heading"><h4>What Is Bootstrap?</h4></div>
										<div class="panel-body">
											Bootstrap is front end frameworkto build custom web applications that are fast, responsive &amp; intuitive. It consist of CSS and HTML for typography, forms, buttons, tables, grids, and navigation along with custom-built jQuery plug-ins and support for responsive layouts. With dozens of reusable components for navigation, pagination, labels, alerts etc..                          </div>
									</div>



									</div>

									<!-- main col right -->
									<div class="col-sm-7">

										<div class="well">
											<h4>What's Happened</h4>
											<br/>
										
										<?php foreach ($post->result() as $row)
										{ ?>
											<?php if ($row->type == 'urgent'): ?>
												<div class="panel panel-danger" style="cursor: pointer;">
											<?php elseif ($row->type == 'medium'): ?>
												<div class="panel panel-warning" style="cursor: pointer;">
											<?php else: ?>
												<div class="panel panel-success" style="cursor: pointer;">
											<?php endif; ?>
											<div class="panel-heading">
												<!--<a href="#" class="pull-right">View all</a>-->
												<h3> <?php echo $row->request; ?> </h3>
												<!--<h4>Bootply Editor &amp; Code Library</h4>-->
											</div>
											<div class="panel-body">
												<p>
													<img src="<?php echo base_url(); echo $row->picture ?>" class="img-circle pull-left">
													<div>
														<a href="#" style="padding-left:1cm;"> <b> <?php echo $row->name ?> </b></a>
														</br>
														<font color="grey" size=2 style="padding-left:1cm;"> <?php echo $row->post_time ?> </font>
														<div>
															<?php if ($row->type == 'urgent'): ?>
																<span class="label label-danger" style="margin-left:1cm">Urgent</span>
															<?php elseif ($row->type == 'medium'): ?>
																<span class="label label-warning" style="margin-left:1cm">Medium</span>
															<?php else: ?>
																<span class="label label-success" style="margin-left:1cm">Easy</span>
															<?php endif; ?>
														</div>
													</div>
												</p>
												<div class="clearfix"></div>
													<hr>
													<?php echo $row->description ?>
											</div>
											</div>
										<?php } ?>
										</div>
												<div class="panel panel-default">
													<div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Stackoverflow</h4></div>
													<div class="panel-body">
														<img src="//placehold.it/150x150" class="img-circle pull-right"> <a href="#">Keyword: Bootstrap</a>
														<div class="clearfix"></div>
														<hr>

														<p>If you're looking for help with Bootstrap code, the <code>twitter-bootstrap</code> tag at <a href="http://stackoverflow.com/questions/tagged/twitter-bootstrap">Stackoverflow</a> is a good place to find answers.</p>

														<hr>
														<form>
															<div class="input-group">
																<div class="input-group-btn">
																	<button class="btn btn-default">+1</button><button class="btn btn-default"><i class="glyphicon glyphicon-share"></i></button>
																</div>
																<input type="text" class="form-control" placeholder="Add a comment..">
															</div>
														</form>

													</div>
												</div>

												<div class="panel panel-default">
													<div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Portlet Heading</h4></div>
													<div class="panel-body">
														<ul class="list-group">
															<li class="list-group-item">Modals</li>
															<li class="list-group-item">Sliders / Carousel</li>
															<li class="list-group-item">Thumbnails</li>
														</ul>
													</div>
												</div>

												<div class="panel panel-default">
													<div class="panel-thumbnail"><img src="/assets/example/bg_4.jpg" class="img-responsive"></div>
													<div class="panel-body">
														<p class="lead">Social Good</p>
														<p>1,200 Followers, 83 Posts</p>

														<p>
															<img src="https://lh6.googleusercontent.com/-5cTTMHjjnzs/AAAAAAAAAAI/AAAAAAAAAFk/vgza68M4p2s/s28-c-k-no/photo.jpg" width="28px" height="28px">
															<img src="https://lh4.googleusercontent.com/-6aFMDiaLg5M/AAAAAAAAAAI/AAAAAAAABdM/XjnG8z60Ug0/s28-c-k-no/photo.jpg" width="28px" height="28px">
															<img src="https://lh4.googleusercontent.com/-9Yw2jNffJlE/AAAAAAAAAAI/AAAAAAAAAAA/u3WcFXvK-g8/s28-c-k-no/photo.jpg" width="28px" height="28px">
														</p>
													</div>
												</div>

											</div>
										</div><!--/row-->

										<div class="row">
											<div class="col-sm-6">
												<a href="#">Twitter</a> <small class="text-muted">|</small> <a href="#">Facebook</a> <small class="text-muted">|</small> <a href="#">Google+</a>
											</div>
										</div>

										<div class="row" id="footer">
											<div class="col-sm-6">

											</div>
											<div class="col-sm-6">
												<p>
													<a href="#" class="pull-right">©Copyright 2013</a>
												</p>
											</div>
										</div>

										<hr>

										<h4 class="text-center">
											<a href="http://bootply.com/96266" target="ext">Download this Template @Bootply</a>
										</h4>

										<hr>


									</div><!-- /col-9 -->
								</div><!-- /padding -->
							</div>
							<!-- /main -->

						</div>
					</div>
				</div>


				<!--post modal-->
				<div id="postModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								Update Status
							</div>
							<div class="modal-body">
								<form class="form center-block">
									<div class="form-group">
										<textarea class="form-control input-lg" autofocus="" placeholder="What do you want to share?"></textarea>
									</div>
								</form>
							</div>
							<div class="modal-footer">
								<div>
									<button class="btn btn-primary btn-sm" data-dismiss="modal" aria-hidden="true">Post</button>
									<ul class="pull-left list-inline"><li><a href=""><i class="glyphicon glyphicon-upload"></i></a></li><li><a href=""><i class="glyphicon glyphicon-camera"></i></a></li><li><a href=""><i class="glyphicon glyphicon-map-marker"></i></a></li></ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- script references -->
				<script src="<?php echo base_url();?>asset/js/jquery-2.1.4.min.js" type="text/javascript"></script>
				<script src="<?php echo base_url();?>asset/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
				<script src="<?php echo base_url();?>asset/home/js/scripts.js" type="text/javascript"></script>
				<script>
					$("button").click(function() {
						var full_id = this.id;
						var temp = full_id.split("_");
						var id = temp[1];
						var type = temp[0];
						if(type == 'button')
						{
							$.ajax
							({
								type: "POST",
								url: "<?php echo site_url('profile_control/approve_request/"+id+"'); ?>",
								data: {},
								success: function(){ location.reload(); },
							});
						} 
						else if(type == 'delete')
						{
							$.ajax
							({
								type: "POST",
								url: "<?php echo site_url('profile_control/remove_friend_request/"+id+"'); ?>",
								data: {},
								success: function(){ location.reload(); },
							});
						}
					});
				</script>
			</body>
			</html>
