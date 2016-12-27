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
    <div class="box box-success">
    <form method="post" action="" enctype="multipart/form-data">
        <div class="box-header with-border">
            <h3 class="box-title">New Product</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="form-group">
                <label>Product's Name</label>
                <input type="text" name="name" class="form-control" value="<? echo $name; ?>" maxlength="100" required="" />
            </div>
            <div class="form-group">
                <label>Category</label>
                <select name="category" class="form-control">
                    <option value="">-- select --</option>
                <?
                    foreach ($list_categories->result() as $row){
                        echo '<option value="'.$row->id_category.'">';
                        echo $row->category;
                        echo '</option>';
                    }
                ?>
                </select>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label>Original Price</label>
                    <div class="input-group">
                        <span class="input-group-addon">Rp.</span>
                        <input type="number" class="form-control" name="price" value="<? echo $price; ?>" min="0" required="" />
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label>Discount Price</label>
                    <div class="input-group">
                        <span class="input-group-addon">Rp.</span>
                        <input type="number" class="form-control" name="discount" value="<? echo $discount; ?>" min="0" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Discount</label>
                <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input type="number" class="form-control" name="discount" value="" />
                </div>
            </div>
            <div class="form-group ">
                <label>Category</label>
                <select name="category" class="form-control" required>
                    <? foreach ($category->result() as $row){
                        echo "<option value='$row->id_category'>$row->category</option>";
                    }?>
                </select>
            </div>
            <div class="form-group ">
                <label>Colors</label>
                <select name="colors[]" id="multiple" class="form-control select2-multiple" multiple="multiple">
                <?
                    foreach ($list_colors->result() as $row){
                        echo '<option value="'.$row->color_kode.'">';
                        echo $row->color_name;
                        echo '</option>';
                    }
                ?>
                </select>
            </div>
            <div class="form-group">
                <label>Backstories</label>
                <textarea name="backstories" class="texteditor" required=""><? echo $backstories; ?></textarea>
            </div>
            <div class="form-group">
                <label>Specification</label>
                <textarea name="specification" class="texteditor" required=""><? echo $specification; ?></textarea>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-success pull-right"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
            <a href="<? echo site_url('administrator/products'); ?>" class="btn btn-default">Cancel</a>
        </div>
    </form>
    </div>
<!-- /.content -->

<script type="text/javascript">
    $(document).ready(function() {
        $('.select2-multiple').select2({
            theme: "bootstrap",
            width: null,
            placeholder: '-- select --'
        });
    });
</script>