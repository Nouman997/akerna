<?php include_once("header.php"); ?>

<head>
    <title>Add</title>
</head>

<?php
if(isset($_POST['Submit'])) {
    $user_name = mysqli_real_escape_string($mysqli, $_POST['user_name']);
    $user_email = mysqli_real_escape_string($mysqli, $_POST['user_email']);
    $beverage = mysqli_real_escape_string($mysqli, $_POST['beverage']);
    $consumed_mg = mysqli_real_escape_string($mysqli, $_POST['consumed_mg']);

    // validation goes here
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

        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {

        $result = mysqli_query($mysqli, "INSERT INTO beverages(user_name,user_email,beverage,consumed_mg) VALUES('$user_name','$user_email','$beverage','$consumed_mg')");

        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                 <strong>Success!</strong> Record Was Saved Successfully.
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>';
    }
}
?>

<body>
    <div class="container-fluid">

        <div class="row">
            <div class="card" style="width: 50%;margin: auto;">
            <div class="card-body">
                <a href="index.php" class="btn btn-primary mt-2 mb-4">Go To Dashboard</a>
                <h5 class="card-title">Add New Beverage Record</h5>
                <form action="add.php" method="post" name="add_form" class="form-inline">
                    <div class="form-group mb-2">
                        <label for="name">Your Name:</label>
                        <input type="text" name="user_name" required class="form-control">
                    </div>
                    <div class="form-group mb-2">
                            <label for="email">Your Email Address:</label>
                            <input type="email" class="form-control" name="user_email" required>
                    </div>
                    <div class="form-group mb-2">
                            <label for="beverage">Select A Beverage:</label>
                            <select class="form-control" name="beverage" required>
                                <option value="Monster Ultra Sunrise">Monster Ultra Sunrise</option>
                                <option value="Black Coffee">Black Coffee</option>
                                <option value="Americano">Americano</option>
                                <option value="Sugar free NOS">Sugar free NOS</option>
                                <option value="5 Hour Energy">5 Hour Energy</option>
                            </select>
                    </div>
                    <div class="form-group mb-2">
                            <label for="consumed" style="width: 100%;">Mgs Consumed:</label>
                            <input type="number" class="form-control" name="consumed_mg" min="0" oninput="validity.valid||(value='');" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="Submit" value="Add">Save Record</button>
                </form>
            </div>
            </div>
        </div>
    </div>

<?php include_once("footer.php"); ?>