<!-- general form elements disabled -->
   <?php
    include_once '../../lib/config.php';
    $idnonpkb=$_GET['idnonpkb'];
   ?>
<div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel" style="text-align: center;padding-right: 0px">Tambah Non PKB - Cuci<button type="button" class="close" aria-label="Close" onclick="$('#ModalAddcuci').modal('hide');"><span>&times;</span></button></h4>  
                    </div>
				            <!--<div class="box-header with-border">
				              <h3 class="box-title">Horizontal Form</h3>
				            </div>
				             /.box-header -->
				            <!-- form start -->
                    <div class="modal-body">
				            <form class="form-horizontal" enctype="multicuci/form-data" novalidate id="formcuci">
                       
				                <div class="form-group">
                          <div class="col-sm-3">
                            <label for="namacuci">Nama</label>
                          </div>
				                  <div class="col-sm-6">
                            <input type="hidden" class="form-control" id="cuci" name="cuci" required>
				                    <input type="text" class="form-control" id="cucinm" name="cucinm" readonly required>
				                  </div><button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal" onclick="pilihcuci();">Pilih</button>
				                </div>
                        <div class="form-group">
                            <div class="col-sm-3">
                          <label for="hargapokokcuci">Harga</label>
                        </div>
                          <div class="col-sm-8">
                         <input type="text" class="form-control" id="hargapokokp" name="hargapokokp" required  onchange="kalip();">
                          </div>
                        </div>
				                <div class="form-group">
                            <div class="col-sm-3">
				                  <label for="hargajualcuci">Diskon</label>
                        </div>
				                  <div class="col-sm-3">
				                    <input type="text" class="form-control" id="diskonp" name="diskonp" required onchange="kalip();">
				                  </div>%
				                </div>
                        <input type="hidden" class="form-control" id="qty" name="qty" required onchange="kalip();" >
                        <!--<div class="form-group">
                            <div class="col-sm-3">
                          <label for="hargajualcuci">Qty</label>
                        </div>
                          <div class="col-sm-3">
                            <input type="text" class="form-control" id="qty" name="qty" required onchange="kalip();">
                          </div>
                        </div>-->
                        <div class="form-group">
                            <div class="col-sm-3">
                          <label for="ppn">Harga Total</label>
                        </div>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="hargatotalp" name="hargatotalp" required readonly>
                          </div>
                        </div>                        
				                <div class="form-group">
                           <div class="modal-footer">
				                  <div class="col-sm-8">
                            <input type="hidden" class="form-control" id="idnonpkbp" name="idnonpkbp" value="<?php echo $idnonpkb?>" required>
				                    <button type="submit" class="btn btn-primary save_submit" name="Submit" value="SIMPAN">Simpan</button>
                                    <button type="button" class="btn btn-primary" onclick="$('#ModalAddcuci').modal('hide');">&nbsp;Batal&nbsp;</button>
				                  </div>
                        </div>
				                </div>

				            </form>
				          </div>
				</div>
</div>
<?php include_once 'cuci_pilih.php';?>
<script type="text/javascript">
  function pilihcuci(){ 
    $("#ModalPilihcuci").modal({backdrop: 'static', keyboard:false});   
  }
  function kalip(){
    var hasil= ($("#hargapokokp").val()-($("#diskonp").val()*$("#hargapokokp").val()/100))*$("#qty").val();
    $("#hargatotalp").val(hasil);
    //alert(hasil);
  }
  
	$(document).ready(function (){
                      $("#formcuci").on('submit', function(e){
                          e.preventDefault();
                            //alert(disposisine)                       ;
                           						$.ajax({
                                                  type: 'POST',
                                                  url: 'nonpkb/cuci_add_save.php',
                                                  data: new FormData(this),
                                                  contentType: false,
                                                  cache: false,
                                                  processData:false,
                                                  success: function(data){  
                                                      var hsl=data.trim();
                                                      alert(hsl);
			                                                $("#nonpkbcuci").load('nonpkb/cuci_load.php?idnonpkb=<?php echo $idnonpkb;?>');
                                                                      $('.modal-body').css('opacity', '');

                                                            alert('Data Berhasil Disimpan');
                                                            $('#ModalAddcuci').modal('hide');
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