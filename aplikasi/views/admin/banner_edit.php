<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author jajat ismail
 * @copyright 2016 moegi
 */
 
$link = $this->input->post('link');
$title = $this->input->post('title');
$sub_title = $this->input->post('sub_title');
$link = empty($link) ? $row->link : $link;
$title = empty($title) ? $row->title : $title;
$sub_title = empty($sub_title) ? $row->sub_title : $sub_title;
$banner = $row->filename;

if (isset($er_msg)){
    echo $this->mylib->create_msg($er_msg, 'danger');
}

?>

<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Edit Home Banner</h3>
    </div>
    <form method="post" action="" enctype="multipart/form-data">
    <div class="box-body">
        <div class="form-group">
            <label>Banner Image</label><br />
            <img src="<? echo base_url('assets/images/banners/'.$banner) ?>" height="100px" style="margin-bottom: 5px;" />
            <input class="form-control" type="file" name="banner" value="" />
        </div>
        <div class="form-group">
            <label>Banner Link</label>
            <input class="form-control" type="URL" name="link" value="<? echo $link ?>" maxlength="255" />
        </div>
        <div class="form-group">
            <label>Title</label>
            <input class="form-control" type="text" name="title" value="<? echo $title ?>" maxlength="150" />
        </div>
        <div class="form-group">
            <label>Sub Title</label>
            <input class="form-control" type="text" name="sub_title" value="<? echo $sub_title ?>" maxlength="255" />
        </div>
    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-success pull-right"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
        <a class="btn btn-default" href="<? echo site_url('administrator/banners') ?>">Cancel</a>
    </div>
    </form>
</div>