@extends('Admin::layouts.default')
@section('title', "Menus")

@section('content')
<div class="row modals">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
    <a href="{{ route('admin.menu.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>{{ trans('site.AdminMenuNew') }}

</a>
    <div class="clearfix"></div>
            </div>

<div id="nestable-menu">
    <i data-action="expand-all" class="fa fa-2x fa-plus-square" data-toggle="tooltip" title="@lang('site.Expand all')"></i>
    <i data-action="collapse-all" class="fa fa-2x fa-minus-square" data-toggle="tooltip" title="@lang('site.Collapse all')"></i>
</div>

<div class="cf nestable-lists">

    <div class="dd" id="nestable">
        <ol class="dd-list">
            @foreach($menus as $menu)
            @include('Admin::partials.menu.menu1', ['menu1' => $menu])
            @endforeach
        </ol>
    </div>
</div>
<div>
    {!! Form::open(['route' => ['admin.menu.save', $code]]) !!}
    <input type="hidden" name="json" id="nestable-output">
    <button type="save" class="btn btn-primary">{{ trans('site.Save') }}
</button>
    {!! Form::close() !!}
</div>


    </div>
    </div>
</div>

@stop

@section('styles')
<style type="text/css">
/* Nestable */

.dd { position: relative; display: block; margin: 0; padding: 0;
    /*max-width: 800px;*/
    list-style: none; font-size: 13px; line-height: 20px; }

    .dd-list { display: block; position: relative; margin: 0; padding: 0; list-style: none; }
    .dd-list .dd-list { padding-left: 42px; }
    .dd-collapsed .dd-list { display: none; }

    .dd-item,
    .dd-empty,
    .dd-placeholder { display: block; position: relative; margin: 0; padding: 0; min-height: 20px; font-size: 13px; line-height: 20px; }

    .dd-handle { display: block; height: 42px; margin: 5px 0; padding: 5px 10px; color: #333; text-decoration: none; font-weight: bold; border: 1px solid #ccc;
        background: #fafafa;
        background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
        background:    -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
        background:         linear-gradient(top, #fafafa 0%, #eee 100%);
        -webkit-border-radius: 3px;
        border-radius: 3px;
        box-sizing: border-box; -moz-box-sizing: border-box;
    }
    .dd-handle:hover { color: #2ea8e5; background: #fff; }

    .dd-item > button { display: block; position: relative; cursor: pointer; float: left; width: 25px; height: 20px; margin: 5px 0; padding: 0; text-indent: 100%; white-space: nowrap; overflow: hidden; border: 0; background: transparent; font-size: 12px; line-height: 1; text-align: center; font-weight: bold; }
    .dd-item > button:before { content: '+'; display: block; position: absolute; width: 100%; text-align: center; text-indent: 0; }
    .dd-item > button[data-action="collapse"]:before { content: '-'; }

    .dd-placeholder,
    .dd-empty { margin: 5px 0; padding: 0; min-height: 42px; background: #f2fbff; border: 1px dashed #b6bcbf; box-sizing: border-box; -moz-box-sizing: border-box; }
    .dd-empty { border: 1px dashed #bbb; min-height: 100px; background-color: #e5e5e5;
        background-image: -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
        -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
        background-image:    -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
        -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
        background-image:         linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
        linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
        background-size: 60px 60px;
        background-position: 0 0, 30px 30px;
    }

    .dd-dragel { position: absolute; pointer-events: none; z-index: 9999; }
    .dd-dragel > .dd-item .dd-handle { margin-top: 0; }
    .dd-dragel .dd-handle {
        -webkit-box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
        box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
    }

    /* Nestable Extras */

    #nestable-output { width: 100%; height: 7em; font-size: 0.75em; line-height: 1.333333em; font-family: Consolas, monospace; padding: 5px; box-sizing: border-box; -moz-box-sizing: border-box; }
    #nestable-menu i {
        cursor: pointer;
    }
    @media only screen and (min-width: 700px) {

        /*.dd { float: left; }*/
        .dd + .dd { margin-left: 2%; }

    }

    .dd-hover > .dd-handle { background: #2ea8e5 !important; }

    /* Nestable Draggable Handles */

    .dd3-content { display: block; height: 42px; margin: 5px 0; padding: 5px 10px 5px 40px; color: #333; text-decoration: none; font-weight: bold; border: 1px solid #ccc;
        background: #fafafa;
        background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
        background:    -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
        background:         linear-gradient(top, #fafafa 0%, #eee 100%);
        -webkit-border-radius: 3px;
        border-radius: 3px;
        box-sizing: border-box; -moz-box-sizing: border-box;
    }
    .dd3-content:hover { color: #2ea8e5; background: #fff; }

    .dd-dragel > .dd3-item > .dd3-content { margin: 0; }

    .dd3-item > button { margin-left: 42px; }

    .dd3-handle { position: absolute; margin: 0; left: 0; top: 0; cursor: pointer; width: 42px; text-indent: 100%; white-space: nowrap; overflow: hidden;
        border: 1px solid #aaa;
        background: #ddd;
        background: -webkit-linear-gradient(top, #ddd 0%, #bbb 100%);
        background:    -moz-linear-gradient(top, #ddd 0%, #bbb 100%);
        background:         linear-gradient(top, #ddd 0%, #bbb 100%);
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }
    .dd3-handle:before { content: '≡'; display: block; position: absolute; left: 0; top: 9px; width: 100%; text-align: center; text-indent: 0; color: #fff; font-size: 42px; font-weight: normal; }
    .dd3-handle:hover { background: #ddd; }
</style>
@stop

@section('scripts')
<script src="/vendor/nestable/jquery.nestable.js"></script>
<script type="text/javascript">
    var updateOutput = function(e)
    {
        var list   = e.length ? e : $(e.target),
        output = list.data('output');
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize')));
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };

    $('#nestable-menu').on('click', function(e)
    {
        var target = $(e.target),
        action = target.data('action');
        if (action === 'expand-all') {
            $('.dd').nestable('expandAll');
        }
        if (action === 'collapse-all') {
            $('.dd').nestable('collapseAll');
        }
    });


    $('#nestable').nestable({ maxDepth: 2 }).on('change', updateOutput);

    updateOutput($('#nestable').data('output', $('#nestable-output')));
</script>
@stop

