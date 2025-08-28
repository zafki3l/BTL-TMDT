@extends('layouts.app')

@section('content')
<div class="main-content">
    {{-- New Books --}}
    @include('bookSection.partials', ['title' => 'NEW BOOKS', 'books' => $newBooks])

    {{-- Best Seller --}}
    @include('bookSection.partials', ['title' => 'BEST SELLER', 'books' => $bestSellerBooks])

    {{-- On Sales --}}
    @include('bookSection.partials', ['title' => 'ON SALES', 'books' => $onSaleBooks])
</div>
@endsection
