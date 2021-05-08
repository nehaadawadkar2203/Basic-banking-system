<html>
<head>
	<title>ONLINE BANKING SYSTEM</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
    <link rel="stylesheet" type="text/css" href="nav.css" />
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
<div class="container">
  <img src="home.jpg" alt="Notebook"style="width:100%;">
  <div class="content">
    <p>Welcome to the sparks bank!</p>
  </div>
</div>

    <section class="latest">
        <div class="heading">
           <h1 >Our services</h1 >
           <p>Safe transactions in one click!</p>
     </div>
                <div class="latest-container">
                        <div class="latest-box">
                            <a href="viewuser.php"><img src="user.png" /></a>
                               <div class="latest-b-text">
                                <p>
                                    VIEW USERS
                                </p>
                            </div>
                        </div>
                         <div class="latest-box">
                              <a href="transaction.php"><img src="transaction.jpg" /></a>
                                <div class="latest-b-text">
                                    <p>
                                        TRANSACTION
                                    </p>
                                </div>
                        </div>
                         <div class="latest-box">
                                 <a href="transactionhistory.php"><img src="transactionhistory.png" /></a>
                                <div class="latest-b-text">
                                    <p>
                                        TRANSACTION HISTORY
                                    </p>
                                </div>
                        </div>
                </div>
			</section>

    <section class="white-sec" id="features">
      <div class="row">
        <div class="feature-box col-lg-4">
          <i class="fa fa-check-circle fa-4x"></i>
          <h3 class="feature-tilte">Safe transactions</h3>
        </div>

    <div class="feature-box  col-lg-4">
      <i class="fa fa-bullseye fa-4x"></i>
      <h3 class="feature-tilte">Easy to Use</h3>
    </div>

        <div class="feature-box col-lg-4">
          <i class="fa fa-heart fa-4x"></i>
          <h3 class="feature-tilte">Guaranteed to work.</h3>
      </div>
      </div>
      </section>

    <?php
        include 'footer.php';
    ?>
</body>
</html>
