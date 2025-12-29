<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
</script>

<?php
if(isset($_SESSION['message']))
{
    ?>
    <script>
        Toast.fire({
            icon: "<?= $_SESSION['message']['type'] ?? 'success' ?>",
            title: "<?= $_SESSION['message']['content'] ?? 'success' ?>",
        });
    </script>
<?php
}
session_unset();
?>
</body>
</html>