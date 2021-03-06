<div class="modal fade" id="editModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editform">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Edit
                    </h4>
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                        ×
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" id="edit-error-bag">
                        <ul id="edit-errors">
                        </ul>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" name="nama" id="enama"/>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <input type="text" class="form-control" name="alamat" id="ealamat">
                    </div>
                    <div class="form-group">
                        <label for="fakultas">Fakultas:</label>
                        <select type="text" class="form-control" name="fakultas" id="cfakultas" disabled>
                            <option value="42">FMIPA</option>
                            <option value="41">FKH</option>
                        </select>
                    </div>
                    <input type="hidden" name="token" value="{{ Session::token() }}">
                </div>
                <div class="modal-footer">
                    <input id="id" name="id" type="hidden" value="0">
                    <input class="btn btn-default" data-dismiss="modal" type="button" value="Cancel">
                    <button class="btn btn-info" id="btn-edit" type="button" value="add">
                        Update
                    </button>
                    </input>
                    </input>
                </div>
            </form>
        </div>
    </div>
</div>
