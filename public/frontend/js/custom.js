$(document).ready(function(){

   $('.addToWishlist').click(function (e){
       e.preventDefault();
       var product_id = $(this).closest('product_data').find('.prod_id').val();

       $.ajax({
           method:"POST",
           url: "/add-to-cart",
           data: {
               'product_id':product_id,
               'product_qty' : product_qty,
           },
             success:function (response){
                  swal(response.status);
             }
       });
   });

loadcart();
loadwishlist();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });




function loadcart()
{
   $.ajax({
       method: "GET",
       url: "/load-cart-data",
       success:function(response){
           $('.cart-count').html('');
           $('.cart-count').html(response.count);
          //console.log(response.count)
       }
   });

}

function loadwishlist(){
    $.ajax({
        method: "GET",
        url: "/load-wishlist-data",
        success:function (response){
            $('wishlist-count').html('');
            $('.wishlist-count').html(response.count);
        }
    });
}

});
