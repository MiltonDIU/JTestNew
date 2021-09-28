<li>
    <a href="{{ url('notice/details/' . $notice->id.'/'.$notice->alias) }}">{{$notice->title}}</a><br>
    <span style="font-size: 12px; color: dimgrey">{{$notice->notice_category->title}}, {{$notice->created_at->format('d M Y')}}</span>
</li>
