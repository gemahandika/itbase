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
                    <form action="index.php" method="post">
                        <input type="hidden" name="id" value="1">
                        <button type="submit" class="btn btn-outline-primary mb-2 mr-2">MEDAN</button>
                    </form>
                    <form action="index.php" method="post">
                        <input type="hidden" name="id" value="2">
                        <button type="submit" class="btn btn-outline-primary mb-2 mr-2">PAKAM</button>
                    </form>
                    <form action="index.php" method="post">
                        <input type="hidden" name="id" value="3">
                        <button type="submit" class="btn btn-outline-primary mb-2 mr-2">PAYAGELI</button>
                    </form>
                    <form action="index.php" method="post">
                        <input type="hidden" name="id" value="4">
                        <button type="submit" class="btn btn-outline-primary mb-2 mr-2">SERGEI</button>
                    </form>
                    <form action="index.php" method="post">
                        <input type="hidden" name="id" value="5">
                        <button type="submit" class="btn btn-outline-primary mb-2 mr-2">BINJAI</button>
                    </form>
                    <form action="index.php" method="post">
                        <input type="hidden" name="id" value="6">
                        <button type="submit" class="btn btn-outline-primary mb-2 mr-2">LANGKAT</button>
                    </form>
                    <form action="index.php" method="post">
                        <input type="hidden" name="id" value="7">
                        <button type="submit" class="btn btn-outline-primary mb-2 mr-2">KARO</button>
                    </form>
                    <form action="index.php" method="post">
                        <input type="hidden" name="id" value="8">
                        <button type="submit" class="btn btn-outline-primary mb-2 mr-2">DAIRI</button>
                    </form>
                    <form action="index.php" method="post">
                        <input type="hidden" name="id" value="9">
                        <button type="submit" class="btn btn-outline-primary mb-2 mr-2">PAK PAK BHARAT</button>
                    </form>
                    <form action="index.php" method="post">
                        <input type="hidden" name="id" value="10">
                        <button type="submit" class="btn btn-outline-primary mb-2 mr-2">SAMOSIR</button>
                    </form>
                    <form action="index.php" method="post">
                        <input type="hidden" name="id" value="11">
                        <button type="submit" class="btn btn-outline-primary mb-2 mr-2">TEBING</button>
                    </form>
                    <form action="index.php" method="post">
                        <input type="hidden" name="id" value="12">
                        <button type="submit" class="btn btn-outline-primary mb-2 mr-2">SIANTAR</button>
                    </form>
                    <form action="index.php" method="post">
                        <input type="hidden" name="id" value="13">
                        <button type="submit" class="btn btn-outline-primary mb-2 mr-2">SIMALUNGUN</button>
                    </form>
                    <form action="index.php" method="post">
                        <input type="hidden" name="id" value="14">
                        <button type="submit" class="btn btn-outline-primary mb-2 mr-2">BATUBARA</button>
                    </form>
                    <form action="index.php" method="post">
                        <input type="hidden" name="id" value="15">
                        <button type="submit" class="btn btn-outline-primary mb-2 mr-2">ASAHAN</button>
                    </form>
                    <form action="index.php" method="post">
                        <input type="hidden" name="id" value="16">
                        <button type="submit" class="btn btn-outline-primary mb-2 mr-2">TJ. BALAI</button>
                    </form>
                    <form action="index.php" method="post">
                        <input type="hidden" name="id" value="17">
                        <button type="submit" class="btn btn-outline-primary mb-2 mr-2">LABUHAN NATU UTARA</button>
                    </form>
                    <form action="index.php" method="post">
                        <input type="hidden" name="id" value="18">
                        <button type="submit" class="btn btn-outline-primary mb-2 mr-2">LABUHAN BATU</button>
                    </form>
                    <form action="index.php" method="post">
                        <input type="hidden" name="id" value="19">
                        <button type="submit" class="btn btn-outline-primary mb-2 mr-2">LABUHAN BATU SELATAN</button>
                    </form>
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