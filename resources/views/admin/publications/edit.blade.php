@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Публикация</h1>
    </div>
</div>
<div class="clearfix">
    <a href="{{ route('publications.index') }}" class="btn btn-default pull-left">Назад</a>
</div>
<br>
<?= View::make('admin.publications._form', [
	'model'=> $model,
	'statuses' => $statuses
]) ?>
@endsection
