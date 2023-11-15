@extends('layouts.master')
@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Contractor</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="javascript:void(0)">
                        Add New Contractor
                    </a>
                </li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END  contract-store-page-->

    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <form action="{{  route('admin.contract-store-page') }}" method="post" enctype="multipart/form-data">
               @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Add New Contractor</div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class=" form-label">Contractor Name :</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Contractor Name">
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
                                <input type="text" class="form-control @error('position') is-invalid @enderror" name="position" placeholder="Contractor Position">
                            </div>
                            @error('position')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- <div class="row mb-4">
                            <div class="col-md-12">
                                <label class=" form-label">Categories :</label>
                                <select name="country" class="form-control form-select select2" data-bs-placeholder="Select Country">
                                    <option value="br">Electronics</option>
                                    <option value="cz">Fashion</option>
                                    <option value="de">Home Decor</option>
                                    <option value="pl">Furniture</option>
                            </select>
                            </div>
                        </div> --}}
    
                        {{-- <!-- Row -->
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label class=" form-label mb-4">Product Description :</label>
                                <textarea class="content" name="example"></textarea>
                            </div>
                        </div>
                        <!--End Row--> --}}
    
                        <!--Row-->
                        <div class="row">
                            <div class="col-md-12">
                                <label class=" form-label mb-4">Product Upload :</label>
                                <input  type="file" name="image" class="@error('image') is-invalid @enderror form-control">
                            </div>
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!--End Row-->
                    </div>
                    <div class="card-footer">
                        <!--Row-->
                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-primary form-control" value="Upload">
                            </div>
                        </div>
                        <!--End Row-->
                    </div>
                </div>
            
            </form>
        </div>
    </div>
    <!-- End Row -->
@endsection