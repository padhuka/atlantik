<!-- general form elements disabled -->
   <?php
    include_once '../../lib/config.php';
    $idnonpkb=$_GET['idnonpkb'];
    $id=$_GET['id'];

    $sqlpan= "SELECT * FROM t_nonpkb_cuci_detail WHERE id='$id'";
    $hslpan= mysql_fetch_array(mysql_query($sqlpan));

    $snm = "SELECT * FROM t_cuci WHERE id_cuci='$hslpan[fk_cuci]'";
    $hnm = mysql_fetch_array(mysql_query($snm));

   ?>
<div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel" style="text-align: center;padding-right: 0px">Edit Data cuci <button type="button" class="close" aria-label="Close" onclick="$('#ModalEditcuci').modal('hide');"><span>&times;</span></button></h4> 
                    </div>
                    <!--<div class="box-header with-border">
                      <h3 class="box-title">Horizontal Form</h3>
                    </div>
                     /.box-header -->
                    <!-- form start -->
                    <div class="modal-body">
                    <form class="form-horizontal" enctype="multicuci/form-data" novalidate id="formcuciEdit">
                       
                        <div class="form-group">
                          <div class="col-sm-3">
                            <label for="namacuci">Nama</label>
                          </div>
                          <div class="col-sm-6">
                            <input type="hidden" class="form-control" id="cucie" name="cucie" value="<?php echo $hslpan['fk_cuci'];?>" required>
                            <input type="text" class="form-control" id="cucinme" name="cucinme" value="<?php echo $hnm['nama'];?>" readonly required>                            
                          </div><button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal" onclick="pilihcuciep();">Pilih</button>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3">
                          <label for="hargapokokcuci">Harga</label>
                        </div>
                          <div class="col-sm-8">
                         <input type="text" class="form-control" id="hargapokokep" name="hargapokokep" value="<?php echo $hslpan['harga_jual_cuci'];?>" required onchange="kaliep();">
                         <input type="hidden" class="form-control" id="hargapokoklmep" name="hargapokoklmep" value="<?php echo $hslpan['harga_jual_cuci'];?>" readonly required>
                          </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3">
                          <label for="hargajualcuci">Diskon</label>
                        </div>
                          <div class="col-sm-3">
                            <input type="text" class="form-control" id="diskonep" name="diskonep" value="<?php echo $hslpan['diskon_cuci'];?>" required onchange="kaliep();">
                            <input type="hidden" class="form-control" id="hargadiskonlmep" name="hargadiskonlmep" value="<?php echo $hslpan['harga_diskon_cuci'];?>" required readonly>
                          </div>%
                        </div>
                        <input type="hidden" class="form-control" id="qtye" name="qtye" required value="<?php echo $hslpan['qty_cuci'];?>" onchange="kaliep();">
                        
                        <div class="form-group">
                            <div class="col-sm-3">
                          <label for="ppn">Harga Total</label>
                        </div>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="hargatotalep" name="hargatotalep" value="<?php echo $hslpan['harga_total_nonpkb_cuci'];?>" required readonly>
                            <input type="hidden" class="form-control" id="hargatotallmp" name="hargatotallmp" value="<?php echo $hslpan['harga_total_nonpkb_cuci'];?>" required readonly>
                          </div>
                        </div>
                       
                        <div class="form-group">
                           <div class="modal-footer">
                          <div class="col-sm-8">
                            <input type="hidden" class="form-control" id="idep" name="idep" value="<?php echo $id?>" required>
                            <input type="hidden" class="form-control" id="idnonpkbep" name="idnonpkbep" value="<?php echo $idnonpkb?>" required>
                            <button type="submit" class="btn btn-primary save_submit" name="Submit" value="SIMPAN">Simpan</button>
                                    <button type="button" class="btn btn-primary" onclick="$('#ModalEditcuci').modal('hide');">&nbsp;Batal&nbsp;</button>
                          </div>
                        </div>
                        </div>

                    </form>
                  </div>
        </div>
</div>
<?php include_once 'cuci_pilih_edit.php';?>
<script type="text/javascript">
  function pilihcuciep(){ 
    $("#ModalPilihcuciEdit").modal({backdrop: 'static', keyboard:false});   
    //alert('milih');
  }
   
  function kaliep(){
     var hasil= ($("#hargapokokep").val()-($("#diskonep").val()*$("#hargapokokep").val()/100))*$("#qtye").val();
    $("#hargatotalep").val(hasil);
  }
  $(document).ready(function (){

                      $("#formcuciEdit").on('submit', function(e){
                          e.preventDefault();
                            //alert(disposisine)                       ;
                                      $.ajax({
                                                  type: 'POST',
                                                  url: 'nonpkb/cuci_edit_save.php',
                                                  data: new FormData(this),
                                                  contentType: false,
                                                  cache: false,
                                                  processData:false,
                                                  success: function(data){  
                                                      //var hsl = data.trim();
                                                      //alert(hsl);
                                                      $("#nonpkbcuci").load('nonpkb/cuci_load.php?idnonpkb=<?php echo $idnonpkb;?>');
                                                      $("#tablenonpkb").load('nonpkb/nonpkb_load.php');
                                                      $('.modal-body').css('opacity', '');

                                                      alert('Data Berhasil Disimpan');
                                                      $('#ModalEditcuci').modal('hide');
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