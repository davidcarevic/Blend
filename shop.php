<?php if(isset($_SESSION['user'])){?>
<div id='shop-holder'>
<?php
$rez=executeQuery("SELECT * FROM shop;");

//var_dump($rez);

foreach($rez as $red):
?>


<div class="item">
    
 
  
 <div class="shop-slika"><a href="<?php echo $red->src;?>" data-lightbox="shop"><img src="<?php echo $red->thumb;?>" alt="<?php echo $red->title;?>"/></a></div>
 
 <table>
  <th colspan="2"><h2><?php echo $red->title;?></h2></th>
  
  <tr>
  <td><h3>Price:</h3> </td>
  <td><h2>$<?php echo $red->price?></h2></td>





 </tr>

 <tr>

  <td><h3>Description: </h3></td>

 <td><h4 style><?php echo $red->description?></h4></td>

 </tr>

 <tr>
  <td colspan="2">  <input type="button" class="Btn" value="  Add to cart  "  /> <input type="hidden" value="<?php echo $red->id?>"/> </td>
  </tr>
 </table>



</div>

<?php endforeach;?>

</div>

<?php
}else{
    echo "<p><h2 style='color:red;text-align:center;'>Error 403. You cannot access this page.</h2></p>";
    header("Location:index.php?page=home");
}

?>

