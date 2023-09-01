<?php $__env->startSection('title', 'Adicionar Novo Cliente'); ?>
<?php $__env->startSection('content'); ?>

    <h1>Novo Cliente</h1>

    <form action="<?php echo e(route('clients.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" placeholder="Digite o nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" name="endereco" id="endereco" placeholder="Digite o endereço" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="observacao" class="form-label">Observação</label>
            <textarea name="observacao" id="observacao" placeholder="Digite o observação" cols="30" rows="10"
                class="form-control" required></textarea>
        </div>
        <button class="btn btn-success w-100" type="submit">Enviar</button>
    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\muril\Documents\turma12-unialfa\murilo_veetorazo\clientes-laravel\resources\views/clients/create.blade.php ENDPATH**/ ?>