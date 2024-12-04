

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header bg-success text-white">
        <h3>Data Penggunaan Air</h3>
    </div>
    <div class="card-body">
        <form action="<?php echo e(route('water_usages.index')); ?>" method="GET" class="mb-3">
            <div class="row">
                <div class="col-md-4">
                    <label for="month" class="form-label">Pilih Bulan</label>
                    <select name="month" class="form-select">
                        <option value="">Semua Bulan</option>
                        <?php for($m = 1; $m <= 12; $m++): ?>
                            <option value="<?php echo e($m); ?>" <?php echo e(request('month') == $m ? 'selected' : ''); ?>>
                                <?php echo e(\Carbon\Carbon::create()->month($m)->format('F')); ?>

                            </option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="year" class="form-label">Pilih Tahun</label>
                    <select name="year" class="form-select">
                        <option value="">Semua Tahun</option>
                        <?php for($y = date('Y'); $y >= 2000; $y--): ?>
                            <option value="<?php echo e($y); ?>" <?php echo e(request('year') == $y ? 'selected' : ''); ?>>
                                <?php echo e($y); ?>

                            </option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-success">Filter</button>
                </div>
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Pelanggan</th>
                    <th>Bulan</th>
                    <th>Tahun</th>
                    <th>Penggunaan Air (m³)</th>
                    <th>Biaya Pemeliharaan</th>
                    <th>Denda Keterlambatan</th>
                    <th>Total Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $usages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($usage->customer_name); ?></td>
                    <td><?php echo e(\Carbon\Carbon::create()->month($usage->month)->format('F')); ?></td>
                    <td><?php echo e($usage->year); ?></td>
                    <td><?php echo e($usage->water_usage); ?></td>
                    <td><?php echo e(number_format($usage->maintenance_fee, 0, ',', '.')); ?></td>
                    <td><?php echo e(number_format($usage->late_fee, 0, ',', '.')); ?></td>
                    <td><?php echo e(number_format($usage->total_payment, 0, ',', '.')); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data penggunaan air</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>        
        <a href="<?php echo e(route('water_usages.export')); ?>" class="btn btn-success mb-3">Export ke Excel</a>
        <!-- Pagination links -->
        <?php echo e($usages->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\pdam-online\resources\views/water_usages/index.blade.php ENDPATH**/ ?>