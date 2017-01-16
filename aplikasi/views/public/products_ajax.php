<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author jajat ismail
 * @copyright 2017 moegi
 */

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