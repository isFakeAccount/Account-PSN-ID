<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Chiaki PS4 - Get PSN ID</title>
    <link rel="stylesheet" type="text/css" href="https://b2a3e8.github.io/jekyll-theme-console/assets/main-dark.css">
  </head>
  <body>
  <div class="container">
  <footer></footer>
    <h1>Tuto : </h1><br>
        1) Connect to the psn at this address :
  <a href="https://id.sonyentertainmentnetwork.com/signin/?service_entity=urn:service-entity:psn&response_type=code&client_id=ba495a24-818c-472b-b12d-ff231c1b5745&redirect_uri=https://remoteplay.dl.playstation.net/remoteplay/redirect&scope=psn:clientapp&request_locale=en_US&ui=pr&service_logo=ps&layout_type=popup&smcid=remoteplay&PlatformPrivacyWs1=minimal&error=login_required&error_code=4165&error_description=User+is+not+authenticated&no_captcha=false#/signin?entry=%2Fsignin" target="_blank">https://id.sonyentertainmentnetwork.com/signin/?service_entity=urn:service-entity:psn&response_type=code&client_id=ba495a24-818c-472b-b12d-ff231c1b5745&redirect_uri=https://remoteplay.dl.playstation.net/remoteplay/redirect&scope=psn:clientapp&request_locale=en_US&ui=pr&service_logo=ps&layout_type=popup&smcid=remoteplay&PlatformPrivacyWs1=minimal&error=login_required&error_code=4165&error_description=User+is+not+authenticated&no_captcha=false#/signin?entry=%2Fsignin</a><br>
      <br>2) Once connected to the psn service you must have this message "redirect"
      <br><br> 3) Copy Url (example : https://remoteplay.dl.playstation.net/remoteplay/redirect?code=XXXXXX&cid=XXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX)
      <br><br> 4) Pasted the copy url into URL & clicked on "Get PSN ID"<br>
      <footer></footer>
      <h1>Console Input : </h1>
      <form method="post" id="URLForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
        <p><h1><input type="text" name="url" placeholder="--> Paste the psn link here <--" /></h1></p>
      </form>
      <button type="submit" form="URLForm" value="Submit">Get PSN id</button><br>
     <footer></footer><h1>Console Output : </h1><br><?php
          $URL_ = $_POST['url'];
          echo shell_exec("python3 psn-account-id.py .$URL_");
      ?><br>
      <footer></footer>
        <h1>Credit : </h1><br>
        Script : thestr4ng3r & grill2010<br>
        Version Web : CSystem
        <br><br><h1>Other : </h1><br>
        Link Script Python : <a href="psn-account-id.py">Here</a><br>
        Theme : <a href="https://github.com/b2a3e8/jekyll-theme-console">jekyll theme</a>
      <br><footer></footer>
  </div>
  </body>
</html>
