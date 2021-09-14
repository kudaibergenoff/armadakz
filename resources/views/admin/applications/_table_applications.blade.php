<tr>
    <td></td>
    <td>
        @if($application->status == 2)
            <div class="products__status products__status--active">Обработана</div>
        @else
            <div class="products__status products__status--disabled">Новая</div>
        @endif
    </td>
    <td>
        <p>{{ $application->organization }}</p>
        <p>{{ $application->name }}</p>
        <p>{{ $application->position }}</p>
    </td>
    <td>
        <p>{{ $application->phone }}</p>
        <p>{{ $application->site }}</p>
    </td>
    @if(!isset($_GET['type']) or $_GET['type'] != 'rent')
        <td>
            @if($application->ad_type1 != 0)
                <p>Реклама в торговом комплексе</p>
            @endif
            @if($application->ad_type2 != 0)
                <p>Реклама на сайте</p>
            @endif
            @if($application->ad_type3 != 0)
                <p>Аудио-видео реклама</p>
            @endif
        </td>
    @endif
    @if(isset($_GET['type']) and $_GET['type'] == 'rent')
        <td class="text-center">
            @if($application->type == 'rent')
                {{ $application->size_from }} - {{ $application->size_to }}
            @endif
        </td>
        <td>
            @if($application->type == 'rent')
                <b>Вид товара:</b> {{ $application->product_type ?? '--' }}<br>
                <b>Срок на рынке:</b> {{ $application->lifetime ?? '--' }}<br>
                <b>Завод производитель:</b> {{ $application->factory ?? '--' }}<br>
                <b>Вид заказчика:</b> {{ $application->customer_type_id  ?? '--' }}<br>
                <b>Представлен ли товар в «ARMADA»?:</b> {{ $application->present_type ?? '--' }}<br>
                <b>Классификация товара:</b> {{ $application->product_class ?? '--' }}<br>
                <b>Монтажные работы:</b> {{ $application->assembly_work ?? '--' }}<br>
                <b>Примечание:</b> {{ $application->note ?? '--' }}
            @endif
        </td>
    @endif
    <td class="text-center">
        {{ $application->created_at }}
    </td>
    <td class="text-center" style="width: 200px;">
        <form action="{{ route('admin.applications.update',$application->id) }}" method="POST" enctype="multipart/form-data" class="js-change-order-status"><!-- ['id'=>$application->id] -->
            @method('PATCH')
            @csrf
            <select name="status" class="mdb-select md-form mx-3 my-0">
                <option value="0" selected disabled>Изменить статус</option>
                <option value="1">Новая</option>
                <option value="2">Обработанная</option>
            </select>
        </form>
{{--        <button class="products-table__delete">--}}
{{--            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                <rect width="30" height="30" rx="3" fill="#E0001A"/>--}}
{{--                <path d="M21.9641 6.85707H18.4284V6.21422C18.4284 5.15081 17.5632 4.28564 16.4998 4.28564H13.9284C12.865 4.28564 11.9998 5.15081 11.9998 6.21422V6.85707H8.46408C7.5779 6.85707 6.85693 7.57804 6.85693 8.46422V10.7142C6.85693 11.0692 7.14477 11.3571 7.49979 11.3571H7.85111L8.4065 23.0202C8.45556 24.0502 9.30172 24.8571 10.3329 24.8571H20.0953C21.1265 24.8571 21.9726 24.0502 22.0217 23.0202L22.577 11.3571H22.9284C23.2834 11.3571 23.5712 11.0692 23.5712 10.7142V8.46422C23.5712 7.57804 22.8503 6.85707 21.9641 6.85707ZM13.2855 6.21422C13.2855 5.85976 13.5739 5.57136 13.9284 5.57136H16.4998C16.8542 5.57136 17.1426 5.85976 17.1426 6.21422V6.85707H13.2855V6.21422ZM8.14265 8.46422C8.14265 8.28699 8.28685 8.14279 8.46408 8.14279H21.9641C22.1413 8.14279 22.2855 8.28699 22.2855 8.46422V10.0714C22.0874 10.0714 8.96362 10.0714 8.14265 10.0714V8.46422ZM20.7374 22.9591C20.721 23.3024 20.439 23.5714 20.0953 23.5714H10.3329C9.98913 23.5714 9.70708 23.3024 9.69077 22.9591L9.13827 11.3571H21.2899L20.7374 22.9591Z" fill="white"/>--}}
{{--                <path d="M15.2141 22.2859C15.5692 22.2859 15.857 21.9981 15.857 21.6431V13.2859C15.857 12.9309 15.5692 12.6431 15.2141 12.6431C14.8591 12.6431 14.5713 12.9309 14.5713 13.2859V21.6431C14.5713 21.9981 14.8591 22.2859 15.2141 22.2859Z" fill="white"/>--}}
{{--                <path d="M18.4285 22.2859C18.7835 22.2859 19.0714 21.9981 19.0714 21.6431V13.2859C19.0714 12.9309 18.7835 12.6431 18.4285 12.6431C18.0735 12.6431 17.7856 12.9309 17.7856 13.2859V21.6431C17.7856 21.9981 18.0734 22.2859 18.4285 22.2859Z" fill="white"/>--}}
{{--                <path d="M11.9998 22.2859C12.3548 22.2859 12.6426 21.9981 12.6426 21.6431V13.2859C12.6426 12.9309 12.3548 12.6431 11.9998 12.6431C11.6448 12.6431 11.3569 12.9309 11.3569 13.2859V21.6431C11.3569 21.9981 11.6447 22.2859 11.9998 22.2859Z" fill="white"/>--}}
{{--            </svg>--}}
{{--        </button>--}}
        <div class="products-table__delete" data-item-id="{{ $application->id }}"></div>
    </td>
</tr>
