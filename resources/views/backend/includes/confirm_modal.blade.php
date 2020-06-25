<div id="DeleteModal" class="modal fade text-danger" role="dialog" style="display: none">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <form action="" id="deleteForm" method="post">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-center">Confirmar Exclusão</h5>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('DELETE')
                    <p class="text-center">Tem certeza que quer apagar esse item ?</p>
                </div>
                <div class="modal-footer">
                    <div>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Confirmar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

