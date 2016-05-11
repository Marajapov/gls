@extends('Admin::layouts.default')
@section('title', "Admin panel")

@section('content')

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Admin Panel</a>
            </div>
            <div class="collapse navbar-collapse">

                <form class="navbar-form navbar-left navbar-search-form hidden" role="search">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        <input type="text" value="" class="form-control" placeholder="Search...">
                    </div>
                </form>

                <ul class="nav navbar-nav navbar-right">

                    <li>
                        <a href="javascript:document.getElementById('logout-form').submit()">
                            <i class="fa fa-sign-out"></i>
                            <p>Выйти</p>
                        </a>
                    </li>

                </ul>
            </div>
            {{--<div class="collapse navbar-collapse">--}}
            {{--<ul class="nav navbar-nav navbar-left">--}}
            {{--<li>--}}
            {{--<a href="{{ route('admin.category.create') }}" class="btn btn-success btn-block">--}}
            {{--Добавить категорию--}}
            {{--<i class="pe-7s-keypad"></i>--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--<ul class="nav navbar-nav navbar-right">--}}

            {{--<li class="dropdown">--}}
            {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
            {{--Азамат--}}
            {{--<b class="caret"></b>--}}
            {{--</a>--}}
            {{--<ul class="dropdown-menu">--}}
            {{--<li><a href="#">Личный кабинет</a></li>--}}

            {{--<li class="divider"></li>--}}
            {{--<li><a href="javascript:document.getElementById('logout-form').submit()">Выйти</a></li>--}}
            {{--</ul>--}}
            {{--</li>--}}

            {{--</ul>--}}
            {{--</div>--}}
        </div>
    </nav>

    <div class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">
                    <div class="card ">
                        <div class="header">
                            <h4 class="title">Последние заказы</h4>
                            <p class="category">Backend development</p>
                        </div>
                        <div class="content">
                            <div class="table-full-width">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <label class="checkbox">
                                                <input type="checkbox" value="" data-toggle="checkbox">
                                            </label>
                                        </td>
                                        <td>Sign contract for "What are conference organizers afraid of?"</td>
                                        <td class="td-actions text-right">
                                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="checkbox">
                                                <input type="checkbox" value="" data-toggle="checkbox" checked="">
                                            </label>
                                        </td>
                                        <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                                        <td class="td-actions text-right">
                                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="checkbox">
                                                <input type="checkbox" value="" data-toggle="checkbox" checked="">
                                            </label>
                                        </td>
                                        <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                                        </td>
                                        <td class="td-actions text-right">
                                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="checkbox">
                                                <input type="checkbox" value="" data-toggle="checkbox">
                                            </label>
                                        </td>
                                        <td>Create 4 Invisible User Experiences you Never Knew About</td>
                                        <td class="td-actions text-right">
                                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="checkbox">
                                                <input type="checkbox" value="" data-toggle="checkbox">
                                            </label>
                                        </td>
                                        <td>Read "Following makes Medium better"</td>
                                        <td class="td-actions text-right">
                                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="checkbox">
                                                <input type="checkbox" value="" data-toggle="checkbox">
                                            </label>
                                        </td>
                                        <td>Unfollow 5 enemies from twitter</td>
                                        <td class="td-actions text-right">
                                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="footer">
                                <hr>
                                <div class="stats">
                                    <i class="fa fa-history"></i> Updated 3 minutes ago
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection