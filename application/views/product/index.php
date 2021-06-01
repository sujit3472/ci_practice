<?php 
include(APPPATH.'views/layout/main_layout.php');
?>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Product List</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo base_url('product/create') ?>"> Add New product</a>
        </div>
    </div>
</div>
<?php
    if ($this->session->flashdata('success')){
        echo '<div class="alert alert-success alert-dismissable" role="alert">';
        echo ' <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>';
        echo "<strong>". $this->session->flashdata('success')."</strong>";
        echo "</div>";
    }
?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Category Name</th>
            <th>Created Date</th>
            <th width="220px">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if(!empty($product) && count($product) > 0) {
        	foreach ($product as $item) { ?>      
        <tr>
            <td><?php echo $item->product_name; ?></td>
            <td><?php echo $item->category_name; ?></td>
            <td><?php echo fn_formatted_Date($item->product_created_date); ?></td>          
            <td>
                <form method="DELETE" action="<?php echo base_url('product/delete/'.$item->product_id);?>">
                <a class="btn btn-info" href="<?php echo base_url('product/show/'.$item->product_id) ?>"> show</a>
                <a class="btn btn-primary" href="<?php echo base_url('product/edit/'.$item->product_id) ?>"> Edit</a>
                <button type="submit" class="btn btn-danger"> Delete</button>
                </form>
            </td>     
        </tr>
        <?php } } else { ?>
        	<tr>
        		<td colspan="4" class="text-center">No Record Found</td>
        	</tr>
        <?php }?>
    </tbody>
</table>
<p><?php echo $links; ?></p>

<?php 
include(APPPATH.'views/layout/footer.php');
?>