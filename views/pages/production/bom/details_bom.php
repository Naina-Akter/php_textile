<?php
if(isset($_POST["btnDetails"])){
  $bom=MfgBom::find($_POST["txtId"]);
  $bomdetails=MfgBomDetail::Filter($bom->id);
}else{
  $bom=new MfgBom();
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
          border-style: solid;
          border-color: blue;
          border-width: medium;
        }
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
 
    <div class="row my-3 mx-3">
      <div class="col-sm-6">
        <h1>Bill of Materials</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active"> BoM</li>
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
                    <td><input class="form-control" type="text" id="code" name="code" value="<?php echo $bom->code?>" /></td>
                  </tr>
                  <tr>
                    <td><label>BoM Name &nbsp;</label></td>
                    <td><input class="form-control" type="text" id="name" name="name" value="<?php echo $bom->name?>"  /></td>
                  </tr>

                  <tr>
                    <td><label>Mfg Item &nbsp;</label></td>
                    <td>
                        <?php
                          echo Product::html_select_finished_goods("cmbFinishedProduct",$bom->product_id);
                        ?>
                    </td>
                  </tr>
                  <tr>
                    <td><label>Qty &nbsp;</label></td>
                    <td><input class="form-control" type="text" id="qty" name="qty" value="<?php echo $bom->qty?>"  /></td>
                  </tr>
                  <tr>
                    <td><label>Labor Cost &nbsp;</label></td>
                    <td><input class="form-control" type="text" id="labor_cost" name="labor_cost" value="<?php echo $bom->labour_cost?>" /></td>
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
                  <td><input type="text" style="width:60px" value="<?php echo $bom->id ?>" readonly /></td>
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
                    <th></th>
                  </tr>
                
                </thead>
                <tbody id="items">
                  <?php
                   $subtotal=0;
                   foreach($bomdetails as $d){
                    $line_total=$d->cost*$d->qty;
                    $subtotal+=$line_total;
                     echo "<tr><td></td><td>$d->product</td><td>$d->cost</td><td>$d->qty</td><td>$d->uom</td><td>$line_total</td></tr>";
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
            <div class="col-6">
              <strong><?php //echo $bom->remark ?></strong><br>
              <textarea id="txtRemark" class="form-control"></textarea>
            </div>
            <!-- /.col -->
            <div class="col-6">
             

              <div class="table-responsive">
                <table class="table">
                  <tbody>
                    <tr>
                      <th style="width:50%">Subtotal:</th>
                      <td id="subtotal"><?php echo $subtotal;?></td>
                    </tr>


                    <tr>
                      <th>Total:</th>
                      <td id="net-total"><b> <?php echo $subtotal+$bom->labour_cost?></b></td>
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
