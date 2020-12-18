@csrf
<input type="hidden" name="type" value="1">
<div class="col-sm-12">
    <div class="form-group row">
        <label for="date" class="col-sm-4 col-xs-4">Thời gian</label>
        <input type="date" id="date" name="date" value="{{ $post->date ? $post->date : old('date') }}"  class="form-control col-sm-8  col-xs-4">
    </div>
    <div class="form-group row">
        <label for="title" class="col-sm-4">Tiêu đề</label>
        <textarea type="text" id="title" name="title" class="form-control col-sm-8">{{ $post->title ? $post->title : old('title') }}</textarea>
    </div>
    <div class="form-group row">
        <label for="price" class="col-sm-4">Số tiền</label>
        <input type="number" id="price" name="price" value="{{ $post->price ? $post->price : old('price') }}"  class="form-control col-sm-8">
    </div>

</div>
