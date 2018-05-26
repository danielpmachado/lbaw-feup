function addEventListeners() {

  let fav_button = document.querySelectorAll(' #fav');
  [].forEach.call(fav_button, function(fav) {
    fav.onclick = function(){
          sendProductFavRequest(this);
    }
  });

  let submit_button = document.querySelector('#submit_button');
  if(submit_button!=null)
    submit_button.addEventListener('submit', add_comment);

  let submit_review = document.querySelector('#submit_review');
  if(submit_review)
    submit_review.addEventListener('submit', addReviewRequest);  

}

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

// ---------------------------------
//            Favorites
//----------------------------------

function sendProductFavRequest(button) {
  
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
//            Review
//----------------------------------

function addReviewRequest() {
  console.log('text 0');

  let text = document.querySelector(".submit-comment .form-group textarea").value;
  let id = this.closest(".product-section").getAttribute('data-id');

  if (text != ''){
      console.log('text 1');
      sendAjaxRequest('post', '/review/' + id , null , addReviewHandler);
      console.log('text 2');
    }
      /*{
          comment: text
      }, addReviewHandler);*/

}

function addReviewHandler(){

  console.log('ola');
  if (this.status != 200) window.location = '/';
  let newReview = JSON.parse(this.responseText);

  let review = document.createElement('div');
  review.setAttribute('class', 'row');
  review.setAttribute('data-id', newReview.id);
  console.log(newReview);
  /*let date = SplitDateReturn(newReview.date,0);*/

  review.innerHTML = `<div class="row">
  <div class="col-sm-3 text-center">
      <img src="/images/avatars/default.png" class="rounded" height="60" width="60">
      <div class="review-block-name">username</div>
  <div class="review-block-date">2019-10-23<br/>1 day ago</div>
  </div>
  <div class="col-sm-9 col-md-8">
      <div class="review-block-rate">
          <button type="button" class="btn btn-primary btn-sm" aria-label="Left Align" disabled>
              <i class="fa fa-star"></i>
          </button>
          <button type="button" class="btn btn-primary btn-sm" aria-label="Left Align" disabled>
              <i class="fa fa-star"></i>
          </button>
          <button type="button" class="btn btn-primary btn-sm" aria-label="Left Align" disabled>
              <i class="fa fa-star"></i>
          </button>
          <button type="button" class="btn btn-dark btn-grey btn-sm" aria-label="Left Align" disabled>
              <i class="fa fa-star"></i>
          </button>
          <button type="button" class="btn btn-dark btn-grey btn-sm" aria-label="Left Align" disabled>
              <i class="fa fa-star"></i>
          </button>
      </div>
      <div class="review-block-title" style="margin-top:10px;"> <strong>The Review</strong> </div>
      <div class="review-block-description">${newReview.comment}</div>
  </div>`;
}

addEventListeners();
