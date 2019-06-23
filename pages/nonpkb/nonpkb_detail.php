<!-- general form elements disabled -->
   <?php

    include_once '../../lib/sess.php';
    include_once '../../lib/config.php';
    include_once '../../lib/fungsi.php';

    $idnonpkb=explode('-',$_GET['idnonpkb']);

    $sqles = "SELECT * FROM t_nonpkb WHERE id_nonpkb='$idnonpkb[0]'";
    $hes = mysql_fetch_array(mysql_query($sqles));
   ?>
<div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel" style="text-align: center;padding-right: 0px">Data Non PKB <button type="button" class="close" aria-label="Close" onclick="$('#ModalNonpkbDet').modal('hide');"><span>&times;</span></button></h4>   
                    </div>
                    
                    <div class="modal-body">

                   <div class="row">
                     <div class="col-sm-12">
                        <table id="nonpkbshow" class="table table-condensed table-bordered table-striped table-hover">
                          <td>
                         <th class="col-sm-6">
                        <tr> <th>Tgl Masuk</th> <td ><?php echo tampilTanggal(substr($hes['tgl'],0,10));?></td></tr>
                        <tr> <th>No Polisi</th> <td ><?php echo $hes['fk_no_polisi'];?></td></tr>
                        <tr> <th>No Chasis</th> <td ><?php echo $hes['fk_no_chasis'];?></td></tr>
                        <tr> <th>No Mesin</th>  <td ><?php echo $hes['fk_no_mesin'];?></td></tr>
                        
                        </th>
                       </td>
                        </table>

                     </div>
                   </div>
                    <hr>
                                           
                  </div>                  
                <div id="tablenonpkbdetail"></div>                
                <div class="form-group">
                           <div class="modal-footer">
                                <div class="but">
                                    <button type="button" class="btn btn-primary" name="cuci" onclick="cucie('<?php echo $idnonpkb[0];?>');">&nbsp;Cuci&nbsp;</button>
                                    <button type="button" class="btn btn-primary" name="salon" onclick="salone('<?php echo $idnonpkb[0];?>');">Salon</button>
                                </div>
                            </div>
                </div> 
                <div class="form-group">
                           <div class="modal-footer">
                                <div class="but">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">&nbsp;Simpan&nbsp;</button>
                                </div>
                            </div>
                </div>   
                <br>
        </div>
</div>
        <div id="ModalAddsalonx" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
        <div id="ModalAddcucix" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>

        <script type="text/javascript">
            $(document).ready(function (){
                 var idnonpkbe='<?php echo $idnonpkb[0];?>';
                 $("#tablenonpkbdetail").load('nonpkb/nonpkb_detail_tab.php?idnonpkb='+idnonpkbe);
            });

            function salone(x){

              $.ajax({
                    url: "nonpkb/salon_tab.php?idnonpkbne="+x,
                    type: "GET",
                      success: function (ajaxData){
                        $("#ModalAddsalonx").html(ajaxData);
                        $("#ModalAddsalonx").modal({backdrop: 'static',keyboard: false});
                      }
                    });
              }

            function cucie(y){
              $.ajax({
                    url: "nonpkb/cuci_tab.php?idnonpkbne="+y,
                    type: "GET",
                      success: function (ajaxData){
                        $("#ModalAddcucix").html(ajaxData);
                        $("#ModalAddcucix").modal('show',{backdrop: 'true'});
                      }
                    });
              }
        </script>

<style type="text/css">
.modal-open .modal {
    overflow-y: scroll;
   /* overflow-x: scroll;
*/
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
  .modal-content {
    height: 600px;
  }
  .but {
    text-align: center;
  }
  .modal-dialog {
    margin-bottom: 0px;
    border: 3px;
    width: 750px;
  }
</style>