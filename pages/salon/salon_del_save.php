<?php
		//$skrg = date('Y-m-d');
        include_once '../../lib/config.php';
		$id_salon = $_GET['id_salon'];
		# HAPUS DATA 
		$sqlhapusasuransi = "DELETE FROM t_salon WHERE id_salon='$id_salon'";
   		mysql_query( $sqlhapusasuransi );
?>
