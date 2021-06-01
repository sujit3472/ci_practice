<?php 
include(APPPATH.'views/layout/main_layout.php');
?>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Category List</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo base_url('category/create') ?>"> Add New Category</a>
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
            <th>Title</th>
            <th>Image</th>
            <th>Created Date</th>
            <th width="220px">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if(!empty($category) && count($category) > 0) {
        	foreach ($category as $item) { ?>      
        <tr>
            <td><?php echo $item->name; ?></td>

            <td>
                <?php if(!empty($item->file_name)) { ?>
                <img src="<?php echo base_url('uploads/'.$item->file_name); ?> "alt="" width="100px" height="50px"> 
            <?php } else { echo "NA";} ?>
            </td>
            <td><?php echo fn_formatted_Date($item->created_at); ?></td>          
            <td>
                <form method="DELETE" action="<?php echo base_url('category/delete/'.$item->id);?>">
                <a class="btn btn-info" href="<?php echo base_url('category/show/'.$item->id) ?>"> show</a>
                <a class="btn btn-primary" href="<?php echo base_url('category/edit/'.$item->id) ?>"> Edit</a>
                <button type="submit" class="btn btn-danger"> Delete</button>
                </form>
            </td>     
        </tr>
        <?php } } else { ?>
        	<tr>
        		<td colspan="3" class="text-center">No Record Found</td>
        	</tr>
        <?php }?>
    </tbody>
</table>
<p><?php echo $links; ?></p>

<?php 
include(APPPATH.'views/layout/footer.php');
?>