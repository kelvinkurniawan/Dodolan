@extends('layouts.app', [
'class' => '',
'elementActive' => 'tables'
])

@section('content')
<div class="content">
    <div class="row">
        <livewire:product-detail :productId="$productId" />
    </div>
</div>
@endsection
