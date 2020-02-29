@extends('layouts.master')
@section('content')
<section id="main-content">
    <section class="wrapper" >
        <h3><i class="fa fa-angle-right"></i>تسديد دفعة</h3>
        <div class="row mt" dir="rtl">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> معلومات</h4>
                    <form class="form-horizontal style-form" action="{{ route('.store') }}" method="POST">
                    @csrf
                        <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label">المبلغ المراد </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="desc" oninvalid="this.setCustomValidity('هذا الحقل إلزامي')" onchange="this.setCustomValidity('')"  required>
                            </div>
                        </div>
                        <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label">الفاتورة</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="invoice_id">
                                    @foreach($invoices as $invoice)
                                    <option value="{{$invoice->id }}">{{ $invoice->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-theme">تسديد الدفعة</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection
