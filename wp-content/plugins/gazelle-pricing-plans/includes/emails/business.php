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

    <title>New Catering Request</title>

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
            background:#0E4408;
            padding:35px;
            text-align:center;
        }

        .header h1{
            color:#ffffff;
            margin:0;
            font-size:28px;
            font-weight:bold;
        }

        .header p{
            color:#f8f8f8;
            margin-top:8px;
            font-size:14px;
        }

        .content{
            padding:35px;
        }

        .alert{
            background:#f1f7f1;
            border-left:5px solid #F59E0B;
            padding:18px;
            margin-bottom:30px;
            font-size:15px;
            line-height:24px;
        }

        .section-title{
            font-size:18px;
            font-weight:bold;
            color:#0E4408;
            margin-bottom:15px;
            border-bottom:2px solid #eeeeee;
            padding-bottom:10px;
        }

        .info-table{
            width:100%;
            margin-bottom:30px;
        }

        .info-table td{
            border:1px solid #eeeeee;
            padding:14px;
            font-size:14px;
            vertical-align:top;
        }

        .label{
            background:#fafafa;
            width:180px;
            font-weight:bold;
        }

        .instructions{
            background:#f8fafc;
            border:1px solid #e5e7eb;
            padding:18px;
            line-height:26px;
            margin-bottom:30px;
        }

        .footer-note{
            background:#EEF7FF;
            border-left:5px solid #2563EB;
            padding:18px;
            font-size:14px;
            line-height:24px;
        }

        .footer{
            background:#f8f8f8;
            padding:25px;
            text-align:center;
            border-top:1px solid #eeeeee;
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
                padding:25px !important;
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

                            <h1>New Catering Request</h1>

                            <p>
                                A new catering order has just been submitted.
                            </p>

                            <p style="margin-top:15px;font-size:15px;color:#ffffff;">

                                <strong>Selected Plan:</strong>

                                <?php echo esc_html($plan_name); ?>

                            </p>

                        </td>

                    </tr>

                    <tr>

                        <td class="content">

                            <div class="alert">

                                <strong>Attention:</strong>

                                A customer has submitted a new catering request.

                                Please review the information below and contact the customer as soon as possible.

                            </div>

                            <div class="section-title">

                                Customer Information

                            </div>

                            <table class="info-table">

                                <tr>

                                    <td class="label">

                                        Full Name

                                    </td>

                                    <td>

                                        <?php echo esc_html($full_name); ?>

                                    </td>

                                </tr>

                                <tr>

                                    <td class="label">

                                        Email Address

                                    </td>

                                    <td>

                                        <?php echo esc_html($email); ?>

                                    </td>

                                </tr>

                                <tr>

                                    <td class="label">

                                        Phone Number

                                    </td>

                                    <td>

                                        <?php echo esc_html($phone); ?>

                                    </td>

                                </tr>

                            </table>
                            <div class="section-title">

    Order Information

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

</table>

<div class="section-title">

    Special Instructions

</div>

<div class="instructions">

    <?php if (!empty($special_instruction)) : ?>

        <?php echo nl2br(esc_html($special_instruction)); ?>

    <?php else : ?>

        No special instructions were provided.

    <?php endif; ?>

</div>

<div class="footer-note">

    This request was submitted through the Gazelles Kitchen website.

    Kindly follow up with the customer to confirm the order and discuss any additional requirements.

</div>

</td>

</tr>

<tr>

    <td class="footer">

        <p>

            <strong>Gazelles Kitchen</strong>

        </p>

        <p>

            This is an automated notification from your catering system.

        </p>

        <p>

            Please do not reply directly to this email.

        </p>

    </td>

</tr>

</table>

</td>

</tr>

</table>

</body>

</html>