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
<!-- Content Header (Page header) -->
<section class="content-header">
 
    <div class="row my-3 mx-3">
      <div class="col-sm-6">
        <h1> Create Money Receipt</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active"> Create Money Receipt</li>
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
          <div class="row invoice-info my-3">
             <!-- /.col -->
             <div class="col-sm-8 invoice-col">
               
                  <table>               
                    <tr>
                      <td><b>Receipt ID:</b></td>
                      <td><input id="receiptid" type="text"  style="width:60px" value="<?php echo MoneyReceipt::get_last_id() + 1; ?>" readonly /></td>
                    </tr>
                    <tr>
                      <td><b>Receipt Date:</b></td>
                      <td><input type="text" id="txtOrderDate" value=<?php echo date("d-m-Y"); ?> /></td>
                    </tr>
                    <tr>
                    <td><b> Search: </b>
                    <td> <input type="text"  placeholder="Enter Invoice Id" name="search"  size="30" id="search" /></td>
                    <td> <button id="go" class="btn btn-primary">Go</button></td>
                    </tr>
                  </table>
    
 
 
                </div>
                <!-- /.col -->
             
            <div class="col-sm-4 invoice-col">
              Customer
              <input type="text" class="form-control" id="customer" readonly="readonly" />
              <address>
               

                <div id="customer-info"></div>

              </address>
              <div>
                Shipping Address:<br>
                <textarea class="form-control" id="txtShippingAddress"></textarea>
              </div>
            </div>
           
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
                   
                  </tr>
               
                </thead>
                <tbody id="items">

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
              <textarea class="form-control" id="txtRemark"></textarea>
            </div> -->
            <!-- /.col -->
            <div class="col-12">
              <!-- <p class="lead">Amount Due 2/22/2014</p> -->

              <div class="table-responsive">
                <table class="table">
                  <tbody>
                    <tr>
                      <th style="width:90% ">Subtotal:</th>
                      <td id="subtotal">0</td>
                    </tr>


                    <tr>
                      <th>Total:</th>
                      <td id="net-total">0</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-12">
              <a href="javascript:void(0)" onclick="window.print()" rel="noopener" target="_blank" class="btn btn-dark"><i class="fas fa-print"></i> Print</a>
              <button type="button" id="btnProcessMr" class="btn float-right text-dark  border border-dark" style="background-color:rgb(130, 202, 6)";><i class="far fa-credit-card"></i><b> Process Money Receipt </b></button>
              <button type="button" class="btn float-right border border-dark"  style="margin-right: 5px; background-color:rgb(160, 99, 163)";>
                <i class="fas fa-download"></i><b> Generate PDF</b>
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
<script>
  $(function() {

  //----Global variables----

    var products=[];
    var customer_id;
    var date;


    //----------GO-------------
    $("#go").on("click",function(){ 
      let invoice_id=$("#search").val();          
      $.ajax({
        url:"api/order/find",
        type:"POST",
        data:{"id":invoice_id},
        success:function(res){
          let data=JSON.parse(res);
          $("#customer").val(data.customer.name);
          $("#txtShippingAddress").val(data.order.shipping_address);
          $("#txtOrderDate").val(data.order.order_date);
          
          customer_id=data.order.customer_id;
          products=data.products;        


          printRceipt(products);
        
          console.log(products);          

        }
      });
     

    });

    //Save into database table
    $("#btnProcessMr").on("click", function() {     
      let order_date = $("#txtOrderDate").val();
      let due_date = $("#txtDueDate").val();
      let discount = 0;
      let vat = 0;
      let shipping_address = $("#txtShippingAddress").val();
      let remark = $("#txtRemark").val();
      let receipt_total = $("#net-total").text();

     // let products = cart.getCart();

      $.ajax({
        url: 'api/moneyreceipt/save',
        type: 'POST',
        data: {
          "customer_id": customer_id,        
          "remark": remark,
          "receipt_total": receipt_total,
          "products": products
        },
        success: function(res) {

          let data=JSON.parse(res);
            $("#receiptid").val(data.id+1);

          window.print();
          console.log(res);
          cart.clearCart();
          $("#items").html("");
        }
      });

    });

   
    
 
    //Add item to bill temporarily      

    //------------------Cart Functions----------//     

    function printRceipt(products) {

    let orders = products;
    let sn = 1;
    let $bill = "";
    let subtotal = 0;

    if (orders != null) {

      orders.forEach(function(item, i) {
        //console.log(item.name);
        item.discount=item.discount==undefined?0:item.discount;

        subtotal += item.price * item.qty - item.discount;
        
        let $html = "<tr>";
        $html += "<td>";
        $html += sn;
        $html += "</td>";
        $html += "<td>";
        $html += item.name;
        $html += "</td>";
        $html += "<td data-field='price'>";
        $html += item.price;
        $html += "</td>";
        $html += "<td data-field='qty'>";
        $html += item.qty;
        $html += "</td>";
        $html += "<td data-field='discount'>";
        $html += item.total_discount==undefined?0:item.total_discount;
        $html += "</td>";
        $html += "<td data-field='subtotal'>";
        $html += item.price*item.qty - item.discount;
        $html += "</td>";
        $html += "<td>";
       // $html += "<input type='button' class='delete' data-id='" + item.item_id + "' value='-'/>";
        $html += "</td>";
        $html += "</tr>";
        $bill += $html;
        sn++;
      });
}

$("#items").html($bill);

//Order Summary
  $("#subtotal").html(subtotal);
  let tax = (subtotal * 0.05).toFixed(2);
  $("#tax").html(tax);
  $("#net-total").html(parseFloat(subtotal) + parseFloat(tax));
  }




  });
</script>
