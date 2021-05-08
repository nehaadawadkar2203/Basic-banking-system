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
        <p>TRANSFER STATEMENT</p>
    </div>
    <br />
    <br />

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>SENDER NAME</th>
                <th>RECEIVER NAME</th>
                <th>AMOUNT TRANSFERED</th>
                <th>REMARK</th>
                <th>TRANSFER DATE AND TIME</th>
            </tr>
        </thead>
        <tbody>
            <?php
              $conn = mysqli_connect('localhost','root','join','website');
              $select = "SELECT *FROM transaction";
              $run = mysqli_query($conn, $select);
                    while($row_user=mysqli_fetch_array($run)){
             ?>
            <tr>
                <td><?php echo $row_user['sender'];?></td>
                <td><?php echo $row_user['receiver'];?></td>
                <td><?php echo $row_user['balance'];?></td>
                <td><?php echo $row_user['remark'];?></td>
                <td><?php echo $row_user['transfer_date'];?></td>
            </tr>
            <?php    
            }
            ?>
        </tbody>
    </table>

    <?php
        include 'footer.php';
    ?>
</body>
</html>
