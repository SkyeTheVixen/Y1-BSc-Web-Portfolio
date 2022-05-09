<?php
    include_once('includes/_connect.php');

    $sql = "SELECT `tblCMS`.`content` FROM `tblCMS` WHERE `cid` = 7";
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
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<link href="includes/lightbox/css/lightbox.css" rel="stylesheet">
    <link href="res/stylesheets/styles.css" rel="stylesheet" type="text/css">
	<script src="includes/lightbox/js/lightbox.js"></script>
		<?php
		include_once('includes/stattrack.php');
	?>
	<script>
    	lightbox.option({
      		'resizeDuration': 200,
      		'wrapAround': true
    	})
</script>
    <title>Gallery || Hazel Photography</title>
</head>
<body class="blackbg galleryBody">
    <header>
        <nav>
            <ul>
                <li class="no-pad"><img alt="Hazel Logo" src="res/images/logo-1.png"></li>
                <li class="right"><a href="contact.php">Contact</a></li>
                <li class="right"><a href="#" class="active">Gallery</a></li>
                <li class="right"><a href="services.php">Services</a></li>
                <li class="right"><a href="about.php">About</a></li>
                <li class="right"><a href="index.php">Home</a></li>

            </ul>
        </nav>
    </header>

    <section id="container">
        <div id="GallerySectionHead">
            <h2 id="GalleryTitle">Gallery</h2>
        </div>
        <div id="GallerySectionContent" class="no-pad">
            <div id="GalleryQuote">
				<?php
					echo $content['content'];
				?>
			</div>
			<div id="galleryLightbox">
				<a href="res/images/1.jpg" data-title="Forest Sunset" data-lightbox="portfolio"><img src="res/images/1.jpg" class="thumbnailLightbox" alt="A sunset over a lush green forest"></a>
				<a href="res/images/2.jpg" data-title="Sunset over water" data-lightbox="portfolio"><img src="res/images/2.jpg" class="thumbnailLightbox" alt="a photo taken from a hill of the sea with a red sunset"></a>
				<a href="res/images/3.jpg" data-title="Winter Forest" data-lightbox="portfolio"><img src="res/images/3.jpg"  class="thumbnailLightbox" alt="a photo of a forest taken in the snow"></a>
				<a href="res/images/4.jpg" data-title="Sunny field" data-lightbox="portfolio"><img src="res/images/4.jpg"  class="thumbnailLightbox" alt="a close up of wheat with sun in the background"></a>
				<a href="res/images/5.jpg" data-title="Macro Flowers" data-lightbox="portfolio"><img  class="thumbnailLightbox" src="res/images/5.jpg" alt="a close up of a dandelion with white particles surrounding it"></a>

			</div>
		</div>
	</section>
    <footer id="homeFooter">
        <p>Copyright Hazel Photography 2021</p>
    </footer>
</body>
</html>