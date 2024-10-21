@extends('layouts.main')
@section('header-section')
@include('layouts.subheader')
@endsection
@section('title', 'Visualization ')
@section('content')
<!-- BREADCRUMB AREA START -->
@include('partials.breadcrumb')
<!-- BREADCRUMB AREA END -->

<!-- ABOUT US AREA START -->
<div class="ltn__about-us-area pb-115">
    <div class="container">
        <div class="row align-self-center">
            <div class="col-lg-4 col-sm-6">
                <div class="ltn__feature-item ltn__feature-item-6 box-shadow-1 text-center">
                    <div class="ltn__feature-icon">
                        <span>{{ $projectCount }}</span>
                    </div>
                    <div class="ltn__feature-info">
                        <h3>Projects</h3>
                        <p>Total Projects</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="ltn__feature-item ltn__feature-item-6 box-shadow-1 text-center">
                    <div class="ltn__feature-icon">
                        <span>{{ $awardCount }}</span>
                    </div>
                    <div class="ltn__feature-info">
                        <h3>Awards</h3>
                        <p>Total Awards</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="ltn__feature-item ltn__feature-item-6 box-shadow-1 text-center">
                    <div class="ltn__feature-icon">
                        <span><i class="icon-repair"></i></span>
                    </div>
                    <div class="ltn__feature-info">
                        <h3>Contracts</h3>
                        <p>Total Contracts</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="ltn__feature-item ltn__feature-item-6 box-shadow-1 text-center">
                    <div class="ltn__feature-icon">
                        <span>NGN {{ App\Models\Project::formatAmount($totalTendersAmount) }}</span>
                    </div>
                    <div class="ltn__feature-info">
                        <h3>Tenders</h3>
                        <p>Total Tenders Amount</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="ltn__feature-item ltn__feature-item-6 box-shadow-1 text-center">
                    <div class="ltn__feature-icon">
                        <span><i class="flaticon-building"></i></span>
                    </div>
                    <div class="ltn__feature-info">
                        <h3>Awards</h3>
                        <p>Total Awards Amount</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="ltn__feature-item ltn__feature-item-6 box-shadow-1 text-center">
                    <div class="ltn__feature-icon">
                        <span>NGN {{ App\Models\Project::formatAmount($totalContractsAmount) }}</span>
                    </div>
                    <div class="ltn__feature-info">
                        <h3>Contracts</h3>
                        <p>Total Awards Contracts</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ABOUT US AREA END -->

<section class="bg-color py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-4">
                <h2>All Projects By Year</h2>
                <div class="chart">
                    <canvas id="projectsByYearChart" width="300" height="300"></canvas>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-4">
                <h2>All-time budget by Year</h2>
                <div class="chart">
                    <canvas id="budgetByMonthChart" width="300" height="300"></canvas>
                </div>
            </div>
            {{-- <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-4">
                <h2>All-time Awards</h2>
                <div class="chart">
                    <canvas id="chartbar"></canvas>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-4">
                <h2>All-time Projects by Categories</h2>
                <div class="chart">
                    <canvas id="projectsByCategoryChart"></canvas>
                </div>
            </div> --}}
        </div>
    </div>
</section>




@endsection

@push('scripts')

<!-- Add necessary scripts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    var chartData =  @json($chartData);
    // Data for Projects By Year Chart
    chartData.labels = chartData.labels.map(function(dateString) {
        return new Date(dateString).getFullYear();  // Extracts the year from the date string
    });
    var projectsByYearCtx = document.getElementById('projectsByYearChart').getContext('2d');
    
    var projectsByYearChart = new Chart(projectsByYearCtx, {
        type: 'bar', // You can choose 'bar', 'line', 'pie', etc.
        data: {
            labels: chartData.labels, // Year labels
            datasets: [{
                label: 'Projects',
                data: chartData.data, // Project counts per year
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Data for Budget By Month Chart
    const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var budgetByMonth = @json($budgetByMonth);

    // Convert the date string to month names
    budgetByMonth.labels = budgetByMonth.labels.map(function(dateString) {
        let monthIndex = new Date(dateString).getMonth();  // Extracts the month (0-11)
        return monthNames[monthIndex];  // Convert to month name
    });

    var budgetByMonthCtx = document.getElementById('budgetByMonthChart').getContext('2d');
    var budgetByMonthChart = new Chart(budgetByMonthCtx, {
        type: 'line',
        data: {
            labels: budgetByMonth.labels, // Month labels
            datasets: [{
                label: 'Budget',
                data: budgetByMonth.data, // Budget values per month
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Data for Projects By Category Chart
    var CategoryChart = @json($CategoryChart); 
    var projectsByCategoryCtx = document.getElementById('projectsByCategoryChart').getContext('2d');
    var projectsByCategoryChart = new Chart(projectsByCategoryCtx, {
        type: 'pie',
        data: {
            labels: CategoryChart.labels, // Category labels
            datasets: [{
                label: 'Projects',
                data: CategoryChart.data, // Project counts per category
                backgroundColor: [
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(153, 102, 255, 0.6)'
                ]
            }]
        },
        options: {
            responsive: true
        }
    });
</script>
@endpush