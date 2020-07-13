<?php 

       
if(isset($_POST['btnLogIn'])){

  $username=trim($_POST['username']);
  $password=$_POST['password'];
  $password=md5($password);
 
  

  

  $upit="SELECT *,u.id AS idUser FROM user u INNER JOIN role r ON u.idRole=r.id WHERE username=:username AND password=:password";
  
  $priprema=$konekcija->prepare($upit);
  $priprema->bindParam(":username",$username);
  $priprema->bindParam(":password",$password);

  $rez=$priprema->execute();
  $red=$priprema->fetch();
  
  



  if($red){

       $_SESSION['user']=$red;
       //var_dump($_SESSION['user']);
      


  }
  else{
         echo"<script>
            alert('Wrong username or password!');
         
         </script>";

  }
   
  

  


}
?>
<!DOCTYPE html>
<html>


<head>
<title>Coffee Store Blend</title>
    <meta charset='UTF-8'/>
    <meta name="description" content="Coffee Store Blend website dedicated to all lovers of coffee."/>
<meta name="keyword" content="coffee,store,blend"/>
<meta name="viewport" content="width=device-width">
   <link rel="stylesheet" type="text/css" href="stil.css"/>
   <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <link href="lightbox/src/css/lightbox.css" rel="stylesheet">
   <script src="lightbox/src/js/lightbox.js"></script>
   
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <script type="text/javascript" src="efekti.js"></script>

   <link rel="shortcut icon" href="slike/coffeeicon.png" type="image/x-icon"/>

   <!-- fotorama -->
   
   <link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>

   <!-- fotorama -->

</head>
<body>
<div id="header">
<div id="logo">
 <a href="index.php"><img src="slike/coffee2_f.png" alt="Logo"/>
  <h1>Coffee Store Blend<h1>
 </a>
 
 
 
</div>
<div id="nav">
   <ul>
    <?php
       $upit=executeQuery('SELECT * FROM nav WHERE type=1');
       foreach ($upit as $red){
         echo "<li><a href=".$red->href.">".$red->name."</a></li>";
       }

       if(isset($_SESSION['user'])&& $_SESSION['user']->role=='admin'){
       $upit=executeQuery('SELECT * FROM nav WHERE type=2 OR type=5');
       foreach($upit as $red){
        echo "<li><a href=".$red->href.">".$red->name."</a></li>";
       }
      
      }
      elseif(isset($_SESSION['user'])&& $_SESSION['user']->role=='user'){
        $upit=executeQuery('SELECT * FROM nav WHERE type=2 OR type=4');
       foreach($upit as $red){
         if($red->name=='User'){echo "<li><a href=".$red->href.">".$_SESSION['user']->username."</a></li>";}
         else{
        echo "<li><a href=".$red->href.">".$red->name."</a></li>";
         }
       }


      }
      else{
        $upit=executeQuery('SELECT * FROM nav WHERE type=3');
        foreach($upit as $red){
          if($red->name=="Log In"){echo "<li id='showSrc'><a href=".$red->href.">".$red->name."</a></li>";}
          else{
          echo "<li><a href=".$red->href.">".$red->name."</a></li>";
          }
          
        }
      }
       //var_dump($upit);
       
            


      

          
  
         

       
       

    ?>
	
	 
	
	
	
	
	
	
   
   </ul>

    
   <div class="dropdown">
               <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                  
			        <input  type="text" placeholder="Username" name="username" id="userLog"/><input  type="password" name="password" placeholder="Password" id="passLog"/><input type="submit" value="Log In" class='Btn' name="btnLogIn" id="searchBtn"/>
                 
                </form> 
	</div>	

</div>


</div>
<div id="center">


