@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm mới</div>
                    <div class="card-body">
                        <form action="{{ route('collect_money.store') }}" method="post">
                            @include('collect_money._form',['model'=>$model])
                            <div class="form-group row">
                                <div class="offset-4 col-sm-3">
                                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')

@endsection
