      <?php
            include_once '../../lib/config.php';
            include_once '../../lib/fungsi.php';
      ?>
      <table id="nonpkb1" class="table table-condensed table-bordered table-striped table-hover">
                <thead class="thead-light">
                <tr>
                          <th>No</th>
                          <th>No Non PKB</th>
                          <th>Tgl Masuk</th>
                          <th>Tipe Kendaraan</th>
                          <th>No Polisi</th>
                          <th>Total Non PKB</th>

                     
                          <th><button type="button" class="btn btn btn-default btn-circle" onclick="open_add();"><span>Tambah</span></button></th>
                </tr>
                </thead>
                <tbody>
                <?php
                                    $j=1;
                                    $sqlcatat = "SELECT * FROM t_nonpkb
                                    ORDER BY tgl DESC";
                                    $rescatat = mysql_query( $sqlcatat );
                                    while($catat = mysql_fetch_array( $rescatat )){

                                ?>
                        <tr>
                          <td><?php echo $j++;?></td>
                          <td><button type="button" class="btn btn-link" id="<?php echo $catat['id_nonpkb']; ?>" onclick="open_est(idnonpkb='<?php echo $catat['id_nonpkb']; ?>');"><span><?php echo ($catat['id_nonpkb']);?></span></button></td>
                       
                          <td ><?php echo date('d-m-Y' , strtotime($catat['tgl']));?></td>
                          <td ><?php echo $catat['namamobil'];?></td>
                          <td ><?php echo $catat['fk_no_polisi'];?></td>
                           <td ><?php echo rupiah2($catat['total_netto_harga_jasa']);?></td>
                          <td >
                                        <?php if ($catat['approved']==0){?>
                                        <button type="button" class="btn btn btn-default btn-circle" id="<?php echo $catat['id_nonpkb']; ?>" onclick="open_modal(idnonpkb='<?php echo $catat['id_nonpkb']; ?>');"><span>Edit</span></button>
                                       <!--
                                        <button type="button" class="btn btn btn-default btn-circle" id="<?php //echo $catat['id_nonpkb']; ?>" onclick="open_approved(idnonpkb='<?php //echo $catat['id_nonpkb']; ?>');"><span>Approve</span></button>-->
                                        <?php } ?>

                                      <?php if ($catat['approved']==1 && $catat['pkb_batal']!='0000-00-00 00:00:00' ){?>
                                        <button type="button" class="btn btn btn-default btn-circle" id="<?php echo $catat['id_nonpkb']; ?>" onclick="open_del(idnonpkb='<?php echo $catat['id_nonpkb']; ?>');"><span>Batal</span></button>
                                         <?php } ?>

                                         <button type="button" class="btn btn btn-default btn-circle" id="<?php echo $catat['id_nonpkb']; ?>" onclick="cetak_est(idnonpkb='<?php echo $catat['id_nonpkb']; ?>');"><span>Cetak</span></button>

                                    </td>
                        </tr>
                    <?php }?>
                </tfoot>
              </table>
              <script>
            $('#nonpkb1').DataTable({
              "columnDefs": [
                  { "orderable": false, "targets": 5 }
                ],
              "language": {
                      "search": "Cari",
                      "lengthMenu": "Lihat _MENU_ baris per halaman",
                      "zeroRecords": "Maaf, Tidak di temukan - data",
                      "info": "Terlihat halaman _PAGE_ of _PAGES_",
                      "infoEmpty": "Tidak ada data di database"
                  }
            });
           
           function open_add(){
              $.ajax({
                    url: "nonpkb/nonpkb_add.php",
                    type: "GET",
                      success: function (ajaxData){
                        $("#ModalAdd").html(ajaxData);
                        $("#ModalAdd").modal({backdrop: 'static',keyboard: false});
                      }
                    });
              }
              
           function open_del(x){
                                $.ajax({
                                    url: "nonpkb/nonpkb_del.php?idnonpkb="+x,
                                    type: "GET",
                                    success: function (ajaxData){
                                        $("#ModalDelete").html(ajaxData);
                                        $("#ModalDelete").modal({backdrop: 'static',keyboard: false});
                                    }
                                });
            };
            function open_approved(x){
                                $.ajax({
                                    url: "nonpkb/nonpkb_approved.php?idnonpkb="+x,
                                    type: "GET",
                                    success: function (ajaxData){
                                        $("#ModalApproved").html(ajaxData);
                                        $("#ModalApproved").modal({backdrop: 'static',keyboard: false});
                                    }
                                });
            };
            function open_modal(y){
                              $.ajax({
                                  url: "nonpkb/nonpkb_edit.php?idnonpkb="+y,
                                  type: "GET",
                                  success: function (ajaxData){
                                      $("#ModalEdit").html(ajaxData);
                                      $("#ModalEdit").modal({backdrop: 'static',keyboard: false});
                                  }
                              });
            };
              
            function open_est(z){
                              $.ajax({
                                  url: "nonpkb/nonpkb_show.php?idnonpkb="+z,
                                  type: "GET",
                                  success: function (ajaxData){
                                      $("#ModalShow").html(ajaxData);
                                      $("#ModalShow").modal({backdrop: 'static',keyboard: false});
                                  }
                              });
            };

            function cetak_est(q){
                              $.ajax({
                                  url: "nonpkb/nonpkb_print.php?idnonpkb="+q,
                                  type: "GET",
                                  success: function (ajaxData){
                                      $("#ModalEstPrint").html(ajaxData);
                                      $("#ModalEstPrint").modal({backdrop: 'static',keyboard: false});
                                  }
                              });
            };
            
      </script>

<style type="text/css">
  .table {
    border-spacing: 0;
    border-collapse: collapse;
    margin-bottom: 0px;
  }
  .thead-light{
    background-color: lightgrey;
  }
  .btn {
    font-weight: bold;
    padding-bottom: 0px;
    padding-top: 3px;
    padding-left: 4px;
    padding-right: 4px;
  }
</style>