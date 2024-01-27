@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Тема</h1>
    </div>
</div>
<div class="clearfix">
    <a href="{{ route('news-subjects.index') }}" class="btn btn-default pull-left">Назад</a>
</div>
<br>
<?= View::make('admin.news-subjects._form', [
	'model'=> $model,
]) ?>
@endsection
