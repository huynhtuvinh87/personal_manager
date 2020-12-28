@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <ul class="list-group">
                <li class="list-group-item list-group-item-primary">Thống kê thu nhập</li>
                <li class="list-group-item" style="overflow-x: scroll">
                    <table class="table table-bordered">
                        <tr>
                            <th></th>
                            <th>Hiện tại</th>
                            <th>Trước</th>
                            <th>Tăng/giảm</th>
                        </tr>
                        <tr>
                            <td>Tuần</td>
                            <td>{{price_format($collect['weekday']['current_week'])}}</td>
                            <td>{{price_format($collect['weekday']['last_week'])}}</td>
                            <td>{{price_format($collect['weekday']['current_week'] - $collect['weekday']['last_week'])}}</td>
                        </tr>
                        <tr>
                            <td>Tháng</td>
                            <td>{{price_format($collect['month']['current_month'])}}</td>
                            <td>{{price_format($collect['month']['last_month'])}}</td>
                            <td>{{price_format($collect['month']['current_month'] - $collect['month']['last_month'])}}</td>
                        </tr>
                        <tr>
                            <td>Năm</td>
                            <td>{{price_format($collect['year']['current_year'])}}</td>
                            <td>{{price_format($collect['year']['last_year'])}}</td>
                            <td>{{price_format($collect['year']['current_year'] - $collect['year']['last_year'])}}</td>
                        </tr>
                    </table>
                </li>

            </ul>
        </div>
        <div class="col-md-6">
            <ul class="list-group">
                <li class="list-group-item list-group-item-primary">Thống kê chi tiêu</li>
                <li class="list-group-item">
                    <table class="table table-bordered">
                        <tr>
                            <th></th>
                            <th>Hiện tại</th>
                            <th>Trước</th>
                            <th>Tăng/giảm</th>
                        </tr>
                        <tr>
                            <td>Tuần</td>
                            <td>{{price_format($spending['weekday']['current_week'])}}</td>
                            <td>{{price_format($spending['weekday']['last_week'])}}</td>
                            <td>{{price_format($spending['weekday']['current_week'] - $spending['weekday']['last_week'])}}</td>
                        </tr>
                        <tr>
                            <td>Tháng</td>
                            <td>{{price_format($spending['month']['current_month'])}}</td>
                            <td>{{price_format($spending['month']['last_month'])}}</td>
                            <td>{{price_format($spending['month']['current_month'] - $spending['month']['last_month'])}}</td>
                        </tr>
                        <tr>
                            <td>Năm</td>
                            <td>{{price_format($spending['year']['current_year'])}}</td>
                            <td>{{price_format($spending['year']['last_year'])}}</td>
                            <td>{{price_format($spending['year']['current_year'] - $spending['year']['last_year'])}}</td>
                        </tr>
                    </table>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
