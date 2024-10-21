<div>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-xl-12 mb-4">
                    <!-- Contractor Selection -->
                    <form>
                        <select wire:model="contractor_id" class="select" name="contractor_id">
                            <option value="">Select Contractor</option>
                            @foreach($contractors as $contractor)
                                <option value="{{ $contractor->id }}">{{ $contractor->name }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </div>
        </div>

        <!-- Projects Table -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pb-100">
                    <div class="card">
                        <div class="card-header table-card">
                            <h3 class="card-title text-white">Projects Report</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" id="projectTable">
                                <table id="myTable" class="table border text-nowrap text-md-nowrap table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Project Title</th>
                                            <th>Company Name</th>
                                            <th>Contractor Name</th>
                                            <th>Contractor State</th>
                                            <th>Budget Year</th>
                                            <th>Date Published</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($projects as $index => $project)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $project->title }}</td>
                                                <td>{{ $project->company_name }}</td>
                                                <td>{{ $project->contractor->name }}</td>
                                                <td>{{ $project->contractor->state }}</td>
                                                <td>{{ $project->year }}</td>
                                                <td>{{ \Carbon\Carbon::parse($project->created_at)->toDayDateTimeString() }}</td>
                                            </tr>
                                        @endforeach
                                        @if ($projects->isEmpty())
                                            <tr>
                                                <td colspan="7" class="text-center">No projects found for the selected contractor.</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
