var currentapplication = 0;

// JQuery for delete application
function deleteApplication(param) {
  $.ajax({
    type: 'POST',
    url: 'php/deleteapplication.php',
    data: {'PARAM': param},
    success: function(data) {
      window.location.reload();
      document.getElementsByClassName('deleteapproval')[0].style.display = "none";
    }
  });
}

function sendemailconfirmation() {
  var param = document.getElementsByClassName('forgottextbox')[0].value;
  $.ajax({
    type: 'POST',
    url: 'php/emailconfirmation.php',
    data: {'email': param},
    success: function(data) {
      alert(data);;
    }
  });
}

// JQuery load selected image
var loadFile = function(event) {
  var reader = new FileReader();
  reader.onload = function(){
    var output = document.getElementById('targetImg');
    output.src = reader.result;
  };
  reader.readAsDataURL(event.target.files[0]);
};


function initializeFirstApplicationTab() {
  document.getElementsByClassName("application-tab")[currentapplication].style.display = "block";
  document.getElementsByClassName("list-group-item")[currentapplication + 1].style.fontFamily = "sourceBold";
  document.getElementsByClassName('pointer')[currentapplication].style.display = "block";
}

function showApplyDeleteApproval(param) {
  document.getElementsByClassName('emailoverlay')[0].style.display = "block";
  document.getElementsByClassName('emailcontainer')[0].style.display = "none";
  document.getElementsByClassName('forgotpassword')[0].style.display = "none";
  document.getElementsByClassName('deleteapproval')[0].style.display = "block";

  document.getElementsByClassName('deleteapproved')[0].onclick = function() {deleteApplication(param)};
}

function showForgotPassword() {
  document.getElementsByClassName('emailoverlay')[0].style.display = "block";
  document.getElementsByClassName('emailcontainer')[0].style.display = "none";
  document.getElementsByClassName('deleteapproval')[0].style.display = "none";
  document.getElementsByClassName('forgotpassword')[0].style.display = "block";

  document.getElementsByClassName('sendpass')[0].onclick = function() {sendemailconfirmation()};

  return false;
}

function hideOverlays() {
  document.getElementsByClassName('emailoverlay')[0].style.display = "none";
  document.getElementsByClassName('deleteapproval')[0].style.display = "none";
  document.getElementsByClassName('emailcontainer')[0].style.display = "none";
}

function showApplicationTab(choice) {
  var flag = false;

  // application variables
  var incomplete_alert = document.getElementById("incomplete-details");
  var firstname = document.getElementsByName("firstname")[0].value;
  var lastname = document.getElementsByName("lastname")[0].value;
  var middlename = document.getElementsByName("middlename")[0].value;

  var otherlang = document.getElementsByClassName('langcheck')[2].checked;
  var textlang = document.getElementsByClassName('langcheck')[3].value;

  var contact1 = document.getElementsByName("contact1")[0].value;
  var contact2 = document.getElementsByName("contact2")[0].value;
  var emergencycontact = document.getElementsByName("emergencycontact")[0].value;
  var relation = document.getElementsByName("relation")[0].value;

  var attainment = document.getElementsByName("attainment");
  var course = document.getElementsByName("course")[0].value;
  var studyyears = document.getElementsByName("studyyears")[0].value;
  var graduated = document.getElementsByName("graduated");

  var employer = document.getElementsByName("employer")[0].value;
  var countryyeasfromto = document.getElementsByName("countryyeasfromto")[0].value;
  var productindustry = document.getElementsByName("productindustry")[0].value;
  var position = document.getElementsByName("position")[0].value;
  var leavereason = document.getElementsByName("leavereason")[0].value;

  switch (currentapplication) {
    case 0:
      if (firstname == "" || lastname == "" || middlename == "") {
        incomplete_alert.innerHTML = " Please fill out all necessary details.";
        incomplete_alert.style.display = "block";
        flag = true;
        if (firstname == "") {
          //document.getElementsByName("firstname")[0].style.backgroundColor = "#ffcccc";
          document.getElementsByName("firstname")[0].style.border = "2px solid #ff8080";
        }
        else {
          document.getElementsByName("firstname")[0].style.backgroundColor = "transparent";
          document.getElementsByName("firstname")[0].style.border = "1px solid #8B8B8B";
        }
        if (middlename == "") {
          document.getElementsByName("middlename")[0].style.border = "2px solid #ff8080";
        }
        else {
          document.getElementsByName("middlename")[0].style.backgroundColor = "transparent";
          document.getElementsByName("middlename")[0].style.border = "1px solid #8B8B8B";
        }
        if (lastname == "") {
          //document.getElementsByName("lastname")[0].style.backgroundColor = "#ffcccc";
          document.getElementsByName("lastname")[0].style.border = "2px solid #ff8080";
        }
        else {
          document.getElementsByName("lastname")[0].style.backgroundColor = "transparent";
          document.getElementsByName("lastname")[0].style.border = "1px solid #8B8B8B";
        }
        if (otherlang && textlang == '') {
          document.getElementsByClassName("otherlangmess")[0].style.display = "block";
        }
      }
      else {
        document.getElementsByName("middlename")[0].style.border = "1px solid #8B8B8B";
        for (var counter = 0; counter < 4; counter++) {
          if (counter != 1) {
            if (document.getElementsByClassName("numerictextbox")[counter].value != '' && (document.getElementsByClassName("numerictextbox")[counter].value).match(/[\D]/)) {
              document.getElementsByClassName("numerictextbox")[counter].style.border = "2px solid #ff8080";
              incomplete_alert.innerHTML = " Please input numeric values only.";
              incomplete_alert.style.display = "Block";
              flag = true;
            }
            else {
              document.getElementsByClassName("numerictextbox")[counter].style.border = "1px solid #8B8B8B";
            }
          }
          else {
            if (document.getElementsByClassName("numerictextbox")[counter].value != '' && (document.getElementsByClassName("numerictextbox")[counter].value).match(/[cdefghiklmnpqrstubwxyz]/)) {
              document.getElementsByClassName("numerictextbox")[counter].style.border = "2px solid #ff8080";
              incomplete_alert.innerHTML = " Please input valid blood type (O, A, B, AB+, A+, B+)";
              incomplete_alert.style.display = "Block";
              flag = true;
            }
            else {
              document.getElementsByClassName("numerictextbox")[counter].style.border = "1px solid #8B8B8B";
            }
          }
        }
      }
      break;
    case 2 :
      for (var counter = 4; counter < 8; counter++) {
        if (document.getElementsByClassName("numerictextbox")[counter].value != '' && (document.getElementsByClassName("numerictextbox")[counter].value).match(/[\D]/)) {
          document.getElementsByClassName("numerictextbox")[counter].style.border = "2px solid #ff8080";
          incomplete_alert.innerHTML = " Please input numeric values only.";
          incomplete_alert.style.display = "Block";
          flag = true;
        }
        else {
          document.getElementsByClassName("numerictextbox")[counter].style.border = "1px solid #8B8B8B";
        }
      }
      break;
    case 3:
      if (contact1 == "" || contact2 == "" || emergencycontact == "" || relation == "") {
        incomplete_alert.style.display = "block";
        flag = true;
        if (contact1 == "") {
          //document.getElementsByName("contact1")[0].style.backgroundColor = "#ffcccc";
          document.getElementsByName("contact1")[0].style.border = "2px solid #ff8080";
        }
        else {
          document.getElementsByName("contact1")[0].style.backgroundColor = "transparent";
          document.getElementsByName("contact1")[0].style.border = "1px solid #8B8B8B";
        }
        if (contact2 == "") {
          //document.getElementsByName("contact2")[0].style.backgroundColor = "#ffcccc";
          document.getElementsByName("contact2")[0].style.border = "2px solid #ff8080";
        }
        else {
          document.getElementsByName("contact2")[0].style.backgroundColor = "transparent";
          document.getElementsByName("contact2")[0].style.border = "1px solid #8B8B8B";
        }
        if (emergencycontact == "") {
          //document.getElementsByName("emergencycontact")[0].style.backgroundColor = "#ffcccc";
          document.getElementsByName("emergencycontact")[0].style.border = "2px solid #ff8080";
        }
        else {
          document.getElementsByName("emergencycontact")[0].style.backgroundColor = "transparent";
          document.getElementsByName("emergencycontact")[0].style.border = "1px solid #8B8B8B";
        }
        if (relation == "") {
          //document.getElementsByName("relation")[0].style.backgroundColor = "#ffcccc";
          document.getElementsByName("relation")[0].style.border = "2px solid #ff8080";
        }
        else {
          document.getElementsByName("relation")[0].style.backgroundColor = "transparent";
          document.getElementsByName("relation")[0].style.border = "1px solid #8B8B8B";
        }
      }
      else {
        for (var counter = 8; counter < 12; counter++) {
          if (counter != 11) {
            if (document.getElementsByClassName("numerictextbox")[counter].value != '' && (document.getElementsByClassName("numerictextbox")[counter].value).match(/[\D]/)) {
              document.getElementsByClassName("numerictextbox")[counter].style.border = "2px solid #ff8080";
              incomplete_alert.innerHTML = " Please input numeric values only.";
              incomplete_alert.style.display = "Block";
              flag = true;
            }
            else {
              document.getElementsByClassName("numerictextbox")[counter].style.border = "1px solid #8B8B8B";
            }
          }
          else {
            if ((document.getElementsByName("relation")[0].value).match(/[0-9]/)) {
              document.getElementsByName("relation")[0].style.border = "2px solid #ff8080";
              incomplete_alert.innerHTML = " Please input alpha characters only (A - Z) for Relation field.";
              incomplete_alert.style.display = "Block";
              flag = true;
            }
            else {
              document.getElementsByName("relation")[0].style.border = "1px solid #8B8B8B";
            }
          }
        }
      }
      break;
    case 4:
      if (!(attainment[0].checked || attainment[1].checked || attainment[2].checked) || course == "" || studyyears == "" || !(graduated[0].checked || graduated[1].checked)) {
        incomplete_alert.style.display = "block";
        flag = true;
        if (course == "") {
          //document.getElementsByName("course")[0].style.backgroundColor = "#ffcccc";
          document.getElementsByName("course")[0].style.border = "2px solid #ff8080";
        }
        else {
          document.getElementsByName("course")[0].style.backgroundColor = "transparent";
          document.getElementsByName("course")[0].style.border = "1px solid #8B8B8B";
        }
        if (studyyears == "") {
          //document.getElementsByName("studyyears")[0].style.backgroundColor = "#ffcccc";
          document.getElementsByName("studyyears")[0].style.border = "2px solid #ff8080";
        }
        else {
          document.getElementsByName("studyyears")[0].style.backgroundColor = "transparent";
          document.getElementsByName("studyyears")[0].style.border = "1px solid #8B8B8B";
        }
      }
      else {
        if (document.getElementsByName("studyyears")[0].value != '' && (document.getElementsByName("studyyears")[0].value).match(/[\D]/)) {
          document.getElementsByName("studyyears")[0].style.border = "2px solid #ff8080";
          incomplete_alert.innerHTML = " Please input numeric values only.";
          incomplete_alert.style.display = "Block";
          flag = true;
        }
        else {
          document.getElementsByName("studyyears")[0].style.border = "1px solid #8B8B8B";
        }
      }
      break;
    case 5:
      if (employer == "" || countryyeasfromto == "" || productindustry == "" || position == "" || leavereason == "") {
        incomplete_alert.style.display = "block";
        flag = true;
        if (employer == "") {
          //document.getElementsByName("employer")[0].style.backgroundColor = "#ffcccc";
          document.getElementsByName("employer")[0].style.border = "2px solid #ff8080";
        }
        else {
          document.getElementsByName("employer")[0].style.backgroundColor = "transparent";
          document.getElementsByName("employer")[0].style.border = "1px solid #8B8B8B";
        }
        if (countryyeasfromto == "") {
          //document.getElementsByName("countryyeasfromto")[0].style.backgroundColor = "#ffcccc";
          document.getElementsByName("countryyeasfromto")[0].style.border = "2px solid #ff8080";
        }
        else {
          document.getElementsByName("countryyeasfromto")[0].style.backgroundColor = "transparent";
          document.getElementsByName("countryyeasfromto")[0].style.border = "1px solid #8B8B8B";
        }
        if (productindustry == "") {
          //document.getElementsByName("productindustry")[0].style.backgroundColor = "#ffcccc";
          document.getElementsByName("productindustry")[0].style.border = "2px solid #ff8080";
        }
        else {
          document.getElementsByName("productindustry")[0].style.backgroundColor = "transparent";
          document.getElementsByName("productindustry")[0].style.border = "1px solid #8B8B8B";
        }
        if (position == "") {
          //document.getElementsByName("position")[0].style.backgroundColor = "#ffcccc";
          document.getElementsByName("position")[0].style.border = "2px solid #ff8080";
        }
        else {
          document.getElementsByName("position")[0].style.backgroundColor = "transparent";
          document.getElementsByName("position")[0].style.border = "1px solid #8B8B8B";
        }
        if (leavereason == "") {
          //document.getElementsByName("leavereason")[0].style.backgroundColor = "#ffcccc";
          document.getElementsByName("leavereason")[0].style.border = "2px solid #ff8080";
        }
        else {
          document.getElementsByName("leavereason")[0].style.backgroundColor = "transparent";
          document.getElementsByName("leavereason")[0].style.border = "1px solid #8B8B8B";
        }
      }
      else {
        flag = false;
      }
      break;
  }

  if (!flag || choice == "sub") {
    incomplete_alert.style.display = "none";

    if (choice == "add") {
      currentapplication++;
      var tab = document.getElementsByClassName("application-tab")[currentapplication];
      tab.style.display = "block";

      var pretab = document.getElementsByClassName("application-tab")[currentapplication - 1];
      pretab.style.display = "none";

      // change background color
      document.getElementsByClassName('list-group-item')[currentapplication].style.fontFamily = "sourceRegular";
      document.getElementsByClassName('list-group-item')[currentapplication + 1].style.fontFamily = "sourceBold";
      document.getElementsByClassName('pointer')[currentapplication].style.display = "block";
      document.getElementsByClassName('pointer')[currentapplication - 1].style.display = "none";
    }
    else if (choice == "sub") {
      currentapplication--;
      var tab = document.getElementsByClassName("application-tab")[currentapplication];
      tab.style.display = "block";

      var pretab = document.getElementsByClassName("application-tab")[currentapplication + 1];
      pretab.style.display = "none";

      // change font
      document.getElementsByClassName('list-group-item')[currentapplication + 2].style.fontFamily = "sourceRegular";
      document.getElementsByClassName('list-group-item')[currentapplication + 1].style.fontFamily = "sourceBold";
      document.getElementsByClassName('pointer')[currentapplication].style.display = "block";
      document.getElementsByClassName('pointer')[currentapplication + 1].style.display = "none";
    }

    if (currentapplication <= 1) {
      document.getElementById("prev-btn").style.display = "block";
    }
    if (currentapplication == 0){
      document.getElementById("prev-btn").style.display = "none";
    }
    if (currentapplication == 6) {
      document.getElementById("submit-btn").style.display = "block";
      document.getElementById("next-btn").style.display = "none";
    }
    else {
      document.getElementById("next-btn").style.display = "block";
      document.getElementById("submit-btn").style.display = "none";
    }
  }
}

function changeTab(currentPosition) {
  switch (currentPosition) {
    case 0:
      document.getElementsByClassName("btn")[1].classList.remove("active");
      document.getElementsByClassName("send-application")[0].style.display = "none";
      document.getElementsByClassName("application-status")[0].style.display = "block";
      break;
    case 1:
      document.getElementsByClassName("btn")[0].classList.remove("active");
      document.getElementsByClassName("application-status")[0].style.display = "none";
      document.getElementsByClassName("send-application")[0].style.display = "block";
      break;
  }
  document.getElementsByClassName("btn")[currentPosition].className += " active";
}

function checkSubmit() {
  var incomplete_alert = document.getElementById("incomplete-details");
  var job1 = document.getElementsByName('job1')[0].checked;
  var job2 = document.getElementsByName('job2')[0].checked;
  var job3 = document.getElementsByName('job3')[0].checked;
  var job4 = document.getElementsByName('job4')[0].checked;
  var job5 = document.getElementsByName('job5')[0].checked;
  var job6 = document.getElementsByName('job6')[0].checked;

  if (!(job1 || job2 || job3 || job4 || job5 || job6) || document.getElementById('picturesrc').value == '') {
    if (!(job1 || job2 || job3 || job4 || job5 || job6)) {
      incomplete_alert.style.display = "block";
      incomplete_alert.innerHTML = "Please select desired job applications";
    }
    else if (document.getElementById('picturesrc').value == '') {
      incomplete_alert.style.display = "block";
      incomplete_alert.innerHTML = "Please upload a 2x2 or Passport size photo";
    }
  }
  else {
    document.getElementsByClassName('send-application-form')[0].submit();
  }
}

function checkData() {
  var firstname = document.getElementById("create_firstname").value;
  var lastname = document.getElementById("create_lastname").value;
  var middlename = document.getElementById("create_middlename").value;

  var username = document.getElementById("create_username").value;
  var homeaddress = document.getElementById("create_homeaddress").value;
  var password = document.getElementById("create_password").value;
  var confirmpass = document.getElementById("create_confirmpass").value;
  var email = document.getElementById("create_email").value;

  var year_select = document.getElementsByClassName("select-year")[0];
  var year = year_select.options[year_select.selectedIndex].value;
  var month_select = document.getElementsByClassName("select-month")[0];
  var month = month_select.options[month_select.selectedIndex].value;
  var date_select = document.getElementsByClassName("select-date")[0];
  var date = date_select.options[date_select.selectedIndex].value;

  if (firstname !== '' && lastname !== '' && homeaddress !== '' && password !== '' && confirmpass !== '' && email !== '' && year !== 'Year' && month !== 'Month' && date !== 'Date' && username !== '') {
    if (/[0-9]/.test(firstname) || /[0-9]/.test(middlename) || /[0-9]/.test(lastname)){

      if (/[0-9]/.test(firstname)) { document.getElementById("create_firstname").style.border = "1px solid #ff4d4d"; }
      else { document.getElementById("create_firstname").style.border = "1px solid #8B8B8B"; }
      if (/[0-9]/.test(middlename)) { document.getElementById("create_middlename").style.border = "1px solid #ff4d4d"; }
      else { document.getElementById("create_middlename").style.border = "1px solid #8B8B8B"; }
      if (/[0-9]/.test(lastname)) { document.getElementById("create_lastname").style.border = "1px solid #ff4d4d"; }
      else { document.getElementById("create_lastname").style.border = "1px solid #8B8B8B"; }

      document.getElementById("password-mismatch").style.display = "none";
      document.getElementById("incomplete-form").style.display = "none";
      document.getElementById("numeric-error").style.display = "block";

      var user = document.getElementById("user-exist")
      var username = document.getElementById("username-exist");
      if (username) {
        document.getElementById("username-exist").style.display = "none";
      }
      if (user) {
        document.getElementById("user-exist").style.display = "none";
      };
    }
    else if (password == confirmpass) {
      return true;
    }
    else {
      document.getElementById("password-mismatch").style.display = "block";
      document.getElementById("incomplete-form").style.display = "none";
      document.getElementById("numeric-error").style.display = "none";

      var user = document.getElementById("user-exist")
      var username = document.getElementById("username-exist");
      if (username) {
        document.getElementById("username-exist").style.display = "none";
      }
      if (user) {
        document.getElementById("user-exist").style.display = "none";
      };
    }
  }
  else {
    if (firstname == "") { document.getElementById("create_firstname").style.border = "1px solid #ff4d4d"; }
    else { document.getElementById("create_firstname").style.border = "1px solid #8B8B8B"; }

    if (lastname == "") { document.getElementById("create_lastname").style.border = "1px solid #ff4d4d";}
    else { document.getElementById("create_lastname").style.border = "1px solid #8B8B8B"; }

    if (username == "") {document.getElementById("create_username").style.border = "1px solid #ff4d4d";}
    else { document.getElementById("create_username").style.border = "1px solid #8B8B8B";}

    if (homeaddress == "") { document.getElementById("create_homeaddress").style.border = "1px solid #ff4d4d"; }
    else {document.getElementById("create_homeaddress").style.border = "1px solid #8B8B8B";}

    if (password == "") { document.getElementById("create_password").style.border = "1px solid #ff4d4d"; }
    else {document.getElementById("create_password").style.border = "1px solid #8B8B8B";}

    if (confirmpass == "") { document.getElementById("create_confirmpass").style.border = "1px solid #ff4d4d"; }
    else {document.getElementById("create_confirmpass").style.border = "1px solid #8B8B8B";}

    if (email == "") { document.getElementById("create_email").style.border = "1px solid #ff4d4d"; }
    else {document.getElementById("create_email").style.border = "1px solid #8B8B8B";}

    if (year == "Year") { document.getElementsByClassName("select-year")[0].style.border = "1px solid #ff4d4d"; }
    else {document.getElementsByClassName("select-year")[0].style.border = "1px solid #8B8B8B";}

    if (month == "Month") { document.getElementsByClassName("select-month")[0].style.border = "1px solid #ff4d4d"; }
    else {document.getElementsByClassName("select-month")[0].style.border = "1px solid #8B8B8B";}

    if (date == "Date") { document.getElementsByClassName("select-date")[0].style.border = "1px solid #ff4d4d"; }
    else {document.getElementsByClassName("select-date")[0].style.border = "1px solid #8B8B8B";}

    document.getElementById("incomplete-form").style.display = "block";
    document.getElementById("password-mismatch").style.display = "none";
    var user = document.getElementById("user-exist")
    var username = document.getElementById("username-exist");
    if (username) {
      document.getElementById("username-exist").style.display = "none";
    }
    if (user) {
      document.getElementById("user-exist").style.display = "none";
    }
  }

  return false;
}

function loadDateOptions() {
  var year = document.getElementsByClassName("select-year")[0];
  var month = document.getElementsByClassName("select-month")[0];
  var date = document.getElementsByClassName("select-date")[0];

  var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

  for (counter = 2019; counter > 1900; counter--) {
    year.options[year.options.length] = new Option(counter, counter);
  }
  for (counter = 0; counter < 12; counter++) {
    month.options[month.options.length] = new Option(months[counter], months[counter]);
  }
  for (counter = 1; counter < 31 + 1; counter++) {
    date.options[date.options.length] = new Option(counter, counter);
  }
}

window.onload = function () {
  loadDateOptions();
}
