<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author jajat ismail
 * @copyright 2016 moegi
 */
 
class Mylib {
	
    public function create_msg($msg, $type = 'info')
	{
		switch ($type){ 
    	case 'danger':
            $icon = 'fa-ban';
            break;
    	case 'warning':
            $icon = 'fa-warning';
            break;
    	case 'success':
            $icon = 'fa-check';
            break;
    	default :
            $icon = 'fa-info';
        }
        return "
            <div class='alert alert-$type alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa $icon'></i> Alert!</h4>
                $msg
            </div>";
	}
}
?>