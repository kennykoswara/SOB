<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>HelpMe - Friend</title>
	<link rel="shortcut icon" type="image/png" href=" <?php echo base_url();?>asset/favicon.jpg"/>
	<meta name="generator" content="Bootply" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="<?php echo base_url();?>asset/css/learn_style.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>asset/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link href="<?php echo base_url();?>asset/home/css/styles.css" rel="stylesheet" type="text/css"/>
</head>
<style>
#topNav{
	max-height:110px;/* you can change as you need it */
	overflow:auto;/* to get scroll */
}

.caption {
   position: relative;
    display: inline-block; /* added */
    overflow: hidden; /* added */
}

.caption__overlay {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    padding: 10px;
    color: white;
    transform: translateY(100%);
    transition: transform .35s ease-out;
}
.caption:hover .caption__overlay {
    transform: translateY(0);
}


.caption__overlay__title {
    margin: 0;
    padding: 0 0 12px;
    /*transform: translateY( calc(-100% - 10px) );  +10px overlay padding */
    transition: transform .35s ease-out;
	text-align:center;
}
.caption:hover .caption__overlay__title {
    transform: translateY(0);
}


.caption::before {
    content: ' ';
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: transparent;
    transition: background .35s ease-out;
}
.caption:hover::before {
    background: rgba(0, 0, 0, .5);
}
</style>
<body>
	<div class="wrapper">
		<div class="box">
			<div class="row row-offcanvas row-offcanvas-left">


				<!-- main right col -->
				<div class="column col-sm-10 col-xs-11" id="main">

					<!-- top nav -->
					<!-- top nav -->
					<div class="navbar navbar-blue navbar-static-top">
						<div class="navbar-header">
							<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a href="<?php echo site_url('home_control/index/') ?>" class="navbar-brand logo"><img src=" <?php echo base_url();?>asset/helpme.jpg" style="max-width:20px;max-height:20px;width:auto;height:auto;"></a>
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
								<li>
									<a href="<?php echo site_url('mission_control') ?>"><i class="glyphicon glyphicon-list-alt"></i> Missions</a>
								</li>
								<li>
									<a href="<?php echo site_url('request_control') ?>"><i class="glyphicon glyphicon-tasks"></i> Requests</a>
								</li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="glyphicon glyphicon-comment"></i></a>
									<ul class="dropdown-menu" style="min-width:8cm !important" id="topNav">
										<?php foreach ($request_list->result() as $notification)
										{
											if($notification->approval == 'pending' && $notification->status == 'F')
											{?>
												<li>
													<div style="padding-left:0" class="container-fluid">
														<a href="<?php echo site_url('friend_control/index/'.$notification->id) ?>">
														<div class="col-xs-6">
															<?php echo $notification->username ?>
														</div>
													</a>
														<div class="col-xs-6">
															<button id="button_<?php echo $notification->id; ?>" class="btn btn-success btn-xs" type="button"> Confirm </button>
															<button id="delete_<?php echo $notification->id; ?>" class="btn btn-danger btn-xs" type="button"> Delete </button>
														</div>
													</div>
												</li>
												<?php if(end($request_list->result()) !== $notification) { ?> <li role="separator" class="divider"></li>
												<?php } ?>

												<?php }
											} ?>
										</ul>
									</li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i></a>
										<ul class="dropdown-menu">
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
										<div class="panel panel-primary">

											<?php foreach ($friend->result() as $column)
											{ ?>
												<div class="panel-heading">
													<span style="font-size:2em"><b><?php echo $column->name; ?></b></span>
												</div>
													<div class="panel-body">
														<div class="col-md-4">
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
															</div>
														</div>

													</div>
													<div class="col-md-offset-1 col-md-7">
														<p>
															E-mail : <?php echo $column->email; ?>
														</p>
														<p>
															Area : <?php echo $column->address; ?>
														</p>
														<p>
															Helpful Rate : <?php echo $column->score; ?>
 														</p>
														<div class="rating" style="float:left">
															<?php $count_star=0;
															for($i = 1; $i <= $column->score; $i++)
															{
																if($i%20 == 0 && $count_star<=10)
																{
																	echo '<span>☆</span>';
																	$count_star++;
																}
															} ?>
														</div>
													<?php } ?>
														<?php foreach ($friend_request->result() as $friend_req)
														{
															if($friend_req->id == $id && $friend_req->approval == 'pending')
															{ ?>
																<form action="<?=site_url('friend_control/approve_request/'.$friend_req->id)?>" method="POST">
																	<button type="submit" class="label label-default"> Approve Friend Request </button>
																</form>
																<?php } else if($friend_req->id == $id && $friend_req->approval == 'approved'){ ?>
																	<br/><span class="label label-default"> Friend </span>
																	<?php }
																} ?>
																<?php foreach ($request->result() as $type)
																{
																	if($type->request == 'send' && $type->approval == 'pending')
																	{ ?>
																		<form action="<?=site_url('friend_control/remove_request/'.$id)?>" method="POST">
																			<button type="submit" class="label label-default"> Cancel request </button>
																		</form>
																		<?php } else if($type->request == 'send' && $type->approval == 'approved'){ ?>
																			<br/><span class="label label-default"> Friend </span>
																			<?php } ?>
																			<?php } ?>
																		</div>
																	</div>
																</div>

																<div class="panel panel-primary">

																	<div class="panel-heading">
																		<a href="<?php echo site_url('requesting_friend_control/index/'.$id) ?>" class="pull-right" style="color:#FFFFFF">See All</a>
																		Requesting Friend
																	</div>
																	<div class="panel panel-default">


																	<div class="panel-body">
																		<?php $count_friend_list=1;
																		foreach ($friend_list->result() as $row)
																		{
																			if($count_friend_list== 9)
																				break;
																			if($count_friend_list%3 == 0)
																			{ ?>
																				<div class="row">
																			<?php }
																			if($row->id_friend == $id && $row->approval=='approved' && $row->status=='T')
																			{ ?>
																				<div class="col-md-4">
																					<a href="<?php echo site_url('friend_control/index/'.$row->id_user) ?>">
																						<article class="caption">
																							<img src="<?php echo base_url(); echo $row->picture ?>" class="caption__media img-responsive" style="max-width:100px;max-height:100px;width:auto;height:auto;">
																								<div class="caption__overlay">
																								<h5 class="caption__overlay__title"> <?php echo "<b>".$row->name."</b>" ?> </h5>
																							</div>
																						</article>
																					</a>
																				</div>
																			<?php }
																			else if ($count_friend_list%3 != 0)
																			{
																				continue;
																			} ?>
																			<?php if($count_friend_list%3 == 0)
																			{ ?>
																				</div>
																				</br>
																			<?php }
																			$count_friend_list++;
																		} ?>
																	</div>
																</div>
																</div>

																<div class="panel panel-primary">

																	<div class="panel-heading">
																		<a href="<?php echo site_url('requested_friend_control/index/'.$id) ?>" class="pull-right" style="color:#FFFFFF">See All</a>
																		Requested Friend
																	</div>
																	<div class="panel panel-default">


																	<div class="panel-body">
																		<?php $count_friend_list=1;
																		foreach ($friend_list2->result() as $row)
																		{
																			if($count_friend_list== 9)
																				break;
																			if($count_friend_list%3 == 0)
																			{ ?>
																				<div class="row">
																			<?php }
																			if($row->id_user == $id && $row->approval=='approved' && $row->status=='T')
																			{ ?>
																				<div class="col-md-4">
																					<a href="<?php echo site_url('friend_control/index/'.$row->id_friend) ?>">
																						<article class="caption">
																							<img src="<?php echo base_url(); echo $row->picture ?>" class="caption__media img-responsive" style="max-width:100px;max-height:100px;width:auto;height:auto;">
																								<div class="caption__overlay">
																								<h5 class="caption__overlay__title"> <?php echo "<b>".$row->name."</b>" ?> </h5>
																							</div>
																						</article>
																					</a>
																				</div>
																			<?php }
																			else if ($count_friend_list%3 != 0)
																			{
																				continue;
																			} ?>
																			<?php if($count_friend_list%3 == 0)
																			{ ?>
																				</div>
																				</br>
																			<?php }
																			$count_friend_list++;
																		} ?>
																	</div>
																</div>
																</div>
															</div>

															<!-- main col right -->
															<div class="col-sm-7">

																<div class="well">
																	<h4>Help Request</h4>
																	</br>
																<?php foreach ($post->result() as $row)
																{ ?>
																	<?php if ($row->type == 'urgent'): ?>
																		<div class="panel panel-danger">
																		<?php elseif ($row->type == 'medium'): ?>
																			<div class="panel panel-warning">
																			<?php else: ?>
																				<div class="panel panel-success">
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
														$.ajax({
															type: "POST",
															url: "<?php echo site_url('friend_control/approve_request/"+id+"'); ?>",
															data: {},
															success: function(){ location.reload(); },
														});
													}
													else if(type == 'delete')
													{
														$.ajax({
															type: "POST",
															url: "<?php echo site_url('friend_control/remove_friend_request/"+id+"'); ?>",
															data: {},
															success: function(){ location.reload(); },
														});
													}
												});


												</script>
											</body>
											</html>
