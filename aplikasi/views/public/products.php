<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author jajat ismail
 * @copyright 2017 moegi
 */
 
?>

<div class="row">
    <div class="col-sm-3">
        <ul class="list-category">
        <?
            foreach ($categories->result() as $row){
                echo '<li>';
                echo '<a href="'.site_url('p/products/'.$row->id_category.'/'.$row->category).'">';
                echo $row->category;
                echo '</a>';
                echo '</li>';
            }
            echo '<li><a href="'.site_url('p/products').'">All</a></li>';
            
        ?>
        </ul>
    </div>
    <div class="col-sm-9">
        <ul class="list-products row">
        <?
            foreach ($query->result() as $row){
                echo '<li class="col-md-4 col-sm-6">';
                echo '<a href="'.site_url('p/product_detail/'.$row->id_product).'">';
                echo '<div class="photo-frame">';
                echo '<div class="photo" style="background-image: url(\''.base_url('assets/images/products/'.$row->filename).'\');"></div>';
                echo '</div>';
                echo '<div class="name">';
                echo $row->name;
                echo '</div>';
                echo '<div class="colors">';
                
                $colors = explode(',', $row->colors);
                foreach ($colors as $color){
                    echo '<span class="color" style="background-color: #'.$color.';"></span> ';
                }
                
                echo '</div>';
                echo '</a>';
                echo '</li>';
            }
        ?>
            <div class="loading">
                <img src="<? echo base_url('assets/images/loading26.gif') ?>" />
            </div>
        </ul>
        <div class="alert alert-info no-more">-- No more product --</div>
    </div>
</div>

<script type="text/javascript">
var cur_offset = 9;
var loading = false;
$(window).scroll(function()
{
    if($(window).scrollTop() == $(document).height() - $(window).height() && loading == false)
    {
        loading = true; $(".loading").show();
        
        $.get("<? echo site_url('p/products_ajax/'.$this->uri->segment(3,'')) ?>", { offset: cur_offset })
         .done(function(data){
            $(".loading").hide();
            if (data != ""){
                $(".loading").before(data);
                cur_offset += 9;
                loading = false;
            } else {
                $(".no-more").show("fast");
                setTimeout(function(){
                    $(".no-more").hide("slow");
                }, 3000);
            }
         });
    }
});
</script>