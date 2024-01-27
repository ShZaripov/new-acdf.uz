@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Новость</h1>
    </div>
</div>
<div class="clearfix">
    <a href="{{ route('albums.edit', $model->id) }}" class="btn btn-primary pull-left">Редактировать</a>
</div>
<br>
<!-- /.row -->
<div class="table-responsive">
    <table class="table table-hover">
        <tr>
            <th>Картинка</th>
            <td>
                <?php if ($model->image): ?>
                    <img src="<?= getThumbnail($model->image) ?>" alt="">
                <?php endif ?>
            </td>
        </tr>
        <tr>
            <th>Дата</th>
            <td><?= $model->order?$model->order:"<span style='color:red;'>Нет значение</span>" ?></td>
        </tr>
    </table>
</div>
<h2>Контент</h2>
<hr>
<div class="post-content">
    <?= $model->content ?>
</div>
<hr>
<?php echo Form::open(['route' => ['image.destroy'], 'method' => 'delete', 'style' => 'display: inline-block']) ?>
    {{ Form::hidden('id', $model->id) }}
    <button class="btn btn-danger btnConfirm">Удалить</button>
<?= Form::close() ?>
@endsection
