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
                    <div id="barchart" width="300" height="300"></div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-4">
                <h2>All-time budget by Year</h2>
                <div class="chart">
                    <div id="chart3" width="300" height="300"></div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-4">
                <h2>All-time Awards</h2>
                <div class="chart">
                    <div id="chartbar"></div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-4">
                <h2>All-time Projects by Categories</h2>
                <div class="chart">
                    <div id="chartbar3"></div>
                </div>
            </div>
        </div>
    </div>
</section>




@endsection

@push('scripts')

<script>
    var options = {
          series: [{
          name: 'Sales',
          data: [{{ $visuals }}]
        }],
          chart: {
          height: 350,
          type: 'line',
        },
        forecastDataPoints: {
          count: 7
        },
        stroke: {
          width: 5,
          curve: 'smooth'
        },
        xaxis: {
          type: 'datetime',
          categories: ['1/11/2000', '2/11/2000', '3/11/2000', '4/11/2000', '5/11/2000', '6/11/2000', '7/11/2000', '8/11/2000', '9/11/2000', '10/11/2000', '11/11/2000', '12/11/2000', '1/11/2001', '2/11/2001', '3/11/2001','4/11/2001' ,'5/11/2001' ,'6/11/2001'],
          tickAmount: 10,
          labels: {
            formatter: function(value, timestamp, opts) {
              return opts.dateFormatter(new Date(timestamp), 'dd MMM')
            }
          }
        },
        title: {
          text: 'Forecast',
          align: 'left',
          style: {
            fontSize: "16px",
            color: '#666'
          }
        },
        fill: {
          type: 'gradient',
          gradient: {
            shade: 'dark',
            gradientToColors: [ '#FDD835'],
            shadeIntensity: 1,
            type: 'horizontal',
            opacityFrom: 1,
            opacityTo: 1,
            stops: [0, 100, 100, 100]
          },
        },
        yaxis: {
          min: -10,
          max: 40
        }
        };

        var chart = new ApexCharts(document.querySelector("#barchart"), options);
        chart.render();
</script>

<script>
    var options = {
  chart: {
    type: 'bar'
  },
  series: [{
    name: 'sales',
    data: [30,40,45,50,49,60,70,91,125]
  }],
  xaxis: {
    categories: [1991,1992,1993,1994,1995,1996,1997, 1998,1999]
  }
}

var chart = new ApexCharts(document.querySelector("#chartbar"), options);

chart.render();
</script>

<script>
     var options = {
          series: [44, 55, 13, 43, 22],
          chart: {
          width: 380,
          type: 'pie',
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#chartbar3"), options);
        chart.render();
</script>

<script>
    var options = {
          series: [{
          name: 'Inflation',
          data: [2.3, 3.1, 4.0, 10.1, 4.0, 3.6, 3.2, 2.3, 1.4, 0.8, 0.5, 0.2]
        }],
          chart: {
          height: 350,
          type: 'bar',
        },
        plotOptions: {
          bar: {
            borderRadius: 10,
            dataLabels: {
              position: 'top', // top, center, bottom
            },
          }
        },
        dataLabels: {
          enabled: true,
          formatter: function (val) {
            return val + "%";
          },
          offsetY: -20,
          style: {
            fontSize: '12px',
            colors: ["#304758"]
          }
        },
        
        xaxis: {
          categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          position: 'top',
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false
          },
          crosshairs: {
            fill: {
              type: 'gradient',
              gradient: {
                colorFrom: '#D8E3F0',
                colorTo: '#BED1E6',
                stops: [0, 100],
                opacityFrom: 0.4,
                opacityTo: 0.5,
              }
            }
          },
          tooltip: {
            enabled: true,
          }
        },
        yaxis: {
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false,
          },
          labels: {
            show: false,
            formatter: function (val) {
              return val + "%";
            }
          }
        
        },
        title: {
          text: 'Monthly Inflation in Argentina, 2002',
          floating: true,
          offsetY: 330,
          align: 'center',
          style: {
            color: '#444'
          }
        }
        };

        
        var chart = new ApexCharts(document.querySelector("#chart3"), options);
        chart.render();
</script>
@endpush