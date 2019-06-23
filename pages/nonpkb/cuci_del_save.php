<?php
		//$skrg = date('Y-m-d');
        include_once '../../lib/config.php';
        $idnonpkb = $_GET['idnonpkb'];
        $id = $_GET['id'];

        $sqlhapusasuransi = "DELETE FROM t_nonpkb_cuci_detail WHERE id='$id'";
        mysql_query( $sqlhapusasuransi );

       $sqlcuci= "SELECT sum(harga_jual_cuci*qty_cuci) AS totjualcuci,sum(harga_diskon_cuci*qty_cuci) AS totdiskoncuci, sum(harga_total_nonpkb_cuci) AS totnonpkbcuci FROM t_nonpkb_cuci_detail WHERE fk_nonpkb = '$idnonpkb'";
            $hcuci= mysql_fetch_array(mysql_query($sqlcuci));
            //jml cuci

            $totgroscuci=$hcuci['totjualcuci'];
            $totdiskoncuci=$hcuci['totdiskoncuci'];
            $totnettocuci=$hcuci['totnonpkbcuci'];

            $updatecuci = "UPDATE t_nonpkb set total_gross_harga_cuci='$totgroscuci', total_diskon_rupiah_cuci='$totdiskoncuci', total_netto_harga_cuci='$totnettocuci' WHERE id_nonpkb='$idnonpkb'";
            mysql_query($updatecuci);



            $sqles= "SELECT sum(total_gross_harga_panel+total_gross_harga_cuci) as total_gross_harga_jasa,sum(total_diskon_rupiah_panel+total_diskon_rupiah_cuci) as total_diskon_rupiah_jasa,sum(total_netto_harga_panel+total_netto_harga_cuci) as total_netto_harga_jasa FROM t_nonpkb WHERE id_nonpkb = '$idnonpkb'";
           
            $hpes= mysql_fetch_array(mysql_query($sqles));

         

            $totgrosjasa=$hpes['total_gross_harga_jasa'];
            $totdiskonjasa=$hpes['total_diskon_rupiah_jasa'];
            $totnettojasa=$hpes['total_netto_harga_jasa'];



           $updatenonpkb = "UPDATE t_nonpkb SET total_gross_harga_jasa='$totgrosjasa', total_diskon_rupiah_jasa='$totdiskonjasa',total_netto_harga_jasa='$totnettojasa' WHERE id_nonpkb='$idnonpkb'";
              mysql_query($updatenonpkb);
		//HAPUS DATA 
		
?>
