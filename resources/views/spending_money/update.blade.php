@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập nhật</div>
                    <div class="card-body">
                        <form action="{{route("spending_money.update",['id'=>$model->id])}}" method="POST">
                            {{ method_field('PUT') }}
                            @include('spending_money._form',['model'=>$model])
                            <div class="form-group row">
                                <div class="offset-4 col-sm-6">
                                    <button type="submit" class="btn btn-success">Cập nhật</button>
                                    <button type="button" class="btn btn-danger show_confirm">Xóa</button>
                                </div>
                            </div>
                        </form>
                        <form id="spending-money-delete" method="POST" action="{{ route('spending_money.delete', $model->id) }}">
                            @csrf
                            {{ method_field('DELETE') }}

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('.show_confirm').click(function(e) {
            if(confirm('Are you sure you want to delete this?')) {
                $("#spending-money-delete").submit();
            }
        });
    })
</script>
@endsection
