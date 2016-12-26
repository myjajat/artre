<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author jajat ismail
 * @copyright 2016 moegi
 */

$name       = $this->input->post('name');
$price      = $this->input->post('price');
$discount   = $this->input->post('discount');
$category   = $this->input->post('category');
$color      = $this->input->post('color');
$desc       = $this->input->post('description');
$spec       = $this->input->post('specification');

$name       = empty($name)? $row->name : $name;
$price      = empty($price)? $row->price : $price;
$discount   = empty($discount)? $row->discount : $discount;
$category   = empty($category)? $row->id_category : $category;
$color      = empty($color)? $row->colors : $color;
$desc       = empty($desc)? $row->backstories : $desc;
$spec       = empty($spec)? $row->specification : $spec;

if (isset($er_msg)){
    echo $this->mylib->create_msg($er_msg, 'danger');
}

?>

<!-- Main content -->
<div class="box box-success">
    <form method="post" action="" enctype="multipart/form-data">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Product</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="form-group">
                <label>Product's Name</label>
                <input type="text" name="name" class="form-control" value="<? echo $name; ?>" maxlength="100" required="" />
            </div>
            <div class="form-group">
                <label>Price</label>
                <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input type="number" class="form-control" name="price" value="<? echo $price; ?>" min="0" required="" />
                </div>
            </div>
            <div class="form-group">
                <label>Discount</label>
                <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input type="number" class="form-control" name="discount" value="<? echo $discount; ?>" />
                </div>
            </div>
            <div class="form-group ">
                <label>Category</label>
                <select name="category" class="form-control" required>
                    <? foreach ($categories->result() as $row){
                        $selected = $row->id_category == $category ? "selected" : "";
                        echo "<option value='$row->id_category' $selected>$row->category</option>";
                    }?>
                </select>
            </div>
            <div class="form-group ">
                <input type="hidden" id="color" value="<? echo $color; ?>">
                <label>Colors</label>
                <select name="color[]" id="multiple" class="form-control select2-multiple" multiple="multiple">
                    <option value="#000000">Black</option>
                    <option value="#ffffff">White</option>
                    <option value="#ff0000">Red</option>
                    <option value="#00ff00">Green</option>
                    <option value="#0000ff">Blue</option>
                    <option value="#ffff00">Yellow</option>
                    <option value="#8800ff">Purple</option>
                    <option value="#ff0088">Pink</option>
                    <option value="#ff8800">Orange</option>
                    <option value="#884400">Brown</option>
                    <option value="#888888">Gray</option>
                </select>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="texteditor" id="desc_texteditor" required=""><? echo $desc; ?></textarea>
            </div>
            <div class="form-group">
                <label>Spesification</label>
                <textarea name="specification" class="texteditor" id="spesc_texteditor" required=""><? echo $spec; ?></textarea>
            </div>
            <div class="form-group">
                <label>Cover</label>
                <input type="file" name="cover" required="" />
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
            width: null
        });
        CKEDITOR.replace('desc_texteditor');
        CKEDITOR.replace('spesc_texteditor');
    });

    var value = $('#color').val();
    $.each(value.split(","), function(i,e){
        $("#multiple option[value='" + e + "']").prop("selected", true);
    });
</script>