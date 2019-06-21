<?php
    include_once '../../lib/config.php';
    //include_once '../../lib/fungsi.php';
    $id_salon = $_GET['id_salon'];
    $sqlemp = "SELECT * FROM t_salon WHERE id_salon='$id_salon'";
    $resemp = mysql_query( $sqlemp );
    $emp = mysql_fetch_array( $resemp );
?>

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hid_salonden="true">&times;</span></button>
                        <h4 class="modal-title" id_salon="myModalLabel">Hapus Data salon</h4>
                    </div>
                        <div class="salon-body">

                            <div class="row">
                                <div class="col-lg-6">
                                    <form>
                                    <div class="alert alert-danger">Apakah anda yakin ingin menghapus data ini ( <?php echo $emp['nama'];?>) ?</div>
                                        <div class="form-group">
                                            <input type="hidden" id="id_salon" name="id_salon" value="<?php echo $id_salon;?>">
                                            <button type="button" class="btn btn-primary save_submit" name="Submit" value="SIMPAN">&nbsp;&nbsp;&nbsp;Ya&nbsp;&nbsp;&nbsp;</button>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal" aria-hid_salonden="true">&nbsp;Batal&nbsp;</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <!-- /.salon-body -->
                    </div>
                    <!-- /.salon -->
                </div>

                <script type="text/javascript">
                  $(document).ready(function (){
                        $(".save_submit").click(function (e){
                            var id_salon = $('#id_salon').val();
                           $.ajax({
                                url: 'salon/salon_del_save.php?id_salon='+id_salon,
                                type: 'GET',
                                success: function (response){
                                      //alert('salon/salon_del_save.php?id_salon='+id_salon);
                                      $("#tablesalon").load('salon/salon_load.php');
                                      alert('Data Berhasil Dihapus');
                                      $('#ModalDelete').modal('hide');
                                }
                            });

                    });
                });
              </script> 