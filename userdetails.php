<html>
<head>
	<title>ONLINE BANKING SYSTEM</title>
    <link rel="stylesheet" type="text/css" href="nav.css" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>

<?php
   include 'navbar.php'; 
?>

     <div class="view">
        <p>CUSTOMER DETAILS</p>
    </div>

    <div class="container my-4">
    <?php
    $conn = mysqli_connect('localhost','root','join','website');
    if(isset($_GET['id'])){
        $cust_id=$_GET['id'];
        $get_customers="SELECT * FROM customer WHERE customer_id='$cust_id'";
        $run_customers=mysqli_query($conn, $get_customers);

        while($row_customers=mysqli_fetch_array($run_customers)){
            $cust_id=$row_customers['customer_id'];
            $cust_name=$row_customers['customer_name'];
            $cust_email=$row_customers['customer_email'];
            $cust_balance=$row_customers['balance'];

            echo"
                <br><br>
                <table class='table table-bordered' style='text-align: center; font-size: 20px;' >
                    <tr>
                        <th scope='col'>Customer ID</th>
                        <td>$cust_id</td>
                    </tr>
                    <tr>
                        <th scope='col'>Customer Name</th>
                        <td>$cust_name</td>
                    </tr>
                    <tr>
                        <th scope='col'>Customer Email</th>
                        <td>$cust_email</td>
                    </tr>
                    <tr>
                        <th scope='col'>Customer Balance</th>
                        <td>$cust_balance</td>
                    </tr>
                </table>

                <div class='row'>
                <div class='col-sm-3'></div>
                    <div class='col-12 col-sm-2'>
                        <a href='viewuser.php' style='margin-left: 50px;text-decoration: none;'class='btn btn-success' role='button'>Back to the customers list</a>
                    </div>
                    <div class='col-12 col-sm-3 '>
                        <a href='transferpage.php?id=$cust_id' style='margin-left:100px;text-decoration: none;'class='btn btn-danger' role='button'>Transfer Money</a>
                     </div>
                </div>
    
    ";
    }
    }
    ?>
        
    </div>
    <br /><br /><br />
  <?php
        include 'footer.php';
    ?>
</body>
</html>