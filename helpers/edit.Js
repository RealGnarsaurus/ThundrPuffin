
function edit(Class,n){
    var p = document.getElementsByClassName(Class+n);

    for(var rad in p){

        //alert(rad);
        p[rad].style.display = "inline";


    }

}
function hide(Class,n){
  var p = document.getElementsByClassName(Class+n);
  for(var rad in p){
    //alert(p[rad]);
    p[rad].style.display = "none";
  }
}
