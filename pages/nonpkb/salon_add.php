<!-- general form elements disabled -->
   <?php
    include_once '../../lib/config.php';
    $idnonpkb=$_GET['idnonpkb'];
   ?>
<div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel" style="text-align: center;padding-right: 0px">Tambah Non PKB Salon <button type="button" class="close" aria-label="Close" onclick="$('#ModalAddsalon').modal('hide');"><span>&times;</span></button></h4>  
                    </div>
				            <!--<div class="box-header with-border">
				              <h3 class="box-title">Horizontal Form</h3>
				            </div>
				             /.box-header -->
				            <!-- form start -->
                    <div class="modal-body">
				            <form class="form-horizontal" enctype="multipart/form-data" novalidate id="formsalon">
                       
				                <div class="form-group">
                          <div class="col-sm-3">
                            <label for="namasalon">Nama</label>
                          </div>
				                  <div class="col-sm-6">
                            <input type="hidden" class="form-control" id="salon" name="salon" required>
				                    <input type="text" class="form-control" id="salonnm" name="salonnm" readonly required>
				                  </div><button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal" onclick="pilihsalon();">Pilih</button>
				                </div>
                        <div class="form-group">
                            <div class="col-sm-3">
                          <label for="hargapokoksalon">Harga</label>
                        </div>
                          <div class="col-sm-8">
                         <input type="text" class="form-control" id="hargapokok" name="hargapokok" required onchange="kali();">
                          </div>
                        </div>
				                <div class="form-group">
                            <div class="col-sm-3">
				                  <label for="hargajualsalon">Diskon</label>
                        </div>
				                  <div class="col-sm-3">
				                    <input type="text" class="form-control" id="diskon" name="diskon" required onchange="kali();">
				                  </div>%
				                </div>
                        
                        <div class="form-group">
                            <div class="col-sm-3">
                          <label for="ppn">Harga Total</label>
                        </div>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="hargatotal" name="hargatotal" required readonly>
                          </div>
                        </div>
                        
				                <div class="form-group">
                           <div class="modal-footer">
				                  <div class="col-sm-8">
                            <input type="hidden" class="form-control" id="idnonpkb" name="idnonpkb" value="<?php echo $idnonpkb?>" required>
				                    <button type="submit" class="btn btn-primary save_submit" name="Submit" value="SIMPAN">Simpan</button>
                                    <button type="button" class="btn btn-primary" onclick="$('#ModalAddsalon').modal('hide');">&nbsp;Batal&nbsp;</button>
				                  </div>
                        </div>
				                </div>

				            </form>
				          </div>
				</div>
</div>
<?php include_once 'salon_pilih.php';?>
<script type="text/javascript">
  function pilihsalon(){ 
    $("#ModalPilihsalon").modal({backdrop: 'static', keyboard:false});   
  }
 
  function kali(){
    var hasil= $("#hargapokok").val()-($("#diskon").val()*$("#hargapokok").val()/100);
    $("#hargatotal").val(hasil);
    //alert(hasil);
  }
	$(document).ready(function (){
                      $("#formsalon").on('submit', function(e){
                          e.preventDefault();
                            //alert(disposisine)                       ;
                           						$.ajax({
                                                  type: 'POST',
                                                  url: 'nonpkb/salon_add_save.php',
                                                  data: new FormData(this),
                                                  contentType: false,
                                                  cache: false,
                                                  processData:false,
                                                  success: function(data){  
                                                      //var hsl=data.trim();
                                                      //alert(hsl);
                                                      //alert('nonpkb/nonpkb_detail_tab.php?idnonpkb=<?php //echo $idnonpkb;?>');
			                                                $("#tablesalon").load('nonpkb/salon_load.php?idnonpkb=<?php echo $idnonpkb;?>');

                                                      
                                                      $("#tablenonpkb").load('nonpkb/nonpkb_load.php');
                                                                      $('.modal-body').css('opacity', '');

                                                            alert('Data Berhasil Disimpan');
                                                            $('#ModalAddsalon').modal('hide');
                                                    $("#tablenonpkbdetail").load('nonpkb/nonpkb_detail_tab.php?idnonpkb=<?php echo $idnonpkb;?>');
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