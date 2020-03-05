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
                            @foreach($order->drugs_receive()->get() as $drug)
                            <tr>
                             
                              
                                <td>
                                <table>

                                <tbody>
                                <td>{{ $drug->drug_send()->ordered_packages_number }}</td>
                                <td>{{ $drug->drug_send()->ordered_units_number }}</td>
                                
                                </tbody>
                                </table>
                                </td>
                                <td>
                                <table>
                              
                                <tbody>
                            
                                
                                <td>{{ $drug->recieved_packages_number }}</td>
                                <td>{{ $drug->recieved_units_number }}</td>
                                </tbody>
                                </table>
                                </td>
                             
                            </tr>
                          
                        </tbody>
                    </table>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
</section>
@endsection


