
function edit(Class,n){
    var p = document.getElementById(Class+n);


  //  for(var rad in p){

        //alert(rad);
        p.style.display = "inline";




}
function edithide(Class,n,Class2,n2){
  var p = document.getElementById(Class2+n2);

    p.style.display = "none";


  edit(Class,n);
}
