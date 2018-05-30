jQuery(document).ready(function($) {
  var alterClass = function() {
    var ww = document.body.clientWidth;
    if (ww < 990) {
      $('.mega-dropdown-menu').removeClass('show');
    } else if (ww >= 991) {
      $('.mega-dropdown-menu').addClass('show');
    };
  };
  $(window).resize(function(){
    alterClass();
  });
  //Fire it when the page first loads:
  alterClass();
});

function encodeForAjax(data) {
  if (data == null) return null;
  return Object.keys(data).map(function(k){
    return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
  }).join('&');
}

function sendAjaxRequest(method, url, data, handler) {
  let request = new XMLHttpRequest();

  request.open(method, url, true);
  request.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  request.addEventListener('load', handler);
  request.send(encodeForAjax(data));
}


function addEventListeners() {

// ---------------------------------
//            PROFILE
//----------------------------------

  let profile_button = document.querySelectorAll(".profile-user-menu li");
  [].forEach.call(profile_button, function(change) {
    change.onclick = function(){
      changeProfilePill(this);
    }
  });

// ---------------------------------
//            PRODUCT
//----------------------------------

  let fav_button = document.querySelectorAll(' #fav');
  [].forEach.call(fav_button, function(fav) {
    fav.onclick = function(){
      favoriteRequest(this);
    }
  });

  let comment_button = document.querySelector('form.submit-review #submit_review');
  if(comment_button!=null)
    comment_button.onclick = function(event){
      addReviewRequest(this,event);
  }

  let rate_button = document.querySelectorAll('form.submit-review .review-block-rate button');
  [].forEach.call(rate_button, function(rate) {
    rate.onmouseover = function(){
      activateRateButtons(this);
    }
    rate.onmouseleave = function(){
      deactivateRateButtons(this);
    }

    rate.onclick = function(){
      finalRateButtons(this);
    }
  });

// ---------------------------------
//            CART
//----------------------------------

  let order_deleter = document.querySelectorAll('.product-order #delete');
  [].forEach.call(order_deleter, function(deleter) {
    deleter.onclick = function(){
      sendDeleteOrderRequest(this);
    }
  });

  let delete_review = document.querySelectorAll('.remove_comment #delete');
  [].forEach.call(delete_review, function(del){
    del.onclick = function(){
      sendDeleteReviewRequest(this);
    }
  });

  let quantity_button = document.querySelectorAll('.product-order #quantity');
  [].forEach.call(quantity_button, function(changer) {
    changer.onclick = function(){
      sendUpdateQuantityRequest(this);
    }
  });

  let cart_button = document.querySelectorAll('#cart');
  [].forEach.call(cart_button, function(adder) {
    adder.onclick = function(){
      sendAddCartRequest(this);
    }
  });
 

  let final_step = document.querySelector('#step-3-next');
  if(final_step!=null)
  final_step.onclick = function(){
    makeFinalStep(this);
  }

  let confirmation = document.querySelector("#confirmation");
  if(confirmation!=null)
    confirmation.onclick = function(){
    sendConfirmationRequest(this);
  }

}

// ---------------------------------
//            Cart
//----------------------------------

function sendConfirmationRequest(button){
  let address = document.querySelector('#address-conf').innerHTML;
  let contact = document.querySelector('#contact-conf').innerHTML;
  let payment = document.querySelector('#payment-conf').innerHTML;
  let total = document.querySelector('#total-conf').innerHTML;

  if(+total>0)
    sendAjaxRequest('put', '/orders/create' ,{address:address,contact:contact,payment:payment},confirmationHandler);
  else
    alert("You can not make an order whit no products attached!");
}

function confirmationHandler(){
  let order = JSON.parse(this.responseText);
  let element = document.getElementById('progress-bar');
  let price_cart =document.querySelector('#nav_cart').innerHTML = `<i class="fa fa-shopping-cart"></i>0,00 € `;

  element.innerHTML = `
                        <div class="jumbotron text-center" style="background-color:transparent;">
                        <br><br><br>
                        <h1 class="display-3">Thank You!</h1><br>
                        <p class="lead"> Your transaction has been successfully aproved. You will received your order really soon.</p>
                        <hr>
                      
                        <p class="lead"><br>
                          <a class="btn btn-success btn-lg" href="/" role="button">Continue to homepage</a>
                        </p>
                        <br><br><br>
                      </div>`
  
}


function makeFinalStep(button){

  let address_final = document.getElementById('address').value
                + " " + document.getElementById('city').value
                + " " + document.getElementById('zip').value;
  let contact_final= document.getElementById('contact').value;
  let radios = document.getElementsByName('payment');
 
  let payment_final;
  for (let i = 0, length = radios.length; i < length; i++){
    if (radios[i].checked){
       payment_final=radios[i].value;
      break;
    }
  }

  let address = document.querySelector('#address-conf');
  address.innerHTML = `${address_final}`;
  let contact = document.querySelector('#contact-conf');
  contact.innerHTML = `${contact_final}`;
  let payment = document.querySelector('#payment-conf');
  payment.innerHTML = `${payment_final}`;


}

function sendAddCartRequest(button){
  let id = button.closest('div.product').getAttribute('data-id');

  if(!button.disabled)
    sendAjaxRequest('post', '/cart/products/' + id + "/add",null,addCartHandler);

}

function  addCartHandler(){
  let product = JSON.parse(this.responseText);
  let button = document.querySelector('div.product[data-id="' + product.id + '"] #cart');

  button.innerHTML ='<i class="fa fa-check"></i> In Cart';
  button.disabled =true;

}

function sendUpdateQuantityRequest(button){
  let id = button.closest('div.product-order').getAttribute('data-id');
  let value = button.value;

  if(value == "+")
    sendAjaxRequest('post', '/cart/products/' + id + "/inc",null,updateQuantityHandler);

  if(value == "-")
    sendAjaxRequest('post', '/cart/products/' + id + "/sub",null,updateQuantityHandler);

}

function sendDeleteOrderRequest(button){
  let id = button.closest('div.product-order').getAttribute('data-id');

  sendAjaxRequest('post', '/cart/products/' + id + '/remove', null, deleteOrderHandler);

}

function deleteOrderHandler(){
  if (this.status != 200) window.location = '/';

  let response = JSON.parse(this.responseText);
  let product = response['product'];
  let quantity = response['quantity'];


  let price_cart =document.querySelector('div.shopping-cart .price');
  let price_nav = document.querySelector('#nav_cart');
  let price = Math.round((+price_cart.innerHTML - (+product.price* +quantity) ) * 100) / 100 ;

  price_cart.innerHTML = price;
  price_nav.innerHTML = `<i class="fa fa-shopping-cart"></i>${price} € `;


  let element = document.querySelector('div.product-order[data-id="' + product.id + '"]');
  element.remove();

}

function deleteReviewHandler(){
  if (this.status != 200) window.location = '/';

  let id = JSON.parse(this.responseText);


  let element = document.querySelector('div.review-container[data-id="' + id + '"]');
  element.remove();

}

function updateQuantityHandler(){
  if (this.status != 200) window.location = '/';

  let response = JSON.parse(this.responseText);
  let product = response['product'];
  let quantity = response['quantity'];
  let op = response['op'];

  let cart_quantity =document.querySelector('div.product-order[data-id="' + product.id + '"] .qty');
  let conf_quantity = document.querySelector('div.product-conf[data-id="' + product.id + '"] .qty');
  let price_cart =document.querySelector('div.shopping-cart .price');
  let price_nav = document.querySelector('#nav_cart');
  let price_conf =document.querySelector('#total-conf');


  if(quantity >=1){
     cart_quantity.value = quantity;
     conf_quantity.innerHTML = `<strong>Quantity:</strong>  ${quantity}`
  }

  let price =0;
  if(op== 'add')
    price = Math.round((+price_cart.innerHTML + +product.price) * 100) / 100 ;
  

  if(op== 'sub')
    price = Math.round((+price_cart.innerHTML - +product.price) * 100) / 100 ;
  
  if(price >0){
    price_cart.innerHTML = price;
    price_nav.innerHTML = `<i class="fa fa-shopping-cart"></i>${price} € ` 
    price_conf.innerHTML = price;
  }

}


// ---------------------------------
//            Review
//----------------------------------

function sendDeleteReviewRequest(button){
  let id = button.closest("div.review-container").getAttribute('data-id');

  sendAjaxRequest('post', '/products/reviews/' + id + '/delete', null, deleteReviewHandler);

//  /products/{id_product}/reviews/{id_review}/delete

}

function finalRateButtons(button){
  let id = button.getAttribute('id');
  let btn_number = id.charAt(3);

  for (i = 1; i <= btn_number; i++) {
    let btn = document.querySelector("#btn" +i);
    btn.classList.add('final');
  }

  for(i=1+ +btn_number; i<=5;i++){
    let btn = document.querySelector("#btn" +i);
    btn.classList.remove('final');
    btn.classList.remove('active');
  }

}

function activateRateButtons(button){
  let id = button.getAttribute('id');
  let btn_number = id.charAt(3);

  for (i = 1; i <= btn_number; i++) {
    let btn = document.querySelector("#btn" +i);
    btn.classList.add('active');
  }

}

function deactivateRateButtons(button){

  for (i = 1; i <= 5; i++) {
    let btn = document.querySelector("#btn" +i);
    if(btn.classList.contains('final'))
      continue;
    btn.classList.remove('active');
  }
}

function addReviewRequest(button,event) {
  let id = button.closest("div.review-section").getAttribute('data-id');

  // get comment
  let comment = document.querySelector("#comment").value;

  // get rate
  let rate;
  for (rate = 5; rate >0; rate--) {
    let btn = document.querySelector("#btn" +rate);
    if(btn.classList.contains('final'))
      break;
  }

  for (i=1; i<=5; i++) {
    let btn = document.querySelector("#btn" +i);
      btn.classList.remove('active');
      btn.classList.remove('final');
  }


  event.preventDefault();

  if (comment != '')
      sendAjaxRequest('put', '/products/' + id + '/reviews', {comment: comment, rate:rate} , addReviewHandler);

}

function addReviewHandler(){

  if (this.status != 200) window.location = '/';
  let response = JSON.parse(this.responseText);
  let review = response['review'];
  let user = response['user'];

  // Create the new review
  let new_review = createReview(review,user);

  // Reset the new card input
  let form = document.querySelector('form.submit-review');
  form.querySelector('#comment').value="";

  // Insert the new card
  let section = form.parentElement;
  section.prepend(new_review);
  new_review.before(document.createElement("HR"));
}

function createReview(review,user){
  let new_review = document.createElement('div');
  new_review.classList.add('row');


  let str = `
  <div class="col-sm-3 text-center">
        <img src="/images/avatars/default.png" class="rounded" height="60" width="60">
        <div class="review-block-name">${user.username}</div>
    <div class="review-block-date">${review.date}</div>
  </div>
  <div class="col-sm-9 col-md-8">
      <div class="review-block-rate">`
  for(i=0; i < 5; i++){
    if(i<review.score)
      str +=
      `<button type="button" class="btn btn-primary btn-sm ml-1" aria-label="Left Align" disabled>
          <i class="fa fa-star"></i>
        </button>`;
    else
      str +=
      `<button type="button" class="btn btn-dark btn-grey btn-sm ml-1" aria-label="Left Align" disabled>
        <i class="fa fa-star"></i>
      </button>`;
    }

    str +=`
    </div><br>
    <div class="review-block-description">${review.comment}</div>
    </div>
  `;
  new_review.innerHTML = str;

   return new_review;

}


// ---------------------------------
//            Favorites
//----------------------------------

function favoriteRequest(button) {

  let product = button.closest('div.product');
  let id = product.getAttribute('data-id');
  let value = button.value;

  if(value == "add")
    sendAjaxRequest('post', '/products/' + id + "/favorite",null,favoriteProductHandler);

  if(value == "remove")
    sendAjaxRequest('post', '/products/' + id + "/unfavorite",null, favoriteProductHandler );

  if(value == "list_remove")
    sendAjaxRequest('post', '/products/' + id + "/unfavorite",null, unfavProductHandler);
}


function favoriteProductHandler(){

  let product = JSON.parse(this.responseText);
  let button = document.querySelector('div.product[data-id="' + product.id + '"] #fav');

  if(button.value == "add"){
    button.innerHTML ='<i class="fa fa-trash"></i> Remove from Wishlist';
    button.value ="remove";
  }else{
    button.innerHTML ='<i class="fa fa-heart"></i> Add to Wishlist';
    button.value ="add";
  }
}

function unfavProductHandler(){

  let product = JSON.parse(this.responseText);
  let element = document.querySelector('div.product[data-id="' + product.id + '"]');

  element.remove();
}

// ---------------------------------
//         Profile Buttons
//----------------------------------

function changeProfilePill(pill){
  let active_pill = document.querySelector(".profile-user-menu li.active");

  active_pill.classList.remove('active');
  pill.classList.add('active');

}


addEventListeners();
