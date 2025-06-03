<div class="nk-block-head-content">
    <h3 class="nk-block-title page-title">{{ $breadcrumb->title }}</h3>
    <div class="nk-block-des text-soft">
<<<<<<< HEAD
        <p>{{ $breadcrumb->subtitle[0]}}</p>
=======
        <p>{{ $breadcrumb->subtitle }}</p>
>>>>>>> 10eec9551813a6c8ca89cdf63cbebbf1af298bb2
    </div>
</div>
<!-- .nk-block-head-content -->
<div class="nk-block-head-content">
    <div class="toggle-wrap nk-block-tools-toggle">
        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu">
            <em class="icon ni ni-more-v"></em>
        </a>
        <div class="toggle-expand-content" data-content="pageMenu">
            <ul class="nk-block-tools g-3">
                @yield('action')
            </ul>
        </div>
    </div>
</div>
