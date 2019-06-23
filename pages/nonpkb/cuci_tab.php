
  <!-- Left side column. contains the logo and sidebar -->
  <?php $idnonpkb=$_GET['idnonpkbne'];?>
  <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">                        
                        <h4 class="modal-title" id="myModalLabel" style="text-align: center;padding-right: 0px">Data Non PKB - Cuci<button type="button" class="close" aria-label="Close" onclick="$('#ModalAddcucix').modal('hide');"><span>&times;</span></button></h4>  
                    </div>
                    <!--<div class="box-header with-border">
                      <h3 class="box-title">Horizontal Form</h3>
                    </div>
                     /.box-header -->
                    <!-- form start -->
                    <div class="modal-body">
                      <!-- Content Wrapper. Contains page content -->
                      <div id="tablecuci"></div>
                    </div>
                </div>
</div>
      
        <div id="ModalAddcuci" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
         <div id="ModalEditcuci" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
         <div id="ModalDeletecuci" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>

        <script type="text/javascript">
            $(document).ready(function (){
                 $("#tablecuci").load('nonpkb/cuci_load.php?idnonpkb=<?php echo $idnonpkb;?>');
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