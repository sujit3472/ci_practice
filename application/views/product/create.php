<?php 
include(APPPATH.'views/layout/main_layout.php');
?>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="<?php echo base_url('product');?>">Back</a>
        </div>
    </div>
</div>


<form method="post" action="<?php echo base_url('product/store');?>">
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
                <input type="text" name="name" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category:</strong>
                <select name="category_id" id="" class="form-control">
                    <?php
                    if(!empty($arrCategory) && count($arrCategory) > 0) {

                        foreach ($arrCategory as $key => $name) {
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