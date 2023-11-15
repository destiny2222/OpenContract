@extends('layouts.main')
@section('header-section')
    @include('layouts.subheader')
@endsection
@section('title', 'Table ')
@section('content')
    <!-- BREADCRUMB AREA START -->
        @include('partials.breadcrumb')
    <!-- BREADCRUMB AREA END -->
   
    <section>
        <div class="container">
            <div class="row">
                <div class="col-xl-12 mb-4">
                    <form id="contractorForm">
                        <select id="contractorSelect" class="select" name="contractor_id">
                            @foreach($contractor as $contractors)
                                <option value="{{ $contractors->id }}">{{ $contractors->name }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </div>
                
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pb-100">
                    <div class="card">
                        <div class="card-header table-card">
                            <h3 class="card-title text-white">Projects Report</h3>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive" id="projectTable">
                                <table id="myTable" class="table  border text-nowrap text-md-nowrap table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Project Title</th>
                                            <th>COMPANY NMAE	</th>
                                            <th> CONTRUTOR NAME	</th>
                                            <th> CONTRUTOR STATE </th>
                                            <th>Budget Year</th>
                                            <th>Date Published</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   
@endsection
@push('scripts')
<script>
function getProjects() {
    $.ajax({
        url: '/get-projects',
        type: 'POST',
        data: $('#contractorForm').serialize(),
        success: function(response) {
            // Clear the table body
            $('#projectTable tbody').empty();

            // Populate the table with project details
            $.each(response, function(index, projects) {
                $('#projectTable tbody').append(`
                    <tr>
                        <td>${index + 1}</td>
                        <td>${projects.title}</td>
                        <td>${projects.company_name}</td>
                        <td>${projects.contructor_name}</td>
                        <td>${projects.contructor_origin}</td>
                        <td>${projects.year}</td>
                        <td>${new Date(projects.created_at).toLocaleString()}</td>
                    </tr>
                `);
            });
        }
    });
}

$(document).ready(function() {
    getProjects();

    $('#contractorSelect').change(function() {
        $('#contractorForm').submit();
    });

    $('#contractorForm').submit(function(e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        getProjects(); 
    });
});


</script>
@endpush