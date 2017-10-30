
function show(Class,n){
    var p = document.getElementById(Class+n);


  //  for(var rad in p){

        //alert(rad);
        p.style.display = "inline";
}
function hide(Class,n){
    var p = document.getElementById(Class+n);
    p.style.display = "none";
    //alert(p);
}
function edithide(Class,n){
  var p = document.getElementById(Class+n);
  p.style.display = "inline";

  //edit(Class,n);
}
