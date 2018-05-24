function addEventListeners() {

  let favorite_button = document.querySelector('#fav');
  if (favorite_button != null)
    favorite_button.addEventListener('click', sendProductFavRequest);


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

function sendProductFavRequest() {
  console.log("fav");
  let product = this.closest('div.product');
  let id = product.getAttribute('data-id');
  
  sendAjaxRequest('post', '/products/' + id + "/favorite");
}

function add_comment(event) {
  
}

addEventListeners();
