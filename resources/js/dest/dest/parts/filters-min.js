$(document).ready(function(){{let e=$(".filters"),t=$(".filters__open, .products__filter"),l=$(".filters__close, .overlay, .header__overlay"),i=$(".overlay, .header__overlay");l.on("click",function(){e.hasClass("active")&&$(".filter-apply").fadeOut(100),e.removeClass("active"),i.fadeOut(200)}),$.each(t,function(){$(this).on("click",function(){e.hasClass("active")&&$(".filter-apply").fadeOut(100),i.fadeIn(200),e.toggleClass("active")})})}{let e=$(".filter-apply"),t=$(".filters"),l=$(".filters input, .filters select, .filters textarea"),i=$(".filter-apply__close"),a=$(".filter-apply__apply");i.on("click",function(){e.fadeOut(100)}),$.each(l,function(){$(this).on("change",function(){let l=$(this).parents("form"),i=$(this).offset(),f=t.offset(),s=i.top,c=f.left,o=t.width();e.css({top:s+"px",left:c+o+25+"px",display:"block"}),a.on("click",function(){l.submit()})})})}});