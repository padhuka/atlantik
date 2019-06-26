      <?php
            include_once '../../lib/config.php';
            include_once '../../lib/fungsi.php';
            $idnonpkb=$_GET['idnonpkb'];
      ?>
      <table id="nonpkbsalon" class="table table-condensed table-bordered table-striped table-hover">
                <thead class="thead-light">
                <tr>
                          <th>Nama</th>
                          <th>Harga</th>
                          <th>Diskon</th>
                          <th>Harga</th>                          
                          <th><button type="button" class="btn btn btn-default btn-circle" onclick="open_addsalon(idnonpkb='<?php echo $idnonpkb;?>');"><span>Tambah</span></button></th>
                </tr>
                </thead>
                <tbody>
                <?php
                                    $j=1;
                                    $sqlcatat = "SELECT ep.*,p.nama FROM t_nonpkb_salon_detail ep
                                    LEFT JOIN t_salon p ON ep.fk_salon=p.id_salon
                                    WHERE fk_nonpkb='$idnonpkb' ORDER BY id ASC";
                                    $rescatat = mysql_query( $sqlcatat );
                                    //echo $sqlcatat;
                                    while($catat = mysql_fetch_array( $rescatat )){
                                ?>
                        <tr>
                          <td ><?php echo $catat['nama'];?></td>
                          <td ><?php echo rupiah2($catat['harga_jual_salon']);?></td>
                          <td ><?php echo rupiah2($catat['harga_diskon_salon']);?></td>
                          <td ><?php echo rupiah2($catat['harga_total_nonpkb_salon']);?></td>
                          <td >
                                        <button type="button" class="btn btn btn-default btn-circle" id="<?php echo $catat['id'];?>" onclick="open_modalsalon(id='<?php echo $catat['id'];?>');"><span>Edit</span></button>
                                         <button type="button" class="btn btn btn-default btn-circle" id="<?php echo $catat['id'];?>" onclick="open_delsalon(id='<?php echo $catat['id'];?>');"><span>Hapus</span></button>

                                    </td>
                        </tr>
                    <?php }?>
                   
                </tfoot>
              </table>
              <script>
            $('#nonpkbsalon').DataTable({
              "pageLength": 5
            });
          
           function open_addsalon(x){
              $.ajax({
                    url: "nonpkb/salon_add.php?idnonpkb="+x,
                    type: "GET",
                      success: function (ajaxData){
                        $("#ModalAddsalon").html(ajaxData);
                        $("#ModalAddsalon").modal({backdrop: 'static', keyboard:false});
                      }
                    });
              }
           function open_delsalon(y){
                                $.ajax({
                                    url: "nonpkb/salon_del.php?id="+y,
                                    type: "GET",
                                    success: function (ajaxData){
                                        $("#ModalDeletesalon").html(ajaxData);
                                        $("#ModalDeletesalon").modal({backdrop: 'static', keyboard:false});
                                    }
                                });
            };
            function open_modalsalon(z){
                              $.ajax({
                                  url: "nonpkb/salon_edit.php?idnonpkb=<?php echo $idnonpkb;?>&id="+z,
                                  type: "GET",
                                  success: function (ajaxData){
                                      $("#ModalEditsalon").html(ajaxData);
                                      $("#ModalEditsalon").modal({backdrop: 'static', keyboard:false});
                                  }
                              });
            };
      </script>

<style type="text/css">
.modal-open .modal {
    overflow-y: scroll;
   /* overflow-x: scroll;
*/
  }
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