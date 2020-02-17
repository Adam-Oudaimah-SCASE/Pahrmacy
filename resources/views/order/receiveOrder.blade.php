@extends('layouts.master')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<section id="main-content">
    <section class="wrapper" >
        <h3><i class="fa fa-angle-right"></i>استلام طلبية</h3>
        <div class="row mt" dir="rtl">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class="mb"><i class="fa fa-angle-right"></i>معلومات</h4>
                    <form class="form-horizontal style-form" >
                    {{ csrf_field() }}
                        <div class="form-group" dir="rtl">
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" name="invoice_type_id" value="3">
                            </div>
                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-left">اسم الدواء بالعربي </th>
                                    <th style="width:200px" class="text-left">عدد الوحدات ضمن العلبة</th>
                                    <th style="width:200px" class="text-left">عدد الوحدات</th>
                                    <th style="width:200px" class="text-center">عدد العلب</th>
                                    <th style="width:200px" class="text-left">سعر المبيع للعلبة</th>
                                    <th style="width:200px" class="text-center">السعر الصافي للعلبة</th>
                                    <th style="width:200px" class="text-left">سعر المبيع للظرف</th>
                                    <th style="width:200px" class="text-left">السعر الصافي للظرف</th>
                                </tr>
                            </thead>
                            <tbody id="drugs">
                                <tr>
                                    <td id="1">Flat Pack Heritage</td>
                                    <td class="text-center" id="unit_number1"><input type="text" class="unit_number" value="1"></td>
                                    <td class="text-center" id="units_number1"><input type="text" class="form-control" name="units_number" ></td>
                                    <td class="text-center" id="packages_number1"><input type="text" class="form-control" name="packages_number"></td>
                                    <td class="text-center" id="package_sell_price1"><input type="text" class="form-control" name="package_sell_price"></td>
                                    <td class="text-center" id="package_net_price1"><input type="text" class="form-control" name="package_net_price"></td>
                                    <td class="text-center" id="unit_sell_price1"><input type="text" class="form-control" name="unit_sell_price"></td>
                                    <td class="text-center" id="unit_net_price1"><input type="text" class="form-control" name="unit_net_price"></td>
                                </tr>
                                <tr>
                                    <td id="2">Flat Pack Heritage</td>
                                    <td class="text-center" id="unit_number2"><input type="text" class="unit_number" value="2"></td>
                                    <td class="text-center" id="units_number2"><input type="text" class="form-control" name="units_number"></td>
                                    <td class="text-center" id="packages_number2"><input type="text" class="form-control" name="packages_number"></td>
                                    <td class="text-center" id="package_sell_price2"><input type="text" class="form-control" name="package_sell_price"></td>
                                    <td class="text-center" id="package_net_price2"><input type="text" class="form-control" name="package_net_price"></td>
                                    <td class="text-center" id="unit_sell_price2"><input type="text" class="form-control" name="unit_sell_price"></td>
                                    <td class="text-center" id="unit_net_price2"><input type="text" class="form-control" name="unit_net_price"></td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-theme" onclick="myFunction()">إضافة</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection
