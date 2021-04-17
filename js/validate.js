let digitValidate = function (ele) {

    ele.value = ele.value.replace(/[^0-9]/g, "");

   
  };
  let stringValidate = function (ele) {
    ele.value = ele.value.replace(/[0-9]/g, "");

    ele.maxLength = 10

    

  };


  let dateValidate = function(){


    document.getElementById("dob") = Date();

  }



