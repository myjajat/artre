<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author jajat ismail
 * @copyright 2016 moegi
 */
 
?>

<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Home Banners</h3>
        <div class="box-tools">
            <a class="btn btn-success btn-sm" href="<? echo site_url('administrator/banner/add') ?>">
                <span class="glyphicon glyphicon-plus"></span>
            </a>
        </div>
    </div>
    <div class="box-body">
    <?
        foreach ($query->result() as $row){
            echo '<div class="media">';
            echo '<div class="pull-right">';
            echo '<a class="btn btn-info btn-xs" title="Edit" href="'.site_url('administrator/banner/edit/'.$row->id_banner).'"><span class="glyphicon glyphicon-pencil"></span></a> ';
            echo '<a href="#" class="btn btn-danger btn-xs" title="Delete" data-toggle="modal" data-target=".modal" onclick="$(\'#id_banner\').val('.$row->id_banner.');"><span class="glyphicon glyphicon-trash"></span></a>';
            echo '</div>';
            echo '<div class="media-left">';
            echo '<img class="media-object" src="'.base_url('assets/images/banners/'.$row->filename).'" />';
            echo '</div>';
            echo '<div class="media-body">';
            echo '<h4 class="media-heading"><b>'.$row->title.'</b></h4>';
            echo '<div>'.$row->sub_title.'</div>';
            echo '<small>';
            if ($row->link != ''){
                echo 'Linked to <a href="'.$row->link.'">'.$row->link.'</a> - ';
            }
            echo 'Created on '.date('d F Y', strtotime($row->insert_date));
            echo '</small>';
            echo '</div>';
            echo '</div>';
        }
    ?>
    </div>
</div>

<!-- Modal dialog -->
<div class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Delete Banner</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure to delete the banner?</p>
      </div>
      <div class="modal-footer">
      <form method="post" action="">
        <input type="hidden" name="id_banner" id="id_banner" value="" />
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-primary" name="delete">Yes</button>
      </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /.Modal dialog -->