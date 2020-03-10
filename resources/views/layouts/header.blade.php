<!--header start-->
<header class="header black-bg">
    <div class="sidebar-toggle-box">
    <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation" ></div>
    </div>
    <!--logo start-->
    <a href="index.html" class="logo">
        <!-- <img src="" style="width:70px;height:70px;" />-->
    </a>
    <!--logo end-->

    <div class="top-menu">
        <ul class="nav pull-right top-menu ml-auto">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
                <a class="nav-link logout" href="{{ route('login') }}">{{ __('تسجيل الدخول') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link logout " href="{{ route('register') }}">{{ __('حساب جديد') }}</a>
                </li>
            @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle logout" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
          @endguest
      </ul>
    </div>
</header>
<!--header end-->
<!-- **********************************************************************************************************************************************************
    MAIN SIDEBAR MENU
    *********************************************************************************************************************************************************** -->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered">
                <a href="profile.html">
                    <div class="img-container">
                        <img src="/img/logo.png" class="img-circle" width="80">
                    </div>
                </a>
            </p>
            <h5 class="centered">NODES PHARMA</h5>
            <li class="mt">
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-plus-square"></i>
                        <span>الصيدلية</span>
                    </a>
                    <ul class="sub">
                        <li><a href="#">معلومات الصيدلية</a></li>
                        <li><a href="#">الموظفين</a></li>
                        <li><a href="#">الحالة المالية</a></li>
                        <li><a href="#"></a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-flask"></i>
                        <span>الأدوية</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('drug.index') }}">عرض الادوية</a></li>
                        <li><a href="{{ route('category.index') }}">الأقسام</a></li>
                        <li><a href="{{ route('shape.index') }}">الأصناف الدوائية</a></li>
                        <li><a href="#">تقرير مبيعات الأقسام</a></li>
                        <li><a href="#">تقرير الأدوية الحالية</a></li>
                        <li><a href="#">تقرير كميات الادوية المنتهية الصلاحية</a></li>
                        <li><a href="#">تقرير الأدوية منتهية الصلاحية</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-building-o"></i>
                        <span>الشركات</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('company.index') }}">الشركات المنتجة</a></li>
                        <li><a href="{{ route('insurnce-company.index') }}">شركات التأمين</a></li>
                        <li><a href="{{ route('report.companies') }}">تقرير أدوية الشركة</a></li>
                        <li><a href="{{ route('report.companies.sales') }}">تقرير مبيعات الشركات</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-archive"></i>
                        <span>المستودعات</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('warehouse.index') }}">المستودعات الموجودة</a></li>
                        <li><a href="#">تقرير مستودعات</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-calculator"></i>
                        <span>الفواتير</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('invoice.create') }}">فاتورة مبيعات</a></li>
                        <li><a href="{{ route('order.create') }}">فاتورة مشتريات</a></li>
                        <li><a href="{{ route('order.index') }}">عرض فواتير الشراء</a></li>
                        <li><a href="{{ route('invoice.create_with_insurance') }}">فاتورة بيع مع تأمين</a></li>
                        <li><a href="#">فاتورة مرتجع</a></li>
                        <li><a href="#">فاتورة تالف</a></li>
                        <li><a href="{{ route('report.daily.sales') }}">تقرير يومية المبيعات</a></li>
                        <li><a href="#">تقرير أجمالي مبيعات خلال فترة</a></li>
                        <li><a href="{{ route('report.orders') }}">تقرير اجمالي مشتريات خلال فترة</a></li>
                        <li><a href="#">تقرير الأرباح خلال فترة</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-briefcase"></i>
                        <span>الصندوق</span>
                    </a>
                    <ul class="sub">
                        <li><a href="#">المصروف</a></li>
                        <li><a href="#">مبيعات خلال فترة معينة</a></li>
                        <li><a href="#">مدفوعات خلال فترة معينة</a></li>
                        <li><a href="#">تقرير شهري</a></li>
                        <li><a href="#">تقرير يومي</a></li>
                        <li><a href="#">تقرير سنوي</a></li>
                    </ul>
                    <li>
                        <a href="#">
                            <i class="fa fa-gears"></i>
                            <span>الدعم التقني</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-group"></i>
                            <span>من نحن</span>
                        </a>
                    </li>
                </li>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
