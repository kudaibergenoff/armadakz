@extends('_layout')

@section('title','ARMADA - панель продавца' )

@section('content')
    <section class="vendor page-vendor-area__vendor container-fluid pl-0">
        <div class="d-flex">
            @include('sellers._layouts.left_menu')

            <div class="vendor__content flex-grow-1 vendor__content--panel">
                @include('sellers._layouts.header')
                <div class="panel orders vendor__panel pt-4 pb-3 p-xxl-3 pt-xxl-5 pr-0">
                    <!-- ======= Pricing Section ======= -->
                    <div id="pricing" class="pricing">

                            <div class="row">

                                <div class="col-lg-4 col-md-6">
                                    <div class="box" data-aos="fade-right">
                                    <h3>Free</h3>
                                    <h4><sup>$</sup>0<span> / month</span></h4>
                                    <ul>
                                        <li>Aida dere</li>
                                        <li>Nec feugiat nisl</li>
                                        <li>Nulla at volutpat dola</li>
                                        <li class="na">Pharetra massa</li>
                                        <li class="na">Massa ultricies mi</li>
                                    </ul>
                                    <div class="btn-wrap">
                                        <a href="#" class="btn-buy">Buy Now</a>
                                    </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 mt-4 mt-md-0">
                                    <div class="box featured" data-aos="fade-up">
                                    <h3>Business</h3>
                                    <h4><sup>$</sup>19<span> / month</span></h4>
                                    <ul>
                                        <li>Aida dere</li>
                                        <li>Nec feugiat nisl</li>
                                        <li>Nulla at volutpat dola</li>
                                        <li>Pharetra massa</li>
                                        <li class="na">Massa ultricies mi</li>
                                    </ul>
                                    <div class="btn-wrap">
                                        <a href="#" class="btn-buy">Buy Now</a>
                                    </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
                                    <div class="box" data-aos="fade-left">
                                    <h3>Developer</h3>
                                    <h4><sup>$</sup>29<span> / month</span></h4>
                                    <ul>
                                        <li>Aida dere</li>
                                        <li>Nec feugiat nisl</li>
                                        <li>Nulla at volutpat dola</li>
                                        <li>Pharetra massa</li>
                                        <li>Massa ultricies mi</li>
                                    </ul>
                                    <div class="btn-wrap">
                                        <a href="#" class="btn-buy">Buy Now</a>
                                    </div>
                                    </div>
                                </div>

                            </div>

                        </div><!-- End Pricing Section -->
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/page-vendor-area/vendor-area.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pay.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/dest/page-vendor-area/vendor-area-min.js') }}"></script>
@endpush


