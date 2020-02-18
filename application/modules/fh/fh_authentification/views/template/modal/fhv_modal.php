<!-- Modal -->
<div id="fha_connex" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times; Fermer</button></div>
      <div class="modal-body">
        <div class="panel panel-info">
        <?php if(isset($login)){echo $login;}?>
         <?php if(isset($reset)){echo $reset;}?>
         <?php if(isset($register)){echo $register;}?> 
         </div>
      </div>
    </div>

  </div>
</div>