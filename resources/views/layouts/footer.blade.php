<div class="nk-footer">
    <div class="container-fluid">
        <div class="nk-footer-wrap">
            <div class="nk-footer-copyright">
                &copy;2023 DashLite. Template by <a href="https://softnio.com" target="_blank">Softnio</a>
            </div>
            <div class="nk-footer-links">
                <ul class="nav nav-sm">
                    <li class="nav-item dropup">
                        <a href="#" class="dropdown-toggle dropdown-indicator has-indicator nav-link text-base"
                            data-bs-toggle="dropdown" data-offset="0,10">
                            <span>English</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                            <ul class="language-list">
                                <li>
                                    <a href="#" class="language-item">
                                        <span class="language-name">English</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="language-item">
                                        <span class="language-name">Español</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="language-item">
                                        <span class="language-name">Français</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="language-item">
                                        <span class="language-name">Türkçe</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a data-bs-toggle="modal" href="#region" class="nav-link">
                            <em class="icon ni ni-globe"></em>
                            <span class="ms-1">Select Region</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- select region modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="region">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal">
                <em class="icon ni ni-cross-sm"></em>
            </a>
            <div class="modal-body modal-body-md">
                <h5 class="title mb-4">Select Your Country</h5>
                <div class="nk-country-region">
                    <ul class="country-list text-center gy-2">
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{ asset('assets/admin/images/flags/arg.png') }}" alt=""
                                    class="country-flag">
                                <span class="country-name">Argentina</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{ asset('assets/admin/images/flags/aus.png') }}" alt=""
                                    class="country-flag">
                                <span class="country-name">Australia</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{ asset('assets/admin/images/flags/bangladesh.png') }}" alt=""
                                    class="country-flag">
                                <span class="country-name">Bangladesh</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{ asset('assets/admin/images/flags/canada.png') }}" alt=""
                                    class="country-flag">
                                <span class="country-name">
                                    Canada <small>(English)</small>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{ asset('assets/admin/images/flags/china.png') }}"alt=""
                                    class="country-flag">
                                <span class="country-name">Centrafricaine</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{ asset('assets/admin/images/flags/china.png') }}"alt=""
                                    class="country-flag">
                                <span class="country-name">China</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{ asset('assets/admin/images/flags/french.png') }}" alt=""
                                    class="country-flag">
                                <span class="country-name">France</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{ asset('assets/admin/images/flags/germany.png') }}" alt=""
                                    class="country-flag">
                                <span class="country-name">Germany</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{ asset('assets/admin/images/flags/iran.png') }}" alt=""
                                    class="country-flag">
                                <span class="country-name">Iran</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{ asset('assets/admin/images/flags/italy.png') }}" alt=""
                                    class="country-flag">
                                <span class="country-name">Italy</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{ asset('assets/admin/images/flags/mexico.png') }}" alt=""
                                    class="country-flag">
                                <span class="country-name">México</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{ asset('assets/admin/images/flags/philipine.png') }}" alt=""
                                    class="country-flag">
                                <span class="country-name">Philippines</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{ asset('assets/admin/images/flags/portugal.png') }}" alt=""
                                    class="country-flag">
                                <span class="country-name">Portugal</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{ asset('assets/admin/images/flags/s-africa.png') }}" alt=""
                                    class="country-flag">
                                <span class="country-name">South Africa</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{ asset('assets/admin/images/flags/spanish.png') }}" alt=""
                                    class="country-flag">
                                <span class="country-name">Spain</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{ asset('assets/admin/images/flags/switzerland.png') }}" alt=""
                                    class="country-flag">
                                <span class="country-name">Switzerland</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{ asset('assets/admin/images/flags/uk.png') }}" alt=""
                                    class="country-flag">
                                <span class="country-name">United Kingdom</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{ asset('assets/admin/images/flags/english.png') }}" alt=""
                                    class="country-flag">
                                <span class="country-name">United State</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- .modal-content -->
    </div>
    <!-- .modla-dialog -->
</div>
<!-- .modal -->
