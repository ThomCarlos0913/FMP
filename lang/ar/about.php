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
    <script src="../../scripts/main.js" charset="utf-8"></script>
    <link rel="stylesheet" href="../../styles/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="../../styles/main.css">
    <link rel="stylesheet" href="../../styles/about.css">
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
            <label for="name">اتصل </label> <input name="message_contact" type="text" placeholder="Enter Contact Number Here"><br />
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
          <li class="nav-item"><a class="nav-link" href="index.php">الصفحة الرئيسية</a></li>
          <li class="nav-item"><a class="nav-link nav-selected" href="#">معلومات عنا</a></li>
          <li class="nav-item"><a class="nav-link" href="apply.php">قدم الآن</a></li>
        </ul>
        <ul class="navbar-list-container navbar-list navbar-nav ml-auto">
          <?php if (empty($_GET['status']) && !(isset($_SESSION['is_loggedin']) && $_SESSION['is_loggedin'])) {?>
            <li class="nav-item"><a class="nav-link" href="account.php">Sign in</a></li>
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
              <a class="dropdown-item" href="../../about.php">الإنجليزية</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../../lang/chn/about.php">صينى</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">عربى</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Of Navigation -->
    <!-- Start of Page Header -->
    <div class="header-image">
      <h1>معلومات عنا</h1>
    </div>
    <!-- End of Page Header -->
    <!-- Start of About Us Content -->
    <div class="container">
      <div class="row">
        <div class="about col-sm-12">
          <p><strong>FOREVER MANPOWER SERVICES, INC.</strong> هي شركة منظمة حسب الأصول وقائمة بموجب وبموجب قوانين
               جمهورية الفلبين ومسجلة لدى لجنة الأوراق المالية والبورصات بموجب نظام S.E.C Reg. لا
               A1996-04488 مؤرخة 19 أغسطس 1996 ومرخصة وكالة التوظيف الخاصة من قبل الفلبين العمالة في الخارج
               الإدارة (POEA) ، وزارة العمل والتوظيف (DOLE) في 29 نوفمبر 2006 بموجب رقم الترخيص
               POEA-231-LB-121906 ، لتوظيف ومعالجة ونشر العمال الفلبينيين للعمل في الخارج.</p>
          <p>تأسست الشركة في المقام الأول لتلبية الطلب المتزايد على القوى العاملة العرض في مختلف البلدان
               العالم مع العمال الفلبينيين المؤهلين الذين خضعوا لأعلى مستوى من عمليات الاختيار والتوظيف.
               تلتزم الشركة أيضًا بتوفير رضا العملاء بأعلى ترتيب وتلتزم بالمثل بالحماية
               وحماية رفاه العمال المجندين ومصلحتهم وتعزيز صورة الفلبين في الخارج. الشركة
               متخصص في موقع واختيار ونشر الفنيين الفلبينيين للخدمات الطبية وإدارة الفنادق
               والتشغيل والمهندسين والحرفيين والفنيين لمرافق الاتصالات وبناء مصانع البتروكيماويات ،
               الصيانة والتشغيل لجميع أنحاء العالم. FOREVER MANPOWER يستخدم هذا الإعداد الفريد ونظام ل
               ضمان توافر مجموعة قادرة وموثوقة من القوى العاملة - المدربين تدريبا خاصا والمخصصة لأداء مهام أكثر صرامة
               خارج البلاد.</p>
          <p>توزيع ونشر مجموعة أساسية من المهنيين المدربين تدريباً جيداً في جميع أنحاء العالم ونشرهم ؛ ذو مهارات عالية
             والعمال شبه المهرة هم الهدف الأسمى للحفل <strong>FOREVER MANPOالتحويلات. SERVICES, INC.</strong></p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <h1 class="header-1">رؤية</h1>
          <p class="vision-mission">للمساهمة في تطوير حياة لدينا<br />
              العمال المهاجرين من خلال توفير فرص عمل لهم<br />
             الفرص على الصعيد العالمي ومساعدة في الحفاظ على<br />
              استقرار اقتصاد البلاد من خلال<br />
              التحويلات.</p>
        </div>
        <div class="col-sm-6">
          <h1 class="header-1">مهمة</h1>
          <p class="vision-mission">لإنتاج المختصة عالميا<br />
              العمال المهاجرين الذين يشاركون ويساهمون<br />
              إلى العافية لأصحاب العمل.</p>
        </div>
      </div>
    </div>
    <!-- End of About Us Content -->
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
                <li class=""><a href="#">معلومات عنا</a></li>
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
