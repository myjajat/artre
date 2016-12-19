<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author jajat ismail
 * @copyright 2016 moegi
 */
 
$title = $this->input->post('title');
$story = $this->input->post('story');
$creator = $this->input->post('creator');
$link = $this->input->post('link');

if (isset($er_msg)){
    echo $this->mylib->create_msg($er_msg, 'danger');
}

?>
<!-- Main content -->
    <div class="box box-success">
    <form method="post" action="" enctype="multipart/form-data">
        <div class="box-header with-border">
            <h3 class="box-title">New Story</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="<? echo $title; ?>" required="" />
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label>Creator</label>
                    <input type="text" name="creator" class="form-control" value="<? echo $creator; ?>" required="" />
                </div>
                <div class="form-group col-sm-6">
                    <label>Creator's Link</label>
                    <input type="url" name="link" class="form-control" value="<? echo $link; ?>" placeholder="http://example.com/user" />
                </div>
            </div>
            <div class="form-group">
                <label>Story</label>
                <textarea name="story" class="" id="texteditor" required=""><? echo $story; ?></textarea>
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

<script>
    $(document).ready(function() {
        CKEDITOR.replace('texteditor');
    });
</script>