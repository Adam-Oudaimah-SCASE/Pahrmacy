@extends('/layouts.master')
@section('content')

<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-left"></i>تقرير مشتريات </h3>
    <div class="row mt">
      <div class="col-lg-12">
        <div class="content-panel">
          <h4 class="float-right"><i class="fa fa-angle-left"></i>هذا التقرير يقوم بعرض مجموع وتفصيل المشتريات في يوم معين او خلال مدة معينة  </h4>
            <button type="button" onclick="printFunction()" class="btn btn-theme float-left ml" >طباعة</button>
          <section id="unseen">
          <div class="">
          <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="">


              <thead>
                <tr>
                  <th>اسم البند</th>
                  <th class="numeric">التفصيل</th>
                  <th class="numeric">المبلغ المدفوع </th>
                  <th class="numeric">المبلغ المتبقي </th>

                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">AUSTRALIAN AGRICULTURAL COMPANY LIMITED.AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">9</td>
                  <td class="numeric">9</td>
                </tr>
                <tr>
                  <td>AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">AUSTRALIAN AGRICULTURAL COMPANY LIMITED.AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">9</td>
                  <td class="numeric">9</td>
                </tr>
                <tr>
                  <td>AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">AUSTRALIAN AGRICULTURAL COMPANY LIMITED.AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">9</td>
                  <td class="numeric">9</td>
                </tr>
                <tr>
                  <td>AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">AUSTRALIAN AGRICULTURAL COMPANY LIMITED.AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">9</td>
                  <td class="numeric">9</td>
                </tr>
                <tr>
                  <td>AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">AUSTRALIAN AGRICULTURAL COMPANY LIMITED.AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                  <td class="numeric">9</td>
                  <td class="numeric">9</td>
                </tr>
                <td colspan="2" rowspan="4">




                  <td class="text-left"><strong>المجموع النهائي</strong></td>
                  <td class="text-left">$1029.00</td>
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
