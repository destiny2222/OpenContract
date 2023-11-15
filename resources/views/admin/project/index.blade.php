@extends('layouts.master')
@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Project</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item btn btn-primary">
                    <a href="{{  route('admin.project.create') }}" class="text-white">
                        Add New Project
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
                    <h3 class="card-title">Project</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered border text-nowrap mb-0" id="basic-edit">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Company Nmae</th>
                                    <th>Contrutor Name</th>
                                    <th>Contrutor State</th>
                                    <th>Category</th>
                                    <th>Year</th>
                                    <th>Procuring Entity</th>
                                    <th>Location</th>
                                    <th>Body</th>
                                    <th>Award</th>
                                    <th>Award Date</th>
                                    <th>Contract Amount</th>
                                    <th>Tender Amount</th>
                                    <th>Budget Amount</th>
                                    <th>Status</th>
                                    <th>Active</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($project as $projects)
                                <tr>
                                    <td>{{  $loop->index + 1 }}</td>
                                    <td>{{  $projects->title }}</td>
                                    <td>{{  $projects->company_name }}</td>
                                    <td>{{  $projects->contructor_name }}</td>
                                    <td>{{  $projects->contructor_origin }}</td>
                                    <td>{{  $projects->category }}</td>
                                    <td>{{  $projects->year }}</td>
                                    <td>{{  $projects->procuring_entity }}</td>
                                    <td>{{  $projects->location }}</td>
                                    <td>{{  $projects->body }}</td>
                                    <td>{{  $projects->award }}</td>
                                    <td>{{  $projects->award_date }}</td>
                                    <td>{{  $projects->contract_amount }}</td>
                                    <td>{{  $projects->tender_amount }}</td>
                                    <td>{{  $projects->budget_amount }}</td>
                                    <td>{{  $projects->status }}</td>
                                    <td>{{  $projects->active }}</td>
                                    <td name="bstable-actions">
                                        <div class="btn-list d-flex">
                                            <button  type="button" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#modaldemo8{{ $projects->id }}" class="modal-effect  btn btn-sm btn-primary">
                                                <span class="fe fe-edit"> </span>
                                            </button>
                                            <form  action="{{ route('admin.project.destroy',$projects->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button  type="submit"  class="btn  btn-sm btn-danger" onclick="return confirm('Are you sure?');">
                                                    <span class="fe fe-trash-2"> </span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                {{-- @include('admin.projector.edit') --}}
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