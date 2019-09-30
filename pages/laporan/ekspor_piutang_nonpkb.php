<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=piutangnonpkb.xls");
 
// Tambahkan table
//include 'data.php';

?>
								      <?php
            include_once '../../lib/config.php';
            include_once '../../lib/fungsi.php';
      $tgle = date('d/m/Y');
            $jame = date('H:i:s');
      ?>
      <table width="100%" align="center" border="0">
                                  <tr>
                                    <td width="50%"><u style="font-size: 20px;"><strong>Atlantic Repair & Car Wash</strong><br>
                                    </u>
                                    (0271) 7880845 <br>
                                    
                                    </td>
                                    <td align="right">
                                      Tanggal : <?php echo $tgle;?><br>
                                      Jam : <?php echo $jame;?>
                                    </td>                                   
                                  </tr>                                   
                                </table>
                                    <span style="font-size: 20px;font-weight: bold;"><center>Laporan Piutang Non PKB</center></span>
                                     <span style="font-size: 20px;font-weight: bold;"><center> Per Tgl <?php echo date('d-m-Y' , strtotime($_GET['tgl1']));echo ' s/d '; echo date('d-m-Y' , strtotime($_GET['tgl2'])); ?></center></span>
                                <br>
      <table id="tablepkb1" class="table table-condensed table-bordered table-striped table-hover">
                <thead class="thead-light">
                <tr>
                          <th>No</th>
                          <th>No Non PKB</th>
                          <th>Tgl Non PKB</th>
                          <th>Tipe Kendaraan</th>
                          <th>No Chasis</th>
                          <th>No Mesin</th>
                          <th>No Polisi</th>
                          <th>Total</th>

                </tr>
                </thead>
                <tbody>
                <?php
                                   //WHERE p.tgl_batal='0000-00-00 00:00:00' AND p.status_pkb='' AND substring(tgl,1,10)>='$tgl1' AND  substring(tgl,1,10)<='$tgl2' 
                                   
                                 
                                    $j=1;
                                    $sqlcatat = "SELECT * FROM t_nonpkb p
                                    LEFT JOIN t_paycuci c ON p.id_nonpkb=c.no_ref
                                    WHERE c.no_ref is NULL";
                                   	$rescatat = mysql_query( $sqlcatat );
                                    while($catat = mysql_fetch_array( $rescatat )){
                                ?>
                        <tr>
                          <th><?php echo $j++;?></th>
                          <td><?php echo ($catat['id_nonpkb']);?></td>                       
                          <td><?php echo date('d-m-Y',strtotime($catat['tgl']));?></td>
                          <td><?php echo $catat['namamobil'];?></td>
                          <td><?php echo $catat['fk_no_chasis'];?></td>
                          <td><?php echo $catat['fk_no_mesin'];?></td>                          
                          <td><?php echo $catat['fk_no_polisi'];?></td>
                          <td><?php echo rupiah2($catat['total_netto_harga_jasa']);?></td>
                        </tr>
                    <?php }?>
                </tfoot>
              </table>