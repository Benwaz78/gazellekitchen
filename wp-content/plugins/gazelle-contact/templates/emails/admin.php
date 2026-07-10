<?php

if (!defined('ABSPATH')) {
    exit;
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>New Contact Enquiry</title>
</head>

<body style="margin:0;padding:30px;background:#f5f5f5;font-family:Arial,Helvetica,sans-serif;">

    <table
        width="600"
        align="center"
        cellpadding="0"
        cellspacing="0"
        style="background:#ffffff;border:1px solid #dddddd;">

        <tr>
            <td
                style="background:#222;color:#ffffff;padding:20px;font-size:22px;font-weight:bold;">
                New Contact Enquiry
            </td>
        </tr>

        <tr>
            <td style="padding:30px;">

                <table
                    width="100%"
                    cellpadding="8"
                    cellspacing="0"
                    style="border-collapse:collapse;">

                    <tr>
                        <td width="180"><strong>Full Name</strong></td>
                        <td><?php echo esc_html($full_name); ?></td>
                    </tr>

                    <tr>
                        <td><strong>Email Address</strong></td>
                        <td>
                            <a href="mailto:<?php echo esc_attr($email); ?>">
                                <?php echo esc_html($email); ?>
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td><strong>Phone Number</strong></td>
                        <td><?php echo esc_html($phone); ?></td>
                    </tr>

                    <tr>
                        <td><strong>Subject</strong></td>
                        <td><?php echo esc_html($subject); ?></td>
                    </tr>

                    <tr>
                        <td
                            valign="top">
                            <strong>Message</strong>
                        </td>

                        <td>
                            <?php echo nl2br(esc_html($message)); ?>
                        </td>
                    </tr>

                    <tr>
                        <td><strong>Submitted</strong></td>
                        <td>
                            <?php echo esc_html(
                                wp_date(
                                    'F j, Y \a\t g:i A'
                                )
                            ); ?>
                        </td>
                    </tr>

                </table>

            </td>
        </tr>

        <tr>
            <td
                style="padding:15px;background:#f3f3f3;font-size:13px;color:#666;text-align:center;">

                This enquiry was submitted via the Gazelles Kitchen Contact Form.

            </td>
        </tr>

    </table>

</body>

</html>