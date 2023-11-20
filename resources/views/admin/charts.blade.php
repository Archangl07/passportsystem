<!DOCTYPE html>
<html lang="en">

<head>


    @include('admin.css')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
    button.print-btn {
      background-color: #3498db; /* Blue background color */
      color: #fff; /* White text color */
      border: none; /* No border */
      padding: 10px 20px; /* Padding for better appearance */
      text-align: center; /* Center text */
      text-decoration: none; /* No underline */
      display: inline-block; /* Display as inline block for better spacing */
      font-size: 16px; /* Font size */
      font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; /* Font family */
      cursor: pointer; /* Add a pointer cursor on hover */
      border-radius: 4px; /* Rounded corners for a modern look */
    }
  </style>
</head>

<body>
    <div class="container-scroller">

        <!-- side bar -->
        @include('admin.sidebar')

        <!-- navigation bar -->
        @include('admin.navbar')

        <div class="container-fluid page-body-wrapper">

            <div class="content-wrapper">

                <div class="page-section">
                    <div class="container">

                        <!-- messagebox condition -->
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">
                                    x
                                </button>
                                {{ session()->get('success') }}
                            </div>
                        @endif

                        @if (session()->has('error'))
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">
                                    x
                                </button>
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        <!-- messagebox condition end -->

                        <!-- table -->
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
                            <!-- Add this in the <body> section of your HTML file -->
                            
                            <div id="monthlyTrendsChartDiv">
                                <button id="trendChartPrint"  class="bg-gray-700 text-gray-200 m-4 print-btn">Print</button>
                                <h4>Monthly Application Trends</h4>
                                <canvas id="monthlyTrendsChart" width="400" height="200"></canvas>
                            </div>
                            <div style="margin-top: 40px;">
                                <button id="statusDistributionChartPrint" class="bg-gray-700 text-gray-200 m-4 print-btn">Print</button>
                                <h4>Application Status Distribution</h4>
                                <canvas id="statusDistributionChart" width="800" height="200"></canvas>
                            </div>
                            <div style="margin-top: 40px;">
                                <button id="rejChartPrint" class="bg-gray-700 text-gray-200 m-4 print-btn">Print</button>
                                <h4>Reason For Rejection</h4>
                                <canvas id="rejectionReasonsChart" width="800" height="200"></canvas>
                            </div>
                            <div style="margin-top: 40px;">
                                <button id="ageChartPrint" class="bg-gray-700 text-gray-200 m-4 print-btn   ">Print</button>
                                <h4>Applicants Age Distribution</h4>
                                <canvas id="ageDistributionChart" width="800" height="200"
                                    style="margin-top:50px"></canvas>
                            </div>


                        </div> <!-- table -->



                    </div>
                </div>
            </div>

        </div>



        @include('admin.script')
        <!-- container-scroller -->
        <!-- plugins:js -->
    </div>
</body>
<script>
    // Monthly application chart
    var myData = @json($data);
    console.log(myData);
    const monthArray = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    const monthObject = {};
    monthArray.forEach((month, index) => {
    // Adding 1 to index because month numbers are usually 1-based (January is 1, February is 2, etc.)
    monthObject[index + 1] = month;
    });

// Example usage:
    console.log(monthObject);

    var genLabel = myData['monthlyApplicationTrends'].map(el=> {
        return monthObject[el.month]
    });

    var genData =  myData['monthlyApplicationTrends'].map(el=> {
        return el.count
    });

    console.log(genLabel);
    // Example data
    const monthlyData = {
        labels: genLabel,
        datasets: [{
            label: 'Monthly Application Trends',
            data:  genData,
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 2, 
            fill: false,
        }, ],
    };
    // Add this script after including the Chart.js library
    const ctx = document.getElementById('monthlyTrendsChart').getContext('2d');

    const monthlyTrendsChart = new Chart(ctx, {
        type: 'line',
        data: monthlyData,
        options: {
            scales: {
                x: {
                    type: 'category',
                    labels: monthlyData.labels,
                },
                y: {
                    beginAtZero: true,
                },
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Monthly Application Trends',
                },
            },
        },
    });

    // Status chart and rejection data

    var statusData = {
        labels: myData['applicationCountByStatus'].map(el=> {return el['status']}),
        datasets: [{
            data: myData['applicationCountByStatus'].map(el=> {return el['count']}), // Adjust data based on your actual application status counts
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
        }]
    };
    var rejectionReasonsData = {
        labels: ['Incomplete Documentation', 'Incorrect Information', 'Other'],
        datasets: [{
            data: [15, 20, 5], // Adjust data based on your actual rejection reasons counts
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
        }]
    };

    // Configuration for both charts
    var chartConfig = {
        type: 'pie', // Change to 'horizontalBar' for the rejection reasons chart
        options: {
            responsive: true,
            legend: {
                position: 'top',
            },
        }
    };
    var statusDistributionChart = new Chart(document.getElementById('statusDistributionChart'), {
        ...chartConfig,
        data: statusData
    });

    // Create the Top Reasons for Rejection Horizontal Bar Chart
    var rejectionReasonsChart = new Chart(document.getElementById('rejectionReasonsChart'), {
        ...chartConfig,
        type: 'horizontalBar',
        data: rejectionReasonsData
    });

    // Age distribution chart
    applicantCounts = [myData['ages'].filter(el=> el <= 10 ).length, myData['ages'].filter(el=> (el <= 20 && el > 10) ).length,
    myData['ages'].filter(el=> (el <= 30 && el > 20) ).length, myData['ages'].filter(el=> (el <= 40 && el > 30) ).length,
    myData['ages'].filter(el=> (el <= 50 && el > 40) ).length, myData['ages'].filter(el=> (el > 50) ).length];

    console.log(applicantCounts);
    // Mock data for demonstration purposes
    var ageData = {
        labels: ['0-10', '11-20', '21-30', '31-40', '41-50', '51+'],
        datasets: [{
            label: 'Number of Applicants',
            data: applicantCounts, //[20, 50, 15, 25, 15, 10], // Adjust data based on your actual age distribution
            backgroundColor: 'rgba(75, 192, 192, 0.6)'
        }]
    };

    // Configuration for the Age Distribution Bar Chart
    var chartConfig = {
        type: 'bar',
        data: ageData,
        options: {
            responsive: true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Age Groups'
                    }
                }],
                yAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Number of Applicants'
                    },
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    };

    // Create the Age Distribution Bar Chart
    var ageDistributionChart = new Chart(document.getElementById('ageDistributionChart'), chartConfig);
</script>

<script deffer>


    document.addEventListener('DOMContentLoaded', function () {
        function PrintImage(divId) {
            var canvas = document.getElementById(divId);
           
            var newWindow = window.open('', '_blank');

                newWindow.document.write('<html><head><title>Print</title></head><body>');
                newWindow.document.write("<br><img src='" + canvas.toDataURL() + "'/>");
                newWindow.document.write('</body></html>');

                newWindow.document.close();
                newWindow.print();

        }
        var trndPrintBtn = document.getElementById("trendChartPrint");
        var statusPrintBtn = document.getElementById("statusDistributionChartPrint");
        var rejPrintBtn = document.getElementById("rejChartPrint");
        var agePrintBtn = document.getElementById("ageChartPrint");

        trndPrintBtn.addEventListener('click', function () {
            PrintImage("monthlyTrendsChart");
        });
        statusPrintBtn.addEventListener('click', function () {
            PrintImage("statusDistributionChart");
        });

        rejPrintBtn.addEventListener('click', function () {
            PrintImage("rejectionReasonsChart");
        });

        agePrintBtn.addEventListener('click', function () {
            PrintImage("ageDistributionChart");
        });

    });

</script>

</html>
