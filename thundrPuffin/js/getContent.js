function loadDoc() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("content").innerHTML =
        this.responseText;
      }
    };
    xhttp.open("GET", "../admin/ajax_info.txt", true);
    xhttp.send();
  }
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
function showFlagReports() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("content").innerHTML =
            this.responseText;
        }
    };
    xhttp.open("GET", "../admin/showFlagReports.php", true);
    xhttp.send();
}