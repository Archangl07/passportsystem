<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card corona-gradient-card">
                    <div class="card-body py-0 px-0 px-sm-3">

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Appoinment Status</h4>
                        {{-- Chart JS Object --}}
                        <div>
                            <canvas id="appointment-doughnut"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row justify-content-between">
                            <h4 class="card-title mb-1">Open Appointments</h4>
                            <p class="text-muted mb-1">Date & Branch</p>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="preview-list">

                                  @foreach($data["inProgressAppointments"] as $appointment)
                                    <div class="preview-item border-bottom">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-primary">
                                                <i class="mdi mdi-file-document"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content d-sm-flex flex-grow">
                                            <div class="flex-grow">
                                                <h6 class="preview-subject">{{$appointment->name}}</h6>
                                                <p class="text-muted mb-0">{{$appointment->email}}</p>
                                            </div>
                                            <div class="me-auto text-sm-right pt-2 pt-sm-0">
                                                <p class="text-muted">{{$appointment->date}}</p>
                                                <p class="text-muted mb-0">{{$appointment->branch}}</p>
                                            </div>
                                        </div>
                                    </div>
                                  @endforeach
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h5>Revenue</h5>
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h2 class="mb-0">$32123</h2>
                                    <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p>
                                </div>
                                <h6 class="text-muted font-weight-normal">11.38% Since last month</h6>
                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi-codepen text-primary ms-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h5>Approved</h5>
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h2 class="mb-0">{{$data['approvedAppointmentsCount']}} Applications</h2>
                                    
                                </div>
                                <h6 class="text-muted font-weight-normal"> Approved Since last month</h6>
                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                              <i class="icon-lg mdi mdi-monitor text-success ms-auto"></i>
                           
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h5>Rejected</h5>
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h2 class="mb-0">{{$data['rejectedAppointmentsCount']}} Applications</h2>
                               
                                </div>
                                <h6 class="text-muted font-weight-normal">Rejected Since last month</h6>
                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                              <i class="icon-lg mdi mdi-wallet-travel text-danger ms-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Appointments by Branch</h4>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                          @foreach($data["appointmentsCountByBranch"] as $branch)
                                          <tr>
                                               
                                            <td>{{$branch->branch}}</td>
                                            <td class="text-right bg-red-200  "> {{$branch->count}} </td>
                                           
                                        </tr>
                                          @endforeach
                                         
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©azharazeez
                2023</span>
            
        </div>
    </footer>
    <!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>


<script>
    var myData = @json($data);
    console.log(myData);
    const ctx = document.getElementById('appointment-doughnut');

    let chartData = [0, 0, 0];
    let temparr = myData['appointmentsCountByStatus'];

    for (let i = 0; i < temparr.length; i++) {

        chartData[i] = temparr[i].count

    }
    console.log(chartData)
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [
                'Approved',
                'Rejected',
                'In Progress'
            ],
            datasets: [{
                label: 'Appointments',
                data: chartData,
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
