<?php
  		$host = "localhost";
        $dbusername = "root";
        $password = "";
        $dbname = "Fem";
        $table = "posts";
        $conn = new mysqli($host,$dbusername,$password,$dbname);
        if(mysqli_connect_error()){
            die('Connect Error('.mysqli_connect_errorno().')'. mysqli_connect_error());}
        else{
		$query = "SELECT * FROM posts WHERE posttype LIKE 'Discussion' ORDER BY postid DESC";
		$result = mysqli_query($conn,$query);}
?>


<!DOCTYPE html>
<html>
<head>
	<title> Discussion </title>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="dis2.css"> 
<script src="https://kit.fontawesome.com/753523fc2b.js"></script> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

	<div class="dropdown">
    	<button class="dropbtn">
    		 <i class="fas fa-angle-down" ></i>
   		</button>
   		<div class="dropdown-content">
      		<a href="../Profile/profile.html">Profile</a>
      		<a href="../logout.php">Logout</a>
  		</div>
  	</div>

	<div class="nav_bar">
		<a href="../Contact/Contact.html"> Contact us </a>
		<a href="../Tools/ToolsIndex.php"> Tools </a>
		<a class = "active" href="../Discussion/DisIndex.php"> Discussion </a>
        <a href = "../Home/homepage.html"> Home </a>		
	</div>	

    <div class="search_bar">
        <form action = "/dis.php">
     <input type="text" placeholder="Search for a post" name="search">
        <button type="submit"><i class="fas fa-search"></i></button>
    </form>
    </div>

    
    <div class="core">
        <a href="#"> Recent Posts </a>
        <button id="myBtn" class="btn"><i class="fas fa-pen"></i>Create your own post</button>
        </div>
    <form action= "Dis.php" method="POST"> 
    <div id="myModal" class="modal">

  <!-- Modal content -->
       
  <div class="modal-content">
    <span class="close">&times;</span>
    	<select name="PostType">
				<option>Select Post type</option>
				<option value="Discussion">Discussion</option>
				<option value="SellPost">Sellpost</option>
			</select>
      <input type="text" name="title" placeholder="Title" maxlength="60">
     <textarea class="descript" rows="50" cols="60" name="Description" placeholder="Description"></textarea>
      <button id=btn type="submit">Submit</button>
  </div>
</div>
</form>
<?php while($row = mysqli_fetch_assoc($result)){ ?>
<div class="post_list">
  		<div class="article">
			<h1> <?php echo $row['title']; ?> </h1>
			<div class="article_info"> posted by
				<?php echo $row['userid'];?>
			 on <?php echo $row['createdat'];?>
			</div> <p> <?php echo $row['description'];?> </p>
			</div>
		<?php }?>
</div>
<script type="text/javascript" src="dis.js"></script>
       
</body>
</html>