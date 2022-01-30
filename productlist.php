<?php include 'inc/header.php' ;?>
<?php include 'inc/sidebar.php' ;?>
<?php include 'class/productdatabase.php' ;?>

<div class="grid_10">
   <div class="box round first grid">
                <h2>Product List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="15%">Serial</th>
							<th width="15%">productname</th>
					
							<th width="20%">productdesc</th>
							<th width="15%">productprice</th>
							<th width="20%">Image</th>

							<th width="15%">Action</th>
						
							
						</tr>
					</thead>
					<!-- Select cat start-->
                     <?php 
                        	$db=new database(); 
							if(isset($_GET['delid'])){
                             $delid = $_GET['delid'];
							 $delquery="delete from product where id=$delid";
							 $delete=$db-> productdelete($delquery);
							 if($delete){
								 echo "<span class='sucsess'> Data delete successfully  </span>";

							 }else{
                                 echo "not delete";
							 }
							}
					        
					 
					 ?>



                	  <?php
                        	// $db=new database(); 
							 $productquery="SELECT * FROM product
                                
							   order by id desc";
							   $read_product=$db->Productselect($productquery);
							   if($read_product){
								$i=0;
						       while($result_product=$read_product->fetch_assoc()){
						       $i++;	

				  
				  


				          ?>
                   
                   
                        			 				 
						<tr class="odd gradeX" >
							<td><?php echo $i;?></td>
							<td><?php echo $result_product['name'] ;?></td>
							<td><?php echo $result_product['description'];?></td>
							<td><?php echo $result_product['price'];?></td>
						  
							<td><img style="height:30px; width:100px;" src="<?php echo $result_product['image'];?>" alt=""></td>

											
							<td><a href="editproduct.php?editid=<?php echo $result_product['id'] ; ?>">Edit</a> || <a onclick="return confirm('are you sure to delete')" href=?delid=<?php echo $result_product['id'];?>>Delete</a></td>
						</tr>
							   <?php }}?>
   
	
					 
					</tbody>
					
					
				
				</table>
	
               </div>
            </div>





	<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>

<?php include 'inc/footer.php' ;?>