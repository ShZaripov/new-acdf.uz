<?= Form::open([
    'url'    => isset($model->id) ? route('tags.update', $model->id) : route('tags.store'),
    'method' => isset($model->id) ? 'put' : 'post', 'files' => true])
?>

<?php $model = isset($model) ? $model : null; ?>

@include('admin.forms._text', [
    'field'     => 'title',
    'label'     => 'Название',
    'model'     => $model,
    'errors'    => $errors,
])

@include('admin.forms._select', [
    'field'     => 'status',
    'label'     => 'Статус',
    'list'      => $statuses,
    'model'     => $model,
    'errors'    => $errors,
])


<?= Form::submit('Сохранить', ['class' => 'btn btn-success']) ?>
<?= Form::close() ?>
