<?php

	if(isset($_GET['edit_user'])){
		$the_user_id = $_GET['edit_user'];

		$query = "SELECT * FROM users WHERE user_id = $the_user_id ";
		$select_users_query = mysqli_query($connection, $query);

		while($row = mysqli_fetch_assoc($select_users_query)){
				$user_id = $row['user_id'];
			  $username = $row['username'];
				$user_password = $row['user_password'];
				$user_firstname = $row['user_firstname'];
				$user_lastname = $row['user_lastname'];
				$user_email = $row['user_email'];
				$user_image = $row['user_image'];
				$user_role = $row['user_role'];
			}

	}


	if(isset($_POST['edit_user'])){
		$user_firstname = $_POST['user_firstname'];
		$user_lastname = $_POST['user_lastname'];
		$user_role = $_POST['user_role'];
		$username = $_POST['username'];
		$user_email = $_POST['user_email'];
		$user_password = $_POST['user_password'];

			// move_uploaded_file($post_image_temp, "./images/$post_image");
			//
			// if(empty($post_image)){
			// 	$query = "SELECT * FROM posts WHERE post_id = $the_post_id";
			// 	$select_image = mysqli_query($connection, $query);
			//
			// 	while($row = mysqli_fetch_array($select_image)){
			// 		$post_image = $row['post_image'];
			// 	}
			// }


			$query = "UPDATE users SET ";
			$query .= "user_firstname = '{$user_firstname}', ";
			$query .= "user_lastname = '{$user_lastname}', ";
			$query .= "user_role = '{$user_role}', ";
			$query .= "username = '{$username}', ";
			$query .= "user_email = '{$user_email}', ";
			$query .= "user_password = '{$user_password}' ";
			$query .= "WHERE user_id = {$the_user_id} ";

			$edit_user_query = mysqli_query($connection, $query);

			confirmQuery($edit_user_query);
		}



?>


<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="author">First Name</label>
		<input type="text" value="<?php echo $user_firstname; ?>" name="user_firstname" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_status">Last Name</label>
		<input type="text" value="<?php echo $user_lastname; ?>" name="user_lastname" class="form-control">
	</div>

	<div class="form-group">
		<select name="user_role" id="">


			<option value="Subscriber"><?php echo $user_role; ?></option>
			<?php
				if($user_role == 'Admin') {
					echo "<option value = 'Subscriber'>Subscriber</option>";
				}
				else {
					echo "<option value = 'Admin'>Admin</option>";

				}


			 ?>

		</select>

	</div>


<!--	<div class="form-group">
		<label for="image">Post Image</label>
		<input type="file" name="image">
	</div>
-->
	<div class="form-group">
		<label for="post_tags">Username</label>
		<input type="text" value="<?php echo $username; ?>" name="username" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_content">Email</label>
		<input type="email" value="<?php echo $user_email; ?>" name="user_email" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_content">Password</label>
		<input type="password" value="<?php echo $user_password; ?>" name="user_password" class="form-control">
	</div>

	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="edit_user" value="Edit User">
	</div>

</form>
