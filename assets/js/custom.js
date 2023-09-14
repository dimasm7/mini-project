$('input[type="checkbox"]').on('click', function(){
    let btn = $(this).parent().find('button');
    if($(this).is(':checked')){
        btn.text('CANCEL')
    }else{
        btn.text('BUY')
    }
})
$('input[type="number"]').on('keyup change', function(){
    let val = $(this).val()
    let price = $(this).parent().parent().parent().find('.price-real').text()
    $(this).parent().parent().find('.sub-total').text("Rp. "+ price * val)


    let total = 0;
    $('.item[style="display: flex;"]').each(function(){
        let price = Number($(this).find('.price-real').text())
        let qty = Number($(this).find('input[type="number"]').val())
        total += price * qty;
    }) 
    $('.total-price').find('span').text(total)
})

$('button#checkout').on('click', function(e){
    if($(this).attr('data-type') == 'checkout'){
        let products = [];
        $('.item').css('display', 'none');
        let total = 0;
        $(':checkbox:checked').each(function(i){
            products[i] = $(this).val();
            $(this).parent().css('display', 'none');
            $(this).parent().parent().css('display', 'flex');
            $(this).parent().parent().find('.input-to-confirm').css('display', 'block');
            $(this).parent().parent().find('.price-real').css('display', 'none');
            $(this).parent().parent().find('.diskon').css('display', 'none');

            total += Number($(this).parent().parent().find('.price-real').text())
        });
        $('.total-price').css('display', 'block').find('span').text(total)
        $(this).attr('data-type', 'confirm');
        $(this).text('Confirm')
    }else{
        $(this).attr('type', 'submit');
    }
    
})