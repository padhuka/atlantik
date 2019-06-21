<?php
    include_once '../../lib/config.php';
    //include_once '../../lib/fungsi.php';
    $id_cuci = $_GET['id_cuci'];
    $sqlemp = "SELECT * FROM t_cuci WHERE id_cuci='$id_cuci'";
    $resemp = mysql_query( $sqlemp );
    $emp = mysql_fetch_array( $resemp );
?>

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hid_cuciden="true">&times;</span></button>
                        <h4 class="modal-title" id_cuci="myModalLabel">Hapus Data cuci</h4>
                    </div>
                        <div class="cuci-body">

                            <div class="row">
                                <div class="col-lg-6">
                                    <form>
                                    <div class="alert alert-danger">Apakah anda yakin ingin menghapus data ini ( <?php echo $emp['nama'];?>) ?</div>
                                        <div class="form-group">
                                            <input type="hidden" id="id_cuci" name="id_cuci" value="<?php echo $id_cuci;?>">
                                            <button type="button" class="btn btn-primary save_submit" name="Submit" value="SIMPAN">&nbsp;&nbsp;&nbsp;Ya&nbsp;&nbsp;&nbsp;</button>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal" aria-hid_cuciden="true">&nbsp;Batal&nbsp;</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <!-- /.cuci-body -->
                    </div>
                    <!-- /.cuci -->
                </div>

                <script type="text/javascript">
                  $(document).ready(function (){
                        $(".save_submit").click(function (e){
                            var id_cuci = $('#id_cuci').val();
                           $.ajax({
                                url: 'cuci/cuci_del_save.php?id_cuci='+id_cuci,
                                type: 'GET',
                                success: function (response){
                                      //alert('cuci/cuci_del_save.php?id_cuci='+id_cuci);
                                      $("#tablecuci").load('cuci/cuci_load.php');
                                      alert('Data Berhasil Dihapus');
                                      $('#ModalDelete').modal('hide');
                                }
                            });

                    });
                });
              </script> 