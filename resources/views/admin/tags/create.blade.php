@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Тег</h1>
    </div>
</div>
<div class="clearfix">
    <a href="{{ route('tags.index') }}" class="btn btn-default pull-left">Назад</a>
</div>
<br>
<?= View::make('admin.tags._form',[
	'statuses'  => $statuses
	]) ?>
@endsection
