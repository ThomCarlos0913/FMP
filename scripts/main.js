function showEmailOverlay(param){
  document.getElementsByClassName('emailoverlay')[0].style.display = "block";
  document.getElementsByClassName('messagesent')[0].style.visibility = "hidden";
  document.getElementsByClassName('emailcontainer')[0].style.display = "block";
  try {
    document.getElementsByClassName('deleteapproval')[0].style.display = "none";
  }
  catch {}
  try {document.getElementsByClassName('forgotpassword')[0].style.display = "none";} catch {}

  switch (param) {
    case 'techsupp':
      document.getElementsByClassName('emailoverlayheader')[0].innerHTML = "Tech Support Email";
      document.getElementsByClassName('emailoverlaymessage')[0].innerHTML = "Got any problems or question? Fill up the form below and we will get back to you as soon as possible.";
      document.getElementsByClassName('emailoverlaysubmit')[0].onclick = function() {
        sendEmail('techsupp', 1);
      }
      break;
    case 'business':
      document.getElementsByClassName('emailoverlayheader')[0].innerHTML = "Business Email";
      document.getElementsByClassName('emailoverlaymessage')[0].innerHTML = "Questions or inquiries regarding our business? Fill up the form below and we will get back to you as soon as possible.";
      document.getElementsByClassName('emailoverlaysubmit')[0].onclick = function() {
        sendEmail('business', 1);
      }
      break;
    case 'partner':
      document.getElementsByClassName('emailoverlayheader')[0].innerHTML = "Partner Email";
      document.getElementsByClassName('emailoverlaymessage')[0].innerHTML = "Want to partner with us? Fill up the form below and we will get back to you as soon as possible.";
      document.getElementsByClassName('emailoverlaysubmit')[0].onclick = function() {
        sendEmail('partner', 1);
        return false;
      }
      break;
  }

  return false;
}

function hideEmailOverlay() {
  document.getElementsByClassName('emailoverlay')[0].style.display = "none";
}

function sendEmail(param, n) {

  if (n == 2) {
    c = 1
  }
  else {
    c = 0
  }

  var message_name = document.getElementsByName('message_name')[c].value;
  var message_from = document.getElementsByName('message_from')[c].value;
  var message_contact = document.getElementsByName('message_contact')[c].value;
  var message_body = document.getElementsByName('message_body')[c].value;

  $.ajax({
    type: 'POST',
    url: 'php/sendemail.php',
    data: {'PARAMS': param, 'message_name': message_name, 'message_from': message_from, 'message_contact': message_contact, 'message_body': message_body},
    success: function(data) {
      if (param == 'feedback') {
        document.getElementsByClassName('messagesent')[1].style.visibility = "visible";
      }
      else {
        document.getElementsByClassName('messagesent')[0].style.visibility = "visible";
      }
    }
  });
  return false;
}
