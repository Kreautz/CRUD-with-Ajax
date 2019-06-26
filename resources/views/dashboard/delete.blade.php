<div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="delform">
                <div class="modal-header">
                    <h4 class="modal-title" id="delete-title" name="title">
                        Delete
                    </h4>
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                        ×
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Hapus?
                    </p>
                    <p class="text-warning">
                        <small>
                            Permanen
                        </small>
                    </p>
                </div>
                <div class="modal-footer">
                    <input id="id" name="id" type="hidden" value="0">
                        <input class="btn btn-default" data-dismiss="modal" type="button" value="Cancel">
                            <button class="btn btn-danger" id="btn-delete" type="button">
                                Delete
                            </button>
                        </input>
                    </input>
                </div>
            </form>
        </div>
    </div>
</div>
