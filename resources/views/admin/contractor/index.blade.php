@extends('layouts.master')
@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Contractor</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item btn btn-primary">
                    <a href="{{  route('admin.contract-create-page') }}" class="text-white">
                        Add New Contractor
                    </a>
                </li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Contractor</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered border text-nowrap mb-0" id="basic-edit">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Full name</th>
                                    <th>Position</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contract as $contracts)
                                <tr>
                                    <td>{{  $loop->index + 1 }}</td>
                                    <td>
                                        <img src="{{ asset('upload/contract/'.$contracts->image) }}" width="50" height="50" alt="">
                                    </td>
                                    <td>{{  $contracts->name }}</td>
                                    <td>{{  $contracts->position }}</td>
                                    <td name="bstable-actions">
                                        <div class="btn-list d-flex">
                                            <button  type="button" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#modaldemo8{{ $contracts->id }}" class="modal-effect  btn btn-sm btn-primary">
                                                <span class="fe fe-edit"> </span>
                                            </button>
                                            <form  action="{{ route('admin.contract-delete-page',$contracts->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button  type="submit"  class="btn  btn-sm btn-danger" onclick="return confirm('Are you sure?');">
                                                    <span class="fe fe-trash-2"> </span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @include('admin.contractor.edit')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
@endsection

@push('script')
    <script>
        
    </script>
@endpush