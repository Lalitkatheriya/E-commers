

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Dashboard.php">Dasheboard</a></li>
              
              <li class="breadcrumb-item active">Products list</li>
            </ol>
         <div class=".swalDefaultSuccess"></div>

          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
   <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Category Products</h3>
                <div class="d-flex justify-content-end">
                <!-- Button trigger modal -->
      
                  <button type="button" class="btn btn-primary" onclick="select_Category()"style="width: 170px;" data-bs-toggle="modal" data-bs-target="#Modal2">
                    Add product
                    </button>
          
        
                    </div>
                  <!-- Add Modal -->
                  <div class="modal fade" id="Modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                     <!--AddUser -->
                        <form class="row g-3" method="POST" enctype="multipart/form-data">
                       
                       <!-- Image Uplode -->
                          <div class="col-12 form-group">
                          <div class="custom-file">
                          <input type="file"  name="Files" class="custom-file-input" id="Files">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                           </div>
                          </div>
                            <!-- Products name-->
                              <div class="col-12">
                                <input type="text"
                                class="form-control" 
                               
                                id="Pname" 
                                placeholder="Product name">
                                
                                </div>
                              
                            <!-- Price-->

                              <div class="col-12">
                              <input type="text" 
                              class="form-control" 
                            
                              id="Price"  
                              placeholder="Price">
                              </div>
                          
                            <!--Seclect Category-->

                            <div class="col-12">
                           
                             <span id="Select" ></span>
                           
                            </div>
                            </form>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" id="Submit"class="btn btn-primary">Add</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
            <!-- / Add Modale -->
                  <!-- Update Modal -->
                  <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                     <!--Update -->
                        <form class="row g-3" method="POST" enctype="multipart/form-data">
                            
                       <!-- Image Uplode -->
                          <div class="col-12 form-group">
                            <img id="Img" src="" alt="" style="width: 200px;height: 150px;">
                            <h6>Product Image</h6>
                         
                          <div class="custom-file">
                          <input type="file"  name="Files" class="custom-file-input newImage" id="Files">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          <input type="hidden" id="oldImage" value="">
                          <input type="hidden" id="id" value="">
                           </div>
                          </div>
                            <!-- Products name-->
                              <div class="col-12">
                                <input type="text"
                                class="form-control" 
                                name="Pname"
                                id="proName" 
                                placeholder="Product name">
                                
                                </div>
                              
                            <!-- Price-->

                              <div class="col-12">
                              <input type="text" 
                              class="form-control" 
                              name="Price" 
                              id="proPrice"  
                              placeholder="Price">
                              </div>
                          
                            <!--Seclect Category-->

                            <div class="col-12">
                           
                             <span id="Category"></span>
                           
                            </div>
                            </form>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" id="submit"class="btn btn-primary">Add</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
            <!-- / Update Modale -->
                 
                 
              <!-- /.card-header -->
              <div class="card-body">
                <table id="Table" class="table table-bordered text-center table-hover">
                  <thead>
                      <tr>
                        <th><Input type="checkbox"></Input></th>
                          <th>Sr.</th>
                          <th>Products</th></th>
                          <th>Category</th>
                          <th>Price</th>
                          <th>Image</th>
                          <th>Status</th>
                          <th>Action</th>
                      
                     
                         
                      </tr>
                  </thead>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?php include("Footer.php"); ?>
</div>

<!-- Page specific script -->
<script>
    
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

 
    $('.swalDefaultError').click(function() {
      Toast.fire({
        icon: 'error',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
 
  Lode();
   function Lode() {
        $('#Table').dataTable({
            "processing": false,
            "destroy":true,
            "searching":true,
            "serverSide":false,
             dom: 'Bfrtip',
             'ajax': 'https://gyrocode.github.io/files/jquery-datatables/arrays_id.json',
             buttons: [
            'copyHtml5', 'csvHtml5',  'pdfHtml5'
         ],
         'columnDefs': [						// code for select row on checked checkbox class
				         {
                    targets: 0,        
				            'checkboxes': {
				              'selectRow': true
				            }
				         }
				      ],
	       'select': {
	         'style': 'multi',
	         'selector': '.check_row'
	      },     
      	'order': [[1, 'asc']],	

            "ajax":{
              "url":"ProductCurd.php",
              "type":"POST",
              "dataType":"json",
               "data" : {"Select_Product":"Select_Product"}
            
            },
            "columns": [
                {"data": "Cheak"},
                {"data": "ID"},
                {"data": "Product"},
                {"data": "Cat_id"},
                {"data": "Price"},
                {"data": "Image"},
                {"data": "Status"},
                {"data": "Action"},
              
              
            ],
                    });
 
              
    };
    // ===================Edit Fome Data==================
    // process the form
 function Delete(i){
  if (confirm("Are You Sure Delete your data ?")==true){
       $.ajax({
        type    : 'POST',
        url     : "ProductCurd.php",
        data    : {"id":i,"delete":"delete"},
       success: function(responce){
         Lode();
       var a = "#row_"+i;
        $(a).remove();
        Toast.fire({
        icon: 'success',
        title: 'You are SuccsesFully Deleted !'
      })
       }
     });
    }
    };
   
     // Status Change
     function changeStatus(id,st){
        $.ajax({
        type    : 'POST',
        url     : "ProductCurd.php",
        data    : {"id":id,"status":st},
        success: function(responce){
         Lode();
        Toast.fire({
        icon: 'success',
        title: 'User Status Change Succsessfully'
      })
  
        }
     });
 
    };
  
   // Status Change
    function select_Category(){

      

        $.ajax({
        type    : 'POST',
        dataType:'JSON',
        url     : "ProductCurd.php",
        data    : {"select_Category":"select_Category"},
        success: function(responce){
        Lode();

        $("#Select").html(responce['data1']);
      
        }
     });
 
    };
  

    


// Ajax UPDATE form
 function EditDAta(j){
 

       $.ajax({
        type    : "POST",
        dataType: 'JSON',
        url    : "ProUpdate.php",
        data   : {"id":j,"Select_Pro":"Select_pro"},
      
       success: function(resData){ 
          $("#id").val(resData["id"]);
          $("#Img").attr("src","img/"+resData["Image"]);
          $("input[name='Pname']").val(resData["Pname"]);
          $("input[name='Price']").val(resData["Price"]+".Rs");
          $("#Category").html(resData["Cname"]);
   
      
        $("#submit").on("click",function update(){
          var id = $("#id").val();
          var Pname = $("#proName").val();
          var Price = $("#proPrice").val();
          var Cname = $("#Select_Category").val();
          var oldImage = $("#oldImage").val();
          var file_data = $('.newImage').prop('files')[0];    //Fetch the file              
          var form_data = new FormData();
          form_data.append("file",file_data);
          form_data.append("ID",id);
          form_data.append("Pname",Pname);
          form_data.append("Price",Price);
          form_data.append("Cname",Cname);
          form_data.append("updateData","updateData");
          form_data.append("oldImage",oldImage);
         
         console.log(form_data);
      
          $.ajax({
          type    : "POST",
          datatype: 'json',
          url    : "ProUpdate.php",
          contentType: false,
          processData: false,
          data:form_data,
          success: function(res){ 
          Lode();
          $('#Modal').modal('hide');
          Toast.fire({
          icon: 'success',
          title: 'You are SuccsesFully Updated !'
          })
          }
            
          });
      
         });//End Submit

      }
     });
  };
    // Add Data
    $("#Submit").on("click",function Add(){
     
          var Pname = $("#Pname").val();
          var Price = $("#Price").val();
          var Cname = $("#cat_Select").val();
      
          var file_data = $('#Files').prop('files')[0];    //Fetch the file              
          var form_data = new FormData();
          form_data.append("file",file_data);
          form_data.append("Pname",Pname);
          form_data.append("Price",Price);
          form_data.append("Cname",Cname);
          form_data.append("add_Products","add_Products");
        
          $.ajax({
          type    : "POST",
          datatype: 'json',
          url    : "ProductCurd.php",
          contentType: false,
          processData: false,
          data:form_data,
            
          success: function(res){ 
          Lode();
          $('#Modal2').modal('hide');
          Toast.fire({
            icon: 'success',
            title: 'You are SuccsesFully Add New User !'
          })
          }
              
          });
    
 });//End Submit






     
</Script>







