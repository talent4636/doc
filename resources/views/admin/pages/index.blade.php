@extends('_layouts.admin')

@section('content')
<div class="container">  
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">后台首页</div>

        <div class="panel-body">

        <a href="{{ URL('admin/pages/create') }}" class="btn-custom" id="btn-custom">新增</a>

          @foreach ($pages as $page)
            <hr>
            <div class="page">
              @foreach ($types as $type)
                @if ($type['type_id'] == $page['type_id'])
                  <span class="mark blue">{{ $type['type_name'] }}</span>
                @endif
              @endforeach
              <span class="list-title">
                {{ $page->title }}
              </span>
              
              <div class="content">
                <!-- <p>
                  {{ strip_tags($page->body) }}
                </p> -->
              </div>
            </div>
            <a href="{{ URL('admin/pages/'.$page->id.'/edit') }}" class="btn btn-success">编x辑</a>

            <!-- form action="{{ URL('admin/pages/'.$page->id) }}" method="DELETE" style="display: inline;">
              <button type="submit" class="btn btn-danger">删除</button>
            </form -->
            <form action="{{ URL('admin/pages/'.$page->id) }}" method="POST" style="display: inline;">
                <input name="_method" type="hidden" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-danger">删除</button>
            </form>
          @endforeach

        </div>
      </div>
    </div>
  </div>
</div>  
@endsection
