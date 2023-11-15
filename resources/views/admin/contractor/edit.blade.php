    <!-- MODAL EFFECTS -->
    <div class="modal fade" id="modaldemo8{{ $contracts->id }}">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Edit</h6>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{  route('admin.contract-update-page',$contracts->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="container">
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <label class=" form-label">Contractor Name :</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $contracts->name }}" placeholder="Contractor Name">
                                </div>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <label class=" form-label">Contractor Position :</label>
                                    <input type="text" class="form-control @error('position') is-invalid @enderror" value="{{ $contracts->position }}" name="position" placeholder="Contractor Position">
                                </div>
                                @error('position')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class=" form-label mb-4">Product Upload :</label>
                                    <input  type="file" name="image" value="{{ $contracts->image }}" class="@error('image') is-invalid @enderror form-control">
                                </div>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary form-control">Save changes</button> 
                    </div>
                </form>    
            </div>
        </div>
    </div>