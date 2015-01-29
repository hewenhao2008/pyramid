<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>请选择你需要登陆的用户</title>
	<meta id="viewport" name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,minimal-ui">
	<style>
		body,html {
			width: 100%;
			margin: 0;
			padding: 0;
		}
		#main div {
			width: 40%;
			float: left;
			margin: 10px;
		}

		h2 {
			color: orange;
		}

	</style>
</head>
<body>
	<center><h2>用户选择</h2></center>
	<div id="main">
	<div>
		<a href="{{url('loginPro',['Walt'])}}">
			<img src="http://182.92.185.246/Other/portraits/Walt.jpg" alt="" width="100% ">
		</a>
		<center><span>Walt</span></center>
	</div>
	
	<div>
		<a href="{{url('loginPro',['Jesse'])}}">
			<img src="http://182.92.185.246/Other/portraits/Jesse.jpg" alt="" width="100% ">
		</a>
		<center><span>Jesse</span></center>
	</div>

	<div>
		<a href="{{url('loginPro',['Skyler'])}}">
			<img src="http://182.92.185.246/Other/portraits/Skyler.jpg" alt="" width="100% ">
		</a>
		<center><span>Skyler</span></center>
	</div>

	<div>
		<a href="{{url('loginPro',['Hank'])}}">
			<img src="http://182.92.185.246/Other/portraits/Hank.jpg" alt="" width="100% ">
		</a>
		<center><span>Hank</span></center>
	</div>

	<div>
		<a href="{{url('loginPro',['Marie'])}}">
			<img src="http://182.92.185.246/Other/portraits/Marie.jpg" alt="" width="100% ">
		</a>
		<center><span>Marie</span></center>
	</div>

	<div>
		<a href="{{url('loginPro',['Saul'])}}">
			<img src="http://182.92.185.246/Other/portraits/Saul.jpg" alt="" width="100% ">
		</a>
		<center><span>Saul</span></center>
	</div>

	<div>
		<a href="{{url('loginPro',['Mike'])}}">
			<img src="http://182.92.185.246/Other/portraits/Mike.jpg" alt="" width="100% ">
		</a>
		<center><span>Mike</span></center>
	</div>

	<div>
		<a href="{{url('loginPro',['Gus'])}}">
			<img src="http://182.92.185.246/Other/portraits/Gus.jpg" alt="" width="100% ">
		</a>
		<center><span>Gus</span></center>
	</div>

	<div>
		<a href="{{url('loginPro',['Walter'])}}">
			<img src="http://182.92.185.246/Other/portraits/Walter.jpg" alt="" width="100% ">
		</a>
		<center><span>Walter</span></center>
	</div>
	</div>
</body>
</html>