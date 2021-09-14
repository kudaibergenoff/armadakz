<div class="content-wrapper mt-2">
    <section class="content">
        <div class="row" id="editor">
            <div class="col-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        {{ $create ?? '' }}

                        {{ $cardTitle ?? ''}}

                        <div class="card-tools">
                            <!-- Свёртывание -->
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-tooltip="tooltip" data-html="true" title="Свернуть таблицу"><i class="fas fa-minus"></i></button>
                            <!-- Максимальный размер -->
                            <button type="button" class="btn btn-tool" data-card-widget="maximize" data-tooltip="tooltip" data-html="true" title="Развернуть таблицу"><i class="fas fa-expand"></i></button>
                            <!-- Закрытие -->
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-tooltip="tooltip" data-html="true" title="Закрыть таблицу"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        {{ $cardBody }}
                    </div>
                    @isset($cardFooter)
                        <div class="card-footer">
                            {{ $cardFooter }}
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </section>
</div>
