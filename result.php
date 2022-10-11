<?php include_once("header.php"); ?>

<head>
    <title>Result</title>
</head>
<?php
//including the database connection file
include("config.php");

$date_today = date("Y-m-d");
$total_limit = 500;
$user_email = $_GET['email'];

//selecting data associated with this particular email
$result = mysqli_query($mysqli, "SELECT * FROM beverages WHERE DATE_FORMAT(consumed_at, '%Y-%m-%d') = '$date_today' and user_email='$user_email'");
$row_cnt = $result->num_rows;
$get_res = mysqli_fetch_all($result);

?>

<body>
    <div class="container-fluid">
        <a class="btn btn-primary mt-2 mb-4" href="index.php">Home</a>
        <h3>This Report Is For (<?= $date_today; ?>)</h3>
        <table class="table table-bordered">
            <tr bgcolor='#CCCCCC'>
                <th>User Details</td>
                <th>Beverages Consumed</th>
                <th>Report</th>
            </tr>
            <tr>
                <td class="col-md-2">
                    <?= $get_res[0]['1'] ?> </br>
                    <?= $get_res[0]['2'] ?>
                </td>
                <td class="col-md-4">
                    <?php
                        $total_mgs_consumed = 0;
                        for ($x = 0; $x < $row_cnt; $x++) {
                            $total_mgs_consumed += $get_res[$x]['4'];
                            echo "<b>".$x+1 ." :</b> ".$get_res[$x]['5']." <b>" .$get_res[$x]['3']." ".$get_res[$x]['4']."mg  </b></br>";
                        }
                    ?>
                </td>
                <td class="col-md-6">
                    <b>Total Limit:</b> <?= $total_limit ?>mg </br>
                    <b>Total Consumed:</b> <?= $total_mgs_consumed; ?>mg </br>
                    <?php if($total_mgs_consumed > $total_limit ) { ?>
                    <p class="text-danger"><b>Warning: You have exceeded the limit by <?= $total_mgs_consumed - $total_limit ; ?>mg</b></p>
                    <?php }else{ ?>
                        <b>Limit Remaining :</b> <?= $total_limit - $total_mgs_consumed; ?>mg
                    <?php } ?>
                </td>
            </tr>
        </table>
    </div>

<?php include_once("footer.php"); ?>