 $(document).ready(function(){

	//menu color hover animation ///////////////////////
	   $("#nav li a,.Btn").hover(function(){
		   $(this).stop(true,true).animate({
          backgroundColor: "#222",
          color: "white",
          
		}, 350);
		//console.log("hover");
		   
		   
		   
	   },function(){
		   $(this).stop(true,true).animate({
          backgroundColor: "#fff",
          color: "#aaa",
          
        }, 350);
		   
		   
		   
	   });
	   
	  // $(".dropdown").hide();

	  //menu color hover animation ////////////////////////
	   

	  //search /////////////////////////////////
	   var counter=0;
	   $("#showSrc a").click(function(){
		   if(counter%2==0){
			   
			   
			   
			   
		   $(".dropdown").fadeIn();
		   
		   
		   }
		   else{$(".dropdown").fadeOut();}
		   counter++;
		   });
		//search   ////////////////////////



		

       //reg check ////////////////////////

		
		

		var reNiz={user:/^[A-Za-z0-9]{5,20}$/,
		 pass1:/^[A-Za-z0-9]{5,15}$/,
		 email:/^\S+@\w+\.(\w+\.)*\w{2,3}$/,	
		 name:/(^[A-Z]{1}[a-z]{2,19})(\s[A-Z]{1}[a-z]{2,19})*$/,
		 lastname:/(^[A-Z]{1}[a-z]{4,39})(\s[A-Z]{1}[a-z]{4,39})*$/};


	    
		
		
		
		
		var podaci={
		user:"",
		pass1:"",
		email:"",
		name:"",
		lastname:""};

		$(".spi").focus(function(){

			$("#hidden"+this.id).fadeIn();
		  $(this).css('border-color','red');

		  $(this).blur(function(){
			
			var regHolder=reNiz[this.id];
			console.log(regHolder);
			if($(this).val().match(regHolder)){
			   podaci[this.id]=$(this).val();
			  $(this).css('border-color','green');
			  $("#hidden"+this.id).fadeOut();
			  
		  }
		  
		  else{podaci[this.id]="";$("#btnSubmit").css("border","2px solid red");}
		  for(var podatak in podaci){
			if(podaci[podatak]==""){$("#btnSubmit").css("border","2px solid red");}
			else{$("#btnSubmit").css("border","2px solid #222");}
		}
	  });

			
		});

		

		

		

		



      
	  

	  $("#btnSubmit").click(function(e){
		  
		
		  

		console.log(podaci);
		var greske=0;

		for(podatak in podaci){
			if(podaci[podatak]=="") greske++;
		}

		console.log(greske);

		
		  

		
		
		

		if(greske>0){
			e.preventDefault();
			 console.log("nije poslao");
			document.querySelector("#btnSubmit").style="border:2px solid red";
			}


		else{
			
			
		
			
			console.log("poslao je");

		
			
		}
		
			



	  });

	  // reg check ////////////////////////////////////////////////









	  // poll ////////////////////////////////////////////////////////

	  $('#btnVote').click(function(){

		var id=document.querySelector('#userId').value;
		console.log("id korisnika= "+id);

		var rbVal="";
		var rb=document.getElementsByName('rbPoll');
		

		for(var i=0;i<rb.length;i++){

			if(rb[i].checked){
				rbVal=rb[i].value;
				break;
			}
		}
		console.log("vrednost glasa= "+rbVal);

		
		$.ajax({


			method:'POST',
			url:'ajax_insert_poll.php',
			dataType:'json',
			data:{
				id:id,vote:rbVal
			},
			success:function(status){console.log(status);location.reload();},
			error: function(xhr,statusText,error){
				var status=xhr.status;
				switch(status){
					case 500:
						alert("Greska na serveru. Trenutno nije moguce promeniti korisnika.");
						break;
					case 404:
						alert("Stranica nije pronadjena.");
						break;
					default:
						alert("Greska: " + status + " - " + statusTxt);
						break;
				}
			}
		});




	  });































	  // poll ////////////////////////////////////////////////////////




 
 
 
	   
	   
	   
   });