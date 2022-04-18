
$('button#newCart').click(function (e) {
    e.preventDefault();
    var item = $(this).attr('data-item');
    var token = $(this).attr('data-csrf');
    $.ajax({
        url: '/addCart',
        type: 'POST',
        data: { item: item},
        headers: {
            'X-CSRF-TOKEN': token 
        },
        success: function (res) {
            $('span#countCart').text(res)
        },
        error: function (res) {
            console.log(res);
        }

    });    
});

// $('button#NewDelivery').click(function (e) {
//     e.preventDefault();
//     var info = $(this).serialize();
//     var token = $(this).attr('data-csrf');
//     $.ajax({
//         url: '/addDelivery',
//         type: 'POST',
//         data: {info: info, _token:token},        
//         success: function (res) {
//             $('span#countCart').text(res)
//         },
//         error: function (res) {
//             console.log(res);
//         }

//     });    
// });

$('form#register').submit(function (e) {
    e.preventDefault();
    var info = $(this).serialize();

    $.ajax({
        url: '/register',
        type: 'POST',
        data: info,
        success: function (res) {
            if (res) {
                $('form#register>input').val('')
                $('div#success').hide().slideDown(300);
            }
        },
        error: function (res) {
            var errors = res.responseJSON['errors']
            var errorsHtml = '';
            $.each(errors, function (index, value) {
                errorsHtml += value + '<br>';
            });
            $('div#error').hide().slideDown(300).find('div.alert-danger').html(errorsHtml);
        }
    });

});

$('form#auth').submit(function (e) {
    e.preventDefault();
    var info = $(this).serialize();

    $.ajax({
        url: '/auth',
        type: 'POST',
        data: info,
        success: function (res) {
            if (res) {
                window.location.href = "/";
                $('div#success').hide().slideDown(300);
            }
        },
        error: function (res) {
            var errors = res.responseJSON['errors']
            var errorsHtml = '';
            $.each(errors, function (index, value) {
                errorsHtml += value + '<br>';
            });
            $('div#error_auth').hide().slideDown(300).find('div.alert-danger').html(errorsHtml);
        }
    });

});



$('#NewDelivery').click(function(e,token){
	var a = $('select[name=magaz]').val();
    var token = $(e).attr('data-csrf');     
    $.ajax({
        url: 'addZakaz',
        type: 'POST',
        data:a,           
        processData: false,   
        headers: {
            'X-CSRF-TOKEN': token 
        },      
        success: function (res) {
            console.log(res);;
        },  error: function (res) {
            console.log(res);
        }    
    });        
});


function count(el,type,token){
            var item = $(el).attr('data-id');
             var token=$(el).attr('data-csrf');    
        $.ajax({
            url: '/countItem',
            type: 'POST',
            data: { item: item, type: type, _token:token},                    
            success: function (res) {
                $('span#count'+ item).text(res.count);
                $('b#sum'+item).text(res.price+'Р');
                $('h3#sum').text(res.sum+'Р');
            },  error: function (res) {
                console.log(res);
                
            }    
        });        
}
