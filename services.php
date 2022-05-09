<?php
    include_once('includes/_connect.php');
    //Services Text
    $sql = "SELECT `tblCMS`.`content` FROM `tblCMS` WHERE `cid` = 3";
    $run = mysqli_query($db_connect,$sql);
    $content = mysqli_fetch_assoc($run);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Lato&display=swap" rel="stylesheet">
    <link href="res/stylesheets/styles.css" rel="stylesheet" type="text/css">
    <title>Services || Hazel Photography</title>
		<?php
		include_once('includes/stattrack.php');
	?>
</head>
<body class="blackbg servicesBody">
    <header>
        <nav>
            <ul>
                <li class="no-pad"><img alt="Hazel Company Logo" src="res/images/logo-1.png"></li>
                <li class="right"><a href="contact.php">Contact</a></li>
                <li class="right"><a href="gallery.php">Gallery</a></li>
                <li class="right"><a href="#" class="active">Services</a></li>
                <li class="right"><a href="about.php">About</a></li>
                <li class="right"><a href="index.php">Home</a></li>

            </ul>
        </nav>
    </header>

    <section id="container">
        <div id="AboutSectionHead">
            <h2 id="AboutTitle">Services We Provide</h2>
        </div>
        <div id="AboutSectionContent" class="no-pad">
			<?php
				echo $content['content'];
			?>
			<div class="servicesTable">
				<div>
					<img class="servimg" alt="A group of people climbind a mountain with ropes and trees" src="res/images/serv1.jpg">
					<img class="servimg" alt="A jetty at sunset with overcast sky" src="res/images/serv2.jpg">
					<img class="servimg" alt="A pier with a roofed end at the ocean side with crisp blue water" src="res/images/serv3.jpg">						
				</div>
				<div>
					<div class="servimg">
					<?php
						//Services Text
    					$sql = "SELECT `tblCMS`.`content` FROM `tblCMS` WHERE `cid` = 4";
    					$run = mysqli_query($db_connect,$sql);
    					$content = mysqli_fetch_assoc($run);
						echo $content['content'];
					?>
					</div>
					<div class="servimg">
					<?php				
						//Services Text
    					$sql = "SELECT `tblCMS`.`content` FROM `tblCMS` WHERE `cid` = 5";
    					$run = mysqli_query($db_connect,$sql);
    					$content = mysqli_fetch_assoc($run);
						echo $content['content'];
					?>	
					</div>
					<div class="servimg">
						<?php
							//Services Text
    						$sql = "SELECT `tblCMS`.`content` FROM `tblCMS` WHERE `cid` = 6";
    						$run = mysqli_query($db_connect,$sql);
    						$content = mysqli_fetch_assoc($run);
							echo $content['content'];
						?>
					</div>
				</div>
			</div>
        </div>
    </section>

    <footer id="homeFooter">
        <p>Copyright Hazel Photography 2021</p>
    </footer>
</body>
</html>