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
                <div class="well well-small green">
                  <div class="pull-left"> Total Due : </div>
                  <div class="pull-right"> 8,000 USD </div>
                  <div class="clearfix"></div>
                </div>
              </div>
              <!-- /invoice-body -->
            </div>
            <!-- /col-lg-10 -->
            <table class="table">
              <thead>
                <tr>
                  <th class="text-left">الدواء</th>
                  <th style="width:100px" class="text-center">عدد العلب</th>
                    <th style="width:100px" class="text-center">عدد الظروف</th>

                    <th class="text-left">حالة الفاتوة</th>

                        <th style="width:140px" class="text-left">سعر المبيع للظرف</th>

                  <th style="width:140px" class="text-left">سعر المبيع للعلبة</th>
                  <th style="width:90px" class="text-left">السعر الكلي</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td>Flat Pack Heritage</td>
                  <td class="text-center">1</td>
                  <td class="text-center">1</td>

                    <td>Flat Pack Heritage</td>

                   <td class="text-left">$429.00</td>
                  <td class="text-left">$429.00</td>
                  <td class="text-left">$429.00</td>
                </tr>
                <tr>
                    <td>Carry On Suitcase</td>
                  <td class="text-center">2</td>
                    <td class="text-center">2</td>

                  <td>Flat Pack Heritage</td>

                    <td class="text-left">$429.00</td>
                  <td class="text-left">$300.00</td>
                  <td class="text-left">$600.00</td>
                </tr>
                <tr>
                  <td colspan="5" rowspan="4">

                      <h5 class="text-left "><strong>سبب الخصم</strong></h5>
                      <p class="text-left">VAT Included in TotalVAT Included in TotalVAT Included in TotalVAT Included in TotalVAT Included in Total</p>



                    <td class="text-left"><strong>السعر قبل الخصم</strong></td>
                    <td class="text-left">$1029.00</td>
                </tr>
                <tr>
                  <td class="text-left no-border"><strong>الخصم</strong></td>
                  <td class="text-left">$0.00</td>
                </tr>

                <tr>
                  <td class="text-left no-border">
                    <div class="well well-small green"><strong>السعر بعد الخصم</strong></div>
                  </td>
                  <td class="text-left"><strong>$1029.00</strong></td>
                </tr>
              </tbody>
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
