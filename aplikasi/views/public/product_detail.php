<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author jajat ismail
 * @copyright 2017 moegi
 */
 
$product = $query->row();

?>

<div class="row product-detail">
    <div class="col-sm-7 photos" style="margin-bottom: 20px; padding-right: 50px;">
        <div class="photo-utama" style="background-image: url('<? echo base_url('assets/images/products/'.$photos->row(0)->filename) ?>');"></div>
        <div class="list-photo row">
        <?
            foreach ($photos->result() as $row){
                echo '<div class="col-xs-4">';
                echo '<a onclick="selectPhoto(this); return false;" style="background-image: url(\''.base_url('assets/images/products/'.$row->filename).'\')" href="'.base_url('assets/images/products/'.$row->filename).'"></a>';
                echo '</div>';
            }            
        ?>
        </div>
    </div>
    <div class="col-sm-5">
        <h3 style="text-transform: uppercase; font-weight: bold;"><? echo $product->name; ?></h3>
        <div class="harga">
            IDR
            <?
                if ($product->discount > 0){
                    echo '<del>'.number_format($product->price, 2, ',', '.').'</del> &gt; ';
                    echo number_format($product->discount, 2, ',', '.'); 
                } else {
                    echo number_format($product->price, 2, ',', '.');
                }
            ?>
            <a href="<? echo site_url('p/contact') ?>" class="btn btn-xs btn-success" style="margin-left: 10px;">ORDER</a>
        </div>
        <br />
        <div class="">
            <h4 style="font-weight: bold;">Backstories</h4>
            <? echo $product->backstories; ?>
        </div>
        <br />
        <div class="">
            <h4 style="font-weight: bold;">Specification</h4>
            <? echo $product->specification; ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    function selectPhoto(elm){
        $('.photo-utama').css('background-image','url(' + elm.href + ')');
    }
</script>