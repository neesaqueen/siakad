<?php
if (isset($grafik)) {
    foreach ($grafik as $data) {
        $nama[] = $data['nama'];
        $value[] = $data['value'];
    }
}
?>

</div>
</div>
</div>
<aside class="control-sidebar control-sidebar-dark">
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>

<footer class="main-footer">
    <strong>Copyright © 2018-<?= date('Y')  ?> <a href="<?php echo base_url('/'); ?>">SMK Wahid Hasyim</a>.</strong>
</footer>
</div>

<!-- jQuery -->
<script src="<?php echo base_url('assets/template/plugins'); ?>/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/template/plugins'); ?>/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/template/'); ?>/js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/template/plugins'); ?>/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/template/plugins'); ?>/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/template/plugins'); ?>/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('assets/template/plugins'); ?>/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<?php if (isset($grafik)) { ?>
    <!-- Chart.js -->
    <script src="<?php echo base_url('assets/template/plugins'); ?>/chartjs/dist/Chart.min.js"></script>

    <!-- Chart -->
    <script>
        var chart = document.getElementById("myChart").getContext('2d');
        var areaChart = new Chart(chart, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($nama); ?>,
                datasets: [{
                    label: "Nilai Terbaik",
                    data: <?php echo json_encode($value); ?>,
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(54, 162, 253, 0.8)',
                        'rgba(255, 206, 86, 0.8)',
                        'rgba(153, 255, 255, 0.8)',
                        'rgba(255, 159, 64, 0.8)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 253, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 255, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
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
<?php } ?>
<!-- .Chart -->

<!-- Data Table -->
<script>
    $(function() {
        $('#table1').DataTable({});

        $('[data-toggle="modal"]').tooltip()
    });
</script>
<!-- .Data Table -->

<!-- Alert -->
<script>
    window.setTimeout(function() {
        $('.alert').fadeTo(500, 0).slideUp(500, function() {
            $(this).btnhapus();
        });
    }, 10000);
</script>
<!-- .Alert -->

<!-- Active -->
<script>
    /** add active class and stay opened when selected */
    var url = window.location;

    // for sidebar menu entirely but not cover treeview
    $('ul.nav-sidebar a').filter(function() {
        return this.href == url;
    }).addClass('active');

    // for treeview
    $('ul.nav-treeview a').filter(function() {
        return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
</script>
<!-- .Active -->
</body>

</html>