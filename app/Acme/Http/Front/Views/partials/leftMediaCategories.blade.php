<div class="panel panel-default ctg-panel media-ctg-panel">
  <div class="panel-heading">
    <h3 class="panel-title"><span>{{ trans('site.AdminMediaCategories') }}</span></h3>
  </div>
  <div class="panel-body">
    <div class="col-md-12">
      <div class="row">
        <ul class="list-group">
          @foreach($projectList as $project)
            <li class="list-group-item">
              <a href="{{ route('front.media.project', $project) }}">{{ $project->getNameOne() }}</a>
            </li>
          @endforeach
        </ul>
      </div>
    </div>

  </div>
</div>