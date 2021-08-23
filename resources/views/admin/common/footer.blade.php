<div class="content-footer white " id="content-footer">
  <div class="d-flex p-3">
     <span class="text-sm text-muted flex"> Copyright &copy; Job Site - {{date('Y')}}. </span>
     <div class="text-sm text-muted">Version 1.1.1</div>
  </div>
</div>


<!-- CONFIRMATION MODAL -->
<div id="confirmation-modal"  class="modal fade" data-backdrop="true" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md animate fade-right" id="animate" data-class="fade-right">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Confirmation</h6>
                <button type="button" class="btn dark-white p-x-md float-right" data-dismiss="modal" id="btn-update-close"><i class="fa fa-close"> </i></button>
            </div>
            <div class="modal-body p-lg">
                Are you sure, you want to remove this record?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger float-right confirm-btn">Yes</button>
                <button type="button" class="btn btn-default float-right" data-dismiss="modal">No</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
