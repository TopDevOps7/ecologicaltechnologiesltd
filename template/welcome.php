<?php 

class Welcome {
  private $email;
  private $password;

  function __construct($email_, $password_, $passhash_) {
    $this->email = $email_;
    $this->password = $password_;
    $this->passhash = $passhash_;
  }

  public function getTemplate()
  {
    return '<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome GWM</title>
  <style>
  </style>
</head>
<body>
  <table cellpadding="0" cellspacing="0" height="100%" width="100%" id="m_6973222457317877454bodyTable"
    style="border-collapse:collapse;height:100%;margin:0;padding:0;width:100%">
    <tbody>
      <tr>
        <td valign="top" id="m_6973222457317877454bodyCell" style="height:100%;margin:0;padding:0;width:100%">
          <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse">
            <tbody>
              <tr>
                <td valign="top" class="m_6973222457317877454templateHeader"
                  style="background-color:#f7f7f7;background-image:url(https://greenwavematerials.com/assets/images/logo.png);background-repeat:no-repeat;background-position:center;border-top:0;border-bottom:0;padding-top:45px;padding-bottom:45px">
                  <table cellpadding="0" cellspacing="0" width="100%" class="m_6973222457317877454templateContainer"
                    style="border-collapse:collapse;max-width:600px!important;">
                    <tbody>
                      <tr>
                        <td valign="top" class="m_6973222457317877454headerContainer"
                          style="background:transparent none no-repeat center/cover;background-color:transparent;background-image:none;background-repeat:no-repeat;background-position:center;background-size:cover;border-top:0;border-bottom:0;padding-top:0;padding-bottom:0">
                          <table cellpadding="0" cellspacing="0" width="100%"
                            class="m_6973222457317877454mcnDividerBlock"
                            style="min-width:100%;border-collapse:collapse;table-layout:fixed!important">
                            <tbody>
                              <tr>
                                <td style="min-width:100%;padding:50px 18px">
                                  <table cellpadding="0" cellspacing="0" width="100%"
                                    style="min-width:100%;border-top:2px none #eaeaea;border-collapse:collapse">
                                    <tbody>
                                      <tr>
                                        <td>
                                          <span></span>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
              <tr>
                <td valign="top" id="m_6973222457317877454templateBody"
                  style="background:#ffffff none no-repeat center/cover;background-color:#ffffff;background-image:none;background-repeat:no-repeat;background-position:center;background-size:cover;border-top:0;border-bottom:0;padding-top:39px;padding-bottom:39px">
                  <table cellpadding="0" cellspacing="0" width="100%" class="m_6973222457317877454templateContainer"
                    style="margin:0 auto;border-collapse:collapse;max-width:600px!important">
                    <tbody>
                      <tr>
                        <td valign="top" class="m_6973222457317877454bodyContainer"
                          style="background:transparent none no-repeat center/cover;background-color:transparent;background-image:none;background-repeat:no-repeat;background-position:center;background-size:cover;border-top:0;border-bottom:0;padding-top:0;padding-bottom:0">
                          <table cellpadding="0" cellspacing="0" width="100%"
                            style="min-width:100%;border-collapse:collapse">
                            <tbody>
                              <tr>
                                <td valign="top" style="padding-top:9px">
                                  <table cellpadding="0" cellspacing="0"
                                    style="max-width:100%;min-width:100%;border-collapse:collapse" width="100%"
                                    class="m_6973222457317877454mcnTextContentContainer">
                                    <tbody>
                                      <tr>
                                        <td valign="top" class="m_6973222457317877454mcnTextContent"
                                          style="padding-top:0;padding-right:18px;padding-bottom:9px;padding-left:18px;word-break:break-word;color:#757575;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left">
                                          <h3
                                            style="display:block;margin:0;padding:0;color:#444444;font-family:Helvetica;font-size:22px;font-style:normal;font-weight:bold;line-height:150%;letter-spacing:normal;text-align:left">
                                            Willkommen bei Green Wave Gold!</h3>
                                          <p
                                            style="margin:10px 0;padding:0;color:#757575;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left">
                                            Investieren Sie einfach und sicher in nachhaltige und zukunftssichere Technologien.<br>
                                            <br>
                                            Nachfolgend erhalten Sie Ihre Zugangsdaten:
                                            <br><br>
                                            <b style="display: inline-block; width: 120px;">Benutzername</b> <b> : </b>' . $this->email . '<br>
                                            <b style="display: inline-block; width: 120px;">Passwort</b> <b> : </b>' . $this->password . ' <br><br>
                                          <br>
                                          <br>
                                          Sie können Ihr Passwort jederzeit auf der Webseite ändern.
                                          <br>
                                          <br>
                                          <hr>
                                          Mit freundlichen Grüßen<br>
                                          Ihr Green Wave Gold Team
                                          </p>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
</body>
</html>';
  }
}


?>