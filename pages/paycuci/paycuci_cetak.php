<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<style type="text/css">
@media print {
  /* body * {
    visibility: hidden;
  } */
  #section-to-print, #section-to-print * {
    visibility: visible;
    color: white;
    font-size: 5rem;
  }
  #section-to-print {
    position: absolute;
    left: -10;
    top: 0;
    height:50mm;
    width:50mm;
    page-break-after:always;
  }
}
</style>
<body onload="javascript:window.print()">
<?php //onload="javascript:window.print()"
   // include_once '../../lib/sess.php';
    include_once '../../lib/config.php';
    include_once '../../lib/fungsi.php';
    $nobukti= $_GET['nobukti'];
    //   $sqlpan= "SELECT * FROM t_pkb WHERE id_pkb='$idpkb'";
 //  $catat= mysql_fetch_array(mysql_query($sqlpan));
  
   ?>

   <?php
                                    $sqlcatat = "SELECT * FROM t_paycuci WHERE no_bukti='$nobukti'";
                                    $rescatat = mysql_query( $sqlcatat );
                                    $catat = mysql_fetch_array( $rescatat );
                                    $idnonpkb= $catat['no_ref'];
                                ?>

                                <span class="hurufe">
                                <table width="100%" align="left" border="0">
                                  <tr>
                                    <td width="50%"><u><strong>Atlantic Repair & Car Wash</strong><br>
                                    </u>
                                    (0271) 7880845 <br>
                                    </td>
                                  </tr> 
                                </table>
                                ==================================<br>
                                No. Non PKB : <?php echo $nobukti;?><br>
                                 ==================================<br>
                                <?php echo $hrini;?><br>
                                 ==================================<br>
                                <table id="nonpkbsalon" class="table table-condensed table-bordered table-striped table-hover">
                <thead class="thead-light">
                        <tr><th>No</th><th>Pekerjaan</th><th>Total</th></tr>
                        </thead>
                        <tbody>
                <?php
                                    $j=1;
                                    $sqlcatatp = "SELECT * FROM t_nonpkb_salon_detail a LEFT JOIN t_salon p ON a.fk_salon=p.id_salon WHERE a.fk_nonpkb='$idnonpkb'";
                                    $rescatatp = mysql_query( $sqlcatatp );
                                    while($catatp = mysql_fetch_array( $rescatatp )){
                                ?>
                        <tr>
                          <td ><?php echo $j++;?>.</td>
                          <td ><?php echo $catatp['nama'];?></td>
                          <td align="right"><?php echo rupiah2($catatp['harga_total_nonpkb_salon']);?></td>
                        </tr>
                    <?php }
                           $j=$j;
                                    $sqlcatat2 = "SELECT * FROM t_nonpkb_cuci_detail a LEFT JOIN t_cuci p ON a.fk_cuci=p.id_cuci WHERE a.fk_nonpkb='$idnonpkb'";
                                    $rescatat2 = mysql_query( $sqlcatat2 );
                                    while($catat2 = mysql_fetch_array( $rescatat2 )){
                                ?>
                        <tr>
                          <td ><?php echo $j++;?>.</td>
                          <td ><?php echo $catat2['nama'];?></td>
                          <td align="right"><?php echo rupiah2($catat2['harga_total_nonpkb_cuci']);?></td>
                        </tr>
                    <?php }?>
                    <tr style="font-weight: bold;" ><td colspan="2" align="center" style="border-top: dotted;border-width: 1px;">Sub Total Jasa</td><td align="right" style="border-top: dotted;border-width: 1px;"><?php echo rupiah2($catat['total']);?></td></tr>
                </tfoot>
              </table>
              =================================<br>
                                Terima Dari : <?php echo $catat['diterima_dari'];?><br/>
                                Tanggal : <?php echo tampilTanggal(substr($catat['tgl_transaksi'],0,10));?><br>
                                Untuk Pembayaran : <?php echo $catat['keterangan'];?>
                                <br>
                                 
   <style type="text/css">
  .hurufe {
    font-size: 14px;
    font-family: monospace;
    text-align: left;
    width: 5.8px;
  }
  .huruf2 {
    font-size: 8px;
    font-weight: bold;
    font-family: monospace;
  }
</style>                                                         
</body>
</html>