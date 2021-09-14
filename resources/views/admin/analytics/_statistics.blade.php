<ul class="chart__statistics">
    <li class="chart__statistic">
        <span class="chart__statistic-title">Продажи</span>
        <span class="chart__statistic-value">{{ $salesCount }}</span>
    </li>
    <li class="chart__statistic">
        <span class="chart__statistic-title">Отказы</span>
        <span class="chart__statistic-value">{{ $salesCanceledCount }}</span>
    </li>
{{--    <li class="chart__statistic">--}}
{{--        <span class="chart__statistic-title">Выручка</span>--}}
{{--        <span class="chart__statistic-value">! 230 000 <span class="currency">тг</span></span>--}}
{{--    </li>--}}
{{--    <li class="chart__statistic">--}}
{{--        <span class="chart__statistic-title">Налоги</span>--}}
{{--        <span class="chart__statistic-value">! 45 000 <span class="currency">тг</span></span>--}}
{{--    </li>--}}
    <li class="chart__statistic">
        <span class="chart__statistic-title">% Успешных сделок</span>
        <span class="chart__statistic-value">{{ $percent }}</span>
    </li>
</ul>
