<?php $__env->startSection('title', 'Editar Cliente'); ?>

<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(route('clients.update', $client)); ?>" method="POST">
         <?php echo method_field('PUT'); ?>
        <?php echo csrf_field(); ?>
       
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" placeholder="Digite o nome" value="<?php echo e($client->nome); ?>"
                class="form-control">
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" name="endereco" id="endereco" placeholder="Digite o endereço"
                value="<?php echo e($client->endereco); ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label for="observacao" class="form-label">Observação</label>
            <textarea name="observacao" id="observacao" placeholder="Digite o observação" cols="30" rows="10"
                class="form-control" ><?php echo e($client->observacao); ?></textarea>
        </div>
        <button class="btn btn-success w-100" type="submit">Enviar</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\muril\Documents\turma12-unialfa\murilo_veetorazo\clientes-laravel\resources\views/clients/edit.blade.php ENDPATH**/ ?>