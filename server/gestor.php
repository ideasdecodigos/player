<?php 
include("connection.php"); 

//ADD VIDEO
if(isset($_POST["newVideo"])){ 
     $url = mysqli_real_escape_string($con,$_POST["url"]);  				
	    //INGRESA LOS DATOS A LA DB
   	$exitosa = mysqli_query($con, "INSERT INTO table_enlaces(ytp_url)VALUES('$url')");
				
   	if($exitosa){ 
           echo "<script>
           alert('Guardado exitosamente.');
           </script>"; 
	}else{
      echo "<script>
            swal.fire('Error al guardar.');
           </script>";    
    }
}
//VER VIDEOS
elseif(isset($_POST["vista"])){ 
   	$res = mysqli_query($con, "SELECT * FROM table_enlaces ORDER BY ytp_date DESC");
	 if(mysqli_num_rows($res) > 0){  
        while($fila=mysqli_fetch_array($res)){ ?>
            <div class="container">    
                 <iframe src="<?php echo $fila['ytp_url']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                 <button  onclick="eliminar(<?php echo $fila['ytp_code']; ?>);">X</button>
            </div>
       <?php }
     }
  
}
//ELIMINAR VIDEOS
elseif(isset($_POST["eliminar"])){ 
     $code = mysqli_real_escape_string($con,$_POST["code"]);  				
	    //INGRESA LOS DATOS A LA DB
   	$exitosa = mysqli_query($con, "DELETE FROM table_enlaces WHERE ytp_code=$code");
				
   	if($exitosa){ 
           echo "<script>
           alert('Eliminado exitosamente.');
           </script>"; 
	}else{
      echo "<script>
            swal.fire('Error al eliminar.');
           </script>";    
    }
  
}