<?php include 'config.php'?>

<?php

class Database{
	 public $host   = DB_HOST;
     public $user   = DB_USER;
     public $pass   = DB_PASS;
     public $dbname = DB_NAME;
	
	 public $link;
     public $error;
	 
	 public function __construct(){
      //$this->connectDB();
	  $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
     }
	 
	 
	 
	private function connectDB(){
		   $this->link =new mysqli($this->host,$this->user,$this->pass,$this->dbname);
		    if(!$this->link){
				$this->error="Connection fail".$this->link->connect_error;
				return false;
			}
				
			
	 }
	 
	/* crud*/
	
	//select
	
	 public function productselect($query){
		      $result =$this->link->query($query)or
			   die($this->link->error.__LINE__);
			   if($result->num_rows > 0){
				    return $result;
			   }else{
				   return false;
			   }
	 }
	 
	 //add or insert
	 
	 public function productinsert($query){
		 
		 $insert_row =$this->link->query($query)or
			   die($this->link->error.__LINE__);
			   if($insert_row){
				   return $insert_row;
			   }else{
				    return false;
			   }
	 }
	 
	 
	  //update
	 
	  public function productupdate($query){
		$update_row = $this->link->query($query) or 
       die($this->link->error.__LINE__);
	   if($update_row){
		   return $update_row;
	   }else{
		   return false;
	   }
	   
	  }
	  
	   //delete
	
	  
	  public function productdelete($query){
		  $delete_row = $this->link->query($query) or 
            die($this->link->error.__LINE__);
			if($delete_row){
				return $delete_row;
			}else{
				return false;
			}
	  }
      public function catselect($query){
        $result =$this->link->query($query)or
         die($this->link->error.__LINE__);
         if($result->num_rows > 0){
              return $result;
         }else{
             return false;
         }
}
	
	
	
	
	
	
}


 ?>