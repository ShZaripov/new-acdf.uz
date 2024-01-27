@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Подписчики</h1>
    </div>
</div>

<!-- /.row -->
<div class="table-responsive">
    {{ tableLength($subscribers)['lengthPage'] }}
    <table class="table">
      <?php if ($subscribers): ?>
        <tbody>
        <?php $i = tableLength($subscribers)['startPage']; foreach ($subscribers as $item): ?>
          <tr>
            <td>{{ $i }}</td>
            <td>{{ $item->email }}</td>
          </tr>
        <?php $i++; endforeach ?>
        </tbody>
      <?php endif ?>
    </table>
</div>
<div class="text-right">
    <?= $subscribers->links(); ?>
</div>
@endsection
