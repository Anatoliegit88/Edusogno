<?php
include('config.php');
session_start();
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = $connection->prepare("SELECT * FROM utenti WHERE EMAIL=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
        echo '<p class="error">email password combination is wrong!</p>';
    } else {
        if (password_verify($password, $result['password'])) {
            $_SESSION['user_id'] = $result['id'];
            echo '<p class="success">Congratulations, you are logged in!</p>';
        } else {
            echo '<p class="error">email password combination is wrong!</p>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Edusogno</title>
</head>
<body>
  <main class="container">
      <div class="header">
        <img class="logo" src="./foto/Group 181logo.png" alt="">
      </div>
    <div class="hero">
      <img class="circle-right" src="./foto/Ellipse 12right-circle.png" alt="white circle">
      <img class="circle-left" src="./foto/Ellipse 13left-circle.png" alt="white circle">
      <h1 class="title">Hai già un account ?</h1>
      <div class="hero-form">
        <form class="form" action="" method="POST">
          <label class="credentials">Inserisci l'e-mail </label>  
          <input class="input" type="text"  placeholder="name@example.com">
          <label class="credentials">Inserisci la password</label>
          <div class="d-flex">
            <input  class="input" type="text"  placeholder="Scrivila qui">
           <span><i class="fa-solid fa-eye" style="color: #0057ff;"></i></span> 
          </div>
          <button class="btn">ACCEDI</button>
          <p class="profile">Non hai ancora un profilo? <span class="span"><a href="">Registrati</a> </span></p>
        </form>
      </div>
      <footer class="footer">
        <img class="right-vawe" src="./foto/Vector 5rightsightfooter.png" alt="vawe">
        <img class="left-vawe" src="./foto/Vector 4leftsidefooter.png" alt="vawe">
        <img class="bottom-vawe" src="./foto/Vector 1whitefooter.png" alt="vawe">
        <img class="vector-left" src="./foto/Vector 2vector-left.png" alt="vector">
        <img class="polygon" src="./foto/Polygon 1polygon.png" alt="polygon">
        <img class="rectangle" src="./foto/Rectangle 1083rectangle.png" alt="rectangle">
        <img class="rectangle-small" src="./foto/Rectangle 1084small-rectangle.png" alt="small rectangle">
        <img class="vector-right" src="./foto/Vector 3vector-right.png" alt="vector">
        <img class="small-circle" src="./foto/Ellipse 11small-circle.png" alt="circle">
      </footer>
    </div>
  </main>
  
</body>
</html>
