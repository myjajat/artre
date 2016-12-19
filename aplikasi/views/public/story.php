<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author jajat ismail
 * @copyright 2016 moegi
 */

$row = $query->row(); 

?>

<section class="story">
    <header class="story-title">
        <? echo $row->title; ?>
    </header>
    <div class="story-creator">
        By 
        <? 
            if ($row->link != ""){
                echo '<a href="'.$row->link.'" target="_blank">';
                echo $row->creator;
                echo '</a>'; 
            } else {
                echo $row->creator;
            }
        ?>
    </div>
    <div class="story-date">
        <time><? echo date("d F Y", strtotime($row->insert_date)); ?></time>
    </div>
    <article>
        <? echo $row->story; ?>
    </article>
    <div class="story-cover">
        <img src="<? echo base_url('assets/images/stories/'.$row->cover) ?>" width="100%" />
    </div>
</section>