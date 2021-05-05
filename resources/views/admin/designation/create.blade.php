<div class="modal fade" id="designation_add_modal" tabindex="-1" role="dialog" aria-labelledby="designation_add_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="workerLabel">Add Designation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" action="{{ route('admin.designation.store') }}" method="POST" enctype="multipart/form-data" id="add_designation_form">
                @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Designation name.." />
                        <span class="error-msg-input text-danger"></span>
                    </div>

            
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="designation_edit_modal" tabindex="-1" role="dialog" aria-labelledby="designation_edit_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="workerLabel">Edit State</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" action="{{ route('admin.designation.update') }}" method="POST" enctype="multipart/form-data" id="edit_designation_form">
                @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" id="deg_name" name="name" class="form-control" placeholder="Enter Designation name.." />
                        <span class="error-msg-input text-danger"></span>
                    </div>

                     <input type="hidden" id="designation_id" name="id" value="">
            
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                Update
                            </button>
                            <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>