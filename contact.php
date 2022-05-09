<?php
    include_once('includes/_connect.php');
    //Address
    $sql = "SELECT `tblCMS`.`content` FROM `tblCMS` WHERE `cid` = 3";
    $run = mysqli_query($db_connect,$sql);
    $content = mysqli_fetch_assoc($run);

    //Contact details
    $sql = "SELECT `tblCMS`.`content` FROM `tblCMS` WHERE `cid` = 4";
    $run = mysqli_query($db_connect,$sql);
    $content2 = mysqli_fetch_assoc($run);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Lato&display=swap" rel="stylesheet">
    <link href="res/stylesheets/styles.css" rel="stylesheet" type="text/css">
    <title>Contact || Hazel Photography</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<?php
		include_once('includes/stattrack.php');
	?>
    <script>
        $(document).ready(function(){
            $("#submitBtn").click(function( event ) {
                var name=document.getElementById('fname').value;
                var email=document.getElementById('emails').value;
                var message=document.getElementById('message').value;
                var bd1=document.getElementById('bd1').value;
                var bd2=document.getElementById('bd2').value;
                var bd3=document.getElementById('bd3').value;

                if(name === "" || message === "" || email === ""){
                    $('#feedback').html("You did not complete the form");
                    $('#feedback').className="failure";
                    return;
                }
                else if(bd1 != "" || bd2 != "" || bd3 !=  ""){
                    $('#feedback').html("You have been flagged as a bot");
                    $('#feedback').className="failure";
                    return;
                }
                var dataString = {"name": name, "email": email, "message":message};

                $.ajax({
                    type: "post",
                    url: "includes/mail.php",
                    data: dataString,
                    success: function(html) {
                        $('#feedback').html(html);
                        if(html === "Your message has been sent")
                        {
							$("form").fadeOut();
                            document.getElementById("feedback").className="success";
                        }
                        else
                        {
                            document.getElementById("feedback").className="failure";
                        }
                    }
                });
                event.preventDefault();
            });
        });
    </script>


</head>
<body class="blackbg">
    <header>
        <nav>
            <ul>
                <li class="no-pad"><img alt="Hazel Company Logo" src="res/images/logo-1.png"></li>
                <li class="right"><a href="#" class="active">Contact</a></li>
                <li class="right"><a href="gallery.php">Gallery</a></li>
                <li class="right"><a href="services.php">Services</a></li>
                <li class="right"><a href="about.php">About</a></li>
                <li class="right"><a href="index.php">Home</a></li>

            </ul>
        </nav>
    </header>

    <section id="container">
        <div id="AboutSectionHead">
            <h2 id="AboutTitle">Contact Us</h2>
        </div>
        <div id="AboutSectionContent" class="no-pad">
			<div class="contactForm">
				<h3 class="subsection-Head">Send us a message</h3>
            	<form class="contactform" method="POST">
                	<label for="fname">Name: </label>
                	<input type="text" id="fname" name="fname" required autofocus placeholder="John Doe">
                	<br>
                	<label for="emails">Email: </label>
                	<input type="email" id="emails" name="email" required placeholder="John.doe@somemail.com">
                	<input class="dispNo" type="text" id="bd1" name="bd1" placeholder="1+1">
                	<input class="dispNo" type="text" id="bd2" name="bd2" placeholder="2+2">
                	<input class="dispNo" type="text" id="bd3" name="bd3" placeholder="3+3">
                	<br>
                	<label for="message">Message: </label>
                	<textarea id="message" name="message" required cols="20" rows="4"></textarea>
                	<br>
                	<button type="submit" id="submitBtn">Submit</button>
            	</form>
            	<br>
            	<br>
            	<div id="feedback"></div>
				<br>
				<br>
				<div class="ContactAddress">
				</div>
			</div>
			<div class="ContactMap">
				<h3 class="subsection-Head">Find us</h3>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2491.906374225385!2d-2.9830345487037517!3d51.34963222994713!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4871ff2acb24a073%3A0x69b285c8859a1378!2sUCW%20-%20Winter%20Gardens!5e0!3m2!1sen!2suk!4v1620633748317!5m2!1sen!2suk" style="border:0;" allowfullscreen="" width=100% height="450" loading="lazy"></iframe>
        	</div>
    </section>

    <footer id="homeFooter">
        <p>Copyright Hazel Photography 2021</p>
    </footer>
</body>
</html>