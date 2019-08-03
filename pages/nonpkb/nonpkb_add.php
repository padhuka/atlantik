<!-- general form elements disabled -->
   <?php

    include_once '../../lib/sess.php';
    include_once '../../lib/config.php';
    include_once '../../lib/fungsi.php';
    
   ?>
<div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel" style="text-align: center;padding-right: 0px">Tambah Data Non PKB <button type="button" class="close" aria-label="Close" onclick="$('#ModalAdd').modal('hide');"><span>&times;</span></button></h4>  
                    </div>
                    <!--<div class="box-header with-border">
                      <h3 class="box-title">Horizontal Form</h3>
                    </div>
                     /.box-header -->
                    <!-- form start -->
                    <div class="modal-body">
                    <form class="form-horizontal" enctype="multipart/form-data" novalidate id="formnonpkb">
                        <div class="form-group">
                          <div class="col-sm-3">
                            <label for="kodenonpkb">Tgl Masuk</label>
                          </div>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="tgl" name="tgl" value="<?php echo tampilTanggal($harinow);?>" readonly>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-3">
                            <label for="nmkendaraan">Tipe Kendaraan</label>
                          </div>
                          <div class="col-sm-7">
                            <input type="text" class="form-control" id="nmmobil" name="nmmobil" >
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-3">
                            <label for="namanonpkb">No Polisi</label>
                          </div>
                          <div class="col-sm-7">
                            <input type="text" class="form-control" id="polisi" name="polisi">
                          </div>
                          <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal" onclick="chasise();">Pilih</button>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-3">
                            <label for="namanonpkb">No Mesin</label>
                          </div>
                          <div class="col-sm-7">
                            <input type="text" class="form-control" id="mesin" name="mesin" >
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-3">
                            <label for="namanonpkb">No Chasis</label>
                          </div>
                          <div class="col-sm-7">
                            <input type="text" class="form-control" id="chasis" name="chasis" >
                          </div>
                        </div>
                                                
                        <div class="form-group">
                          <div class="col-sm-3">
                            <label for="namanonpkb">Tgl nonpkb Selesai</label>
                          </div>
                          <div class="col-sm-8">
                            <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="tglselesai" name="tglselesai" required value="<?php echo $harinow;?>">
                          </div>
                          </div>
                        </div> 
                         
                          <input type="hidden" class="form-control" id="uname" name="uname" value="<?php echo $sesuname;?>" readonly>
                          <input type="hidden" class="form-control" id="customer" name="customer" readonly>                        
                        <div class="form-group">
                           <div class="modal-footer">
                          <div class="col-sm-8">
                            <button type="submit" class="btn btn-primary save_submit" name="Submit" value="SIMPAN">Simpan</button>
                                   <button type="button" class="btn btn-primary" onclick="$('#ModalAdd').modal('hide');">&nbsp;Batal&nbsp;</button>
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
<?php include_once 'nonpkb_chasis_tab.php';?>
<script type="text/javascript">

  $('#tglselesai').datepicker({       
        format: 'yyyy-mm-dd',
        autoclose: true,
      });
  function chasise(){ 
    $("#ModalChasis").modal({backdrop: 'static',keyboard:false});   
  }
  $(document).ready(function (){

                      $("#formnonpkb").on('submit', function(e){
                          var chs= $("#polisi").val();
                          if (chs==''){
                            alert('Data ada yang belum diisi');
                            return false;
                          }
                          e.preventDefault();
                            //alert(disposisine)                       ;
                                      $.ajax({
                                                  type: 'POST',
                                                  url: 'nonpkb/nonpkb_add_save.php',
                                                  data: new FormData(this),
                                                  contentType: false,
                                                  cache: false,
                                                  processData:false,
                                                  success: function(data){
                                                        $("#tablenonpkb").load('nonpkb/nonpkb_load.php');
                                                        $('.modal-body').css('opacity', '');

                                                            alert('Data Berhasil Disimpan');
                                                            $('#ModalAdd').modal('hide'); 
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
  .modal-content {
    /*height: auto;
     width: 700px;*/
  }
  .modal-dialog {
    margin-bottom: 0px;
    border: 3px;
  }
</style>