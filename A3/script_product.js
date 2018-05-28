var backup = [document.getElementsByClassName('text-editable').length];

function setEditable() {
    var elems = document.getElementsByClassName('text-editable');

    for(let i=0; i<elems.length; i++){
        elems[i].contentEditable = "true";
        backup[i] = elems[i].innerHTML;
    }

    document.getElementById("saveChangesProdut").style.display = "inline";
    document.getElementById("cancelChangesProdut").style.display = "inline";
    document.getElementById("editProdut").style.display = "none";
    document.getElementById("btnDeleteProduct").style.display = "none";

}

function saveChangesProdut(){
    var elems = document.getElementsByClassName('text-editable');

    for(let i=0; i<elems.length; i++){
        elems[i].contentEditable = "false";
    }

    //Guardar database
    document.getElementById("cancelChangesProdut").style.display = "none";
    document.getElementById("saveChangesProdut").style.display = "none";
    document.getElementById("editProdut").style.display = "inline";
    document.getElementById("btnDeleteProduct").style.display = "inline";
}

function cancelChangesProdut(){
    var elems = document.getElementsByClassName('text-editable');

    for(var i=0; i<elems.length; i++){
        elems[i].contentEditable = "false";
        elems[i].innerHTML = backup[i];
    }

    document.getElementById("cancelChangesProdut").style.display = "none";
    document.getElementById("saveChangesProdut").style.display = "none";
    document.getElementById("editProdut").style.display = "inline";
    document.getElementById("btnDeleteProduct").style.display = "inline";
}


jQuery(document).ready(function($) {
  var alterClass = function() {
    var ww = document.body.clientWidth;
    if (ww < 400) {
      $('.test').removeClass('blue');
    } else if (ww >= 401) {
      $('.test').addClass('blue');
    };
  };
  $(window).resize(function(){
    alterClass();
  });
  //Fire it when the page first loads:
  alterClass();
});
