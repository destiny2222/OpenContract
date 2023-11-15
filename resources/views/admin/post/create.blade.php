    <!-- Modal -->
    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Add Publication</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.publication.store') }}" method="POST" enctype="multipart/form-data">
                       <div class="container">
                            <div class="row">
                                @csrf
                                <div class="mb-3 col-12 col-lg-12">
                                    <label class="form-label" for="basic-default-fullname">{{ __('Title ') }}</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror" id="basic-default-fullname"
                                        placeholder="Title" />
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
        
                                </div>
                                <div class="mb-3 col-12 col-lg-12">
                                    <label class="form-label" for="basic-default-company">{{ __('author') }}</label>
                                    <input type="text" name="author"
                                        class="form-control  @error('author') is-invalid @enderror" id="basic-default-company"
                                        placeholder="ACME Inc." />
                                    @error('author')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
        
                                <div class="mb-3 col-12 col-lg-12">
                                    <div class="input-group">
                                        <input type="file" name="image"
                                            class="form-control  @error('image') is-invalid @enderror" id="inputGroupFile01" />
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
        
                                    </div>
                                </div>
                                <div class="mb-3 col-12 col-lg-12">
                                    <label class="form-label" for="basic-default-message">{{ __(' Message ') }}</label>
                                    <textarea  id="body" name="body" class="form-control"
                                        placeholder="Hi, Do you have a moment to talk Joe?"></textarea>
                                </div>
                                <div class="col-12 col-lg-12">
                                    <button type="submit" class="btn btn-primary btn-lg">{{ __(' Save ') }}</button>
                                </div>
                            </div>
                       </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    
        <!--<script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>-->
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>