<?php if(isset($_SESSION['user'])):?>

<?php
  if(isset($_POST['btnContact'])){
		$errors=[];
		$subject=$_POST['subject'];
		$text=$_POST['textArea'];
		$emailUser=$_SESSION['user']->email;

		$reSubject="/^[\w\s0-9\-\_\@\!]{1,255}$/";
		
		if(!preg_match($reSubject,$subject)){$errors[]="Subject must contain something.";}
		if($text==null){$errors[]="The message cannot be empty.";}

		$text=$text." From:$emailUser";

		//echo $subject."<br/>".$text."<br/>".$emailUser."<br/>";

		if(count($errors)>0){

			echo"<ul style='margin:auto;color:red;text-align:center;'>";
        foreach($errors as $error){
        echo "<li style='color:red;'><h4>".$error."</h4></li>";
               }
        echo"</ul>";

					 }     
			else{

				$sendMail=mail("david.carevic.159.14@ict.edu.rs",$subject,$text,"From: coffeestoreblend.000webhostapp.com");

				if($sendMail){
					echo"<p><h4 style='margin:0auto;text-align:center;color:green'>Your email has been send!</h4></p>";
				}


			}		        
	}
?>
<div class="forme">


<form action="<?php echo $_SERVER['PHP_SELF'].'?page=contact';?>" method="POST" name="forma">
	    <table>
		   <th colspan="1"><h2>Contact</h2></th>
		   
		   
		   <tr>
		     <td><h4>Subject:</h4>
			 <input type="text" name="subject"/></td>
			 
		   </tr>
		   <tr>
		     <td><h4>Message:</h4>
			 <textarea name="textArea"  cols="40" rows="10"></textarea></td>
			 
		   </tr>
		   
             <tr>
	
		     <td colspan="1"><input class="Btn" type="submit" value="Send"  name="btnContact"/></td>
            </tr>
		</table>
      </form>
</div>
<?php else:echo "<p><h2 style='color:red;text-align:center;'>Error 403. You cannot access this page.</h2></p>";header("Location:index.php?page=home");
  endif;
?>