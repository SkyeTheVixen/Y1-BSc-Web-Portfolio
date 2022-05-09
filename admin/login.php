<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Lato&display=swap" rel="stylesheet">
    <link href="../res/stylesheets/styles.css" rel="stylesheet" type="text/css">
    <title>Admin Control || Hazel Photography</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#submitBtn").click(function( event ) {
                var email=document.getElementById('email').value;
                var password=document.getElementById('password').value;
                var remember=$("#remember").prop('checked');
                if(email === "" || password === ""){
                    $('#feedback').html("You did not Enter any data");
                    $('#feedback').className="failure";
					$('#feedback').fadeIn();
                    return;
                }
				
				var datastring = {"email": email, "password": password, "remember": remember};
                $.ajax({
                    type: "post",
                    url: "./_auth.php",
                    data: datastring,
                    cache: false,
                    success: function(dataResult) {
                        var DataResult = JSON.parse(dataResult);
                        if(DataResult.statusCode === 200){
                            location.href = "index.php";
                        }
                        else if(DataResult.statusCode === 201){
                            $("#feedback").addClass("failure")
						    $('#feedback').html('Invalid Email or Password!');
							return;

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
                <li class="no-pad"><img alt="Hazel Company Logo" src="../res/images/logo-1.png"></li>
                <li class="right"><a href="../contact.php">Contact</a></li>
                <li class="right"><a href="../gallery.php">Gallery</a></li>
                <li class="right"><a href="../services.php">Services</a></li>
                <li class="right"><a href="../about.php">About</a></li>
                <li class="right"><a href="../index.php">Home</a></li>

            </ul>
        </nav>
    </header>

    <div id="container">
        <section id="AdminSectionHead">
            <h1 id="AdminTitle">Admin Login</h1>
        </section>
        <section id="AdminSectionContent" class="no-pad">
            <form method="POST" class="loginForm" autocomplete="off">
                <table>
                    <tr>
                        <td>
                            <label for="email" class="left">Email:</label>
                        </td>
                        <td>
                            <input type="email" class="loginInput left" name="email" id="email" required autofocus placeholder="someone@example.com">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="password" class="left">Password:</label>
                        </td>
                        <td>
                            <input type="password" class="loginInput left" name="password" id="password" required placeholder="password123">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="remember" class="left">Remember Me?:</label>
                        </td>
                        <td>
                            <input type="checkbox" class="left" name="remember" value="noremember" id="remember">
                        </td>
                    </tr>
                </table>

                <button type="submit" id="submitBtn">Login</button>
            </form>
            <div id="feedback"></div>
        </section>
    </div>

    <footer id="homeFooter">
        <p>Copyright Hazel Photography 2021</p>

    </footer>
</body>
</html>