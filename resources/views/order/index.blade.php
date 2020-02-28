@extends('layouts.master')
@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row mt">
            <div class="col-md-12">
                <div class="content-panel">
                   <div class="adv-table">
                        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered"
                            id="hidden-table-info">
                            <h3><i class="fa fa-angle-left mr"></i> الطلبيات</h3>
                            <a type="submit" class="btn btn-theme mr" href="{{ route('order.create') }}"
                                >إضافة طلبية</a>
                            <hr>
                            <thead>
                                <tr>
                                    <th><i class="fa fa-barcode ml"></i>رقم الطلبية</th>
                                    <th><i class="fa fa-calendar ml"></i>تاريخ الطلبية</th>
                                    <th><i class="fa fa-info ml"></i>معلومات الاستلام</th>
                                    <th><i class="fa fa-map ml"></i>مصدر الطلبية</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach($orders as $order)
                                    <td>{{ $order->id }}</td>
                                    <td>{{ date('d-m-Y', strtotime($order->date)) }}</td>
                                    @if($order->is_delivered == 0)
                                        <td>لم يتم استلام الطلبية بعد</td>
                                    @else
                                        <td>تم الاستلام</td>
                                    @endif
                                    <td>{{ $order->orderable()->get()[0]->name }}</td>
                                    <td>
                                        <button class="btn btn-success btn-xs" onclick="window.location.href = '{{ route('order.receive', $order->id) }}';"><i class="fa fa-check"></i></button>
                                        <a href=""><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                        <form class="delete-form" action="" method="">
                                            <button class="btn btn-danger btn-xs" onClick="alert('are you sure')"><i class="fa fa-trash-o "></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection
