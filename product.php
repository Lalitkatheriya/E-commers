<?php
include("dbconfig.php");


// Select DAta Table 

    
       $sql = "SELECT products.id,products.Product_Name as Pname ,products.Price,products.Image,products.Status,category.Category as Cname  FROM `products`,`category` WHERE category.id=products.category_id";
      $res = mysqli_query($conn, $sql);
      $count=0;
       print_r($res );
      while( $row = mysqli_fetch_assoc($res) ) {
        $count++;
        $data= '
             <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
             <p class="text-right">'.$row["Pname"].'</p>
            <a href="" class="cat-img position-relative overflow-hidden mb-3">
              <img class="img-fluid" src="img/'.$row["Image"].'" alt="">
            </a><h5 class="font-weight-semi-bold m-0">'.$row["Cname"].'</h5>
            </a><h6 class="font-weight-semi-bold m-0">'.$row["Price"].'</h6></div>';

   
    
      }
       
       echo json_encode($data);
 
 

?>
