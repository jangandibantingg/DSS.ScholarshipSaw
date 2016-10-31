<?php
  session_start();
  session_destroy();
  echo "<script>alert('Anda telah keluar '); window.location = '../index.php'</script>";
?>
