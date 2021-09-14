@extends('_layout')

@section('title','ARMADA - Аналитика' )

@section('content')
    <section class="vendor page-vendor-area__vendor container-fluid pl-0">
        <div class="d-flex">
{{--            @include('sellers.products._filters')--}}
            @include('admin._layouts.left_menu')

            <div class="vendor__content flex-grow-1 vendor__content--products">
                @include('admin._layouts.header')
                <div class="shops orders vendor__shops pt-4 pb-3 p-xxl-3 pt-xxl-5 pr-0">
                    <div class="analytics__header justify-content-between">
                        <h2 class="analytics__title page-title">Аналитика</h2>
                        <div class="d-flex flex-wrap">
                            @php $get['start'] = $_GET['start'] ?? null; $get['end'] = $_GET['end'] ?? null; @endphp
                            <div class="mr-3">
                                <select name="store" id="store" class="mdb-select md-form" searchable="Поиск.." onchange="window.location.href=this.options[this.selectedIndex].value">
                                    <option value="{{ route('admin.analytics',$get) }}" @if(!isset($_GET['store'])) selected @endif>Все</option>
                                    @foreach($stores as $store)
                                        @php $get['store'] = $store->id; @endphp
                                        <option value="{{ route('admin.analytics',$get) }}" @if(isset($_GET['store']) and $_GET['store'] == $store->id) selected @endif>{{ $store->title }}</option>
                                    @endforeach
                                </select>
                                <label for="store" class="mdb-main-label">Магазин</label>
                            </div>
                            @php $get['start'] = null; $get['end'] = null; $get['store'] = $_GET['store'] ?? null; @endphp
                            <div class="analytics__date">
                                {{-- <input type="text" name="daterange" class="picker__input" value="Выберите период..." /> --}}
                                @include('layouts.forms.input',[
                                        'name'=>'period',
                                        'class'=>'form-control picker__input bg-light',
                                        'placeholder'=>'Выберите период...',
                                        'label'=>'Период',
                                        'required'=>true,
                                        'data_attributes' => [ 'data-route' => route('admin.analytics',$get) ]
                                    ])
                            </div>
                        </div>
                    </div>
                    @include('admin.analytics._tabs')
                    <div class="chart analytics__chart analytics__block-style">
                        @include('admin.analytics._graph')
                        @include('admin.analytics._statistics')
                    </div>
                    <div class="row">
                        @include('admin.analytics._new_clients')
                        @include('admin.analytics._assortment_analysis')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/page-vendor-area/vendor-area.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/dest/page-vendor-area/vendor-area-min.js') }}"></script>

    @include('admin.analytics._datepicker')

    <script>
        // MDB Chart

        {
            //line
            var ctxL = document.getElementById("lineChart").getContext('2d');
            var gradientFill = ctxL.createLinearGradient(0, 0, 360, 0);
            gradientFill.addColorStop(0, "rgba(55, 81, 255, .1)");
            gradientFill.addColorStop(1, "rgba(55, 81, 255, 0)");

            var myLineChart = new Chart(ctxL, {
                type: 'line',
                data: {
                    labels: @json($labels),//["22.12", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13"],
                    datasets: [
                        {
                            data: @json($ordersCount),//[12,0,28,30,28,30,32,40,51,35,18,25],
                            backgroundColor: gradientFill,
                            borderColor: [
                                '#3751FF',
                            ],
                            borderWidth: 2,
                            pointBorderColor: "transparent",
                            pointBackgroundColor: "transparent",
                        },
                        // {
                        //     data: [31,32,28,24,24,28,32,33,31,25,20,17],
                        //     backgroundColor: [
                        //         'rgba(0,0,0,0)',
                        //     ],
                        //     borderColor: [
                        //         '#DFE0EB',
                        //     ],
                        //     borderWidth: 2,
                        //     pointBorderColor: "transparent",
                        //     pointBackgroundColor: "transparent",
                        // }
                    ]
                },
                options: {
                    responsive: true,
                    fontFamily: "Gotham Pro",
                    fontSize: "9px",
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }],
                        xAxes: [{
                            gridLines: {
                                display: false
                            }
                        }],
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        enabled: false
                    }
                }
            });
        }
    </script>
@endpush


