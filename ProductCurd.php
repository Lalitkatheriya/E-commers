<?php
include("dbconfig.php");

// Selet_catogery


if(@($_POST["select_Category"])){

    $qury= "SELECT * FROM `category`";
    $res = mysqli_query($conn, $qury);
    $data="";
    $data.='<select id="cat_Select" class="form-control"><option>Select Category</option>';
    while( $row = mysqli_fetch_array($res) ) {
    $data.='<option  value="'.$row['id'].'">'.$row['Category'].'</option>';
    }
    $data.='</select>';
    $arr=array("data1"=>$data);
    echo json_encode($arr);
    
}



// Select DAta Table 
if(@ $_REQUEST["Select_Product"]){
$columns = array( 

       0=>'Cheak',
       1=> 'ID',
       2=>'Product',
       3=>'Cat_id',
       4=>'Price',
       5=>'Image',
       6=>'Status',
       7=>'Action',
   );
   

   $sql = "SELECT products.id,products.Product_Name as Pname ,products.Price,products.Image,products.Status,category.Category as Cname  FROM `products`,`category` WHERE category.id=products.category_id";
   $res = mysqli_query($conn, $sql);
  $count=0;

  while( $row = mysqli_fetch_array($res) ) {
    $count++;
    $dataArray = array();
    $dataArray["Cheak"] ='<input type="checkbox" name="select_all" value="1" class="check_row">';
    $dataArray["ID"] = $count;
    $dataArray["Product"] = $row["Pname"];
    $dataArray["Price"] = $row["Price"];
    $dataArray["Cat_id"] = $row["Cname"];
    $dataArray["Image"] = $row["Image"];
    $dataArray["Image"] = '<img src="img/'.$row["Image"].'" style="width: 100px;height:100px;"></img>';
    if($row['Status'] == 0)
    {
        $dataArray["Status"]  ='<button type = button class="btn btn-success" onclick="changeStatus('.$row['id'].','.$row["Status"].') ">Active</button>';
    }
    else
    {
        $dataArray["Status"]  ='<button type= button class="btn btn-danger" onclick="changeStatus('.$row['id'].', '.$row["Status"].') ">Inactive</button>';
    }

    $dataArray["Action"] = '
    <button type="button" onclick="EditDAta('.$row['id'].')" class="btn btn-primary " data-bs-toggle="modal" data-bs-target ="#Modal"> Update
    </button>
    <button onclick="Delete('.$row['id'].')"  class="btn btn-danger">Delete</button>';
    $data[]=$dataArray;

   }
   $arr = array();
   // $arr["draw"]=1;
   // $arr["recordsTotal"]=$num;
   // $arr["recordsDiltered"]=$num;
   $arr["data"]=$data;
   echo json_encode($arr);
}

//Status
if(@$_REQUEST['status']){
    if($_REQUEST['status']==0)
    $s=1;
    if($_REQUEST['status']==1){
    $s=0;   
    }
    $query = "UPDATE `porducts` SET `Status`='".$s."' WHERE id='".$_REQUEST['id']."'";
     mysqli_query($conn,$query);

}
// Add products
if(@$_POST["add_Products"]){
                $Pname=$_POST["Pname"];
                $Price=$_POST["Price"];
                $Cname=$_POST["Cname"];
                $File=$_FILES["file"];

                // File Uploding Err
                if (empty($_FILES["file"])) {  
                    echo "Please Uplodad your  Profile ";  
                        
                }else{
                $File= time()."_". $_FILES["file"]["name"];

                $file_ext = explode(".", $File);

                $file_ext_Cheak=strtolower(end($file_ext));

                $Filetype=array("png","jpg","jpeg");
                if(in_array($file_ext_Cheak,$Filetype)){
                $tamp_name=$_FILES["file"]["tmp_name"];
                $FilePath = "img/".$File;
                move_uploaded_file($tamp_name,$FilePath);

                }else{
                echo "Allowe only png jpg jpeg Files type";
                }



        $Save = "INSERT INTO `products`( `category_id`, `Product_Name`, `Image`, `Price`) 
                 VALUES ('".$Cname."','".$Pname."','".$File."','".$Price."')";

        $rep = mysqli_query($conn,$Save);
        if($rep){
        echo "<script>alert('Data Inserted Sucssesfull')</script>";

        }else{
        echo "Something went wrong";
        }

}//End Add

}
    

    
 





      


 


// Deleted    
if(@$_POST['delete']){
    $ID =$_POST["id"];
    $Delete= "DELETE FROM products WHERE id ='".$ID."'";
    $query= mysqli_query($conn,$Delete);
    }
?>