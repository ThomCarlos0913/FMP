<?php include "../../php/connection.php";?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Apply | Forever Manpower</title>
    <script src="../../scripts/jquery.min.js" charset="utf-8"></script>
    <script src="../../scripts/popper.min.js" charset="utf-8"></script>
    <script src="../../scripts/bootstrap.min.js" charset="utf-8"></script>
    <script src="../../scripts/applyjs.js" charset="utf-8"></script>
    <script src="../../scripts/main.js" charset="utf-8"></script>
    <link rel="stylesheet" href="../../styles/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="../../styles/main.css">
    <link rel="stylesheet" href="../../styles/apply.css">
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
          <li class="nav-item"><a class="nav-link" href="index.php">家</a></li>
          <li class="nav-item"><a class="nav-link" href="about.php">关于我们</a></li>
          <li class="nav-item"><a class="nav-link nav-selected" href="#">现在申请</a></li>
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
                <a class="dropdown-item" href="php/signout.php">登出</a>
              </div>
            </li>
          <?php }?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle lang-btn" data-toggle="dropdown" data-target="dropdown_languages" href="#">语言 <span class="caret"></span></a>
            <div class="dropdown-menu" aria-labelledby="dropdown_languages">
              <a class="dropdown-item" href="../../apply.php">英语</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">中文</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../../lang/ar/apply.php">阿拉伯</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Of Navigation -->
    <?php if (empty($_GET['status']) && !(isset($_SESSION['is_loggedin']) && $_SESSION['is_loggedin'])) {?>
      <!-- Start of Page Header -->
      <div class="header-image">
        <h1>现在申请</h1>
      </div>
      <!-- End of Page Header -->
    <?php }?>
    <?php if ((isset($_SESSION['is_loggedin']) && $_SESSION['is_loggedin'])) {?>
      <!-- Start of User Page -->
      <div class="user-page">
        <!-- Start of Navigation Tabs -->
        <div class="container">
          <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-secondary active" onclick="changeTab(0);">申请状态</button>
            <button type="button" class="btn btn-secondary" onclick="changeTab(1); initializeFirstApplicationTab();">发送申请</button>
          </div>
        </div>
        <!-- End of Navigation Tabs -->
      </div>
      <div class="account-navigation-container">
        <!-- Start of Send Application -->
        <div class="container send-application">
          <form class="send-application-form" action="php/sendapplication.php" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-sm-3">
                <ul class="list-group">
                  <li class="list-group-item header">申请进度</li>
                  <li class="list-group-item d-flex">个人资料 <img class="pointer ml-auto" src="../../styles/resources/images/arrow-left.svg" width="15px" alt=""> </li>
                  <li class="list-group-item d-flex">婚姻状况 <img class="pointer ml-auto" src="../../styles/resources/images/arrow-left.svg" width="15px" alt=""></li>
                  <li class="list-group-item d-flex">亲戚们 <img class="pointer ml-auto" src="../../styles/resources/images/arrow-left.svg" width="15px" alt=""></li>
                  <li class="list-group-item d-flex">联系人和地址 <img class="pointer ml-auto" src="../../styles/resources/images/arrow-left.svg" width="15px" alt=""></li>
                  <li class="list-group-item d-flex">教育 <img class="pointer ml-auto" src="../../styles/resources/images/arrow-left.svg" width="15px" alt=""></li>
                  <li class="list-group-item d-flex">就业机会 <img class="pointer ml-auto" src="../../styles/resources/images/arrow-left.svg" width="15px" alt=""></li>
                  <li class="list-group-item d-flex">图像和工作申请 <img class="pointer ml-auto" src="../../styles/resources/images/arrow-left.svg" width="15px" alt=""></li>
                </ul>
              </div>
              <div class="col-sm-9">
                <!-- Start of Personal Details -->
                <div class="application-tab">
                  <div class="d-flex justify-content-between">
                    <div>
                      <p>个人资料</p>
                    </div>
                    <div>
                      <p class="message-asterisks">注意：带星号（*）的字段为必填项。 如果您没有中间名，请输入“ n / a”</p>
                    </div>
                  </div>
                  <!-- Firstname, Middlename, Surname -->
                  <div class="row">
                    <div class="col-sm-4">
                      <label for="">名字 <span class="important">*</span></label>
                      <input class="textbox" type="text" name="firstname" value="<?php echo $_SESSION['firstname']?>">
                    </div>
                    <div class="col-sm-4">
                      <label for="">中间名字 <span class="important">*</span></label>
                      <input class="textbox" type="text" name="middlename" value="">
                    </div>
                    <div class="col-sm-4">
                      <label for="">姓 <span class="important">*</span></label>
                      <input class="textbox" type="text" name="lastname" value="<?php echo $_SESSION['lastname']?>">
                    </div>
                  </div>
                  <!-- Birthday, Age, Blood Type -->
                  <div class="row">
                    <div class="col-sm-3">
                      <label for="">生日 </label>
                      <input class="textbox" type="text" name="birthdate" value="<?php echo $_SESSION['birthdate']?>">
                    </div>
                    <div class="col-sm-2">
                      <label for="">年龄 </label>
                          <input class="textbox numerictextbox" type="text" name="age" placeholder="例 42">
                    </div>
                    <div class="col-sm-3">
                      <label for="">血型 </label>
                      <input class="textbox numerictextbox" type="text" name="bloodtype" placeholder="例 O">
                    </div>
                  </div>
                  <!-- Height, Weight -->
                  <div class="row">
                    <div class="col-sm-3">
                      <label for="">身高（厘米） </label>
                      <input class="textbox numerictextbox" type="text" name="height" placeholder="例 400">
                    </div>
                    <div class="col-sm-3">
                      <label for="">重量（公斤） </label>
                      <input class="textbox numerictextbox" type="text" name="weight" placeholder="例 40">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-5">
                      <label>语言</label><br />
                      <input type="checkbox" name="languages" class="langcheck" value="English"><label class="radio-checkbox-label">英语</label>
                      <input type="checkbox" name="languages" class="langcheck" value="Tagalog"><label class="radio-checkbox-label">他加禄语</label>
                      <input type="checkbox" name="languages" class="langcheck" value="Other"><label class="radio-checkbox-label">其他</label>
                      <input class="textbox langcheck"type="text" name="languages-text" placeholder="如果选中其他，则填写 例 Nihongo">
                      <p class="otherlangmess">请填写上方的其他语言文本框</p>
                    </div>
                    <div class="col-sm-6">
                      <label>宗教</label><br />
                      <input type="checkbox" name="religion" value="Catholic"><label class="radio-checkbox-label">天主教徒</label>
                      <input type="checkbox" name="religion" value="Christian"><label class="radio-checkbox-label">基督教</label>
                      <input type="checkbox" name="religion" value="Muslim"><label class="radio-checkbox-label">穆斯林</label>
                    </div>
                  </div>
                </div>
                <!-- Marital Status -->
                <div class="application-tab">
                  <div class="d-flex justify-content-between">
                    <div>
                      <p>婚姻状况</p>
                    </div>
                    <div>
                      <p class="message-asterisks">注意：带星号（*）的字段为必填项</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-3">
                      <label>婚姻状况 <span class="important">*</span></label>
                      <select class="select-box" name="maritalstatus">
                        <option value="Single">单</option>
                        <option value="Married">已婚</option>
                        <option value="Separated">分离</option>
                        <option value="Single Parent">单身父母</option>
                        <option value="Live-in">住在</option>
                        <option value="Widow">寡妇</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <label>配偶姓名</label>
                      <input class="textbox" type="text" name="spousename" placeholder="例 Mary Jane Dela Cruz">
                    </div>
                    <div class="col-sm-4">
                      <label>结婚日期</label>
                      <input class="textbox" type="text" name="marrieddate" placeholder="例 MM-DD-YYYY">
                    </div>
                    <div class="col-sm-4">
                      <label>儿童年龄s</label>
                      <input class="textbox" type="text" name="childages" placeholder="例 13, 6, 3">
                    </div>
                  </div>
                </div>
                <!-- Families' Ages -->
                <div class="application-tab">
                  <div class="d-flex justify-content-between">
                    <div>
                      <p>亲戚们</p>
                    </div>
                    <div>
                      <p class="message-asterisks">注意：带星号（*）的字段为必填项</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-3">
                      <label>兄弟时代</label>
                      <input class="textbox numerictextbox" type="text" name="brotherage" placeholder="例 32">
                    </div>
                    <div class="col-sm-3">
                      <label>姊妹时代</label>
                      <input class="textbox numerictextbox" type="text" name="sisterage" placeholder="例 30">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-3">
                      <label>父亲时代</label>
                      <input class="textbox numerictextbox" type="text" name="fatherage" placeholder="例 55">
                      <input type="checkbox" name="fatherdeceased" value="yes"><label class="radio-checkbox-label">死者</label>
                    </div>
                    <div class="col-sm-3">
                      <label>母亲时代</label>
                      <input class="textbox numerictextbox" type="text" name="motherage" placeholder="例 54">
                      <input type="checkbox" name="motherdeceased" value="yes"><label class="radio-checkbox-label">死者</label>
                    </div>
                  </div>
                </div>
                <!-- Families' Ages -->
                <div class="application-tab">
                  <div class="d-flex justify-content-between">
                    <div>
                      <p>联系地址</p>
                    </div>
                    <div>
                      <p class="message-asterisks">注意：带星号（*）的字段为必填项</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-5">
                      <label>地址</label>
                      <input class="textbox" type="text" name="address" placeholder="" value="<?php echo $_SESSION['address']?>">
                    </div>
                    <div class="col-sm-4">
                      <label>市</label>
                      <input class="textbox" type="text" name="city" placeholder="City">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-3">
                      <label>联系1 <span class="important">*</span></label>
                      <input class="textbox numerictextbox" type="text" name="contact1" placeholder="例 09154232232">
                    </div>
                    <div class="col-sm-3">
                      <label>联系2 <span class="important">*</span></label>
                      <input class="textbox numerictextbox" type="text" name="contact2" placeholder="例 09154232232">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-3">
                        <label>紧急联系人 <span class="important">*</span> </label>
                      <input class="textbox numerictextbox" type="text" name="emergencycontact" placeholder="例 09157889024">
                    </div>
                    <div class="col-sm-3">
                      <label>关系 <span class="important">*</span> </label>
                      <input class="textbox" type="text" name="relation" placeholder="例 Mother">
                    </div>
                  </div>
                </div>
                <div class="application-tab">
                  <div class="d-flex justify-content-between">
                    <div>
                      <p>教育</p>
                    </div>
                    <div>
                      <p class="message-asterisks">注意：带星号（*）的字段为必填项</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-9">
                      <label>素养 <span class="important">*</span></label><br />
                      <input type="radio" name="attainment" value="High School"><label class="radio-checkbox-label">中学</label>
                      <input type="radio" name="attainment" value="Vocational / Technical / TESDA"><label class="radio-checkbox-label">职业/技术/TESDA</label>
                      <input type="radio" name="attainment" value="University"><label class="radio-checkbox-label">学院大学</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <label>课程 <span class="important">*</span></label>
                      <input class="textbox" type="text" name="course" placeholder="例 BS Computer Engineering">
                    </div>
                    <div class="col-sm-2">
                      <label>学年 <span class="important">*</span></label>
                      <input class="textbox" type="text" name="studyyears" placeholder="例 5">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-3">
                      <label>已毕业 <span class="important">*</span></label><br />
                      <input type="radio" name="graduated" value="yes"><label class="radio-checkbox-label">是</label>
                      <input type="radio" name="graduated" value="no"><label class="radio-checkbox-label">没有</label>
                    </div>
                  </div>
                </div>
                <div class="application-tab">
                  <div class="d-flex justify-content-between">
                    <div>
                      <p>就业机会</p>
                    </div>
                    <div>
                      <p class="message-asterisks">注意：带星号（*）的字段为必填项</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <label>雇主 <span class="important">*</span></label>
                      <input class="textbox" type="text" name="employer" placeholder="例 Jacob Daniel">
                    </div>
                    <div class="col-sm-4">
                      <label>国家/年份从到 <span class="important">*</span></label>
                      <input class="textbox" type="text" name="countryyeasfromto" placeholder="">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <label>产品/行业 <span class="important">*</span></label>
                      <input class="textbox" type="text" name="productindustry" placeholder="">
                    </div>
                    <div class="col-sm-4">
                      <label>位置 <span class="important">*</span></label>
                      <input class="textbox" type="text" name="position" placeholder="">
                    </div>
                    <div class="col-sm-4">
                      <label>离开原因 <span class="important">*</span></label>
                      <input class="textbox" type="text" name="leavereason" placeholder="">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <label>雇主（2）</label>
                      <input class="textbox" type="text" name="employer2" placeholder="">
                    </div>
                    <div class="col-sm-4">
                      <label>国家/年份从到（2）</label>
                      <input class="textbox" type="text" name="countryyeasfromto2" placeholder="">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <label>产品/行业（2）</label>
                      <input class="textbox" type="text" name="productindustry2" placeholder="">
                    </div>
                    <div class="col-sm-4">
                      <label>位置（2）</label>
                      <input class="textbox" type="text" name="position2" placeholder="">
                    </div>
                    <div class="col-sm-4">
                      <label>离开原因（2）</label>
                      <input class="textbox" type="text" name="leavereason2" placeholder="">
                    </div>
                  </div>
                </div>
                <div class="application-tab">
                  <div class="d-flex justify-content-between">
                    <div>
                      <p>图像和工作申请</p>
                    </div>
                    <div>
                      <p class="message-asterisks">注意：带星号（*）的字段为必填项</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-5">
                      <label>上传2x2或护照尺寸的图片 <span class="important">*</span></label>
                      <div class="image d-flex justify-content-center align-items-center">
                        <img id="targetImg" class="user-image" src="../../styles/resources/images/user.svg" width="192px" height="192px" alt="">
                      </div>
                      <label class="file-upload">选择图片
                        <input id="picturesrc" type="file" size="100" name='image' onchange="loadFile(event)" >
                      </label>
                    </div>
                    <div class="col-sm-6">
                      <label>请检查所需的工作申请 <span class="important">*</span></label>
                      <div class="row">
                        <div class="col-sm-6">
                          <label>台湾</label><br />
                          <input type="checkbox" name="job1" <?php if (strpos($_SESSION['applications'], "Male Factory Worker") > 0) { ?> disabled="disabled" <?php } ?> value="Male Factory Worker"><label class="radio-checkbox-label">男性工厂工人</label><br/>
                          <input type="checkbox" name="job2" <?php if (strpos($_SESSION['applications'], "Female Factory Worker") > 0) { ?> disabled="disabled" <?php } ?> value="Female Factory Worker"><label class="radio-checkbox-label">女工厂工人</label><br/>
                          <input type="checkbox" name="job3" <?php if (strpos($_SESSION['applications'], "Male Nursing Aide") > 0) { ?> disabled="disabled" <?php } ?> value="Male Nursing Aide"><label class="radio-checkbox-label">男性护理助手</label><br/>
                          <input type="checkbox" name="job4" <?php if (strpos($_SESSION['applications'], "Female Nursing Aide") > 0) { ?> disabled="disabled" <?php } ?> value="Female Nursing Aide"><label class="radio-checkbox-label">女性护理助手</label><br/>
                          <input type="checkbox" name="job5" <?php if (strpos($_SESSION['applications'], "Female Caretakers") > 0) { ?> disabled="disabled" <?php } ?> value="Female Caretakers"><label class="radio-checkbox-label">女性看护人</label><br/>
                        </div>
                        <div class="col-sm-6">
                          <label>阿曼/沙特/卡塔尔</label><br />
                          <input type="checkbox" name="job6" <?php if (strpos($_SESSION['applications'], "Female Domestic Helpers")> 0) { ?> disabled="disabled" <?php } ?> value="Female Domestic Helpers"><label class="radio-checkbox-label">女佣</label><br/>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Submit tab -->
                <div class="d-flex justify-content-end">
                  <button id="incomplete-details" class="changebtn" type="button" name="button" onclick=""> <img src="../../styles/resources/images/exclamation-circle.svg" width="15px" alt="exclamation image"> 请填写所有必要的详细信息。</button>
                  <button id="prev-btn" class="changebtn" type="button" name="button" onclick="showApplicationTab('sub')">以前</button>
                  <button id="next-btn" class="changebtn" type="button" name="button" onclick="showApplicationTab('add')">下一个</button>
                  <button id="submit-btn" type="button" name="button" onclick="checkSubmit()">递交申请</button>
                </div>
              </div>
            </div>
          </form>
        </div>
        <!-- Start of Application Status -->
        <div class="container application-status">
          <p class="application-list">申请状态清单</p>
          <?php if (isset($_SESSION['applications']) && !preg_match("/[a-zA-Z]/", $_SESSION['applications'])) { ?>
            <div class="empty-application">
              <img src="../../styles/resources/images/folder-open.svg" width="150px" alt="empty icon">
              <p>糟糕！ 您尚未提交任何申请。</p>
              <p>要填写申请，请点击上方的“发送申请”按钮。</p>
            </div>
          <?php }
          else if (isset($_SESSION['applications'])) {
            $fetch_applications = "select * from applicant_applications where applicant_id = ?";
            $fetch_stmt = mysqli_stmt_init($conn);

            if (mysqli_stmt_prepare($fetch_stmt, $fetch_applications)) {
              mysqli_stmt_bind_param($fetch_stmt, "i", $_SESSION['id']);
              mysqli_stmt_execute($fetch_stmt);

              $result = mysqli_stmt_get_result($fetch_stmt);

              ?>
              <div class="">
                <?php
                  while ($row = mysqli_fetch_assoc($result)) {
                    $param = $row['application_uid'] . "-". $row['application_name'] .'-'. $row['applicant_id'];
                    ?>
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex justify-content-between">
                            <div>
                              <h5 class="card-title"><?php echo $row['application_name'] ?></h5>
                            </div>
                            <div>
                              <button class="trashicon" onclick="showApplyDeleteApproval('<?php echo $param ?>') "type="button" name="button"><img src="styles/resources/images/trash-alt.svg" width="20px" alt="trash icon"></button>
                            </div>
                          </div>
                          <p class="card-text"><small class="text-muted">申请状态：<?php echo $row['application_status'] ?> </small></p>
                          <p class="card-text"><small class="text-muted">创建的应用程序：<?php echo $row['application_created'] ?> </small></p>
                        </div>
                      </div>
                    <?php
                  }
                 ?>
              </div>
              <?php
            }
          }?>
        </div>
        <!-- End of Application Status -->
      </div>
      <!-- End of User Page -->
    <?php }?>
    <?php if (empty($_GET['status']) && !(isset($_SESSION['is_loggedin']) && $_SESSION['is_loggedin'])) { ?>
      <!-- Start of Login/Signup Form -->
      <div class="container">
        <div class="login-form">
          <div class="d-flex justify-content-center">
            <h1 class="create-account-header">登录到您的帐户，并加入成千上万在Forever Manpower找到工作的人</h1>
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
                  <p class="incorrect-message d-flex justify-content-center">错误的用户名或密码</p>
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
                    <input id="create_lastname" class="create-nametext" type="text" name="user-lastname" placeholder="Last Name">
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

                <p class="bday-label">Birthday</p>
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
                  <p class="incorrect-message d-flex justify-content-center"><strong>错误 </strong> 请填写所有必填表格。</p>
                </div>
                <div id="password-mismatch">
                  <p class="incorrect-message d-flex justify-content-center"><strong>错误！</strong> 确认密码不匹配。</p>
                </div>
                <div id="numeric-error">
                  <p class="incorrect-message d-flex justify-content-center"><strong>错误！</strong> 名称只能包含字母字符。</p>
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
    <?php if(!empty($_GET['status'])) {?>
      <!-- Start Of Success Page -->
      <div class="container d-flex flex-column success-message">
        <div class="d-flex justify-content-center">
          <img class="success-icon" src="styles/resources/images/check_icon.svg" alt="success image">
        </div>
        <div class="d-flex justify-content-center">
          <h1 class="signup-success">You have signed up successfully</h1>
        </div>
        <div class="d-flex justify-content-center">
          <p>Thank you for signing up!</p>
        </div>
        <div class="d-flex justify-content-center">
          <p><a href="apply.php">Click here</a> to return to the login page and login to your account.</p>
        </div>
      </div>
      <!-- End Of Success Page -->
    <?php }?>
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
                <li class=""><a href="index.php">家</a></li>
                <li class=""><a href="about.php">关于我们</a></li>
                <li class=""><a href="#">现在申请</a></li>
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
