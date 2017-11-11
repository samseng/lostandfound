<!DOCTYPE html>
<head>
	<title>Upload Form</title>
	<link rel="stylesheet" type="text/css" href="upload.css" />
	<link href="img/favicon.png" type="image/png" rel="shortcut icon" />
</head>

<body>
		<div class="section1">
			<img src="img/logo.png" alt="logo" />
			<h1>Lost & Found</h1>
			<h6>ONLINE CENTER</h6>
		</div>

		<div class="overall">
		<div class="floatright">

		<div class="Title">
			<img src="img/favicon.png" alt="logo" />Forms
		</div>

		<div class="form-section">
			<p>Please fill in this details properly.</p>
			<form action="view.php" method="post" enctype="multipart/form-data">
				<div id='form'>
				<ul>
				<li>Choose image file:</li>
				<input type="file" name="file" accept=".jpg, .jpeg, .png, .gif" /> </br>
				<li>Item Name :</li>
				<input type="text" name="item" size="20" maxlength="15" placeholder="Title"/>
				<li>Contact No : </li>
				<input type="text" name="no" size="20" maxlength="15" placeholder="Phone Number/Email"/>
				<li>Category : </li>
				<select name="tag">
  				<option selected="selected">Electronics</option>
  				<option>Bags/Purse</option>
  				<option>Clothes</option>
  				<option>Books</option>
  				<option>Others</option>
				</select>
				</ul>
				<div id="submitbutton">
				<input type="submit" name="upload" value="Upload" />	
				</div>
				</div>
			</form>
		</div>

	</div> <!-- Float right end -->
		</div>
</body>
</html>
