<html>

<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css"> <!--css file link in bootstrap folder-->
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Arimo:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <div id="home" class="header">
        <div class="top-header">
            <div class="container">
                <div class="logo">
                    <a href="index.php"><img src="images/logo.png" alt=""></a>
                </div>
                <!--start-top-nav-->
                <div class="top-nav">

                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>



    <?php
require('db.php');
//include("auth.php");
$status = "";
//if(isset($_POST['new']) && $_POST['new']==1){
    if(isset($_POST['submit'])){

    $p_date = date("Y-m-d H:i:s");
    $p_quantity = $_POST['p_quantity'];
    $p_cost = $_POST["p_cost"];
    $p_name = $_POST["p_name"];
    $ins_query="insert into purchasesheet(`p_date`,`p_name`,`p_quantity`,`p_cost`)values
    ('$p_date','$p_name','$p_quantity','$p_cost')";

//    print_r($ins_query);
//    exit();

    mysqli_query($mysqli,$ins_query)
    or die(mysqli_error($mysqli));
    $status = "New Record Inserted Successfully.
    </br></br><a href='viewpurchase_records.php'>View Inserted Record</a>";
}
?>

<!DOCTYPE html>
<html>
<!--<head>-->
<!--    <meta charset="utf-8">-->
<!--    <title>Insert New Record</title>-->
<!--    <link rel="stylesheet" href="css/style.css" />-->
<!--</head>-->
<!--<body>-->
<!--<div class="form">-->
<!--    <p><a href="dashboard.php">Dashboard</a>-->
<!--        | <a href="view.php">View Records</a>-->
<!--        | <a href="logout.php">Logout</a></p>-->
<!--    <div>-->
        <h1>Insert New Purchase Record</h1>
        <form name="form" method="post" action="">
            <input type="hidden" name="new" value="1" />
            <p><input type="text" name="p_name" placeholder="Enter Item name" required /></p>
         <br>   <p><input type="text" name="p_quantity" placeholder="Enter Quantity" required /></p><br>
            <p><input type="text" name="p_cost" placeholder="Enter Cost" required /></p><br>
<!--            <p><input type="text" name="p_date" placeholder="Enter Date" required /></p>-->

            <p><input name="submit" type="submit" value="Submit" /></p>
        </form>
        <p style="color:#FF0000;"><?php echo $status; ?></p>
    </div>
</div>
</body>
</html>