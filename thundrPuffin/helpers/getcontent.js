//Opens Manage User
function loadDoc() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("content").innerHTML =
        this.responseText;
      }
    };
    xhttp.open("GET", "../Permission.php", true);
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
      xhttp.open("GET", "../MyProfile.php", true);
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
    xhttp.open("GET", "../ManageBlogg.php", true);
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
    xhttp.open("GET", "../ReportHistory.php", true);
    xhttp.send();
}
