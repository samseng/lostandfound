<?php
session_start();
$_SESSION['title'] = $_POST['itemname'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Lost & Found-Search Page</title>
		<link href="searchpage.css" type="text/css" rel="stylesheet" />
		<link href="img/favicon.png" type="image/png" rel="shortcut icon" />
	</head>

	<body>
		<div class="searchbar">
			<form method='POST' action='searchpage.php'>
			<img src="img/smalllogo.png" alt="logo" />
			<input class="searchbox" type="text" name="name" placeholder="Search for missing item" />
			<input type="submit" value="Go!" style="width:100px;"/>
		</div>
			</form>
			<?php
			$_SESSION['title'] = $_POST['name'];
			?>
		<div class="banner">
			<img src="img/logo.png" alt="logo" />
			<h1>Lost & Found</h1>
			<h6>ONLINE CENTER</h6>
		</div>

	<div class="overall">

	<div class="categories">
		<h1>Categories</h1>
		<ul>
    		<li><a href="">Electronics</a></li>
    		<br/>
    		<li><a href="">Bags</a></li>
    		<br/>
    		<li><a href="">Books</a></li>
    		<br/>
    		<li><a href="">Others</a></li>
		</ul>
	</div>

	<div class="display">

		<div class="section1">
			results for "<?= $_SESSION['title']?>"
		</div>

		<div class="section2">
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
	 $sql="SELECT * FROM post";
 	$result_set=mysqli_query($conn,$sql);
	//get maximum post rows
 	$num_rows = mysqli_num_rows($result_set);
	//get number of page if each page has 6 items
 	$num_pages = ceil($num_rows / 6);
 	$x = 1;
	//get[page] is from the below area since the below past the page as php?=page...
 	if(isset($_GET['page'])){
 		$x = $_GET['page'];
 	}	
		//get from database the page_number*6-6 to page_number*6(e.g. 0-5,5-11,etc.) 
 		$max = $x*6;
 		$min = $max - 6;
		//select image from that range
 		$sqlalt = "SELECT * FROM item WHERE id in(SELECT image_id FROM post WHERE post_id <=".$max. "&& post_id>".$min. ") AND title LIKE '%".$_SESSION['title']."%';";
 		$result=mysqli_query($conn,$sqlalt);
 		while($row=mysqli_fetch_assoc($result))
 	{
 	 	?>
 	<div class='image'>
	<!--print image-->
        <img src="post/<?php echo $row['image'] ?>" width="50" height="350" target="_blank" />
        <p class='title'>Title:<?php echo $row['title'] ?></p>

        <?php
	//print id
        $sql = "SELECT * FROM uploader WHERE id in(SELECT uploader_id FROM post WHERE image_id=".$row['id']. ")";
 		$result2=mysqli_query($conn,$sql);
 		while($row2=mysqli_fetch_assoc($result2)) 
 		{
 			?>
 	<!--print contact no-->
        <p class='contact no'>Contact No:<?php echo $row2['contact_no']?></p>

        </div> 
        

        <?php
    }
         
 }

 mysqli_close($conn);
 ?>
		</div>

	</div>
	<!-- make a pager/page number-->
	<div class="pageno">
		<?php
	$current = $x;
	$before = $x -1;
	if($before > 0){
	$link = 'searchpage.php?page='.$before; }else{
		$link = 'searchpage.php?page=1';
	} ?>
  <a href="<?= $link ?>">&laquo;</a><?php
  $pagLink = "<div class='pagination'>";  
	for ($i=1; $i<=$num_pages; $i++) {  
             $pagLink .= "<a href='searchpage.php?page=".$i."'>".$i." "."</a>";  
};  
echo $pagLink . "</div>"; 

	$current = $x;
	$next = $x +1;
	if($next < $num_pages){
	$nextlink = 'searchpage.php?page='.$next; }else{
		$nextlink = 'searchpage.php?page='.$num_pages;
	} 
?><a href="<?= $nextlink ?>">&raquo;</a>
	</div>

	</body>

	</html>
