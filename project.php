<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Lost & Found</title>
		<link href="project.css" type="text/css" rel="stylesheet" />
		<link href="img/favicon.png" type="image/png" rel="shortcut icon" />
	</head>

	<body>
		<div class="banner">
			<img src="img/smalllogo.png" alt="logo" />
			<input class="searchbox1" type="text" name="itemname" placeholder="Search for missing item" />
			<input type="submit" value="Go!" style="width:100px;"/>
		</div>

		<div class="section1">
			<img src="img/logo.png" alt="logo" />
			<h1>Lost & Found</h1>
			<h6>ONLINE CENTER</h6>
		</div>

	<div class="overall">

	<div class="floatleft">
		<div class="section2">
			Upload missing item
		</div>

		<div class="section3">
			<form action="upload.php" method="post">
			Someone lost their item? Announce it here by using our service.
			<input class="submitbutton1" type="submit" value="Upload item" />
			</form>
		</div>

		<div class="section4">
			Claimed item
		</div>

		<div class="section5">
			<form action="delete.php" method="post">
			Item has been claimed?
			<input class="searchbox2" type="text" name="studentnumber" placeholder="Student number" />
			<input class="submitbutton2" type="submit" value="Search item" />
			</form>
		</div>

	</div> <!-- float left end -->

	<div class="floatright">

		<div class="section6">
			Recent Uploads
		</div>

		<div class="section7">
			<img src="example1.jpg" alt="exampleno1" />
			<img src="example2.jpg" alt="exampleno2" />
		</div>

	</div> <!-- Float right end -->

	</div> <!--overall end -->
	<hr/>

	</body>

	</html>
