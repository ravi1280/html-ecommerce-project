(function () {
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var text = request.responseText;
      var dataObj = JSON.parse(text);
      const ctx = document.getElementById("myChart");

      new Chart(ctx, {
        type: "doughnut",
        data: {
          labels: ["All Users", "All Category", "All Products"],
          datasets: [
            {
              label: "Item Count",
              data: dataObj,
              borderWidth: 1,
            },
          ],
        },
        // options: {
        //   scales: {
        //     y: {
        //       beginAtZero: true,
        //     },
        //   },
        // },
      });
    }
  };
  request.open("GET", "adminChartLoader.php", true);
  request.send();
})();

function viewAlerBox(message) {
  return new Promise((resolve) => {
    document.getElementById("txtMessage").innerHTML = message;
    document.getElementById("alertBox").style.display = "block";

    document.getElementById("alertCloseBtn").addEventListener(
      "click",
      () => {
        closeMessage();
        resolve(true);
      },
      { once: true }
    );
  });
}

function closeMessage() {
  document.getElementById("alertBox").style.display = "none";
}

header;
function header() {
  window.location = "homePage2.php";
}

function signUp() {
  var f = document.getElementById("f");
  var l = document.getElementById("l");
  var e = document.getElementById("e");
  var p = document.getElementById("p");
  var m = document.getElementById("m");
  var g = document.getElementById("g");

  var form = new FormData();

  form.append("f", f.value);
  form.append("l", l.value);
  form.append("e", e.value);
  form.append("p", p.value);
  form.append("m", m.value);
  form.append("g", g.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var text = request.responseText;
      if (text == "success") {
        // document.getElementById("msg").innerHTML = text;
        // document.getElementById("msg").className = "bi bi-check2-circle fs-5";
        // document.getElementById("alertdiv").className = "alert alert-success";
        // document.getElementById("msgdiv").className = "d-block";
        window.location = "signin.php";
      } else {
        // document.getElementById("msg").innerHTML = text;
        // document.getElementById("msgdiv").className = "d-block";
        document.getElementById("warningMsg").innerHTML = text;
        alert(t);
      }
    }
  };
  request.open("POST", "signUpProcess.php", true);
  request.send(form);
}

function signinpage() {
  window.location = "signin.php";
}
function signuppage() {
  window.location = "index.php";
}

function signin() {
  var email = document.getElementById("email2");
  var password = document.getElementById("password2");
  var rememberme = document.getElementById("rememberme");

  var f = new FormData();
  f.append("e", email.value);
  f.append("p", password.value);
  f.append("r", rememberme.checked);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        window.location = "homePage2.php";
      } else {
        document.getElementById("msg2").innerHTML = t;
      }
    }
  };

  r.open("POST", "signInProcess.php", true);
  r.send(f);
}
var alert1;
var bm;
function forgotPassword() {
  var email = document.getElementById("email2");

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        var m = document.getElementById("forgotPasswordModel");
        bm = new bootstrap.Modal(m);
        // alert1.hide();
        bm.show();
      } else {
        // document.getElementById("alertContend").innerHTML = t;
        // var m = document.getElementById("alertBox");
        // alert1 = new bootstrap.Modal(m);
        // alert1.show();
        // viewAlerBox(message);
        viewAlerBox(t).then((result) => {
          if (result) {
            // your code here...
          }
        });
      }
    }
  };
  r.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
  r.send();
}
function ShowPassword1() {
  var i = document.getElementById("npi");

  var eye = document.getElementById("e1");

  if (i.type == "password") {
    i.type = "text";
    eye.className = "bi bi-eye-fill";
  } else {
    i.type = "password";
    eye.className = "bi bi-eye-slash-fill";
  }
}
function ShowPassword2() {
  var i = document.getElementById("rnp");

  var eye = document.getElementById("e2");

  if (i.type == "password") {
    i.type = "text";
    eye.className = "bi bi-eye-fill";
  } else {
    i.type = "password";
    eye.className = "bi bi-eye-slash-fill";
  }
}

function resetpw() {
  var email = document.getElementById("email2");
  var np = document.getElementById("npi");
  var rnp = document.getElementById("rnp");
  var vcode = document.getElementById("vc");

  var f = new FormData();
  f.append("e", email.value);
  f.append("n", np.value);
  f.append("r", rnp.value);
  f.append("v", vcode.value);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        bm.hide();
        viewAlerBox(t).then((result) => {
          if (result) {
          }
        });
      } else {
        alert(t);
      }
    }
  };
  r.open("POST", "resetPassword.php", true);
  r.send(f);
}

function al() {
  // alert("Out Of Stock");
  viewAlerBox("Out Of Stock").then((result) => {
    if (result) {
    }
  });
}

function qty_inc(qty) {
  var input = document.getElementById("qty_input");
  if (input.value < qty) {
    var newValue = parseInt(input.value) + 1;
    input.value = newValue.toString();
  } else {
    viewAlerBox("Maximum quantity has achieved").then((result) => {
      if (result) {
      }
    });
    input.value = qty;
  }
}

function qty_dec() {
  var input = document.getElementById("qty_input");
  if (input.value > 1) {
    var newValue = parseInt(input.value) - 1;
    input.value = newValue.toString();
  } else {
    // alert("Minimum quantity has achieved");
    viewAlerBox("Minimum quantity has achieved").then((result) => {
      if (result) {
      }
    });
    input.value = 1;
  }
}
function signout() {
  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        viewAlerBox("Success").then((result) => {
          if (result) {
          }
        });
        window.location.reload();
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "signOutProcess.php", true);
  r.send();
}

function shirt() {
  window.location = "product2.php#shirt";
}

function tshirt() {
  window.location = "product2.php#tshirt";
}

function pants() {
  window.location = "product2.php#pants";
}

function sportKit() {
  window.location = "product2.php#sportKit";
}

function cap() {
  window.location = "product2.php#cap";
}

function shoes() {
  window.location = "product2.php#shoes";
}

function changeImage() {
  // img tag
  var view = document.getElementById("viewImg");

  // file chooser
  var file = document.getElementById("profileimage");

  file.onchange = function () {
    var file1 = this.files[0];
    var url = window.URL.createObjectURL(file1);
    view.src = url;
  };
}

function addToCart(id) {
  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      viewAlerBox(t).then((result) => {
        if (result) {
          window.location = "cart.php";
        }
      });
    }
  };
  r.open("GET", "addToCartProcess.php?id=" + id, true);
  r.send();
}

function deleteFromCart(id) {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        viewAlerBox(t).then((result) => {
          if (result) {
            window.location.reload();
          }
        });
        
      } else {
        alert(t);
        viewAlerBox(t).then((result) => {
          if (result) {
            window.location.reload();
          }
        });
      }
    }
  };
  r.open("GET", "deleteFromCartProcess.php?id=" + id, true);
  r.send();
}

function searchCart() {
  window.location = "product2.php";
}

function updateProfile() {
  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var mobile = document.getElementById("mobile");
  var line1 = document.getElementById("line1");
  var line2 = document.getElementById("line2");
  var province = document.getElementById("province");
  var district = document.getElementById("district");
  var city = document.getElementById("city");
  var pcode = document.getElementById("pcode");
  var image = document.getElementById("profileimage");


  var f = new FormData();
  f.append("fn", fname.value);
  f.append("ln", lname.value);
  f.append("m", mobile.value);
  f.append("l1", line1.value);
  f.append("l2", line2.value);
  f.append("p", province.value);
  f.append("d", district.value);
  f.append("c", city.value);
  f.append("pc", pcode.value);

  if (image.files.length == 0) {
    var confirmation = confirm(
      "Are You Sure Do You Don't want to Update Profile Image?"
      
      
    );
    if (confirmation) {
    
      viewAlerBox("You Have Not Select Any Image").then((result) => {
        if (result) {
         
        }
      });
    }
  } else {
    f.append("image", image.files[0]);
  }

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        viewAlerBox(t).then((result) => {
          if (result) {
            window.location.reload();
          }
        });
       
      } else {
        viewAlerBox(t).then((result) => {
          if (result) {
           
          }
        });
      }
    }
  };
  r.open("POST", "updateProfileProcess.php", true);
  r.send(f);
}

function Activation(email) {
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var txt = request.responseText;
      if (txt == "blocked") {
        document.getElementById("btn" + email).innerHTML = "Deactive";
        document.getElementById("btn" + email).classList =
          "btn btn-outline-danger";
       
        viewAlerBox("Success").then((result) => {
          if (result) {
            window.location.reload();
          }
        });

      } else if (txt == "unblocked") {
        document.getElementById("btn" + email).innerHTML = "Active";
        document.getElementById("btn" + email).classList =
          "btn btn-outline-success";
          viewAlerBox("Success").then((result) => {
            if (result) {
              window.location.reload();
            }
          });
      } else {
        viewAlerBox(txt).then((result) => {
          if (result) {
            window.location.reload();
          }
        });
      }
    }
  };
  request.open("GET", "UserBlockProcess.php?email=" + email, true);
  request.send();
}

var u;
function UmoreModel(email) {
  var m = document.getElementById("moreModel" + email);
  u = new bootstrap.Modal(m);
  u.show();
}

var messsage;

function aMessage(email) {
  var m = document.getElementById("moreModeli" + email);
  messsage = new bootstrap.Modal(m);
  messsage.show();
}

function categorystatus(id) {
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var txt = request.responseText;
      if (txt == "success") {
        window.location.reload();
      } else {
        alert(txt);

        window.location.reload();
      }
    }
  };
  request.open("GET", "categoryStatusChangeProcess.php?id=" + id, true);
  request.send();
}
function sizestatus(id) {
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var txt = request.responseText;
      if (txt == "success") {
        window.location.reload();
      } else {
        alert(txt);

        window.location.reload();
      }
    }
  };
  request.open("GET", "sizeStatusChangeProcess.php?id=" + id, true);
  request.send();
}
function colourstatus(id) {
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var txt = request.responseText;
      if (txt == "success") {
        window.location.reload();
      } else {
        alert(txt);

        window.location.reload();
      }
    }
  };
  request.open("GET", "colourStatusChangeProcess.php?id=" + id, true);
  request.send();
}

function newsize() {
  $size_name = document.getElementById("newsize");
  $size = $size_name.value;

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == "success") {
        viewAlerBox(t).then((result) => {
          if (result) {
            window.location.reload();
          }
        });
      } else {
        viewAlerBox(t).then((result) => {
          if (result) {
            window.location.reload();
          }
        });
      }
    }
  };
  r.open("GET", "addsizeProcess.php?size=" + $size, true);
  r.send();
}
function newColour() {
  $Colour_name = document.getElementById("newColour");
  $Colour1 = $Colour_name.value;

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      viewAlerBox(t).then((result) => {
        if (result) {
          window.location.reload();
        }
      });
    }
  };
  r.open("GET", "addColourProcess.php?clr=" + $Colour1, true);
  r.send();
}
function newCategoery() {
  $cat_name = document.getElementById("newCategory");
  $cat = $cat_name.value;

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      viewAlerBox(t).then((result) => {
        if (result) {
          window.location.reload();
        }
      });
    }
  };
  r.open("GET", "addCategoeryProcess.php?cat=" + $cat, true);
  r.send();
}
function Uremove(mobile) {
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var txt = request.responseText;
      // alert(txt);

      window.location.reload();
    }
  };
  request.open("GET", "UserRemoveProcess.php?mobile=" + mobile, true);
  request.send();
}
var newModel;
var advance;
function changeViwe() {
  var email = document.getElementById("email");
  var f = new FormData();
  f.append("email", email.value);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        var adminVerificationModal =
          document.getElementById("verificationModal");
        advance = new bootstrap.Modal(adminVerificationModal);
        advance.show();
      } else {
        viewAlerBox(t).then((result) => {
          if (result) {
            window.location.reload();
          }
        });
      }
    }
  };

  r.open("POST", "adminVerificationProcess.php", true);
  r.send(f);
}
function adminVerify() {
  var verification = document.getElementById("vcode");
  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        advance.hide();
        window.location = "admin.php";
      } else {
        viewAlerBox(t).then((result) => {
          if (result) {
            
          }
        });
      }
    }
  };

  r.open("GET", "adminCodeVerification.php?v=" + verification.value, true);
  r.send();
}

function loginOrSignUp() {
  window.location = "index.php";
}

function pActivation(id) {
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var txt = request.responseText;
      if (txt == "blocked") {
        document.getElementById("pbtn" + id).innerHTML = "Deactive";
        document.getElementById("pbtn" + id).classList =
          "btn btn-outline-danger";
          viewAlerBox("Success").then((result) => {
            if (result) {
              window.location.reload();
            }
          });
      } else if (txt == "unblocked") {
        document.getElementById("pbtn" + id).innerHTML = "Active";
        document.getElementById("pbtn" + id).classList =
          "btn btn-outline-success";
          viewAlerBox("Success").then((result) => {
            if (result) {
              window.location.reload();
            }
          });
      } else {
        viewAlerBox(txt).then((result) => {
          if (result) {
            window.location.reload();
          }
        });
      }
    }
  };
  request.open("GET", "ProductBlockProcess.php?id=" + id, true);
  request.send();
}

var p;
function PmoreModel(id) {
  var m = document.getElementById("PmoreModel" + id);
  p = new bootstrap.Modal(m);
  p.show();
}

var invoice;
function invoiceMoreModel(id) {
  var m = document.getElementById("invoiceMoreModel" + id);
  invoice = new bootstrap.Modal(m);
  invoice.show();
}

var F_modal;
function openfeedbackModel(id) {
  var modal02 = document.getElementById("feedbackModal" + id);
  F_modal = new bootstrap.Modal(modal02);
  F_modal.show();
}

function feedbackSubmit(id) {
  var feedbackMessage = document.getElementById("feedbackText").value;

  var type;
  if (document.getElementById("inlineRadio1").checked) {
    type = 1;
  } else if (document.getElementById("inlineRadio2").checked) {
    type = 2;
  } else if (document.getElementById("inlineRadio3").checked) {
    type = 3;
  } else if (document.getElementById("inlineRadio4").checked) {
    type = 4;
  }

  var form = new FormData();
  form.append("pid", id);
  form.append("type", type);
  form.append("feedbackMessage", feedbackMessage);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var text = request.responseText;

      if (text == "success") {
        F_modal.hide();
        location.reload();
      } else {
        viewAlerBox(text).then((result) => {
          if (result) {
            window.location.reload();
          }
        });
      }
    }
  };
  request.open("POST", "FeedbackSend.php", true);
  request.send(form);
}

function changeProductImage() {
  var image = document.getElementById("imageuploader");

  image.onchange = function () {
    var file_count = image.files.length;
    if (file_count <= 3) {
      for (var x = 0; x < file_count; x++) {
        var file = this.files[x];
        var url = window.URL.createObjectURL(file);

        document.getElementById("i" + x).src = url;
      }
    } else {
      alert("Please Select 3 or Less than 3 images");
    }
  };
}

function searchUser() {
  $Username = document.getElementById("adminSearchUsers");
  $userNameValue = $Username.value;

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == "Please Enter User Name !!") {
        viewAlerBox("Please Enter User Name !!").then((result) => {
          if (result) {
            window.location.reload();
          }
        });
      } else {
        document.getElementById("contend").innerHTML = t;
      }
    }
  };

  r.open("GET", "searchUserProcess.php?name=" + $userNameValue, true);
  r.send();
}
function searchproductReload() {
  window.location.reload();
}

function searchProduct() {
  $productname = document.getElementById("adminSearchProduct");
  $productNameValue = $productname.value;

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == "Please Product User Name !!") {
        viewAlerBox("Please Product User Name !!").then((result) => {
          if (result) {
            window.location.reload();
          }
        });
      } else {
        document.getElementById("contend").innerHTML = t;
      }
    }
  };

  r.open("GET", "searchProductProcess.php?name=" + $productNameValue, true);
  r.send();
}
function searchUserReload() {
  window.location.reload();
}

function userReport() {
  window.location.href = "userReport.php";
}
function productReport() {
  window.location.href = "productReport.php";
}
function invoiceReport() {
  window.location.href = "invoiceReport.php";
}
function feedbackReport() {
  window.location.href = "feedbackReport.php";
}

function addProduct() {
  var category = document.getElementById("category");
  var title = document.getElementById("title");
  var price = document.getElementById("price");
  var quantity = document.getElementById("quantity");
  var colour = document.getElementById("colour");
  var size = document.getElementById("size");
  var discount = document.getElementById("discount");
  var deliveryFee = document.getElementById("deliveryFee");
  var warranty = document.getElementById("warranty");
  var discription = document.getElementById("discription");

  var image = document.getElementById("imageuploader");

  var f = new FormData();

  f.append("category", category.value);
  f.append("title", title.value);
  f.append("price", price.value);
  f.append("quantity", quantity.value);
  f.append("colour", colour.value);
  f.append("size", size.value);
  f.append("discount", discount.value);
  f.append("deliveryFee", deliveryFee.value);
  f.append("warranty", warranty.value);
  f.append("discription", discription.value);

  var file_count = image.files.length;

  for (var x = 0; x < file_count; x++) {
    f.append("image" + x, image.files[x]);
  }

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "Poduct image saved success") {
        window.location.reload();
      } else {
        viewAlerBox(t).then((result) => {
          if (result) {
           
          }
        });
       
      }
   
    }
  };
  r.open("POST", "addProductProcess.php", true);
  r.send(f);
}

function addToWatchlist(id) {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      viewAlerBox(t).then((result) => {
        if (result) {
          window.location = "watchList.php";
        }
      });
     
    }
  };

  r.open("GET", "addToWatchlistProcess.php?id=" + id, true);
  r.send();
}

function removeFromWatchlist(id) {
  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        viewAlerBox(t).then((result) => {
          if (result) {
            window.location.reload();
          }
        });
      } else {
        viewAlerBox(t).then((result) => {
          if (result) {
            
          }
        });
      }
    }
  };
  r.open("GET", "removeWatchlistProcess.php?id=" + id, true);
  r.send();
}

function removeCategoery(id) {
  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        alert("Removed");
        window.location.reload();
      } else {
        alert(t);
        window.location.reload();
      }
    }
  };
  r.open("GET", "removeCategoeryProcess.php?id=" + id, true);
  r.send();
}

function removeColour(id) {
 

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        alert("Removed");
        window.location.reload();
      } else {
        alert(t);
        window.location.reload();
      }
    }
  };
  r.open("GET", "removeColourProcess.php?id=" + id, true);
  r.send();
}

function search(x) {
  alert(x);
  var text = document.getElementById("searchtext");
  var category = document.getElementById("searchcategory");
  var colour = document.getElementById("searchcolour");
  var size = document.getElementById("searchsize");
  var sort = document.getElementById("searchsort");
  var from = document.getElementById("pf");
  var to = document.getElementById("pt");

  var f = new FormData();
  f.append("text", text.value);
  f.append("category", category.value);
  f.append("colour", colour.value);
  f.append("sort", sort.value);
  f.append("size", size.value);
  f.append("pf", from.value);
  f.append("to", to.value);
  f.append("page", x);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      document.getElementById("view_area").innerHTML = t;
    }
  };

  r.open("POST", "searchProcess.php", true);
  r.send(f);
}



function clearSort() {
  window.location.reload();
}
function printInvoice() {
  var restorePage = document.body.innerHTML;
  var page = document.getElementById("page").innerHTML;
  document.body.innerHTML = page;
  window.print();
  document.body.innerHTML = restorePage;
}

function chat(email) {
  var msg = document.getElementById("msg");

  var f = new FormData();
  f.append("msg", msg.value);
  f.append("email", email);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      viewAlerBox(t).then((result) => {
        if (result) {
          window.location.reload();
        }
      });
      

      
    }
  };

  r.open("POST", "saveMessage.php", true);
  r.send(f);
}

function chat2(email) {
  var msg = document.getElementById("adminMsg" + email);

  var f = new FormData();
  f.append("msg1", msg.value);
  f.append("email", email);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
     
        viewAlerBox(t).then((result) => {
          if (result) {
            window.location.reload();
          }
        });
      
    }
  };

  r.open("POST", "saveMessage2.php", true);
  r.send(f);
}

function checkValue(qty) {
  var input = document.getElementById("qty_input");

  if (input.value <= 0) {
   
    viewAlerBox("Quantity must be 1 or more").then((result) => {
      if (result) {
       
      }
    });
    input.value = 1;
  } else if (input.value > qty) {
   
    viewAlerBox("Maximum quantity achieved").then((result) => {
      if (result) {
       
      }
    });
    input.value = qty;
  }
}

function qty_inc(qty) {
  var input = document.getElementById("qty_input");
  if (input.value < qty) {
    var newValue = parseInt(input.value) + 1;
    input.value = newValue.toString();
  } else {
    alert("Maximum quantity has achieved");
    input.value = qty;
  }
}

function qty_dec() {
  var input = document.getElementById("qty_input");
  if (input.value > 1) {
    var newValue = parseInt(input.value) - 1;
    input.value = newValue.toString();
  } else {
   
    viewAlerBox("Minimum quantity has achieved").then((result) => {
      if (result) {
       
      }
    });
    input.value = 1;
  }
}

function payNow(id) {
  var qty = document.getElementById("qty_input").value;

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      var obj = JSON.parse(t);

      var mail = obj["umail"];
      var amount = obj["amount"];

      if (t == 1) {
        alert("Please login.");
        window.location = "index.php";
      } else if (t == 2) {
        alert("Please Update your profile");
        window.location = "userProfile.php";
      } else {
        // Payment completed. It can be a successful failure.
        payhere.onCompleted = function onCompleted(orderId) {
          console.log("Payment completed. OrderID:" + orderId);
          // Note: validate the payment and show success or failure page to the customer
          saveInvoice(orderId, id, mail, amount, qty);
        };

        // Payment window closed
        payhere.onDismissed = function onDismissed() {
          // Note: Prompt user to pay again or show an error page
          console.log("Payment dismissed");
        };

        // Error occurred
        payhere.onError = function onError(error) {
          // Note: show an error page
          console.log("Error:" + error);
        };

        // Put the payment variables here
        var payment = {
          sandbox: true,
          merchant_id: "1221660", // Replace your Merchant ID
          return_url:
            "http://localhost/Final%20Assignment/singleProductView.php?id=" +
            id, // Important
          cancel_url:
            "http://localhost/Final%20Assignment/singleProductView.php?id=" +
            id, // Important
          notify_url: "http://sample.com/notify",
          order_id: obj["id"],
          items: obj["item"],
          amount: amount,
          currency: "LKR",
          hash: obj["hash"],
          first_name: obj["fname"],
          last_name: obj["lname"],
          email: mail,
          phone: obj["mobile"],
          address: obj["address"],
          city: obj["city"],
          country: "Sri Lanka",
          delivery_address: obj["address"],
          delivery_city: obj["city"],
          delivery_country: "Sri Lanka",
          custom_1: "",
          custom_2: "",
        };

        // Show the payhere.js popup, when "PayHere Pay" is clicked
        // document.getElementById('payhere-payment').onclick = function (e) {
        payhere.startPayment(payment);
        // };
      }
    }
  };

  r.open("GET", "buynowProcess.php?id=" + id + "&qty=" + qty, true);
  r.send();
}

function saveInvoice(orderId, id, mail, amount, qty) {
  var f = new FormData();
  f.append("o", orderId);
  f.append("i", id);
  f.append("m", mail);
  f.append("a", amount);
  f.append("q", qty);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "1") {
        window.location = "invoice.php?id=" + orderId;
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "saveInvoice.php", true);
  r.send(f);
}
function Orders1(id) {
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var txt = request.responseText;

      viewAlerBox(txt).then((result) => {
        if (result) {
         
          window.location.reload();
        }
      });
    }
  };
  request.open("GET", "orderProcess.php?id=" + id, true);
  request.send();
}

function buyCart(total) {
  var req = new XMLHttpRequest();

  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      if (req.responseText != "1") {
        var json_obj = req.responseText;
        var obj = JSON.parse(json_obj);

        // Payment completed. It can be a successful failure.
        payhere.onCompleted = function onCompleted(orderId) {
          console.log("Payment completed. OrderID:" + orderId);
          // Note: validate the payment and show success or failure page to the customer

          // saveSingleInvoice(obj["order_id"], obj["amount"], obj["email"], id);
          saveCartInvoice();
        };

        // Payment window closed
        payhere.onDismissed = function onDismissed() {
          // Note: Prompt user to pay again or show an error page
          console.log("Payment dismissed");
        };

        // Error occurred
        payhere.onError = function onError(error) {
          // Note: show an error page
          console.log("Error:" + error);
        };

        // Put the payment variables here
        var payment = {
          sandbox: true,
          merchant_id: "1221660", // Replace your Merchant ID
          return_url: "http://localhost/Final%20Assignment/homePage2.php", // Important
          cancel_url: "http://localhost/Final%20Assignment/homePage2.php", // Important
          notify_url: "http://sample.com/notify",
          order_id: obj["order_id"],
          items: obj["item"],
          amount: obj["amount"] + ".00",
          currency: obj["currency"],
          hash: obj["hash"], // *Replace with generated hash retrieved from backend
          first_name: obj["fname"],
          last_name: obj["lname"],
          email: obj["email"],
          phone: obj["email"],
          address: obj["address"],
          city: obj["city"],
          country: obj["country"],
          delivery_address: obj["address"],
          delivery_city: obj["city"],
          delivery_country: obj["country"],
        };

        // Show the payhere.js popup, when "PayHere Pay" is clicked
        // document.getElementById("payhere-payment").onclick = function (e) {
        payhere.startPayment(payment);
        // };
      } else {
        window.location = "userProfile.php";
      }
    }
  };

  req.open("GET", "buyCartProcess.php?total=" + total, true);
  req.send();
}

function saveCartInvoice() {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      window.location = "invoice.php?id=" + t;
    }
  };

  r.open("GET", "saveCartInvoiceProcess.php", true);
  r.send();
}
function UpdateProduct(id){
  var title =document.getElementById("title");
  var price =document.getElementById("price");
  var warranty =document.getElementById("warrenty");
  var discount =document.getElementById("discount");
  var discription =document.getElementById("discription");
  
  var f = new FormData();
  f.append("title", title.value);
  f.append("price", price.value);
  f.append("warranty", warranty.value);
  f.append("discount", discount.value);
  f.append("discription", discription.value);
  f.append("id", id);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      alert(t);
    }
  };

  r.open("POST", "UpdateProduct.php", true);
  r.send(f);


}

function loadDistrict() {
  var pid = document.getElementById("province");

  var req = new XMLHttpRequest();

  req.onreadystatechange = function () {
    if (req.readyState == 4) {
      var res = req.responseText;
      document.getElementById("district").innerHTML = res;
    }
  };

  req.open("GET", "loadDistrict.php?pid=" + pid.value, true);
  req.send();

  loadCity();
}
function loadCity() {
  var did = document.getElementById("district");

  var req = new XMLHttpRequest();

  req.onreadystatechange = function () {
    if (req.readyState == 4) {
      var res = req.responseText;
      document.getElementById("city").innerHTML = res;
    }
  };

  req.open("GET", "loadCity.php?did=" + did.value, true);
  req.send();
}