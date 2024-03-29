<?php

use Cake\Core\Configure;
use Cake\Error\Debugger;

$this->layout = 'default';

if (Configure::read('debug')):
    $this->layout = 'default';

    $this->assign('title', $message);
    $this->assign('templateName', 'error400.ctp');

    $this->start('file');
    ?>
    <?php if (!empty($error->queryString)) : ?>
        <p class="notice">
            <strong>SQL Query: </strong>
        <?= h($error->queryString) ?>
        </p>
    <?php endif; ?>
    <?php if (!empty($error->params)) : ?>
        <strong>SQL Query Params: </strong>
        <?php Debugger::dump($error->params) ?>
    <?php endif; ?>
    <?= $this->element('auto_table_warning') ?>
    <?php
    if (extension_loaded('xdebug')):
        xdebug_print_function_stack();
    endif;

    $this->end();
endif;
?>
        
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
    <head>
        <!--[if (gte mso 9)|(IE)]>
        <xml>
                <o:OfficeDocumentSettings>
                        <o:AllowPNG/>
                        <o:PixelsPerInch>96</o:PixelsPerInch>
                </o:OfficeDocumentSettings>
        </xml>
        <![endif]-->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>Notify - Notification Email Template</title>

        <!-- Google Fonts Link -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

        <style type="text/css">

            /*------ Client-Specific Style ------ */
            @-ms-viewport{width:device-width;}
            table, td{mso-table-lspace:0pt; mso-table-rspace:0pt;}
            img{-ms-interpolation-mode:bicubic; border: 0;}
            p, a, li, td, blockquote{mso-line-height-rule:exactly;}
            p, a, li, td, body, table, blockquote{-ms-text-size-adjust:100%; -webkit-text-size-adjust:100%;}
            #outlook a{padding:0;}
            .ReadMsgBody{width:100%;} .ExternalClass{width:100%;}
            .ExternalClass,.ExternalClass div,.ExternalClass font,.ExternalClass p,.ExternalClass span,.ExternalClass td,img{line-height:100%;}

            /*------ Reset Style ------ */
            *{-webkit-text-size-adjust:none;-webkit-text-resize:100%;text-resize:100%;}
            table{border-spacing: 0 !important;}
            h1, h2, h3, h4, h5, h6, p{display:block; Margin:0; padding:0;}
            img, a img{border:0; height:auto; outline:none; text-decoration:none;}
            #bodyTable, #bodyCell{ margin:0; padding:0; width:100%;}
            body {height:100%; margin:0; padding:0; width:100%;}

            .appleLinks a {color: #c2c2c2 !important; text-decoration: none;}
            span.preheader { display: none !important; }

            /*------ Google Font Style ------ */
            [style*="Open Sans"] {font-family:'Open Sans', Helvetica, Arial, sans-serif !important;}				
            /*------ General Style ------ */
            .wrapperWebview, .wrapperBody, .wrapperFooter{width:100%; max-width:600px; Margin:0 auto;}

            /*------ Column Layout Style ------ */
            .tableCard {text-align:center; font-size:0;}

            /*------ Images Style ------ */
            .imgHero img{ width:600px; height:auto; }

        </style>

        <style type="text/css">
            /*------ Media Width 480 ------ */
            @media screen and (max-width:640px) {
                table[class="wrapperWebview"]{width:100% !important; }
                table[class="wrapperEmailBody"]{width:100% !important; }
                table[class="wrapperFooter"]{width:100% !important; }
                td[class="imgHero"] img{ width:100% !important;}
                .hideOnMobile {display:none !important; width:0; overflow:hidden;}
            }
        </style>

    </head>

    <body style="background-color:#F9F9F9;">
        <center>
           <?php echo $this->element('frontend/login-header_404'); ?>
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed;background-color:#F9F9F9;" id="bodyTable">
                <tr>
                    <td align="center" valign="top" style="padding-right:10px;padding-left:10px;" id="bodyCell">
                        <!--[if (gte mso 9)|(IE)]><table align="center" border="0" cellspacing="0" cellpadding="0" style="width:600px;" width="600"><tr><td align="center" valign="top"><![endif]-->


                        <!-- Email Wrapper Body Open // -->
                        <table border="0" cellpadding="0" cellspacing="0" style="max-width:600px;" width="100%" class="wrapperBody">
                            <tr>
                                <td align="center" valign="top">

                                    <!-- Table Card Open // -->
                                    <table border="0" cellpadding="0" cellspacing="0" style="background-color:#FFFFFF;border-color:#E5E5E5; border-style:solid; border-width:0 1px 1px 1px;" width="100%" class="tableCard">

                                        <tr>
                                            <!-- Header Top Border // -->
                                            <td height="3" style="font-size:1px;line-height:3px;" class="topBorder" >&nbsp;</td>
                                        </tr>

                                        <tr>
                                            <td align="center" valign="top" style="padding-bottom:40px" class="imgHero">
                                                <!-- Hero Image // -->
                                                <a href="#" target="_blank" style="text-decoration:none;">
                                                    <img src="<?php echo HTTP_ROOT.'img/'?>404.png" width="600" alt="" border="0" style="width: 53%;max-width:600px;height:auto;display:block;padding-top: 39px;" />
                                                </a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td align="center" valign="top" style="padding-bottom:5px;padding-left:20px;padding-right:20px;" class="mainTitle">
                                                <!-- Main Title Text // -->
                                                <h2 class="text" style="color:#000000;font-size: 30px;font-weight:600;font-style:normal;letter-spacing:normal;line-height:36px;text-transform:none;text-align:center;padding:0;margin:0;">
                                                    <?php echo __('PAGE NOT FOUND!'); ?>
                                                </h2>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td align="center" valign="top" style="padding-bottom:30px;padding-left:20px;padding-right:20px;" class="subTitle">
                                                <!-- Sub Title Text // -->
                                                <h4 class="text" style="color: #000000;font-family: 'Montserrat', sans-serif !important;font-size: 15px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:26px;text-transform:none;text-align:center;padding:0;margin:0;">
                                                    <?php echo __('The page you are trying to access does not exist.'); ?>
                                                </h4>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td align="center" valign="top" style="padding-left:20px;padding-right:20px;" class="containtTable">

                                                <table border="0" cellpadding="0" cellspacing="0" width="100%" class="tablCatagoryLinks">
                                                    <tr>
                                                        <td align="center" valign="top" style="padding-bottom:20px;" class="catagoryLinks">

                                                            <a href="#" target="_blank" style="display:inline-block;">
                                                                <img src="img/catagory-1.png" alt="" width="60" border="0" style="height:auto; width:100%; max-width:60px; margin-left:2px; margin-right:2px" />
                                                            </a>

                                                            <a href="#" target="_blank" style="display:inline-block;">
                                                                <img src="img/catagory-2.png" alt="" width="60" border="0" style="height:auto; width:100%; max-width:60px; margin-left:2px; margin-right:2px" />
                                                            </a>

                                                            <a href="#" target="_blank" style="display:inline-block;">
                                                                <img src="img/catagory-3.png" alt="" width="60" border="0" style="height:auto; width:100%; max-width:60px; margin-left:2px; margin-right:2px" />
                                                            </a>

                                                            <a href="#" target="_blank" style="display:inline-block;">
                                                                <img src="img/catagory-4.png" alt="" width="60" border="0" style="height:auto; width:100%; max-width:60px; margin-left:2px; margin-right:2px" />
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </table>


                                                <table border="0" cellpadding="0" cellspacing="0" width="100%" class="tableButton">
                                                    <tr>
                                                        <td align="center" valign="top" style="padding-top:20px;padding-bottom:20px;">

                                                            <!-- Button Table // -->
                                                            <table align="center" border="0" cellpadding="0" cellspacing="0">
                                                                <tr>
                                                                    <td align="center" class="ctaButton" style="background-color:#f9d749;padding-top:12px;padding-bottom:12px;padding-left:35px;padding-right:35px;border-radius:.25rem">
                                                                        <!-- Button Link // -->
                                                                        <a class="text" href="<?php echo HTTP_ROOT ?>" style="color:#000;font-family: 'Montserrat', sans-serif !important;font-size: 15px !important;font-weight:700;font-style:normal;letter-spacing:1px;line-height:20px;text-transform:uppercase;text-decoration:none;display:block;">
                                                                            <?php echo __('Homepage'); ?>
                                                                        </a>
                                                                    </td>
                                                    
                                                                    <td align="center" class="ctaButton" style="background-color:#f9d749;padding-top:12px;padding-bottom:12px;padding-left:35px;padding-right:35px;border-radius:.25rem; margin-left: 10px;
display: inline-block;">
                                                                        <!-- Button Link // -->
                                                                        &nbsp; &nbsp;<a class="text" href="<?php echo HTTP_ROOT.'contact-us'?>"  style="color:#000;font-family: 'Montserrat', sans-serif !important;font-size: 15px !important;font-weight:700;font-style:normal;letter-spacing:1px;line-height:20px;text-transform:uppercase;text-decoration:none;display:block;">
                                                                            <?php echo __('Contact us!'); ?>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            </table>

                                                        </td>
                                                    </tr>
                                                </table>

                                            </td>
                                        </tr>

                                        <tr>
                                            <td height="20" style="font-size:1px;line-height:1px;">&nbsp;</td>
                                        </tr>

                                    </table>
                                    <!-- Table Card Close// -->

                                    <!-- Space -->
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="space">
                                        <tr>
                                            <td height="30" style="font-size:1px;line-height:1px;">&nbsp;</td>
                                        </tr>
                                    </table>

                                </td>
                            </tr>
                        </table>
                        <!-- Email Wrapper Body Close // -->

                        <!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]-->
                    </td>
                </tr>
            </table>

        </center>
    </body>
</html>