
function update(ObjectName,bloggID) {
  //alert(ObjectName.name+ObjectName.value + bloggID);
  //alert(ObjectName.value);

  alert(ObjectName.name);

  insertdb(ObjectName,bloggID);


  function insertdb(ObjectName,bloggID)
  {

    //alert(UserID);
        if (window.XMLHttpRequest)
        {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        else
        {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function()
        {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                //alert(xmlhttp.responseText);
            }
        };
      //alert("Helpers/Blogg_Check.php?choice=updateBlogg&bloggID="+bloggID+"&"+ObjectName.name+"="+ObjectName.value);

      xmlhttp.open("POST", "Blogg_Check.php", true);
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.send("choice=updateBlogg&bloggID="+bloggID+"&"+ObjectName.name + "=" +ObjectName.value);
};
}

function update2(CheckBox,UserID) {
  //alert(CheckBox.name+UserID);
  insertdb(CheckBox.name,UserID);
  function insertdb(CheckBox,UserID)
  {
    //alert(UserID);
        if (window.XMLHttpRequest)
        {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        else
        {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function()
        {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                alert(this.responseText);
            }
        };
        //Opens Highscore page on index
        var param = "UserID="+UserID+"&CheckBox="+CheckBox;
        //alert(param);
      xmlhttp.open("POST","Helpers/permission_Check.php",true);
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.send(param);
  };

}
