@foreach($posts as $post)
<div class="media">
  <div class="media-left">
    <a href="{{ route('front.ns.post', $post) }}">
      <img class="media-object thumb" src="@if(!($post->getFile()))images/live_bg.png @else {{ asset($post->getFile()) }} @endif">
    </a>
  </div>
  <div class="media-body">
    <div class="extra">
      <span class="e-datetime">{{ $post->getDay() }} {{ $post->getMonthRu() }}, {{ $post->getTime() }}</span>
      <span class="e-views"><i class="fa fa-eye"></i>{{ $post->getViewed() }}</span>
    </div>
    <a class="media-heading" href="{{ route('front.ns.post', $post) }}">{{ $post->getTitleRuOrKg() }}</a>
  </div>
</div>
@endforeach