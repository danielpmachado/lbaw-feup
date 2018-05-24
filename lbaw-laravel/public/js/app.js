function addEventListeners() {
    let favorites = document.querySelectorAll('.purchases-buttons .fav');
    [].forEach.call(favoriteProduct, function(favorite) {
      favorite.addEventListener('click', sendFavoriteRequest);
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


function sendFavoriteRequest() {
    let id = this.closest('article').getAttribute('data-id');

  
    sendAjaxRequest('post', '/api/item/' + id, {done: checked}, itemUpdatedHandler);
  }

  addEventListeners();