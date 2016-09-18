<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" media="screen" title="no title" charset="utf-8">

  @if(Session::has('success'))
    <p>
      {{Session::get('success')}}
    </p>
  @endif

<pre>
  {{var_dump(Session::all())}}
</pre>
@foreach($testuser as $user)
  <p>
    mon id est {{$user->id}}

  </p>
  <p>
   {{$user->content}}
  </p>
  <a href="{{route('etat', ['id' => $user->id])}}">{{$user->etat}}</a><br>
  <a href="{{route('like', ['id' => $user->id])}}">@if($like[$user->id])
    LIKE<i class="fa fa-heart" aria-hidden="true"></i>
    @endif
    @if(!$like[$user->id])
    LIKE<i class="fa fa-heart-o" aria-hidden="true"></i>
    @endif
  </a><br>
@endforeach
