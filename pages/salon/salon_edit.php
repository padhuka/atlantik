<!-- general form elements disabled -->
   <?php
    include_once '../../lib/config.php';
    include_once '../../lib/fungsi.php';
    $id_salon = $_GET['id_salon'];
    $sqlemp = "SELECT * FROM t_salon WHERE id_salon='$id_salon'";
    $resemp = mysql_query( $sqlemp );
    $emp = mysql_fetch_array( $resemp );
  ?>
<div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hid_salonden="true">&times;</span></button>
                        <h4 class="modal-title" id_salon="myModalLabel">Edit Data salon</h4>
                    </div>

                     <div class="modal-body">
				            <form class="form-horizontal" enctype="multipart/form-data" novalidate id="formsalon">
                        <div class="form-group">
                          <div class="col-sm-3">
                          <label for="kodesalon">Kode salon</label>
                        </div>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="id_salon" name="id_salon" value="<?php echo $emp['id_salon'];?>" readonly>
                          </div>
                        </div>
				                <div class="form-group">
                            <div class="col-sm-3">
				                  <label for="namasalon" >Nama</label>
                        </div>
				                  <div class="col-sm-8">
				                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $emp['nama'];?>" required>
				                  </div>
				                </div>
                        <div class="form-group">
                            <div class="col-sm-3">
                          <label for="hargapokoksalon">Harga Pokok</label>
                        </div>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="hargapokok" name="hargapokok"  value="<?php echo $emp['harga_pokok'];?>" required>
                          </div>
                        </div>
				                <div class="form-group">
                            <div class="col-sm-3">
				                  <label for="hargajualsalon" >Harga Jual</label>
                        </div>
				                  <div class="col-sm-8">
				                    <input type="text" class="form-control" id="hargajual" name="hargajual"  value="<?php echo $emp['harga_jual'];?>" required>
				                  </div>
				                </div>
                        <div class="form-group">
                            <div class="col-sm-3">
                          <label for="diskonsalon" >Diskon</label>
                        </div>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="diskon" name="diskon" value="<?php echo $emp['diskon'];?>" required>
                          </div>
                        </div>
                           <div class="form-group">
                            <div class="col-sm-3">
                          <label for="ppnsalon" >PPN</label>
                        </div>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="ppn" name="ppn" value="<?php echo $emp['ppn'];?>" required>
                          </div>
                        </div>
				                <div class="form-group">
                                  <div class="modal-footer">
				                  <div class="col-sm-8">
				                  	<input type="hidden" name="id_salonhid" id="id_salonhid" value="<?php echo $emp['id_salon'];?>">
                            <input type="hidden" name="namahid" id="namahid" value="<?php echo $emp['nama'];?>">
				                  	<button type="submit" class="btn btn-primary save_submit" name="Submit" value="SIMPAN">Simpan</button>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal" aria-hid_salonden="true">&nbsp;Batal&nbsp;</button>
				                  </div>
                                </div>
				                </div>
				            </form>
			         </div>
				</div>

</div>
<script type="text/javascript">
	$(document).ready(function (){

                      $("#formsalon").on('submit', function(e){
                          e.preventDefault();
                           						$.ajax({
                                                  type: 'POST',
                                                  url: 'salon/salon_edit_save.php',
                                                  data: new FormData(this),
                                                  contentType: false,
                                                  cache: false,
                                                  processData:false,
                                                  success: function(data){
                                                        //alert('lolos');
                                                        var hsl=data.trim();
                                                       // alert(hsl);
                                                        if (hsl=='y'){
			                                                alert('Data Sudah ada');
			                                                return false;
			                                                exit();
			                                            }else{
			                                                $("#tablesalon").load('salon/salon_load.php');
                                                            alert('Data Berhasil Disimpan');
                                                            $('#ModalEdit').modal('hide');
			                                            }
                                                      }
                                                });
                      });
    });
</script>
<style type="text/css">
  .modal-footer {
    padding-top: 10px;
    padding-bottom: 0px;
    padding-left: 0px;
    padding-right: 0px;
  }
  .modal-title {
    font-style: italic;
    background-color: lightcoral;
    text-align: center;
    font-weight: bold;
  }
  .modal-dialog {
    margin-bottom: 0px;
    border: 3px;
  }
</style>