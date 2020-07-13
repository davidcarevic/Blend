<?php
		   if(isset($_POST['btnSubmit'])){
               //echo "asdasdasd";
              
              // var_dump($_POST);


               $user=trim($_POST['user']);
               //var_dump($user);
               $pass1=$_POST['pass1'];
			   
			   $email=trim($_POST['email']);
			   
               $name=trim($_POST['name']);
               $lastname=trim($_POST['lastname']);

			   

              $errors=[];
              

			  $reUser="/^[A-Za-z0-9]{5,20}$/";
			  if(!preg_match($reUser,$user)){

				  $errors[]="Username is not good.";
              }
              $rePass1="/^[A-Za-z0-9]{5,15}$/";
			  if(!preg_match($rePass1,$pass1)){
				  $errors[]="Pass is not good.";
				  
			  }

			  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                   
				   $errors[]="Email is not good.";


              }

              $reName="/^([A-Z]{1}[a-z]{2,19})(\s[A-Z]{1}[a-z]{2,19})*$/";
			  if(!preg_match($reName,$name)){

				  $errors[]="Name is not good.";
              }

              $reLastName="/(^[A-Z]{1}[a-z]{4,39})(\s[A-Z]{1}[a-z]{4,39})*$/";
			  if(!preg_match($reLastName,$lastname)){

				  $errors[]="Lastname is not good.";
			  }
			  $rezUser=$konekcija->prepare("SELECT username FROM user WHERE username=:user");
				$rezUser->bindParam(':user',$user);
				$rezUser->execute();
				$rezU=$rezUser->fetch();
				if($rezU){
					$errors[]= "Username is taken !";
				}
				$rezEmail=$konekcija->prepare("SELECT email FROM user WHERE email=:email");
				$rezEmail->bindParam(':email',$email);
				$rezEmail->execute();
				$rezE=$rezEmail->fetch();
				if($rezE){
					$errors[]= "Email is taken !";
				}
              


			  

			  if(count($errors)>0){

                  echo"<ul style='margin:auto;color:red;text-align:center;'>";
				  foreach($errors as $error){
					  echo "<li style='color:red;'><h4>".$error."</h4></li>";
				  }
				  echo"</ul>";

			  }

			  else{

				 

				



                  $pass1=md5($pass1);
                  
                  $roleid=2;

				 

				  
				

				  

				  $upit="INSERT INTO user VALUES(NULL,:user,:pass1,:email,:name,:lastname,:roleid);";

				  $priprema_upit=$konekcija->prepare($upit);
				  $priprema_upit->bindParam(":user",$user);
				  $priprema_upit->bindParam(":pass1",$pass1);
				  $priprema_upit->bindParam(":email",$email);
				  $priprema_upit->bindParam(":name",$name);
				  
				  $priprema_upit->bindParam(":lastname",$lastname);
				  $priprema_upit->bindParam(":roleid",$roleid);
                    try{
				 $rezultat= $priprema_upit->execute(); 
					}
					catch(PDOException $ex){
						echo $ex->getMessage();
					}
              
				  if($rezultat){

					echo"<p><h4 style='margin:0auto;text-align:center;color:green'>Your account has been created !</h4></p>";
					  
					  
					 
					 

				  }
				  else{ echo "Error with the database.";}


			  }





           }
   
?>
<div class="forme">
    <form action="<?php echo $_SERVER['PHP_SELF'].'?page=reg';?>" method="POST" name="newAcc">
    <table id="reg">
	  <th colspan="2"><h2>New Account</h2></th>
	  
	  <tr>

	    <td><h4>Username:</h4>
			<input class="spi" name="user" type="text"id="user"/>
		</td>
		  
	  </tr>
	 
	  <tr id="hiddenuser" style="display:none"><td colspan="2"><h4>Username must contain 5-20 characters, no special characters !</h4></td></tr>
	  <tr>
	    <td><h4>Password:</h4>
		  <input class="spi" name="pass1" type="password"  id="pass1"/></td>
		  
	  </tr>
	  <tr id="hiddenpass1" style="display:none"><td colspan="2"><h4>Password must contain 5-15 characters, no special characters !</h4></td></tr>
	 
	  
	  <tr>
	    <td><h4>E-mail:</h4>
		  <input class="spi" name="email" type="text"  id="email"/></td>
		  
	 </tr>
	 <tr id="hiddenemail" style="display:none"><td colspan="2"><h4>E-mail must contain "@" and at least 1 "." !</h4></td></tr>
	  <th colspan="2"><h2>Information</h2></th>
	  
	  <tr>
	    <td><h4>First name:</h4>
		  <input class="spi" name="name" type="text"  id="name"/></td>
		
	  </tr>
	  <tr id="hiddenname" style="display:none"><td colspan="2"><h4>Name must contain 3-20 characters, the first letter must be capital, you can type in multiple names !</h4></td></tr>
	  <tr>
	  <td><h4>Last name:</h4>
	  <input class="spi" name="lastname" type="text"  id="lastname"/></td>
	  
	  </tr>
	 <tr id="hiddenlastname" style="display:none"><td colspan="2"><h4>Lastname must contain 5-40 characters, the first letter must be capital, you can type in mutiple lastnames !</h4></td></tr>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  <tr>
	    <td colspan="2"><input class="Btn" type="submit" id="btnSubmit" name="btnSubmit" value="Create your account"/></td>
		
	  </tr>
	 
	 
	</table>
	</form>
	
	</div>
