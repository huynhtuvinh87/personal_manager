@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="search">
                <form class="form-inline" method="GET">
                    <div class="form-group mb-2 mr-1 month">
                        <select name="month" class="form-control">
                            <option value="">Tháng</option>
                            @for($m=1;$m<=12;$m++)
                            <option value="{{$m}}" {{request()->get("month")==$m?"selected":""}}>Tháng {{$m}}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-group mb-2 mr-1 year">
                        <select name="year" class="form-control">
                            <option value="">Năm</option>
                            @for($y=2019;$y<=\Carbon\Carbon::now()->year;$y++)
                            <option value="{{$y}}" {{request()->get("year")==$y?"selected":""}}>{{$y}}</option>
                            @endfor
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Lọc</button>
                    <a href="{{route('post.index')}}" class="btn btn-outline-primary mb-2 ml-1">Reset</a>
                </form>
            </div>
            <ul class="list-group list-post">
                <li class="list-group-item list-group-item-primary">
                    Tổng chi: <strong class="text-danger">{{number_format($result['sum_price'], 0, '', '.')}} VNĐ</strong>
                    <a href="{{route("collect_money.create")}}" class="badge-pill btn btn-primary btn-sm float-right">Thêm mới</a>
                </li>
                @foreach ($result['data'] as $post)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="{{route("collect_money.edit",$post->id)}}">{{$post->title}}</a>
                        <span class="badge-pill"><strong class="text-danger">{{number_format($post->price, 0, '', '.')}} VNĐ</strong> <br> <small>{{date("d-m-Y", strtotime($post->date))}}</small></span>
                    </li>
                @endforeach
                <li class="list-group-item list-group-item-primary">
                    Tổng chi: <strong class="text-danger">{{number_format($result['sum_price'], 0, '', '.')}} VNĐ</strong>
                    <span class="badge-pill"></span>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
@section('js')

@endsection
