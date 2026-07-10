<hr>

<p>

Regards,

<br>

<strong>

Gazelles Kitchen

</strong>

</p>

<?php

if(function_exists('site_contact')):

?>

<p>

Phone:

<?php
echo esc_html(
site_contact('sc_phone1')
);
?>

</p>

<p>

Email:

<?php
echo esc_html(
site_contact('sc_email')
);
?>

</p>

<?php

endif;

?>

</div>

</body>

</html>