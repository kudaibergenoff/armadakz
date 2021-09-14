<script>
    function like(product_id) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'/product-like',
            type:'post',
            data:{"product_id":product_id},
            // dataType:"json",
            success:function(data)
            {
                // alert('информация о лайке добавлена в базу',data.status);
                var id = '#like' + product_id;
                var heart = '<i class="fas fa-star"></i>';
                $(id).html(heart);
                console.log(data.countLike);
                document.querySelectorAll(".header__favorite .header__count").forEach((item) => {
                    item.textContent = data.countLike;
                });
            },
            error:function(data)
            {
                // alert('ошибка');
            },
        });
    }
</script>
