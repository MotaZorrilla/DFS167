
<?php 
        if ($_SESSION['message']) { ?>
          <script>
            alert('<?php echo $_SESSION['message'];?> ');
          </script>
<?php   }

session_destroy();

?>

