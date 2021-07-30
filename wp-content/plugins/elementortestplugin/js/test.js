

// (function ($){
//
//     $(document).ready(function (){
//         alert(urls.ajaxurl);
//         $(".btn").on('click', function (){
//
//            let cat = $(this).data('filter');
//
//             $.post(urls.ajaxurl, {
//                 "action": "agency_test",
//                 "data": "hello Bangladesh"
//
//             }, function (data){
//                 console.log(data);
//             });
//
//
//         });
//     });
//
//
// })(jQuery);

jQuery(document).ready(function($) {

    // alert('Hello');
    console.log(agency)
    $(".btn").on('click', function () {

        let cat = $(this).data('filter');
        alert(cat);

        // We'll pass this variable to the PHP function example_ajax_request


        // This does the ajax request
        $.ajax({
            url: agency.ajaxurl,

            data: {
                'action': 'example_ajax_request',
                'fruit': cat,

            },
            success: function (data) {
                // This outputs the result of the ajax request
                console.log(data);
            },
            error: function (errorThrown) {
                console.log(errorThrown);
            }
        });

    });

});