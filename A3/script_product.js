

function setEditable() {
    var elems = document.getElementsByClassName('text-editable');

    for(var i=0; i<elems.length; i++){
        elems[i].contentEditable = "true";
    }

    document.getElementById("saveChangesProdut").style.display = "inline";
    document.getElementById("editProdut").style.display = "none";

}

function setNotEditable(){
    var elems = document.getElementsByClassName('text-editable');

    for(var i=0; i<elems.length; i++){
        elems[i].contentEditable = "false";
    }

    document.getElementById("saveChangesProdut").style.display = "none";
    document.getElementById("editProdut").style.display = "inline";
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
