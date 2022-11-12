<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:home.php');
};

if(isset($_POST['submit'])){

   $address = $_POST['addr1'] .', '.$_POST['addr2'].', '.$_POST['addr3'].', '.$_POST['city'] .', '. $_POST['postCode'] .', '. $_POST['district'] .', Sri Lanka. ';
   $address = filter_var($address, FILTER_SANITIZE_STRING);

   $update_address = $conn->prepare("UPDATE `users` set address = ? WHERE id = ?");
   $update_address->execute([$address, $user_id]);

   $message[] = 'Address saved!';
   header('location:profile.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update Address</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">


  

</head>
<body>
   
<?php include 'components/user_header.php' ?>

<section class="form-container">

   <form action="" method="post">
      <h3>Your Address</h3>
      <input type="text" class="box" placeholder="Address Line 1" required maxlength="50" name="addr1">
      <input type="text" class="box" placeholder="Address Line 2 (optional)" maxlength="50" name="addr2">
      <input type="text" class="box" placeholder="Address Line 3 (optional)" maxlength="50" name="addr3">
      <input type="text" class="box" placeholder="City" required maxlength="50" name="city">
      <input type="text" class="box" placeholder="Postal Code" required maxlength="50" name="postCode">
      <input type="text" class="box" placeholder="District" required maxlength="50" name="district">
      <!-- <label><h3 class ="form-container">Sri Lanka</h3></label> -->
      
      <input type="submit" value="save address" name="submit" class="btn">
   </form>

</section>










<?php include 'components/footer.php' ?>







<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>