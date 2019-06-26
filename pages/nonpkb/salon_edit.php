<!-- general form elements disabled -->
   <?php
    include_once '../../lib/config.php';
    $idnonpkb=$_GET['idnonpkb'];
    $id=$_GET['id'];

    $sqlpan= "SELECT * FROM t_nonpkb_salon_detail WHERE id='$id'";
    $hslpan= mysql_fetch_array(mysql_query($sqlpan));

    $snm = "SELECT * FROM t_salon WHERE id_salon='$hslpan[fk_salon]'";
    $hnm = mysql_fetch_array(mysql_query($snm));

   ?>
<div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel" style="text-align: center;padding-right: 0px">Edit Data Salon <button type="button" class="close" aria-label="Close" onclick="$('#ModalEditsalon').modal('hide');"><span>&times;</span></button></h4> 
                    </div>
                    <!--<div class="box-header with-border">
                      <h3 class="box-title">Horizontal Form</h3>
                    </div>
                     /.box-header -->
                    <!-- form start -->
                    <div class="modal-body">
                    <form class="form-horizontal" enctype="multicuci/form-data" novalidate id="formsalonEdit">
                       
                        <div class="form-group">
                          <div class="col-sm-3">
                            <label for="namasalon">Nama</label>
                          </div>
                          <div class="col-sm-6">
                            <input type="hidden" class="form-control" id="salone" name="salone" value="<?php echo $hslpan['fk_salon'];?>" required>
                            <input type="text" class="form-control" id="salonnme" name="salonnme" value="<?php echo $hnm['nama'];?>" readonly required>                            
                          </div><button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal" onclick="pilihsalone();">Pilih</button>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-3">
                          <label for="hargapokoksalon">Harga</label>
                        </div>
                          <div class="col-sm-8">
                         <input type="text" class="form-control" id="hargapokoke" name="hargapokoke" value="<?php echo $hslpan['harga_jual_salon'];?>" required onchange="kaliedit();">
                         <input type="hidden" class="form-control" id="hargapokoklme" name="hargapokoklme" value="<?php echo $hslpan['harga_jual_salon'];?>" readonly required>
                          </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-3">
                          <label for="hargajualsalon">Diskon</label>
                        </div>
                          <div class="col-sm-3">
                            <input type="text" class="form-control" id="diskone" name="diskone" value="<?php echo $hslpan['diskon_salon'];?>" required onchange="kaliedit();">
                            <input type="hidden" class="form-control" id="hargadiskonlme" name="hargadiskonlme" value="<?php echo $hslpan['harga_diskon_salon'];?>" required readonly>
                          </div>%
                        </div>

                        <div class="form-group">
                            <div class="col-sm-3">
                              <label for="ppn">Harga Total</label>
                            </div>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="hargatotale" name="hargatotale" value="<?php echo $hslpan['harga_total_nonpkb_salon'];?>" required readonly>
                            <input type="hidden" class="form-control" id="hargatotallme" name="hargatotallme" value="<?php echo $hslpan['harga_total_nonpkb_salon'];?>" required readonly>
                          </div>                       
                        </div>

                        <div class="form-group">
                           <div class="modal-footer">
                              <div class="col-sm-8">
                                <input type="hidden" class="form-control" id="ide" name="ide" value="<?php echo $id?>" required>
                                <input type="hidden" class="form-control" id="idnonpkbe" name="idnonpkbe" value="<?php echo $idnonpkb?>" required>
                                <button type="submit" class="btn btn-primary save_submit" name="Submit" value="SIMPAN">Simpan</button>
                                        <button type="button" class="btn btn-primary" onclick="$('#ModalEditsalon').modal('hide');">&nbsp;Batal&nbsp;</button>
                              </div>
                          </div>
                        </div>

                    </form>
                  </div>
        </div>
</div>
<?php include_once 'salon_pilih_edit.php';?>
<script type="text/javascript">
  function pilihsalone(){ 
    $("#ModalPilihsalonEdit").modal({backdrop: 'static', keyboard:false});   
    //alert('milih');
  }
  function kaliedit(){
    
    var hasile= $("#hargapokoke").val()-($("#diskone").val()*$("#hargapokoke").val()/100);
    //alert($("#diskone").val());
    $("#hargatotale").val(hasile);
  }
  $(document).ready(function (){

                       $("#formsalonEdit").on('submit', function(e){
                          e.preventDefault();                 ;;
                                      $.ajax({
                                                  type: 'POST',
                                                  url: 'nonpkb/salon_edit_save.php',
                                                  data: new FormData(this),
                                                  contentType: false,
                                                  cache: false,
                                                  processData:false,
                                                  success: function(data){  
                                                      //var hsl = data.trim();
                                                      //alert(hsl);
                                                      $("#tablesalon").load('nonpkb/salon_load.php?idnonpkb=<?php echo $idnonpkb;?>');
                                                      $("#tablenonpkb").load('nonpkb/nonpkb_load.php');
                                                      $('.modal-body').css('opacity', '');

                                                      alert('Data Berhasil Disimpan');
                                                      $('#ModalEditsalon').modal('hide');
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