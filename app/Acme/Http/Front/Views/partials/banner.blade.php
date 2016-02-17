<div class="clearfix">
    <div class="col-md-12 text-center ads top-ad hidden-xs">
        <a href="@if(!empty($positionTop->linkTo)){{ $positionTop->linkTo }} @else # @endif" target="_blank">
            <img src="@if(!empty($positionTop->file)) {{ asset($positionTop->file) }} @else {{ asset('images/banner_default_728x90.png') }} @endif" alt="phot1"/>
        </a>
    </div>
    <div class="col-xs-12 top-ad visible-xs">
        <a href="@if(!empty($positionTop->linkTo)){{ $positionTop->linkTo }} @else # @endif" target="_blank">
            <img src="@if(!empty($positionTop->file)) {{ asset($positionTop->file) }} @else {{ asset('images/banner_default_728x90.png') }} @endif" alt="phot1"/>
        </a>
    </div>
</div>