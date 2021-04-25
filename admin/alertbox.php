<style type="text/css">

#modalContainer {
  display: flex;
  width: 100%;
  height: 100%;
  align-items: center;
  justify-content: center;
  margin: 0px auto;
  padding: 0px auto;
  left: 0;
  top: 0;
  overflow: hidden;
  position: fixed;
  background: rgb(0, 0, 0, 0.3);
  z-index: 999999;
}

#alertBox {
   background: #fff;
  min-height: 100px;
  width: 300px;
  box-shadow: 5px 5px 10px rgb(0, 0, 0, 0.2);
  border-radius: 10px;
  animation: open-frame 0.3s linear;
}

#alertBoxu {
   background: #fff;
  min-height: 100px;
  width: 300px;
  box-shadow: 5px 5px 10px rgb(0, 0, 0, 0.2);
  border-radius: 10px;
  animation: open-frame 0.3s linear;
}

#modalContainer > #alertBox {
    position:fixed;
}


#modalContainer > #alertBoxu {
    position:fixed;
}

#alertBox h1 {
    margin:0;
    border-top-right-radius:  10px;
    border-top-left-radius:  10px;
    text-align: center;
    font:bold 1em Raleway,arial;
    background-color:green;
    color:#FFF;
    border-bottom:1px solid #f97352;
    padding:10px 0 10px 5px;
}
#alertBoxu h1
{
    margin:0;
    border-top-right-radius:  10px;
    border-top-left-radius:  10px;
    text-align: center;
    font:bold 1em Raleway,arial;
    background-color:red;
    color:#FFF;
    border-bottom:1px solid #f97352;
    padding:10px 0 10px 5px;
}
#alertBox p {
    height:50px;
    padding-left:5px;
  padding-top:30px;
  text-align:center;
  vertical-align:middle;
}

#alertBoxu p {
    height:50px;
    padding-left:5px;
  padding-top:30px;
  text-align:center;
  vertical-align:middle;
}

#alertBox #closeBtn {
    display:block;
    position:relative;
    margin:10px auto 10px auto;
    padding:7px;
    border-radius: 10px;
    width:70px;
    text-transform:uppercase;
    text-align:center;
    color:#FFF;
    background-color:green;
    text-decoration:none;
  outline:0!important;
}

#alertBoxu #closeBtnu {
  display:block;
    position:relative;
    margin:10px auto 10px auto;
    padding:7px;
    border-radius: 10px;
    width:70px;
    text-transform:uppercase;
    text-align:center;
    color:#FFF;
    background-color:red;
    text-decoration:none;
  outline:0!important;
}

/* unrelated styles */

#mContainer {
    position:relative;
    width:600px;
    margin:auto;
    padding:5px;
    border-top:2px solid #fff;
    border-bottom:2px solid #fff;
}

h1,h2 {
    margin:0;
    padding:4px;
}

code {
    font-size:1.2em;
    color:#069;
}

#credits {
    position:relative;
    margin:25px auto 0px auto;
    width:350px; 
    font:0.7em verdana;
    border-top:1px solid #000;
    border-bottom:1px solid #000;
    height:90px;
    padding-top:4px;
}

#credits img {
    float:left;
    margin:5px 10px 5px 0px;
    border:1px solid #000000;
    width:80px;
    height:79px;
}

.important {
    background-color:#F5FCC8;
    padding:2px;

}

@media (max-width: 600px) 
{
  #alertBox {
    position:relative;
    width:90%;
  top:30%;
}

@media (max-width: 600px) 
{
  #alertBoxu {
    position:relative;
    width:90%;
  top:30%;
}
    </style>

<script type="text/javascript">

var ALERT_TITLE = "Success";
var ALERT_TITLEu = "Fail!";
var ALERT_BUTTON_TEXT = "Ok";

     function suc(msg ,r) 
    {
        createCustomAlert(msg,r);
    }
function createCustomAlert(txt,r) {
    d = document;

    if(d.getElementById("modalContainer")) return;

    mObj = d.getElementsByTagName("body")[0].appendChild(d.createElement("div"));
    mObj.id = "modalContainer";
    mObj.style.height = d.documentElement.scrollHeight + "px";
    
    alertObj = mObj.appendChild(d.createElement("div"));
    alertObj.id = "alertBox";
    if(d.all && !window.opera) alertObj.style.top = document.documentElement.scrollTop + "px";
    alertObj.style.left = (d.documentElement.scrollWidth - alertObj.offsetWidth)/2 + "px";
    alertObj.style.visiblity="visible";

    h1 = alertObj.appendChild(d.createElement("h1"));
    h1.appendChild(d.createTextNode(ALERT_TITLE));

    msg = alertObj.appendChild(d.createElement("p"));
    //msg.appendChild(d.createTextNode(txt));
    msg.innerHTML = txt;

    btn = alertObj.appendChild(d.createElement("a"));
    btn.id = "closeBtn";
    btn.appendChild(d.createTextNode(ALERT_BUTTON_TEXT));
    btn.href = r;
    btn.focus();
   
    alertObj.style.display = "block";   
}



 function uns(msg,r) 
    {
        createCustomAler(msg,r);
    }
function createCustomAler(txt,r) {
    d = document;

    if(d.getElementById("modalContainer")) return;

    mObj = d.getElementsByTagName("body")[0].appendChild(d.createElement("div"));
    mObj.id = "modalContainer";
    mObj.style.height = d.documentElement.scrollHeight + "px";
    
    alertObj = mObj.appendChild(d.createElement("div"));
    alertObj.id = "alertBoxu";
    if(d.all && !window.opera) alertObj.style.top = document.documentElement.scrollTop + "px";
    alertObj.style.left = (d.documentElement.scrollWidth - alertObj.offsetWidth)/2 + "px";
    alertObj.style.visiblity="visible";

    h1 = alertObj.appendChild(d.createElement("h1"));
    h1.appendChild(d.createTextNode(ALERT_TITLEu));

    msg = alertObj.appendChild(d.createElement("p"));
    //msg.appendChild(d.createTextNode(txt));
    msg.innerHTML = txt;

    btn = alertObj.appendChild(d.createElement("a"));
    btn.id = "closeBtnu";
    btn.appendChild(d.createTextNode(ALERT_BUTTON_TEXT));
    btn.href = r;
    btn.focus();
    alertObj.style.display = "block";   
}
</script>
