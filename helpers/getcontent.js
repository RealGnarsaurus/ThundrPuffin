//Opens Manage User
function loadDoc() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("content").innerHTML =
        this.responseText;
      }
    };
    xhttp.open("GET", "../permission.php", true);
    xhttp.send();
  }
  //Opens My Profile
  function MyProfile() {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("content").innerHTML =
          this.responseText;
        }
      };
      xhttp.open("GET", "../myprofile.php", true);
      xhttp.send();
    }
    //Opens deleted messages
    function deletehistory() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("content").innerHTML =
            this.responseText;
          }
        };
        xhttp.open("GET", "../deletehistory.php", true);
        xhttp.send();
      }
  //opens Custommize Blogg
function blogSettings() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("content").innerHTML =
            this.responseText;
        }
    };
    xhttp.open("GET", "../manageblogg.php", true);
    xhttp.send();
    document.getElementById("content").style.height = "auto";
}
//open flagreports
function showFlagReports() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("content").innerHTML =
            this.responseText;
        }
    };
    xhttp.open("GET", "../reporthistory.php", true);
    xhttp.send();
}
//open Eula
function eula() {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          myWindow = window.open("helpers/eula.php", "_blank", "toolbar=yes,scrollbars=yes,resizable=no,top=200,left=300,width=1210,height=620");
          popupBlockerChecker.check(myWindow);
          myWindow.document.write(this.responseText);

        }
    };
    xhttp.open("GET", "helpers/eula.php", true);
    xhttp.send();

}
function popup(popupid) {
  //alert(popupid)
   var popup = document.getElementById(popupid);
   popup.classList.toggle("show");
}
var popupBlockerChecker = {
        check: function(popup_window){
            var _scope = this;
            if (popup_window) {
                if(/chrome/.test(navigator.userAgent.toLowerCase())){
                    setTimeout(function () {
                        _scope._is_popup_blocked(_scope, popup_window);
                     },200);
                }else{
                    popup_window.onload = function () {
                        _scope._is_popup_blocked(_scope, popup_window);
                    };
                }
            }else{
                _scope._displayError();
            }
        },
        _is_popup_blocked: function(scope, popup_window){
            if ((popup_window.innerHeight > 0)==false){ scope._displayError(); }
        },
        _displayError: function(){
            alert("Popup Blocker is Enabled! Please Add This Site To Your Exception List\n Or Agree In Blindness.");
        }
    };
