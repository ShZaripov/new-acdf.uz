@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Проект</h1>
    </div>
</div>
<div class="clearfix">
    <a href="{{ route('activities.index') }}" class="btn btn-default pull-left">Назад</a>
</div>
<br>
<?= View::make('admin.activities._form',[
	'statuses'  => $statuses
	]) ?>
@endsection
