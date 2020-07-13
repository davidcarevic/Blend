<div id="home">
<p><h2>Welcome to the website of Coffee Shop Blend</h2></p><br/>
<?php
   
   $upit=executeQuery("SELECT * FROM home_text");
   

   foreach($upit as $red){

    echo "<p><h3>".$red->text."</h3></p>";
   }

?>
<br/>
   <div class="fotorama">
     <?php
       $upit=executeQuery("SELECT * FROM home_image");
       foreach($upit as $red){

         echo "<img src=".$red->src." alt=".$red->alt."/>";
       }
     ?>
   </div>

</div>