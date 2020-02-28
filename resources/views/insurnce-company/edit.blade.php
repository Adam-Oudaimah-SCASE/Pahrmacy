@extends('/layouts.master')
@section('content')
<section id="main-content">
    <section class="wrapper" dir="rtl">
        <h3><i class="fa fa-angle-right"></i> تعديل معلومات شركة تأمين</h3>
        <div class="row mt" dir="rtl">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class="mb"><i class="fa fa-angle-right"></i>معلومات الشركة</h4>
                    <form action="{{ route('insurnce-company.update', $inscompanies->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                        <div class="form-group" dir="rtl">
                            <label class="col-sm-2 col-sm-2 control-label">اسم الشركة:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" value="{{ $inscompanies->name }}">
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">رقم الهاتف</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="phone" value="{{ $inscompanies->phone }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">العنوان</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="address" value="{{ $inscompanies->address }}">
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">البريد الالكتروني</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" value="{{ $inscompanies->email }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">الخصم</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="discount" value="{{ $inscompanies->discount }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-theme">تعديل</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection
