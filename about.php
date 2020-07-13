<?php
$rez=executeQuery("SELECT * FROM about;");
//var_dump($rez);
?>

<div class="about-holder">
  
  <div class="about-image"><a href="<?php echo $rez[0]->src;?>" data-lightbox="aboutus"><img src="<?php echo $rez[0]->src;?>" alt="<?php echo $rez[0]->alt?>"/></a></div>
  <div class="about-text"><p><h4><?php echo $rez[0]->text;?></h4></p></div>
  </div>

  
   
  <div class="about-holder">    
  <div class="about-text"><p><h4><?php echo $rez[1]->text;?></h4></p></div>
  <div class="about-image"><a href="<?php echo $rez[1]->src;?>" data-lightbox="aboutus"><img src="<?php echo $rez[1]->src;?>" alt="<?php echo $rez[1]->alt?>"/></a></div>
  </div>
  
  <div class="about-holder">
  <div class="about-image"><a href="<?php echo $rez[2]->src;?>" data-lightbox="aboutus"><img src="<?php echo $rez[2]->src;?>" alt="<?php echo $rez[2]->alt?>"/></a></div>
  <div class="about-text"><p><h4><?php echo $rez[2]->text;?></h4></p></div>
 


  

</div>