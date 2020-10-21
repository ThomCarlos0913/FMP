<?php include "../../php/connection.php"; ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>الصفحة الرئيسية | Forever Manpower</title>
    <script src="../../scripts/jquery.min.js" charset="utf-8"></script>
    <script src="../../scripts/popper.min.js" charset="utf-8"></script>
    <script src="../../scripts/bootstrap.min.js" charset="utf-8"></script>
    <script src="../../scripts/main.js" charset="utf-8"></script>
    <link rel="stylesheet" href="../../styles/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="../../styles/main.css">
    <link rel="stylesheet" href="../../styles/home.css">
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
            <label for="name">Contact </label> <input name="message_contact" type="text" placeholder="Enter Contact Number Here"><br />
            <label for="name">رسالة </label> <textarea name="message_body" rows="3" cols="22" placeholder="Enter Message Here"></textarea> <br />
            <span class="submit-setter"></span>  <button type="button" class="submit-message emailoverlaysubmit" name="button">إرسال رسالة</button><br />
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
          <li class="nav-item"><a class="nav-link nav-selected" href="#">الصفحة الرئيسية</a></li>
          <li class="nav-item"><a class="nav-link" href="about.php">معلومات عنا</a></li>
          <li class="nav-item"><a class="nav-link" href="apply.php">قدم الآن</a></li>
        </ul>
        <ul class="navbar-list-container navbar-list navbar-nav ml-auto">
          <?php if (empty($_GET['status']) && !(isset($_SESSION['is_loggedin']) && $_SESSION['is_loggedin'])) {?>
            <li class="nav-item"><a class="nav-link" href="account.php">تسجيل الدخول</a></li>
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
              <a class="dropdown-item" href="../../index.php">الإنجليزية</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../../lang/chn/index.php">صينى</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">عربى</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Of Navigation -->
    <!-- Start Of jumbotron -->
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">رضا العملاء التام</h1>
        <p class="lead">
          <a class="btn btn-primary btn-lg" href="apply.php" role="button">قدم الآن</span></a>
        </p>
      </div>
    </div>
    <!-- End Of jumbotron -->
    <!-- Start Of Main Body -->
    <div class="container">
      <div class="row">
        <div class="services-container col-sm-6">
          <h1 class="header-1">عروض العملاء</h1>
          <ul class="offerings">
            <li>إجراءات التوظيف والاختيار بما في ذلك الإعلانات</li>
            <li>الفحص الطبي والنفسي</li>
            <li>التدريب واختبار التجارة</li>
            <li>التوثيق ومعالجة المتطلبات</li>
            <li>الإحاطة والتوجيه</li>
            <li>خدمة السفر والتأجير</li>
            <li>خدمة المتابعة</li>
          </ul>
        </div>
        <div class="philosophy-container col-sm-6">
          <h1 class="header-1">فلسفة الشركة</h1>
          <p>FOREVER MANPOWER SERVICES, INC., داعية متعطشا للإدارة المهنية
             التقنيات والممارسات التجارية السليمة. هدفها النهائي في تسيير أعمالها هو <br />
            <strong>"رضا العملاء التام"</strong></p>
          <p>الشركة مؤتمتة بالكامل ومجهزة بالحاسوب وتستكمل من قبلها
             ومجموعة مدربة تدريبا جيدا من المديرين والموظفين التقنيين للتعامل مع جميع أنواع
             من الوظائف المطلوبة من قبل عملائها في الخارج.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <h1 class="header-1">اتصل بنا</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <p class="p2">مفتوح الاثنين - الجمعة ، 9:00 حتي 5:00</p> <hr />
          <p class="p3">أرقام الهاتف</p>
          <ul class="contact-list">
            <li>+632 6184982</li>
            <li>+632 5238001</li>
            <li>+632 5242308</li>
          </ul>
          <p class="p3">رقم الفاكس</p>
          <ul class="contact-list">
            <li>(02) 524-2308</li>
          </ul>
          <p class="p2">عنوان</p> <hr />
          <p>Units 8 and 12, Salud Building, <br />
            1713 Angel Linao Street, <br />
            Paco, Manila, PHILIPPINES</p>
        </div>
        <div class="col-md-5">
          <p class="p2">رسالة لنا</p>
          <hr />
          <form class="message-form" action="#" method="post">
            <label for="name">الاسم بالكامل </label> <input name="message_name" type="text" placeholder="أدخل الاسم الكامل هنا"><br />
            <label for="name">البريد الإلكتروني </label> <input name="message_from" type="text" placeholder="أدخل البريد الإلكتروني هنا"><br />
            <label for="name">اتصل </label> <input name="message_contact" type="text" placeholder="أدخل رقم الاتصال هنا"><br />
            <label for="name">رسالة </label> <textarea name="message_body" rows="3" cols="22" placeholder="أدخل الرسالة هنا"></textarea> <br />
            <span class="submit-setter"></span> <button type="button" class="submit-message" onclick="sendEmail('feedback')" name="button">إرسال رسالة</button><br />
            <label for=""></label><span class="messagesent">تم الارسال! سنعود إليك قريبًا.</span>
          </form>
        </div>
        <div class="col-lg-3">
          <p class="p2">Google خريطة</p>
          <hr />
          <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.399503158862!2d120.99168381477396!3d14.57629708981796!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c985e9965c87%3A0xf83ff63c15b48c49!2sForever%20Manpower%20Services%2C%20Inc.!5e0!3m2!1sen!2sph!4v1568595290590!5m2!1sen!2sph"
              width="100%" height="400" allowfullscreen=""></iframe>
          </div>
        </div>
      </div>
    </div>
    <!-- End Of Main Body -->
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
                <li class=""><a href="#">الصفحة الرئيسية</a></li>
                <li class=""><a href="about.php">معلومات عنا</a></li>
                <li class=""><a href="apply.php">قدم الآن</a></li>
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
