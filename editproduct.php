<?php include 'inc/header.php' ;?>
<?php include 'inc/sidebar.php' ;?>
<?php include 'class/productdatabase.php' ;?>

<div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Product</h2>
                <div class="block"> 
				
				 <?php 
				 
				 $db = new Database();
			       if(isset($_GET['editid'])){
			 
			        $editid= $_GET['editid'];
					
		         }
		    
		         ?>
				
				<?php
				
				   if(isset($_POST['submit'])){
				      $productName=$_POST['productName'];
					  $productdesc=$_POST['productdec'];
					  
					  $productprice=$_POST['product_price'];
					 
					 $permited  = array('jpg', 'jpeg', 'png', 'gif','pdf');
				$file_name = $_FILES['image']['name'];
				$file_size = $_FILES['image']['size'];
				$file_temp = $_FILES['image']['tmp_name'];

				$div = explode('.', $file_name);
				$file_ext = strtolower(end($div));
				$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
				$uploaded_image = "upload/".$unique_image;
				
				if ( empty($productName) || empty ($productdesc) ||  empty( $productprice) || empty($uploaded_image)) {
				 echo "<span class='error'>Field Must Not be Empty ! </span>";
				}
			    if(!empty($file_name)){
				if ($file_size >1048567) {
				 echo "<span class='error'>Image Size should be less then 1MB!
				 </span>";
				} elseif (in_array($file_ext, $permited) === false) {
				 echo "<span class='error'>You can upload only:-"
				 .implode(', ', $permited)."</span>";
				} else{		
				   move_uploaded_file($file_temp, $uploaded_image);
				   
				      $query = "update product                         /* update image */
					       set
					       name   = '$productName',							   
					       description = '$productdesc',
						  
						   price = '$productprice',
						   image   = '$uploaded_image'
						   
					       WHERE id = $editid";
						   $update_row = $db->productupdate($query);
					 if ($update_row) {
				   echo "<span class='success'>Data Updated Successfully.
				 </span>";
				}else {
				 echo "<span class='error'>Data Not Updated !</span>";
				}
				
					
				   
				   
	
			} 
					}else{
                          $query = "update product                         /* update without image */
					       set
					       name   = '$productName',							   
					       description = '$productdesc',
						  
						   price = '$productprice',
						   image   = '$uploaded_image'
						   
					       WHERE id = $editid";
						   $update_row = $db->productupdate($query);
					   if ($update_row) {
					  echo "<span class='success'>Data Updated Successfully.
					 </span>";
					}else {
					 echo "<span class='error'>Data Not Updated !</span>";
					}						  
			
					 }
					  }
				      
					  
				?>
				

   
				
		
				     <?php
                        $productquery="SELECT * FROM product
                                
							   where product.id=$editid ";
          
					     $read_product=$db->productselect($productquery);
					     if($read_product){
						
						 while($result_product=$read_product->fetch_assoc()){
					    


				      ?>
                  <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                   
                      
                                
                   
                        <tr>

                            <td>
                               productName:  <input type="text" value="<?php echo $result_product['name'];?>" name="productName" />
	
                            </td>
						</tr>
						
						
						<tr>
                          
                            <td>
                              productDesc:  <textarea class="tinymce" name="productdec">
							         <?php echo $result_product['description'] ;?>
							    
							  </textarea>
	
                            </td>
						</tr>
						
						<tr>

                            <td>
                               productPrice:  <input type="text" value="<?php echo $result_product['price'];?>" name="product_price" />
	
                            </td>
						</tr>

						<tr>
						<td>
							  <img width="150px" height="100px" src="<?php echo $result_product['image'];?>"/>
                               <input type="file" name="image" />
                        </td>
						
						</tr>
						<tr>
							<td>
                               <input type="submit" name="submit" Value="Save" /> 
							   
                            </td>
						<tr>	
                       
                      
                    </table>
                    </form>
					<?php }}?>
                </div>
						
                </div>
            </div>
        </div>


<?php include 'inc/footer.php' ;?>