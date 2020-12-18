@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập nhật</div>
                    <div class="card-body">
                        <form action="{{route("post.update",['id'=>$post->id])}}" method="POST">
                            {{ method_field('PUT') }}
                            @include('post._form',['post'=>$post])
                            <div class="form-group row">
                                <div class="offset-4 col-sm-6">
                                    <button type="submit" class="btn btn-success">Cập nhật</button>
                                    <button type="button" class="btn btn-danger show_confirm">Xóa</button>
                                </div>
                            </div>
                        </form>
                        <form id="post-delete" method="POST" action="{{ route('post.delete', $post->id) }}">
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
                $("#post-delete").submit();
            }
        });
    })
</script>
@endsection
