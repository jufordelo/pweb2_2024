<?php $__env->startSection('conteudo'); ?>
<?php $__env->startSection('titulo' , "Formulario Aluno"); ?>



<h3> Listagem Aluno </h3>
<form action="<?php echo e(route('aluno.search')); ?>" method="post">
    <div class="row">
        <?php echo csrf_field(); ?>
        <div class= "col-4">
            <label for="">Nome</label><br>
            <input type="text" name="nome" class="form-control"><br>
        </div>
        <div class="col-4" style="">
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass">
                </i> Buscar</button>
           <a href="<?php echo e(url('aluno/create')); ?>" class="btn btn-success"><i class="fa-regular fa-address-book"></i> Novo</a>
        </div>
    </div>
</form>

    <hr>
    <table class="table table-striped">
        <thead>
            <tr>    <th>ID</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Cpf</th>
                    <th>Categoria</th>
                    <th colspan="2">Ações</th>
                    <th colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
                <?php $__currentLoopData = $dados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($item->id); ?></td>
                <td><?php echo e($item->nome); ?></td>
                <td><?php echo e($item->telefone); ?></td>
                <td><?php echo e($item->cpf); ?></td>
                <td><?php echo e($item->categoria->nome ?? ""); ?></td>
                <td>Editar</td>
                <td><a href="<?php echo e(route('aluno.edit', $item->id)); ?>"> Editar </a></td>

                <td><form action="<?php echo e(route('aluno.destroy',$item)); ?>" method="post">
                <?php echo method_field("DELETE"); ?>
                <?php echo csrf_field(); ?>
                <input type="submit" value="Deletar">
                </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

<?php $__env->stopSection(); ?>








<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\pweb2_2024\resources\views/aluno/list.blade.php ENDPATH**/ ?>