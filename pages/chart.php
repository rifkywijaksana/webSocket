
<?php
$koneksi     = mysqli_connect("localhost", "root", "", "log_ecu");
$tanggal       = mysqli_query($koneksi, "SELECT tanggal FROM tb_sensor  order by waktu asc");
$temperatur = mysqli_query($koneksi, "SELECT temperatur FROM tb_sensor  order by waktu asc");
?>
<div class="containers" id="myID">
            <canvas id="myChart" width="100" height="100"></canvas>
        </div>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [<?php while ($b = mysqli_fetch_array($tanggal)) { echo '"' . $b['tanggal'] . '",';}?>],
                    datasets: [{
                            label: '# of Votes',
                            data: [<?php while ($p = mysqli_fetch_array($temperatur)) { echo '"' . $p['temperatur'] . '",';}?>],
                            backgroundColor: 'rgba(255, 159, 64, 0.2)',
                            borderColor: 'rgba(255, 159, 64, 0.2)',
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>