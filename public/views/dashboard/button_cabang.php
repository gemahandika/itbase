<!-- Tambahkan jQuery jika belum ada -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="row">
    <div class="col-12">
        <div class="card mb-2">
            <button type="button" class="btn  toggle-card" title="Collapse">
                <div class="card-header">
                    <h3 class="card-title">Pilih Cabang</h3>
                    <div class="card-tools">
                        <i class="bi bi-chevron-down"></i>
                        <i class="bi bi-chevron-up d-none"></i>
                    </div>
                </div>
            </button>
            <div class="card-body" style="display: none;">
                <div class="btn-group mb-2 flex-wrap d-flex" role="group">
                    <a href="home.php" class="btn btn-outline-primary mb-2 mr-2">HOME</a>
                    <a href="medan.php" class="btn btn-outline-primary mb-2 mr-2">MEDAN</a>
                    <a href="pakam.php" class="btn btn-outline-primary mb-2 mr-2">PAKAM</a>
                    <button type="button" class="btn btn-outline-primary mb-2 mr-2">PAYAGELI</button>
                    <button type="button" class="btn btn-outline-primary mb-2 mr-2">SERGEI</button>
                    <button type="button" class="btn btn-outline-primary mb-2 mr-2">BINJAI</button>
                    <button type="button" class="btn btn-outline-primary mb-2 mr-2">LANGKAT</button>
                    <button type="button" class="btn btn-outline-primary mb-2 mr-2">KARO</button>
                    <button type="button" class="btn btn-outline-primary mb-2 mr-2">DAIRI</button>
                    <button type="button" class="btn btn-outline-primary mb-2 mr-2">PAK PAK BHARAT</button>
                    <button type="button" class="btn btn-outline-primary mb-2 mr-2">SAMOSIR</button>
                    <button type="button" class="btn btn-outline-primary mb-2 mr-2">TEBING</button>
                    <button type="button" class="btn btn-outline-primary mb-2 mr-2">SIANTAR</button>
                    <button type="button" class="btn btn-outline-primary mb-2 mr-2">SIMALUNGUN</button>
                    <button type="button" class="btn btn-outline-primary mb-2 mr-2">BATUBARA</button>
                    <button type="button" class="btn btn-outline-primary mb-2 mr-2">ASAHAN</button>
                    <button type="button" class="btn btn-outline-primary mb-2 mr-2">TJ. BALAI</button>
                    <button type="button" class="btn btn-outline-primary mb-2 mr-2">AEKKANOPAN</button>
                    <button type="button" class="btn btn-outline-primary mb-2 mr-2">LABUHAN BATU</button>
                    <button type="button" class="btn btn-outline-primary mb-2">KOTA PINANG</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".toggle-card").click(function() {
            var cardBody = $(this).closest(".card").find(".card-body");
            var downIcon = $(this).find(".bi-chevron-down");
            var upIcon = $(this).find(".bi-chevron-up");

            cardBody.slideToggle(300); // Efek buka/tutup dengan durasi 300ms
            downIcon.toggleClass("d-none");
            upIcon.toggleClass("d-none");
        });
    });
</script>