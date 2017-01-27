<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author jajat ismail
 * @copyright 2017 moegi
 */
 
?>

<div class="order" style="max-width: 600px; margin: 0 auto;">
    <form method="post" action="">
        <div class="row">
            <div class="form-group col-sm-6">
                <label>Nama / Name :</label>
                <input class="form-control" name="name" type="text" value="" placeholder="" required="" />
            </div>
            <div class="form-group col-sm-6">
                <label>No. Hp / Phone Number :</label>
                <input class="form-control" name="phone" type="text" value="" placeholder="" required="" />
            </div>
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
            <label>Nama Product / Product Name :</label>
            <input class="form-control" name="product" type="text" value="" required="" />
        </div>
        <div class="row">
            <div class="form-group col-sm-8">
                <label>Warna / Color :</label>
                <div class="form-control">
                    <input type="radio" name="color" required="" />
                    <input type="radio" name="color" required="" />
                    <input type="radio" name="color" required="" />
                </div>
            </div>
            <div class="form-group col-sm-4">
                <label>Ukuran / Size :</label>
                <select name="size" class="form-control">
                    <option>XXL</option>
                    <option>XL</option>
                    <option>L</option>
                    <option>M</option>
                    <option>S</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label>Catatan Tambahan / Extra Note :</label>
            <textarea class="form-control" name="note" required="" rows="7"></textarea>
        </div>
        <div class="form-group" align="right">
            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-send"></span> <b>Send</b></button>
        </div>
    </form>
</div>