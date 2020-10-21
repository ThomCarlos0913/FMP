<?php include "../../php/connection.php"; ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>حول | Forever Manpower</title>
    <script src="../../scripts/jquery.min.js" charset="utf-8"></script>
    <script src="../../scripts/popper.min.js" charset="utf-8"></script>
    <script src="../../scripts/bootstrap.min.js" charset="utf-8"></script>
    <script src="../../scripts/applyjs.js" charset="utf-8"></script>
    <script src="../../scripts/main.js" charset="utf-8"></script>
    <link rel="stylesheet" href="../../styles/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="../../styles/main.css">
    <link rel="stylesheet" href="../../styles/apply.css">
    <link rel="stylesheet" href="../../styles/home.css">
    <link rel="stylesheet" href="../../styles/account.css">
  </head>
  <body>
    <!-- Email Overlay -->
    <div class="emailoverlay">
      <div class="emailcontainer">
        <div class="d-flex justify-content-end">
          <button onclick="hideEmailOverlay()" class="closebutton" type="button" name="button">&#10006;</button>
        </div>
        <h1 class="emailoverlayheader"></h1>
        <p class="emailoverlaymessage"></p>
        <div class="emailformcontainer">
          <form class="message-form" action="#" method="post">
            <label for="name">الاسم بالكامل </label> <input name="message_name" type="text" placeholder="Enter Full Name Here"><br />
            <label for="name">البريد الإلكتروني </label> <input name="message_from" type="text" placeholder="Enter Email Here"><br />
            <label for="name">اتصل </label> <input name="message_contact" type="text" placeholder="Enter Contact Number Here"><br />
            <label for="name">رسالة </label> <textarea name="message_body" rows="3" cols="22" placeholder="Enter Message Here"></textarea> <br />
            <span class="submit-setter"></span>  <button type="button" class="submit-message emailoverlaysubmit" name="button">إرسل رسالة</button><br />
            <label for=""></label><span class="messagesent">تم الارسال! سنعود إليك قريبًا.</span>
          </form>
        </div>
      </div>
    </div>
    <!-- Start Of Navigation -->
    <nav class="navbar navbar-expand-md bg-light navbar-light">
      <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_navbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <span class="brand-text-small navbar-text navbar-brand">Forever Manpower</span>
      <div class="collapse navbar-collapse" id="collapse_navbar">
        <span class="brand-text navbar-text navbar-brand">Forever Manpower</span>
        <ul class="navbar-list-container navbar-list navbar-nav">
          <li class="nav-item"><a class="nav-link" href="index.php">الصفحة الرئيسية</a></li>
          <li class="nav-item"><a class="nav-link" href="about.php">معلومات عنا</a></li>
          <li class="nav-item"><a class="nav-link" href="apply.php">قدم الآن</a></li>
        </ul>
        <ul class="navbar-list-container navbar-list navbar-nav ml-auto">
          <?php if (empty($_GET['status']) && !(isset($_SESSION['is_loggedin']) && $_SESSION['is_loggedin'])) {?>
            <li class="nav-item"><a class="nav-link nav-selected" href="#">تسجيل الدخول</a></li>
          <?php } else { ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" data-target="account_options" href="#"><?php echo $_SESSION['current_user']?><span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="account_options">
                <a class="dropdown-item" href="account.php">إعدادت الحساب</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="php/signout.php">تسجيل خروج</a>
              </div>
            </li>
          <?php }?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle lang-btn" data-toggle="dropdown" data-target="dropdown_languages" href="#">لغة <span class="caret"></span></a>
            <div class="dropdown-menu" aria-labelledby="dropdown_languages">
              <a class="dropdown-item" href="../../account.php">الإنجليزية</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../../lang/chn/account.php">صينى</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">عربى</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Of Navigation -->
    <?php if (empty($_GET['status']) && !(isset($_SESSION['is_loggedin']) && $_SESSION['is_loggedin'])) {?>
      <!-- Start of Page Header -->
      <div class="header-image">
        <h1>تسجيل الدخول</h1>
      </div>
      <!-- End of Page Header -->
    <?php } else { ?>
      <!-- Start of Page Header -->
      <div class="header-image">
        <h1>إعدادت الحساب</h1>
      </div>
      <!-- End of Page Header -->
    <?php }?>
    <?php if ((isset($_SESSION['is_loggedin']) && $_SESSION['is_loggedin'])) {?>
      <div class="container">
        <div class="row">
          <div class="col-sm-1"></div>
          <div class="col-sm-4">
            <p class="section-header">معلومات الحساب</p>
            <form class="account-setting-form" action="php/updateinformation.php" method="post">
              <label for="">اسم المستخدم</label>
              <input class="textbox" type="text" name="newusername" value="" placeholder="أدخل اسم مستخدم جديد هنا">
              <p class="guide">اسم المستخدم الحالي: <?php echo $_SESSION['current_user'] ?> </p>
              <div class="spacer"></div>
              <label for="">عنوان بريد الكتروني</label>
              <input class="textbox" type="text" name="newemailadd" value="" placeholder="أدخل عنوان البريد الإلكتروني الجديد هنا">
              <p class="guide">الايميل الحالي:<?php echo $_SESSION['email'] ?> </p>
              <div class="spacer"></div>
              <input class="submitbtn" type="submit" value="تحديث معلومات الحساب">
              <?php if( isset($_GET['feedback']) && $_GET['feedback'] == 'email') { ?> <p class="updatemessage"><strong>نجاح!</strong> تم تحديث عنوان البريد الإلكتروني الآن.</p> <?php } ?>
              <?php if( isset($_GET['feedback']) && $_GET['feedback'] == 'user') { ?> <p class="updatemessage"><strong>نجاح!</strong> تم تحديث اسم المستخدم الآن.</p> <?php } ?>
              <?php if( isset($_GET['feedback']) && $_GET['feedback'] == 'emailuser') { ?> <p class="updatemessage"><strong>نجاح!</strong> يتم تحديث اسم المستخدم والبريد الإلكتروني.</p> <?php } ?>
              <?php if( isset($_GET['feedback']) && $_GET['feedback'] == 'noinput') { ?> <p class="updatemessage noupdate">الرجاء إدخال التغييرات التي تريدها.</p> <?php } ?>
            </form>
          </div>
          <div class="col-sm-1"></div>
          <div class="col-sm-4">
            <p class="section-header">تغيير كلمة المرور</p>
            <form class="account-setting-form" action="php/updatepassword.php" method="post">
              <label for="">كلمة سر جديدة</label>
              <input class="textbox" type="password" name="newpass" value="" placeholder="أدخل كلمة المرور الجديدة هنا">
              <div class="spacer"></div>
              <label for="">تأكيد كلمة المرور الجديدة</label>
              <input class="textbox" type="password" name="confpass" value="" placeholder="تأكيد كلمة المرور الجديدة هنا">
              <div class="spacer"></div>
              <label for="">كلمة المرور الحالية</label>
              <input class="textbox" type="password" name="currentpass" value="" placeholder="أدخل كلمة المرور الحالية هنا">
              <div class="spacer"></div>
              <input class="submitbtn" type="submit" name="" value="تطوير كلمة السر">
              <?php if( isset($_GET['feedback']) && $_GET['feedback'] == 'password') { ?> <p class="updatemessage"><strong>نجاح!</strong> تم تحديث كلمة المرور الآن.</p> <?php } ?>
              <?php if( isset($_GET['feedback']) && $_GET['feedback'] == 'passinputmismatch') { ?> <p class="updatemessage errormess"><strong>خطأ!</strong> تأكيد كلمة المرور غير متطابقة.</p> <?php } ?>
              <?php if( isset($_GET['feedback']) && $_GET['feedback'] == 'wrongpass') { ?> <p class="updatemessage errormess"><strong>خطأ!</strong> كلمة المرور الحالية لا خطأ.</p> <?php } ?>
              <?php if( isset($_GET['feedback']) && $_GET['feedback'] == 'nopassinput') { ?> <p class="updatemessage noupdate">الرجاء إدخال التغييرات التي تريدها.</p> <?php } ?>
            </form>
          </div>
          <div class="col-sm-1"></div>
        </div>
      </div>
    <?php }?>
    <?php if (empty($_GET['status']) && !(isset($_SESSION['is_loggedin']) && $_SESSION['is_loggedin'])) { ?>
      <!-- Start of Login/Signup Form -->
      <div class="container">
        <div class="login-form">
          <div class="d-flex justify-content-center">
            <h1 class="create-account-header">سجّل الدخول إلى حسابك وانضم إلى الآلاف الذين وجدوا وظيفة في Forever Manpower.</h1>
          </div>
          <div class="row">
            <!-- User Login -->
            <div class="col-sm-1 spacer"></div>
            <div class="col-sm-4">
              <h1 class="form-header">تسجيل الدخول</h1>
              <form class="applicant-form" action="php/signin.php" method="post">
                <label for="user-loginusername">اسم المستخدم</label><br/>
                <input class="textbox" type="text" name="user-loginusername" placeholder="Enter username here"><br/>
                <label for="user-loginpassword">كلمه السر</label><br/>
                <input class="textbox" type="password" name="user-loginpassword" placeholder="Enter password here"><br/>

                <div class="container">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- <input type="checkbox" name="" value=""> <span class="remember">تذكرنى</span> -->
                    </div>
                    <div class="col-sm-6 d-flex justify-content-end">
                      <label for=""><a class="forgot" href="#">هل نسيت كلمة المرور</a></label>
                    </div>
                  </div>
                </div>
                <?php if (isset($_SESSION['wrong_login_credentials']) && $_SESSION['wrong_login_credentials']) {
                  $_SESSION['wrong_login_credentials'] = false;?>
                  <p class="incorrect-message d-flex justify-content-center">اسم المستخدم أو كلمة المرور خاطئة.</p>
                <?php }?>
                <input class="submit-btn signin-responsive-spacer" type="submit" name="submit-btn" value="Login Account">
              </form>
            </div>
            <!-- User Create Account -->
            <div class="col-sm-1 spacer"></div>
            <div class="col-sm-5">
              <h1 class="form-header">سجل</h1>

              <form class="applicant-form" action="php/signup.php" method="post" onsubmit="return checkData()">
                <div class="row name-row-input">
                  <div class="col-sm-5">
                    <input id="create_firstname" class="create-nametext" type="text" name="user-firstname" placeholder="First Name">
                  </div>
                  <div class="col-sm-2 middle">
                    <input id="create_middlename" class="create-nametext" type="text" name="user-mi" maxlength="2" placeholder="M.I">
                  </div>
                  <div class="col-sm-5">
                    <input id="create_lastname" class="create-nametext" type="text" name="user-lastname" placeholder="Last Name">
                  </div>
                </div>
                <input id="create_username" class="textbox" type="text" name="user-username" placeholder="Username"><br/>
                <input id="create_homeaddress" class="textbox" type="text" name="user-address" placeholder="Home Address"><br/>
                <input id="create_email" class="textbox" type="text" name="user-email" placeholder="Email Address"><br/>
                <div class="row">
                  <div class="col-sm-6">
                    <input id="create_password" class="textbox" type="password" name="user-password" placeholder="Password"><br/>
                  </div>
                  <div class="col-sm-6">
                    <input id="create_confirmpass" class="textbox" type="password" name="user-confirmpassword" placeholder="Confirm Password" title="Re-enter your typed password"><br/>
                  </div>
                </div>

                <p class="bday-label">عيد الميلاد</p>
                <select class="select-year select-box" name="select-year">
                  <option selected="true" value="Year">عام</option>
                </select>
                <select class="select-month select-box" name="select-month">
                  <option selected="true" value="Month">شهر</option>
                </select>
                <select class="select-date select-box" name="select-date">
                  <option selected="true" value="Date">تاريخ</option>
                </select>

                <div id="incomplete-form">
                  <p class="incorrect-message d-flex justify-content-center"><strong>خطأ! </strong> يرجى ملء جميع النماذج المطلوبة.</p>
                </div>
                <div id="password-mismatch">
                  <p class="incorrect-message d-flex justify-content-center"><strong>خطأ! </strong> تأكيد كلمة المرور غير متطابقة.</p>
                </div>
                <div id="numeric-error">
                  <p class="incorrect-message d-flex justify-content-center"><strong>خطأ! </strong> يجب أن يحتوي الاسم على أحرف ألفا فقط</p>
                </div>

                <?php if(isset($_GET['createerror']) && $_GET['createerror'] == "userExist") {?>
                  <div id="user-exist">
                    <p class="incorrect-message d-flex justify-content-center">يوجد مستخدم بنفس الاسم الأول واسم العائلة وعيد الميلاد. إذا كان هذا الحساب خاص بك ، فيرجى النقر فوق هل نسيت كلمة المرور؟</p>
                  </div>
                <?php } if(isset($_GET['createerror']) && $_GET['createerror'] == "usernameFound") {?>
                  <div id="username-exist">
                    <p class="incorrect-message d-flex justify-content-center">اسم المستخدم موجود بالفعل ، يرجى اختيار اسم مستخدم آخر.</p>
                  </div>
                <?php }?>

                <input class="submit-btn" type="submit" name="submit-btn" value="Create Account">
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- End of Login/Signup Form -->
    <?php } ?>
    <!-- Start Of Footer -->
    <footer class="page-footer">
      <div class="footer-content">
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <h1 class="footer-header">Forever Manpower Services, Inc.</h1>
              <p class="footer-text">POEA License No.: POEA-271-LB-121218-R</p>
              <p class="footer-text">Copyright © 2019</p>
            </div>
            <div class="col-sm-3">
              <h1 class="footer-header">الروابط</h1>
              <ol class="footer-list">
                <li class=""><a href="index.php">الصفحة الرئيسية</a></li>
                <li class=""><a href="about.php">معلومات عنا</a></li>
                <li class=""><a href="#">قدم الآن</a></li>
              </ol>
            </div>
            <div class="col-sm-3">
              <h1 class="footer-header">رسائل البريد الإلكتروني</h1>
              <ol class="footer-list">
                <li class=""><a href="#" onclick="return showEmailOverlay('techsupp')">دعم تقني</a></li>
                <li class=""><a href="#" onclick="return showEmailOverlay('business')">اعمال</a></li>
                <li class=""><a href="#" onclick="return showEmailOverlay('partner')">شريك</a></li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-credits">
        <p>© 2019 Copyright. Created by ADUInno</p>
      </div>
    </footer>
    <!-- End Of Footer -->
  </body>
</html>
