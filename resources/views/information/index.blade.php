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
                            <h3><i class="fa fa-angle-left  mr"></i> معلومات الصيدليات</h3>
                            <a type="submit" class="btn btn-theme  mr" href="{{ route('information.create') }}">إضافة صيدلية</a>
                            <hr>
                            <thead>
                                <tr>
                                    <th ><i class="fa fa-bullhorn ml"></i>اسم الصيدلي</th>
                                    <th class="hidden-phone "><i class="fa fa-question-circle ml"></i>رقم الهاتف</th>
                                      <th><i class="fa fa-bullhorn ml"></i>اسم الصيدلية</th>
                                    <th><i class="fa fa-bookmark ml"></i>العنوان</th>
                                    <th><i class=" fa fa-edit ml"></i>رقم الترخيص</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach($info as $info)
                                    <td>{{ $info->owner}}</td>
                                    <td>{{ $info->phone }}</td>
                                    <td>{{ $info->pharmacy_name }}</td>
                                    <td>{{ $info->address }}</td>
                                    <td>{{ $info->lic_plate }}</td>
                                    <td>
                                        <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                        <a href="{{ route('information.edit', $info->id) }}"><button
                                                class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                        <form class="delete-form" action="{{ route('information.destroy', $info->id) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-xs" onClick="alert('are you sure')"><i
                                                    class="fa fa-trash-o "></i></button>
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
