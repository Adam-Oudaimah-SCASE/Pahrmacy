@extends('layouts.master')
@section('content')
<section id="main-content">
    <section class="wrapper" >
        <h3><i class="fa fa-angle-right"></i>عرض طلبية</h3>
        <div class="row mt" dir="rtl">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class="mb"><i class="fa fa-angle-right"></i>   رقم الطلبية {{ $order->id }}</h4>
                    <h3>تم الاستلام</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-left">المطلوب</th>
                                <th class="text-left">المستلم</th>
                            </tr>
                        </thead>
                        <tbody id="drugs">
                            @foreach($order->drugs()->get() as $drug)
                            <tr>
                             
                                <td hidden>{{ $drug->drug()->first()->id }}</td>
                                <td>{{ $drug->drug()->first()->name_arabic }}</td>
                                <td>
                                <table>
                                <thead>
                                <tr>
                                <th>عدد العلب </th>
                                <th></th>
                                <th>عدد الظروف</th>
                                </tr>
                                </thead>
                                <tbody>
                                <td>{{ $drug->ordered_packages_number }}</td>
                                <td>{{ $drug->ordered_units_number }}</td>
                                </tbody>
                                </table>
                                @endforeach
                                </td>
                                <td>
                                <table>
                                <thead>
                                <tr>
                                <th>عدد العلب </th>
                                <th></th>
                                <th>عدد الظروف</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order->drugs_receive()->get() as $drug)
                                <td>{{ $drug->recieved_packages_number }}</td>
                                <td>{{ $drug->recieved_units_number }}</td>
                                </tbody>
                                </table>
                                </td>
                          @endforeach
                            </tr>
                          
                        </tbody>
                    </table>
                  
                </div>
            </div>
        </div>
    </section>
</section>
@endsection
@section('scripts')
    <script>
        document.getElementById("submit_receive").onclick = submit_receive;
        function submit_receive() {
            let drugs = {
                'ids' : [],
                'unit_number' : [],
                'packages_number' : [],
                'units_number' : [],
                'package_net_price' : [],
                'unit_net_price' : [],
                'package_sell_price' : [],
                'unit_sell_price' : [],
                'expiration_date' : [],
                'production_date' : []
            };
            let table_rows = document.getElementById('drugs').children;
            for (let i = 0; i < table_rows.length; i++) {
                drugs['ids'].push(table_rows[i].children[0].innerHTML);
                drugs['unit_number'].push(table_rows[i].children[4].firstElementChild.value);
                drugs['units_number'].push(table_rows[i].children[5].firstElementChild.value);
                drugs['packages_number'].push(table_rows[i].children[6].firstElementChild.value);
                drugs['package_sell_price'].push(table_rows[i].children[7].firstElementChild.value);
                drugs['package_net_price'].push(table_rows[i].children[8].firstElementChild.value);
                drugs['unit_sell_price'].push(table_rows[i].children[9].firstElementChild.value);
                drugs['unit_net_price'].push(table_rows[i].children[10].firstElementChild.value);
                drugs['production_date'].push(table_rows[i].children[11].firstElementChild.value);
                drugs['expiration_date'].push(table_rows[i].children[12].firstElementChild.value);
            }
            let net_price = document.getElementById('net_price').value;
            $.ajax({
                method: 'POST', // Type of response
                url: '{{ route("invoice.store") }}', // This is the url we gave in the route
                data: {
                    "_token": "{{ csrf_token() }}",
                    'drugs' : drugs,
                    'net_price' : net_price,
                    'order_id' : {{ $order->id }},
                    'invoice_type_id' : 3}, // a JSON object to send back
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
@endsection
