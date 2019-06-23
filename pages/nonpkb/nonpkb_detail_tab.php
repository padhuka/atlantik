		      <?php
            include_once '../../lib/config.php';
            include_once '../../lib/fungsi.php';
      ?>

        <table id="nonpkbxx2" class="table table-condensed table-bordered table-striped table-hover">
                <thead class="thead-light">
                <tr>
                          <th>Item</th>
                          <th>Gros</th>
                          <th>Disc</th>
                          <th>Netto</th>                          
                </tr>
                </thead>
                <tbody>  
                <?php 
                  $idnonpkb= $_GET['idnonpkb'];
                  $sqlest= "SELECT * FROM t_nonpkb WHERE id_nonpkb = '$idnonpkb'";
                  $hest= mysql_fetch_array(mysql_query($sqlest));
                ?>              
                        <tr>
                          <td>cuci</td>
                          <td><?php echo rupiah2($hest['total_gross_harga_cuci']);?></td>
                          <td><?php echo rupiah2($hest['total_diskon_rupiah_cuci']);?></td>
                          <td><?php echo rupiah2($hest['total_netto_harga_cuci']);?></td>
                        </tr>
                        <tr>
                          <td>salon</td>
                          <td><?php echo rupiah2($hest['total_gross_harga_salon']);?></td>
                          <td><?php echo rupiah2($hest['total_diskon_rupiah_salon']);?></td>
                          <td><?php echo rupiah2($hest['total_netto_harga_salon']);?></td>
                        </tr>                    	
                </tfoot>
              </table>
              <script>
            $('#nonpkbxx').DataTable();
        </script>