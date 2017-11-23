<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>${TITLE}</title>
	<link href="./bootstrap.min.css" rel="stylesheet">
	<link href="./style.css" type="text/css" rel="stylesheet" />
	<script type="text/javascript" src="./js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="./js/script.js"></script>
</head>
<body>

<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="collapse navbar-collapse" id="navbar-main">
			<ul class="nav navbar-nav">
			<li><a <!-- IF '${ACTIVE_MENU}' == '' -->class="active"<!-- END IF --> href="./">Создание проекта</a></li>
			<li><a <!-- IF '${ACTIVE_MENU}' == 'final' -->class="active"<!-- END IF --> href="./?t=final">Проекты</a></li>
			</ul>
		</div>
	</div>
</nav>