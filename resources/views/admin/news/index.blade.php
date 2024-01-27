@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
		<div class="object-link pull-right">
			<strong>Перейти:</strong>
			<a href="{{ route('site.news') }}" target="_blank">{{ route('site.news') }}</a>
		</div>
        <h1 class="page-header">Новости</h1>
    </div>
</div>
<div class="clearfix">
	<a href="{{ route('news.create') }}" class="btn btn-primary pull-right">Добавить</a>
</div>
<!-- /.row -->
<div class="table-responsive">
    {{ tableLength($model)['lengthPage'] }}
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Название</th>
                <th>Сататус</th>
				<th>Категория</th>
				<th>Теги</th>
				<th></th>
            </tr>
        </thead>
        <?php if ($model): ?>
	        <tbody>
        	<?php $i = tableLength($model)['startPage']; foreach ($model as $item): ?>
						<tr>
							<td><?= $i ?></td>
                            <td><?= $item->title_display ?></td>
							<td><?= $item->status_name ?></td>
							<td><?= $item->category_title ?></td>
							<td field-key='tag'>
								@foreach ($item->tag as $singleTag)
									<span class="label label-info label-many" style="margin-right: 10px">{{ $singleTag->title }}</span>
								@endforeach
							</td>
							<td style="text-align: right;">
								<a href="{{ route('news.show', $item->id) }}" class="btn btn-sm btn-info">
									<i class="glyphicon glyphicon-eye-open"></i>
								</a>
								<a href="{{ route('news.edit', $item->id) }}" class="btn btn-sm btn-primary">
									<i class="glyphicon glyphicon-pencil"></i>
								</a>
								@role('admin')
								<?php echo Form::open(['route' => ['news.destroy',$item->id], 'method' => 'delete', 'style' => 'display: inline-block']) ?>
								{{ Form::hidden('id', $item->id) }}
								<button class="btn btn-sm btn-danger btnConfirm">
									<i class='glyphicon glyphicon-trash'></i>
								</button>
								<?= Form::close() ?>
								@endrole
							</td>
						</tr>        		
        	<?php $i++; endforeach ?>
	        </tbody>
        <?php endif ?>
    </table>

    <div class="text-right">
	      <?= $model->links(); ?>
	  </div>
</div>
@endsection
