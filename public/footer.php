<!-- OverlayScrollbars -->
<script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
    integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ=" crossorigin="anonymous"></script>

<!-- Popper.js for Bootstrap 5 -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

<!-- Bootstrap 5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

<!-- AdminLTE -->
<script src="../../../app/Asset/js/adminlte.js"></script>

<!-- OverlayScrollbars Configuration -->
<script>
    const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
    const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
    };
    document.addEventListener('DOMContentLoaded', function() {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
            OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                scrollbars: {
                    theme: Default.scrollbarTheme,
                    autoHide: Default.scrollbarAutoHide,
                    clickScroll: Default.scrollbarClickScroll,
                },
            });
        }
    });
</script>

<!-- jQuery and DataTables -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            responsive: true,
            scrollX: true
        });
        $('#example1').DataTable({
            responsive: true,
            scrollX: true
        });
    });
</script>
<script>
    $(document).on('click', '.openModalButton', function() {
        var id_resi = $(this).data('id_resi');
        var mode = $(this).data('mode');

        $.ajax({
            url: 'edit_modal.php',
            type: 'GET',
            data: {
                id_resi: id_resi,
                mode: mode
            },
            success: function(response) {
                $('#modalEditContent').html(response);
            },
            error: function(xhr, status, error) {
                console.log("AJAX Error: " + xhr.responseText);
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Inisialisasi Select2
        $('.select2').select2({
            width: '100%',
            height: '100px',
            placeholder: '-- Pilih Data --',
            allowClear: true
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const startDateInput = document.getElementById('start_date');
        const endDateInput = document.getElementById('end_date');

        if (startDateInput && endDateInput) {
            if (startDateInput.value) {
                endDateInput.min = startDateInput.value;
            }

            startDateInput.addEventListener('change', function() {
                endDateInput.min = this.value;
                if (endDateInput.value < this.value) {
                    endDateInput.value = this.value;
                }
            });
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Tampilkan/sembunyikan password
        window.togglePassword = function(id) {
            const field = document.getElementById(id);
            field.type = field.type === "password" ? "text" : "password";
        }

        const passwordInput = document.getElementById('password');
        const confirmInput = document.getElementById('confirm_password');
        const strengthMessage = document.getElementById('strengthMessage');

        // Validasi real-time saat mengetik password
        passwordInput.addEventListener('input', function() {
            const password = passwordInput.value;
            const isStrong = password.length >= 6 && /\d/.test(password) && /[A-Za-z]/.test(password);

            if (!isStrong) {
                strengthMessage.textContent = "Password harus minimal 6 karakter dan mengandung huruf & angka.";
            } else {
                strengthMessage.textContent = "";
            }
        });

        // Validasi saat submit form
        const form = document.getElementById('formUpdatePassword');
        if (form) {
            form.addEventListener('submit', function(e) {
                const password = passwordInput.value;
                const confirm = confirmInput.value;
                const isStrong = password.length >= 6 && /\d/.test(password) && /[A-Za-z]/.test(password);

                if (!isStrong) {
                    strengthMessage.textContent = "Password harus minimal 6 karakter dan mengandung huruf & angka.";
                    e.preventDefault();
                    return;
                }

                if (password !== confirm) {
                    alert("Konfirmasi password tidak cocok!");
                    e.preventDefault();
                }
            });
        }
    });
</script>


</body>

</html>