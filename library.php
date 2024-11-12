<!DOCTYPE html>
<html>
<head>
  <title>Library</title>
</head>
<body>
  <h1>Welcome to the Library</h1>
  <button onclick="location.href='https://libraries.msu.ac.zw/'">Visit MSU Libraries</button>
</body>
</html>
<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['send'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $msg = $_POST['msg'];
   $msg = filter_var($msg, FILTER_SANITIZE_STRING);

   $select_message = $conn->prepare("SELECT * FROM messages WHERE name = ? AND email = ? AND number = ? AND message = ?");
   $select_message->execute([$name, $email, $number, $msg]);

   if($select_message->rowCount() > 0){
      $message[] = 'already sent message!';
   }else{

      $insert_message = $conn->prepare("INSERT INTO messages(user_id, name, email, number, message) VALUES(?,?,?,?,?)");
      $insert_message->execute([$user_id, $name, $email, $number, $msg]);

      $message[] = 'sent message successfully!';

   }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Library Management System</title>

  <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
<link rel="stylesheet" href="css/library.css">

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<?php include 'components/user_header.php'; ?>

<?php include 'components/hero2.php'; ?>

<section>
    <div class="container">
    <div class="row h-100 g-2 py-1">
      <div class="col-md-4">
        <div class="card card-span h-100 text-white"><img class="card-img h-100" src="./images/medicine.jpg" alt="..." />
          <div class="card-img-overlay bg-dark-gradient">
            <div class="d-flex align-items-end justify-content-center h-100"><a class="btn btn-lg text-light fs-1" href="https://library.msu.ac.zw/ebooks" role="button">Medicine
                <svg class="bi bi-arrow-right-short" xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"> </path>
                </svg></a></div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-span h-100 text-white"><img class="card-img h-100" src="./images/computerscience.jpg" alt="..." />
          <div class="card-img-overlay bg-dark-gradient">
            <div class="d-flex align-items-end justify-content-center h-100"><a class="btn btn-lg text-light fs-1" href="https://library.msu.ac.zw/ebooks" role="button">Computer Science
                <svg class="bi bi-arrow-right-short" xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"> </path>
                </svg></a></div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-span h-100 text-white"><img class="card-img h-100" src="./images/psychology.jpg" alt="..." />
          <div class="card-img-overlay bg-dark-gradient">
            <div class="d-flex align-items-end justify-content-center h-100"><a class="btn btn-lg text-light fs-1" href="https://library.msu.ac.zw/ebooks" role="button">Psychology
                <svg class="bi bi-arrow-right-short" xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"> </path>
                </svg></a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>
