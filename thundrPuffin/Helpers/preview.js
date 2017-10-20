function preview(event,output){
    //alert(event);
    //alert(output);
    //alert("Work dammit");
      var output = document.getElementById(output);
      output.src = URL.createObjectURL(event.target.files[0]);
  }
