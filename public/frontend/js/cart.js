 $(function () {
//add to cart
        $('.add-to-cart').click(function (e) {
            e.preventDefault();
           
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var product_id=$(this).closest('.product-wrapper').find('#id').val();
            $.ajax({
                url: "/add-to-cart",
                method: "POST",
               dataType: 'json',
                data: {
                    'pid': product_id,   
                },
                success: function (response) {
                    
                    $('.sub_total_amount').html(response.sub_total);
                    $('#voda').text(response.cart_count);
                    var data="";
                    console.log(response.cart_count);
                   $.each( response.items, function( key, item ) {
                    
                        data +='<li><a href="#" class="minicart-product-image"><img src="covers/'+item.options.img+'" alt="cart products" /></a><div class="minicart-product-details"><h6><a href="">'
                                 +item.name+
                                '</a></h6><span>'+item.price+ 'x' +item.qty+
                                '</span></div><button class="close" title="Remove"><i class="fa fa-close"></i></button></li>'
                   });
                    $('.minicart-product-list').html(data);
                    $('.cart-bottom-sub').html(response.sub_total);
                    alertify.set('notifier','position','bottom-right');
                    alertify.success('Book added To Cart').dismissOthers();
                },
                error: function (data) {
                console.log('Error:', data);
            }
            });
        });
        //End Add to cart
        //Remove item from card
         $('.remove_item').click(function (e) {
            e.preventDefault();
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var rowId = $('.rowId').val();
            var element=this;
            $.ajax({
                url:"/remove-cart" ,
                method: "POST",
                data:{
                     'id':rowId,
                },
              
                success: function (response) {
                    $(element).closest("tr").fadeOut();
                    alertify.set('notifier','position','bottom-right');
                    alertify.success(response.status).dismissOthers();
                    window.location.reload();
                
                },
                error: function (data) {
                console.log('Error:', data);
            }
            });
        });
        //Cart update quantity

         
    });
