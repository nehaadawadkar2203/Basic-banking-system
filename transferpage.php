<?php
     $conn = mysqli_connect('localhost','root','join','website');
     if(isset($_POST['submit'])){
        $from = $_GET['id'];
        $to = $_POST['to'];
        $amount = $_POST['amount'];
        $transfer_msg = $_POST['remark'];

        $sql = "SELECT * FROM customer WHERE customer_id = $from";
        $query = mysqli_query($conn, $sql);
        $sql1 = mysqli_fetch_array($query);

        $sql = "SELECT * FROM customer WHERE customer_id = $to";
        $query = mysqli_query($conn, $sql);
        $sql2 = mysqli_fetch_array($query);

        if(($amount)<0){
            echo "<script type='text/javascript'>";
            echo "alert('Sorry! Negative values cannot be transfered')";
            echo "</script>";
         }

         else if(($amount)>$sql1['balance']){
             echo "<script type='text/javascript'>";
            echo "alert('Insufficient balance!')";
            echo "</script>";
            }

         else if($amount == 0){
            echo "<script type='text/javascript'>";
            echo "alert('Zero values cannot be trasnfered!')";
            echo "</script>";
          }

          else{
                $newbalance = $sql1['balance'] - $amount;
                $sql = "UPDATE customer set balance = $newbalance WHERE customer_id = $from";
                mysqli_query($conn, $sql);

                $newbalance = $sql2['balance'] + $amount;
                $sql = "UPDATE customer set balance = $newbalance WHERE customer_id = $to";
                mysqli_query($conn, $sql);

                $sender = $sql1['customer_name'];
                $receiver = $sql2['customer_name'];
                $sql = "INSERT INTO transaction(sender, receiver, balance, remark) values ('$sender', '$receiver', '$amount', '$transfer_msg')";
                $query=mysqli_query($conn, $sql);

                if($query){
                    echo "<script> alert('Hurray! Transaction successful');
                                        window.location='transactionhistory.php';
                               </script>";
                }

                $newbalance = 0;
                $amount = 0;
            }
    }
    
    ?>

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
        <p>TRANSFER PAGE</p>
    </div>
    <br />
    <br />

    <?php
        $conn = mysqli_connect('localhost','root','join','website');
        $cid = $_GET['id'];
        $sql = "SELECT * FROM customer WHERE customer_id='$cid'";
        $result=mysqli_query($conn, $sql);
        if(!$result){
                echo "Error : ". $sql. "<br>".mysqli_error($conn);
           }
           $rows = mysqli_fetch_assoc($result);
    ?>
    <form method="post" name="tcredit" class="tabletext">
        <br />
        <div>
            <table class="table table-striped table-condensed table-bordered">
                <tr>
                    <th>CUSTOMER ID</th>
                    <th>CUSTOMER NAME</th>
                    <th>CUSTOMER EMAIL</th>
                    <th>CURRENT BALANCE</th>
                </tr>
                 <tr>
                     <td><?php echo $rows['customer_id']?></td>
                     <td><?php echo $rows['customer_name']?></td>
                     <td><?php echo $rows['customer_email']?></td>
                     <td><?php echo $rows['balance']?></td>
                </tr>
            </table>
        </div>
        <br /><br /><br />
        <label>TRANSFER TO:</label>
        <select name="to" class="form-control" required>
            <option value=" " disabled selected> choose</option>
            <?php
                $conn = mysqli_connect('localhost', 'root', 'join', 'website');
                $cid = $_GET['id'];
                $sql = "SELECT * FROM customer WHERE customer_id!=$cid";
                $result = mysqli_query($conn, $sql);
                if(!$result){
                    echo "Error : ". $sql. "<br>".mysqli_error($conn);
           }
           while($rows = mysqli_fetch_assoc($result)){
            ?>
            <option class="table" value="<?php echo $rows['customer_id'];?>">
                <?php echo $rows['customer_name'];?>(Balance: <?php echo $rows['balance'];?>)
            </option>
            <?php
            }
            ?>
            
        </select>
        <br>
        <br>
            <label>Amount:</label>
            <input type="number" class="form-control" name="amount" required>   
            <br><br>
            <label for="transfer_msg">Remark:</label>
            <input type="text" class="form-control" name="remark" required />
            <br /><br />
                <div class="text-center" >
            <button class="btn mt-3" name="submit" type="submit" id="myBtn">Transfer</button>
                    <a href='viewuser.php' style='text-decoration: none';  class='btn res res1' role='button'>Cancel Transfer</a>
            </div>
    </form>
    <br /><br /><br />

    <?php
        include 'footer.php';
    ?>
</body>
</html>