<?php $__env->startSection('title','Lista de clientes'); ?>

<?php $__env->startSection('content'); ?>
<h1>Lista de Clients</h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Endereço</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <th scope="row"><?php echo e($client->id); ?></th>
            <th scope="row">
                <a href="<?php echo e(route('clients.show', $client)); ?>"><?php echo e($client->nome); ?></a>
            </th>
            <th scope="row"><?php echo e($client->endereco); ?></th>
            <th>
            
                <a class="btn btn-primary" href="<?php echo e(route('clients.edit', $client)); ?>">Editar</a>

            <form action="<?php echo e(route('clients.destroy', $client)); ?>"
            method="POST"
            >
            <?php echo method_field('DELETE'); ?>
            <?php echo csrf_field(); ?>

            <button  

              class="btn btn-danger"
              type="submit"
              onclick="return confirm('Tem certeza que quer apagar?')" 
              > 
              
              APAGAR

            </button>
             </form>
            </th>
           
        </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<a class="btn btn-success" href="<?php echo e(route('clients.create')); ?>">Novo Cliente</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\muril\Documents\turma12-unialfa\murilo_veetorazo\clientes-laravel\resources\views/clients/index.blade.php ENDPATH**/ ?>