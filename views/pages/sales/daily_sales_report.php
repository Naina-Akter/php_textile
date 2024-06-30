

<!DOCTYPE html>
<html>
<head>
    <title>Your Form Page</title>
</head>
<style>
  #cmbCustomer {
    padding: 5px;
  }
  body{
            background-color: #F6F6F6; 
            margin: 0;
            padding: 0;
        }
       
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 80%;
            margin-right: auto;
            margin-left: auto;
            margin-top: 100px;
        }
        .brand-section{
           background-color: #0d1033;
           padding: 10px 40px;
        }
         

        .row{
            display: flex;
            flex-wrap: wrap;
           
        }
        .margin-top{
            margin-top: 30px;
        }
        .col-6{
            width: 50%;
            flex: 0 0 auto;
        }
        .text-white{
            color: #fff;
        }
        .company-details{
            float: right;
            text-align: right;
        }
        .font-size{
            font-size: 16px;
        }
        .float-right{
            float: right;
        }
        .container-fluid{
          border-style: solid;
          border-color: blue;
          border-width: medium;
        }
</style>
<body>
<section class="content-header">
 
 <div class="row my-3 mx-3">
   <div class="col-sm-6">
   <h1>Sales Report</h1>
   </div>
   <div class="col-sm-6">
     <ol class="breadcrumb float-sm-right">
       <li class="breadcrumb-item"><a href="#">Home</a></li>
       <li class="breadcrumb-item active">Sales Report</li>
     </ol>
   </div>
 </div>

</section>

<section class="content">
<div class="container-fluid py-4">
 <div class="row">
   <div class="col-12">
     <!-- Main content -->
     <div class="brand-section">
         <div class="row ">
             <div class="col-6 margin-top">
                 <h1 class="text-white "><b>BD Textile Ltd.</b></h1>
             </div>
             <div class="col-6">
                 <div class="company-details">
                     <p class="text-white">Kalihati,Tangail</p>
                     <p class="text-white">43/6 Kalihati Sadar</p>
                     <p class="text-white">01711787093</p>
                     <small class="float-right mb-2 text-white font-size"><b>Date: <?php echo date("d M Y")  ?></b></small>
                 </div>
             </div>
         </div>
 </div>
 <div class="m-3 text-right"></div>
       
    <form method="post" action="">
       <b> Date:</b> <input type="date" name="date">
     
        
        <input type="submit" value="Submit"  class="btn btn-danger my-4"></div>
    </form>
  

</body>
</html> 

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST["date"];  

   echo Order::item_wise_sales_report($date);
 }
?>


<?php 

//echo Order::item_wise_sales_report('2021-12-14');
?>
</section>