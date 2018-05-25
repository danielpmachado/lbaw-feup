function addEventListeners() {

  let fav_button = document.querySelector('#fav');
  if (fav_button != null)
  fav_button.onclick = function(){
    sendProductFavRequest(this);
  }

    //favorite_button.addEventListener('click', sendProductFavRequest);


  // let submit_button = document.querySelector('#submit_button');
  // if(submit_button!=null)
  //   submit_button.addEventListener('submit', add_comment);
  // });
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

function sendProductFavRequest(button) {
  let product = button.closest('div.product-buttons');
  let id = product.getAttribute('data-id');
  let value = button.value;
  
  if(value == "add")
    sendAjaxRequest('post', '/products/' + id + "/favorite",null,favoriteProductHandler);

  if(value == "remove")
    sendAjaxRequest('post', '/products/' + id + "/unfavorite",null, favoriteProductHandler );
}


function favoriteProductHandler(){
  let product = JSON.parse(this.responseText);
  let button = document.querySelector('div.product-buttons[data-id="' + product.id + '"] #fav');

  if(button.value == "add"){
    button.innerHTML ='<i class="fa fa-trash"></i> Remove from Wishlist';
    button.value ="remove";
  }else{
    button.innerHTML ='<i class="fa fa-heart"></i> Add to Wishlist';
    button.value ="add";
  }
}

function add_comment(event) {
  
}

addEventListeners();
