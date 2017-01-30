<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author jajat ismail
 * @copyright 2016 moegi
 */


 
?>

<!-- Main content -->
    <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Product's Photo
            <small><? echo $name; ?></small>
          </h3>
        </div>
        <div class="box-body">
            <div id="photo-container" style="display: inline;"></div>
            <div class="photo-frame">
                <a id="btn_upload" class="btn btn-default flat btn-upload-photo" title="browse photo">
                    <span class="glyphicon glyphicon-plus-sign"></span>
                </a>
            </div>
        </div>
        <div class="box-footer">
            <a href="<? echo site_url('administrator/products') ?>" class="btn btn-success pull-right">Done</a>
        </div>
        <!-- Loading (remove the following to stop the loading) -->
        <div class="overlay" style="display: none;">
          <i class="fa fa-refresh fa-spin"></i>
        </div>
        <!-- end loading -->
    </div>
<!-- /.content -->

<!-- Modal dialog -->
<div class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Delete Photo</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure to delete the photo?</p>
      </div>
      <div class="modal-footer">
      <form method="post" action="">
        <input type="hidden" name="id_photo" id="id_photo" value="" />
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" name="delete">Yes</button>
      </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /.Modal dialog -->

<script type="text/javascript" src="<? echo base_url("assets/js/ajaxupload.js"); ?>"></script>
<script>
    $(document).ready(function(){
        loadPhotos();
        new AjaxUpload('btn_upload', {
            action: '<? echo site_url("administrator/ajax_photo_product_upload"); ?>',
			onSubmit : function(file , ext){
				this.setData({
					'id_product' : '<? echo $id_product; ?>'
				});
				$('.overlay').show();
			},
			onComplete : function(file, response){
				if (response != ""){
				    loadPhotos();
				} else {
				    console.log(response);
				    alert("Something error");
                    $('.overlay').hide();
				}
			}
		});
    });
    
    function loadPhotos(){
        $('.overlay').show();
        setTimeout(function(){
            $('#photo-container').load('<? echo site_url('administrator/ajax_photo_product/'.$id_product) ?>');
            $('.overlay').hide();
        }, 2000);
    }
    
    function deletePhoto(){
        
    }
</script>

<style>
    .photo-frame {
        display: inline-block;
    }
    
    .photo-frame img, .photo-frame #btn_upload {
        height: 100px; margin: 10px;
    }
    
    .photo-frame:hover .photo-delete {
        opacity: 1 !important;
    }
    
    .photo-delete {
        position: absolute; margin-top: 13px; margin-left: -28px; color: white; opacity: 0.2;
    }
    
    .photo-delete:hover {
        color: white;
    }
    
    .btn-upload-photo {
        width: 150px !important; height: 100px; font-size: 22pt; color: gray; padding-top: 31px;
    }
</style>