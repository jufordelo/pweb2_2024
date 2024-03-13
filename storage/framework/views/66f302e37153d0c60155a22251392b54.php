<?php $__env->startSection('conteudo'); ?>

<h3> Formulário Aluno</h3>
<?php
    if(!empty($dado->id)){

    $route= route('aluno.update',$dado->id);
    }else{
      $route = route('aluno.store');
    }
?>
<form action= "<?php echo e($route); ?>" method="post">

    <?php echo csrf_field(); ?>

    <?php if(!empty($dado->id)): ?>
    <?php echo method_field('put'); ?>

    <?php endif; ?>

    <input type="hidden" name="id"
    value="<?php if(!empty($dado->id)): ?> <?php echo e($dado->id); ?> <?php else: ?><?php echo e(''); ?> <?php endif; ?>"><br>


    <label for=""> Nome</label> <br>
    <input type="text" name="nome"  class="form-control"
     value="<?php if(!empty ($dado->nome)): ?><?php echo e($dado->nome); ?>

     <?php elseif(!empty(old ('nome'))): ?> <?php echo e(old('nome')); ?> else<?php echo e(""); ?> <?php endif; ?>"> <br>

    <label for="">Telefone</label> <br>
     <input type="text" name="telefone"  class="form-control"
     value="<?php if(!empty ($dado->telefone)): ?><?php echo e($dado->telefone); ?>

     <?php elseif(!empty(old ('telefone'))): ?> <?php echo e(old('telefone')); ?> else<?php echo e(""); ?> <?php endif; ?>"> <br>


    <label for="">CPF</label>
    <input type="text" name="cpf"  class="form-control"
     value="<?php if(!empty ($dado->cpf)): ?><?php echo e($dado->cpf); ?>

     <?php elseif(!empty(old ('cpf'))): ?> <?php echo e(old('cpf')); ?> else<?php echo e(""); ?> <?php endif; ?>"> <br>


<label for="">Categorias </label><br>

     <select name="categoria_id" class="form-select">
        <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($item->id); ?>"><?php echo e($item->nome); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     </select>



    <button type="submit" > Salvar</button>
    <button><a href="<?php echo e(url('aluno')); ?> ">Voltar</a></button>

</form>
<?php $__env->stopSection(); ?>








<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\pweb2_2024\resources\views/aluno/form.blade.php ENDPATH**/ ?>