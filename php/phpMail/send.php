
<?php
session_start();

$codigoCTO = $_POST['CodigoCTO'];
$fibrasOcupadas = $_POST['fibrasOcupadas'];
$fibrasLivres = $_POST['fibrasLivres'];
$fibras = $_POST['fibras'];


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';

//require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            // Send using SMTP
    $mail->CharSet = 'UTF-8';
    $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'vivas.ats@gmail.com';                  // SMTP username
    $mail->Password   = 'V1V45ADM';                             // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipientsternet.com.br', 'Joe User');     // Add a recipient
    //$mail->addAddress('karine@viv
    $mail->setFrom('vivas.ats@gmail.com', 'Sistema AT&s');
    $mail->addAddress('vivas.ats@gmail.com', 'Sistemas CAPS');     // Add a recipient
    
    //$mail->addAddress('matheus.marinho@vivasinternet.com.br', 'Matheus Marinho');     // Add a recipient


    // Attachments
    //$mail->addAttachment('../../img/favicon.png');         // Add attachments


    //$mail->addAttachment("Retorio_ATS(19-" . date('M') . "-" . date('Y') . ").pdf");    // Optional name

    // Content


$mail->isHTML(true);                                  // Set email format to HTML
    $mail->AddEmbeddedImage('images\70681578486061441.png' , '70681578486061441');
    $mail->AddEmbeddedImage('images\66481578501528046.png' , '66481578501528046');
    $mail->AddEmbeddedImage('images\87031578490993343.png' , '87031578490993343');
    $mail->AddEmbeddedImage('images\83641578490883493.png' , '83641578490883493');

    $mail->Subject = 'Caixas sem Equipamentos';
    $mail->Body    =  '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html style="width:100%;font-family:arial, ´helvetica neue´, helvetica, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0;">
     <head> 
      <meta charset="UTF-8"> 
      <meta content="width=device-width, initial-scale=1" name="viewport"> 
      <meta name="x-apple-disable-message-reformatting"> 
      <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
      <meta content="telephone=no" name="format-detection"> 
      <title>Novo e-mail</title> 
      <!--[if (mso 16)]>
        <style type="text/css">
        a {text-decoration: none;}
        </style>
        <![endif]--> 
      <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]--> 
      <style type="text/css">
    @media only screen and (max-width:600px) {p, ul li, ol li, a { font-size:16px!important; line-height:150%!important } h1 { font-size:30px!important; text-align:center; line-height:120%!important } h2 { font-size:26px!important; text-align:center; line-height:120%!important } h3 { font-size:20px!important; text-align:center; line-height:120%!important } h1 a { font-size:30px!important } h2 a { font-size:26px!important } h3 a { font-size:20px!important } .es-menu td a { font-size:16px!important } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:16px!important } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:16px!important } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px!important } *[class="gmail-fix"] { display:none!important } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center!important } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right!important } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left!important } .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important } .es-button-border { display:block!important } a.es-button { font-size:20px!important; display:block!important; border-left-width:0px!important; border-right-width:0px!important } .es-btn-fw { border-width:10px 0px!important; text-align:center!important } .es-adaptive table, .es-btn-fw, .es-btn-fw-brdr, .es-left, .es-right { width:100%!important } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:600px!important } .es-adapt-td { display:block!important; width:100%!important } .adapt-img { width:100%!important; height:auto!important } .es-m-p0 { padding:0px!important } .es-m-p0r { padding-right:0px!important } .es-m-p0l { padding-left:0px!important } .es-m-p0t { padding-top:0px!important } .es-m-p0b { padding-bottom:0!important } .es-m-p20b { padding-bottom:20px!important } .es-mobile-hidden, .es-hidden { display:none!important } .es-desk-hidden { display:table-row!important; width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important } .es-desk-menu-hidden { display:table-cell!important } table.es-table-not-adapt, .esd-block-html table { width:auto!important } table.es-social { display:inline-block!important } table.es-social td { display:inline-block!important } }
    #outlook a {
        padding:0;
    }
    .ExternalClass {
        width:100%;
    }
    .ExternalClass,
    .ExternalClass p,
    .ExternalClass span,
    .ExternalClass font,
    .ExternalClass td,
    .ExternalClass div {
        line-height:100%;
    }
    .es-button {
        mso-style-priority:100!important;
        text-decoration:none!important;
    }
    a[x-apple-data-detectors] {
        color:inherit!important;
        text-decoration:none!important;
        font-size:inherit!important;
        font-family:inherit!important;
        font-weight:inherit!important;
        line-height:inherit!important;
    }
    .es-desk-hidden {
        display:none;
        float:left;
        overflow:hidden;
        width:0;
        max-height:0;
        line-height:0;
        mso-hide:all;
    }
    </style> 
     </head> 
     <body style="width:100%;font-family:arial, ´helvetica neue´, helvetica, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0;"> 
      <div class="es-wrapper-color" style="background-color:#FFFFFF;"> 
       <!--[if gte mso 9]>
                <v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
                    <v:fill type="tile" color="#ffffff" origin="0.5, 0" position="0.5,0"></v:fill>
                </v:background>
            <![endif]--> 
       <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;"> 
         <tr style="border-collapse:collapse;"> 
          <td valign="top" style="padding:0;Margin:0;"> 
           <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;"> 
             <tr style="border-collapse:collapse;"> 
              <td align="center" style="padding:0;Margin:0;"> 
               <table class="es-content-body" width="700" cellspacing="0" cellpadding="0" bgcolor="#333333" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#333333;"> 
                 <tr style="border-collapse:collapse;"> 
                  <td align="left" style="Margin:0;padding-top:15px;padding-bottom:15px;padding-left:20px;padding-right:20px;"> 
                   <!--[if mso]><table width="660" cellpadding="0"
                                cellspacing="0"><tr><td width="230" valign="top"><![endif]--> 
                   <table cellpadding="0" cellspacing="0" class="es-left" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left;"> 
                     <tr style="border-collapse:collapse;"> 
                      <td width="230" align="left" style="padding:0;Margin:0;"> 
                       <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                         <tr style="border-collapse:collapse;"> 
                          <td align="center" style="padding:5px;Margin:0;"><img class="adapt-img" src="cid:70681578486061441" alt style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;" width="220"></td> 
                         </tr> 
                       </table></td> 
                     </tr> 
                   </table> 
                   <!--[if mso]></td><td width="20"></td><td width="410" valign="top"><![endif]--> 
                   <table cellpadding="0" cellspacing="0" align="right" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                     <tr style="border-collapse:collapse;"> 
                      <td width="410" align="left" style="padding:0;Margin:0;"> 
                       <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                         <tr style="border-collapse:collapse;"> 
                          <td align="center" class="es-m-txt-c" style="Margin:0;padding-bottom:5px;padding-top:10px;padding-left:10px;padding-right:10px;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:24px;font-family:arial, ´helvetica neue´, helvetica, sans-serif;line-height:48px;color:#FFFFFF;"><strong><u>Integração CAPS / GeoGrid</u></strong></p></td> 
                         </tr> 
                       </table></td> 
                     </tr> 
                   </table> 
                   <!--[if mso]></td></tr></table><![endif]--></td> 
                 </tr> 
               </table></td> 
             </tr> 
           </table> 
           <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;"> 
             <tr style="border-collapse:collapse;"> 
              <td align="center" style="padding:0;Margin:0;"> 
               <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="700" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;"> 
                 <tr style="border-collapse:collapse;"> 
                  <td align="left" style="Margin:0;padding-top:20px;padding-left:20px;padding-right:20px;padding-bottom:40px;"> 
                   <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                     <tr style="border-collapse:collapse;"> 
                      <td width="660" align="center" valign="top" style="padding:0;Margin:0;"> 
                       <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                         <tr style="border-collapse:collapse;"> 
                          <td align="left" style="padding:10px;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:18px;font-family:arial, ´helvetica neue´, helvetica, sans-serif;line-height:27px;color:#333333;">- Terminal de Atendimento sem Diagrama:</p></td> 
                         </tr> 
                         <tr style="border-collapse:collapse;"> 
                          <td align="left" style="padding:0;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, ´helvetica neue´, helvetica, sans-serif;line-height:21px;color:#333333;">Codigo da Caixa: '.$codigoCTO.'</p></td> 
                         </tr> 
                         <tr style="border-collapse:collapse;"> 
                          <td align="left" style="padding:0;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, ´helvetica neue´, helvetica, sans-serif;line-height:21px;color:#333333;">Quantidades de Fibras: '.$fibras.'</p></td> 
                         </tr> 
                         <tr style="border-collapse:collapse;"> 
                          <td align="left" style="padding:0;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, ´helvetica neue´, helvetica, sans-serif;line-height:21px;color:#333333;">Fibras Livres: '.$fibrasLivres.'</p></td> 
                         </tr> 
                       </table></td> 
                     </tr> 
                     <tr style="border-collapse:collapse;"> 
                      <td width="660" align="center" valign="top" style="padding:0;Margin:0;"> 
                       <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                         <tr style="border-collapse:collapse;"> 
                          <td align="left" style="padding:0;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, ´helvetica neue´, helvetica, sans-serif;line-height:21px;color:#333333;">Fibras Ocupadas: '.$fibrasOcupadas.'</p></td> 
                         </tr> 
                         <tr style="border-collapse:collapse;"> 
                          <td align="center" style="padding:20px;Margin:0;"> 
                           <table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                             <tr style="border-collapse:collapse;"> 
                              <td style="padding:0;Margin:0px 0px 0px 0px;border-bottom:1px solid #CCCCCC;background:none;height:1px;width:100%;margin:0px;"></td> 
                             </tr> 
                           </table></td> 
                         </tr> 
                         <tr style="border-collapse:collapse;"> 
                          <td align="left" style="padding:0;Margin:0;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:arial, ´helvetica neue´, helvetica, sans-serif;line-height:21px;color:#333333;">- Apos finalizar o cadastro no GeoGrid ´Clique no Botão abaixo´ :</p></td> 
                         </tr> 
                         <tr style="border-collapse:collapse;"> 
                          <td style="padding:0;Margin:0;"> 
                           <table cellpadding="0" cellspacing="0" width="100%" class="es-menu" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                             <tr class="links-images-top" style="border-collapse:collapse;"> 
                              <td id="btnSinc" align="center" valign="top" width="100%" id="esd-menu-id-0" style="Margin:0;padding-left:5px;padding-right:5px;padding-top:10px;padding-bottom:10px;border:0;"><a target="_blank" href=`http://177.126.240.61/Main_caps/Caps/php/phpMail/SincGeo.php?vagasOcupadas='.$fibrasOcupadas.'&codigoCTO='.$codigoCTO.'&qtdeFibras='.$fibras.'` style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, ´helvetica neue´, helvetica, sans-serif;font-size:14px;text-decoration:none;display:block;color:#EF4A01;font-weight:bold;"><img src="cid:66481578501528046" alt="Item1" title="Item1" width="48" align="absmiddle" style="display:inline-block !important;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;padding-bottom:5px;"><br>Sincronizar com GeoGrid</a></td> 
                             </tr> 
                           </table></td> 
                         </tr> 
                       </table></td> 
                     </tr> 
                   </table></td> 
                 </tr> 
               </table></td> 
             </tr> 
           </table> 
           <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;"> 
             <tr style="border-collapse:collapse;"> 
              <td align="center" style="padding:0;Margin:0;"> 
               <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="700" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#333333;"> 
                 <tr style="border-collapse:collapse;"> 
                  <td style="Margin:0;padding-top:15px;padding-bottom:15px;padding-left:20px;padding-right:20px;background-color:#333333;" bgcolor="#333333" align="left"> 
                   <!--[if mso]><table width="660" cellpadding="0" cellspacing="0"><tr><td width="325" valign="top"><![endif]--> 
                   <table class="es-left" cellspacing="0" cellpadding="0" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left;"> 
                     <tr style="border-collapse:collapse;"> 
                      <td class="es-m-p20b" width="325" align="left" style="padding:0;Margin:0;"> 
                       <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                         <tr style="border-collapse:collapse;"> 
                          <td class="es-m-txt-c" align="left" style="padding:0;Margin:0;"><img src="images/9971551871821025.png" alt style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;" width="168"></td> 
                         </tr> 
                       </table></td> 
                     </tr> 
                   </table> 
                   <!--[if mso]></td><td width="25"></td><td width="310" valign="top"><![endif]--> 
                   <table class="es-right" cellspacing="0" cellpadding="0" align="right" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right;"> 
                     <tr style="border-collapse:collapse;"> 
                      <td width="310" align="left" style="padding:0;Margin:0;"> 
                       <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;border-left:3px solid transparent;border-right:3px solid transparent;border-top:3px solid transparent;border-bottom:3px solid transparent;"> 
                         <tr style="border-collapse:collapse;"> 
                          <td class="es-m-txt-c" align="right" bgcolor="#333333" style="padding:0;Margin:0;padding-right:10px;background-color:#333333;"> 
                           <table class="es-table-not-adapt es-social" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                             <tr style="border-collapse:collapse;"> 
                              <td valign="top" align="center" style="padding:0;Margin:0;padding-right:25px;"><img title="Facebook" src="cid:83641578490883493" alt="Fb" width="24" height="24" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;"></td> 
                              <td valign="top" align="center" style="padding:0;Margin:0;"><a target="_blank" href="https://api.whatsapp.com/send?phone=5512981708474&text=Rafael%20SIlverio%20-%20Solu%C3%A7%C3%B5es%20Integradas" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, ´helvetica neue´, helvetica, sans-serif;font-size:14px;text-decoration:underline;color:#2CB543;"><img title="Twitter" src="cid:87031578490993343" alt="Tw" width="24" height="24" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;"></a></td> 
                             </tr> 
                           </table></td> 
                         </tr> 
                       </table></td> 
                     </tr> 
                   </table> 
                   <!--[if mso]></td></tr></table><![endif]--></td> 
                 </tr> 
               </table></td> 
             </tr> 
           </table></td> 
         </tr> 
       </table> 
      </div>  
     </body>
     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"   integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="crossorigin="anonymous"></script>
     <script>
        function (){
            $("#btnSinc").click(funtion(e){
                e.preventDefault();
                alert("Esta Indo");
            });
        }
     </script>
    </html>';
    $mail->AltBody = 'Developed by @Rafael Silverio';
    $mail->Encoding = 'base64';

    $mail->send();

    echo 'E-mail enviado com sucesso !';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}