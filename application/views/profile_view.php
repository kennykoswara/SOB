<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>HansKD - Home</title>
  <meta name="generator" content="Bootply" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="<?php echo base_url();?>asset/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <!--[if lt IE 9]>
  <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <link href="<?php echo base_url();?>asset/home/css/styles.css" rel="stylesheet" type="text/css"/>
  <style>
  .rating {
    unicode-bidi: bidi-override;
    direction: rtl;
  }
  .rating > span {
    display: inline-block;
    position: relative;
    width: 1.1em;
  }
  .rating > span:hover:before,
  .rating > span:hover ~ span:before {
    content: "\2605";
    position: absolute;
  }
  </style>
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
          <!-- /top nav -->

          <div class="padding">
            <div class="full col-sm-9">

              <!-- content -->
              <div class="row">

                <!-- main col left -->
                <div class="col-sm-5">
                  <div class="panel panel-success">
                    <div class="panel-heading">
                      Name
                    </div>
                    <div class="panel-body">
                      <div class="col-md-4">
                        <img src="http://placehold.it/150x150">
                      </div>
                      <div class="col-md-offset-1 col-md-7">
                        <p>
                          E-mail :
                        </p>
                        <p>
                          Specification :
                        </p>
                        <p>
                          Area :
                        </p>
                        <p>
                          Helpful Rate :
                        </p>
                        <div class="rating" style="float:left">
                          <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>

                <!-- main col right -->
                <div class="col-sm-7">
                  <div class="panel panel-danger">
                    <div class="panel-heading">
                      Kalau penting
                    </div>
                    <div class="panel-body">
                      Penting bang!!!
                    </div>
                  </div>

                  <div class="panel panel-warning">
                    <div class="panel-heading">
                      Gak terlalu penting
                    </div>
                    <div class="panel-body">
                      Serah mau bantu ap kgk
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
  </body>
  </html>
