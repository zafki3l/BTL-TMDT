@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Báo cáo doanh số bán hàng</h1>

    <form method="get" action="{{ route('staff.monthlyReport') }}">
        <label>Tháng:</label>
        <input type="number" name="month" min="1" max="12" value="{{ $month }}">
        <label>Năm:</label>
        <input type="number" name="year" value="{{ $year }}">
        <button type="submit">Xem</button>
    </form>

    <h3>Kết quả:</h3>
    <p>Doanh số tháng {{ $month }}/{{ $year }}: <b>{{ number_format($totalSales, 0, ',', '.') }} VNĐ</b></p>
@endsection
