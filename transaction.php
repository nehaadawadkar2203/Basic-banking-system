<html>
<head>
	<title>ONLINE BANKING SYSTEM</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
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
        <p>TRANSFER PAGE</p>
    </div>
    <br />
    <br />
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>CUSTOMER ID</th>
                <th>CUSTOMER NAME</th>
                <th>CUSTOMER EMAIL</th>
                <th>CRRENT BALANCE</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php
              $conn = mysqli_connect('localhost','root','join','website');
              $select = "SELECT *FROM customer";
              $run = mysqli_query($conn, $select);
                    while($row_user=mysqli_fetch_array($run)){
            
                    $user_id = $row_user['customer_id'];
                    $user_name = $row_user['customer_name'];
                    $user_email = $row_user['customer_email'];
                    $user_balance = $row_user['balance'];
                    ?> 
            <tr>
                <td><?php echo $user_id;?></td>
                <td><?php echo $user_name;?></td>
                <td><?php echo $user_email;?></td>
                <td><?php echo $user_balance;?></td>
                <td><a class="btn" href="transferpage.php?id=<?php echo $user_id;?>">TRANSFER</a></td>
            </tr>
            <?php     }
            ?>
        </tbody>
    </table>

    <?php
        include 'footer.php';
    ?>
</body>
</html>