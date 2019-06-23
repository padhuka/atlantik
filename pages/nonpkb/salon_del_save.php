<?php
		//$skrg = date('Y-m-d');
        include_once '../../lib/config.php';
        $idnonpkb = $_GET['idnonpkb'];
        $id = $_GET['id'];


        $sqlhapusasuransi = "DELETE FROM t_nonpkb_salon_detail WHERE id='$id'";
        mysql_query( $sqlhapusasuransi );
        //UPDATE t_nonpkb
         // echo "$idnonpkb";

          $sqlsalon= "SELECT sum(harga_jual_salon) AS totjualsalon,sum(harga_diskon_salon) AS totdiskonsalon, sum(harga_total_nonpkb_salon) AS totnonpkbsalon FROM t_nonpkb_salon_detail WHERE fk_nonpkb = '$idnonpkb'";
            $hsalon= mysql_fetch_array(mysql_query($sqlsalon));
            //jml salon

            $totgrossalon=$hsalon['totjualsalon'];
            $totdiskonsalon=$hsalon['totdiskonsalon'];
            $totnettosalon=$hsalon['totnonpkbsalon'];

            $updatesalon = "UPDATE t_nonpkb set total_gross_harga_salon='$totgrossalon', total_diskon_rupiah_salon='$totdiskonsalon', total_netto_harga_salon='$totnettosalon' WHERE id_nonpkb='$idnonpkb'";
            mysql_query($updatesalon);

            $sqles= "SELECT sum(total_gross_harga_salon+total_gross_harga_cuci) as total_gross_harga_jasa,sum(total_diskon_rupiah_salon+total_diskon_rupiah_cuci) as total_diskon_rupiah_jasa,sum(total_netto_harga_salon+total_netto_harga_cuci) as total_netto_harga_jasa FROM t_nonpkb WHERE id_nonpkb = '$idnonpkb'";
           
            $hpes= mysql_fetch_array(mysql_query($sqles));

         

            $totgrosjasa=$hpes['total_gross_harga_jasa'];
            $totdiskonjasa=$hpes['total_diskon_rupiah_jasa'];
            $totnettojasa=$hpes['total_netto_harga_jasa'];



           $updatenonpkb = "UPDATE t_nonpkb SET total_gross_harga_jasa='$totgrosjasa', total_diskon_rupiah_jasa='$totdiskonjasa',total_netto_harga_jasa='$totnettojasa' WHERE id_nonpkb='$idnonpkb'";
              mysql_query($updatenonpkb);

		
		# HAPUS DATA 
		
?>
