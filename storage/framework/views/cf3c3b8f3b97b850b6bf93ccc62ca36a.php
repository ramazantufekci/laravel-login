<?php $__env->startSection('content'); ?>
    <div class="bg-light p-5 rounded">
        <?php if(auth()->guard()->check()): ?>
        <div class="row">
		<div class="col">
			<a class="btn btn-primary" href="<?php echo e(route('kayitlar.create')); ?>" role="button">Yeni Kayit Olustur</a>
		</div>
	</div>

<?php if($message = Session::get('success')): ?>
<div class="alert alert-success">
	<p><?php echo e($message); ?></p>
</div>
<?php endif; ?>
		<table class="table table-bordered">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Malzeme</th>
				<th scope="col">Adet</th>
				<th scope="col">Fiyat</th>
			</tr>
  		</thead>
		<tbody>
		<?php $__currentLoopData = $kayitlar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kayit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<th scope="row"><?php echo e(++$i); ?></th>
				<td><?php echo e($kayit->name); ?></td>
				<td><?php echo e($kayit->adet); ?></td>
				<td><?php echo e($kayit->fiyat); ?></td>
				<td>
					<form action="<?php echo e(route('kayitlar.destroy',$kayit->id)); ?>" method="POST">
						<a class="btn btn-info" href="<?php echo e(route('kayitlar.show',$kayit->id)); ?>">Goster</a>
						<a class="btn btn-primary" href="<?php echo e(route('kayitlar.edit',$kayit->id)); ?>">Duzenle</a>
						<?php echo csrf_field(); ?>
						<?php echo method_field('DELETE'); ?>
						<button type="submit" class="btn btn-danger">Sil</button>
					</form>
				</td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
		</table>
<?php echo $kayitlar->links(); ?>

	</div>
        <?php endif; ?>

        <?php if(auth()->guard()->guest()): ?>
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lcladmin\Downloads\app\resources\views/kayitlar/index.blade.php ENDPATH**/ ?>