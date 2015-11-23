<!DOCTYPE html>
<html>
	<head>
		<title>HansKD - Ask Help</title>
		<link href="<?php echo base_url();?>asset/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url();?>asset/foundation/css/foundation.min.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url();?>asset/foundation/css/normalize.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url();?>asset/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="<?php echo base_url();?>asset/home/css/styles.css" rel="stylesheet" type="text/css"/>

	</head>
	<body>
	<div class="column col-sm-10 col-xs-12" id="main">
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
                    <form class="navbar-form navbar-left" action="<?=site_url('home_control/search')?>" method="post">
                        <div class="input-group input-group-sm" style="max-width:360px;">
							<input type="text" class="form-control" placeholder="Search" name="search-term" id="srch-term">
							<div class="input-group-btn">
								<button class="btn btn-default" type="submit" name="searchForm" value="searchForm"><i class="glyphicon glyphicon-search"></i></button>
							</div>
                        </div>
                    </form>
                    <ul class="nav navbar-nav">
                      <li>
                        <a href="#"><i class="glyphicon glyphicon-home"></i> Home</a>
                      </li>
                      <li>
                        <a href="#postModal" role="button" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Post</a>
                      </li>
                      <li>
                        <a href="#"><span class="badge">badge</span></a>
                      </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
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
				<div class="full col-sm-10 col-xs-12 col-md-12">
					<div class="row">
						<div class="container-fluid" style="margin-top:2em">
							<div class="row">
								<div class="form-group-sm">
									<input type="text" class="form-control input-md" id="title" name="title" placeholder="Add a title" required="true">
								</div>
								<div class="form-group-sm">
									<input type="text" class="form-control input-md" id="title" name="title" placeholder="Add a title" required="true">
								  </div>
							</div>
							  
							<div class="row">
								
								<div class="btn-group" style="margin-top:1em">
									<button type="button" class="btn btn-sm btn-danger">Help Type</button>
									<button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									  <span class="caret"></span>
									  <span class="sr-only">Toggle Dropdown</span>
									</button>
									<ul class="dropdown-menu">
									  <li><a href="#">Car Broke Down</a></li>
									  <li><a href="#">Health Issue</a></li>
									  <li><a href="#">Magang Issues</a></li>
									  <li role="separator" class="divider"></li>
									  <li><a href="#">Other</a></li>
									</ul>
								</div>
								
								<div class="row">
									<div class="col-md-3"> 
										<div class="range-slider round" data-slider data-options="start: 1; end: 3;">
											<span class="range-slider-handle" role="slider" tabindex="0"></span>
											<span class="range-slider-active-segment"></span>
											<input type="hidden">
										</div>
									</div>
								</div>
								
								<div class="form-group" style="margin-top:1em">
									<textarea class="form-control" rows="10" id="desc" placeholder="Help Description"></textarea>
								</div>
								
								<div class="col-md-6">
								  MAP DISINI
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>
				
		<script src="<?php echo base_url();?>asset/js/jquery-2.1.4.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>asset/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>asset/home/js/scripts.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>asset/foundation/js/foundation.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>asset/foundation/js/foundation/foundation.slider.js" type="text/javascript"></script>

		<script>
		  $(document).foundation();
		</script>
	</body>
</html>
