@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Категория</h1>
    </div>
</div>
<div class="clearfix">
    <a href="{{ route('categories.index') }}" class="btn btn-default pull-left">Назад</a>
</div>
<br>
<?= View::make('admin.categories._form',[
	'statuses'  => $statuses
	]) ?>
@endsection
