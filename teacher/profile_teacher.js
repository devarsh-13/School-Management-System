const form = document.querySelector(".ed_tabpersonal"),

oldpassword=document.getElementById("oldpassword"),
password=document.getElementById("password"),
password2=document.getElementById("password2"),
sendBtn = document.getElementById("submit");
error2 = document.getElementById("error2");
error1 = document.getElementById("error1");
change_done = document.getElementById("change_done");

form.onsubmit = (e)=>{
    e.preventDefault();
}


sendBtn.onclick = ()=>{
    console.log(oldpassword.value)
    console.log(password.value)
    console.log(password2.value)
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "profile_change_password_teacher.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            oldpassword.value=""
            password.value=""
            password2.value=""
            error2.value=""
            error1.value=""
            change_done.value="Password has been changed"
          }
          else if(xhr.status === 400)
          {
            change_done.value=""
            error2.value="Please Enter same passwords"
            error1.value=""
          }
          else if(xhr.status === 500)
          {
            change_done.value=""
            error1.value="Your old password is incorrect"
            error2.value=""
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}