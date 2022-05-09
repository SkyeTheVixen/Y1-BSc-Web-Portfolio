<?php
    include_once('../includes/_connect.php');
    include_once('_authcheck.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Lato&display=swap" rel="stylesheet">
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

    <section id="container">
        <div id="AboutSectionHead">
            <h2 id="AboutTitle">Admin</h1>
        </div>
        <div id="AboutSectionContent" class="no-pad adminButtons">
			<a class="adminButton" href="usermgt.php">User Management</a>
			<a class="adminButton" href="cms.php">Content Management</a>
			<a class="adminButton" href="logout.php">Log out</a>

			
        </div>
    </section>

    <footer id="homeFooter">
        <p>Copyright Hazel Photography 2021</p>
    </footer>
</body>
</html>