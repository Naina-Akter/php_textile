<?php
if(isset($_POST["btnDetails"])){
	$order=Order::find($_POST["txtId"]);
    $customer=Customer::find($order->customer_id);
}
?>
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
          box-shadow: 3px 7px 12px .5px gray ;  
         
           
        }
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
 
    <div class="row my-3 mx-3">
      <div class="col-sm-6">
        <h1>Invoice</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active"> Invoice</li>
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
          <div class="row invoice-info ms-2 my-3">
                <div class="col-sm-8 invoice-col mt-3">
                 <b> Customer Name:
                 
                    <?php
                      echo $customer->name;
                    ?></b>
                    <div id="customer-info "></div>
                   
                  <div>
                   <b> Shipping Address:
                  
						<?php
						   echo $order->shipping_address;
						?></b>
				 
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 float-right invoice-col">
                 
                  <table>
                    <tr><td><b>Order ID:</b></td><td> <?php  echo $order->id;?></td></tr>
                    <tr><td><b>Order Date:</b></td><td> <?php echo $order->order_date;?></td></tr>
                    <tr><td><b>Due Date:</b></td><td> <?php echo $order->delivery_date;?> </td></tr>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
				<table class="table table-striped">
                    <thead>
                    <tr>
                      <th>SN</th>
                      <th>Product</th>
                      <th>Price</th>
                      <th>Qty</th>                     
                      <th>Discount</th>
                      <th>Subtotal</th>
                      <th></th>
                    </tr>
                    
                    </thead>
                    <tbody>                    
                      <?php
					     $order_details= OrderDetail::all_by_order_id($order->id);
						 $i=1;
						 $sub_total=0;
						 foreach($order_details as $line){
							$line_total=$line->price*$line->qty-$line->discount;
							$sub_total+=$line_total;

                           echo "<tr><th>".$i++."</th>
						   <td>{$line->name}</td>
						   <td>{$line->price}</td>
						   <td>{$line->qty}</td>                     
						   <td>{$line->discount}</td>						   
						   <td>{$line_total}</td>
						   <td></td></tr>";
						 }
					  ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <!-- <div class="col-6">
                  <strong>Remark</strong><br>
                 <textarea id="txtRemark" readonly><?php echo $order->remark;?></textarea>
                </div> -->
                <!-- /.col -->
                <div class="col-12 mt-4">
                   

                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                     <tr>
                        <th style="width:85%">Subtotal:</th>
                        <td id="subtotal"><?php
						  echo $sub_total;
						?></td>
                      </tr>
                      
                     
                      <tr>
                        <th>Total:</th>
                        <td id="net-total"><?php						
						   echo $sub_total;				
						?></td>
                      </tr>
                    </tbody></table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="javascript:void(0)" onclick="print()"  rel="noopener" target="_blank" class="btn btn-dark"><i class="fas fa-print"></i> Print</a>
                  <button type="button" id="btnProcessOrder" class="btn btn float-right" style="background-color:rgb(130, 202, 6)"><i class="far fa-credit-card"></i> Process Invoice </button>
                  <button type="button" class="btn btn-danger float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->