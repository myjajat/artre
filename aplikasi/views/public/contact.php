<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author jajat ismail
 * @copyright 2017 moegi
 */
 
?>

<div class="contact" style="max-width: 600px; margin: 0 auto;">
    <p>
        Silahkan isi form di bawah untuk bertanya<br />
        <dfn>Fill up the form below for inquiry</dfn>
    </p>
    <form method="post" action="" id="formContact" onsubmit="submitMsg(); return false;">
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
            <label>Judul / Subjects :</label>
            <input class="form-control" name="subject" type="text" value="" required="" />
        </div>
        <div class="form-group">
            <label>Pesan / Messages :</label>
            <textarea class="form-control" name="message" required="" rows="7"></textarea>
        </div>
        <div class="form-group" align="right">
            <div class="pull-left order-status">
                Oh, sorry! Order failed. Try Again
            </div>
            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-send"></span> <b>Send</b></button>
        </div>
        <div style="clear: both;">
            <br /><br />
        </div>
    </form>
</div>

<script>
    function submitMsg(){
        $('#formContact button').prop('disabled', true);
        $('.order-status').removeClass('alert-danger');
        $('.order-status').removeClass('alert-success');
        $('.order-status').text('Sending your message ... Please wait');
        $('.order-status').show();
        
        $.post('<? echo site_url('p/send_message'); ?>', $('#formContact').serialize())
         .fail(function(){
            $('.order-status').addClass('alert-danger');
            $('.order-status').text('Sorry! Your message can not be send. Try again');
            setTimeout(function(){
                $('#formContact button').prop('disabled', false);
            }, 5000);
         })
         .done(function( data ){
            if (data == ""){
                $('.order-status').addClass('alert-success');
                $('.order-status').text('Thank you! Your message successfully sent.');
                setTimeout(function(){
                    $('#formContact').each(function(){
                        this.reset();
                    });
                    $('#formContact button').prop('disabled', false);
                }, 5000);
            } else {
                $('.order-status').addClass('alert-danger');
                $('.order-status').text('Sorry! Your message can not be send. Try again');
                $('#formContact button').prop('disabled', false);
            }
         });
    }
</script>