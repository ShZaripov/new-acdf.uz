<?php echo Form::open(['url' => isset($model->id)?route('news-subjects.update', $model->id):route('news-subjects.store'), 'method' => isset($model->id)?'put':'post', 'files' => true]) ?>
    
    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
        <?php echo Form::label('title', 'Название'); ?>
        <?= Form::text('title', isset($model->title)?$model->title:old('title') ,['class' => 'form-control', 'autofocus' => true]) ?>
      @if ($errors->has('title'))
          <span class="help-block">
              <strong>{{ $errors->first('title') }}</strong>
          </span>
      @endif
    </div>

    <?php echo Form::submit('Сохранить', ['class' => 'btn btn-success']); ?>
<?php echo Form::close(); ?>
