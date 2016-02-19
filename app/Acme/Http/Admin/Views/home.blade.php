extends('Admin::layouts.default')
@section('title', "Admin panel")

@section('content')
<div class="row modals">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <section class="content">
            <div class="row">
              <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-green">
                  <div class="inner">
                    <h3>1230</h3>
                    <p>Түз эфир көрүлдү</p>
                  </div>
                  <div class="icons">
                    <i class="fa fa-video-camera"></i>
                  </div>
                  <a href="#" class="small-box-footer"><span>Акыркы 24 сатта</span> <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-blue">
                  <div class="inner">
                    <h3>4500</h3>
                    <p>Сүрөт кошулду</p>
                  </div>
                  <div class="icons">
                    <i class="fa fa-picture-o"></i>
                  </div>
                  <a href="#" class="small-box-footer"><span>Акыркы 24 сатта</span> <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-red">
                  <div class="inner">
                    <h3>5560</h3>
                    <p>Макала окулду</p>
                  </div>
                  <div class="icons">
                    <i class="fa fa-file-text"></i>
                  </div>
                  <a href="#" class="small-box-footer"><span>Акыркы 24 сатта</span> <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div>
        </section>
    </div>
    <!-- right infobar -->
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
            <h2>Оң инфобар</h2>               
            <div class="row">
            </div>

        </div>
    </div>
    <!-- right infobar -->

    <div class="col-md-8 col-sm-8 col-xs-12">
        <div class="x_panel">
            <h2>Жумалык рейтинг</h2>               
            <div class="row">
            </div>

        </div>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="x_panel">
            <h2>Колдонуучулар рейтинги</h2>               
            <div class="row">
            </div>

        </div>
    </div>
</div>


<div class="row col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">


	@include('Front::messages.flash')
	@stop

</div><!-- end row-->