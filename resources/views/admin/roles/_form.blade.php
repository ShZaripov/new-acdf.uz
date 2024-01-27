<?php echo Form::open(['url' => isset($role->id)?route('roles.update', ['role' => $role->id]):route('roles.store'), 'method' => isset($role->id)?'put':'post', 'files' => true]) ?>

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
      <?php echo Form::label('name', 'Name'); ?>
      <?= Form::text('name', isset($role->name)?$role->name:old('name') ,['class' => 'form-control']) ?>
      @if ($errors->has('name'))
          <span class="help-block">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
      @endif
    </div>

     <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
      <?php echo Form::label('display_name', 'Display name'); ?>
      <?= Form::text('display_name', isset($role->display_name)?$role->display_name:old('display_name') ,['class' => 'form-control']) ?>
      @if ($errors->has('display_name'))
          <span class="help-block">
              <strong>{{ $errors->first('display_name') }}</strong>
          </span>
      @endif
    </div>

    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
      <?php echo Form::label('description', 'Description'); ?>
      <?= Form::textarea('description', isset($role->description)?$role->description:old('description') ,['class' => 'form-control', 'rows' => '5']) ?>
      @if ($errors->has('description'))
          <span class="help-block">
              <strong>{{ $errors->first('description') }}</strong>
          </span>
      @endif
    </div>

    <?php echo Form::submit('Сохранить', ['class' => 'btn btn-success']); ?>
<?php echo Form::close(); ?>
