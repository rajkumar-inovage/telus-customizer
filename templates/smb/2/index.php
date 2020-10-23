<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
  xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
  <meta charset="utf-8"> <!-- utf-8 works for most cases -->
  <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
  <meta name="x-apple-disable-message-reformatting"> <!-- Disable auto-scale in iOS 10 Mail entirely -->
  <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->
  <?php
    $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')? "https://" : "http://";
    $host = $_SERVER['HTTP_HOST'];
    $request_uri = $_SERVER['REQUEST_URI'];
    $request_attr = explode("?", $_SERVER['REQUEST_URI']);
    $request_url = $request_attr[0];
    $url = "$protocol$host$request_url";
    ?>
  <!-- Web Font / @font-face : BEGIN -->
  <!-- NOTE: If web fonts are not required, lines 10 - 27 can be safely removed. -->

  <!-- Desktop Outlook chokes on web font references and defaults to Times New Roman, so we force a safe fallback font. -->
  <!--[if mso]>
        <style>
            * {
                font-family: sans-serif !important;
            }
        </style>
    <![endif]-->

  <!-- All other clients get the webfont reference; some will render the font and others will silently fail to the fallbacks. More on that here: http://stylecampaign.com/blog/2015/02/webfont-support-in-email/ -->
  <!--[if !mso]><!-->
  <!-- insert web font reference, eg: <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'> -->
  <!--<![endif]-->

  <!-- Web Font / @font-face : END -->

  <!-- CSS Reset -->
  <style>
  /* What it does: Remove spaces around the email design added by some email clients. */
  /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
  * {
    margin: 0;
    padding: 0;
  }

  html,
  body {
    margin: 0 auto !important;
    padding: 0 !important;
    height: 100% !important;
    width: 100% !important;
  }

  /* What it does: Stops email clients resizing small text. */
  * {
    -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%;
  }

  /* What it does: Centers email on Android 4.4 */
  div[style*="margin: 16px 0"] {
    margin: 0 !important;
  }

  /* What it does: Stops Outlook from adding extra spacing to tables. */
  table,
  td {
    mso-table-lspace: 0pt !important;
    mso-table-rspace: 0pt !important;
  }

  /* What it does: Fixes webkit padding issue. Fix for Yahoo mail table alignment bug. Applies table-layout to the first 2 tables then removes for anything nested deeper. */
  table {
    border-spacing: 0 !important;
    border-collapse: collapse !important;
    table-layout: fixed !important;
    margin: 0 auto !important;
  }

  table table table {
    table-layout: auto;
  }

  /* What it does: Uses a better rendering method when resizing images in IE. */
  img {
    -ms-interpolation-mode: bicubic;
  }

  /* What it does: A work-around for iOS meddling in triggered links. */
  *[x-apple-data-detectors] {
    color: inherit !important;
    text-decoration: none !important;
  }

  /* What it does: A work-around for Gmail meddling in triggered links. */
  .x-gmail-data-detectors,
  .x-gmail-data-detectors *,
  .aBn {
    border-bottom: 0 !important;
    cursor: default !important;
  }

  /* What it does: Prevents Gmail from displaying an download button on large, non-linked images. */
  .a6S {
    display: none !important;
    opacity: 0.01 !important;
  }

  /* If the above doesn't work, add a .g-img class to any image in question. */
  img.g-img+div {
    display: none !important;
  }

  /* What it does: Prevents underlining the button text in Windows 10 */
  .button-link {
    text-decoration: none !important;
  }

  /* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
  /* Create one of these media queries for each additional viewport size you'd like to fix */
  /* Thanks to Eric Lepetit @ericlepetitsf) for help troubleshooting */
  @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {

    /* iPhone 6 and 6+ */
    .email-container {
      min-width: 375px !important;
    }
  }
  </style>

  <!-- Progressive Enhancements -->
  <style>
  /* What it does: Hover styles for buttons */
  .button-td,
  .button-a {
    transition: all 100ms ease-in;
  }

  .button-td:hover,
  .button-a:hover {
    background: #555555 !important;
    border-color: #555555 !important;
  }

  /* Media Queries */
  @media screen and (max-width: 480px) {

    /* What it does: Forces elements to resize to the full width of their container. Useful for resizing images beyond their max-width. */
    .fluid {
      width: 100% !important;
      max-width: 100% !important;
      height: auto !important;
      margin-left: auto !important;
      margin-right: auto !important;
    }

    /* What it does: Forces table cells into full-width rows. */
    .stack-column,
    .stack-column-center {
      display: block !important;
      width: 100% !important;
      max-width: 100% !important;
      direction: ltr !important;
    }

    /* And center justify these ones. */
    .stack-column-center {
      text-align: center !important;
    }

    /* What it does: Generic utility class for centering. Useful for images, buttons, and nested tables. */
    .center-on-narrow {
      text-align: center !important;
      display: block !important;
      margin-left: auto !important;
      margin-right: auto !important;
      float: none !important;
    }

    table.center-on-narrow {
      display: inline-block !important;
    }

    /* What it does: Adjust typography on small screens to improve readability */
    .email-container p {
      font-size: 17px !important;
      line-height: 22px !important;
    }
  }
  </style>

  <!-- What it does: Makes background images in 72ppi Outlook render at correct size. -->
  <!--[if gte mso 9]>
    <xml>
      <o:OfficeDocumentSettings>
        <o:AllowPNG/>
        <o:PixelsPerInch>96</o:PixelsPerInch>
     </o:OfficeDocumentSettings>
    </xml>
    <![endif]-->

</head>

<body width="100%" bgcolor="#fff" style="margin: 0; mso-line-height-rule: exactly;">
  <center style="width: 100%;background-color: #ededee;text-align: left;">

    <!-- Visually Hidden Preheader Text : BEGIN -->
    <div
      style="display:none;font-size:1px;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;mso-hide:all;font-family: sans-serif;">

    </div>
    <!-- Visually Hidden Preheader Text : END -->

    <!--
            Set the email width. Defined in two places:
            1. max-width for all clients except Desktop Windows Outlook, allowing the email to squish on narrow but never go wider than 600px.
            2. MSO tags for Desktop Windows Outlook enforce a 600px width.
            Note: The Fluid and Responsive templates have a different width (600px). The hybrid grid is more "fragile", and I've found that 600px is a good width. Change with caution.
        -->
    <div style="background: #fff; margin: auto; max-width: 600px; padding: 0;" class="email-container">
      <!--[if mso]>
            <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" width="600" align="center">
            <tr>
            <td>
            <![endif]-->

      <!-- Email Header : BEGIN -->
      <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center"
        width="100%" style="max-width: 600px; ">
        <tr>
          <td valign="top" style="padding: 30px 30px 27px;">
            <div style="display: flex;justify-content: space-between;">
              <img src="main-logo.png" alt="telus-logo" style="max-width: 100%;max-height: 33px;" />
              <?php if(isset($_GET['logo'])) : ?>
              <img src="<?php echo isset($_GET['logo'])?$_GET['logo']:""; ?>" alt="dealer-logo"
                style="max-width: 200px;max-height: 33px;" />
              <?php endif; ?>
            </div>
          </td>
        </tr>
      </table>
      <!-- Email Header : END -->

      <!-- Email Body : BEGIN -->
      <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center"
        width="100%" style="max-width: 600px;position: relative;">
        <!-- Hero, BEGIN -->
        <tr>
          <td style="padding:0;">
            <div style="display: flex;">
              <img src="<?php echo $url."hero.jpg"; ?>" style="max-width: 100%;" />
            </div>
          </td>
        </tr>
        <tr style="position: absolute;left: 0;top: 0;width: 100%;height: 100%;display: inline-table;">
          <td style="padding-left: 50px;padding-right: 50px;padding-top: 54px;padding-bottom: 54px;">
            <h1
              style="color: #4b286d;font-size: 39px;font-weight: bold;font-family: Arial, Helvetica, sans-serif;margin-bottom: 20px;margin-top: 0;letter-spacing: -1px;">
              <?php echo isset($_GET['city_name'])?$_GET['city_name']:'Hamilton'; ?> Business<br />Owners.</h1>
            <h2
              style="color: #4b286d;font-size: 24px;font-weight: normal;font-family: Arial, Helvetica, sans-serif;margin-top: 0;margin-bottom: 42px;">
              Try Canada’s largest and<br />fastest<sup style="font-size: 60%;">1</sup> network on us<br />for 30 days.
            </h2>
            <div style="display: flex;width: 50%;flex-direction:column;">
              <a href="tel:<?php echo isset($_GET['phone_no'])?$_GET['phone_no']:'905-573-2388'; ?>"
                style="background-color: #248700;border-radius: 5px;color: #ffffff;padding: 16px 22px;text-decoration: none;text-overflow: ellipsis;white-space: nowrap;overflow: hidden;">
                <span
                  style="font-size: 22px; font-weight: 300; font-family: Arial, Helvetica, sans-serif; letter-spacing: 1px;">
                  Call: <?php echo isset($_GET['phone_no'])?$_GET['phone_no']:'905-573-2388'; ?>
                </span>
              </a>
              <h3
                style="color:#4b286d;text-align: center;font-size: 28px;font-family: Arial, Helvetica, sans-serif;margin: 28px 0;">
                Or</h3>
              <h3
                style="color:#4b286d;text-align: center;font-size: 24px;font-weight: normal;font-family: Arial, Helvetica, sans-serif;margin-top: 0;margin-bottom: 8px;">
                <strong style="display: block;">Visit our
                  store:</strong><?php echo isset($_GET['store_address'])?$_GET['store_address']:'297 Nash Rd, Hamilton'; ?>
              </h3>
            </div>
          </td>
        </tr>
        <!-- Hero, END -->
      </table>
      <!-- Email Body : END -->

      <!-- Email Footer : BEGIN -->
      <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center"
        width="100%" style="max-width: 600px;">
        <tr>
          <td style="padding: 3px 10px 10px;">
            <div id="_idContainer008" class="Basic-Text-Frame"
              style="font-size: 9px;text-align: justify;color: #333333;font-family: Arial, Helvetica, sans-serif;line-height: 13px;">
              <p class="Basic-Paragraph ParaOverride-2">
                <span class="CharOverride-3">
                  *Conditions apply. See telus.com/network for details.
                </span>
              </p>
              <p class="Basic-Paragraph ParaOverride-2">
                <span class="CharOverride-3">
                  *For a limited time, offer is available for new activations and existing customers adding a line on a
                  BYOD (Bring Your Own Device) plan when porting their wireless service. For the first month, customer
                  will not be charged for the value of the rate plan chosen and for the 1-time Connection Fee. Offer
                  does not require customer to commit to a term. Offer not available for renewals, or mid-contract
                  migrations. Subscribers porting in from TELUS Consumer, Koodo Mobile, PC Mobile or Public Mobile are
                  not eligible for 1 month free offer. Offer subject to change at any time. Regular (no-term, monthly)
                  pricing applies at the end of the first month promotional period.
                </span>
              </p>
              <p class="Basic-Paragraph ParaOverride-2">
                <span class="CharOverride-3">
                  1. Speed and signal strength may vary with your configuration, Internet traffic, environmental
                  conditions, applicable network management and other factors. For a description of TELUS’ network
                  management practices, please see telus.com/optimization. Canada's fastest network as ranked by PCMag.
                  Reprinted from www.pcmag.com with permission. © 2018 Ziff Davis, LLC. All rights reserved.
                </span>
              </p>
              <p class="Basic-Paragraph ParaOverride-2">
                <span class="CharOverride-3">© 2020 TELUS.</span>
              </p>
            </div>
          </td>
        </tr>
      </table>
      <!-- Email Footer : END -->

      <!--[if mso]>
            </td>
            </tr>
            </table>
            <![endif]-->
    </div>
  </center>
</body>

</html>