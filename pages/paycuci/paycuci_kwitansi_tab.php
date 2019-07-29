    <?php
    include_once '../../lib/fungsi.php';
   ?>
     <div id="ModalpaycuciKwitansi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
      <div class="col-md-12">
                <div class="modal-content">
                    <div class="modal-header">
                         
                        <h4 class="modal-title" id="myModalLabel" style="text-align: center;padding-right: 0px">Data Non PKB <button type="button" class="close" aria-label="Close" onclick="$('#ModalpaycuciKwitansi').modal('hide');"><span>&times;</span></button></h4>                        
                    </div>

                  <div class="box">
                <table id="paycucikwitansi" class="table table-condensed table-bordered table-striped table-hover">
                <thead class="thead-light">
                <tr>
                          <th>No Non PKB</th>
                          <th>Nilai</th>
                          <th></th>
                </tr>

                </thead>
                <tbody>
                <?php
                                   $j=1;
                                   $sqlcatat = "SELECT * FROM t_nonpkb WHERE approved='0'";
                                    $rescatat = mysql_query( $sqlcatat );
                                    while($catat = mysql_fetch_array( $rescatat )){
                                ?>
                        <tr>
                          <td ><?php echo $catat['id_nonpkb'];?></td>
                          <td ><?php echo ($catat['total_netto_harga_jasa']);?></td>
                       
                          <td >
                                       
                                        <button type="button" class="btn btn btn-default btn-circle" onclick="selectKwitansi('<?php echo $catat['id_nonpkb'];?>','<?php echo ($catat['total_netto_harga_jasa']);?>');">Pilih</button>

                                    </td>
                        </tr>
                    <?php }?>
                </tfoot>
              </table>
              </div>
              </div>
              </div>
              </div>
              </div> 
              <script type="text/javascript">
                $('#paycucikwitansi').DataTable();

               function selectKwitansi(a,b){
                              $("#nokwitansi").val(a);
                              $("#nilai").val(b);
                              $("#ModalpaycuciKwitansi").modal('hide');
                              
                      }; 
              </script>

  <style type="text/css">
  .modal-header {
    padding-top: 15px;padding-bottom: 15px;
  }
  .title-header {
    font-size: 20px;
    text-align: center;
    font-weight: bold;
    font-family: monospace;
  }
  .modal-content {
    height: 650px;
  }
  .row {
    margin-left: 0px;
    margin-right: 0px;
    margin-top:10px;
  }
  .modal-title {
    padding-top: 5px;padding-bottom: 5px;
  }
</style>

