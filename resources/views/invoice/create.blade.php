@extends('layouts.master')
@section('custom-cdns')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
@endsection
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="col-lg-12 mt">
      <div class="row content-panel">
        <div class="col-lg-10 col-lg-offset-1">
          <div class="invoice-body">
            <div class="pull-left">
              <h1>صيدلية عضيمه</h1>
              <address>
                  شارع الزراعة الرئيسي<br>
                  اللاذقية<br>
                  <abbr title="Phone">P:</abbr>0994337308
              </address>
            </div>
            <!-- /pull-left -->
            <div class="pull-right">
              <h2>فاتورة زبون</h2>
            </div>
            <!-- /pull-right -->
            <div class="clearfix"></div>
            <br>
            <div class="row">
              <div class="col-md-9">

              </div>
              <!-- /col-md-9 -->
              <div class="col-md-3">
                <br>
                <div>
                  <div class="pull-left">رقم الفاتورة:</div>
                  <div class="pull-right"></div>
                  <div class="clearfix"></div>
                </div>
                <div>
                  <!-- /col-md-3 -->
                  <div class="pull-left">تاريخ الفاتورة:</div>
                  <div class="pull-right">15/03/14</div>
                  <div class="clearfix"></div>
                </div>
                <!-- /row -->
                <br>

              </div>
              <!-- /invoice-body -->
            </div>
            <!-- /col-lg-10 -->

            <input type="text" name="search" id="search" style="display:none" autofocus/>

            <label for="search_drugs">
                أبحث عن الدواء
                <select class="js-states form-control" multiple="multiple" id="search_drugs"></select>
            </label>

            <table class="table">
                <thead>
                    <tr>
                        <th class="text-left">اسم الدواء بالعربي</th>
                        <th class="text-left">تاريخ انتهاء الصلاحية</th>
                        <th style="width:150px" class="text-center">عدد العلب</th>
                        <th style="width:150px" class="text-center">عدد الظروف</th>
                        <th style="width:150px" class="text-left">السعر المعدل للظرف</th>
                        <th style="width:150px" class="text-left">السعر المعدل للعلبة</th>
                    </tr>
                </thead>
                <tbody id="drugs">

                </tbody>
            </table>
            <hr style="border-color:#ddd;">
            <br>
            <table>
                <tbody>
                    <tr>
                        <td class="text-center"><label class="col-sm-2 col-sm-2 control-label">الخصم</label></td>
                        <td style="width:300px;"class="text-center"><input type="text" class="form-control" name="discount_amount"></td>
                        <td style="width:300px;" class="text-center"><label class=" control-label">سبب الخصم</label>  </td>
                        <td style="width:600px;" class="text-center">
                            <select class="form-control">

                            </select>
                        </td>
                        <td class="text-center">
                            <button type="button" id="submit_invoice" class="btn btn-theme" data-toggle="modal" data-target="#myModal">حفظ</button>
                        </td>
                    </tbody>
                </tr>
            </table>
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
@section('scripts')
    <script>
        document.getElementById("submit_invoice").onclick = submit_invoice;
        function submit_invoice() {
            let drugs = {
                'ids' : [],
                'packages_number' : [],
                'units_number' : [],
                'modified_drugs_package_sell_price' : [],
                'modified_drugs_unit_sell_price' : []
            };
            let table_rows = document.getElementById('drugs').children;
            for (let i = 0; i < table_rows.length; i++) {
                drugs['ids'].push(table_rows[i].children[0].innerHTML);
                drugs['packages_number'].push(table_rows[i].children[3].firstElementChild.value);
                drugs['units_number'].push(table_rows[i].children[4].firstElementChild.value);
                drugs['modified_drugs_unit_sell_price'].push(table_rows[i].children[5].firstElementChild.value);
                drugs['modified_drugs_package_sell_price'].push(table_rows[i].children[6].firstElementChild.value);
            }
            $.ajax({
                method: 'POST', // Type of response
                url: '{{ route("invoice.store") }}', // This is the url we gave in the route
                data: {
                    "_token": "{{ csrf_token() }}",
                    'drugs' : drugs,
                    'invoice_type_id' : 1}, // a JSON object to send back
                success: function(response){ // What to do if we succeed
                    console.log("ADAM");
                },
                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });
        }
    </script>
    <script>
    $(document).ready(function(){
        // Search for drug using select2
        $("#search_drugs").select2( {
            ajax: {
            url: "{{ route('drug.search') }}",
            type: "GET",
            dataType: 'json',
            data: function (params) {
                return {
                    search: params.term // search term
                };
            },
            processResults: function (response) {
                return {
                    results: response
                };
            },
            cache: true
            }
      });

      // This function will be called when a selection is made
      function fetch_drugs(drug = '')
      {
       $.ajax ({
        url:"{{ route('drug.get_repo_by_id') }}",
        method:'GET',
        data:{drug_id:drug},
        dataType:'json',
        success:function(data)
        {
            $('#drugs').append(data.table_data);
        }
       })
      }

      // The selection event
      $('#search_drugs').on("select2:select", function(e) {
          var drug = e.params.data;
          fetch_drugs(drug);
      });

      // Unselect event
      $('#search_drugs').on("select2:unselect", function(e) {
          var drug = e.params.data.text;
          var table_rows = document.getElementById('drugs').children;
          for (i = 0; i < table_rows.length; i++) {
              if (table_rows[i].children[1].innerHTML === drug) {
                  table_rows[i].remove();
              }
          }
      });
    });
    </script>
@endsection
