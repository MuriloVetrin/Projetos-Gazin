<?php $__env->startSection('title','Detalhes do cliente'); ?>

<?php $__env->startSection('content'); ?>

<div class="card" style="width: 18rem;">
    <div class="card-header">
        <?php echo e($client->nome); ?>

    </div>
    <div class="card-body">
        <p class="card-text"><strong>ID: </strong><?php echo e($client->id); ?></p>
        <p class="card-text"><strong>Nome: </strong><?php echo e($client->nome); ?></p>
        <p class="card-text"><strong>Endereço: </strong><?php echo e($client->endereco); ?></p>
        <p class="card-text"><strong>Observação: </strong><?php echo e($client->observacao); ?></p>
        <br>
        <a href="<?php echo e(route('clients.index')); ?>" class="btn btn-success">Voltar á lista de clientes</a>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Projetos-Gazin\LARAVEL\clientes\resources\views/clients/show.blade.php ENDPATH**/ ?>