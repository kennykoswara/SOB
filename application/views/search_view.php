<html>
	<head>
		<title> Search Page </title>
		<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
		<link href="<?php echo base_url();?>asset/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url();?>asset/login/css/my_styles.css" rel="stylesheet" type="text/css"/>
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
		<div class="container bootstrap snippet">
			<div class="row">
				<div class="col-lg-12">
					<div class="main-box no-header clearfix">
						<div class="main-box-body clearfix">
							<div class="table-responsive">
								<table class="table user-list">
									<thead>
										<tr>
										<th><span>User</span></th>
										<th><span>Created</span></th>
										<th class="text-center"><span>Status</span></th>
										<th><span>Email</span></th>
										<th>&nbsp;</th>
										</tr>
									</thead>
									<tbody>
										<?php
											foreach ($other_user->result() as $row)  
											{ ?>
												<tr>
													<td>
														<img src="http://bootdey.com/img/Content/user_1.jpg" alt="">
														<a href="#" class="user-link"><?php echo $row->username;?></a>
														<span class="user-subhead">Member</span>
													</td>
													<td>2013/08/12</td>
													<td class="text-center">
														<?php $count_friend =0; 
														foreach($check_friend->result() as $approval_column)
														{
															if($approval_column->id == $row->id && $approval_column->approval == 'pending' && $count_friend == 0) 
															{ ?>
																<span class="label label-default">pending</span>
															<?php $count_friend++;
															} else if ($approval_column->id == $row->id && $approval_column->approval == 'approved' && $count_friend == 0){ ?>
																<span class="label label-default">friend</span>
															<?php $count_friend++;
															}
														} ?>
													</td>
													<td>
														<a href="#"> <?php echo $row->email; ?> </a>
														<?php $counter=0; 
														foreach($check_friend->result() as $column)
														{
															if($column->id != $row->id)
																continue;
															else 
																$counter++;
														} 
														if($counter==0)
														{
															echo form_open('home_control/request_friend/'.$row->id);?>
																	<span><button class="label label-default" type="submit" name="submitForm" value="signup" id="signup"><b>Send Friend Request</b></button></span>
																</form>
														<?php }
															
															?>
													</td>
													<td style="width: 20%;">
														<a href="#" class="table-link">
															<span class="fa-stack">
																<i class="fa fa-square fa-stack-2x"></i>
																<i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
															</span>
														</a>
														<a href="#" class="table-link">
															<span class="fa-stack">
																<i class="fa fa-square fa-stack-2x"></i>
																<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
															</span>
														</a>
														<a href="#" class="table-link danger">
															<span class="fa-stack">
																<i class="fa fa-square fa-stack-2x"></i>
																<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
															</span>
														</a>
													</td>
												</tr>
											<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>