<?php include_once("header.php"); ?>

<head>
    <title>Edit</title>
</head>
<?php

if(isset($_POST['update'])){
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
    $user_name = mysqli_real_escape_string($mysqli, $_POST['user_name']);
    $user_email = mysqli_real_escape_string($mysqli, $_POST['user_email']);
    $beverage = mysqli_real_escape_string($mysqli, $_POST['beverage']);
    $consumed_mg = mysqli_real_escape_string($mysqli, $_POST['consumed_mg']);

	// checking empty fields
    if(empty($beverage) || empty($consumed_mg) || empty($user_name) || empty($user_email)) {

        if(empty($beverage)) {
            echo "<font color='red'>Beverage field is required.</font><br/>";
        }

        if(empty($user_name)) {
            echo "<font color='red'>User Name field is required.</font><br/>";
        }

        if(empty($user_email)) {
            echo "<font color='red'>User Email field is required.</font><br/>";
        }

        if(empty($consumed_mg)) {
            echo "<font color='red'>Consumed MG field is empty.</font><br/>";
        }

	} else {
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE beverages SET user_name='$user_name',user_email='$user_email',beverage='$beverage',consumed_mg='$consumed_mg' WHERE id=$id");

		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM beverages WHERE id=$id");

while($res = mysqli_fetch_array($result)){
	$user_name = $res['user_name'];
	$user_email = $res['user_email'];
    $beverage = $res['beverage'];
    $consumed_mg = $res['consumed_mg'];
}
?>

<body>
    <div class="container-fluid">
        <div class="row">

        <div class="card" style="width: 50%;margin: auto;">
            <div class="card-body">
                <a href="index.php" class="btn btn-primary mt-2 mb-4">Go To Dashboard</a>
                <h5 class="card-title">Update Beverage Record</h5>
                <form action="edit.php" method="post">
                <div class="form-group mb-2">
                        <label for="user_name">Your Name:</label>
                        <input type="text" name="user_name" value="<?= $user_name ?>" required class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label for="user_email">Your Email Address:</label>
                        <input type="user_email" class="form-control" name="user_email" value="<?= $user_email ?>" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="beverage">Select A Beverage</label>
                        <select class="form-control" name="beverage" required>
                            <option value="Monster Ultra Sunrise" <?php echo ($beverage == 'Monster Ultra Sunrise') ? ' selected="selected"' : ""  ?>>Monster Ultra Sunrise</option>
                            <option value="Black Coffee" <?php echo ($beverage == 'Black Coffee') ? ' selected="selected"' : ""  ?>>Black Coffee</option>
                            <option value="Americano" <?php echo ($beverage == 'Americano') ? ' selected="selected"' : ""  ?>>Americano</option>
                            <option value="Sugar free NOS" <?php echo  ($beverage == 'Sugar free NOS') ? ' selected="selected"' : "" ?>>Sugar free NOS</option>
                            <option value="5 Hour Energy" <?php echo ($beverage == '5 Hour Energy') ? ' selected="selected"' : "" ?>>5 Hour Energy</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="consumed_mg" style="width: 100%;">Mgs Consumed:</label>
                        <input type="number" class="form-control" name="consumed_mg" min="0" value="<?= $consumed_mg; ?>" oninput="validity.valid||(value='');" required>
                    </div>
                    <div class="form-group hidden">
                        <input type="hidden" name="id" value=<?= $_GET['id'] ?>></td>
                    </div>
                    <button type="submit" class="btn btn-primary" name="update" value="Update">Update Record</button>
                </form>
            </div>
            </div>
        </div>
    </div>

<?php include_once("footer.php"); ?>