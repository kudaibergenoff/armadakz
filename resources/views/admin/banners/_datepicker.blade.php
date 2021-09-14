@php
    $start_at = isset($data) ? $data->start_at->format('d.m.Y') : now()->format('d.m.Y') ;
    $end_at = isset($data) ? $data->end_at->format('d.m.Y') : now()->addMonth()->format('d.m.Y') ;
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
        });

        $('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
            $('.graph__date span').text(picker.startDate.format('MM.DD.YY') + ' - ' + picker.endDate.format('MM.DD.YY'))
        });
    }
</script>
