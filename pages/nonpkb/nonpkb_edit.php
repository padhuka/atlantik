<!-- general form elements disabled -->
   <?php

    include_once '../../lib/sess.php';
    include_once '../../lib/config.php';
    include_once '../../lib/fungsi.php';
    $idnonpkb= $_GET['idnonpkb'];
    $sqlpan= "SELECT * FROM t_nonpkb WHERE id_nonpkb='$idnonpkb'";
    $catat= mysql_fetch_array(mysql_query($sqlpan));

    $sqlcatat = "SELECT * FROM t_inventory_bengkel A, t_warna_kendaraan B  WHERE A.no_chasis='$catat[fk_no_chasis]' AND A.fk_warna_kendaraan=B.id_warna_kendaraan";  
    
    $swrn= mysql_fetch_array(mysql_query($sqlcatat));
    $wrne=$swrn['nama'];
    $kdwrne=$swrn['fk_warna_kendaraan'];

    $sas = "SELECT * FROM t_asuransi WHERE id_asuransi='$catat[fk_asuransi]'";
    $has= mysql_fetch_array(mysql_query($sas));
    $nmas=$has['nama'];
   ?>
<div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header"> 

                        <h4 class="modal-title" id="myModalLabel" style="text-align: center;padding-right: 0px">Edit Data nonpkb <button type="button" class="close" aria-label="Close" onclick="$('#ModalEdit').modal('hide');"><span>&times;</span></button></h4>
                    </div>
                    <!--<div class="box-header with-border">
                      <h3 class="box-title">Horizontal Form</h3>
                    </div>
                     /.box-header -->
                    <!-- form start -->
                    <div class="modal-body">
                    <form class="form-horizontal" enctype="multipart/form-data" novalidate id="formnonpkbe">
                        <div class="form-group">
                          <div class="col-sm-3">
                            <label for="kodenonpkb">Tgl Masuk</label>
                          </div>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="tgl" name="tgl" value="<?php echo date('d-m-Y' , strtotime($catat['tgl']));?>" readonly>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-3">
                            <label for="namanonpkb">No Polisi</label>
                          </div>
                          <div class="col-sm-7">
                            <input type="text" class="form-control" id="polisie" name="polisie"  value="<?php echo $catat['fk_no_polisi'];?>">
                          </div>
                          <button type="button" class="btn btn-primary btn-md data-toggle="modal" data-target="#myModal" onclick="editChasis();">Pilih</button>
                        </div>
                                   
                        <div class="form-group">
                          <div class="col-sm-3">
                            <label for="namanonpkb">No Chasis</label>
                          </div>
                          <div class="col-sm-7">
                            <input type="text" class="form-control" id="chasise" name="chasise"  value="<?php echo $catat['fk_no_chasis'];?>">
                          </div>
                          
                        </div>
                        <div class="form-group">
                          <div class="col-sm-3">
                            <label for="namanonpkb">No Mesin</label>
                          </div>
                          <div class="col-sm-7">
                            <input type="text" class="form-control" id="mesine" name="mesine"  value="<?php echo $catat['fk_no_mesin'];?>">
                          </div>
                        </div>
                                                            
                          <input type="hidden" class="form-control" id="idnonpkbe" name="idnonpkbe" value="<?php echo $idnonpkb;?>" readonly>
                          <input type="hidden" class="form-control" id="unamee" name="unamee" value="<?php echo $sesuname;?>" readonly>
                          <input type="hidden" class="form-control" id="customere" name="customere" readonly value="<?php echo $catat['fk_customer'];?>">                        
                        <div class="form-group">
                           <div class="modal-footer">
                          <div class="col-sm-8">
                            <button type="submit" class="btn btn-primary save_submit" name="Submit" value="SIMPAN">Simpan</button>
                                   <button type="button" class="btn btn-primary" onclick="$('#ModalEdit').modal('hide');">&nbsp;Batal&nbsp;</button>
                          </div>
                        </div>
                        </div>

                    </form>
                      <!--<table width="100%" border="1">
                        <tr>
                          <td>Panel</td>
                          <td>Part</td>
                        </tr>
                        <tr>
                          <td><div id="tablepanel"></div></td>
                          <td><div id="tablepart"></div></td>
                        </tr>
                      </table>
                  </div>-->
        </div>
</div>
<?php include_once 'nonpkb_chasis_edit_tab.php';?>
<script type="text/javascript">
  function editChasis(){ 
    $("#ModalChasisEdit").modal({backdrop: 'static',keyboard:false});   
  }
  $(document).ready(function (){

                      $("#formnonpkbe").on('submit', function(e){
                          var chs= $("#polisie").val();
                          if (chs==''){
                            alert('Data ada yang belum diisi');
                            return false;
                          }
                          e.preventDefault();
                            //alert(disposisine)                       ;
                                      $.ajax({
                                                  type: 'POST',
                                                  url: 'nonpkb/nonpkb_edit_save.php',
                                                  data: new FormData(this),
                                                  contentType: false,
                                                  cache: false,
                                                  processData:false,
                                                  success: function(data){
                                                        $("#tablenonpkb").load('nonpkb/nonpkb_load.php');
                                                        $('.modal-body').css('opacity', '');

                                                            alert('Data Berhasil Disimpan');
                                                            $('#ModalEdit').modal('hide'); 
                                                            var hsl=data.trim();       
                                                            
                                                             $.ajax({
                                                                url: "nonpkb/nonpkb_detail.php?idnonpkb="+hsl,
                                                                type: "GET",
                                                                  success: function (ajaxData){
                                                                    $("#ModalNonpkbDet").html(ajaxData);
                                                                    $("#ModalNonpkbDet").modal({backdrop: 'static', keyboard:false});
                                                                  }
                                                                }); 

                                                  }
                                                      
                                                });

                                      
              
                      });
    });

</script>

<style type="text/css">
  .modal-open .modal {
    overflow-y: hidden;
  }
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