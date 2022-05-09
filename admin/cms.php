<?php
	session_start();
    include_once('../includes/_connect.php');
    include_once('_authcheck.php');
?>
<?php
	//SAVE UPDATED PAGE
	if(isset($_POST["cid"]))
	   {
		   $cid = mysqli_real_escape_string($db_connect, $_POST["cid"]);
		   $content = mysqli_real_escape_string($db_connect, $_POST["content"]);
			$id = $_SESSION['userid'];
		   $sql = "UPDATE `tblCMS` SET `content` = '$content', `userUpdated` = $id WHERE `tblCMS`.`cid` = $cid;";
		   $run = mysqli_query($db_connect, $sql);
		   //echo "content saved";
	   }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Lato&display=swap" rel="stylesheet">
    <script src="../includes/ckeditor/ckeditor.js"></script>
    <link href="../res/stylesheets/styles.css" rel="stylesheet" type="text/css">
    <title>Admin Control || Hazel Photography</title>
</head>
<body class="blackbg">
    <header>
        <nav>
            <ul>
                <li class="no-pad"><img src="../res/images/logo-1.png"></li>
                <li class="right"><a href="../contact.php">Contact</a></li>
                <li class="right"><a href="../gallery.php">Gallery</a></li>
                <li class="right"><a href="../services.php">Services</a></li>
                <li class="right"><a href="../about.php">About</a></li>
                <li class="right"><a href="../index.php">Home</a></li>

            </ul>
        </nav>
    </header>

    <div id="container">
        <section id="AboutSectionHead">
            <h1 id="AboutTitle">Admin</h1>
        </section>
        <section id="AboutSectionContent" class="no-pad">
			<?php
    	$sql = "SELECT * FROM `tblCMS`";
    	$run = mysqli_query($db_connect,$sql);
	?>
	<!-- Select page -->
	<form action="#" method="GET">
		<select name="cid" required onchange="this.form.submit()">
			<option value="" selected>-- Pick One --</option>
			<?php while($content = mysqli_fetch_assoc($run)){
			?>
			<option value="<?php echo $content['cid']?>"><?php echo $content['element']?></option>
			<?php } ?>
		</select>
	</form>	
	
	
	
	<?php
		if(!isset($_GET["cid"])){
	?>
		<form method="POST" action="#">
			<?php
				$cid = $_GET["cid"];
				$sql = "SELECT * FROM `tblCMS` WHERE `cid` = $cid";
				$run = mysqli_query($db_connect,$sql);
				$content = mysqli_fetch_assoc($run);
			?>
			<input type="hidden" name="cid" value=0>
			<h2>Page: No page selected</h2>
			<textarea disabled style="width:80%;" id="EDITOR" name="content">
				Please select a page to start editing!
			</textarea>
			<script>
				CKEDITOR.replace("EDITOR");
			</script>
			<button disabled type="submit">Submit</button>
		</form>
	<?php
		} else {
	?>
		<form method="POST" action="#">
			<?php
				$cid = $_GET["cid"];
				$sql = "SELECT * FROM `tblCMS` WHERE `cid` = $cid";
				$run = mysqli_query($db_connect,$sql);
				$content = mysqli_fetch_assoc($run);
			?>
			<input type="hidden" name="cid" value=<?php echo $content['cid'];?>>
			<h2>Page: <?php echo $content['element'];?></h2>
			<textarea style="width:80%;" id="EDITOR" name="content"><?php
				echo $content['content'];
			?></textarea>
			<script>
				CKEDITOR.replace("EDITOR");
			</script>
			<button type="submit">Submit</button>
		</form>
	<?php
		}
	?>
	
        </section>
    </div>

    <footer id="homeFooter">
        <p>Copyright Hazel Photography 2021</p>

    </footer>
</body>
</html>