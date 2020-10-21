<?php include "../../php/connection.php"; ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Home | Forever Manpower</title>
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
            <label for="name">全名 </label> <input name="message_name" type="text" placeholder="在这里输入全名"><br />
            <label for="name">电子邮件 </label> <input name="message_from" type="text" placeholder="在此处输入电子邮件"><br />
            <label for="name">联系 </label> <input name="message_contact" type="text" placeholder="在此输入联系电话"><br />
            <label for="name">信息 </label> <textarea name="message_body" rows="3" cols="22" placeholder="在此处输入消息"></textarea> <br />
            <span class="submit-setter"></span>  <button type="button" class="submit-message emailoverlaysubmit" name="button">发信息</button><br />
            <label for=""></label><span class="messagesent">讯息已发送！ 我们会尽快与您联系。</span>
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
          <li class="nav-item"><a class="nav-link nav-selected" href="#">家</a></li>
          <li class="nav-item"><a class="nav-link" href="about.php">关于我们</a></li>
          <li class="nav-item"><a class="nav-link" href="apply.php">现在申请</a></li>
        </ul>
        <ul class="navbar-list-container navbar-list navbar-nav ml-auto">
          <?php if (empty($_GET['status']) && !(isset($_SESSION['is_loggedin']) && $_SESSION['is_loggedin'])) {?>
            <li class="nav-item"><a class="nav-link" href="account.php">登入</a></li>
          <?php } else { ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" data-target="account_options" href="#"><?php echo $_SESSION['current_user']?><span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="account_options">
                <a class="dropdown-item" href="account.php">帐号设定</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../../php/signout.php">登出</a>
              </div>
            </li>
          <?php }?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle lang-btn" data-toggle="dropdown" data-target="dropdown_languages" href="#">语言 <span class="caret"></span></a>
            <div class="dropdown-menu" aria-labelledby="dropdown_languages">
              <a class="dropdown-item" href="../../index.php">英语</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">中文</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../../lang/ar/index.php">阿拉伯</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Of Navigation -->
    <!-- Start Of jumbotron -->
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">总体客户满意度</h1>
        <p class="lead">
          <a class="btn btn-primary btn-lg" href="apply.php" role="button">现在申请</span></a>
        </p>
      </div>
    </div>
    <!-- End Of jumbotron -->
    <!-- Start Of Main Body -->
    <div class="container">
      <div class="row">
        <div class="services-container col-sm-6">
          <h1 class="header-1">客户产品</h1>
          <ul class="offerings">
            <li>招聘和选择程序，包括广告</li>
            <li>医学和心理筛查</li>
            <li>培训和贸易测试</li>
            <li>需求记录和处理</li>
            <li>情况介绍和方向</li>
            <li>旅游服务和包机</li>
            <li>后续服务</li>
          </ul>
        </div>
        <div class="philosophy-container col-sm-6">
          <h1 class="header-1">企业理念</h1>
          <p>FOREVER MANPOWER SERVICES，INC。，专业管理的狂热拥护者
             技术和良好的商业惯例。 其开展业务的最终目标是
             <strong>“客户总满意度”</strong></p>
          <p>该公司是全自动的，配备计算机的，并辅以专用
             以及训练有素的专业管理人员和技术人员团队来处理各种事务
             其海外业务客户所需的工作。</p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <h1 class="header-1">联系我们</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <p class="p2">周一至周五，上午9点至下午5点开放</p> <hr />
          <p class="p3">电话号码</p>
          <ul class="contact-list">
            <li>+632 6184982</li>
            <li>+632 5238001</li>
            <li>+632 5242308</li>
          </ul>
          <p class="p3">传真号</p>
          <ul class="contact-list">
            <li>(02) 524-2308</li>
          </ul>
          <p class="p2">地址</p> <hr />
          <p>Salud大楼8和12号单元，<br />
             1713 Angel Linao Street，<br />
             菲律宾马尼拉Paco</p>
        </div>
        <div class="col-md-5">
          <p class="p2">给我们留言</p>
          <hr />
          <form class="message-form" action="#" method="post">
            <label for="name">全名 </label> <input name="message_name" type="text" placeholder="在这里输入全名"><br />
            <label for="name">电子邮件 </label> <input name="message_from" type="text" placeholder="在此处输入电子邮件"><br />
            <label for="name">联系 </label> <input name="message_contact" type="text" placeholder="在此输入联系电话"><br />
            <label for="name">信息 </label> <textarea name="message_body" rows="3" cols="22" placeholder="在此处输入消息"></textarea> <br />
            <span class="submit-setter"></span> <button type="button" class="submit-message" onclick="sendEmail('feedback')" name="button">发信息</button><br />
            <label for=""></label><span class="messagesent">讯息已发送！ 我们会尽快与您联系。</span>
          </form>
        </div>
        <div class="col-lg-3">
          <p class="p2">谷歌地图</p>
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
              <p class="footer-text">版权所有©2019</p>
            </div>
            <div class="col-sm-3">
              <h1 class="footer-header">链接</h1>
              <ol class="footer-list">
                <li class=""><a href="#">家</a></li>
                <li class=""><a href="about.php">关于我们</a></li>
                <li class=""><a href="apply.php">现在申请</a></li>
              </ol>
            </div>
            <div class="col-sm-3">
              <h1 class="footer-header">电邮</h1>
              <ol class="footer-list">
                <li class=""><a href="#" onclick="return showEmailOverlay('techsupp')">技术支持</a></li>
                <li class=""><a href="#" onclick="return showEmailOverlay('business')">商业</a></li>
                <li class=""><a href="#" onclick="return showEmailOverlay('partner')">伙伴</a></li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-credits">
        <p>©2019版权所有。 由ADUInno创建</p>
      </div>
    </footer>
    <!-- End Of Footer -->
  </body>
</html>
