<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author jajat ismail
 * @copyright 2016 moegi
 */



?>

<div class="page-title">
    Our Stories
</div>
<div class="sub-title">
    From Fellow Fieldwalker
</div>

<div class="row list-stories">
    <?
        foreach ( $query->result() as $row ) {
            echo "<div class='col-sm-6 col-md-4'>";
            echo "<div class='box-story'>";
            echo "<div class='bg' style='background-image: url(".base_url('assets/images/stories/'.$row->cover).");'></div>";
            echo "<div class='bg-kuning'>";
            echo "<div>";
            echo "<div class='title'>".$row->title."</div>";
            echo "<a href='".site_url('p/stories/detail/'.$row->id_story.'/'.$row->title)."' class='btn'>EXPLORE</a>";
            echo "</div></div></div></div>";
        }
    ?>
</div>
<div class="loading"><img src="<? echo base_url('assets/images/loading26.gif') ?>" /></div>
<div class="alert alert-info no-more">-- No more story --</div>

<script>
var cur_offset = 9;
var loading = false;
$(window).scroll(function(){
    if($(window).scrollTop() == $(document).height() - $(window).height() && loading == false){
        loading = true; $(".loading").show();
        $.get("<? echo site_url('p/stories_ajax') ?>", { offset: cur_offset })
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