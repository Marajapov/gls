@extends('Admin::layouts.default')
@section('title', "Подкатегория")

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/build.css') }}"/>
@stop

@section('content')

    <!-- include bottom nav -->
    @include('Admin::partials.subcategoryNav')
    <!-- end bottom nav -->

    <div class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">
                                Подкатегория
                            </h4>
                            <p class="category">{{ $subcategory->getName() }}</p>
                            
                            <p class="subcategoryPrice">{{ $subcategory->getPrice() }}</p>

                            <div class="category">                                
                                @if(($subcategory->category()->first()) != null) {{ $subcategory->category()->first()->getName()}} @endif
                            </div>

                            

                        </div>
                        <button onclick="history.go(-1);" class="btn btn-default">Назад</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection