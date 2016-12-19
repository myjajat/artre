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
            echo "<a href='".site_url('p/story/'.$row->id_story.'/'.$row->title)."' class='btn'>EXPLORE</a>";
            echo "</div></div></div></div>";
        }
    ?>
    <div class="col-sm-6 col-md-4 load-more">
        <div class="box-story" onclick="load_more()">
            <div class="bg" style="background-image: url('<? echo base_url('assets/images/load-more.jpg') ?>');"></div>
        </div>
    </div>
</div>

<script>
    var cur_offset = 8;
    function load_more(){
        $.get("<? echo site_url('p/stories_ajax') ?>", { offset: cur_offset })
         .done(function(data){
            if (data != ""){
                $(".load-more").before(data);
                cur_offset += 9;
            } else {
                $(".load-more").hide();
            }
         });
    }
</script>