<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-bold fs-4 text-secondary">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <!-- Stats Overview Cards -->
            <div class="row mb-4">
                <!-- Total Users Card -->
                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="card border-start border-primary border-4 shadow-sm h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary bg-opacity-10 p-3 rounded-circle me-3">
                                    <i class="bi bi-people-fill text-primary fs-4"></i>
                                </div>
                                <div>
                                    <p class="text-muted small mb-0">Total Users</p>
                                    <h4 class="fw-bold mb-0">{{ \App\Models\User::count() }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Active Users Card -->
                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="card border-start border-success border-4 shadow-sm h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="bg-success bg-opacity-10 p-3 rounded-circle me-3">
                                    <i class="bi bi-check-circle-fill text-success fs-4"></i>
                                </div>
                                <div>
                                    <p class="text-muted small mb-0">Active Users</p>
                                    <h4 class="fw-bold mb-0">{{ \App\Models\User::where('email_verified_at', '!=', null)->count() }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- New Users This Month Card -->
                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="card border-start border-purple border-4 shadow-sm h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary bg-opacity-10 p-3 rounded-circle me-3">
                                    <i class="bi bi-plus-circle-fill text-primary fs-4"></i>
                                </div>
                                <div>
                                    <p class="text-muted small mb-0">New Users (Month)</p>
                                    <h4 class="fw-bold mb-0">{{ \App\Models\User::whereMonth('created_at', now()->month)->count() }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Last Login Card -->
                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="card border-start border-warning border-4 shadow-sm h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="bg-warning bg-opacity-10 p-3 rounded-circle me-3">
                                    <i class="bi bi-clock-fill text-warning fs-4"></i>
                                </div>
                                <div>
                                    <p class="text-muted small mb-0">Last Login</p>
                                    <h4 class="fw-bold mb-0">{{ now()->subHours(rand(1, 24))->diffForHumans() }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="row mb-4">
                <!-- User Growth Chart -->
                <div class="col-lg-6 mb-3">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title fw-bold mb-3">User Growth</h5>
                            <div class="bg-light rounded p-2" style="height: 300px;">
                                <div id="userGrowthChart" class="w-100 h-100"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- User Activity Chart -->
                <div class="col-lg-6 mb-3">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title fw-bold mb-3">User Activity</h5>
                            <div class="bg-light rounded p-2" style="height: 300px;">
                                <div id="userActivityChart" class="w-100 h-100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Users Table -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title fw-bold mb-3">Recent Users</h5>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Joined</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(\App\Models\User::latest()->take(5)->get() as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="bg-secondary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px;">
                                                <span class="fw-bold text-secondary">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                                            </div>
                                            <span>{{ $user->name }}</span>
                                        </div>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                    <td>
                                        @if($user->email_verified_at)
                                            <span class="badge bg-success">Verified</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- System Information Cards -->
            <div class="row">
                <!-- PHP Version -->
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="bg-info bg-opacity-10 p-3 rounded-circle me-3">
                                    <i class="bi bi-cpu-fill text-info fs-4"></i>
                                </div>
                                <div>
                                    <p class="text-muted small mb-0">PHP Version</p>
                                    <h5 class="fw-bold mb-0">{{ phpversion() }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Laravel Version -->
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="bg-danger bg-opacity-10 p-3 rounded-circle me-3">
                                    <i class="bi bi-stars text-danger fs-4"></i>
                                </div>
                                <div>
                                    <p class="text-muted small mb-0">Laravel Version</p>
                                    <h5 class="fw-bold mb-0">{{ app()->version() }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Environment -->
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="bg-success bg-opacity-10 p-3 rounded-circle me-3">
                                    <i class="bi bi-gear-fill text-success fs-4"></i>
                                </div>
                                <div>
                                    <p class="text-muted small mb-0">Environment</p>
                                    <h5 class="fw-bold mb-0">{{ app()->environment() }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // User Growth Chart
            var userGrowthOptions = {
                series: [{
                    name: 'Users',
                    data: [30, 40, 35, 50, 49, 60, 70, 91, 125]
                }],
                chart: {
                    height: 300,
                    type: 'line',
                    zoom: {
                        enabled: false
                    },
                    toolbar: {
                        show: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 3,
                    colors: ['#0d6efd']
                },
                grid: {
                    row: {
                        colors: ['#f8f9fa', 'transparent'],
                        opacity: 0.5
                    }
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
                    labels: {
                        style: {
                            colors: '#6c757d',
                            fontSize: '12px',
                            fontFamily: 'Helvetica, Arial, sans-serif',
                            fontWeight: 400,
                        }
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: '#6c757d',
                            fontSize: '12px',
                            fontFamily: 'Helvetica, Arial, sans-serif',
                            fontWeight: 400,
                        }
                    }
                },
                tooltip: {
                    theme: 'light',
                    y: {
                        formatter: function (val) {
                            return val + ' users';
                        }
                    }
                }
            };

            var userGrowthChart = new ApexCharts(document.querySelector("#userGrowthChart"), userGrowthOptions);
            userGrowthChart.render();

            // User Activity Chart
            var userActivityOptions = {
                series: [{
                    name: 'Logins',
                    data: [44, 55, 57, 56, 61, 58, 63]
                }, {
                    name: 'Actions',
                    data: [76, 85, 101, 98, 87, 105, 91]
                }],
                chart: {
                    type: 'bar',
                    height: 300,
                    toolbar: {
                        show: false
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    labels: {
                        style: {
                            colors: '#6c757d',
                            fontSize: '12px',
                            fontFamily: 'Helvetica, Arial, sans-serif',
                            fontWeight: 400,
                        }
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: '#6c757d',
                            fontSize: '12px',
                            fontFamily: 'Helvetica, Arial, sans-serif',
                            fontWeight: 400,
                        }
                    }
                },
                fill: {
                    opacity: 1,
                    colors: ['#0d6efd', '#20c997']
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return val + ' events';
                        }
                    }
                },
                colors: ['#0d6efd', '#20c997']
            };

            var userActivityChart = new ApexCharts(document.querySelector("#userActivityChart"), userActivityOptions);
            userActivityChart.render();
        });
    </script>
    @endpush
</x-app-layout>
