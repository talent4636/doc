<!-- @extends('app') -->
@extends('_layouts.admin')
@section('content')
<div class="container">  
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">编辑 Page</div>

        <div class="panel-body">

          @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="{{ URL('admin/pages/'.$page->id) }}" method="POST">
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            请选择类型：
            @foreach( $types->all() as $type )
              <input type="radio" name="type_id" 
              @if ($type['type_id']==$page->type_id) 
                checked="checked" 
              @endif 
              value="{{$type['type_id']}}">&nbsp;{{ $type['type_name'] }}&nbsp;|&nbsp;&nbsp;
            @endforeach
            <br><br>
            <input type="text" name="title" class="form-control" required="required" value="{{ $page->title }}">
            <br>
            <textarea cols="80" id="editor1" class="ckeditor" name="body" rows="10" required="required">
              {{ $page->body }}
            </textarea>
            <!-- <textarea name="body" rows="10" class="form-control" required="required">{{ $page->body }}</textarea> -->
            <br>
            <button class="btn btn-lg btn-info">保存</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>  
@endsection