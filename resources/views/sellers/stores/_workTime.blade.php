@if(isset($data) and count($data->work_times) > 0)
    @foreach($data->work_times as $work_time)
        @if($loop->first) <label class="col-12 work-time__title">Рабочее время</label> @endif
        <div class="col-6 col-md-3 select-outline">
            @if($loop->first)
                <small class="text-muted">
                    Начиная:
                </small>
            @endif
            <select class="mdb-select md-form md-outline mt-0" name="day_start[]" @if($loop->first) required @endif>
                @foreach(['','Пн','Вт','Ср','Чт','Пт','Сб','Вс'] as $day)
                    <option @if($data->date_start($work_time) == $day) selected @endif value="{{ $day }}">{{ $day }}</option>
                @endforeach
            </select>
            <label class="mdb-main-label"></label>
        </div>
        <div class="col-6 col-md-3">
            @if($loop->first)
                <small class="text-muted">
                    Заканчивая:
                </small>
            @endif
            <select class="mdb-select md-form md-outline mt-0" name="day_end[]" @if($loop->first) required @endif>
                @foreach(['','Пн','Вт','Ср','Чт','Пт','Сб','Вс'] as $day)
                    <option @if($data->date_end($work_time) == $day) selected @endif value="{{ $day }}">{{ $day }}</option>
                @endforeach
            </select>
            <label class="mdb-main-label"></label>
        </div>
        <div class="col-6 col-md-3 select-outline">
            @if($loop->first)
                <small class="text-muted">
                    С:
                </small>
            @endif
            <div class="form-row">
                <input type="text" class="form-control" placeholder="09:00" name="time_start[]" value="{{ $data->time_start($work_time) ?? '09:00' }}" @if($loop->first) required @endif>
            </div>
        </div>
        <div class="col-6 col-md-3">
            @if($loop->first)
                <small class="text-muted">
                    По:
                </small>
            @endif
            <div class="form-row">
                <input type="text" class="form-control" placeholder="18:00" name="time_end[]" value="{{ $data->time_end($work_time) ?? '18:00' }}" @if($loop->first) required @endif>
            </div>
        </div>
    @endforeach
@else
    @foreach([1] as $line)
        @if($loop->first) <label class="col-12 work-time__title">Рабочее время</label> @endif
        <div class="col-3 select-outline">
            @if($loop->first)
                <small class="text-muted">
                    Начиная:
                </small>
            @endif
            <select class="mdb-select md-form md-outline mt-0" name="day_start[]" @if($loop->first) required @endif>
                @foreach(['','Пн','Вт','Ср','Чт','Пт','Сб','Вс'] as $day)
                    <option @if($loop->iteration == 2 and $loop->parent->first) selected @endif value="{{ $day }}">@if($loop->first and !$loop->parent->first) -- @else {{ $day }} @endif</option>
                @endforeach
            </select>
            <label class="mdb-main-label"></label>
        </div>
        <div class="col-3">
            @if($loop->first)
                <small class="text-muted">
                    Заканчивая:
                </small>
            @endif
            <select class="mdb-select md-form md-outline mt-0" name="day_end[]" @if($loop->first) required @endif>
                @foreach(['','Пн','Вт','Ср','Чт','Пт','Сб','Вс'] as $day)
                    <option @if($loop->last and $loop->parent->first) selected @endif value="{{ $day }}">@if($loop->first and !$loop->parent->first) -- @else {{ $day }} @endif</option>
                @endforeach
            </select>
            <label class="mdb-main-label"></label>
        </div>
        <div class="col-3 select-outline">
            @if($loop->first)
                <small class="text-muted">
                    С:
                </small>
            @endif
            <div class="form-row">
                <input type="text" class="form-control" placeholder="09:00" name="time_start[]" value="09:00" @if($loop->first) required @endif>
            </div>
        </div>
        <div class="col-3">
            @if($loop->first)
                <small class="text-muted">
                    По:
                </small>
            @endif
            <div class="form-row">
                <input type="text" class="form-control" placeholder="18:00" name="time_end[]" value="18:00" @if($loop->first) required @endif>
            </div>
        </div>
    @endforeach
@endif
