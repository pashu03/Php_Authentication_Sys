<?php require "includes/header.php"; ?>

<?php require "config.php"; ?>

<?php


if(isset($_SESSION['username'])){
  header("location: index.php");

}
if(isset($_POST['submit']))
{
  if($_POST['email'] =="" OR $_POST['password'] ==""){
  
    echo "Some inputs are empty!";
 }else{

    $email = $_POST['email'];
    $password = $_POST['password'];

    $login = $conn->query ("SELECT * FROM users WHERE email = '$email'");

        $login->execute();

        $data =$login->fetch(PDO::FETCH_ASSOC);   

    //  echo $login->rowcount();
    if($login->rowCount() > 0){

      if(password_verify($password, $data['mypassword'])) 
      {
        // echo "logged in successfully!";
        $_SESSION['username'] =$_data['username'];
        $_SESSION['email'] =$_data['email'];
        header("location: indes.php");
      } else{
        echo "Email or password is incorrect!";
      }

    } else{
      echo "Email or password is Wrong!";
      }
  }
}



?>

<main class="form-signin w-50 m-auto">
  <form method="POST" action="login.php">
    <h1 class="h3 mt-5 fw-normal text-center">Please sign in</h1>

    <div class="form-floating">
      <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <!-- <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="user.name">
      <label for="floatingInput">Username</label>
    </div> -->
    <div class="form-floating">
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <button name="submit" class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <h6 class="mt-3">Don't have an account  <a href="register.php">Create your account</a></h6>
  </form>
</main>
<?php require "includes/footer.php"; ?>
