<?php include_once("header.php"); ?>
<?php $result = mysqli_query($mysqli, "SELECT * FROM beverages ORDER BY user_name ASC"); ?>

<head>
    <title>Home</title>
</head>

<body>
    <div class="container-fluid">
        <a href="add.php" class="btn btn-primary mt-2 mb-2 float-end">Add New Beverage Record</a>
        <table class="table table-bordered mt-4">
            <tr bgcolor='#CCCCCC'>
                <th>User Name</th>
                <th>User Email</th>
                <th>Beverage</th>
                <th>Consumed (Mg)</th>
                <th>Consumed At</th>
                <th>Action</th>
            </tr>
            <?php
            while($res = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>".$res['user_name']."</td>";
                echo "<td>".$res['user_email']."</td>";
                echo "<td>".$res['beverage']."</td>";
                echo "<td>".$res['consumed_mg']."mg </td>";
                echo "<td>".$res['consumed_at']."</td>";
                echo "<td><a class='btn btn-primary btn-sm' href=\"edit.php?id=$res[id]\">Edit</a>  <a class='btn btn-danger btn-sm' href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a> <a class='btn btn-primary btn-sm' href=\"result.php?email=$res[user_email]\">Results</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

<?php include_once("footer.php"); ?>