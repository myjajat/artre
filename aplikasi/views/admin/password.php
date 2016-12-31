<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author jajat ismail
 * @copyright 2016 moegi
 */

$name = $this->input->post('name');
$price = $this->input->post('price');
$discount = $this->input->post('discount');
$colors = $this->input->post('colors');
$backstories = $this->input->post('backstories');
$specification = $this->input->post('specification');
$id_category = $this->input->post('category');

if (isset($er_msg)){
    echo $this->mylib->create_msg($er_msg, 'danger');
}

?>

<!-- Main content -->
<div class="row">
    <div class="col-lg-4 col-lg-offset-4 col-xs-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Change Password</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" class="form-control" name="old_password"  placeholder="Current Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">New Password</label>
                        <input type="password" class="form-control" name="new_password" placeholder="New Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_password" placeholder="Confirm New Password">
                    </div>
                    <?php
                    if(isset($msg)){
                        echo '<p class="'.$type.'" style="font-weight: bold">'.$msg.'</p>';
                    }?>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.content -->