<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author jajat ismail
 * @copyright 2017 moegi
 */
 
$product = $query->row();

foreach ($tbl_colors->result() as $row){
    $arr_colors[$row->color_kode] = $row->color_name;
}

?>

<div class="row product-detail">
    <div class="col-sm-7 photos" style="margin-bottom: 20px;">
        <figure>
            <div class="photo-utama" style="background-image: url('<? echo base_url('assets/images/products/'.$photos->row(0)->filename) ?>');"></div>
        </figure>
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
            <button onclick="order(); return false;" class="btn btn-xs btn-success" style="margin-left: 10px;">ORDER</button>
        </div>
        <br />
        <div class="deskripsi">
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
        <div class="order" style="display: none;">
            <form method="post" action="" id="formOrder" onsubmit="return submitOrder()">
                <div class="form-group">
                    <label>Nama / Name:</label>
                    <input class="form-control" type="text" name="name" value="" required="" />
                </div>
                <div class="form-group">
                    <label>No. Hp / Phone Number :</label>
                    <input class="form-control" name="phone" type="text" value="" placeholder="" required="" />
                </div>
                <div class="form-group">
                    <label>Email :</label>
                    <input class="form-control" name="email" type="email" value="" required="" />
                </div>
                <div class="form-group">
                    <label>Alamat / Address :</label>
                    <input class="form-control" name="address" type="text" value="" required="" />
                </div>
                <div class="form-group">
                    <label>Warna / Color :</label>
                    <div class="form-control">
                    <?
                        $colors = explode(',', $product->colors);
                        foreach ($colors as $color){
                            echo '<input type="radio" name="color" required="" value="'.$arr_colors[$color].'" /> ';
                            echo '<span class="color" style="background-color: #'.$color.';" title="'.$arr_colors[$color].'"></span> &nbsp &nbsp ';
                        }
                    ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Ukuran / Size :</label>
                    <select name="size" class="form-control">
                        <option>XXL</option>
                        <option>XL</option>
                        <option>L</option>
                        <option>M</option>
                        <option>S</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Catatan Tambahan / Extra Note :</label>
                    <textarea class="form-control" name="note" required="" rows="5"></textarea>
                </div>
                <div class="form-group button-group" align="right">
                    <div class="pull-left order-status alert-danger">
                        Oh, sorry! Order failed. Try Again
                    </div>
                    
                    <input type="hidden" name="product" value="<? echo $product->name; ?>" />
                    <button type="button" class="btn btn-danger" onclick="cancelOrder()">Cancel</button>
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart"></span> Order </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function selectPhoto(elm){
        $('.photo-utama').css('background-image','url(' + elm.href + ')');
    }
    
    function order(){
        $('.deskripsi').hide();
        $('.order').fadeIn(1000);
    }
    
    function cancelOrder(){
        $('.order').hide();
        $('.deskripsi').fadeIn(1000);
    }
    
    function submitOrder(){
        $('#formOrder button').hide();
        $('.order-status').removeClass('alert-danger');
        $('.order-status').removeClass('alert-success');
        $('.order-status').text('Sending your order data ... Please wait');
        $('.order-status').show();
        $.post('<? echo site_url('p/submit_order') ?>', $('#formOrder').serialize())
         .done(function( data ){
            if (data == ""){
                $('.order-status').addClass('alert-success');
                $('.order-status').text('Great! Your order data has been sent');
                setTimeout(function(){
                    cancelOrder();
                    $('#formOrder').each(function(){
                        this.reset();
                    });
                    $('#formOrder button').show();
                }, 3000);
            } else {
                $('.order-status').addClass('alert-danger');
                $('.order-status').text('Oh, sorry! Order failed. Try Again');
                $('#formOrder button').show();
            }
         })
         .fail(function(){
            $('.order-status').addClass('alert-danger');
            $('.order-status').text('Oh, sorry! Order failed. Try Again');
            setTimeout(function(){
                $('#formOrder button').show();
            }, 5000);
         });
         
         return false;
    }
</script>