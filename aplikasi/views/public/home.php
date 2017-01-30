<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author jajat ismail
 * @copyright 2017 moegi
 */
 
$jumlah_banner = $banners->num_rows(); 
 
?>
<div class="home">
    <div id="carousel-home" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
      <?
        for($i = 0; $i < $jumlah_banner; $i++){
            $active = $i == 0 ? 'class="active"' : '';
            echo '<li data-target="#carousel-home" data-slide-to="'.$i.'" '.$active.'></li>';
        }
      ?>
      </ol>
    
      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
      <?
        for($i = 0; $i < $jumlah_banner; $i++){
            $active = $i == 0 ? 'active' : '';
            $row = $banners->row($i);
            echo '<div class="item '.$active.'">';
            echo '<img src="'.base_url('assets/images/banners/'.$row->filename).'" />';
            echo '<div class="carousel-caption"><h3>'.$row->title.'</h3><p>'.$row->sub_title.'</p>';
            
            if ($row->link != ""){
                echo '<p><a href="'.$row->link.'" class="btn">EXPLORE</a></p>';
            }
            
            echo '</div>';
            echo '</div>';
        }
      ?>
      </div>
    
      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-home" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel-home" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

<!-- LAST STORIES -->
<br />
    <div class="title" style="margin: 15px 0; border-bottom: 1px solid #4e5836; padding-bottom: 5px;">
        LAST STORIES
        <a href="<? echo site_url('p/stories') ?>" class="pull-right more">
            MORE &gt;
        </a>
    </div>
    
    <div class="row list-stories">
        <?
            foreach ( $stories->result() as $row ) {
                echo "<div class='col-md-4'>";
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

<!-- NEW PRODUCTS -->

    <div class="title" style="margin: 15px 0; border-bottom: 1px solid #4e5836; padding-bottom: 5px;">
        NEW PRODUCTS
        <a href="<? echo site_url('p/products') ?>" class="pull-right more">
            MORE &gt;
        </a>
    </div>
    
    <ul class="list-products row">
        <?
            foreach ($products->result() as $row){
                echo '<li class="col-sm-4" style="height: 22em;">';
                echo '<a href="'.site_url('p/products/detail/'.$row->id_product.'/'.$row->name).'">';
                echo '<div class="photo-frame" style="width: 250px; height: 250px;">';
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
    </ul>
</div>