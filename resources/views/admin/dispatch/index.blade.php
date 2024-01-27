@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="object-link pull-right">
          <a href="{{ route('dispatch.subscribers') }}">
            <strong>Подписчики:</strong> {{ $subscribers }}
          </a>
        </div>
        <h1 class="page-header">Рассылка</h1>
    </div>
</div>
<?php echo Form::open(['url' => route('dispatch.send'), 'method' => 'post', 'files' => true]) ?>

    <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
        <?php echo Form::label('subject', 'Тема'); ?>
        <?= Form::text('subject', old('subject') ,['class' => 'form-control']) ?>
      @if ($errors->has('subject'))
          <span class="help-block">
              <strong>{{ $errors->first('subject') }}</strong>
          </span>
      @endif
    </div>

    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
        <?php echo Form::label('content', 'Контент'); ?>
        <?= Form::textarea('content', old('content') ,['class' => 'form-control textarea', 'rows' => '5']) ?>
      @if ($errors->has('content'))
          <span class="help-block">
              <strong>{{ $errors->first('content') }}</strong>
          </span>
      @endif
    </div>

    <?php echo Form::submit('Отправить', ['class' => 'btn btn-success']); ?>
<?php echo Form::close(); ?>

@endsection
