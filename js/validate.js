let digitValidate = function (ele) {

    ele.value = ele.value.replace(/[^0-9]/g, "");

   
  };
  let stringValidate = function (ele) {
    ele.value = ele.value.replace(/[0-9]/g, "");

    ele.maxLength = 10

    

  };


  function validateContact(ele){


    if (el.value.length != 10) {
      alert("length must be exactly 10 characters")
    }

  }



