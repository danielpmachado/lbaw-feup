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
    console.log(i);
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

function addReviewRequest(form) {

  event.preventDefault();

  let id = form.closest("div.review-section").getAttribute('data-id');
  let comment = document.querySelector("#comment").value;

  if (comment != '')
      sendAjaxRequest('put', '/products/' + id + '/reviews', {comment: comment} , addReviewHandler);

}

function addReviewHandler(){

  if (this.status != 200) window.location = '/';
  let review = JSON.parse(this.responseText);

  // Create the new review
  let new_review = createReview(review);

  console.log(new_review);

  // Reset the new card input
  let form = document.querySelector('form.submit-review');
  form.querySelector('#comment').value="";

  // Insert the new card
  let section = form.parentElement;
  section.prepend(new_review);
  new_review.before(document.createElement("HR"));
}

function createReview(review){
  let new_review = document.createElement('div');
  new_review.classList.add('row');
  
  new_review.innerHTML = `
  <div class="col-sm-3 text-center">
        <img src="/images/avatars/default.png" class="rounded" height="60" width="60">
        <div class="review-block-name">${review.id_user}</div>
    <div class="review-block-date">${review.date}</div>
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
      </div><br>
      <div class="review-block-description">${review.comment}</div>
  </div>
  `;

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
