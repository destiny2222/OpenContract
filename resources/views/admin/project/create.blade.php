@extends('layouts.master')
@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Project</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="javascript:void(0)">
                        Add New Project
                    </a>
                </li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END  -->

    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <form action="{{  route('admin.project.store') }}" method="post" enctype="multipart/form-data">
               @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Add New Project</div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class=" form-label">Contractor :</label>
                                <select name="contractor_id" class="form-control form-select select2" data-bs-placeholder="Select">
                                    <option selected>Select</option>
                                    @foreach ($contract as $contracts)
                                       <option value="{{ $contracts->id }}">{{  $contracts->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class=" form-label">Project Title :</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Project Title">
                            </div>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class=" form-label">Company Name :</label>
                                <input type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" >
                            </div>
                            @error('company_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class=" form-label">Contructor Name :</label>
                                <input type="text" class="form-control @error('contructor_name') is-invalid @enderror" name="contructor_name" >
                            </div>
                            @error('contructor_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class=" form-label">Contructor State of Origin :</label>
                                <input type="text" class="form-control @error('contructor_origin') is-invalid @enderror" name="contructor_origin" >
                            </div>
                            @error('contructor_origin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class=" form-label">Categories :</label>
                                <input type="text" class="form-control"  name="category" >
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class=" form-label">Value :</label>
                                <input type="text" class="form-control @error('value') is-invalid @enderror" name="value" >
                            </div>
                            @error('value')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class=" form-label">Award Date :</label>
                                <input type="date" class="form-control @error('award_date') is-invalid @enderror" name="award_date" >
                            </div>
                            @error('award_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class=" form-label">Award:</label>
                                <select name="award" class="form-control form-select select2 @error('award') is-invalid @enderror">
                                    <option selected>Select</option>
                                    <option value="0">Blending</option>
                                    <option value="1">Awarded</option>
                                </select>
                            </div>
                            @error('award')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class=" form-label">Year:</label>
                                <input type="text" class="form-control @error('year') is-invalid @enderror" name="year" >
                            </div>
                            @error('year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class=" form-label">Procuring Entity:</label>
                                <input type="text" class="form-control @error('procuring_entity') is-invalid @enderror" name="procuring_entity" >
                            </div>
                            @error('procuring_entity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class=" form-label">Contract Amount:</label>
                                <input type="number" class="form-control @error('contract_amount') is-invalid @enderror" name="contract_amount" >
                            </div>
                            @error('contract_amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class=" form-label">Tender Amount:</label>
                                <input type="number" class="form-control @error('tender_amount') is-invalid @enderror" name="tender_amount" >
                            </div>
                            @error('tender_amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class=" form-label">Budget Amount:</label>
                                <input type="number" class="form-control @error('budget_amount') is-invalid @enderror" name="budget_amount" >
                            </div>
                            @error('budget_amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class=" form-label">Status :</label>
                                <select name="status" class="form-control form-select select2" data-bs-placeholder="Select">
                                    <option selected>Select</option>
                                    <option value="1">Blending</option>
                                    <option value="2">In Progress</option>
                            </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class=" form-label">Active :</label>
                                <select name="active" class="form-control form-select select2" data-bs-placeholder="Select">
                                    <option selected>Select</option>
                                    <option value="1">Processing</option>
                                    <option value="2">Completed</option>
                                </select>
                            </div>
                        </div>
                        <!-- Row -->
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label class=" form-label mb-4">Location :</label>
                                <textarea class="form-control" name="location"></textarea>
                            </div>
                        </div>
                        <!--End Row-->
                        <!-- Row -->
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label class=" form-label mb-4">Project Description :</label>
                                <textarea class="form-control" name="body"></textarea>
                            </div>
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