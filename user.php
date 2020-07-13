<?php
  if(isset($_SESSION['user'])&& $_SESSION['user']->role=='user'):
?>

<h2 style="margin:10px auto;text-align:center;">Hello <?php echo $_SESSION['user']->username;?>, here you can update your data.</h2>




<?php


   if(isset($_POST['update'])){

    $errors=[];


    $pass1=$_POST['pass1'];
    $email=$_POST['email'];
    $id=$_SESSION['user']->idUser;

    $rePass1="/^[A-Za-z0-9]{5,15}$/";
    if(!preg_match($rePass1,$pass1)){
      $errors[]="Pass is not good.";
      
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
               
       $errors[]="Email is not good.";


          }

      $upit=$konekcija->prepare("SELECT * FROM user WHERE email=:email");
      $upit->bindParam(':email',$email);
      $upit->execute();
      $rez=$upit->fetch();
      //echo $rez->email;
      if($rez && $rez->email!=$_SESSION['user']->email){
        $errors[]="The email you entered is taken.";
      }
      
      if(count($errors)>0){

        echo"<ul style='margin:0 auto;color:red;text-align:center;'>";
foreach($errors as $error){
  echo "<li style='color:red;list-style:none'><h4>".$error."</h4></li>";
}
echo"</ul>";

}

else{

				 

				



  $pass1=md5($pass1);
  
  








$upit="UPDATE user SET password=:pass1,email=:email WHERE id=:id";

$priprema_upit=$konekcija->prepare($upit);

$priprema_upit->bindParam(":pass1",$pass1);
$priprema_upit->bindParam(":email",$email);
$priprema_upit->bindParam(":id",$id);

    try{
$rezultat= $priprema_upit->execute(); 
}
catch(PDOException $ex){
echo $ex->getMessage();
}

if($rezultat){

echo"<p><h4 style='margin:0auto;text-align:center;color:green'>Your account has been updated !</h4></p>";
$_SESSION['user']->email=$email;





}
else{ echo "Error with the database.";}


}


   }
?>

<div class="forme">
 <form name="forma" method="POST" action="<?php echo $_SERVER['PHP_SELF'].'?page=user'?>">

   <table>

      
      
      <tr>
        <td><h4>New password:</h4> <input name="pass1" class="spi" id="pass1" type="password"/><td></tr>
     </tr>
     <tr id="hiddenpass1" style="display:none"><td colspan="2"><h4>Password must contain 5-15 characters, no special characters !</h4></td></tr>
      <tr>
        <td><h4>New Email:</h4>
      <input type="email" name="email" class="spi" id="email" value="<?php echo $_SESSION['user']->email;?>"/><td>
     </tr>
     <tr id="hiddenemail" style="display:none"><td colspan="2"><h4>E-mail must contain "@" and at least 1 "." !</h4></td></tr>

     <tr>
       <td><input type="submit" class="Btn" name="update" value="Update your account"><td>
     </tr>
  </table>


 </form>
</div>


















<?php else: echo "<p><h2 style='color:red;text-align:center;'>Error 403. You cannot access this page.</h2></p>";
header('Location:index.php');
  endif;
?>