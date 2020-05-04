@extends('layouts.master')
@section('custom-css')
    <link rel="stylesheet" type="text/css" href="/css/select2.min.css" />
    <script type="text/javascript" src="/js/select2.min.js"></script>
@endsection
@section('content')
<section id="main-content">
    <section class="wrapper" >
        <h3><i class="fa fa-angle-right"></i>إضافة طلبية</h3>
        <div class="row mt" dir="rtl">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h3 class="mb"><i class="fa fa-angle-right mr"></i> معلومات</h3>
                    <div class="form-group" dir="rtl">
                        <label class="col-sm-2 control-label">تاريخ الطلبية</label>
                        <div class="col-sm-2 ">
                            <input type="date" class="form-control" id="date">
                        </div>
                        <label class="col-sm-2 col-sm-2 control-label">الشركة</label>
                        <div class="col-sm-2">
                            <select id="company_id" class="form-control">
                                <option   value="" selected></option>
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="col-sm-2 col-sm-2 control-label">المستودع</label>
                        <div class="col-sm-2">
                            <select class="form-control" id="warehouse_id">
                                <option value="" selected></option>
                                @foreach($warehouses as $warehouse)
                                    <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <br>
                    <hr>
                    <br>
                    <div class="form-group" dir="rtl">


                        <label class="col-sm-2 control-label" for="search_drugs">
                            أبحث عن الدواء
                        </label>
                      <div class="col-sm-4">
                        <select class="js-states form-control " multiple="multiple" id="search_drugs"></select>
                      </div>
                    </div>
                    <br>
                    <br>
                    <br>

                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-left">اسم الدواء بالعربي</th>
                                <th class="text-left">تاريخ انتهاء الصلاحية</th>
                                <th  class="text-center">عدد العلب المتوفرة</th>
                                <th  class="text-center">عدد الظروف المتوفرة</th>
                                <th  class="text-center">عدد العلب المراد طلبها</th>
                                <th  class="text-center">عدد الظروف المراد طلبها</th>
                            </tr>
                        </thead>
                        <tbody id="drugs">
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-theme" id="submit_order">إضافة طلبية</button>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection

@section('scripts')
    <script>
        document.getElementById("submit_order").onclick = submit_order;
        function submit_order() {
            let drugs = {
                'ids' : [],
                'packages_number' : [],
                'units_number' : []
            };
            let table_rows = document.getElementById('drugs').children;
            for (let i = 0; i < table_rows.length; i++) {
                drugs['ids'].push(table_rows[i].children[0].innerHTML);
                drugs['packages_number'].push(table_rows[i].children[5].firstElementChild.value === "" ? 0 : table_rows[i].children[5].firstElementChild.value);
                drugs['units_number'].push(table_rows[i].children[6].firstElementChild.value === "" ? 0 : table_rows[i].children[6].firstElementChild.value);
            }
            let date = document.getElementById('date').value;
            console.log(date);
            let supplier_id = null;
            let company_id = document.getElementById("company_id");
            let warehouse_id = document.getElementById("warehouse_id");
            let company_id_option = company_id.options[company_id.selectedIndex].value;
            let warehouse_id_option = warehouse_id.options[warehouse_id.selectedIndex].value;
            if (company_id_option != "") {
                supplier_id = company_id_option;
            }
            else {
                supplier_id = warehouse_id_option;
            }
            $.ajax({
                method: 'POST', // Type of response
                url: '{{ route("invoice.store") }}', // This is the url we gave in the route
                data: {
                    "_token": "{{ csrf_token() }}",
                    'drugs' : drugs,
                    'date' : date,
                    'supplier_id' : supplier_id,
                    'invoice_type_id' : 2}, // a JSON object to send back
                success: function(response){ // What to do if we succeed
                    window.location.href = "/orders";
                },
                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                    alert("حدث خطأ أثناء عملية استقبال فاتورة الشراء");
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });
        }
    </script>
    <script>
        $(document).ready(function() {
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
            url:"{{ route('drug.get_repo_by_id_for_order') }}",
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
