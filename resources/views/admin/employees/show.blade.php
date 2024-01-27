@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Руководство</h1>
    </div>
</div>
<div class="clearfix">
    <a href="{{ route('employees.edit', $model->id) }}" class="btn btn-primary pull-left">Редактировать</a>
</div>
<br>
<!-- /.row -->
<div class="table-responsive">
    <table class="table table-hover">
        <tr>
            <th>Фотография</th>
            <td>
                <?php if ($model->image): ?>
                    <img src="<?= getThumbnail($model->image) ?>" alt="">
                <?php endif ?>
            </td>
        </tr>
        <tr>
            <th>ФИО</th>
            <td><?= $model->name_display ?></td>
        </tr>
        <tr>
            <th>Должность</th>
            <td><?= $model->position_display ?></td>
        </tr>
        <tr>
            <th>Описание</th>
            <td><?= $model->description?$model->description:"<span style='color:red;'>Нет значение</span>" ?></td>
        </tr>
    </table>
</div>
<hr>
<?php echo Form::open(['route' => ['employees.destroy',$model->id], 'method' => 'delete', 'style' => 'display: inline-block']) ?>
    {{ Form::hidden('id', $model->id) }}
    <button class="btn btn-danger btnConfirm">Удалить</button>
<?= Form::close() ?>
@endsection
