<script src="{{ asset('js/scripts.js') }}"></script>

@include('layouts._script_recaptcha')
@include('layouts._script_product_like')

@if(!Route::is('admin.*','seller.*'))
    <script>
        let busketInDB = @json($userBasket ?? null);

        let authUserId = @json(Auth::id() ?? null);

        if (busketInDB) {
            busketInDB.forEach((item) => {
                localStorage.setItem(`ARMADA_PRODUCT_${item.product_id}_USER_${authUserId}`, JSON.stringify({
                    ...item,
                    id: item.product_id,
                    userId: authUserId
                }));
            });
        }

        const priceThreeDigitModification = (price) => {
            let arrPriceNumber = [...(price + '')];
            let arrPrcieNumberModification = [];
            let check = 3;
            for (let i = arrPriceNumber.length - 1; i >= 0; i--) {
                if (check === 0) {
                    arrPrcieNumberModification.unshift(' ');
                    arrPrcieNumberModification.unshift(arrPriceNumber[i]);
                    check = 2;
                } else {
                    arrPrcieNumberModification.unshift(arrPriceNumber[i]);
                    check--;
                }
            }
            return arrPrcieNumberModification.join('');
        }

    </script>
@endif

@include('layouts._scripts.basket')
@include('layouts._scripts.search')

