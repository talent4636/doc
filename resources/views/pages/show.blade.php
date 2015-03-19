@extends('_layouts.default')

@section('content')
  <h4>
    <a href="/index.php">返回首页</a>
  </h4>

  <h1 style="text-align: center; margin-top: 50px;">{{ $page->title }}</h1>
  <hr>
  <div id="date" style="text-align: right;">
    最后更新时间：{{ $page->updated_at }}
  </div>
  <div id="content" style="padding: 50px;">
    
      {!! $page->body !!}
    
  </div>
@endsection