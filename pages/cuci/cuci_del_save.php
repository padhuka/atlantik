<?php
		//$skrg = date('Y-m-d');
        include_once '../../lib/config.php';
		$id_cuci = $_GET['id_cuci'];
		# HAPUS DATA 
		$sqlhapusasuransi = "DELETE FROM t_cuci WHERE id_cuci='$id_cuci'";
   		mysql_query( $sqlhapusasuransi );
?>
