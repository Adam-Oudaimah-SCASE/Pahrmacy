@extends('layouts.master')
@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row mt">
            <div class="col-md-12">
                <div class="content-panel">
                    <table class="table table-striped table-advance table-hover">
                        <h3 class="mr"><i class="fa fa-angle-left"></i> تفاصيل الدواء</h3>
                        @foreach($drugs->repo as $drug)
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-left">اسم الدواء</th>
                                    <th class="text-left">الاسم الاجنبي للدواء</th>
                                    <th class="text-left">حجم العبوة </th>
                                    <th class="text-left"> الشركة</th>
                                    <th class="text-left">الصنف </th>
                                    <th class="text-left">الشكل </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <td> {{ $drug->drug->name_arabic }}</td>
                                    <td>{{ $drug->drug->name_english }}</td>
                                    <td>{{ $drug->drug->volume_unit }}</td>
                                    <td>{{ $drug->drug->company->name }}</td>
                                    <td>{{ $drug->drug->category->name }}</td>
                                    <td>{{ $drug->drug->shape->name }}</td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <th class="text-left">عدد الواحدة </th>
                                    <th class="text-left">عدد الوحدات </th>
                                    <th class="text-left"> عدد العلب</th>
                                    <th class="text-left">تاريخ الانتاج</th>
                                    <th class="text-left">تاريخ انتهاء الصلاحية </th>
                                    <th class="text-left"> رقم الترخيص الخاص بالمنتج الدوائي </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <td> {{ $drug->unit_number }}</td>
                                    <td> {{ $drug->units_number }}</td>
                                    <td>{{ $drug->packages_number }}</td>
                                    <td>{{ $drug->pro_date }}</td>
                                    <td>{{ $drug->exp_date }}</td>
                                    <td>{{ $drug->drug->lic_palte }}</td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <th class="text-left">السعر الصافي للعلبة </th>
                                    <th class="text-left"> سعر المبيع للعلبة</th>
                                    <th class="text-left"> السعر الصافي للظرف</th>
                                    <th class="text-left"> سعر المبيع للظرف </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> {{ $drug->package_net_price }}</td>
                                    <td>{{ $drug->package_sell_price }}</td>
                                    <td>{{ $drug->unit_net_price }}</td>
                                    <td>{{ $drug->unit_sell_price }}</td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                </div>
            </div>
        </div>
    </section>
</section>