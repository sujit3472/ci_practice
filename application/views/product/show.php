<?php 
include(APPPATH.'views/layout/main_layout.php');
?>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="<?php echo base_url('product');?>"> Back</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Product Name:</strong>
            <?php echo $item['product_name']; ?>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Category Name:</strong>
            <?php echo $item['category_name']; ?>
        </div>
    </div>
   
</div>