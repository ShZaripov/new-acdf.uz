@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Руководство</h1>
    </div>
</div>
<div class="clearfix">
    <a href="{{ route('employees.index') }}" class="btn btn-default pull-left">Назад</a>
</div>
<br>
<?= View::make('admin.employees._form', [
	'model'=> $model,
]) ?>
@endsection
