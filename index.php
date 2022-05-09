<?php
    include_once('includes/_connect.php');
    $sql = "SELECT `tblCMS`.`content` FROM `tblCMS` WHERE `cid` = 1";
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
    <title>Home || Hazel Photography</title>
		<?php
		include_once('includes/stattrack.php');
	?>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li class="no-pad"><img alt="Hazel Logo" src="res/images/logo-1.png"></li>
                <li class="right"><a href="contact.php">Contact</a></li>
                <li class="right"><a href="gallery.php">Gallery</a></li>
                <li class="right"><a href="services.php">Services</a></li>
                <li class="right"><a href="about.php">About</a></li>
                <li class="right"><a href="#" class="active">Home</a></li>

            </ul>
        </nav>
    </header>

    <section id="container">
        <div id="HomeSection">
            <h1 id="HomeTitle">Hazel Photography</h1>
            <div id="HomeSubTitle"><?php echo $content['content'];?></div>
        </div>
    </section>

    <footer id="homeFooter">

    </footer>
</body>
</html>