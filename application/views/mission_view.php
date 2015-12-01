<html>
	<head>
		<title> HelpMe - Mission </title>
		<link rel="shortcut icon" type="image/png" href=" <?php echo base_url();?>asset/favicon.jpg"/>
		<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
		<link href="<?php echo base_url();?>asset/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url();?>asset/login/css/my_styles.css" rel="stylesheet" type="text/css"/>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="<?php echo base_url();?>asset/home/css/styles.css" rel="stylesheet" type="text/css"/>
	</head>
	<style>

	body{
		background:#eee;
	}
	.main-box.no-header {
		padding-top: 20px;
	}
	.main-box {
		background: #FFFFFF;
		-webkit-box-shadow: 1px 1px 2px 0 #CCCCCC;
		-moz-box-shadow: 1px 1px 2px 0 #CCCCCC;
		-o-box-shadow: 1px 1px 2px 0 #CCCCCC;
		-ms-box-shadow: 1px 1px 2px 0 #CCCCCC;
		box-shadow: 1px 1px 2px 0 #CCCCCC;
		margin-bottom: 16px;
		-webikt-border-radius: 3px;
		-moz-border-radius: 3px;
		border-radius: 3px;
	}
	.table a.table-link.danger {
		color: #e74c3c;
	}
	.label {
		border-radius: 3px;
		font-size: 0.875em;
		font-weight: 600;
	}
	.user-list tbody td .user-subhead {
		font-size: 0.875em;
		font-style: italic;
	}
	.user-list tbody td .user-link {
		display: block;
		font-size: 1.25em;
		padding-top: 3px;
		margin-left: 60px;
	}
	a {
		color: #3498db;
		outline: none!important;
	}
	.user-list tbody td>img {
		position: relative;
		max-width: 50px;
		float: left;
		margin-right: 15px;
	}

	.table thead tr th {
		text-transform: uppercase;
		font-size: 0.875em;
	}
	.table thead tr th {
		border-bottom: 2px solid #e7ebee;
	}
	.table tbody tr td:first-child {
		font-size: 1.125em;
		font-weight: 300;
	}
	.table tbody tr td {
		font-size: 0.875em;
		vertical-align: middle;
		border-top: 1px solid #e7ebee;
		padding: 12px 8px;
	}
	</style>
	<hr>
	<body>
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
			<!--AKHIR-->
			<div class="padding">
				<div class="panel panel-info">
					<div class="panel-heading">
						<div class="well">
							<h4>My Mission List</h4>
							<?php foreach ($list->result() as $row)
							{ ?>
								<?php if ($row->type == 'urgent'): ?>
									<div class="panel panel-danger">
								<?php elseif ($row->type == 'medium'): ?>
									<div class="panel panel-warning" >
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
											<font color="grey" size=2 style="padding-left:1cm;"> <?php echo $row->accept_date ?> </font>
											<div style="padding-top:10">
												<?php if ($row->type == 'urgent'): ?>
													<span class="label label-danger" style="margin-left:1cm">Urgent</span>
												<?php elseif ($row->type == 'medium'): ?>
													<span class="label label-warning" style="margin-left:1cm">Medium</span>
												<?php else: ?>
													<span class="label label-success" style="margin-left:1cm">Easy</span>
												<?php endif; ?>
												<div style="padding-top:15; padding-left:9%">
													<select id="mySelect_<?php echo $row->id_marker; ?>">
														  <option value="" disabled selected hidden><?php echo $row->request_stat; ?></option>
														  <option>taken</option>
														  <option>failed</option>
														  <option>accomplished</option>
													</select>
												</div>
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
							<br/>
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
						url: "<?php echo site_url('mission_control/approve_request/"+id+"'); ?>",
						data: {},
						success: function(){ location.reload(); },
					});
				}
				else if(type == 'delete')
				{
					$.ajax({
						type: "POST",
						url: "<?php echo site_url('mission_control/remove_friend_request/"+id+"'); ?>",
						data: {},
						success: function(){ location.reload(); },
					});
				}
			});
		</script>
		<script>
			$('select').on('change', function() {
				var full_id = this.id;
				var temp = full_id.split("_");
				var id = temp[1];
				var type = this.value;
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('mission_control/change_status/"+id+"/"+type+"'); ?>",
					data: {},
					success: function(){ location.reload(); },
				});
			});
		</script>
	</body>
</html>
