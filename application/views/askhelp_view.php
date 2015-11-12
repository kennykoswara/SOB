<!DOCTYPE html>
<html>
	<head>
		<title>HansKD - Ask Help</title>
		<link href="<?php echo base_url();?>asset/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>asset/foundation/css/foundation.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>asset/foundation/css/normalize.css" rel="stylesheet" type="text/css"/>
	</head>
  <body>
    <div class="container-fluid" style="margin-top:2em">
      <div class="row">
        <div class="form-group-sm">
          <div class="col-md-3">
            <input type="text" class="form-control input-md" id="title" name="title" placeholder="Add a title" required="true">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-2">
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
        </div>

        <div class="col-md-3">
          <div class="range-slider round" data-slider data-options="start: 1; end: 3;">
            <span class="range-slider-handle" role="slider" tabindex="0"></span>
            <span class="range-slider-active-segment"></span>
            <input type="hidden">
          </div>
        </div>

        <div class="col-md-6" style="margin-top:1em">
          <div class="form-group-sm">
            <input type="text" class="form-control input-md" id="title" name="title" placeholder="Add a title" required="true">
          </div>
        </div>
      </div>


      <div class="row">
        <div class="form-group" style="margin-top:1em">
          <div class="col-md-6">
            <textarea class="form-control" rows="10" id="desc" placeholder="Help Description"></textarea>
          </div>
        </div>

        <div class="col-md-6">
          MAP DISINI
        </div>
      </div>
    </div>




    <script src="<?php echo base_url();?>asset/js/jquery-2.1.4.min.js" type="text/javascript"></script>
	  <script src="<?php echo base_url();?>asset/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>asset/foundation/js/foundation.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>asset/foundation/js/foundation/foundation.slider.js" type="text/javascript"></script>

    <script>
      $(document).foundation();
    </script>

  </body>
</html>
