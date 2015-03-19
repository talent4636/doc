@extends('_layouts.default')

@section('content')
  <div id="title" style="text-align: center;">
    <h1>常见问题及注意事项</h1>
    <div style="padding: 5px; font-size: 16px;">常见的ECStore、ERP、CRM安装部署问题，以及常见的使用问题，都可以在这里找到解决办法</div>
    <div style="padding: 0px; font-size: 14px;color:gray;">[如果您发现文档中的错误，或者您有更好的建议，请联系我们]</div>
  </div>
  <hr>
  <div class="main">
    <div class="type-list">
      <ul>
        @foreach ($types as $type)
        <a href="{{ URL('/'.$type['type_id']) }}">
          <li class="list @if($type_id==$type['type_id']) active @endif "><span class="">{{ $type['type_name'] }}</span></li>
        </a>
        @endforeach
      </ul>
    </div>
    <div id="content" class="page-main">
      <ul>
        @forelse ($pages as $page)
        <li style="margin: 10px 0;">
          <div class="title">
            <a href="{{ URL('pages/'.$page->id) }}">
              <span class="title">{{ $page->title }}</span>
            </a>
          </div>
          <div class="body">
          <!-- 过滤除了<img src=""><p>xxx</p><b></b>之外的所有html标签，则可以这样写：strip_tags(string,"<img><p><b>"); -->
            <p>{{ strip_tags($page->body) }}</p>
          </div>
        </li>
        @empty
          <div class="">
            <span class="sorry">抱歉，该目录下暂无文档</span>
          </div>
        @endforelse
      </ul>
    </div>

  </div>
  @endsection