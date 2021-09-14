<script>
    document.addEventListener("DOMContentLoaded", () => {
        let storeId = 0;

        const editOrder = (elem) => {
            if (elem.classList.contains('edit-order') || elem.parentNode.classList.contains('edit-order') || elem.parentNode.parentNode.classList.contains('edit-order')) {
                if (elem.classList.contains('edit-order')) {
                    storeId = elem.getAttribute('data-storeId-edit');
                } else if (elem.parentNode.classList.contains('edit-order')) {
                    storeId = elem.parentNode.getAttribute('data-storeId-edit');
                } else if (elem.parentNode.parentNode.classList.contains('edit-order')) {
                    storeId = elem.parentNode.parentNode.getAttribute('data-storeId-edit');
                }

                document.getElementById('order-modal-title').textContent = document.querySelector(`div.order-item-total[data-storeId$="${storeId}"] h4`).textContent;


                let serviceObj = {
                    payType: document.querySelector(`.order-item-total[data-storeId$="${storeId}"]`).getAttribute('data-payType'),
                    deliveryType: document.querySelector(`.order-item-total[data-storeId$="${storeId}"]`).getAttribute('data-deliveryType'),
                    dopserviceType: document.querySelector(`.order-item-total[data-storeId$="${storeId}"]`).getAttribute('data-dopserviceType'),
                }

                let InputCollection = document.querySelectorAll('input[data-type$="payment"]');
                let enabledItems = document.querySelector(`div.order-item-total[data-storeId$="${storeId}"] li[data-seller-detail-type$="payment"] .information`).getAttribute('data-input-id-in-base');

                updateOrderSetting(InputCollection, 'pay-container-', serviceObj.payType, enabledItems);

                InputCollection = document.querySelectorAll('input[data-type$="delivery"]');
                enabledItems = document.querySelector(`div.order-item-total[data-storeId$="${storeId}"] li[data-seller-detail-type$="delivery"] .information`).getAttribute('data-input-id-in-base');

                updateOrderSetting(InputCollection, 'delivery-container-', serviceObj.deliveryType, enabledItems);

                InputCollection = document.querySelectorAll('input[data-type$="additional-services"]');
                enabledItems = document.querySelector(`div.order-item-total[data-storeId$="${storeId}"] li[data-seller-detail-type$="additional-services"] .information`).getAttribute('data-input-id-in-base');

                updateOrderSetting(InputCollection, 'dopService-container-', serviceObj.dopserviceType, enabledItems);
            }
        };

        const updateOrderSetting = (elem, elemParentClass, typeArr, enabledItems) => {
            for (let i = 0; i < elem.length; i++) {
                let checkItem = false;
                let checkEnebled = false;
                let array = typeArr;

                if (!Array.isArray(array)) {
                    array = array.split(',');
                }

                array.forEach((item) => {
                    if (elem[i].getAttribute('data-input-id-in-base') == item) checkItem = true;
                });
                if (enabledItems != null) {
                    enabledItems.split(', ').forEach((item) => {
                        if (elem[i].getAttribute('data-input-id-in-base') == item) checkEnebled = true;
                    });
                }


                if (checkItem === true) document.querySelector(`.${elemParentClass}${elem[i].getAttribute('data-input-id-in-base')}`).style.display = 'block';
                else document.querySelector(`.${elemParentClass}${elem[i].getAttribute('data-input-id-in-base')}`).style.display = 'none';

                if (checkEnebled === true) elem[i].checked = true;
                else elem[i].checked = false;

                checkItem = false;
                checkEnebled = false;
            }
        }

        const editOrderWindow = (elem) => {
            if (elem.hasAttribute('data-type')) {
                let item = '';
                let elemId = elem.getAttribute('id');
                if (elem.getAttribute('data-type') === 'delivery') {
                    item = document.querySelector(`div.order-item-total[data-storeId$="${storeId}"] li[data-seller-detail-type$="delivery"] .information`);
                } else if (elem.getAttribute('data-type') === 'payment') {
                    item = document.querySelector(`div.order-item-total[data-storeId$="${storeId}"] li[data-seller-detail-type$="payment"] .information`);
                    let btn = document.querySelector(`button[data-storeid="${storeId}"]`);
                    if (elem.getAttribute('data-input-id-in-base') == 3) {
                        btn.classList.add('add');
                        btn.textContent = 'Оплатить';
                    } else {
                        btn.classList.remove('add');
                        btn.textContent = 'Заказ подтверждаю';
                    }
                } else if (elem.getAttribute('data-type') === 'additional-services') {
                    item = document.querySelector(`div.order-item-total[data-storeId$="${storeId}"] li[data-seller-detail-type$="additional-services"] .information`);
                } else if (elem.getAttribute('data-type') === 'recipient') {
                    item = document.querySelector(`div.order-item-total[data-storeId$="${storeId}"] li[data-seller-detail-type$="recipient"] .information`);
                }

                if (elem.getAttribute('data-type') === 'additional-services') {
                    if (elem.checked) {
                        if (item.textContent === 'не выбраны') item.textContent = `${document.querySelector(`label[for="${elemId}"]`).textContent}`;
                        else item.textContent += `, ${document.querySelector(`label[for="${elemId}"]`).textContent}`;
                        if (item.getAttribute('data-input-id-in-base')) {
                            let itemAttribute = item.getAttribute('data-input-id-in-base')
                            item.setAttribute('data-input-id-in-base', `${itemAttribute}, ${elem.getAttribute('data-input-id-in-base')}`);
                        } else {
                            item.setAttribute('data-input-id-in-base', elem.getAttribute('data-input-id-in-base'));
                        }
                    } else {
                        let serviceArr = item.textContent.split(', ');
                        if (serviceArr.length === 1) item.textContent = 'не выбраны';
                        else {
                            serviceArr = serviceArr.filter((e) => {
                                return e != document.querySelector(`label[for="${elemId}"]`).textContent;
                            });
                            item.textContent = serviceArr.join(', ');
                        }
                        serviceArr = item.getAttribute('data-input-id-in-base').split(', ');
                        serviceArr = serviceArr.filter((e) => {
                            return e != elem.getAttribute('data-input-id-in-base');
                        });
                        item.setAttribute('data-input-id-in-base', serviceArr.join(', '));
                    }
                } else if (elem.getAttribute('data-type') === 'recipient' && elem.getAttribute('id') === 'me') {
                    item.textContent = 'Я';
                    item.setAttribute('data-phone', null);
                    item.setAttribute('data-phone', null);
                    item.setAttribute('data-callback', null);
                } else {
                    item.setAttribute('data-input-id-in-base', elem.getAttribute('data-input-id-in-base'));
                    item.textContent = document.querySelector(`label[for="${elemId}"]`).textContent;
                }
            }
        }

        if (document.getElementById('recipient-fio')) {
            document.getElementById('recipient-fio').addEventListener('blur', (e) => {
                let item = document.querySelector(`div.order-item-total[data-storeId$="${storeId}"] li[data-seller-detail-type$="recipient"] .information`);
                item.textContent = e.target.value;
                item.setAttribute('data-fio', e.target.value);
            });

            document.getElementById('recipient-phone').addEventListener('blur', (e) => {
                let item = document.querySelector(`div.order-item-total[data-storeId$="${storeId}"] li[data-seller-detail-type$="recipient"] .information`);
                item.setAttribute('data-phone', e.target.value);
            });

            // document.getElementById('recipient-callback').addEventListener('change', (e) => {
            //     let item = document.querySelector(`div.order-item-total[data-storeId$="${storeId}"] li[data-seller-detail-type$="recipient"] .information`);
            //     if (e.target.checked) item.setAttribute('data-callback', true);
            //     else item.setAttribute('data-callback', false);
            // });
        };

        const requestToSubmitOrder = (storeId, storeElem, dopObj = {}) => {
            let card_info_arr = [];
            for (let i = 0; i < localStorage.length; i++) {
                let key = localStorage.key(i);

                if (key.includes('ARMADA_PRODUCT_')) {
                    let item = JSON.parse(localStorage.getItem(key));
                    if (item.store_id != storeId) continue;
                    let client = document.querySelector(`div.order-item-total[data-storeId$="${storeId}"] li[data-seller-detail-type$="recipient"] .information`);
                    item = {
                        ...item,
                        fio: document.getElementById('fio').value,
                        phone: document.getElementById('phone').value,
                        country_id: 1,
                        city_id: document.getElementById('city').options[document.getElementById('city').selectedIndex].value,
                        address: document.getElementById('address').value,
                        comment: document.getElementById('comment').value,
                        client_name: client.getAttribute('data-fio'),
                        client_phone: client.getAttribute('data-phone'),
                        not_disturb: client.getAttribute('data-callback'),
                        pay_id: document.querySelector(`div.order-item-total[data-storeId$="${storeId}"] li[data-seller-detail-type$="payment"] .information`).getAttribute('data-input-id-in-base'),
                        delivery_id: document.querySelector(`div.order-item-total[data-storeId$="${storeId}"] li[data-seller-detail-type$="delivery"] .information`).getAttribute('data-input-id-in-base'),
                        //dop_services_id: document.querySelector(`div.order-item-total[data-storeId$="${storeId}"] li[data-seller-detail-type$="additional-services"] .information`).getAttribute('data-input-id-in-base'),
                        ...dopObj,
                    }
                    card_info_arr.push(item);
                };
            }
            let vip = null;
            if (document.getElementById('vip') && document.getElementById('vip').checked) {
                vip = 'on';
            }
            let bonuses = document.querySelector(`div.order-item-total[data-storeId$="${storeId}"]`).parentNode.parentNode.querySelector(`.points__count-items`).getAttribute('data-spent-bonus');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/order-confirm',
                type: 'post',
                data: {
                    'orders': JSON.stringify(card_info_arr),
                    'vip': vip,
                    'bonuses': bonuses
                },
                success: function(data) {
                    if (data['answer'] === 'success') {
                        storeElem.parentNode.parentNode.remove();
                        for (let i = 0; i < card_info_arr.length; i++) {
                            localStorage.removeItem('ARMADA_PRODUCT_' + card_info_arr[i].id + '_USER_' + authUserId);
                            localStorage.setItem('numberOfUniqueProducts_ARMADA', +localStorage.getItem('numberOfUniqueProducts_ARMADA') - 1);
                        }
                        document.querySelectorAll('.BASKET_count').forEach((item) => {
                            item.textContent = localStorage.getItem('numberOfUniqueProducts_ARMADA');
                        });
                        showModal('', `${data['message']}`); // ${data['answer']}
                    } else if (data['answer'] === 'error') {
                        showModal(data['answer'], data['message']);
                    }

                },
                error: function(data) {
                    showModal('Произошла ошибка! Оплата не была произведена!');
                },
            });
        }

        const showModal = (title, text) => {
            let modal = document.querySelector('#pay_result');
            modal.setAttribute('aria-modal', 'true');
            modal.style.display = 'block';
            modal.classList.add('show');
            modal.querySelector('h4').textContent = title;
            modal.querySelector('p').textContent = text;
        }

        const checkToSubmitOrder = (target) => {
            if (target.tagName === 'BUTTON' && target.hasAttribute('data-storeid')) {
                if (document.getElementById('fio').value === '') {
                    showModal('Не заполнено поле "ФИО"');
                    return false;
                } else if (document.getElementById('phone').value === '') {
                    showModal('Не заполнено поле "Телефон"');
                    return false;
                } else if (document.getElementById('email').value === '') {
                    showModal('Не заполнено поле "Эл.адрес"');
                    return false;
                } else if (document.getElementById('city_plug').selected) {
                    showModal('Не выбрано поле "Город"');
                    return false;
                } else if (document.getElementById('address').value === '') {
                    showModal('Не заполнено поле "Адрес"');
                    return false;
                }

                let storeId = target.getAttribute('data-storeId');
                let storeElem = document.querySelector(`div.order-item-total[data-storeId$="${storeId}"]`);

                if (document.querySelector(`div.order-item-total[data-storeId$="${storeId}"] li[data-seller-detail-type$="payment"] .information`).getAttribute('data-input-id-in-base') == 3 && target.classList.contains('add')) {
                    let answer = onlinePay(target);
                    answer.then(
                        result => {
                            console.log(result);
                            let pay_result = {
                                pay_result: result,
                            }
                            console.log(pay_result);
                            requestToSubmitOrder(storeId, storeElem, pay_result);
                        },
                        error => {
                            console.log(error, storeElem);
                            error !== "User has cancelled"
                                ? showModal('Произошла ошибка! Оплата не прошла!')
                                : null;
                        }
                    );
                } else {
                    requestToSubmitOrder(storeId, storeElem);
                }

            }
        }

        const drawOrders = () => {
            if (document.location.pathname === '/orders') {
                let points = @json($loyalties) ? @json($loyalties) : null;
                let ordersPrice = {};
                let card_info_arr = [];
                for (let i = 0; i < localStorage.length; i++) {
                    let key = localStorage.key(i);
                    if (key.includes('ARMADA_PRODUCT_')) {
                        let elemJSON = JSON.parse(localStorage.getItem(key));

                        card_info_arr.push(JSON.parse(localStorage.getItem(key)));

                        if (elemJSON.price_2 === null) {
                            if (ordersPrice[`${elemJSON.store_id}`]) {
                                ordersPrice[`${elemJSON.store_id}`] += elemJSON.price * elemJSON.count;
                            } else {
                                ordersPrice[`${elemJSON.store_id}`] = elemJSON.price * elemJSON.count;
                            }
                        } else {
                            if (ordersPrice[`${elemJSON.store_id}`]) {
                                ordersPrice[`${elemJSON.store_id}`] += elemJSON.price_2 * elemJSON.count;
                            } else {
                                ordersPrice[`${elemJSON.store_id}`] = elemJSON.price_2 * elemJSON.count;
                            }
                        }
                    }
                }

                console.log(ordersPrice);
                console.log(points);
                console.log(card_info_arr);

                for (let key in ordersPrice) {
                    document.querySelector(`span.price__current[data-storeid="${key}"] .finally-price-with-discount`).textContent = priceThreeDigitModification(ordersPrice[key]);
                    document.querySelector(`span.price__current[data-storeid="${key}"] .finally-price-with-discount`).setAttribute('data-finally-price-without-discount', ordersPrice[key]);
                    document.querySelector(`div.points[data-storeid="${key}"]`).style.display = "none";
                }

                for (let key in points) {
                    if (document.querySelector(`div.points[data-storeid="${key}"]`)) {
                        document.querySelector(`div.points[data-storeid="${key}"] span .points__count-items`).textContent = priceThreeDigitModification(points[key]);
                        document.querySelector(`div.points[data-storeid="${key}"] span .points__count-items`).setAttribute('data-spent-bonus', points[key]);
                        document.querySelector(`div.points[data-storeid="${key}"]`).style.display = "block";
                    }
                }

                document.querySelectorAll(`div.points`).forEach( (item) => {
                    if (!item.querySelector('span .points__count-items').hasAttribute('data-spent-bonus')) {
                        item.style.display = 'none';
                        item.parentNode.querySelector('.custom-checkbox').style.display = 'none';
                    }
                });

                document.querySelectorAll('.finally-price-without-discount').forEach((item) => {
                    item.style.display = 'none';
                });
            }
        }

        drawOrders();

        const clickToBonusCheckbox = (target) => {
            if (target.classList.contains('checkbox-bonus')) {
                let id = target.getAttribute('id').split('bonus-')[1];
                let parent = document.querySelector(`div.order-item-total[data-storeid="${id}"]`).parentNode.parentNode;
                let priceWithoutDiscont = parent.querySelector(`.finally-price-with-discount`).getAttribute('data-finally-price-without-discount');
                if (target.checked) {
                    let bonuses = parent.querySelector(`.points__count-items`).getAttribute('data-spent-bonus');
                    let priceWithDiscont = priceWithoutDiscont - bonuses;
                    let spentBonuses = bonuses;
                    if (priceWithDiscont < 0) {
                        spentBonuses += priceWithDiscont;
                        priceWithDiscont = 0;
                        parent.querySelector(`.points__count-items`).setAttribute('data-spent-bonus', spentBonuses);
                    }
                    parent.querySelector(`.finally-price-with-discount`).textContent = priceWithDiscont;
                    parent.querySelector(`.finally-price-without-discount .number`).textContent = priceWithoutDiscont;
                    parent.querySelector(`.finally-price-without-discount`).style.display = '';
                } else {
                    parent.querySelector(`.finally-price-with-discount`).textContent = priceWithoutDiscont;
                    parent.querySelector(`.finally-price-without-discount`).style.display = 'none';
                }
            }
        }

        document.addEventListener('click', (e) => {

            editOrder(e.target);
            editOrderWindow(e.target);
            checkToSubmitOrder(e.target);
            clickToBonusCheckbox(e.target);

            if (e.target === document.querySelector('#pay_result')) {
                document.querySelector('#pay_result').removeAttribute('aria-modal');
                document.querySelector('#pay_result').style.display = 'none';
                document.querySelector('#pay_result').classList.remove('show');
            }

            if (document.querySelector('#order-1') && document.querySelector('#order-1').hasAttribute('aria-modal') && document.querySelector('#other').checked &&
                (document.querySelector('#recipient-fio').value === '' || document.querySelector('#recipient-phone').value === '') &&
                (e.target === document.querySelector('#order-1') || e.target === document.querySelector('#order-1 .button.btn-primary') ||
                    e.target === document.querySelector('#order-1 .close') || e.target === document.querySelector('#order-1 .close span'))) {

                document.querySelector('#me').click();
                client = document.querySelector(`div.order-item-total[data-storeId$="${storeId}"] li[data-seller-detail-type$="recipient"] .information`);
                client.setAttribute('data-phone', null);
                client.setAttribute('data-phone', null);
                client.setAttribute('data-callback', null);
                client.textContent = 'Я';
                showModal('Вы выбрали пункт "Другой человек", но не заполнили обязательные поля "ФИО" и "Телефон"! Выбран пункт "Я".');
            }

        });
    });
</script>
