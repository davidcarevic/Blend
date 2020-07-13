<?php




$statusCode = 404;



if($_SERVER['REQUEST_METHOD'] != "POST"){
    echo "Can't access this page.";
}



if(isset($_POST['id'])){
	
    $id = $_POST['id'];
    $vote=$_POST['vote'];

    include "connection.php";
	
    $upit = $konekcija->prepare("INSERT INTO user_poll VALUES(:id,:vote)");
    $upit->bindParam(':id', $id);
    $upit->bindParam(':vote', $vote);

    try{
        $rezultat = $upit->execute();

        if($rezultat){
            $statusCode = 204;
        } else {
            $statusCode = 500;
        }
    }
    catch(PDOException $e){
        $statusCode = 500;
    }
}




http_response_code($statusCode);



