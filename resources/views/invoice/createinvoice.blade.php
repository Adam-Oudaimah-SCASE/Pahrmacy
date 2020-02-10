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

              <form class="form-horizontal style-form" action="" method="POST">
                  @csrf
              <table class="table">
              <thead>
                <tr>
                  <th class="text-left">اسم الدواء بالعربي </th>
                  <th class="text-left">تاريخ انتهاء الصلاحية</th>
                  <th style="width:150px" class="text-center">عدد العلب</th>
                  <th style="width:150px" class="text-center">عدد الظروف</th>
                  <th style="width:150px" class="text-left">السعر المعدل للظرف</th>
                  <th style="width:150px" class="text-left">السعر المعدل للعلبة</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Flat Pack Heritage</td>
                  <td class="text-left">11-12-2020</td>

                      <td class="text-center">  <input type="text" class="form-control" name="name"></td>
                      <td class="text-center">  <input type="text" class="form-control" name="name"></td>
                      <td class="text-center">  <input type="text" class="form-control" name="name"></td>
                      <td class="text-center">  <input type="text" class="form-control" name="name"></td>

                  </tr>

                  <tr>
                    <td>Flat Pack Heritage</td>
                    <td class="text-left">11-12-2020</td>

                        <td class="text-center">  <input type="text" class="form-control" name="name"></td>
                        <td class="text-center">  <input type="text" class="form-control" name="name"></td>
                        <td class="text-center">  <input type="text" class="form-control" name="name"></td>
                        <td class="text-center">  <input type="text" class="form-control" name="name"></td>

                    </tr>
           </tbody>

        </table>
            <hr style="border-color:#ddd;">
            <br>
           <table>
           <tbody>
            <tr>


                <td class="text-center">  <label class="col-sm-2 col-sm-2 control-label">الخصم</label>  </td>
                <td style="width:300px;"class="text-center">  <input type="text" class="form-control" name="name"></td>
                <td style="width:300px;" class="text-center"> <label class=" control-label">سبب الخصم</label>  </td>
                <td style="width:600px;" class="text-center">
                  <select class="form-control">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select> </td>

                <td class="text-center">    <button type="button" class="btn btn-theme" data-toggle="modal" data-target="#myModal">حفظ</button></td>
                <!-- Modal -->
                 <div class="modal fade" id="myModal" role="dialog">
                   <div class="modal-dialog modal-lg">
                     <div class="modal-content">
                       <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                         <h4 class="modal-title">حفظ الفاتورة</h4>
                       </div>
                       <div class="modal-body">
                         <div class="form-group mt">
                           <label class="col-sm-2 col-lg-2 control-label">السعر الصافي</label>
                           <div class="col-lg-10">
                           <input type="text" class="form-control " name="name">
                           </div>
                         </div>
                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">سعر المبيع</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control " name="name">
                        </div>
                      </div>
                       </div>
                       <div class="modal-footer">
                          <button type="submit" class="btn btn-default" >حفظ</button>
                         <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                       </div>
                     </div>
                   </div>
                 </div>

          </tbody>
        </tr>
      </table>
        </form>
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
