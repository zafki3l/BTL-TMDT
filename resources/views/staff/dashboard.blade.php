@extends('layouts.backend')

@section('content')
<h1>This is staff page</h1>
<ul>
    <li><a href="{{ route('staff.indexBook') }}">Manage Books</a></li>
    <li><a href="#">Process Orders</a></li>
    <li><a href="{{ route('staff.indexOrder') }}">Manage Orders</a></li>
    <li><a href="{{ route('staff.monthlyReport') }}">Generate Monthly Sales Report</a></li>
</ul>
@endsection