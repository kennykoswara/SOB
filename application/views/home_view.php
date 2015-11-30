<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>HelpMe - Home</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
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
						<!-- top nav -->
						<div class="navbar navbar-blue navbar-static-top">
							<div class="navbar-header">
								<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
									<span class="sr-only">Toggle</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a href="" class="navbar-brand logo">H</a>
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
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-comment"></i></a>
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

										<div class="panel panel-success">
											<div class="panel-heading">
												Map
											</div>
											<div class="panel-body">
												Map disini
											</div>
										</div>

									</div>

									<!-- main col right -->
									<div class="col-sm-7">

										<div class="well">
											<h4>Find your friends who need your help</h4>
											<br/>


										<?php foreach ($post->result() as $row)
										{ ?>
											<?php $counter=0;
											foreach($friend_post->result() as $column)
											{
												if(($column->id_user != $row->id_user || $column->id_friend != $row->id_user) && ($column->approval=="pending" && $column->status=="F"))
													continue;
												else
													$counter++;
											}
											if($counter>0 || ($row->id_user == $user_id) )
											{ ?>
												<?php if ($row->type == 'urgent'): ?>
													 <div class="panel panel-danger" >
												<?php elseif ($row->type == 'medium'): ?>
													 <div class="panel panel-warning" >
												<?php else: ?>
													 <div class="panel panel-success">
												<?php endif; ?>
													<div class="panel-heading" onclick="location.href='<?php echo base_url('index.php/home_control/load_map?var1='. $row->lat . '&var2=' . $row->lng)?>';" style="cursor: pointer;">
														<!--<a href="#" class="pull-right">View all</a>-->
														<h3> <?php echo $row->request; ?> </h3>
															<!--<h4>Bootply Editor &amp; Code Library</h4>-->
													</div >
													<div class="panel-body">
														<p>
															<img src=" <?php echo base_url(); echo $row->picture ?>" class="img-circle pull-left">
															<div>
																<a href="<?php echo site_url('friend_control/index/'.$row->id_user) ?>" style="padding-left:1cm;"> <b> <?php echo $row->name ?> </b></a>
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
										<?php } ?>
									</div>
								</div><!-- /col-9 -->
							</div><!-- /padding -->
						</div>
						<!-- /main -->

					</div>
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
					$.ajax({
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
