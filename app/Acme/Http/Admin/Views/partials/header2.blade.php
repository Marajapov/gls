<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <div class="divider"></div>
        <ul class="nav side-menu">
            <li><a href="{{ route('admin.home') }}"><i class="fa fa-home"></i>{{ trans('site.AdminHomeTitle') }} </a></li>
            <li><a href="{{ route('admin.photoParent.index') }}"><i class="fa fa-image"></i>Фотогалерея </a></li>
            <li><a href="{{ route('admin.photoChild.index') }}"><i class="fa fa-download"></i>{{ trans('site.AdminPhotoUploadTitle') }}</a></li>

            <li><a href="{{ route('admin.channel.index') }}"><i class="fa fa-television"></i>{{ trans('site.AdminChannelTitle') }}</a></li>

            <li><a href="#"><i class="fa fa-newspaper-o"></i>{{ trans('site.AdminPostTitle') }} <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="{{ route('admin.post.index') }}">{{ trans('site.AdminPostsTitle') }}</a></li>
                    <li><a href="{{ route('admin.category.index') }}">{{ trans('site.AdminPostsCatTitle') }}</a></li>
                </ul>
            </li>
            <li><a href="#"><i class="fa fa-file-video-o"></i>{{ trans('site.AdminMediaTitle') }} <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="{{ route('admin.media.index') }}">{{ trans('site.AdminMediaPostTitle') }}</a></li>
                    <li><a href="{{ route('admin.mediaCategory.index') }}">{{ trans('site.AdminMediaPostCatTitle') }}</a></li>
                    <li><a href="{{ route('admin.project.index') }}">Телепередачи</a></li>
                </ul>
            </li>
            <li><a href="{{ route('admin.anons.index') }}"><i class="fa fa-info-circle"></i>Анонс</a></li>
            <li><a href="{{ route('admin.quote.index') }}"><i class="fa fa-quote-right"></i>Цитата</a></li>
            <li><a href="{{ route('admin.banner.index') }}"><i class="fa fa-diamond"></i>Баннер</a></li>
            <li><a href="{{ route('admin.schedule.index') }}"><i class="fa fa-caret-square-o-right"></i>Телепрограмма</a></li>
            <li><a href="{{ route('admin.page.index') }}"><i class="fa fa-columns"></i>{{ trans('site.AdminPagesTitle') }}</a></li>
            <li><a href="{{ route('admin.menu.index') }}"><i class="fa fa-chevron-circle-down"></i>Меню</a></li>

            <li><a href="{{ route('admin.user.index') }}"><i class="fa fa-user"></i>{{ trans('site.AdminUsersTitle') }}</a></li>

            <li><a href="{{ route('admin.background.index') }}"><i class="fa fa-backward"></i>{{ trans('site.AdminBackgroundTitle') }}</a></li>
            <li><a href="{{ route('admin.peopleReporter.index') }}"><i class="fa fa-users"></i>Элдик репортер</a></li>
            <li><a href="{{ route('admin.comment.index') }}"><i class="fa fa-comments"></i>{{ trans('site.Comments') }}</a></li>
        </ul>
        <div class="menu_section">
            <h3 style="margin:17px 0px">{{ trans('site.AdminaAditionalPages') }}</h3>
            <ul class="nav side-menu">

                <li><a href="#"><i class="fa fa-laptop"></i>{{ trans('site.AdminHelpSos') }}<span class="label label-success pull-right">SOS</span></a>
                    <ul class="nav child_menu" style="display: none">
                        <li><a href="#">Таск бар</a>
                        </li>
                        <li><a href="#">Проекттер</a>
                        </li>
                        <li><a href="#">Контакттар</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

    </div>
</div>

<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="Профиль">
        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Оңдоолор">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Жардам">
        <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
    </a>
    <a href="javascript:document.getElementById('logout-form').submit()" data-toggle="tooltip" data-placement="top" title="Чыгуу">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
</div>
<!-- /menu footer buttons -->

{!! Form::open(['route' => 'front.logout', 'id' => 'logout-form']) !!}
{!! Form::close() !!}