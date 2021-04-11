

logs = document.getElementById("printLogs")
setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "printLogs.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;

        logs.innerHTML = data;
      
      }
    }

  }
  xhr.send();

}, 500);