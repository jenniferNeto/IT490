#!/usr/bin/php
<?php

$php_array = array(array("bob", "11/11/2000", "Is it ok to breathe fire?"), array("iii", "22/22/2022", "how to legally commit tax evasion?"));
?>
<script>
<?php echo 'var topics = ' . htmlspecialchars(json_encode($php_array)) . ';'; ?>
</script>

