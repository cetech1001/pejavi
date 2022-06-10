</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
<script src="<?= PUBLIC_PATH . "/assets/js/dashboard.js" ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
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