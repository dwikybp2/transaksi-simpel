<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Table - Bootstrap 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .required::after {
            content: " *";
            color: red;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">MyApp</a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Dashboard</h5>
                <a class="btn btn-light btn-sm" href="{{ url('barangs') }}">Data Barang</a>
            </div>
            <div class="card-body">
                <!-- Search Box -->

                <div class="row mb-3">
                    <div class="col-md-4">
                        <input type="date" id="startDate" class="form-control" value="">
                    </div>
                    <div class="col-md-4">
                        <input type="date" id="endDate" class="form-control" value="">
                    </div>
                    <div class="col-md-4 text-end gap-4">
                        <button class="btn btn-danger" onclick="fetchChartData()">Reset</button>
                        <button class="btn btn-primary" onclick="fetchChartData()">Tampilkan</button>
                    </div>
                </div>

                <!-- Data Table -->
                <div id="chart-container" style="width: 80%; height: 500px; margin: auto;"></div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            fetchChartData(); // Load chart data on page load
        });

        function fetchChartData(allData = false) {
            let startDate = $("#startDate").val();
            let endDate = $("#endDate").val();

            if (allData === true) {
                startDate = '';
                endDate = '';
            }

            $.ajax({
                url: "{{ 'api/chart-data' }}",
                type: "GET",
                data: {
                    start_date: startDate,
                    end_date: endDate
                },
                dataType: "json",
                success: function(response) {
                    let categories = [];
                    let data = [];

                    $.each(response, function(index, item) {
                        categories.push(item.jenis);
                        data.push(item.total_transaksi);
                    });

                    Highcharts.chart('chart-container', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Perbandingan Transaksi per Jenis Barang'
                        },
                        xAxis: {
                            categories: categories,
                            title: {
                                text: 'Jenis Barang'
                            }
                        },
                        yAxis: {
                            title: {
                                text: 'Jumlah Transaksi'
                            }
                        },
                        series: [{
                            name: 'Total Transaksi',
                            data: data
                        }]
                    });
                },
                error: function() {
                    alert("Gagal mengambil data!");
                }
            });
        }
    </script>



</body>

</html>
