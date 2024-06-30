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
        <h1> Create BoM</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active"> Create BoM</li>
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
           
             
            <div class="col-sm-4 invoice-col">
                <table>
                  <tr>
                    <td><label>Code &nbsp;</label></td>
                    <td><input class="form-control" type="text" id="code" name="code" placeholder="Enter BoM code" /></td>
                  </tr>
                  <tr>
                    <td><label>BoM Name &nbsp;</label></td>
                    <td><input class="form-control" type="text" id="name" name="name" placeholder="Enter BoM code" /></td>
                  </tr>

                  <tr>
                    <td><label>Mfg Item &nbsp;</label></td>
                    <td>
                        <?php
                          echo Product::html_select_finished_goods("cmbFinishedProduct");
                        ?>
                    </td>
                  </tr>
                  <tr>
                    <td><label>Qty &nbsp;</label></td>
                    <td><input class="form-control" type="text" id="qty" name="qty" placeholder="Enter BoM code" /></td>
                  </tr>
                  <tr>
                    <td><label>Labor Cost &nbsp;</label></td>
                    <td><input class="form-control" type="text" id="labor_cost" name="labor_cost" placeholder="Enter BoM code" /></td>
                  </tr>
                </table>
              
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              
              
              
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">

              <table>
                <tr>
                  <td><b>BoM ID:</b></td>
                  <td><input type="text" style="width:60px" value="<?php echo Order::get_last_id() + 1; ?>" readonly /></td>
                </tr>
                <tr>
                  <td><b>Date:</b></td>
                  <td><input type="text" id="txtDate" value=<?php echo date("d-m-Y"); ?> /></td>
                </tr>
                
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
                    <th>Raw Materials</th>
                    <th>Cost</th>
                    <th>Qty</th>  
                    <th>UoM</th>                    
                    <th>Line Total</th>
                    <th><input type="button" id="clearAll" value="Clear" /></th>
                  </tr>
                  <tr>
                    <th></th>
                    <th>
                      <?php
                      echo Product::html_select_raw_material("cmbRawProducts");
                      ?>
                    </th>
                    <th><input type="text" id="txtCost" /></th>                    
                    <th><input type="text" id="txtQty" /></th> 
                    <th><?php
                      echo Uom::html_select("cmbUom");
                    ?></th>                  
                    <th></th>
                    <th><input type="button" id="btnAddToCart" value=" + " /></th>
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
            <div class="col-6">
              <strong>Remark</strong><br>
              <textarea id="txtRemark" class="form-control"></textarea>
            </div>
            <!-- /.col -->
            <div class="col-6">
              <p class="lead">Amount Due 2/22/2014</p>

              <div class="table-responsive">
                <table class="table">
                  <tbody>
                    <tr>
                      <th style="width:50%">Subtotal:</th>
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
             
              <button type="button"  id="btnProcessOrder" class="btn btn-danger float-right"><i class="far fa-credit-card"></i> Process BoM </button>
              
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

  
    //Show calander in textbox
    $("#txtOrderDate").datepicker({
      dateFormat: 'dd-mm-yy'
    });
    $("#txtDueDate").datepicker({
      dateFormat: 'dd-mm-yy'
    });


    //Save into database table
    $("#btnProcessOrder").on("click", function() {

      if(confirm("Are you sure?")){

          let code = $("#code").val();
          let bom_name= $("#name").val();
          let mfg_product_id = $("#cmbFinishedProduct").val();          
          let qty = $("#qty").val();
          let labor_cost = $("#labor_cost").val();    
          let date=$("#txtDate").val();   
          let remark = $("#txtRemark").val();
          let raw_items = items;

          let _data={
              "code": code,
              "bom_name": bom_name,
              "mfg_product_id": mfg_product_id,
              "qty": qty,
              "labor_cost": labor_cost,
              "date": date,
              "remark": remark,
              "raw_items": raw_items              
            }

          //console.log(_data);

          $.ajax({
            url: 'api/mfgbom/save',
            type: 'POST',
            data:_data,
            success: function(res) {
              console.log(res);
            
              $("#items").html("");
            }
          });

    }

    });

    //Show customer other information  

    //Show customer other information
    $("#cmbRawProducts").on("change", function() {

      $.ajax({
        url: 'api/product/find',
        type: 'GET',
       // contentType:"application/json",        
        data: {
          "id": $(this).val()
        },
        success: function(res) {
          console.log(res);
          let data = JSON.parse(res);
          let product=data.product;         

          $("#txtCost").val(product.regular_price);
          $("#txtQty").val(1);
        }
      });

    

    }); //  


    //Add item to bill temporarily       

    var items=[];
    $("#btnAddToCart").on("click", function() {

      let product_id = $("#cmbRawProducts").val();
      let name = $("#cmbRawProducts option:selected").text();

      let uom_id = $("#cmbUom").val();
      let uom_name = $("#cmbUom option:selected").text();

      let cost = $("#txtCost").val();
      let qty = $("#txtQty").val();      

      let item = {
        "name": name,
        "product_id": product_id,
        "uom_id":uom_id,
        "uom_name":uom_name,
        "cost": cost,
        "qty": parseFloat(qty)    
      };

      items.push(item);

      printCart(items);

    });

    $("body").on("click", ".delete", function() {
       let product_id=$(this).data("id");
       //console.log(product_id);
       
      items=items.filter(item=>{
        if(item.product_id!=product_id){
          return item;
        }
       });

       printCart(items);
       
    });

    $("#clearAll").on("click", function() {
       items=[];
    });


    //------------------Cart Functions----------//     


    function printCart(items) {
      let html="";
      
      items.forEach((item,i)=>{
          html+=`<tr><td>${i+1}</td><td>${item.name}</td><td>${item.cost}</td><td>${item.qty}</td><td>${item.uom_name}</td><td><input class='delete' type='button' value='Del' data-id='${item.product_id}' /></td></tr>`;
      });
        
      
      $("#items").html(html);
       
    }



  });
</script>
