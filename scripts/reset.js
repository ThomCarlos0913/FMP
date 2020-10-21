function resetpass(key) {
  var param = document.getElementsByName('password')[0].value;
  var conf = document.getElementsByName('confirmpassword')[0].value;

  if (conf != '' && param != '') {
    $.ajax({
      type: 'POST',
      url: 'php/resetpass.php',
      data: {'pass': param, 'key': key},
      success: function(data) {
        document.getElementsByClassName('reseterror')[0].style.display = "none";
        document.getElementsByClassName('resetfeedback')[0].style.display = "block";
      }
    });
  }
  else {
    document.getElementsByClassName('reseterror')[0].style.display = "block";
    document.getElementsByClassName('resetfeedback')[0].style.display = "none";
  }

  return false;
}
