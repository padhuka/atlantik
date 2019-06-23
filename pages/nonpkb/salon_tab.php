
  <!-- Left side column. contains the logo and sidebar -->
  <?php $idnonpkb=$_GET['idnonpkbne'];?>
  <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">                        
                        <h4 class="modal-title" id="myModalLabel" style="text-align: center;padding-right: 0px">Data Non PKB - Salon <button type="button" class="close" aria-label="Close" onclick="$('#ModalAddsalonx').modal('hide');"><span>&times;</span></button></h4>  
                    </div>
                    <!--<div class="box-header with-border">
                      <h3 class="box-title">Horizontal Form</h3>
                    </div>
                     /.box-header -->
                    <!-- form start -->
                    <div class="modal-body">
                      <!-- Content Wrapper. Contains page content -->
                      <div id="tablesalon"></div>
                    </div>
                </div>
</div>
      
        <div id="ModalAddsalon" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
         <div id="ModalEditsalon" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
         <div id="ModalDeletesalon" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>

        <script type="text/javascript">
            $(document).ready(function (){
                 $("#tablesalon").load('nonpkb/salon_load.php?idnonpkb=<?php echo $idnonpkb;?>');
            });
        </script>


<style type="text/css">
  .title-header {
    font-size: 20px;
    text-align: center;
    font-weight: bold;
    font-family: monospace;
  }
</style>