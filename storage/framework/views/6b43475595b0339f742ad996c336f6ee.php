

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Dashboard Penggunaan Air</h2>
    <canvas id="usageChart"></canvas>

    <script>
        // Pastikan Chart.js sudah dimuat sebelum menjalankan kode ini
        var ctx = document.getElementById('usageChart').getContext('2d');
        var usageChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($labels, 15, 512) ?>,
                datasets: [{
                    label: 'Penggunaan Air (m³)',
                    data: <?php echo json_encode($data, 15, 512) ?>,
                    backgroundColor: 'rgba(40, 167, 69, 0.2)',
                    borderColor: 'rgba(40, 167, 69, 1)',
                    borderWidth: 1
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
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\pdam-online\resources\views/dashboard.blade.php ENDPATH**/ ?>