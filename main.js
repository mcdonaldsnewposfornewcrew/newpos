if($(document).readyState == "loading"){
    $(document).on("DOMContentLoaded", ready);
}else{
    ready();
}

function ready(){
    var removeCartButton = $('.cart-remove');
    removeCartButton.each(function(index, button) {
        $(button).on('click', removeCartItem);
    });

    var quantityInputs = $('.cart-quantity');
    quantityInputs.each(function(index, input) {
        $(input).on('change', quantityChanged);
    });

    var addCart = $('.add-cart');
    addCart.each(function(index, button) {
        $(button).on('click', addCartClicked);
    });

    $(".inputpay").click(enterPayment);
}

function enterPayment(){
    $(".reciept").toggle();
    $(".payment").toggle();
}

function alertNotif(){
    alert('Email has been sent!');
}

var clicks = 0;

function addCartClicked(event){
    var button = $(event.target);
    var shopProducts = button.parent();
    var title = shopProducts.find('.product-title').text();
    var price = shopProducts.find('.price').text();
    var productImg = shopProducts.find('.product-img').attr('src');
    addProductToCart(title, price, productImg);
    updateTotal();
}

function addProductToCart(title, price, productImg){
    var cartShopBox = $('<div class="row cart-box"></div>');
    var cartItems = $('.cart-content').eq(0);
    var cartItemsNames = $('.cart-product-title');
    console.log(cartItemsNames);
    var counter = 0;
    for(var i = 0; i < cartItemsNames.length; i++){
        if(cartItemsNames.eq(i).text() == title){
            alert('Item has already been added to the cart!');
            return;
        }
        counter++;
    }

    var cartBoxContent = `
        <img src="${productImg}" alt="" class="col cart-img">
        <div class="col-md-9 detail-box" style="width: 50%;">
            <div class="cart-product-title" style="font-weight: 500;">${title}</div>
            <div class="cart-price">${price}</div>
            <input type="number" value="1" name="productQuantity${counter}" class="cart-quantity">
            <input type="hidden" name="productTitle${counter}" value="${title}">
            <input type="hidden" name="productPrice${counter}" value="${price}">
            <input type="hidden" name="productImg${counter}" value="${productImg}">
            <input type="hidden" name="num" value="${counter}">
        </div>
        <i class="col fa fa-trash cart-remove" aria-hidden="true"></i>
    `;

    cartShopBox.html(cartBoxContent);
    cartItems.append(cartShopBox);
    cartShopBox.find('.cart-remove').eq(0).on('click', removeCartItem);
    cartShopBox.find('.cart-quantity').eq(0).on('change', quantityChanged);
}

function removeCartItem(event) {
    var buttonClicked = $(event.target);
    buttonClicked.parent().remove();
    updateTotal();
}

function quantityChanged(event) {
    var input = $(event.target);
    if (isNaN(input.val()) || input.val() <= 0) {
        input.val(1);
    }
    updateTotal();
}

function updateTotal() {
    var cartContent = $('.cart-content');
    var cartBoxes = cartContent.find('.cart-box');
    var total = 0;
    var i = 0;
    for (i = 0; i < cartBoxes.length; i++) {
        var cartBox = $(cartBoxes[i]);
        var priceElement = cartBox.find('.cart-price');
        var price = parseFloat(priceElement.text().replace('₱', ''));
        var quantityElement = cartBox.find('.cart-quantity');
        var quantity = quantityElement.val();
        total += (price * quantity);
        total = Math.round(total * 100) / 100;
    }

    $('.total-price').text('₱' + total + '.00');
}