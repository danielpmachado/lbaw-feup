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

  let comment_button = document.querySelector('form.submit-review');
  if(comment_button!=null)
    comment_button.onclick = function(){
      addReviewRequest(this);
  }

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
//         Profile Buttons
//----------------------------------

function changeProfilePill(pill){
  let active_pill = document.querySelector(".profile-user-menu li.active");
  
  active_pill.classList.remove('active');
  pill.classList.add('active');

}


// ---------------------------------
//            Review
//----------------------------------

function addReviewRequest(form) {

  event.preventDefault();

  let id = form.closest("div.review-section").getAttribute('data-id');
  let comment = document.querySelector("#comment").value;

  if (comment != '')
      sendAjaxRequest('put', '/products/' + id + '/reviews', {comment: comment} , addReviewHandler);

}

function addReviewHandler(){

  // console.log('ola');
  // if (this.status != 200) window.location = '/';
  // let newReview = JSON.parse(this.responseText);

  // let review = document.createElement('div');
  // review.setAttribute('class', 'row');
  // review.setAttribute('data-id', newReview.id);
  // console.log(newReview);
  // /*let date = SplitDateReturn(newReview.date,0);*/

  // review.innerHTML = `<div class="row">
  // <div class="col-sm-3 text-center">
  //     <img src="/images/avatars/default.png" class="rounded" height="60" width="60">
  //     <div class="review-block-name">username</div>
  // <div class="review-block-date">2019-10-23<br/>1 day ago</div>
  // </div>
  // <div class="col-sm-9 col-md-8">
  //     <div class="review-block-rate">  
  //         <button type="button" class="btn btn-primary btn-sm" aria-label="Left Align" disabled>
  //             <i class="fa fa-star"></i>
  //         </button>
  //         <button type="button" class="btn btn-primary btn-sm" aria-label="Left Align" disabled>
  //             <i class="fa fa-star"></i>
  //         </button>
  //         <button type="button" class="btn btn-primary btn-sm" aria-label="Left Align" disabled>
  //             <i class="fa fa-star"></i>
  //         </button>
  //         <button type="button" class="btn btn-dark btn-grey btn-sm" aria-label="Left Align" disabled>
  //             <i class="fa fa-star"></i>
  //         </button>
  //         <button type="button" class="btn btn-dark btn-grey btn-sm" aria-label="Left Align" disabled>
  //             <i class="fa fa-star"></i>
  //         </button>
  //     </div>
  //     <div class="review-block-title" style="margin-top:10px;"> <strong>The Review</strong> </div>
  //     <div class="review-block-description">${newReview.comment}</div>
  // </div>`;
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


addEventListeners();
