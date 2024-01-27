@extends('layouts.site')

@section('content')
<div class="section">
  <div class="mainContainer">
    <div class="sectionTitle">
      <h2>{{ __('main.management') }}</h2>
    </div>

    <div class="members">
      <ul>
        <?php if ($model): ?>
          <?php foreach ($model as $item): ?>
          <li>
            <div class="memberBox">
              <?php if ($item->image): ?>
              <div style="background-image: url(<?= $item->image?getMedium($item->image):""; ?>);" class="memberAvatar"></div>
              <?php endif ?>
              <div class="membarName">{{ $item->name }}</div>
              <div class="memberCompany">{{ $item->position }}</div>
              <div class="memberText">{{ $item->description }}</div>
            </div>
          </li>
          <?php endforeach ?>
        <?php endif ?>
      </ul>
    </div>

    {{ $model->links('pagination.site', ['model' => $model]) }}
    
  </div>
</div>

@endsection