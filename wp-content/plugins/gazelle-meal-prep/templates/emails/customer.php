<?php

defined('ABSPATH') || exit;

include GMP_PATH . 'templates/emails/partials/header.php';
?>

<h2>
    Thank you for your Meal Prep Order
</h2>

<p>

Hello
<strong>

<?php echo esc_html($order['fullname']); ?>

</strong>,

</p>

<p>

Thank you for placing your order.

Our team will contact you shortly.

</p>

<table width="100%" cellpadding="10">

<tr>

<td><strong>Delivery City</strong></td>

<td><?php echo esc_html($order['delivery_city']); ?></td>

</tr>

<tr>

<td><strong>Preferred Delivery Date</strong></td>

<td><?php echo esc_html($order['delivery_date']); ?></td>

</tr>

<tr>

<td><strong>Quantity</strong></td>

<td><?php echo esc_html($order['quantity']); ?></td>

</tr>

<tr>

<td><strong>Special Instruction</strong></td>

<td><?php echo nl2br(
esc_html(
$order['special_instruction']
)
); ?></td>

</tr>

</table>

<?php

include GMP_PATH . 'templates/emails/partials/footer.php';