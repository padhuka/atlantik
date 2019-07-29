<!-- general form elements disabled -->
   <?php
   // include_once '../../lib/sess.php';
    include_once '../../lib/config.php';
    include_once '../../lib/fungsi.php';
    $idnonpkb= $_GET['idnonpkb'];
 //   $sqlpan= "SELECT * FROM t_nonpkb WHERE id_nonpkb='$idnonpkb'";
 //  $catat= mysql_fetch_array(mysql_query($sqlpan));
  
   ?>
<div class="modal-dialog">
           <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel" style="text-align: center;padding-right: 0px">Data Non PKB <button type="button" class="close" aria-label="Close" onclick="$('#ModalShow').modal('hide');"><span>&times;</span></button></h4>                    
                    </div>
                  <?php
                                    $j=1;
                                    $sqlcatat = "SELECT * FROM t_nonpkb e 
                                                  left join t_customer c
                                                  on e.fk_customer=c.id_customer
                                                  where e.id_nonpkb='$idnonpkb'";
                                    $rescatat = mysql_query( $sqlcatat );
                                    while($catat = mysql_fetch_array( $rescatat )){
                                ?>
                    <div class="modal-body">
                      <div class="modal-title-detail">Non PKB</div>
                      <div class="row">
                       <div class="col-sm-6">
                       <table id="nonpkbshow" class="table table-condensed table-bordered table-striped table-hover">
                       <td>
                         <th class="col-sm-6">
                        <tr> <th>No Non PKB</th> <td ><?php echo $catat['id_nonpkb'];?></td></tr>
                        <tr> <th>Tgl Masuk</th> <td ><?php echo $catat['tgl'];?></td></tr>
                        <tr> <th>No Chasis</th>  <td ><?php echo $catat['fk_no_chasis'];?></td></tr>
                        <tr> <th>No Mesin</th> <td ><?php echo $catat['fk_no_mesin'];?></td></tr>
                        <tr> <th>No Polisi</th>   <td ><?php echo $catat['fk_no_polisi'];?></td> </tr>
                        </th>
                       </td>
                      </table>
                           </div>
                          <!--
                            <div class="col-sm-6">
                               <table id="nonpkbshow" class="table table-condensed table-bordered table-striped table-hover">
                          <td>
                         <th class="col-sm-6">
                        <tr> <th>Kategori </th> <td ><?php echo $catat['kategori'];?></td></tr>
                        <tr> <th>KM Masuk</th> <td ><?php echo $catat['km_masuk'];?></td></tr>
                        <tr> <th>Asuransi</th>  <td ><?php echo $catat['fk_asuransi'];?></td></tr>
                        <tr> <th>Nama Customer</th> <td ><?php echo $catat['nama'];?></td></tr>
                        <tr> <th>Telp</th>   <td ><?php echo $catat['no_telp'];?></td> </tr>
                        </th>
                       </td>
                               </table>
                         </div>-->

                      </div>

                       <div class="modal-title-detail">NILAI NON PKB </div>
                      <div class="row">
                       <div class="col-sm-12">
                       <table id="nonpkbshow" class="table table-condensed table-bordered table-striped table-hover">
                       <td >
                         <th class="col-sm-2">
                        <tr> 
                            <th>Cuci</th><td><?php echo rupiah2($catat['total_gross_harga_cuci']);?></td> 
                            <th>Disc</th><td ><?php echo rupiah2($catat['total_diskon_rupiah_cuci']);?></td>
                            <th>Total Netto</th> <td><?php echo rupiah2($catat['total_netto_harga_cuci']);?></td>
                        </tr>
                        
                        <tr> 
                          <th>Salon</th><td><?php echo rupiah2($catat['total_gross_harga_salon']);?></td>
                          <th>Disc</th> <td><?php echo rupiah2($catat['total_diskon_rupiah_salon']);?></td>
                          <th>Total Netto</th> <td><?php echo rupiah2($catat['total_netto_harga_salon']);?></td>
                        </tr>
                        <tr class="total"> 
                          <th>Total Gross</th><td><?php echo rupiah2($catat['total_gross_harga_salon']);?></td>
                          <th>Total Diskon</th> <td><?php echo rupiah2($catat['total_diskon_rupiah_salon']);?></td>
                          <th>Total Netto</th> <td><?php echo rupiah2($catat['total_netto_harga_salon']);?></td>
                        </tr>

                        </th>
                       </td>
                      </table>
                      <?php }?>
                           </div>
                      </div>
                        <div class="form-group">
                     <div class="modal-footer">
                     <div class="but">
                                    <button type="button" class="btn btn-primary" name="Cuci" onclick="Cucishow('<?php echo $idnonpkb;?>');">&nbsp;Cuci&nbsp;</button>
                                    <button type="button" class="btn btn-primary" name="Salon" onclick="Salonshow('<?php echo $idnonpkb;?>');">Salon</button>
                     </div>
                     </div>
                     </div>
                       <div class="form-group">
                      <div class="modal-footer">
                      <div class="but">
                                    <button type="button" class="btn btn-primary" name="close" onclick="$('#ModalShow').modal('hide');">Close</button>
                     </div>
                     </div>
                     </div>
               </div>
           </div>
           </div>      
           <div id="ModalSalonShow" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
           <div id="ModalCuciShow" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
<script type="text/javascript">
  
            function Cucishow(y){
              $.ajax({
                    url: "nonpkb/cuci_show_tab.php?idnonpkbne="+y,
                    type: "GET",
                      success: function (ajaxData){
                        $("#ModalCuciShow").html(ajaxData);
                        $("#ModalCuciShow").modal({backdrop: 'static', keyboard:false});
                      }
                    });
              }
              function Salonshow(z){
              $.ajax({
                    url: "nonpkb/salon_show_tab.php?idnonpkbne="+z,
                    type: "GET",
                      success: function (ajaxData){
                        $("#ModalSalonShow").html(ajaxData);
                        $("#ModalSalonShow").modal({backdrop: 'static', keyboard:false});
                      }
                    });
              }

  
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
  .total {
  font-weight: bold;border-top:   inset;
  }
    .but {
    text-align: center;
  }
  .modal-title-detail {
    font-style: italic;
    background-color: lightblue;
    text-align: center;
    font-weight: bold;
  }
  .modal-dialog {
    margin-bottom: 0px;
    border: 3px;
    width: 800px;
  }
</style>