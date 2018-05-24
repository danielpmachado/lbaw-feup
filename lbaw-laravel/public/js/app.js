function addEventListeners() {

  let favorite_button = document.querySelector('#fav');
  if (favorite_button != null)
    favorite_button.addEventListener('submit', sendProductFavRequest);


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
  let product = this.closest('div');
  let id = item.getAttribute('data-id');
  let checked = item.querySelector('input[type=checkbox]').checked;

  sendAjaxRequest('post', '/api/item/' + id, {done: checked}, itemUpdatedHandler);
}

function add_comment(event) {
  
}

addEventListeners();
