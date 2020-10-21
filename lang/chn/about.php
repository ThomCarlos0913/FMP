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
          <li class="nav-item"><a class="nav-link nav-selected" href="#">关于我们</a></li>
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
                <a class="dropdown-item" href="php/signout.php">登出</a>
              </div>
            </li>
          <?php }?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle lang-btn" data-toggle="dropdown" data-target="dropdown_languages" href="#">语言 <span class="caret"></span></a>
            <div class="dropdown-menu" aria-labelledby="dropdown_languages">
              <a class="dropdown-item" href="../../about.php">英语</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">中文</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../../lang/ar/about.php">阿拉伯</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Of Navigation -->
    <!-- Start of Page Header -->
    <div class="header-image">
      <h1>关于我们</h1>
    </div>
    <!-- End of Page Header -->
    <!-- Start of About Us Content -->
    <div class="container">
      <div class="row">
        <div class="about col-sm-12">
          <p><strong>FOREVER MANPOWER SERVICES，INC。</strong> 是根据和依据法律进行适当组织和存在的公司
               菲律宾共和国，并根据S.E.C Reg。在证券交易委员会注册。 没有
               A1996-04488，日期为1996年8月19日，并由菲律宾海外就业局授权为私人就业机构
               劳工和就业部（DOLE）的行政管理（POEA），于2006年11月29日获得许可
               POEA-231-LB-121906，招募，处理和部署菲律宾工人以用于海外就业。</p>
          <p>该公司的成立主要是为了满足不同国家（地区）对人力供应的不断增长的需求
              世界各地都有合格的菲律宾工人，他们经过最高标准的甄选和招聘流程。
              公司还致力于以最高的顺序提供客户满意的服务，并同样致力于维护
              保护其员工招募的福利和利益，并在海外提升菲律宾的形象。公司
              专业从事医疗服务，酒店管理的菲律宾专业人员的定位，选择和部署
              通讯设施和石化厂建设的运营，工程师，工匠和技术人员，
              维护和运营到世界各地。 FOREVER MANPOWER使用此独特的设置和系统来
              确保有能力和可靠的人力资源-经过专门培训的人员，旨在完成更艰巨的任务
              国外。</p>
          <p>训练有素，积极进取的核心专业人员队伍的全球分布和部署； 高技能
             和半熟练工人是<strong> FOREVER MANPOWER SERVICES，INC。的首要目标和目标。</strong></p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <h1 class="header-1">视力</h1>
          <p class="vision-mission">为我们<br />的生活发展做出贡献
               通过为农民工提供就业机会<br />
               全球机会，并有助于维持 通过<br />
               国家经济的稳定汇款。</p>
        </div>
        <div class="col-sm-6">
          <h1 class="header-1">任务</h1>
          <p class="vision-mission">生产具有全球竞争力的产品<br />
               参与和贡献的农民工<br />
               他们各自雇主的健康。</p>
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
