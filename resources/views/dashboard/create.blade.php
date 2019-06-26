<div class="modal fade" id="addModal">
     <div class="modal-dialog">
         <div class="modal-content">
             <form id="addform">
                 <div class="modal-header">
                     <h4 class="modal-title">
                         Tambah
                     </h4>
                     <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                         ×
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="alert alert-danger" id="add-error-bag">
                         <ul id="add-errors"/>
                     </div>
                     <div class="form-group">
                         <label for="nama">Nama:</label>
                         <input type="text" class="form-control" name="nama" id="nama"/>
                     </div>
                     <div class="form-group">
                         <label for="alamat">Alamat:</label>
                         <textarea type="text" class="form-control" name="alamat" id="alamat"/>
                     </div>
                     <div class="form-group">
                         <label for="fakultas">Fakultas:</label>
                         <select type="text" class="form-control" name="fakultas" id="fakultas">
                             <option value="FMIPA" selected>FMIPA</option>
                             <option value="FKH">FKH</option>
                         </select>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <input class="btn btn-default" data-dismiss="modal" type="button" value="Cancel">
                     <button class="btn btn-info" id="btn-add" type="button" value="add">
                         Tambah
                     </button>
                     </input>
                 </div>
             </form>
         </div>
     </div>
 </div>
