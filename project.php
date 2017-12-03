<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Lost & Found</title>
		<link href="p.css" type="text/css" rel="stylesheet" />
		<link href="img/favicon.png" type="image/png" rel="shortcut icon" />
	</head>

	<body>
		<div class="banner">
			//input search and will link to another page
			<form method='POST' action='searchpage.php'>
			<img src="img/smalllogo.png" alt="logo"/> 
			<input class="searchbox1" type="text" name="itemname" placeholder="Search for missing item" />
		<!-- Some changes here -->
			<input type='submit' value='Go' style="width:100px;" d='submitbutton1'>
			</form>
			
		<!--<input type="button" value="Go!" style="width:100px;"/> -->
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
			Someone lost their item? Announce it here by using our service.
		<!--function to allow button to link to other pages-->
			<script>
				function visitPage(link){
					window.location=link;
				}
			</script>
		<button class="submitbutton1" onclick="visitPage('upload2.php');">Upload Item</button>
		<!--	<input class="submitbutton1" type="button" value="Upload item" /> -->
		</div>

		<div class="section4">
			Claimed item
		</div>

		<div class="section5">
			Item has been claimed?
			<input class="searchbox2" type="text" name="studentnumber" placeholder="Student number" />
			<!-- Some changes here as we;; -->
			<button class="submitbutton2"onclick="visitPage('delete.php');">Search Item</button>
		<!--	<input class="submitbutton2" type="button" value="Search item" /> -->
		</div>

	</div> <!-- float left end -->

	<div class="floatright">

		<div class="section6">
			Recent Uploads
		</div>

		<div class="section7">
			<?php
	$username="root";
	$password="root";
	$database="lnf";
	$conn = mysqli_connect("localhost", $username, $password,$database);

	if (!$conn) {
       die("Connection failed: " . mysqli_connect_error());
    }
	if(isset($_POST['submit'])){

	}
	//database section -- printing image,title, and contact no.
	//get the latest post and limit it by 3-display latest image
	 $sql="SELECT * FROM post ORDER BY date DESC LIMIT 3";
 	$result_set=mysqli_query($conn,$sql);
 	while($row3 = mysqli_fetch_assoc($result_set)){
 		$id_img[] = $row3['image_id'];
 	}
 	foreach($id_img as $img){
 		$sqlalt = "SELECT * FROM item WHERE id=".$img;
 		$result=mysqli_query($conn,$sqlalt);
 		while($row=mysqli_fetch_assoc($result))
 	{
 	 	?>
 	 	<div class='image'>
        <img src="post/<?php echo $row['image'] ?>" width="50" height="350" target="_blank" />
        <p>Date uploaded:</p>
        <?php
        $sql = "SELECT * FROM post WHERE image_id=".$row['id'];
 		$result2=mysqli_query($conn,$sql);
 		while($row2=mysqli_fetch_assoc($result2)) 
 		{
 			echo $row2['date'];
 			?>
        </div>
        <?php
    }
    }
 }

 mysqli_close($conn);
 ?>
		</div>

	</div> <!-- Float right end -->

	</div> <!--overall end -->
	<hr/>

	</body>

	</html>
