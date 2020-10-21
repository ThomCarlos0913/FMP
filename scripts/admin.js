// Control Panel scripts

function createAdmin() {
  var fullname = document.getElementsByName('fullname')[0].value;
  var username = document.getElementsByName('username')[0].value;
  var password = document.getElementsByName('password')[0].value;
  var confirmpassword = document.getElementsByName('confirmpassword')[0].value;

  if (password != '' && confirmpassword != '') {
    $.ajax({
      type: 'POST',
      url: 'php/admincreation.php',
      data: {'fullname': fullname, 'username': username, 'password': password},
      success: function(data) {
        switch (data) {
          case 'er1':
              document.getElementsByClassName('createfeedback')[0].style.display = 'block';
              document.getElementsByClassName('createfeedback')[0].style.color = '#ff3333';
              document.getElementsByClassName('createfeedback')[0].innerHTML = 'Error! Account already exists.';
            break;
          case 'success':
              document.getElementsByClassName('createfeedback')[0].style.display = 'block';
              document.getElementsByClassName('createfeedback')[0].style.color = '#339966';
              document.getElementsByClassName('createfeedback')[0].innerHTML = 'Success! Admin account created';
            break;

        }
        clearData();
      }
    });
  }
  else {
    document.getElementsByClassName('createfeedback')[0].style.display = 'block';
    document.getElementsByClassName('createfeedback')[0].style.color = '#ff3333';
    document.getElementsByClassName('createfeedback')[0].innerHTML = 'Error! Passwords does not match.';
  }

  return false;
}

function updateapplicant() {
  var birthdate = document.getElementById('birthdate').value;
  var age = document.getElementById('age').value;
  var bloodtype = document.getElementById('bloodtype').value;
  var weight = document.getElementById('weight').value;
  var height = document.getElementById('height').value;
  var language = document.getElementById('language').value;
  var religion = document.getElementById('religion').value;
  var maritalstatus = document.getElementById('maritalstatus').value;
  var spousename = document.getElementById('spousename').value;
  var marrieddate = document.getElementById('marrieddate').value;
  var childages = document.getElementById('childages').value;
  var brotherage = document.getElementById('brotherage').value;
  var sisterage = document.getElementById('sisterage').value;
  var fatherage = document.getElementById('fatherage').value;
  var motherage = document.getElementById('motherage').value;
  var id = document.getElementsByClassName('idnumber')[0].innerHTML;

  var address = document.getElementById('address').value;
  var city = document.getElementById('city').value;
  var contact1 = document.getElementById('contact1').value;
  var contact2 = document.getElementById('contact2').value;
  var emergencycontact = document.getElementById('emergencycontact').value;
  var relation = document.getElementById('relation').value;
  var attainment = document.getElementById('attainment').value;
  var course = document.getElementById('course').value;
  var studyyears = document.getElementById('studyyears').value;
  var graduated = document.getElementById('graduated').value;
  var employer = document.getElementById('employer').value;
  var countryyearsfromto = document.getElementById('countryyearsfromto').value;
  var productindustry = document.getElementById('productindustry').value;
  var position = document.getElementById('position').value;
  var leavereason = document.getElementById('leavereason').value;

  package = {'id': id, 'birthdate': birthdate, 'age': age, 'bloodtype':bloodtype, 'weight': weight, 'height': height, 'language': language, 'religion': religion,
  'maritalstatus': maritalstatus, 'spousename': spousename, 'marrieddate': marrieddate, 'childages': childages, 'brotherage':brotherage, 'sisterage': sisterage,
  'fatherage': fatherage, 'motherage': motherage, 'address': address, 'city': city, 'contact1': contact1, 'contact2':contact2, 'emergencycontact': emergencycontact,
  'relation':relation, 'attainment':attainment, 'course': course, 'studyyears': studyyears, 'graduated': graduated, 'employer':employer, 'countryyearsfromto': countryyearsfromto,
  'productindustry': productindustry, 'position':position, 'leavereason':leavereason};

  $.ajax({
    type: 'POST',
    url: 'php/updatebiodata.php',
    data: {'payload': package},
    success: function(data) {
      alert(data);
    }
  });

  return false;
}

function changeAdminTab(n) {
  // declare tabs
  var tab1 = document.getElementsByClassName('tab')[0];
  var tab2 = document.getElementsByClassName('tab')[1];

  switch (n) {
    case 1:
      tab1.className += " active";
      tab2.classList.remove("active");

      document.getElementsByClassName("pendingapplications")[0].style.display = "block";
      document.getElementsByClassName("admincreator")[0].style.display = "none";
      break;
    case 2:
      tab2.className += " active";
      tab1.classList.remove("active");

      document.getElementsByClassName("pendingapplications")[0].style.display = "none";
      document.getElementsByClassName("admincreator")[0].style.display = "block";
      break;
  }
}

function clearData() {
  document.getElementsByName('fullname')[0].value = "";
  document.getElementsByName('username')[0].value = "";
  document.getElementsByName('password')[0].value = "";
  document.getElementsByName('confirmpassword')[0].value = "";
  return false;
}

// JQuery for showing biodata
function showBiodata(param) {
  document.getElementsByClassName('overlay')[0].style.display = "block";
  document.getElementsByClassName('biodatacontainer')[0].style.display = "block";
  document.getElementsByClassName('deleteapproval')[0].style.display = "none";
  $.ajax({
    type: 'POST',
    url: 'php/getbiodata.php',
    data: {id: param},
    success: function(data) {
      payload = JSON.parse(data);

      // Personal Details
      $('#firstname').html(payload[0]['firstname']);
      $('#middlename').html(payload[0]['middlename']);
      $('#lastname').html(payload[0]['lastname']);
      $('#age').val(payload[0]['age']);
      $('#birthdate').val(payload[0]['birthdate']);
      $('#bloodtype').val(payload[0]['bloodtype']);
      $('#weight').val(payload[0]['weight']);
      $('#height').val(payload[0]['height']);
      $('#language').val(payload[0]['language']);
      $('#religion').val(payload[0]['religion']);
      $("#image").attr('src','applicantimages/' + payload[0]['image']);
      $('.idnumber').html(payload[0]['id']);

      // Marital Status
      $('#maritalstatus').val(payload[1]['maritalstatus']);
      $('#spousename').val(payload[1]['spousename']);
      $('#marrieddate').val(payload[1]['marrieddate']);
      $('#childages').val(payload[1]['childages']);

      // Relatives
      $('#brotherage').val(payload[2]['brotherage']);
      $('#sisterage').val(payload[2]['sisterage']);
      $('#fatherage').val(payload[2]['fatherage']);
      $('#motherage').val(payload[2]['motherage']);

      // Contact & address
      $('#address').val(payload[3]['address']);
      $('#city').val(payload[3]['city']);
      $('#contact1').val(payload[3]['contact1']);
      $('#contact2').val(payload[3]['contact2']);
      $('#emergencycontact').val(payload[3]['emergencycontact']);
      $('#relation').val(payload[3]['relation']);

      // Education
      $('#attainment').val(payload[4]['attainment']);
      $('#course').val(payload[4]['course']);
      $('#studyyears').val(payload[4]['studyyears']);
      $('#graduated').val(payload[4]['graduated']);

      // Employement
      $('#employer').val(payload[5]['employer']);
      $('#countryyearsfromto').val(payload[5]['countryyearsfromto']);
      $('#productindustry').val(payload[5]['productindustry']);
      $('#position').val(payload[5]['position']);
      $('#leavereason').val(payload[5]['leavereason']);
    }
  });
}

function showDeleteApproval(param, param2) {
  document.getElementsByClassName('overlay')[0].style.display = "block";
  document.getElementsByClassName('biodatacontainer')[0].style.display = "none";
  document.getElementsByClassName('deleteapproval')[0].style.display = "block";
  document.getElementsByClassName('approvalmessage')[0].innerHTML = "Are you certain you want to delete application entry?";

  document.getElementsByClassName('deleteapproved')[0].onclick = function() {deleteApplication(param, param2)};
}
function hideOverlays() {
  document.getElementsByClassName('overlay')[0].style.display = "none";
}

// JQuery for deleting and approving application
function deleteApplication(param, param2) {
  $.ajax({
    type: 'POST',
    url: 'php/deleteapplication.php',
    data: {'PARAM': param},
    success: function(data) {
      if (param2 == 2) {
        window.location.reload();
        changeAdminTab(2);
      }
      else {
        window.location.reload();
      }
    }
  });
}

function approveApplication(param) {
  $.ajax({
    type: 'POST',
    url: 'php/approveapplication.php',
    data: {'PARAM': param},
    success: function(data) {
      window.location.reload();
    }
  });
}

function closeBiodata() {
  document.getElementsByClassName('overlay')[0].style.display = "none";
}
