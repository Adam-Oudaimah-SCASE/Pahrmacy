@extends('/layouts.master')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="col-lg-12 mt">
      <div class="row content-panel">
        <div class="col-lg-10 col-lg-offset-1">
          <div class="invoice-body">
            <div class="pull-left">
              <h1>اسم الصيدلية</h1>
              <address>

            شارع كذا<br>
          اللاذقية <br>
            <abbr title="Phone">P:</abbr> (123) 456-7890
          </address>
            </div>
            <!-- /pull-left -->
            <div class="pull-right">
              <h2>فاتورة زبون</h2>
            </div>
            <!-- /pull-right -->
            <div class="clearfix"></div>
            <br>
            <br>
            <br>
            <div class="row">
              <div class="col-md-9">

              </div>
              <!-- /col-md-9 -->
              <div class="col-md-3">
                <br>
                <div>
                  <div class="pull-left">رقم الفاتورة : </div>
                  <div class="pull-right"> 000283 </div>
                  <div class="clearfix"></div>
                </div>
                <div>
                  <!-- /col-md-3 -->
                  <div class="pull-left"> تاريخ الفاتورة : </div>
                  <div class="pull-right"> 15/03/14 </div>
                  <div class="clearfix"></div>
                </div>
                <!-- /row -->
                <br>

              </div>
              <!-- /invoice-body -->
            </div>
            <!-- /col-lg-10 -->
            <table class="table">
              <thead>
                <tr>
                  <th class="text-left">اسم الدواء بالعربي </th>
                  <th class="text-left">اسم الدواء بالانكليزي</th>
                  <th class="text-left">تاريخ انتهاء الصلاحية</th>
                  <th style="width:200px" class="text-left">السعر الصافي للظرف</th>
                  <th style="width:200px" class="text-left">السعر الصافي للعلبة</th>
                  <th style="width:200px" class="text-left">سعر المبيع للظرف</th>
                  <th style="width:200px" class="text-left">سعر المبيع للعلبة</th>
                  <th style="width:100px" class="text-center">عدد العلب</th>
                  <th style="width:100px" class="text-center">عدد الظروف</th>
                  <th style="width:100px" class="text-left">السعر المعدل للظرف</th>
                  <th style="width:100px" class="text-left">السعر المعدل للعلبة</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Flat Pack Heritage</td>
                  <td>Flat Pack Heritage</td>
                  <td class="text-center">11-12-2020</td>
                  <td class="text-center">221</td>
                  <td class="text-center">221</td>
                  <td class="text-center">221</td>
                  <td class="text-center">221</td>
                  <form class="form-horizontal style-form" action="" method="POST">
                  @csrf
                      <div class="form-group" dir="rtl">
                      <td class="text-center">  <input type="text" class="form-control" name="name"></td>
                      <td class="text-center">  <input type="text" class="form-control" name="name"></td>
                      <td class="text-center">  <input type="text" class="form-control" name="name"></td>
                      <td class="text-center">  <input type="text" class="form-control" name="name"></td>
                      </div>
                  </form>
              </tr>
              <tr>
                <td>Flat Pack Heritage</td>
                <td>Flat Pack Heritage</td>
                <td class="text-center">11-12-2020</td>
                <td class="text-center">221</td>
                <td class="text-center">221</td>
                <td class="text-center">221</td>
                <td class="text-center">221</td>
                <form class="form-horizontal style-form" action="" method="POST">
                @csrf
                    <div class="form-group" dir="rtl">
                    <td class="text-center">  <input type="text" class="form-control" name="name"></td>
                    <td class="text-center">  <input type="text" class="form-control" name="name"></td>
                    <td class="text-center">  <input type="text" class="form-control" name="name"></td>
                    <td class="text-center">  <input type="text" class="form-control" name="name"></td>
                    </div>
                </form>
            </tr>
           </tbody>
        </table>
            <hr style="border-color:#ddd;">
            <br>
           <table>
           <tbody>
            <tr>
            <form class="form-horizontal style-form" action="" method="POST">
            @csrf
                <div class="form-group" dir="rtl">
                <td class="text-center">  <label class="col-sm-2 col-sm-2 control-label">الخصم</label>  </td>
                <td style="width:300px;"class="text-center">  <input type="text" class="form-control" name="name"></td>
                <td style="width:300px;" class="text-center"> <label class=" control-label">سبب الخصم</label>  </td>
                <td style="width:600px;" class="text-center"> <input type="text-area" class="form-control" name="name"> </td>

                <td class="text-center">    <button type="submit" class="btn btn-theme">حفظ</button></td>
                </div>
            </form>
          </tbody>
        </tr>
      </table>
            <br>
            <br>
          </div>
          <!--/col-lg-12 mt -->
  </section>
  <!-- /wrapper -->
</section>
<!-- /MAIN CONTENT -->
<!--main content end-->

@endsection
