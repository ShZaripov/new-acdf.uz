<?php echo Form::open(['url' => isset($model->id)?route('albums.update', $model->id):route('albums.store'), 'method' => isset($model->id)?'put':'post', 'files' => true]) ?>
    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
        <?php echo Form::label('title', 'Название'); ?>
        <?= Form::text('title', isset($model->title)?$model->title:old('title') ,['class' => 'form-control']) ?>
      @if ($errors->has('title'))
          <span class="help-block">
              <strong>{{ $errors->first('title') }}</strong>
          </span>
      @endif
    </div>

    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
        <?php echo Form::label('image', 'Картинка'); ?>
        <?php if (isset($model->image) && $model->image != ''): ?>
            <div id="imageBox">
                <img src="<?= getThumbnail($model->image) ?>" alt="">
                <a class="btn btn-danger removeImg" data-url='<?= route('albums.edit',$model->id) ?>'>
                    <i class='glyphicon glyphicon-trash'></i>
                </a>
            </div>
            <div id="fileInput" style='display:none;'>
                <?= Form::file('image', ['class' => 'form-control']) ?>
            </div>
        <?php else: ?>
            <?= Form::file('image', ['class' => 'form-control']) ?>
        <?php endif ?>
        @if ($errors->has('image'))
            <span class="help-block">
                <strong>{{ $errors->first('image') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        <?php echo Form::label('description', 'Описание'); ?>
        <?= Form::textarea('description', isset($model->description)?$model->description:old('description') ,['class' => 'form-control', 'rows' => '5']) ?>
      @if ($errors->has('description'))
          <span class="help-block">
              <strong>{{ $errors->first('description') }}</strong>
          </span>
      @endif
    </div>

    <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
      <?php 
        $old = isset($model->date)?$model->date:old('date');
      ?>
        <?php echo Form::label('date', 'Дата'); ?>
        <?= Form::text('date', $old?$old:date('Y-m-d') ,['class' => 'datepicker form-control']) ?>
      @if ($errors->has('date'))
          <span class="help-block">
              <strong>{{ $errors->first('date') }}</strong>
          </span>
      @endif
    </div>

<?php $model = isset($model) ? $model : null; ?>

@include('admin.forms._select', [
    'field'     => 'status',
    'label'     => 'Статус',
    'list'      => $statuses,
    'model'     => $model,
    'errors'    => $errors,
])

@include('admin.forms._select', [
    'field'     => 'visible',
    'label'     => 'Показать в фотогалерее',
    'list'      => $visibleList,
    'model'     => $model,
    'errors'    => $errors,
])


    <?php echo Form::submit('Сохранить', ['class' => 'btn btn-success']); ?>
<?php echo Form::close(); ?>
