@php
    $start = isset($_GET['start']) ? explode('.',$_GET['start']) : null;
    $start_at = $start != null ? $start[1].'.'.$start[0].'.'.$start[2] : now()->addMonth(-1)->format('d.m.Y') ;
    $end = isset($_GET['end']) ? explode('.',$_GET['end']) : null;
    $end_at = $end != null ? $end[1].'.'.$end[0].'.'.$end[2] : now()->format('d.m.Y') ;
@endphp
{{--@dd($start_at,$end_at)--}}
<script>
    // Data Picker Initialization
    {
        $('.datepicker').datepicker({
            format: 'dd.mm.yyyy',

            monthsFull: ['Январь', 'Февраль', 'Март', 'Апрель', 'Мая', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
            monthsShort: ['Янв', 'Февр', 'Март', 'Апр', 'Май', 'Июнь', 'Июль', 'Авг', 'Сент', 'Окт', 'Ноя', 'Дек'],
            weekdaysFull: ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье'],
            weekdaysShort: ['ПН', 'ВТ', 'СР', 'ЧТ', 'ПТ', 'СБ', 'ВС'],

            labelMonthNext: 'След. месяц',
            labelMonthPrev: 'Пред. месяц',
            labelMonthSelect: 'Выбрать месяц',
            labelYearSelect: 'Выбрать год',

            today: 'Сегодня',
            clear: 'Очистить',
            close: 'Закрыть',

        });
    }

    // Date range picker

    {
        moment.locale('ru', {
            monthsShort : 'Янв._Февр._Март_Апр._Май_Июнь_Июль._Арг._Сент._Окт._Ноя._Дек.'.split('_'),
            monthsParseExact : true,
        });

        $('input.picker__input').daterangepicker({
            autoApply: false,
            {{--alert(@json($start_at));--}}
            startDate: @json($start_at),
            endDate: @json($end_at),

            opens: 'left',
            locale: {
                "format": 'DD.MM.YYYY',
                "applyLabel" : "Применить",
                "cancelLabel" : "Отменить",
                "yearLabel" : "г.",
                "daysOfWeek" : [
                    "ПН",
                    "ВТ",
                    "СР",
                    "ЧТ",
                    "ПТ",
                    "СБ",
                    "ВС"
                ],
                "monthNames" : [
                    "Январь",
                    "Февраль",
                    "Март",
                    "Апрель",
                    "Май",
                    "Июнь",
                    "Июль",
                    "Август",
                    "Сентябрь",
                    "Октябрь",
                    "Ноябрь",
                    "Декабрь"
                ]
            },
        }).on('apply.daterangepicker', function(ev, picker) {
            let route = $( this ).attr('data-route');

            let startDate = 'start=' + picker.startDate.format('MM.DD.YY');
            let endDate = 'end=' + picker.endDate.format('MM.DD.YY');

            if(route.includes('?')) {
                route = route.concat('&' + startDate);
            }else{
                route = route.concat('?' + startDate);
            }

            route = route.concat('&' + endDate);

            window.location.href = route;
        });

        $('input.picker__input').datarangepicker.getRange();

        $('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
            $('.graph__date span').text(picker.startDate.format('MM.DD.YY') + ' - ' + picker.endDate.format('MM.DD.YY'))
        });
    }
</script>
