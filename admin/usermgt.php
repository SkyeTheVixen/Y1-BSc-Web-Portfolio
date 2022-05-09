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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/4d893daa44.js" crossorigin="anonymous"></script>
    <title>User Management || Hazel Photography</title>

    <script>
        $(document).ready(function(){
        	closeForm();
            $(".delUser").click(function( event ) {
                var id=$(this).attr('data-id');
				var datastring = {"id": id};
                $.ajax({
                    type: "post",
                    url: "./deleteuser.php",
                    data: datastring,
                    cache: false,
                    success: function(dataResult) {
                        var DataResult = JSON.parse(dataResult);
                        if(DataResult.statusCode === 200){
                            $("#feedback").addClass("success")
                            $('#feedback').html('User Deleted, please refresh to view changes');
                            setTimeout(function(){
                                $( "#feedback" ).fadeOut();
                            }, 5000); //refresh in 2 seconds
							return;
                        }
                        else if(DataResult.statusCode === 201){
                            $("#feedback").addClass("failure")
                            $('#feedback').html('Unable to delete user');
                            setTimeout(function(){
                                $( "#feedback" ).fadeOut();
                            }, 2000); //refresh in 2 seconds
							return;
                        }
                    }
                });
				event.preventDefault();
				})
        });
 
    </script>
	<script>
		function openForm() {
  document.getElementById("AddUserForm").style.display = "block";
}

function closeForm() {
  document.getElementById("AddUserForm").style.display = "none";
}
	</script>


</head>
<body class="blackbg">
    <header>
        <nav>
            <ul>
                <li class="no-pad"><img src="../res/images/logo-1.png"></li>
                <li class="right"><a href="contact.php">Contact</a></li>
                <li class="right"><a href="gallery.php">Gallery</a></li>
                <li class="right"><a href="services.php">Services</a></li>
                <li class="right"><a href="#" class="active">About</a></li>
                <li class="right"><a href="index.html">Home</a></li>

            </ul>
        </nav>
    </header>

    <div id="container">
        <section id="AboutSectionHead">
            <h1 id="AboutTitle">User Management</h1>
        </section>
        <section id="AboutSectionContent" class="no-pad">
            <table id="userTable">
                <thead>
                    <tr scope="col">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Access Level</th>
                        <th>Timestamp Updated</th>
                        <th>View</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM `tblUsers`";
                        $run = mysqli_query($db_connect, $sql);

                        while($result = mysqli_fetch_assoc($run))
                        {
                    ?>
                    <tr>
                        <td><?=$result["ID"]?></td>
                        <td><?=$result["fname"]." ".$result["lname"]?></td>
                        <td><?=$result["email"]?></td>
                        <td><?=$result["access"]?></td>
                        <td><?=$result["updatedTimestamp"]?></td>
                        <td><a href="#" data-id="<?=$result["ID"]?>" class="editUser"><i class="fa fa-pencil"></i></a></td>
                        <td><a href="#" data-id="<?=$result["ID"]?>" class="delUser"><i class="fas fa-trash-alt"></i></a></td>
                        <?php
                            }
                        ?>
                    </tr>
                </tbody>
            </table>
            <div id="feedback"></div>
			<div>
				<br>
				<br>
				<br>
				<button class="adminButton" onclick="openForm()">Add User</a>
			</div>
				<div class="form-popup" id="AddUserForm">
  					<form method="POST" action="adduser.php" class="form-container">
						<h3>Add new user</h3>
						<label for="fname"><b>First Name</b></label>
    					<input type="text" placeholder="John" name="fname" required>
						<br>
						<label for="lname"><b>Last Name</b></label>
    					<input type="text" placeholder="Doe" name="lname" required>
						<br>
						<label for="email"><b>Email</b></label>
    					<input type="email" placeholder="johndoe@somedomain.com" name="email" required>
						<br>
    					<label for="password"><b>Password</b></label>
    					<input type="password" placeholder="p455w0rD!" name="password" required>
						<br>
						<label for="accesslevel"><b>Access Level</b></label>
						<select id="access" name="accesslevel" size="2">
  <option value="Admin">Admin</option>
  <option value="User">User</option>
</select>
    					<button type="submit" class="btn">Add</button>
    					<button type="submit" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>
        </section>
    </div>

    <footer id="homeFooter">
        <p>Copyright Hazel Photography 2021</p>

    </footer>
</body>
</html>