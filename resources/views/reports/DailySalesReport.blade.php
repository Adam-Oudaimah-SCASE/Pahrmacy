@extends('/layouts.master')
@section('content')

<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-left"></i>تقرير يومية المبيعات </h3>
    <div class="row mt">
      <div class="col-lg-12">
        <div class="content-panel">
          <h4 class="float-right"><i class="fa fa-angle-left"></i>يقوم بعرض محصلة المبيعات في يوم معين </h4>
            <button type="button" onclick="printFunction()" class="btn btn-theme float-left ml" >طباعة</button>
          <section id="unseen">
          <div class="">
          <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="">


              <thead>
                <tr>
                  <th>رقم الفاتورة</th>
                  <th class="numeric">المجموع النهائي</th>
                  <th class="numeric">المجموع المتبقي</th>


                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="numeric">94332</td>
                  <td class="numeric">99877</td>
                  <td class="numeric">955</td>
                </tr>
                <tr>
                  <td class="numeric">94332</td>
                  <td class="numeric">99877</td>
                  <td class="numeric">955</td>
                </tr>
                <tr>
                  <td class="numeric">94332</td>
                  <td class="numeric">99877</td>
                  <td class="numeric">955</td>
                </tr>
                <tr>
                  <td class="numeric">94332</td>
                  <td class="numeric">99877</td>
                  <td class="numeric">955</td>
                </tr>
                <tr>
                  <td class="numeric">94332</td>
                  <td class="numeric">99877</td>
                  <td class="numeric">955</td>
                </tr>
                <tr>
                  <td class="numeric">94332</td>
                  <td class="numeric">99877</td>
                  <td class="numeric">955</td>
                </tr>
                <tr>
                  <td class="numeric">94332</td>
                  <td class="numeric">99877</td>
                  <td class="numeric">955</td>
                </tr>
                <tr>
                  <td class="numeric">94332</td>
                  <td class="numeric">99877</td>
                  <td class="numeric">955</td>
                </tr>
                <tr>
                  <td class="numeric">94332</td>
                  <td class="numeric">99877</td>
                  <td class="numeric">955</td>
                </tr>
                <tr>
                  <td class="numeric">94332</td>
                  <td class="numeric">99877</td>
                  <td class="numeric">955</td>
                </tr>
                <td colspan="1" rowspan="4">




                  <td class="text-left"><strong>المجموع النهائي</strong></td>
                  <td class="text-left">$1029.00</td>
              </tr>
              <tr>
                <td class="text-left no-border"><strong>المجموع الداخل</strong></td>
                <td class="text-left">$0.00</td>
              </tr>

              <tr>
                <td class="text-left no-border">
                  <div class="text-left"><strong>المجموع المحسوم</strong></div>
                </td>
                <td class="text-left"><strong>$1029.00</strong></td>
              </tr>
              </tbody>
            </table>
          </section>
         </div>
        </div>
        <!-- /content-panel -->
      </div>
      <!-- /col-lg-4 -->
    </div>
    <!-- /row -->

    <!-- /row -->
  </section>
  <!-- /wrapper -->
</section>
<!-- /MAIN CONTENT -->
<!--main content end-->
@endsection
