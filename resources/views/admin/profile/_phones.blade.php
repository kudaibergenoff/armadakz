@if(is_array($user->phones) and count($user->phones) > 0)
    @foreach($user->phones as $phone)
        <li class="user-block-info user-block__item col-12 col-md-6 col-xl-4">
            <div class="user-block-info__name">Телефон</div>
            <div class="user-block-info__value">
                <input type="tel" class="form-control" name="phones[]" value="{{ $phone }}" placeholder="+x (xxx) xxx-xx-xx" @if($loop->first) required @endif>
                <span>{{ $phone ?? 'Не указан' }}</span>
            </div>
        </li>
    @endforeach
    @for($i = count($user->phones);$i < 2; $i++)
        <li class="user-block-info user-block__item col-12 col-md-6 col-xl-4">
            <div class="user-block-info__name">Телефон</div>
            <div class="user-block-info__value">
                <input type="tel" class="form-control" name="phones[]" placeholder="+x (xxx) xxx-xx-xx" @if($i == 1) required @endif>
                <span>Не указан</span>
            </div>
        </li>
    @endfor
@else
    @foreach([1,2] as $phone)
        <li class="user-block-info user-block__item col-12 col-md-6 col-xl-4">
            <div class="user-block-info__name">Телефон</div>
            <div class="user-block-info__value">
                <input type="tel" class="form-control" name="phones[]" placeholder="+x (xxx) xxx-xx-xx" @if($loop->first) required @endif>
                <span>Не указан</span>
            </div>
        </li>
    @endforeach
@endif
