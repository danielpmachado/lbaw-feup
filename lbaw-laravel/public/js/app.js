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

  let fav_button = document.querySelectorAll(' #fav');
  [].forEach.call(fav_button, function(fav) {
    fav.onclick = function(){
      favoriteRequest(this);
    }
  });

  let profile_button = document.querySelectorAll(".profile-user-menu li");
  [].forEach.call(profile_button, function(change) {
    change.onclick = function(){
      changeProfilePill(this);
    }
  });

  let comment_button = document.querySelector('form.submit-review #submit_review');
  if(comment_button!=null)
    comment_button.onclick = function(){
      addReviewRequest(this);
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

  // let search_bar = document.getElementById("search_bar");
  // let search_button =document.getElementById("search_button");
  // search_button.onclick= function(){
  //   console.log("ola");
  // }

  let order_deleter = document.querySelectorAll('.product-order #delete');
  [].forEach.call(order_deleter, function(deleter) {
    deleter.onclick = function(){
      sendDeleteOrderRequest(this);
    }
  });

  let quantity_button = document.querySelectorAll('.product-order #quantity');
  [].forEach.call(quantity_button, function(changer) {
    changer.onclick = function(){
      sendUpdateQuantityRequest(this);
    }
  });

  let cart_button = document.querySelector('.product-buttons #cart');
  if(cart_button!=null)
  cart_button.onclick = function(){
    console.log("Fsd");
    sendAddCartRequest(this);
}


}

// ---------------------------------
//            Cart
//----------------------------------

function sendUpdateQuantityRequest(button){
  let id = button.closest('div.product-order').getAttribute('data-id');
  let value = button.value;

  if(value == "+")
    sendAjaxRequest('post', '/cart/products/' + id + "/add",null,updateQuantityHandler);
  
  if(value == "-")
    sendAjaxRequest('post', '/cart/products/' + id + "/sub",null,updateQuantityHandler);

}

function sendDeleteOrderRequest(button){
  let id = button.closest('div.product-order').getAttribute('data-id');

  sendAjaxRequest('post', '/cart/products/' + id + '/remove', null, deleteOrderHandler);

}

function deleteOrderHandler(){
  let product = JSON.parse(this.responseText);
  let element = document.querySelector('div.product-order[data-id="' + product.id + '"]');

  element.remove();

}

function updateQuantityHandler(){
  if (this.status != 200) window.location = '/';

  let response = JSON.parse(this.responseText);
  let product = response['product'];
  let quantity = response['quantity'];
  let op = response['op'];

  let element =document.querySelector('div.product-order[data-id="' + product.id + '"] .qty');
  let price =document.querySelector('div.shopping-cart .price');

  if(quantity >=1)
    element.value = quantity;

  
  if(op== 'add')
    price.innerHTML = Math.round((+price.innerHTML + +product.price) * 100) / 100 ;

  if(op== 'sub')
    price.innerHTML =Math.round((+price.innerHTML - +product.price) * 100) / 100 ;
  

}


// ---------------------------------
//            Review
//----------------------------------
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

function addReviewRequest(button) {
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
  console.log(review.score);
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
      `<button type="button" class="btn  btn-primary btn-sm ml-1" aria-label="Left Align" disabled>
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
