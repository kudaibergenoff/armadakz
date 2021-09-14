'use strict';
$( document ).ready(function () {

    // Date mask
    {
        $('.date input').mask('00.00.0000', {placeholder: "--.--.----"});
    }

    // Matherial select

    $('.mdb-select').materialSelect();

    {
        let range = $("#slider-range");
        let minPriceInput = $("#min_price");
        let maxPriceInput = $("#max_price");

        let minPrice = parseFloat(range.attr('data-min'));
        let maxPrice = parseFloat(range.attr('data-max'));

        let selectedMinPrice = minPrice;
        let selectedMaxPrice = maxPrice;

        if(range.attr('data-selected-min')) {
            selectedMinPrice = parseFloat(range.attr('data-selected-min'));
        }

        if(range.attr('data-selected-max')) {
            selectedMaxPrice = parseFloat(range.attr('data-selected-max'));
        }

        minPriceInput.val(selectedMinPrice).trigger('change');
        maxPriceInput.val(selectedMaxPrice).trigger('change');

        range.slider({
            range: true,
            orientation: "horizontal",
            min: minPrice,
            max: maxPrice,
            values: [selectedMinPrice, selectedMaxPrice],
            step: 10,

            slide: function (event, ui) {
                if (ui.values[0] == ui.values[1]) {
                    return false;
                }

                $("#min_price").val(ui.values[0]).trigger('change');
                $("#max_price").val(ui.values[1]).trigger('change');
            }
        });

        minPriceInput.change(function() {
            range.slider('values',0,$(this).val());
        });

        maxPriceInput.change(function() {
            range.slider('values',1,$(this).val());
        });
    }

    // TinyMCE

    {
        tinymce.init({
            selector: '.tinyMCE',
            plugin: 'a_tinymce_plugin',
            plugins: 'codesample code image paste link',
            a_plugin_option: true,
            a_configuration_option: 400,
            toolbar: 'undo redo removeformat | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | codesample code',
            contextmenu: false,
            language: 'ru',
            paste_data_images: true
        });

        // Validation
        let form = $('form.was-validated');

        form.on('submit', function (e) {
            let editorContent = tinymce.get('description').getContent();
            if (editorContent.length < 20)
            {
                e.preventDefault();

                $('.description .invalid-feedback').css({'display':'block'});
                $('.tox-tinymce').css({
                    'border-color' : '#dc3545'
                });
                $([document.documentElement, document.body]).animate({
                    scrollTop: $(".description").offset().top - 100
                }, 1000);
            }
        })
    }

    // Menu slide right

    {
        let menu = $('.vendor-menu');
        let button = $('.vendor__bars');

        menu.mCustomScrollbar();

        $(document).mouseup(function(e)
        {
            var container = menu;

            // if the target of the click isn't the container nor a descendant of the container
            if (!container.is(e.target) && container.has(e.target).length === 0 && menu.hasClass('active'))
            {
                button.removeClass('active');
                menu.removeClass('active');

                $('.vendor-menu__row').removeClass('active');
                $('.vendor-menu__dropdown').slideUp(200);
            }
        });

        button.on('click', function () {
            $(this).addClass('active');
            menu.addClass('active');

            $('.vendor-menu__row').removeClass('active');
            $('.vendor-menu__dropdown').slideUp(200);
        });

        if(window.matchMedia('(max-width: 768px)').matches){

            $('.vendor__user-info').on('click', function () {
                button.removeClass('active');
                menu.removeClass('active');

                $('.vendor-menu__row').removeClass('active');
                $('.vendor-menu__dropdown').slideUp(200);
            })
        }

        menu.on('mouseenter', function () {
            button.addClass('active');
        });

        menu.on('mouseleave', function () {
            $('.vendor-menu__row').removeClass('active');
            $('.vendor-menu__dropdown').slideUp(200);
            $('.vendor-menu__row-dropdown-arrow').removeClass('active');

            if ($(this).hasClass('active')) {

            } else {
                button.removeClass('active');
            }
        });

    }

    // User edit input

    function editPersonalData() {
        let userBlock = $('.user-block');

        $.each(userBlock, function () {
            let editButton = $( this ).find('.user-block__edit');
            let inputs = $( this ).find('.user-block-info__value > *:not(span), .duplicate__delete, .duplicate__add');

            editButton.on('click', function (e) {
                let form = $( this ).parents('form');

                if( $( this ).hasClass('active') ) {

                } else {
                    $( this ).addClass('active');
                    $( this ).find('span').text('Сохранить');

                    $( this ).replaceWith('<button type="submit" class="user-block__edit">' + $( this ).html() + '</button>');

                    $.each(inputs, function () {
                        let currentValue = $( this ).siblings('span');

                        if( $( this ).hasClass('user-block-info__value--no-change') ) {
                            return;
                        }

                        // else if( $( this ).hasClass('user-block-info__value--password') ) {
                        //     currentValue.fadeOut(200);
                        //
                        //     setTimeout(() => {
                        //         let cloneInput = $( this )
                        //             .clone()
                        //             .attr({
                        //                 'name':'current-password',
                        //                 'placeholder':'Текущий пароль'
                        //             })
                        //             .insertBefore($( this ))
                        //             .fadeIn(200);
                        //
                        //         $( this ).fadeIn(200);
                        //     }, 200)
                        // }
                            

                        else {
                            currentValue.fadeOut(200);

                            setTimeout(() => {
                                $( this ).fadeIn(200);
                            }, 200)
                        }
                    })
                }
            })
        })
    }

    editPersonalData();

    function deleteItem() {
        let deleteButton = $('.duplicate__delete');

        deleteButton.on('click', function () {
            let item = $( this ).parents('.duplicate__item');
            let index = parseInt($(item).attr('data-duplicate-item-id'))

            if( index !== 1) {
                $.each(item.nextAll('.duplicate__item'), function () {
                    let index = parseInt($( this ).attr('data-duplicate-item-id'));

                    index--;

                    let inputs = $( this ).find('input, select');

                    $.each(inputs, function () {
                        $( this ).attr('name', $( this ).attr('name').slice(0, -1) + index);
                    });

                    $( this ).attr('data-duplicate-item-id', index)
                });


                item.detach();
            }

        });
    }

    deleteItem();

    // Select additional social value

    function selectAdditional() {
        let wrap = $('.user-block__additional-other');

        $.each(wrap, function(){
            let select = $( this ).find('select');
            let input = $( this ).find('input');

            select.on('change', function() {
                let selectValueType = this.value;

                if( selectValueType === 'Viber' ) {
                    input
                        .attr('type','tel')
                        .unmask()
                        .val('')
                        .mask('+0 (000) 000-00-00', {placeholder: "+0 (123) 456 78 90"});
                } else if( selectValueType === 'Telegram' ) {
                    input
                        .attr('type','tel')
                        .unmask()
                        .val('')
                        .mask('+0 (000) 000-00-00', {placeholder: "+0 (123) 456 78 90"});
                } else if( selectValueType === 'WhatsApp' ) {
                    input
                        .attr('type','tel')
                        .unmask()
                        .val('')
                        .mask('+0 (000) 000-00-00', {placeholder: "+0 (123) 456 78 90"});
                } else if( selectValueType === 'Messenger' ) {
                    input
                        .attr('type','tel')
                        .unmask()
                        .val('')
                        .mask('+0 (000) 000-00-00', {placeholder: "+0 (123) 456 78 90"});
                } else if( selectValueType === 'Site' ) {
                    input
                        .unmask()
                        .val('')
                        .attr({
                            'type' : 'url',
                            'placeholder' : 'Например: www.site.com.ua'
                        })
                } else if( selectValueType === 'Skype' ) {
                    input
                        .unmask()
                        .val('')
                        .attr({
                            'type' : 'text',
                            'placeholder' : 'Логин Skype'
                        })
                } else if( selectValueType === 'ICQ' ) {
                    input
                        .unmask()
                        .val('')
                        .attr({
                            'type' : 'text',
                            'placeholder' : 'Например: 615295455'
                        })
                }
            })
        })
    }

    selectAdditional();

    // Duplicate

    {
        let wrap = $('.duplicate');

        $.each(wrap, function () {
            let $this = $( this );
            let addButton = $( this ).find('.duplicate__add');
            let ai = $( this ).attr('data-auto-increment-name');
            let removeRequired = $( this ).attr('data-duplicate-remove-required');

            addButton.on('click', function () {
                let items = $this.find('.duplicate__item'),
                    itemsLength = items.length,
                    newItemPattern = items.eq(itemsLength - 1).clone(),
                    inputs = newItemPattern.find('input:not(.select-dropdown), select'),
                    newItemIndex = parseInt(newItemPattern.attr('data-duplicate-item-id')) + 1;

                if( ai === 'false' ) {
                    $.each(inputs, function () {
                        if(removeRequired === 'true') {
                            $( this ).removeAttr('required');
                        }
                        $( this ).val('');
                        $( this ).attr('placeholder', '');
                        $( this ).siblings('span').text('Не указано');
                    });
                } else {
                    $.each(inputs, function () {
                        if(removeRequired === 'true') {
                            $( this ).removeAttr('required');
                        }
                        $( this ).attr('name', $( this ).attr('name').slice(0, -1) + newItemIndex);
                        $( this ).val('');
                        $( this ).attr('placeholder', '');
                        $( this ).siblings('span').text('Не указано');
                    });
                }

                newItemPattern.attr('data-duplicate-item-id', newItemIndex);

                items.eq(itemsLength-1).after(newItemPattern);
                let phoneInput = $('input[type=tel]');

                $.each(phoneInput, function () {
                    $(this).mask('+0 (000) 000-00-00', {placeholder: "+0 (123) 456 78 90"});
                });

                $('.user-block__edit').unbind('click');
                $('.duplicate__delete').unbind('click');
                $('.user-block-info__value .custom-select').unbind('change');
                selectAdditional();
                editPersonalData();
                deleteItem();
            });
        })
    }

    // Data Picker Initialization

    {
        let datepicker = $('.datepicker');

        $.each(datepicker, function () {
            $( this ).datepicker({
                format: 'dd.mm.yyyy',
                startDate: new Date(),
                endDate: new Date(new Date().setDate(new Date().getDate() + 5)),
                minDate: new Date(),
                maxDate: new Date(new Date().setDate(new Date().getDate() + 42)),

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
        });
    }

    // Map

    {
        let schemeBlocks = $('.svg polygon');
        let output = $('input[name="map-code"]');

        $.each(schemeBlocks, function () {
            let id = $( this ).attr('id');

            $( this ).on('click', function () {
                output.val(id);
            });
        });
    }

    // Submenu dropdown

    {
        let item = $('.vendor-menu__row--has-children');

        $.each(item, function () {
            let $this = $( this );
            let arrow = $( this ).find('.vendor-menu__row-dropdown-arrow');
            let trigger = $( this );
            let dropdown = $( this ).find('+ .vendor-menu__dropdown');

            trigger.on('click', function (e) {
                e.preventDefault();

                $this.toggleClass('active');
                arrow.toggleClass('active');
                dropdown.slideToggle(200)
            })
        });
    }

    // Vendor navigation

    {
        // Dropdowns
        let itemWithDropdown = $('.vendor__nav-item--has-children');

        $.each(itemWithDropdown, function () {
            let $this = $( this );
            let triggers = $( this ).find('.vendor__nav-item-title');

            let dropdown = $( this ).find('.vendor__nav-item-dropdown');
            let arrow = $( this ).find('.vendor__nav-item-arrow');

            triggers.on('click', function () {
                if($this.hasClass('active')) {

                } else {
                    $('.vendor__nav-item-dropdown').slideUp(200);
                    $('.vendor__nav-item-arrow').removeClass('active');
                    itemWithDropdown.removeClass('active');

                    $this.toggleClass('active');
                    arrow.toggleClass('active');
                    dropdown.slideToggle(200);
                }
            })
        })
    }

    // Products navigation

    {
        let table = $('#dt-multi-checkbox');
        let columns = table.find('thead th');
        let columnCount = table.find('thead th').length - 1;
        let tableStyle = table.attr('data-table-style');
        let columnDefs = [];
        let select = {};

        if(tableStyle !== 'default') {
            columnDefs = [
                // {
                //     data: null,
                //     defaultContent: '',
                //     orderable: false,
                //     className: 'control',
                //     targets: 0
                // },
                {
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0
                },
                {
                    orderable: false,
                    targets: [1,columnCount]
                }
            ];

            select = {
                style:    'multiple',
                selector: 'td:first-child'
            }
        }

        let arrayToExport = [];

        $.each(columns, function (index) {
            arrayToExport.push(index)
        });

        let i=0;
        let excludeColumnFromExportIds = [];
        arrayToExport.splice(0, 1);

        $.each(excludeColumnFromExportIds, function () {
            arrayToExport.splice($( this ), 1);
            i++;

        });

        arrayToExport.splice(arrayToExport.length-1, arrayToExport.length);

        table.DataTable({
            "aaSorting": [],
            "searching": true,
            "pagingType": "full_numbers",
            "language": {
                "processing": "Подождите...",
                "search": "Поиск:",
                "lengthMenu": "Показывать по _MENU_",
                "info": "Показано с _START_ до _END_ из _TOTAL_",
                "infoEmpty": "Показано с 0 до 0 из 0",
                "infoFiltered": "(отфильтровано из _MAX_ элементов)",
                "infoPostFix": "",
                "loadingRecords": "Загрузка таблицы...",
                "zeroRecords": "Данные отсутствуют.",
                "emptyTable": "В таблице отсутствуют данные",
                "paginate": {
                    "first": "<svg width=\"16\" height=\"16\" viewBox=\"0 0 16 16\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n" +
                        "<path d=\"M0.292893 7.29284C-0.097631 7.68337 -0.0976311 8.31653 0.292893 8.70706L6.65685 15.071C7.04738 15.4615 7.68054 15.4615 8.07107 15.071C8.46159 14.6804 8.46159 14.0473 8.07107 13.6568L2.41421 7.99995L8.07107 2.3431C8.46159 1.95257 8.46159 1.31941 8.07107 0.92888C7.68054 0.538355 7.04738 0.538355 6.65685 0.92888L0.292893 7.29284ZM3 6.99995H1V8.99995H3V6.99995Z\" fill=\"#282C34\"/>\n" +
                        "<path d=\"M7.29289 7.65685C6.90237 8.04738 6.90237 8.68054 7.29289 9.07107L13.6568 15.4351C14.0474 15.8256 14.6805 15.8256 15.0711 15.4351C15.4616 15.0445 15.4616 14.4114 15.0711 14.0209L9.41421 8.36396L15.0711 2.70711C15.4616 2.31658 15.4616 1.68342 15.0711 1.29289C14.6805 0.902369 14.0474 0.902369 13.6568 1.29289L7.29289 7.65685ZM10 7.36396H8V9.36396H10V7.36396Z\" fill=\"#282C34\"/>\n" +
                        "</svg>\n",
                    "previous": "<svg width=\"9\" height=\"16\" viewBox=\"0 0 9 16\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n" +
                        "                <path d=\"M0.292893 7.29289C-0.097631 7.68342 -0.0976311 8.31658 0.292893 8.70711L6.65685 15.0711C7.04738 15.4616 7.68054 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6569L2.41421 8L8.07107 2.34315C8.46159 1.95262 8.46159 1.31946 8.07107 0.928933C7.68054 0.538408 7.04738 0.538408 6.65685 0.928933L0.292893 7.29289ZM3 7L1 7L1 9L3 9L3 7Z\" fill=\"#282C34\"></path>\n" +
                        "            </svg>",
                    "next": "<svg width=\"9\" height=\"16\" viewBox=\"0 0 9 16\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n" +
                        "                <path d=\"M8.70711 8.70711C9.09763 8.31658 9.09763 7.68342 8.70711 7.29289L2.34315 0.928932C1.95262 0.538408 1.31946 0.538408 0.928932 0.928932C0.538408 1.31946 0.538408 1.95262 0.928932 2.34315L6.58579 8L0.928932 13.6569C0.538408 14.0474 0.538408 14.6805 0.928932 15.0711C1.31946 15.4616 1.95262 15.4616 2.34315 15.0711L8.70711 8.70711ZM6 9H8V7H6V9Z\" fill=\"#282C34\"></path>\n" +
                        "            </svg>",
                    "last": "<svg width=\"16\" height=\"16\" viewBox=\"0 0 16 16\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n" +
                        "<path d=\"M15.0714 9.07105C15.4619 8.68052 15.4619 8.04736 15.0714 7.65683L8.70741 1.29284C8.31688 0.902344 7.68372 0.902344 7.29319 1.29284C6.90267 1.68344 6.90267 2.31654 7.29319 2.70704L12.95 8.36394L7.29319 14.0208C6.90267 14.4113 6.90267 15.0445 7.29319 15.435C7.68372 15.8255 8.31688 15.8255 8.70741 15.435L15.0714 9.07105ZM12.3643 9.36394L14.3643 9.36394L14.3643 7.36394L12.3643 7.36394L12.3643 9.36394Z\" fill=\"#282C34\"/>\n" +
                        "<path d=\"M8.07137 8.70704C8.46189 8.31651 8.46189 7.68335 8.07137 7.29282L1.70741 0.928831C1.31688 0.53833 0.683719 0.53833 0.293189 0.92883C-0.0973307 1.31943 -0.0973307 1.95253 0.293189 2.34303L5.95005 7.99993L0.293188 13.6568C-0.0973318 14.0473 -0.0973319 14.6805 0.293188 15.071C0.683718 15.4615 1.31688 15.4615 1.70741 15.071L8.07137 8.70704ZM5.36426 8.99993L7.36426 8.99993L7.36426 6.99993L5.36426 6.99993L5.36426 8.99993Z\" fill=\"#282C34\"/>\n" +
                        "</svg>\n"
                },
                "aria": {
                    "sortAscending": ": активировать для сортировки столбца по возрастанию",
                    "sortDescending": ": активировать для сортировки столбца по убыванию"
                },
                "select": {
                    "rows": {
                        "_": "Выбрано элементов: %d",
                        "0": "",
                        "1": "Выбран один элемент"
                    }
                },
                "buttons": {
                    "copyTitle": 'Скопированно в буфер обмена',
                    "copyKeys": 'Нажмите <i>ctrl</i> или <i>\u2318</i> + <i>C</i> чтобы скопировать данные из таблицы в буфер обмена. <br><br>Для отмены щелкните на это сообщение или нажмите Esc.',
                    "copySuccess": {
                        _: 'Скопированно %d строк',
                        1: 'Скопированна 1 строка'
                    }
                }
            },
            //responsive: true,
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'csv',
                    text: 'CSV',
                    charset: 'utf-8',
                    extension: '.csv',
                    fieldSeparator: ';',
                    fieldBoundary: '',
                    bom: true,
                    exportOptions: {
                        columns: arrayToExport
                    }
                },
                {
                    extend: 'excel',
                    text: 'Excel',
                    charset: 'utf-8',
                    exportOptions: {
                        columns: arrayToExport
                    }
                }
            ],
            columnDefs: columnDefs,
            select: select
        });

        let xmlExportButton = $('.xmlExport');
        let dtButtons = $('.dt-buttons');
        
        dtButtons.addClass('d-flex align-items-center flex-wrap').prepend('<span class="mr-3">Экспорт:</span>');
        dtButtons.append(xmlExportButton.removeClass('d-none'));
        $('.dt-button').addClass('button btn-sm btn-light rounded mr-2 mt-2').removeClass('dt-button');

        $('.dataTables_length').addClass('bs-select');
    }

    // Delivery type required if checked

    {
        let deliveryStatus = $('.delivery-status');
        let deliveryTypes = $('.delivery-type');
        let deliveryTypesResponse = $('.delivery-types__response');

        deliveryStatus.parents('form').on('submit', function (e) {
            e.preventDefault();

            let $this = $( this );
            let atLeastOneIsChecked = false;

            deliveryTypes.each(function () {
                if ($(this).is(':checked')) {
                    atLeastOneIsChecked = true;

                    return false;
                }
            });

            if(deliveryStatus.is(':checked') && !atLeastOneIsChecked) {
                $([document.documentElement, document.body]).animate({
                    scrollTop:deliveryTypesResponse.offset().top
                });

                deliveryTypesResponse.text('Выберите тип доставки').slideDown(200);

                setTimeout(function () {
                    deliveryTypesResponse.slideUp(200);
                }, 3000)
            } else {
                $this.unbind('submit').submit();
            }
        })
    }

    // Show/hide password

    {
        let inputWrap = $('.show_hide_password');

        inputWrap.each(function () {
            let button = $( this ).find('a');
            let input = $( this ).find('input');
            let icon = $( this ).find('i');

            button.on('click', function (e) {
                e.preventDefault();

                if(input.attr("type") == "text"){
                    input.attr('type', 'password');
                    icon
                        .addClass( "fa-eye-slash" )
                        .removeClass( "fa-eye" );
                }else if(input.attr("type") == "password"){
                    input.attr('type', 'text');
                    icon
                        .removeClass( "fa-eye-slash" )
                        .addClass( "fa-eye" );
                }
            })
        });
    }

});