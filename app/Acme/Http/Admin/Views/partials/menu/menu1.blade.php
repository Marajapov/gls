<li class="dd-item dd3-item" data-id="{{ $menu->id() }}">
    <div class="dd-handle dd3-handle">Drag</div>
    <div class="dd3-content">
        {{ $menu->getName() }}
        <span class="pull-right">
            {!! Form::model($menu, ['route' => ['admin.menu.destroy', $menu], 'method' => 'DELETE', 'class' => '', 'onsubmit' => "return confirm('Вы уверены ?')"]) !!}

            <a href="{{ route('admin.menu.edit', $menu) }}" class="btn btn-primary btn-xs"><i class="fa fa-2x fa-edit"></i></a>
            <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-2x fa-trash"></i></button>
            {!! Form::close() !!}
        </span>
    </div>
    @if(count($menu->submenus) > 0)
    <ol class="dd-list">
        @foreach ($menu->submenus as $menu2)
        @include('Admin::partials.menu.menu2', ['menu2' => $menu2])
        @endforeach
    </ol>
    @endif
</li>
