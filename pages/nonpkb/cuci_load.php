      <?php
            include_once '../../lib/config.php';
            include_once '../../lib/fungsi.php';
            $idnonpkb=$_GET['idnonpkb'];
      ?>
      <table id="nonpkbcuci" class="table table-condensed table-bordered table-striped table-hover">
                <thead class="thead-light">
                <tr>
                          <th>Nama</th>
                          <th>Harga</th>
                          <th>Diskon</th>
                          <th>Harga</th>                          
                          <th><button type="button" class="btn btn btn-default btn-circle" onclick="open_addcuci(idnonpkb='<?php echo $idnonpkb;?>');"><span>Tambah</span></button></th>
                </tr>
                </thead>
                <tbody>
                <?php
                                    $j=1;
                                    $sqlcatat = "SELECT ep.*,p.nama FROM t_nonpkb_cuci_detail  ep
                                    LEFT JOIN t_cuci p ON ep.fk_cuci=p.id_cuci
                                    WHERE fk_nonpkb='$idnonpkb' ORDER BY id ASC";
                                    $rescatat = mysql_query( $sqlcatat );
                                    while($catat = mysql_fetch_array( $rescatat )){
                                ?>
                        <tr>
                          <td ><?php echo $catat['nama'];?></td>
                          <td ><?php echo rupiah2($catat['harga_jual_cuci']);?></td>
                          <td ><?php echo rupiah2($catat['harga_diskon_cuci']);?></td>
                          <td ><?php echo rupiah2($catat['harga_total_nonpkb_cuci']);?></td>
                          <td >
                                        <button type="button" class="btn btn btn-default btn-circle" id="<?php echo $catat['id'];?>" onclick="open_modalcuci(id='<?php echo $catat['id'];?>');"><span>Edit</span></button>
                                         <button type="button" class="btn btn btn-default btn-circle" id="<?php echo $catat['id'];?>" onclick="open_delcuci(id='<?php echo $catat['id'];?>');"><span>Hapus</span></button>

                                    </td>
                        </tr>
                    <?php }?>
                   
                </tfoot>
              </table>
              <script>
            $('#nonpkbcuci').DataTable();
          
           function open_addcuci(x){
              $.ajax({
                    url: "nonpkb/cuci_add.php?idnonpkb="+x,
                    type: "GET",
                      success: function (ajaxData){
                        $("#ModalAddcuci").html(ajaxData);
                        $("#ModalAddcuci").modal({backdrop: 'static', keyboard:false});
                      }
                    });
              }
           function open_delcuci(y){
                                $.ajax({
                                    url: "nonpkb/cuci_del.php?id="+y,
                                    type: "GET",
                                    success: function (ajaxData){
                                        $("#ModalDeletecuci").html(ajaxData);
                                        $("#ModalDeletecuci").modal({backdrop: 'static', keyboard:false});
                                    }
                                });
            };
            function open_modalcuci(z){
                              $.ajax({
                                  url: "nonpkb/cuci_edit.php?idnonpkb=<?php echo $idnonpkb;?>&id="+z,
                                  type: "GET",
                                  success: function (ajaxData){
                                      $("#ModalEditcuci").html(ajaxData);
                                      $("#ModalEditcuci").modal({backdrop: 'static', keyboard:false});
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