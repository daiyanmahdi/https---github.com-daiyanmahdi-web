<?php include 'inc/header.php' ;?>
<?php include 'inc/sidebar.php' ;?>
<?php include 'class/productdatabase.php' ;?>



  <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Product</h2>
                <div class="block"> 
				<?php
				//  insert product
                  $db=new Database();
				  if(isset($_POST['submit'])){
					  $productName=$_POST['productName'];
					  
					  $productDesc=$_POST['productdec'];
					 
					  $productPrice=$_POST['product_price'];


					  $permited  = array('png','jpg');
					  $file_name = $_FILES['image']['name'];
					  $file_size = $_FILES['image']['size'];
					  $file_temp = $_FILES['image']['tmp_name'];
					  $div = explode('.', $file_name);
					  $file_ext =strtolower(end($div));
					  $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
					  $uploaded_image = "upload/".$unique_image;
					  if(empty($file_name)){
						  echo "<span style='color:red'>Field Must Not be Empty ! </span>";
					  }elseif($file_size >1048567){
						  echo "<span style='color:red'>Image Size should be less then 1MB!
					 </span>";
					  }elseif(in_array($file_ext, $permited) === false){
						  echo "<span style='color:red'>You can upload only:-"
						.implode(', ', $permited)."</span>";
					  }else{
						   move_uploaded_file($file_temp,$uploaded_image);
					  
					  if(empty($productName)||  empty($productDesc)||empty($productPrice)|| empty($uploaded_image)){
						  echo "fill must not be empty!";
					  }else{
						  $query="INSERT INTO product(name, description, price, image) 
				                  VALUES('$productName','$productDesc','$productPrice','$uploaded_image')";
						  $inserted_product=$db->Productinsert($query);
						  if($inserted_product){
							   echo "product insert success!";
						  }else{
							  echo "product not inserted!";
						  }
					  }
				  }
				}
				 
				?>
				

                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                   
                        <tr>

                            <td>
                               productName:  <input type="text" name="productName" />
	
                            </td>
						</tr>
						
						<tr>
                          
                            <td>
                              productDesc:  <textarea class="tinymce" name="productdec"></textarea>
	
                            </td>
						</tr>
						
						
						<tr>

                            <td>
                               productPrice:  <input type="text" name="product_price" />
	
                            </td>
						</tr>
						<tr>

                            <td>
                               Image:<input type="file" name="image" />
	
                            </td>
						</tr>
						<tr>
							<td>
                               <input type="submit" name="submit" Value="Save" /> 
							   
                            </td>
						<tr>	
                       
                      
                    </table>
                    </form>
                </div>
            </div>
        </div>
		
    </script>


<?php include 'inc/footer.php' ;?>