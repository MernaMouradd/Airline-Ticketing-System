<?php //session_start();
if (!isset($_SESSION["administrative_id"])) {
      
	echo '<script >';
	echo 'window.location="../greeting.php"';
	echo '</script>';
	exit;}
 if(!isset($_SESSION['date_created'])){echo '<script >';
	echo 'window.location="../greeting.php"';
	echo '</script>';
	exit;}
 include '../db_connect.php' ?>
<?php 


    if(isset($_SESSION['date_created'])){
        $date_created= $_SESSION['date_created'];
        $ticket= $conn->query("SELECT ticket_price FROM ticket_details t where date(t.date_created) ='$date_created'");
       
        $dayincome=0;
        foreach($ticket->fetch_array() as $k =>$v){
            $meta[$k] = $v;
            $dayincome=$dayincome+$meta[$k];
            
        }
        $ticket= $conn->query("SELECT ticket_price FROM ticket_details t ");
       
        $totalincome=0;
        foreach($ticket->fetch_array() as $k =>$v){
            $meta[$k] = $v;
            $totalincome=$totalincome+$meta[$k];
            
        }
  

   


?>

   
   <div class="containe-fluid">
   
       <div class="row">
           <div class="col-lg-12">
               
           </div>
       </div>
   
       <div class="row mt-3 ml-3 mr-3">
               <div class="col-lg-12">
               <div class="card">
                   <div class="card-body">
                 <p><?php echo "Income for  ".$_SESSION['date_created'].' = '.$dayincome  ?></p>
                 <p><?php echo "Total income =  ".$dayincome  ?></p>
                 
                   
 <style>
                   p {
    display: block;
    text-align: center;
    color: black;
    font: 40px Times , bold;
   

    }
</style>


                   </div>
                   <hr>
                   <div class="row">
                   
                   </div>
               </div>
               
           </div>
           </div>
       </div>
   
   </div>
   <script>
       
   </script>
<?php  }?>