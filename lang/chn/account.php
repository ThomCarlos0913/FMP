<?php include "../../php/connection.php"; ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>About | Forever Manpower</title>
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
          <li class="nav-item"><a class="nav-link" href="#">家</a></li>
          <li class="nav-item"><a class="nav-link" href="about.php">关于我们</a></li>
          <li class="nav-item"><a class="nav-link" href="apply.php">现在申请</a></li>
        </ul>
        <ul class="navbar-list-container navbar-list navbar-nav ml-auto">
          <?php if (empty($_GET['status']) && !(isset($_SESSION['is_loggedin']) && $_SESSION['is_loggedin'])) {?>
            <li class="nav-item"><a class="nav-link nav-selected" href="account.php">登入</a></li>
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
              <a class="dropdown-item" href="../../account.php">英语</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">中文</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../../lang/ar/account.php">阿拉伯</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Of Navigation -->
    <?php if (empty($_GET['status']) && !(isset($_SESSION['is_loggedin']) && $_SESSION['is_loggedin'])) {?>
      <!-- Start of Page Header -->
      <div class="header-image">
        <h1>登入</h1>
      </div>
      <!-- End of Page Header -->
    <?php } else { ?>
      <!-- Start of Page Header -->
      <div class="header-image">
        <h1>帐号设定</h1>
      </div>
      <!-- End of Page Header -->
    <?php }?>
    <?php if ((isset($_SESSION['is_loggedin']) && $_SESSION['is_loggedin'])) {?>
      <div class="container">
        <div class="row">
          <div class="col-sm-1"></div>
          <div class="col-sm-4">
            <p class="section-header">帐户信息</p>
            <form class="account-setting-form" action="../../php/updateinformation.php" method="post">
              <label for="">用户名</label>
              <input class="textbox" type="text" name="newusername" value="" placeholder="在此处输入新的用户名">
              <p class="guide">当前用户名：<?php echo $_SESSION['current_user'] ?> </p>
              <div class="spacer"></div>
              <label for="">电子邮件地址</label>
              <input class="textbox" type="text" name="newemailadd" value="" placeholder="在此处输入新的电子邮件地址">
              <p class="guide">当前的电子邮件：<?php echo $_SESSION['email'] ?> </p>
              <div class="spacer"></div>
              <input class="submitbtn" type="submit" value="更新帐户信息">
              <?php if( isset($_GET['feedback']) && $_GET['feedback'] == 'email') { ?> <p class="updatemessage"><strong>成功！</strong> 电子邮件地址现已更新。</p> <?php } ?>
              <?php if( isset($_GET['feedback']) && $_GET['feedback'] == 'user') { ?> <p class="updatemessage"><strong>成功！</strong> 用户名现已更新。</p> <?php } ?>
              <?php if( isset($_GET['feedback']) && $_GET['feedback'] == 'emailuser') { ?> <p class="updatemessage"><strong>成功！</strong> 用户名和电子邮件已更新。</p> <?php } ?>
              <?php if( isset($_GET['feedback']) && $_GET['feedback'] == 'noinput') { ?> <p class="updatemessage noupdate"> 请输入您想要的更改。</p> <?php } ?>
            </form>
          </div>
          <div class="col-sm-1"></div>
          <div class="col-sm-4">
            <p class="section-header">更改密码</p>
            <form class="account-setting-form" action="../../php/updatepassword.php" method="post">
              <label for="">新密码</label>
              <input class="textbox" type="password" name="newpass" value="" placeholder="在这里输入新密码">
              <div class="spacer"></div>
              <label for="">确认新密码</label>
              <input class="textbox" type="password" name="confpass" value="" placeholder="在这里确认新密码">
              <div class="spacer"></div>
              <label for="">当前密码</label>
              <input class="textbox" type="password" name="currentpass" value="" placeholder="在此输入当前密码">
              <div class="spacer"></div>
              <input class="submitbtn" type="submit" name="" value="Update Password">
              <?php if( isset($_GET['feedback']) && $_GET['feedback'] == 'password') { ?> <p class="updatemessage"><strong>成功！</strong> 密码现已更新。</p> <?php } ?>
              <?php if( isset($_GET['feedback']) && $_GET['feedback'] == 'passinputmismatch') { ?> <p class="updatemessage errormess"><strong>错误！</strong> 确认密码不匹配。</p> <?php } ?>
              <?php if( isset($_GET['feedback']) && $_GET['feedback'] == 'wrongpass') { ?> <p class="updatemessage errormess"><strong>错误！</strong> 当前密码确实有误。</p> <?php } ?>
              <?php if( isset($_GET['feedback']) && $_GET['feedback'] == 'nopassinput') { ?> <p class="updatemessage noupdate">请输入您想要的更改。</p> <?php } ?>
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
            <h1 class="create-account-header">登录到您的帐户，并加入成千上万在Forever Manpower找到工作的人。</h1>
          </div>
          <div class="row">
            <!-- User Login -->
            <div class="col-sm-1 spacer"></div>
            <div class="col-sm-4">
              <h1 class="form-header">登入</h1>
              <form class="applicant-form" action="../../php/signin.php" method="post">
                <label for="user-loginusername">用户名</label><br/>
                <input class="textbox" type="text" name="user-loginusername" placeholder="在此处输入用户名"><br/>
                <label for="user-loginpassword">密码</label><br/>
                <input class="textbox" type="password" name="user-loginpassword" placeholder="在这里输入密码"><br/>

                <div class="container">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- <input type="checkbox" name="" value=""> <span class="remember">记住账号</span> -->
                    </div>
                    <div class="col-sm-6 d-flex justify-content-end">
                      <label for=""><a class="forgot" href="#">忘记密码</a></label>
                    </div>
                  </div>
                </div>
                <?php if (isset($_SESSION['wrong_login_credentials']) && $_SESSION['wrong_login_credentials']) {
                  $_SESSION['wrong_login_credentials'] = false;?>
                  <p class="incorrect-message d-flex justify-content-center">错误的用户名或密码。</p>
                <?php }?>
                <input class="submit-btn signin-responsive-spacer" type="submit" name="submit-btn" value="登录帐号">
              </form>
            </div>
            <!-- User Create Account -->
            <div class="col-sm-1 spacer"></div>
            <div class="col-sm-5">
              <h1 class="form-header">注册</h1>

              <form class="applicant-form" action="../../php/signup.php" method="post" onsubmit="return checkData()">
                <div class="row name-row-input">
                  <div class="col-sm-5">
                    <input id="create_firstname" class="create-nametext" type="text" name="user-firstname" placeholder="名字">
                  </div>
                  <div class="col-sm-2 middle">
                    <input id="create_middlename" class="create-nametext" type="text" name="user-mi" maxlength="2" placeholder="我">
                  </div>
                  <div class="col-sm-5">
                    <input id="create_lastname" class="create-nametext" type="text" name="user-lastname" placeholder="姓">
                  </div>
                </div>
                <input id="create_username" class="textbox" type="text" name="user-username" placeholder="用户名"><br/>
                <input id="create_homeaddress" class="textbox" type="text" name="user-address" placeholder="家庭地址"><br/>
                <input id="create_email" class="textbox" type="text" name="user-email" placeholder="电子邮件地址"><br/>
                <div class="row">
                  <div class="col-sm-6">
                    <input id="create_password" class="textbox" type="password" name="user-password" placeholder="密码"><br/>
                  </div>
                  <div class="col-sm-6">
                    <input id="create_confirmpass" class="textbox" type="password" name="user-confirmpassword" placeholder="确认密码" title="Re-enter your typed password"><br/>
                  </div>
                </div>

                <p class="bday-label">生日</p>
                <select class="select-year select-box" name="select-year">
                  <option selected="true" value="Year">年</option>
                </select>
                <select class="select-month select-box" name="select-month">
                  <option selected="true" value="Month">月</option>
                </select>
                <select class="select-date select-box" name="select-date">
                  <option selected="true" value="Date">日期</option>
                </select>

                <div id="incomplete-form">
                  <p class="incorrect-message d-flex justify-content-center"><strong>错误！</strong> 请填写所有必填表格。</p>
                </div>
                <div id="password-mismatch">
                  <p class="incorrect-message d-flex justify-content-center"><strong>错误！</strong> 确认密码不匹配。</p>
                </div>
                <div id="numeric-error">
                  <p class="incorrect-message d-flex justify-content-center"><strong>错误！</strong> 名称只能包含字母字符</p>
                </div>

                <?php if(isset($_GET['createerror']) && $_GET['createerror'] == "userExist") {?>
                  <div id="user-exist">
                    <p class="incorrect-message d-flex justify-content-center">具有相同的名字，姓氏和生日的用户已经存在。 如果这是您的帐户，请单击“忘记密码”。</p>
                  </div>
                <?php } if(isset($_GET['createerror']) && $_GET['createerror'] == "usernameFound") {?>
                  <div id="username-exist">
                    <p class="incorrect-message d-flex justify-content-center">用户名已经存在，请选择其他用户名。</p>
                  </div>
                <?php }?>

                <input class="submit-btn" type="submit" name="submit-btn" value="创建帐号">
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
