<footer class="container-fluid bg-dark-brown text-white text-center p-5">
    Copyright &copy; AgriBids <span id="copyright-year"></span>
</footer>

<script src="../assets/js/scripts.js"></script>
<?php
    $success = "";
    $error = "";

    if (isset($_SESSION["success"])) {
        $success = $_SESSION["success"];
        unset($_SESSION["success"]);
    }

    if (isset($_SESSION["error"])) {
        $error = $_SESSION["error"];
        unset($_SESSION["error"]);
    }
?>
<script>
    const success = '<?php echo $success; ?>';
    const error = '<?php echo $error; ?>';
    console.log(success);
    console.log(error);

    if (error) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: error,
        });
    }

    if (success) {
        Swal.fire({
            icon: 'success',
            title: 'Yay!🎉',
            text: success,
        });
    }
</script>
</body>
</html>