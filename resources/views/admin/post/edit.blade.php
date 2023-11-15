
<div class="modal fade" id="modalTop{{ $blogs->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">{{ __('Edit Publication') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.publication.update', $blogs->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-12 mb-3  col-lg-12">
                            <label class="form-label" for="basic-default-fullname">{{ __('Title') }}</label>
                            <input type="text" value="{{ $blogs->title }}" name="title" class="form-control @error('title') is-invalid @enderror" id="basic-default-fullname" placeholder="Title" />
                            @error('title')
                              <span class="invalid-feedback" role="alert">
                                 {{ $message }}
                              </span>
                            @enderror
                        </div>
                        <div class="col-12 mb-3  col-lg-12">
                            <label class="form-label" for="basic-default-company">{{  __('author') }}</label>
                            <input type="text" value="{{ $blogs->author }}"  name="author" class="form-control  @error('author') is-invalid @enderror" id="basic-default-company" placeholder="" />
                            @error('author')
                            <span class="invalid-feedback" role="alert">{{  $message  }}</span>
                            @enderror
                        </div>
                       
                        <div class="col-12 mb-3  col-lg-12">
                            <div class="input-group">
                                <input type="file" value="{{ $blogs->image }}" name="image" class="form-control  @error('image') is-invalid @enderror"" id="inputGroupFile01" />
                                @error('image')
                                    <span class="invalid-feedback" role="alert">{{  $message  }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 mb-3  col-lg-12">
                            <label class="form-label" for="basic-default-message">{{ __(' Message ') }}</label>
                            <textarea  id="editor" name="body" class="form-control">{{ $blogs->body }}</textarea>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-lg-12 mb-0 text-center">
                            <input type="submit" class="btn btn-primary btn-lg" value="Save Change">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
