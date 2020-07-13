<?php if(isset($_SESSION['user'])):?>

			<?php
			 $upit="SELECT * FROM author";
			 $rez=executeQuery($upit);

			 foreach($rez as $red):
			
			?>
	  <div id="author-image"><a href="<?php echo $red->src;?>" data-lightbox="author"><img src="<?php echo $red->src;?>" alt="<?php echo $red->alt;?>"/></a></div>
	
	
	  <div id="author">
        <h4><?php echo $red->text;?></h4>
		   
		</div>

		<?php endforeach;?>



		<?php 
		
		 $idUser=$_SESSION['user']->idUser;
		 $upit=$konekcija->prepare('SELECT * FROM user_poll WHERE id_user=:id');
		 $upit->bindParam(':id',$idUser);
		 $upit->execute();
		 $rez=$upit->fetch();

		


		 if(!$rez):
		?>
	  
	  
	    <table>
		   <th colspan="5"><h2>Poll</h2></th>
		   <tr>
		   
		     <th colspan="5"><h4>How would you rate this website?</h4></th>
		       
		   
		   </tr>
		   <tr>
			   <?php 
				 $anketa=executeQuery('SELECT * FROM poll');
				 
				 foreach($anketa as $red):
			   ?>
		     <td><input type="radio" name="rbPoll" value=<?php echo $red->id;?> /><?php echo $red->vote_name?></td>
			   
			   
				 <?php endforeach;?>
		   
		   </tr>
		   <tr>
		    <th colspan="5"><input type="button" class="Btn" id="btnVote"  name='btnVote' value="Vote"/></th>
				
				
				<input type="hidden" id="userId" value='<?php echo $_SESSION['user']->idUser;?>'>
		   </tr>
		   
		
		
		</table>


		<?php else:
			 
		$upit=$konekcija->query('SELECT vote_name, count(id_vote) as count FROM user_poll up RIGHT OUTER JOIN poll p on up.id_vote=p.id GROUP BY vote_name ORDER BY id');
		$rez=$upit->execute();
		$rez=$upit->fetchAll();
		
		
		 
			
			?>
	  
	  
	  
	  
	  

		<script>
window.onload = function () {


var options = {
	title: {
		text: "Website ratings"              
	},
	data: [              
	{
		
		type: "column",
		dataPoints: [
			

			<?php foreach($rez as $red):?>
			{ label: "<?php echo $red->vote_name;?>", y: <?php echo $red->count;?> },
		    <?php endforeach;?>
			
		]
	}
	]
};

$("#chartContainer").CanvasJSChart(options);
}
</script>
<div id="chartContainer" style="height: 370px; width: 500px;"></div>


		<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>

		<?php endif;?>
	






	<?php else:echo "<p><h2 style='color:red;text-align:center;'>Error 403. You cannot access this page.</h2></p>";header('Location:index.php?page=home');
	 endif;
	?>
