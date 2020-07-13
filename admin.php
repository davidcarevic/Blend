<?php
  if(isset($_SESSION['user'])&& $_SESSION['user']->role=='admin'):
?>
<div id="omotAdmin">
<div id="desni">
<h3>Select a site page from the menu and edit it! To delete and update rows, use the checkboxes at the left of them.</h3>


<!--DELETE-->
<?php
  if(isset($_POST['delete-user'])){

    if(isset($_POST['cb'])){
    $cb=$_POST['cb'];

    foreach($cb as $c){
    $upit=$konekcija->prepare("DELETE FROM user WHERE id=:c");
    $upit->bindParam(':c',$c);
    $rez=$upit->execute();
    if($rez){
      echo"<h4 style='color:green;'>Users  have been deleted! </h4>";
    }
    else{
      echo"<h4 style='color:red;'>Error! </h4>";
    }

  }
}
else{
  echo"<h4 style='color:red;'>Error you must check something! </h4>";
}

  

  }

  
  if(isset($_POST['delete-nav'])){
    if(isset($_POST['cb'])){
      $cb=$_POST['cb'];

    foreach($cb as $c){
    $upit=$konekcija->prepare("DELETE FROM nav WHERE id=:c");
    $upit->bindParam(':c',$c);
    $rez=$upit->execute();
    if($rez){
      echo"<h4 style='color:green;'>Link  have been deleted! </h4>";
    }
    else{
      echo"<h4 style='color:red;'>Error! </h4>";
    }

  }
}
else{
  echo"<h4 style='color:red;'>Error you must check something! </h4>";
}

  

  }


  if(isset($_POST['delete-home-text'])){
    if(isset($_POST['cb'])){
      $cb=$_POST['cb'];

    foreach($cb as $c){
    $upit=$konekcija->prepare("DELETE FROM home_text WHERE id=:c");
    $upit->bindParam(':c',$c);
    $rez=$upit->execute();
    if($rez){
      echo"<h4 style='color:green;'>Text has been deleted! </h4>";
    }
    else{
      echo"<h4 style='color:red;'>Error! </h4>";
    }

  }
}
else{
  echo"<h4 style='color:red;'>Error you must check something! </h4>";
}

  

  }  

  if(isset($_POST['delete-home-image'])){
    if(isset($_POST['cb'])){
      $cb=$_POST['cb'];

    foreach($cb as $c){
    $upit=$konekcija->prepare("DELETE FROM home_image WHERE id=:c");
    $upit->bindParam(':c',$c);
    $rez=$upit->execute();
    if($rez){
      echo"<h4 style='color:green;'>Images have been deleted! </h4>";
    }
    else{
      echo"<h4 style='color:red;'>Error! </h4>";
    }

  }
}
else{
  echo"<h4 style='color:red;'>Error you must check something! </h4>";
}

  

  }


  if(isset($_POST['delete-shop'])){
    if(isset($_POST['cb'])){
      $cb=$_POST['cb'];

    foreach($cb as $c){
    $upit=$konekcija->prepare("DELETE FROM shop WHERE id=:c");
    $upit->bindParam(':c',$c);
    $rez=$upit->execute();
    if($rez){
      echo"<h4 style='color:green;'>Items have been deleted! </h4>";
    }
    else{
      echo"<h4 style='color:red;'>Error! </h4>";
    }

  }
}
else{
  echo"<h4 style='color:red;'>Error you must check something! </h4>";
}

  

  }

  if(isset($_POST['delete-poll'])){
    if(isset($_POST['cb'])){
      $cb=$_POST['cb'];

    foreach($cb as $c){
    $upit=$konekcija->prepare("DELETE FROM poll WHERE id=:c");
    $upit->bindParam(':c',$c);
    $rez=$upit->execute();
    if($rez){
      echo"<h4 style='color:green;'>Votes have been deleted! </h4>";
    }
    else{
      echo"<h4 style='color:red;'>Error! </h4>";
    }

  }
}
else{
  echo"<h4 style='color:red;'>Error you must check something! </h4>";
}

  

  }


?>


<!--DELETE-->













<!--INSERT-->
<?php

if(isset($_POST['insert-user'])){

  $user=$_POST['newusername'];
  $pass1=$_POST['newpassword'];
  $email=$_POST['newemail'];
  $name=$_POST['newname'];
  $lastname=$_POST['newlastname'];
  $roleId=$_POST['newrole'];

  $errors=[];
  
  $reRoleId="/^[1-2]{1}$/";
  if(!preg_match($reRoleId,$roleId)){$errors[]="Role Id is not okay.";}
              

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

        $reName="/(^[A-Z]{1}[a-z]{2,19})(\s[A-Z]{1}[a-z]{2,19})*$/";
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
      echo "<li style='color:red;list-style:none;'><h4>".$error."</h4></li>";
    }
    echo"</ul>";

  }
  else{

				 

				



    $pass1=md5($pass1);
    
    








$upit="INSERT INTO user VALUES(NULL,:user,:pass1,:email,:name,:lastname,:roleid);";

$priprema_upit=$konekcija->prepare($upit);
$priprema_upit->bindParam(":user",$user);
$priprema_upit->bindParam(":pass1",$pass1);
$priprema_upit->bindParam(":email",$email);
$priprema_upit->bindParam(":name",$name);

$priprema_upit->bindParam(":lastname",$lastname);
$priprema_upit->bindParam(":roleid",$roleId);
      try{
$rezultat= $priprema_upit->execute(); 
}
catch(PDOException $ex){
echo $ex->getMessage();
}

if($rezultat){

echo"<p><h4 style='margin:0auto;text-align:center;color:green'>A new account has been inserted !</h4></p>";





}
else{ echo "Error with the database.";}


}

  
}

if(isset($_POST['insert-nav'])){

  $errors=[];

  $hrefP=$_POST['newhref'];
  $href="";
  if($hrefP=="#"){$href="#";}
  else{
    
    $reHref="/^[A-Za-z0-9\.\?\=\:\/\-]{1,50}$/";

  if(!preg_match($reHref,$hrefP)){$errors[]="You can eather type in a link or '#'.";}
  $href=$hrefP;
  }
  $name=$_POST['newname'];
  $reName="/^[A-z]{1,50}$/";
  if(!preg_match($reName,$name)){$errors[]="Wrong format of the link name.";}
  $type=$_POST['newtype'];
  $reType="/^[1-5]{1}$/";
  if(!preg_match($reType,$type)){$errors[]="Type can only be from 1 to 5";}


  if(count($errors)>0){

    echo"<ul style='margin:auto;color:red;text-align:center;'>";
foreach($errors as $error){
echo "<li style='color:red;list-style:none;'><h4>".$error."</h4></li>";
}
echo"</ul>";

}
else{

  $upit=$konekcija->prepare("INSERT INTO nav VALUES(NULL,:href,:name,:type)");
  $upit->bindParam(':href',$href);
  $upit->bindParam(':name',$name);
  $upit->bindParam('type',$type);
  

  try{
    $rez=$upit->execute(); 
    }
    catch(PDOException $ex){
    echo $ex->getMessage();
    }
    
    if($rez){
    
    echo"<p><h4 style='margin:0auto;text-align:center;color:green'>A new navigation item has been created !</h4></p>";
    
    
    
    
    
    }
    else{ echo "Error with the database.";}


}



 

 
}

if(isset($_POST['insert-home-text'])){
  $errors=[];
  $text="";

  if($_POST['newtext']!=""){
  $text=$_POST['newtext'];}

  else{$errors[]="The textfield must not be empty !";}

  //echo $text;
  

  

  if(count($errors)>0){

    echo"<ul style='margin:auto;color:red;text-align:center;'>";
foreach($errors as $error){
echo "<li style='color:red;list-style:none;'><h4>".$error."</h4></li>";
}
echo"</ul>";

}
else{
  $upit=$konekcija->prepare("INSERT INTO home_text VALUES(NULL,:text)");
  $upit->bindParam(':text',$text);

  try{
    $rez=$upit->execute(); 
    }
    catch(PDOException $ex){
    echo $ex->getMessage();
    }
    
    if($rez){
    
    echo"<p><h4 style='margin:0auto;text-align:center;color:green'>New homepage text has been added !</h4></p>";
    
    
    
    
    
    }
    else{ echo "Error with the database.";}

}




}

if(isset($_POST['insert-home-image'])){

  $errors=[];

  $slika=$_FILES['newsrc'];
  $tip=$slika['type'];
  $name=$slika['name'];
  $tmp=$slika['tmp_name'];
  $size=$slika['size'];

  $filter=array('image/jpg','image/jpeg','image/png');

  $src="slike/".time().$name;



  $alt=$_POST['newalt'];

 // echo $alt."<br/>";
  //var_dump($slika);

  $reAlt="/^[A-Za-z0-9\s]{1,50}$/";

  if(!preg_match($reAlt,$alt)){$errors[]="Alt is in the wrong format";}

  if(!in_array($tip,$filter)){$errors[]='Image type is not okay.';}
  if($size>3500000){$errors[]='The image must not be larger than 3.5MB';}




  if(count($errors)>0){

    echo"<ul style='margin:auto;color:red;text-align:center;'>";
foreach($errors as $error){
echo "<li style='color:red;list-style:none;'><h4>".$error."</h4></li>";
}
echo"</ul>";


}
else{

  $upload=move_uploaded_file($tmp,$src);
  if($upload){
    
    echo"<p><h4 style='margin:0auto;text-align:center;color:green'>Image uploaded !</h4></p>";

    $upit=$konekcija->prepare("INSERT INTO home_image VALUES(NULL,:src,:alt)");
    $upit->bindParam(":src",$src);
    $upit->bindParam(':alt',$alt);

    try{
      $rez=$upit->execute(); 
      }
      catch(PDOException $ex){
      echo $ex->getMessage();
      }
      
      if($rez){
      
      echo"<p><h4 style='margin:0auto;text-align:center;color:green'>New image has been added to the homepage !</h4></p>";
      
      
      
      
      
      }
      else{ echo "Error with the database.";}
  }
  else{
    echo"<p><h4 style='margin:0auto;text-align:center;color:red'>Image was not uploaded .</h4></p>";

  }
}


}

if(isset($_POST['insert-shop'])){
  //335x250
  //$putanja_mala="slike/mala_".time().$ime_fajla;
	//malaSlika($putanja,$putanja_mala,100,100);

  $errors=[];

  $slika=$_FILES['newsrc'];

  $tip=$slika['type'];
  $name=$slika['name'];
  $tmp=$slika['tmp_name'];
  $size=$slika['size'];

  $filter=array('image/jpg','image/jpeg','image/png');

  $src="slike/shop/".time().$name;
  $src_mala="slike/thumbnails/".time().$name;

  //echo $src."<br/>".$src_mala."<br/>";



  $title=$_POST['newtitle'];
  $reTitle="/^([A-Z]{1}[a-z]{2,19})(\s[A-Z]{1}[a-z]{2,19})*$/";

  if(!preg_match($reTitle,$title)){$errors[]="Title is in the wrong format.";}

  $price=$_POST['newprice'];
  $rePrice="/^[0-9]{1,10}$/";
  if(!preg_match($rePrice,$price)){$errors[]="Price is in the wrong format.";}

  $description="";
  if($_POST['newdescription']!=""){
    $description=$_POST['newdescription'];}
  
    else{$errors[]="The textfield must not be empty !";}

  

 
  //var_dump($slika);

  

  

  if(!in_array($tip,$filter)){$errors[]='Image type is not okay.';}
  if($size>3500000){$errors[]='The image must not be larger than 3.5MB';}

  if(count($errors)>0){

    echo"<ul style='margin:auto;color:red;text-align:center;'>";
foreach($errors as $error){
echo "<li style='color:red;list-style:none;'><h4>".$error."</h4></li>";
}
echo"</ul>";


}

else{

  $upload=move_uploaded_file($tmp,$src);
  malaSlika($src,$src_mala,335,250);
  if($upload){
    
    echo"<p><h4 style='margin:0auto;text-align:center;color:green'>Image uploaded !</h4></p>";

    $upit=$konekcija->prepare("INSERT INTO shop VALUES(NULL,:src,:src_mala,:title,:price,:description)");
    $upit->bindParam(":src",$src);
    $upit->bindParam(':src_mala',$src_mala);
    $upit->bindParam(':title',$title);
    $upit->bindParam(':price',$price);
    $upit->bindParam(':description',$description);

    try{
      $rez=$upit->execute(); 
      }
      catch(PDOException $ex){
      echo $ex->getMessage();
      }
      
      if($rez){
      
      echo"<p><h4 style='margin:0auto;text-align:center;color:green'>New item has been added to the shop !</h4></p>";
      
      
      
      
      
      }
      else{ echo "Error with the database.";}
  }
  else{
    echo"<p><h4 style='margin:0auto;text-align:center;color:red'>Image was not uploaded .</h4></p>";

  }
}


}


if(isset($_POST['insert-poll'])){

  $errors=[];

   $voteId=$_POST['newvoteid'];
   $vote=$_POST['newvote'];

   $reVoteId="/^[0-9]{1,10}$/";
   $reVote="/^([A-Z]{1}[a-z]{2,39})(\s[A-Z]{1}[a-z]{2,39})*$/";

   //echo $voteId." ".$vote;

   if(!preg_match($reVoteId,$voteId)){$errors[]="Id is not in the correct format.";}
   if(!preg_match($reVote,$vote)){$errors[]="Vote name is not in the correct format";}


   $upitId=$konekcija->prepare("SELECT * FROM poll WHERE id=:id");
   $upitId->bindParam(':id',$voteId);
   $rezultat=$upitId->execute();
   $rezultat=$upitId->fetch();
   if($rezultat){
     $errors[]="You must choose a differnt ID for the vote.";
   }

   if(count($errors)>0){

    echo"<ul style='margin:auto;color:red;text-align:center;'>";
foreach($errors as $error){
echo "<li style='color:red;list-style:none;'><h4>".$error."</h4></li>";
}
echo"</ul>";


}
else{
  $upit=$konekcija->prepare("INSERT INTO poll VALUES(:id,:vote_name)");
  $upit->bindParam(':id',$voteId);
  $upit->bindParam(':vote_name',$vote);

  try{
    $rez=$upit->execute(); 
    }
    catch(PDOException $ex){
    echo $ex->getMessage();
    }
    
    if($rez){
    
    echo"<p><h4 style='margin:0auto;text-align:center;color:green'>New vote option has been added!</h4></p>";
    
    
    
    
    
    }
    else{ echo "Error with the database.";}


}




}






















?>




<!--INSERT-->




<!--UPDATE-->
<?php
if(isset($_POST['update-user'])){

  if(isset($_POST['cb'])){
  $cb=$_POST['cb'];

  foreach($cb as $c){
   $id=$c;
   $user=$_POST['username'.$c];
   $pass1=$_POST['pass'.$c];
   $email=$_POST['email'.$c];
   $name=$_POST['name'.$c];
   $lastname=$_POST['lastname'.$c];
   $roleId=$_POST['idRole'.$c];

   //echo $id."<br/>".$user."<br/>".$pass."<br/>".$email."<br/>".$name."<br/>".$lastname."<br/>".$idRole."<br/>";

   $errors=[];
  
  $reRoleId="/^[1-2]{1}$/";
  if(!preg_match($reRoleId,$roleId)){$errors[]="Role Id is not okay.";}
              

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

        $reName="/(^[A-Z]{1}[a-z]{2,19})(\s[A-Z]{1}[a-z]{2,19})*$/";
  if(!preg_match($reName,$name)){

    $errors[]="Name is not good.";
        }

        $reLastName="/(^[A-Z]{1}[a-z]{4,39})(\s[A-Z]{1}[a-z]{4,39})*$/";
  if(!preg_match($reLastName,$lastname)){

    $errors[]="Lastname is not good.";
  }

  $rezUser=$konekcija->prepare("SELECT id,username FROM user WHERE username=:user");
  $rezUser->bindParam(':user',$user);
  $rezUser->execute();
  $rezU=$rezUser->fetch();
  if($rezU){
    if($rezU->id!=$id){
    $errors[]= "Username is taken !";
    }
  }
  $rezEmail=$konekcija->prepare("SELECT id,email FROM user WHERE email=:email");
  $rezEmail->bindParam(':email',$email);
  $rezEmail->execute();
  $rezE=$rezEmail->fetch();
  if($rezE){
    if($rezE->id!=$id){
    $errors[]= "Email is taken !";
    }
  }
  
        


  

  if(count($errors)>0){

            echo"<ul style='margin:auto;color:red;text-align:center;'>";
    foreach($errors as $error){
      echo "<li style='color:red;list-style:none;'><h4>".$error."</h4></li>";
    }
    echo"</ul>";

  }
  else{

				 

				



    $pass1=md5($pass1);
    
    








$upit="UPDATE user SET username=:user,password=:pass1,email=:email,name=:name,lastname=:lastname,idRole=:roleid WHERE id=:id;";

$priprema_upit=$konekcija->prepare($upit);
$priprema_upit->bindParam(":id",$id);
$priprema_upit->bindParam(":user",$user);
$priprema_upit->bindParam(":pass1",$pass1);
$priprema_upit->bindParam(":email",$email);
$priprema_upit->bindParam(":name",$name);

$priprema_upit->bindParam(":lastname",$lastname);
$priprema_upit->bindParam(":roleid",$roleId);
      try{
$rezultat= $priprema_upit->execute(); 
}
catch(PDOException $ex){
echo $ex->getMessage();
}

if($rezultat){

echo"<p><h4 style='margin:0auto;text-align:center;color:green'>User has been updated !</h4></p>";





}
else{ echo "Error with the database.";}


}

  

}


}
else{
echo"<h4 style='color:red;'>Error you must check something! </h4>";
}



}

if(isset($_POST['update-nav'])){


  if(isset($_POST['cb'])){
    $cb=$_POST['cb'];
  
    foreach($cb as $c){
     $id=$c;
     $hrefP=$_POST['href'.$c];
     $name=$_POST['name'.$c];
     $type=$_POST['type'.$c];


     
    
  
     
  
     $errors=[];

     $href="";
  if($hrefP=="#"){$href="#";}
  else{
    
    $reHref="/^[A-Za-z0-9\.\?\=\:\/\-]{1,50}$/";

  if(!preg_match($reHref,$hrefP)){$errors[]="You can eather type in a link or '#'.";}
  $href=$hrefP;
  }
  
  $reName="/^[A-z]{1,50}$/";
  if(!preg_match($reName,$name)){$errors[]="Wrong format of the link name.";}
  
  $reType="/^[1-5]{1}$/";
  if(!preg_match($reType,$type)){$errors[]="Type can only be from 1 to 5";}

    
    
    
          
  
  
    
  
    if(count($errors)>0){
  
              echo"<ul style='margin:auto;color:red;text-align:center;'>";
      foreach($errors as $error){
        echo "<li style='color:red;list-style:none;'><h4>".$error."</h4></li>";
      }
      echo"</ul>";
  
    }
    else{
  
           
  
          
  
  
  
     
      
      
  
  
  
  
  
  
  
  
  $upit="UPDATE nav SET href=:href,name=:name,type=:type WHERE id=:id;";
  
  $priprema_upit=$konekcija->prepare($upit);
  $priprema_upit->bindParam(":id",$id);
  $priprema_upit->bindParam(":href",$href);
  $priprema_upit->bindParam(":name",$name);
  $priprema_upit->bindParam(":type",$type);
  
        try{
  $rezultat= $priprema_upit->execute(); 
  }
  catch(PDOException $ex){
  echo $ex->getMessage();
  }
  
  if($rezultat){
  
  echo"<p><h4 style='margin:0auto;text-align:center;color:green'>Navigation element has been updated !</h4></p>";
  
  
  
  
  
  }
  else{ echo "Error with the database.";}
  
  
  }
  
    
  
  }
  
  
  }
  else{
  echo"<h4 style='color:red;'>Error you must check something! </h4>";
  }


}


if(isset($_POST['update-home-text'])){

  $errors=[];
   if(isset($_POST['cb'])){
  $cb=$_POST['cb'];
  
  foreach($cb as $c){
   $id=$c;
   $text="";

   if($_POST['text'.$c]!=""){
    $text=$_POST['text'.$c];}
  
    else{$errors[]="The textfield must not be empty !";}
   


   
  

   

   

   
  
  
  
        


  

  if(count($errors)>0){

            echo"<ul style='margin:auto;color:red;text-align:center;'>";
    foreach($errors as $error){
      echo "<li style='color:red;list-style:none;'><h4>".$error."</h4></li>";
    }
    echo"</ul>";

  }
  else{

         

        



   
    
    








$upit="UPDATE home_text SET text=:text WHERE id=:id;";

$priprema_upit=$konekcija->prepare($upit);
$priprema_upit->bindParam(":id",$id);
$priprema_upit->bindParam(":text",$text);


      try{
$rezultat= $priprema_upit->execute(); 
}
catch(PDOException $ex){
echo $ex->getMessage();
}

if($rezultat){

echo"<p><h4 style='margin:0auto;text-align:center;color:green'>Home text has been updated !</h4></p>";





}
else{ echo "Error with the database.";}

  }

}
   }



  





else{
echo"<h4 style='color:red;'>Error you must check something! </h4>";
}



}




if(isset($_POST['update-home-image'])){

  if(isset($_POST['cb'])){
  $cb=$_POST['cb'];

  foreach($cb as $c){
   $id=$c;
   $errors=[];

  $slika=$_FILES['src'.$c];
  $tip=$slika['type'];
  $name=$slika['name'];
  $tmp=$slika['tmp_name'];
  $size=$slika['size'];

  $filter=array('image/jpg','image/jpeg','image/png');

  $src="slike/".time().$name;



  $alt=$_POST['alt'.$c];

 // echo $alt."<br/>";
  //var_dump($slika);

  $reAlt="/^[A-Za-z0-9\s]{1,50}$/";

  if(!preg_match($reAlt,$alt)){$errors[]="Alt is in the wrong format";}

  if(!in_array($tip,$filter)){$errors[]='Image type is not okay.';}
  if($size>3500000){$errors[]='The image must not be larger than 3.5MB';}




  if(count($errors)>0){

    echo"<ul style='margin:auto;color:red;text-align:center;'>";
foreach($errors as $error){
echo "<li style='color:red;list-style:none;'><h4>".$error."</h4></li>";
}
echo"</ul>";


}
else{

  $upload=move_uploaded_file($tmp,$src);
  if($upload){
    
    echo"<p><h4 style='margin:0auto;text-align:center;color:green'>Image uploaded !</h4></p>";

    $upit=$konekcija->prepare("UPDATE home_image SET src=:src,alt=:alt WHERE id=:id");
    $upit->bindParam(":id",$id);
    $upit->bindParam(":src",$src);
    $upit->bindParam(':alt',$alt);

    try{
      $rez=$upit->execute(); 
      }
      catch(PDOException $ex){
      echo $ex->getMessage();
      }
      
      if($rez){
      
      echo"<p><h4 style='margin:0auto;text-align:center;color:green'>Home image has been updated !</h4></p>";
      
      
      
      
      
      }
      else{ echo "Error with the database.";}
  }
  else{
    echo"<p><h4 style='margin:0auto;text-align:center;color:red'>Image was not uploaded .</h4></p>";

  }
}
   

  

}


}
else{
echo"<h4 style='color:red;'>Error you must check something! </h4>";
}



}

if(isset($_POST['update-about'])){

  if(isset($_POST['cb'])){
    $cb=$_POST['cb'];
  
    foreach($cb as $c){
     $id=$c;
     $errors=[];
  
    $slika=$_FILES['src'.$c];
    $tip=$slika['type'];
    $name=$slika['name'];
    $tmp=$slika['tmp_name'];
    $size=$slika['size'];
  
    $filter=array('image/jpg','image/jpeg','image/png');
  
    $src="slike/".time().$name;
  
  
  
    $alt=$_POST['alt'.$c];

    if($_POST['text'.$c]!=""){
      $text=$_POST['text'.$c];}
    
      else{$errors[]="The textfield must not be empty !";}
  
   // echo $alt."<br/>";
    //var_dump($slika);
  
    $reAlt="/^[A-Za-z0-9\s]{1,50}$/";
  
    if(!preg_match($reAlt,$alt)){$errors[]="Alt is in the wrong format";}
  
    if(!in_array($tip,$filter)){$errors[]='Image type is not okay.';}
    if($size>3500000){$errors[]='The image must not be larger than 3.5MB';}
  
  
  
  
    if(count($errors)>0){
  
      echo"<ul style='margin:auto;color:red;text-align:center;'>";
  foreach($errors as $error){
  echo "<li style='color:red;list-style:none;'><h4>".$error."</h4></li>";
  }
  echo"</ul>";
  
  
  }
  else{
  
    $upload=move_uploaded_file($tmp,$src);
    if($upload){
      
      echo"<p><h4 style='margin:0auto;text-align:center;color:green'>Image uploaded !</h4></p>";
  
      $upit=$konekcija->prepare("UPDATE about SET src=:src,alt=:alt,text=:text WHERE id=:id");
      $upit->bindParam(":id",$id);
      $upit->bindParam(":src",$src);
      $upit->bindParam(':alt',$alt);
      $upit->bindParam(':text',$text);
  
      try{
        $rez=$upit->execute(); 
        }
        catch(PDOException $ex){
        echo $ex->getMessage();
        }
        
        if($rez){
        
        echo"<p><h4 style='margin:0auto;text-align:center;color:green'>About item has been updated !</h4></p>";
        
        
        
        
        
        }
        else{ echo "Error with the database.";}
    }
    else{
      echo"<p><h4 style='margin:0auto;text-align:center;color:red'>Image was not uploaded .</h4></p>";
  
    }
  }
     
  
    
  
  }
  
  
  }
  else{
  echo"<h4 style='color:red;'>Error you must check something! </h4>";
  }



}


if(isset($_POST['update-author'])){

  if(isset($_POST['cb'])){
    $cb=$_POST['cb'];
  
    foreach($cb as $c){
     $id=$c;
     $errors=[];
  
    $slika=$_FILES['src'.$c];
    $tip=$slika['type'];
    $name=$slika['name'];
    $tmp=$slika['tmp_name'];
    $size=$slika['size'];
  
    $filter=array('image/jpg','image/jpeg','image/png');
  
    $src="slike/".time().$name;
  
  
  
    $alt=$_POST['alt'.$c];

    if($_POST['text'.$c]!=""){
      $text=$_POST['text'.$c];}
    
      else{$errors[]="The textfield must not be empty !";}
  
   // echo $alt."<br/>";
    //var_dump($slika);
  
    $reAlt="/^[A-Za-z0-9\s]{1,50}$/";
  
    if(!preg_match($reAlt,$alt)){$errors[]="Alt is in the wrong format";}
  
    if(!in_array($tip,$filter)){$errors[]='Image type is not okay.';}
    if($size>3500000){$errors[]='The image must not be larger than 3.5MB';}
  
  
  
  
    if(count($errors)>0){
  
      echo"<ul style='margin:auto;color:red;text-align:center;'>";
  foreach($errors as $error){
  echo "<li style='color:red;list-style:none;'><h4>".$error."</h4></li>";
  }
  echo"</ul>";
  
  
  }
  else{
  
    $upload=move_uploaded_file($tmp,$src);
    if($upload){
      
      echo"<p><h4 style='margin:0auto;text-align:center;color:green'>Image uploaded !</h4></p>";
  
      $upit=$konekcija->prepare("UPDATE author SET src=:src,alt=:alt,text=:text WHERE id=:id");
      $upit->bindParam(":id",$id);
      $upit->bindParam(":src",$src);
      $upit->bindParam(':alt',$alt);
      $upit->bindParam(':text',$text);
  
      try{
        $rez=$upit->execute(); 
        }
        catch(PDOException $ex){
        echo $ex->getMessage();
        }
        
        if($rez){
        
        echo"<p><h4 style='margin:0auto;text-align:center;color:green'>Author information has been updated !</h4></p>";
        
        
        
        
        
        }
        else{ echo "Error with the database.";}
    }
    else{
      echo"<p><h4 style='margin:0auto;text-align:center;color:red'>Image was not uploaded .</h4></p>";
  
    }
  }
     
  
    
  
  }
  
  
  }
  else{
  echo"<h4 style='color:red;'>Error you must check something! </h4>";
  }



}


if(isset($_POST['update-shop'])){

  if(isset($_POST['cb'])){
    $cb=$_POST['cb'];
  
    foreach($cb as $c){
     $id=$c;
     $errors=[];
  
    $slika=$_FILES['src'.$c];
    $tip=$slika['type'];
    $name=$slika['name'];
    $tmp=$slika['tmp_name'];
    $size=$slika['size'];
  
    $filter=array('image/jpg','image/jpeg','image/png');
  
    $src="slike/shop/".time().$name;
    $src_mala="slike/thumbnails/".time().$name;

    $price=$_POST['price'.$c];
  
  
  
    $alt=$_POST['alt'.$c];

    if($_POST['text'.$c]!=""){
      $text=$_POST['text'.$c];}
    
      else{$errors[]="The textfield must not be empty !";}
  
   // echo $alt."<br/>";
    //var_dump($slika);
  
    $reAlt="/^([A-Z]{1}[a-z]{2,19})(\s[A-Z]{1}[a-z]{2,19})*$/";
  
    if(!preg_match($reAlt,$alt)){$errors[]="Title is in the wrong format";}

    $rePrice="/^[0-9]{1,10}$/";
    if(!preg_match($rePrice,$price)){$errors[]="Price is in the wrong format.";}
  
    if(!in_array($tip,$filter)){$errors[]='Image type is not okay.';}
    if($size>3500000){$errors[]='The image must not be larger than 3.5MB';}
  
  
  
  
    if(count($errors)>0){
  
      echo"<ul style='margin:auto;color:red;text-align:center;'>";
  foreach($errors as $error){
  echo "<li style='color:red;list-style:none;'><h4>".$error."</h4></li>";
  }
  echo"</ul>";
  
  
  }
  else{
  
    $upload=move_uploaded_file($tmp,$src);
    malaSlika($src,$src_mala,335,250);
    if($upload){
      
      echo"<p><h4 style='margin:0auto;text-align:center;color:green'>Image uploaded !</h4></p>";
  
      $upit=$konekcija->prepare("UPDATE shop SET src=:src,thumb=:src_mala,title=:alt,price=:price,description=:text WHERE id=:id");
      $upit->bindParam(":id",$id);
      $upit->bindParam(":src",$src);
      $upit->bindParam(":src_mala",$src_mala);
      $upit->bindParam(':alt',$alt);
      $upit->bindParam(':price',$price);
      $upit->bindParam(':text',$text);
  
      try{
        $rez=$upit->execute(); 
        }
        catch(PDOException $ex){
        echo $ex->getMessage();
        }
        
        if($rez){
        
        echo"<p><h4 style='margin:0auto;text-align:center;color:green'>Shop item has been updated !</h4></p>";
        
        
        
        
        
        }
        else{ echo "Error with the database.";}
    }
    else{
      echo"<p><h4 style='margin:0auto;text-align:center;color:red'>Image was not uploaded .</h4></p>";
  
    }
  }
     
  
    
  
  }
  
  
  }
  else{
  echo"<h4 style='color:red;'>Error you must check something! </h4>";
  }



}



if(isset($_POST['update-poll'])){

  $errors=[];
   if(isset($_POST['cb'])){
  $cb=$_POST['cb'];
  
  foreach($cb as $c){
   $id=$c;
   $vote=$_POST['vote'.$c];

   
   $reVote="/^([A-Z]{1}[a-z]{2,39})(\s[A-Z]{1}[a-z]{2,39})*$/";

   if(!preg_match($reVote,$vote)){$errors[]="Vote name is not in the correct format";}

   
   


   
  

   

   

   
  
  
  
        


  

  if(count($errors)>0){

            echo"<ul style='margin:auto;color:red;text-align:center;'>";
    foreach($errors as $error){
      echo "<li style='color:red;list-style:none;'><h4>".$error."</h4></li>";
    }
    echo"</ul>";

  }
  else{

         

        



   
    
    








$upit="UPDATE poll SET vote_name=:vote WHERE id=:id;";

$priprema_upit=$konekcija->prepare($upit);
$priprema_upit->bindParam(":id",$id);
$priprema_upit->bindParam(":vote",$vote);


      try{
$rezultat= $priprema_upit->execute(); 
}
catch(PDOException $ex){
echo $ex->getMessage();
}

if($rezultat){

echo"<p><h4 style='margin:0auto;text-align:center;color:green'>Vote name has been updated !</h4></p>";





}
else{ echo "Error with the database.";}

  }

}
   }



  





else{
echo"<h4 style='color:red;'>Error you must check something! </h4>";
}



}



?>

<!--UPDATE-->

























  <!--USER !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
  
<?php
   if(isset($_POST['user'])):
     
     
   
?>



<form method="POST" action="<?php echo $_SERVER['PHP_SELF'].'?page=admin';?>">
<table style="border:2px solid #222;display:inline-block;" class="adminSelect">
 <th colspan=8 style="background-color:#222;color:white;">User</th>
<tr>
     <td>#</td>
    <td>ID</td>
    <td>Username</td>
    <td>Password</td>
    <td>Email</td>
    <td>Name</td>
    <td>Lastname</td>
    <td>RoleId</td>

    </tr>

 <?php
   

   $rez=executeQuery('SELECT * FROM user');
    
   foreach($rez as $red): ?>
 
   <tr>
    <td><input type="checkbox" name="cb[]" value="<?php echo $red->id;?>"></td>
    <td><input type="text" disabled value="<?php echo $red->id;?>"/></td>
    <td><input type="text" name="username<?php echo $red->id;?>" value="<?php echo $red->username;?>"/></td>
    <td><input type="text" name="pass<?php echo $red->id;?>" value="<?php echo $red->password;?>"/></td>
    <td><input type="text" name="email<?php echo $red->id;?>" value="<?php echo $red->email;?>"/></td>
    <td><input type="text" name="name<?php echo $red->id;?>" value="<?php echo $red->name;?>"/></td>
    <td><input type="text" name="lastname<?php echo $red->id;?>" value="<?php echo $red->lastname;?>"/></td>
    <td><input type="text" name="idRole<?php echo $red->id;?>" value="<?php echo $red->idRole;?>"/></td>
    
    
    
    </tr>
    
    <?php endforeach;?>

    <tr>
    <td></td>
    <td>+</td>
    <td><input type="text" name="newusername"/></td>
    <td><input type="text" name="newpassword"/></td>
    <td><input type="text" name="newemail"/></td>
    <td><input type="text" name="newname"/></td>
    <td><input type="text" name="newlastname"/></td>
    <td><input type="text" name="newrole"/></td>
    
    
    
    </tr>
  

    
    <tr>

       
        <td colspan="8">
        <input type="submit" class="Btn" name="delete-user" value="Delete"/>
        <input type="submit" class="Btn" name="insert-user" value="Insert"/>
        <input type="submit" class="Btn" name="update-user" value="Update"/>
        </td>

    </tr>

     </table>

     </form>

<?php endif;?>

<!--USER !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->


<!--NAV !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
<?php
   if(isset($_POST['nav'])):
     
     
   
?>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF'].'?page=admin';?>">
<table style="border:2px solid #222;display:inline-block;" class="adminSelect">
 <th colspan=7 style="background-color:#222;color:white;">Nav</th>
<tr>
    <td>#</td>
    <td>ID</td>
    <td>Href</td>
    <td>Name</td>
    <td>Type</td>
    

    </tr>

 <?php
   

   $rez=executeQuery('SELECT * FROM nav');
    
   foreach($rez as $red): ?>
 
   <tr>
   <td><input type="checkbox" name="cb[]" value="<?php echo $red->id;?>"></td>
    <td><input type="text" disabled value="<?php echo $red->id;?>"/></td>
    <td><input type="text" name="href<?php echo $red->id;?>" value="<?php echo $red->href;?>"/></td>
    <td><input type="text" name="name<?php echo $red->id;?>" value="<?php echo $red->name;?>"/></td>
    <td><input type="text" name="type<?php echo $red->id;?>" value="<?php echo $red->type;?>"/></td>
    
    
    
    
    </tr>
    <?php endforeach;?>

     <tr>
    <td></td>
    <td>+</td>
    <td><input type="text" name="newhref"/></td>
    <td><input type="text" name="newname"/></td>
    <td><input type="text" name="newtype"/></td>
    
    
    
    
    </tr>

    <tr>

       
<td colspan="8">
<input type="submit" class="Btn" name="delete-nav" value="Delete"/>
<input type="submit" class="Btn" name="insert-nav" value="Insert"/>
<input type="submit" class="Btn" name="update-nav" value="Update"/>
</td>

</tr>

     </table>
   </form>

<?php endif;?>

<!--NAV !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->

<!--HOME !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
<?php
   if(isset($_POST['home'])):
     
     
   
?>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF'].'?page=admin';?>">
<table style="border:2px solid #222;display:inline-block;" class="adminSelect">
 <th colspan=7 style="background-color:#222;color:white;">Home_Text</th>
<tr>
    <td>#</td>
    <td>ID</td>
    <td>Text</td>
    

    </tr>

 <?php
   

   $rez=executeQuery('SELECT * FROM home_text');
    
   foreach($rez as $red): ?>
 
   <tr>
   <td><input type="checkbox" name="cb[]" value="<?php echo $red->id;?>"></td>
    <td><input type="text" disabled value="<?php echo $red->id;?>"/></td>
    <td><textarea name="text<?php echo $red->id;?>"><?php echo $red->text;?></textarea></td>
    
    
    
    
    </tr>
    <?php endforeach;?>

     <tr>
    <td></td>
    <td>+</td>
    <td><textarea name="newtext"></textarea></td>
    
   
    
    
    
    </tr>

    <tr>

       
<td colspan="8">
<input type="submit" class="Btn" name="delete-home-text" value="Delete"/>
<input type="submit" class="Btn" name="insert-home-text" value="Insert"/>
<input type="submit" class="Btn" name="update-home-text" value="Update"/>
</td>

</tr>

     </table>
   </form>

   <form method="POST" action="<?php echo $_SERVER['PHP_SELF'].'?page=admin';?>" enctype="multipart/form-data">

<table style="border:2px solid #222;display:inline-block;" class="adminSelect">
 <th colspan=7 style="background-color:#222;color:white;">Home_Image</th>
<tr>
    <td>#</td>
    <td>ID</td>
    <td>Src</td>
    <td>Alt</td>
    

    </tr>

 <?php
   

   $rez=executeQuery('SELECT * FROM home_image');
    
   foreach($rez as $red): ?>
 
   <tr>
   <td><input type="checkbox" name="cb[]" value="<?php echo $red->id;?>"></td>
    <td><input type="text" disabled value="<?php echo $red->id;?>"/></td>
    <td><input type="file" name="src<?php echo $red->id;?>"/></td>
    <td><input type="text" name="alt<?php echo $red->id;?>" value="<?php echo $red->alt;?>"/></td>
    
    
    
    
    </tr>
    <?php endforeach;?>

     <tr>
    <td></td>
    <td>+</td>
    <td><input type="file" name="newsrc"/></td>
    <td><input type="text" name="newalt"/></td>
    
    
    
    
    </tr>

    <tr>

       
<td colspan="8">
<input type="submit" class="Btn" name="delete-home-image" value="Delete"/>
<input type="submit" class="Btn" name="insert-home-image" value="Insert"/>
<input type="submit" class="Btn" name="update-home-image" value="Update"/>
</td>

</tr>

     </table>     
   </form>

<?php endif;?>

<!--HOME !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->

<!--ABOUT US !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->

<?php
   if(isset($_POST['about'])):
     
     
   
?>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF'].'?page=admin';?>" enctype="multipart/form-data">
<table style="border:2px solid #222;display:inline-block;" class="adminSelect">
 <th colspan=7 style="background-color:#222;color:white;">About</th>
<tr>
    <td>#</td>
    <td>ID</td>
    <td>Src</td>
    <td>Alt</td>
    <td>Text</td>
    

    </tr>

 <?php
   

   $rez=executeQuery('SELECT * FROM about');
    
   foreach($rez as $red): ?>
 
   <tr>
   <td><input type="checkbox" name="cb[]" value="<?php echo $red->id;?>"></td>
    <td><input type="text" disabled value="<?php echo $red->id;?>"/></td>
    <td><input type="file" name="src<?php echo $red->id;?>"/></td>
    <td><input type="text" name="alt<?php echo $red->id;?>"value="<?php echo $red->alt;?>"/></td>
    <td><textarea name="text<?php echo $red->id;?>"><?php echo $red->text;?></textarea></td>
    
    
    
    
    </tr>
    <?php endforeach;?>

    <tr>

       
<td colspan="8">

<input type="submit" class="Btn" name="update-about" value="Update"/>
</td>

</tr>

     </table>

   </form>

<?php endif;?>

<!--ABOUT US !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->

<!--SHOP !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
<?php
   if(isset($_POST['shop'])):
     
     
   
?>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF'].'?page=admin';?>" enctype="multipart/form-data">
<table style="border:2px solid #222;display:inline-block;" class="adminSelect">
 <th colspan=7 style="background-color:#222;color:white;">Shop</th>
<tr>
    <td>#</td>
    <td>ID</td>
    <td>Src</td>
    
    <td>Title</td>
    <td>Price</td>
    <td>Descrpition</td>
    

    </tr>

 <?php
   

   $rez=executeQuery('SELECT * FROM shop');
    
   foreach($rez as $red): ?>
 
   <tr>

    <td><input type="checkbox" name="cb[]" value="<?php echo $red->id;?>"></td>
    <td><input type="text" disabled value="<?php echo $red->id;?>"/></td>
    <td><input type="file" name="src<?php echo $red->id;?>"/></td>
    
    <td><input type="text" name="alt<?php echo $red->id;?>" value="<?php echo $red->title;?>"/></td>
    <td><input type="text" name="price<?php echo $red->id;?>" value="<?php echo $red->price;?>"/></td>
    <td><textarea name="text<?php echo $red->id;?>"><?php echo $red->description;?></textarea></td>
    
    
    
    
    </tr>
    <?php endforeach;?>

     <tr>
    <td></td>
    <td>+</td>
    
    <td>
      <input type='file' name="newsrc">
    </td>
    <td><input type="text" name="newtitle"/></td>
    <td><input type="text" name="newprice"/></td>
    <td><textarea name="newdescription" ></textarea></td>
    
    
    
    
    </tr>

    <tr>

       
<td colspan="8">
<input type="submit" class="Btn" name="delete-shop" value="Delete"/>
<input type="submit" class="Btn" name="insert-shop" value="Insert"/>
<input type="submit" class="Btn" name="update-shop" value="Update"/>
</td>

</tr>

     </table>
   </form>

<?php endif;?>

<!--SHOP !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->

<!--AUTHOR !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->

<?php
   if(isset($_POST['author'])):
     
     
   
?>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF'].'?page=admin';?>" enctype="multipart/form-data">
<table style="border:2px solid #222;display:inline-block;" class="adminSelect">
 <th colspan=7 style="background-color:#222;color:white;">Author</th>
<tr>
    <td>#</td>
    <td>ID</td>
    <td>Src</td>
    <td>Alt</td>
    <td>Text</td>
    
    

    </tr>

 <?php
   

   $rez=executeQuery('SELECT * FROM author');
    
   foreach($rez as $red): ?>
 
   <tr>
   <td><input type="checkbox" name="cb[]" value="<?php echo $red->id;?>"></td>
    <td><input type="text" disabled value="<?php echo $red->id;?>"/></td>
    <td><input type="file" name="src<?php echo $red->id;?>"/></td>
    <td><input type="text" name="alt<?php echo $red->id;?>" value="<?php echo $red->alt;?>"/></td>
    
    <td><textarea name="text<?php echo $red->id;?>"><?php echo $red->text;?></textarea></td>
    
    
    
    
    </tr>
    <?php endforeach;?>

    <tr>

       
<td colspan="8">

<input type="submit" class="Btn" name="update-author" value="Update"/>
</td>

</tr>

     </table>
   </form>

<?php endif;?>

<!--AUTHOR !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->

<!--POLL !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->

<?php
   if(isset($_POST['poll'])):
     
     
   
?>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF'].'?page=admin';?>">
<table style="border:2px solid #222;display:inline-block;" class="adminSelect">
 <th colspan=7 style="background-color:#222;color:white;">Poll</th>
<tr>
    <td>#</td>
    <td>ID</td>
    <td>Vote_Name</td>
    

    </tr>

 <?php
   

   $rez=executeQuery('SELECT * FROM poll');
    
   foreach($rez as $red): ?>
 
   <tr>
   <td><input type="checkbox" name="cb[]" value="<?php echo $red->id;?>"></td>
    <td><input type="text"  disabled value="<?php echo $red->id;?>"/></td>
    <td><input type="text" name="vote<?php echo $red->id;?>" value="<?php echo $red->vote_name;?>"/></td>
    
    
    
    
    </tr>
    <?php endforeach;?>

     <tr>
    
    <td>+</td>
    <td><input type="text" name="newvoteid"/></td>
    <td><input type="text" name="newvote"/></td>
    
    
    
    
    </tr>

    <tr>

       
<td colspan="8">
<input type="submit" class="Btn" name="delete-poll" value="Delete"/>
<input type="submit" class="Btn" name="insert-poll" value="Insert"/>
<input type="submit" class="Btn" name="update-poll" value="Update"/>
</td>

</tr>
   </table>
   </form>

    <?php endif;?>

<!--POLL !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->









   </div>
   <div id="levi">
<form id="adminFormSelect" action="<?php echo $_SERVER['PHP_SELF'].'?page=admin';?>" method="POST">
<ul id="adminNav">
  <li>
     <input type="submit" class="Btn" name="user" value="User"/>
  <li>
  <li>
     <input type="submit" class="Btn" name="nav" value="Nav"/>
  <li>
  <li>
  <input type="submit" class="Btn" name="home" value="Home"/>
  <li>
  <li>
  <input type="submit" class="Btn" name="about" value="About us"/>
  <li>
  <li>
  <input type="submit" class="Btn" name="shop" value="Shop"/>
  <li>
  <li>
  <input type="submit" class="Btn" name="author" value="Author"/>
  <li>
  <li>
  <input type="submit" class="Btn" name="poll" value="Poll"/>
  <li>

  </ul>
</form>
   </div>
  


  
 
 

 
 















<div class="cistac"></div>
   </div>

<?php else:echo "<p><h2 style='color:red;text-align:center;'>Error 403. You cannot access this page.</h2></p>"; header("Location:index.php?page=home");
  endif;
?>