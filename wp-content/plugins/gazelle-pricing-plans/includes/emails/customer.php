<?php

defined('ABSPATH') || exit;

/*
|--------------------------------------------------------------------------
| Variables
|--------------------------------------------------------------------------
*/

$plan_name = !empty($plan) ? $plan->post_title : '';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Catering Request Received</title>

    <style>

        body{
            margin:0;
            padding:0;
            background:#f4f6f9;
            font-family:Arial, Helvetica, sans-serif;
            color:#333333;
        }

        table{
            border-collapse:collapse;
        }

        .wrapper{
            width:100%;
            background:#f4f6f9;
            padding:40px 0;
        }

        .container{
            width:600px;
            max-width:600px;
            margin:0 auto;
            background:#ffffff;
            border:1px solid #e5e7eb;
        }

        .header{
            background:#2F855A;
            padding:40px;
            text-align:center;
        }

        .header h1{
            margin:0;
            color:#ffffff;
            font-size:30px;
        }

        .header p{
            color:#f3f3f3;
            margin-top:10px;
            font-size:15px;
        }

        .content{
            padding:35px;
        }

        .success-box{
            background:#ECFDF3;
            border-left:5px solid #22C55E;
            padding:20px;
            margin-bottom:30px;
        }

        .success-box h2{
            margin:0 0 10px;
            color:#166534;
            font-size:20px;
        }

        .success-box p{
            margin:0;
            line-height:26px;
        }

        .intro{
            line-height:28px;
            margin-bottom:35px;
        }

        .section-title{
            font-size:18px;
            color:#2F855A;
            font-weight:bold;
            border-bottom:2px solid #eeeeee;
            padding-bottom:10px;
            margin-bottom:18px;
        }

        .info-table{
            width:100%;
            margin-bottom:35px;
        }

        .info-table td{
            border:1px solid #ececec;
            padding:14px;
            font-size:14px;
        }

        .label{
            width:180px;
            background:#fafafa;
            font-weight:bold;
        }

        .info-box{
            background:#EFF6FF;
            border-left:5px solid #2563EB;
            padding:20px;
            margin-bottom:35px;
            line-height:26px;
        }

        .button{
            display:inline-block;
            background:#25D366;
            color:#ffffff !important;
            text-decoration:none;
            padding:15px 35px;
            border-radius:5px;
            font-size:16px;
            font-weight:bold;
        }

        .button-wrapper{
            text-align:center;
            margin:40px 0;
        }

        .contact{
            background:#FAFAFA;
            border:1px solid #ececec;
            padding:20px;
            line-height:28px;
        }

        .footer{
            background:#f8f8f8;
            padding:30px;
            text-align:center;
            border-top:1px solid #ececec;
        }

        .footer p{
            margin:5px 0;
            color:#777777;
            font-size:13px;
        }

        @media only screen and (max-width:620px){

            .container{
                width:100% !important;
            }

            .content{
                padding:20px !important;
            }

            .header{
                padding:30px 20px;
            }

            .info-table td{
                display:block;
                width:100% !important;
            }

            .label{
                background:#f5f5f5;
            }

        }

    </style>

</head>

<body>

    <table class="wrapper" width="100%" cellpadding="0" cellspacing="0">

        <tr>

            <td align="center">

                <table class="container" cellpadding="0" cellspacing="0">

                    <tr>

                        <td class="header">

                            <h1>Thank You!</h1>

                            <p>

                                We've successfully received your catering request.

                            </p>

                        </td>

                    </tr>

                    <tr>

                        <td class="content">

                            <div class="success-box">

                                <h2>Request Submitted Successfully</h2>

                                <p>

                                    Thank you for choosing Gazelles Kitchen.

                                    Our catering team has received your request and will review it shortly.

                                </p>

                            </div>

                            <div class="intro">

                                Hello <strong><?php echo esc_html($full_name); ?></strong>,

                                <br><br>

                                Thank you for placing your catering request with us.

                                We're excited to be part of your event and appreciate the opportunity to serve you.

                                One of our team members will contact you soon to discuss your request.

                            </div>

                            <div class="section-title">

                                Your Request Summary

                            </div>

                            <table class="info-table">

                                <tr>

                                    <td class="label">

                                        Selected Plan

                                    </td>

                                    <td>

                                        <?php echo esc_html($plan_name); ?>

                                    </td>

                                </tr>

                                <tr>

                                    <td class="label">

                                        Delivery Date

                                    </td>

                                    <td>

                                        <?php echo esc_html($delivery_date); ?>

                                    </td>

                                </tr>

                                <tr>

                                    <td class="label">

                                        Delivery Location

                                    </td>

                                    <td>

                                        <?php echo esc_html($delivery_location); ?>

                                    </td>

                                </tr>

                                <tr>

                                    <td class="label">

                                        Status

                                    </td>

                                    <td>

                                        Request Received

                                    </td>

                                </tr>

                            </table>
                            <div class="info-box">

                                <strong>What's Next?</strong>

                                <ul style="margin-top:15px; padding-left:20px;">

                                    <li>
                                        Our catering team will carefully review your request.
                                    </li>

                                    <li>
                                        We'll contact you using the phone number or email you provided.
                                    </li>

                                    <li>
                                        If we need any additional information, we'll reach out to you.
                                    </li>

                                    <li>
                                        Once everything is confirmed, we'll begin preparing for your event.
                                    </li>

                                </ul>

                            </div>

                            <div class="button-wrapper">

                                <a
                                href="<?php echo $whatsapp_url; ?>"
                                class="button"
                                target="_blank">

                                Chat With Us On WhatsApp

                            </a>

                        </div>

                        <div class="contact">

                            <strong>Need Immediate Assistance?</strong>

                            <br><br>

                            If you have any questions regarding your catering request,
                            simply click the WhatsApp button above to chat with our team.

                            <br><br>

                            We're always happy to assist you.

                        </div>

                    </td>

                </tr>

                <tr>

                    <td class="footer">

                        <p>

                            <strong>Gazelles Kitchen</strong>

                        </p>

                        <p>

                            Thank you for choosing us.

                            We appreciate your trust and look forward to serving you.

                        </p>

                        <p>

                            This is an automated email.
                            Please do not reply directly to this message.

                        </p>

                    </td>

                </tr>

            </table>

        </td>

    </tr>

</table>

</body>

</html>