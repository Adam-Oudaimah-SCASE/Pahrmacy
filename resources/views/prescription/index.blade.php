@extends('/layouts.master')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper site-min-height">
  <h3><i class="fa fa-angle-left"></i>الوصفات الطبية </h3>
    <a type="submit" class="btn btn-theme" href="{{ route('category.create') }}" style="margin-right:10px;">إضافة وصفة</a>
    <div class="row mt " >
      <div class="col-lg-12">
        <!-- CHART PANELS -->
        <div class="row">

      @foreach($prescriptions as $p)


          <div class="col-lg-4 col-md-4 col-sm-4 mb">
            <div class="product-panel-2 pn">

              <img src="img/report .png" width="75" alt="" style="margin-left:18px;margin-top:40px">
              <h4 class="mt">{{$p->customer->name}}</h5>
              <h5>السعر: {{$p->sell_price}}</h6>
            <a href="/prescriptions/{{$p->id}}">  <button class="btn btn-small btn-theme"  >الوصفة الكاملة</button></a>
            </div>
          </div>
      @endforeach

        </div>
      </div>
    </div>
  </section>
</section>
@endsection
