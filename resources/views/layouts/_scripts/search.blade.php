<script>
    (function () {
        let autosearch_page_number = 1;
        let autosearch_last_page_number = 0;
        let autosearch_shop_page_number = 1;
        let autosearch_shop_last_page_number = 0;
        let autosearch_input_value = '';

        if(document.querySelector('.autosearch__PRODUCTS .autosearch__column-wrap')) {
            document.querySelector('.autosearch__PRODUCTS .autosearch__column-wrap')
                .addEventListener('scroll', function(e) {
                    if (e.target.scrollTop + e.target.clientHeight === e.currentTarget.scrollHeight) {
                        if (autosearch_last_page_number !== autosearch_page_number) {
                            autosearch_page_number++;
                            sendRequest();
                        }
                    }
                });
        }

        if(document.querySelector('.autosearch__SHOPS')) {
            document.querySelector('.autosearch__SHOPS .autosearch__column-wrap')
                .addEventListener('scroll', function(e) {
                    if (e.target.scrollTop + e.target.clientHeight === e.currentTarget.scrollHeight) {
                        console.log(autosearch_shop_page_number);
                        if (autosearch_shop_last_page_number !== autosearch_shop_page_number) {
                            autosearch_shop_page_number++;
                            sendShopRequest();
                        }
                    }
                });
        }

        if(document.getElementById('search')) {
            document.getElementById('search').addEventListener('input', function (e) {
                autosearch_input_value = e.target.value.length >= 3 ? e.target.value : false;
                autosearch_page_number = 1;
                autosearch_shop_page_number = 1;
                checkSearchInput('none');
                sendRequest();
                sendShopRequest();
            });
        }

        const sendRequest = () => {
            if(autosearch_input_value){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:'/search',
                    type:'post',
                    data:{"querys":autosearch_input_value,'page':autosearch_page_number},
                    success:function(data)
                    {
                        if (data[1].length !== 0) checkSearchInput('');
                        drawAutosearch(data);
                        autosearch_last_page_number = data[3];
                    },
                    error:function(data)
                    {

                    },
                });
            }
        }

        const sendShopRequest = () => {
            if(autosearch_input_value){
                console.log('dataIn');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:'/search-store',
                    type:'post',
                    data:{"querys":autosearch_input_value,'page':autosearch_shop_page_number},
                    success:function(data)
                    {
                        console.log(data);
                        drawShops(data[1]);
                        autosearch_shop_last_page_number = data[0];
                    },
                    error:function(data)
                    {
                        console.log(data);
                    },
                });
            }
        }

        const drawShops = (shops) => {
            let HTML_shop_list = document.querySelector('.autosearch__SHOPS ul');
            let HTML_shop_layot_item = document.querySelector('.autosearch__SHOPS li');
            if (autosearch_shop_page_number === 1) {
                HTML_shop_list.innerHTML = '';
                HTML_shop_list.appendChild(HTML_shop_layot_item);
            }
            if (shops.length === 0) return false;
            for (let i = 0; i < shops.length; i++) {
                let HTML_shop_item_new = HTML_shop_layot_item.cloneNode(true);
                HTML_shop_item_new.querySelector('a').textContent = shops[i].title;
                HTML_shop_item_new.querySelector('a').href = '/shop/'+shops[i].slug;
                HTML_shop_item_new.style.display = '';
                HTML_shop_list.appendChild(HTML_shop_item_new);
            }
        }

        const drawAutosearch = (data) => {
            drawCategories(data[2]);
            drawProducts(data[0], data[1]);
        }

        const drawCategories = (categories) => {
            let HTML_cat_list = document.querySelector('.autosearch__CATEGORIES ul');
            let HTML_cat_layot_item = document.querySelector('.autosearch__CATEGORIES li');
            HTML_cat_list.innerHTML = '';
            HTML_cat_list.appendChild(HTML_cat_layot_item);
            if (categories.length === 0) return false;
            for (let i = 0; i < categories.length; i++) {
                let HTML_cat_item_new = HTML_cat_layot_item.cloneNode(true);
                HTML_cat_item_new.querySelector('a').textContent = categories[i].title;
                HTML_cat_item_new.querySelector('a').href = '/item/'+categories[i].slug;
                HTML_cat_item_new.style.display = '';
                HTML_cat_list.appendChild(HTML_cat_item_new);
            }
        }

        const drawProducts = (products, slugs) => {
            let HTML_prod_list = document.querySelector('.autosearch__PRODUCTS ul');
            let HTML_prod_layot_item = document.querySelector('.autosearch__PRODUCTS li');
            if (autosearch_page_number === 1) {
                HTML_prod_list.innerHTML = '';
                HTML_prod_list.appendChild(HTML_prod_layot_item);
            }
            if (products.length === 0) return false;
            for (let i = 0; i < products.length; i++) {
                let HTML_prod_item_new = HTML_prod_layot_item.cloneNode(true);
                slugs.forEach((item) => {
                    if (item.id === products[i].store_id) {
                        HTML_prod_item_new.querySelector('.product-card__vendor').textContent = item.title;
                    }
                });
                HTML_prod_item_new.querySelector('.product-card__title')
                    .textContent = products[i].title;
                $.get(`/public/storage/${products[i].images[0]}`)
                    .done(function() {
                        HTML_prod_item_new.querySelector('.product-card__image img')
                            .src = `/storage/${products[i].images[0]}`;
                    })
                    .fail(function() {
                        HTML_prod_item_new.querySelector('.product-card__image img')
                            .src = `/storage/${products[i].images[0]}`;
                        // HTML_prod_item_new.querySelector('.product-card__image img')
                        //     .src = 'img/noimg.jpg';
                    });
                console.log(`/storage/${products[i].images[0]}`);
                HTML_prod_item_new.querySelector('.product-card__link')
                    .href = `/product/${products[i].id+'-'+products[i].slug}`;
                if (products[i].price_2 === null) {
                    HTML_prod_item_new.querySelector('.price__previous')
                        .style.display = 'none';
                    HTML_prod_item_new.querySelector('.price__special span')
                        .textContent = products[i].price + 'тг';
                } else {
                    HTML_prod_item_new.querySelector('.price__previous span')
                        .textContent = products[i].price + 'тг';;
                    HTML_prod_item_new.querySelector('.price__special span')
                        .textContent = products[i].price_2 + 'тг';;
                }
                HTML_prod_item_new.style.display = '';
                HTML_prod_list.appendChild(HTML_prod_item_new);
            }
        }

        const checkSearchInput = (display_value) => {
            document.querySelector('.autosearch__CATEGORIES')
                .parentNode.style.display = display_value;
        }
    })();
</script>
