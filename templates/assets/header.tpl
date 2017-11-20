<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>${TITLE_PAGE}</title>
	<!-- Bootstrap Core CSS -->
	<link href="./templates/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- MetisMenu CSS -->
	<link href="./templates/assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
	<!-- DataTables CSS -->
	<link href="./templates/assets/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
	<!-- DataTables Responsive CSS -->
	<link href="./templates/assets/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="./local/css/custom-css.css" rel="stylesheet">
	<link href="./templates/assets/dist/css/sb-admin-2.css" rel="stylesheet">
	<!-- Custom Fonts -->
	<link href="./templates/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="./templates/assets/styles/styles.css" rel="stylesheet">
	<link href="./templates/assets/styles/css/uploadfile.css" rel="stylesheet">
	<link href="./templates/assets/styles/jquery-ui-1.8.16.custom.css" rel="stylesheet">
	<script src="./js/jquery.min.js"></script>
	<script src="./templates/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="./js/jquery.hide_alertblock.js"></script>
	<script src="./js/jquery.cookie.js"></script>
	<script src="./templates/assets/vendor/metisMenu/metisMenu.js"></script>
</head>
<body>



<div id="wrapper" class="body">
	<!-- Navigation -->
	<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
		<!-- /.navbar-header -->
			<ul class="nav navbar-top-links navbar-right">
				<!-- /.dropdown -->

				<li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i> </a>
					<ul class="dropdown-menu dropdown-user">
						<li><a href="./?t=accounts"><i class="fa fa-user fa-fw"></i> ${ACCOUNT_LOGIN}</a></li>
						<li class="divider"></li>
						<li><a href="./?t=logout"><i class="fa fa-sign-out fa-fw"></i> Выйти</a> </li>
					</ul>
					<!-- /.dropdown-user -->
				</li>
				<!-- /.dropdown -->
			</ul>
			<ul class="nav top_nav" id="side-menu">
						<li><a <!-- IF '${ACTIVE_MENU}' == '' -->class="active"<!-- END IF -->	href="./" title="Цены"><i class="fa fa-dollar"></i> Цены</a></li>
						<li><a <!-- IF '${ACTIVE_MENU}' == 'cars' -->class="active"<!-- END IF -->	href="./?t=cars" title="Автомобили"><i class="fa fa-car"></i> Автомобили</a></li>
						<li><a <!-- IF '${ACTIVE_MENU}' == 'shops' -->class="active"<!-- END IF -->	href="./?t=shops" title="Автосалоны"><i class="fa fa-shopping-cart"></i> Автосалоны</a></li>
						<!-- IF '${ACCOUNT_ROLE}' == 'admin' -->
						<li><a	<!-- IF '${ACTIVE_MENU}' == 'accounts' -->class="active"<!-- END IF -->	href="./?t=accounts" title="Учётные записи"><i class="fa fa-group"></i> Учётные записи</a></li>
						<!-- END IF -->
			</ul>
	</nav>
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">${TITLE}</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<!-- IF '${SYS_ERROR_MSG}' != '' -->
				<div class="alert alert-danger alert-dismissable" id="alert_error_block">
					<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
					<h4 class="alert-heading">${STR_ERROR}!</h4>
					<span>${SYS_ERROR_MSG}</span>
				</div>
				<!-- END IF -->
				<div class="alert alert-danger alert-dismissable" id="alert_error_block" style="display:none;">
					<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
					<h4 class="alert-heading">${STR_ERROR}!</h4>
					<span id="alert_error_msg">${PAGE_ALERT_ERROR_MSG}</span>
				</div>
				<!-- IF '${ALERT_EXPIRE_LICENSE_MSG}' != '' -->
				<div class="alert alert-warning alert-dismissable">
					<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
					<h4 class="alert-heading">${STR_WARNING}!</h4>
					<span>${ALERT_EXPIRE_LICENSE_MSG}</span>
				</div>
				<!-- END IF -->
				<div class="alert alert-warning alert-dismissable" id="alert_msg_block" style="display:none;">
					<button class="close" aria-hidden="true" data-dismiss="alert" onClick="$.cookie('alertshow', 'no');" type="button">×</button>
					<h4 class="alert-heading">${STR_WARNING}!</h4>
					<span id="alert_warning_msg">${PAGE_ALERT_WARNING_MSG}</span>
				</div>