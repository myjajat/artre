<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author jajat ismail
 * @copyright 2016 moegi
 */

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