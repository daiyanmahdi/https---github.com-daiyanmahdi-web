<?php include 'class/productdatabase.php' ;?>
<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <title>Document</title>
</head>
<body>

 

    <div class="container">


    <?php
    
    $productquery="SELECT * FROM product
       
      order by id desc";
      $read_product=$db->Productselect($productquery);
      if($read_product){
       $i=0;
      while($result_product=$read_product->fetch_assoc()){
      $i++;	

 ?>

        <h1 class="bg-primary text-center ">Food Menu</h5>
    
        <div class="row justify-content-end">
            <div class="col-lg-3 col-md-6 col-sm-12 ">
                <img  class ="img-fluid img-thumbnail  " src="img/aa.jpg" alt=""> 
                <p class="text-center fw-bold">burger</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <h5 class="text-center">price: 5 $</h5> 
                <button class="btn btn-danger d-block m-auto rounded-pill ">Add</button>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 ">
                <img  class ="img-fluid img-thumbnail  " src="img/aa.jpg" alt=""> 
                <p class="text-center fw-bold">burger</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <h5 class="text-center">price: 5 $</h5> 
                <button class="btn btn-danger d-block m-auto rounded-pill ">Add</button>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 ">
                <img  class ="img-fluid img-thumbnail  " src="img/aa.jpg" alt=""> 
                <p class="text-center fw-bold">burger</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <h5 class="text-center">price: 5 $</h5> 
                <button class="btn btn-danger d-block m-auto rounded-pill ">Add</button>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 ">
                <img  class ="img-fluid img-thumbnail  " src="img/aa.jpg" alt=""> 
                <p class="text-center fw-bold">burger</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <h5 class="text-center">price: 5 $</h5> 
                <button class="btn btn-danger d-block m-auto rounded-pill ">Add</button>
            </div> 
        </div>
    </div>
</body>
</html>