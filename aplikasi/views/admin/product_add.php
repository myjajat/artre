<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author jajat ismail
 * @copyright 2016 moegi
 */
 
//$title = $this->input->post('title');
//$story = $this->input->post('story');
//$creator = $this->input->post('creator');

//if (isset($er_msg)){
//    echo $this->mylib->create_msg($er_msg, 'danger');
//}

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
                <input type="text" name="name" class="form-control" value="<? //echo $title; ?>" maxlength="100" required="" />
            </div>
            <div class="form-group">
                <label>Price</label>
                <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input type="number" class="form-control" name="price" value="" min="0" required="" />
                </div>
            </div>
            <div class="form-group ">
                <label>Colors</label>
                <select name="color" id="multiple" class="form-control select2-multiple" multiple="multiple">
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
                <textarea name="description" class="texteditor" id="texteditor" required=""><? //echo $story; ?></textarea>
            </div>
            <div class="form-group">
                <label>Cover</label>
                <input type="file" name="cover" required="" />
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-success pull-right"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
            <a href="<? echo site_url('administrator/stories'); ?>" class="btn btn-default">Cancel</a>            
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
        CKEDITOR.replace('texteditor');
    });
</script>