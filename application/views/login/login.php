<?php 
include(APPPATH.'views/layout/main_layout.php');
?>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Login</h2>
        </div>
    </div>
</div>


<form method="post" action="<?php echo base_url('login/userLogin');?>">
    <?php
        if ($this->session->flashdata('errors')){
            echo '<div class="alert alert-danger">';
            echo $this->session->flashdata('errors');
            echo "</div>";
        }
    ?>
    <?php
        if ($this->session->flashdata('success')){
            echo '<div class="alert alert-success alert-dismissable">';
            echo $this->session->flashdata('success');
            echo "</div>";
        }
    ?>

    <?php 
        $csrf = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
            'check' => $this->config->item('foo')
        );
    ?>

    <div class="row">
        <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="email" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password:</strong>
                <input type="password" name="password" class="form-control">
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="<?php echo base_url('register');?>">Register</a>
        </div>
    </div>
</form>

<?php 
include(APPPATH.'views/layout/footer.php');
?>