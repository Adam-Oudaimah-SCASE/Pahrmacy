@extends('/layouts.master')
@section('content')
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="col-lg-12 mt">
            <div class="row content-panel">
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="invoice-body">
                        <div class="form-group form-inline ">
                          <h4 class="text-left col-lg-3">اسم المريض: </h4>
                            <input type="text col-lg-9" class="form-control" id="customer-name">
                        </div>
                         <hr>
                         <br>
                        <!-- /pull-left -->

                        <!-- /pull-right -->
                        <div class="clearfix"></div>
                        <br>
                        <div class="row">
                            <div class="col-md-9">
                            </div>
                            <!-- /col-md-9 -->

                            <!-- /invoice-body -->
                        </div>
                        <!-- /col-lg-10 -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-left">اسم الدواء</th>
                                    <th class="text-left">عدد الظروف</th>
                                    <th class="text-left">عدد العلب</th>
                                     <th class="text-left">سعر الظرف</th>
                                    <th class="text-left">سعر العلبة</th>
                                </tr>
                            </thead>
                            <tbody>
                              <tr>
                                  <td><input type="text" class="form-control" id="drug-name"></td>
                                  <td><input type="text" class="form-control" id="packages_number"></td>
                                  <td><input type="text" class="form-control" id="units_number"></td>
                                  <td><input type="text" class="form-control" id="unit-sell-price"></td>
                                  <td><input type="text" class="form-control" id="package-sell-price"></td>
                             </tr>
                             <tr>
                                 <td><input type="text" class="form-control" id="drug-name"></td>
                                 <td><input type="text" class="form-control" id="packages_number"></td>
                                 <td><input type="text" class="form-control" id="units_number"></td>
                                 <td><input type="text" class="form-control" id="unit-sell-price"></td>
                                 <td><input type="text" class="form-control" id="package-sell-price"></td>
                            </tr>
                              </tbody>
                            </table>
                            <br>
                            <br>
                        <table class="table table-striped table-borderless">
                             <tbody>
                              <tr>
                                <td class="text-left no-border"><strong>الخصم</strong></td>
                              <td>  <input type="text" class="form-control" id="discount_amount"></td>
                                <td class="text-left "><strong>شركة التأمين</strong></td>
                                <td>  <input type="text" class="form-control" id="insurance_company"></td>

                                  </tr>
                                  <tr>
                                      <td class="text-left no-border"><strong>السعر الصافي</strong></td>
                                      <td>  <input type="text" class="form-control" id="full_net_price"></td>
                                      <td class="text-left no-border"><strong>سعر المبيع</strong></td>
                                      <td> <input type="text" class="form-control" id="full_sell_price"></td>
                                  </tr>

                            </tbody>
                          </table>
                          <br>
                          <br>
                          <hr>
                          <div class="form-group form-inline ">
                            <h4 class="text-left col-lg-3"> إجمالي الفاتورة</h4>
                              <input type="text col-lg-9" class="form-control" id="sell_price-sell_price_after_discount">
                          </div>


                        </div>
                    </div>
                </div>
            </div>
            <!--/col-lg-12 mt -->
    </section>
    <!-- /wrapper -->
</section>
<!-- /MAIN CONTENT -->
<!--main content end-->
@endsection
