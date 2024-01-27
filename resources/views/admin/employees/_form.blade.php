<?php echo Form::open(['url' => isset($model->id)?route('employees.update', $model->id):route('employees.store'), 'method' => isset($model->id)?'put':'post', 'files' => true]) ?>
    

    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
        <?php echo Form::label('image', 'Фотография'); ?>
        <?php if (isset($model->image) && $model->image != ''): ?>
            <div id="imageBox">
                <img src="<?= getThumbnail($model->image) ?>" alt="">
                <a class="btn btn-danger removeImg" data-url='<?= route('employees.edit',$model->id) ?>'>
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
    
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <?php echo Form::label('name', 'ФИО'); ?>
        <?= Form::text('name', isset($model->name)?$model->name:old('name') ,['class' => 'form-control']) ?>
      @if ($errors->has('name'))
          <span class="help-block">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
      @endif
    </div>

    <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
        <?php echo Form::label('position', 'Должность'); ?>
        <?= Form::text('position', isset($model->position)?$model->position:old('position') ,['class' => 'form-control']) ?>
      @if ($errors->has('position'))
          <span class="help-block">
              <strong>{{ $errors->first('position') }}</strong>
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


    <?php echo Form::submit('Сохранить', ['class' => 'btn btn-success']); ?>
<?php echo Form::close(); ?>
