<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author jajat ismail
 * @copyright 2016 moegi
 */
 
?>
<!-- Main content -->
    <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Subscribers</h3>
          <div class="box-tools">
            <ul class="pagination pagination-sm no-margin pull-right">
              <li><a href="#">&laquo;</a></li>
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">&raquo;</a></li>
            </ul>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-striped table-hover">
            <thead>
                <tr>
                  <th style="width: 50px;">ID</th>
                  <th>Email</th>
                  <th style="width: 100px"><span class="glyphicon glyphicon-option-horizontal"></span></th>
                </tr>
            </thead>
            <tbody>
            <?
                foreach ( $query->result() as $row ) {
                    echo "<tr>";
                    echo "<td>".$row->id_subscriber."</td>";
                    echo "<td>".$row->email."</td>";
                    echo "<td align='center'>";
                    echo "<a href='#' class='label label-danger' style='padding: 5px 7px;' title='delete' data-toggle='modal' data-target='.modal' onclick='del(".$row->id_subscriber.")'><span class='glyphicon glyphicon-trash'></span></a>";
                    echo "</td>"; 
                    echo "</tr>";
                }
            ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
    </div>
<!-- /.content -->

<!-- Modal dialog -->
<div class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Delete Subscriber</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure want to delete the subscriber?</p>
      </div>
      <div class="modal-footer">
      <form method="post" action="">
        <input type="hidden" name="id_subscriber" id="id_subscriber" value="" />
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-primary" name="delete">Sure</button>
      </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /.Modal dialog -->

<script>
function del(id_subscriber){
    $("#id_subscriber").val(id_subscriber);
}
</script>