<?php 
include(APPPATH.'views/layout/main_layout.php');
?>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="<?php echo base_url('product');?>"> Back</a>
        </div>
    </div>
</div>
        

<form method="put" action="<?php echo base_url('product/update/'.$item['product_id']);?>">
    <?php
        if ($this->session->flashdata('errors')){
            echo '<div class="alert alert-danger">';
            echo $this->session->flashdata('errors');
            echo "</div>";
        }
    ?>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" value="<?php echo $item['product_name']; ?>">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category:</strong>
                <select name="category_id" id="" class="form-control">
                    <?php
                    if(!empty($arrCategory) && count($arrCategory) > 0) {

                        foreach ($arrCategory as $key => $name) {
                            if($item['category_id'] == $name->id)
                                echo "<option value='".$name->id."'selected>".ucfirst($name->name ?? '')."</option>";
                            else 
                                echo "<option value='".$name->id."'>".ucfirst($name->name ?? '')."</option>";
                        } 
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form> 

<?php 
include(APPPATH.'views/layout/footer.php');
?>