<div class="modal" id="image-modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Image Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.updateImage',auth()->user()->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Uplaod Image</label>
                        <input type="file" class="form-control-file" name="image" id="image"
                            placeholder="select image" aria-describedby="fileHelpId">
                        <small id="fileHelpId" class="form-text text-muted">the allowed extentions is
                            (jpg,png,jpeg,gif)</small>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
