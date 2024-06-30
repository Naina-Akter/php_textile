<style>
  select{
    padding: 5px;
    min-width:200px;
  }
  textarea{width: 100%;}

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
        <h1> Create Purchase</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active"> Create Purchase</li>
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
          <div class="col-sm-8 invoice-col">

            <table class="mt-4 -2">
            
                  <tr>
                    <td><b>Purchase ID:</b></td>
                    <td><input type="text" style="width:185px" value="<?php echo Purchase::get_last_id() + 1; ?>" readonly /></td>
                  </tr>
                  <tr>
                    <td><b>Purchase Date:</b></td>
                    <td><input type="text" id="txtPurchaseDate" value=<?php echo date("d-m-Y"); ?> /></td>
                  </tr>
                  <tr>
                    <td><b>Delivery Date:</b></td>
                    <td><input type="text" id="txtDeliveryDate" value=<?php echo date("d-m-Y"); ?> /></td>
                  </tr>
                 
                </table>
            </div>
            
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              Supplier
              <address>
                <?php
                  echo Supplier::html_select("cmbSupplier");
                ?>

                <div id="supplier-info"></div>
                <div>
                  Warehouse<br>
                    <?php
                        echo Warehouse::html_select("cmbWarehouse");?>
                  
                  </div>

              </address>
              <div>
                Shipping Address:<br>
                <textarea id="txtShippingAddress"></textarea>
              </div>
            </div>
            <!-- /.col -->
           
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-12 table-responsive">
              <table class="table table-active table-borderless mt-3">
                <thead>
                  <tr>
                    <th>SN</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Discount</th>
                    <th>Subtotal</th>
                    <th><input type="button" id="clearAll" value="Clear" /></th>
                  </tr>
                  <tr>
                    <th></th>
                    <th>
                      <?php
                      echo Product::html_select_raw_material();
                      ?>
                    </th>
                    <th><input type="text" id="txtPrice" /></th>
                    <th><input type="text" id="txtQty" /></th>
                    <th><input type="text" id="txtDiscount" /></th>
                    <th></th>
                    <th><input type="button" id="btnAddToCart" value=" + " /></th>
                  </tr>
                </thead>
                 <tbody id="items" style="height: 10px;">

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
              <textarea id="txtRemark"></textarea>
            </div> -->
            <!-- /.col -->
            <div class="col-12">
              <!-- <p class="lead text-right">Amount Due 2/22/2014</p> -->

              <div class="table-responsive">
                <table class="table">
                  <tbody>
                    <tr>
                      <th style="width:100%">Subtotal:</th>
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
              <a href=" javascript.void(0)" onclick="window.print()" rel="noopener" target="_blank" class="btn btn-info"><i class="fas fa-print"></i> Print</a>
              <button type="button" id="btnProcessPurchase" class="btn float-right" style="margin-right: 5px;background-color:rgb(150, 202, 6)";> <i class="far fa-credit-card"></i><b> Process Purchase</b> </button>
              <button type="button" class="btn float-right" style="margin-right: 5px;background-color:rgb(170, 89, 163);">
                <i class="fas fa-download"></i> <b>Generate PDF</b>
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

    const cart = new Cart("purchase");

    printCart();

    //Show calander in textbox
    $("#txtPurchaseDate").datepicker({
      dateFormat: 'dd-mm-yy'
    });
    $("#txtDeliveryDate").datepicker({
      dateFormat: 'dd-mm-yy'
    });
   

    //Save into database table
    $("#btnProcessPurchase").on("click", function() {

      let warehouse_id=$("#cmbWarehouse").val();
      let supplier_id = $("#cmbSupplier").val();
      let purchase_date = $("#txtPurchaseDate").val();
      let delivery_date = $("#txtDeliveryDate").val();
      let discount = 0;
      let vat = 0;
      let shipping_address = $("#txtShippingAddress").val();
      let remark = $("#txtRemark").val();
      let order_total = $("#net-total").text();

      let products = cart.getCart();

      $.ajax({
        url: 'api/purchase/save',
        type: 'POST',
        data: {
          "warehouse_id": warehouse_id,
          "supplier_id": supplier_id,
          "purchase_date": purchase_date, 
          "delivery_date":  delivery_date,    
          "shipping_address": shipping_address,
          "discount": discount,
          "vat": vat,
          "remark": remark,
          "purchase_total": order_total,
          "products": products
        },
        success: function(res) {
          console.log(res);
          cart.clearCart();
          $("#items").html("");
        }
      });

    });


    //Show customer other information
    $("#cmbSupplier").on("change", function() {
      $.ajax({
        url: 'api/Supplier/find',
        type: 'GET',
        data: {
          "id": $(this).val()
        },
        success: function(res) {
          let data = JSON.parse(res);
          //console.log(data.supplier);
          let supplier = data.supplier;

          $("#supplier-info").html(supplier.mobile + "<br>" + supplier.email);
        }
      });
    }); //    

    //Show customer other information
    $("#cmbProduct").on("change", function() {

      $.ajax({
        url: 'api/product/find',
        type: 'GET',
        data: {
          "id": $(this).val()
        },
        success: function(res) {
          let data = JSON.parse(res);
          let product=data.product;

          //$("#txtPrice").val(product.offer_price);
          //$("#txtQty").val(1);
        }
      });

    }); //  


    //Add item to bill temporarily

    $("#btnAddToCart").on("click", function() {

      let item_id = $("#cmbProduct").val();
      let name = $("#cmbProduct option:selected").text();

      let price = $("#txtPrice").val();
      let qty = $("#txtQty").val();
      let discount = $("#txtDiscount").val();

      let total_discount = discount * qty;
      let subtotal = price * qty - total_discount;

      let item = {
        "name": name,
        "item_id": item_id,
        "price": price,
        "qty": parseFloat(qty),
        "discount": discount,
        'total_discount': total_discount,
        "subtotal": subtotal
      };

      cart.save(item);
      printCart();

    });

    $("body").on("click", ".delete", function() {
      let id = $(this).data("id");    
      cart.delItem(id)
      printCart();
    });

    $("#clearAll").on("click", function() {
      cart.clearCart();
      printCart();
    });


    //------------------Cart Functions----------//     


    function printCart() {

      let orders = cart.getCart();
      let sn = 1;
      let $bill = "";
      let subtotal = 0;

      if (orders != null) {

        orders.forEach(function(item, i) {
          //console.log(item.name);
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
          $html += item.total_discount;
          $html += "</td>";
          $html += "<td data-field='subtotal'>";
          $html += item.subtotal;
          $html += "</td>";
          $html += "<td>";
          $html += "<input type='button' class='delete' data-id='" + item.item_id + "' value='-'/>";
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
<script src="js/cart.js"></script>