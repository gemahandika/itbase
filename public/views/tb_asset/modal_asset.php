<?php
include '../../../app/Config/koneksi.php';
?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-info">
                <h6 class="modal-title" id="exampleModalLabel">TAMBAH DATA ASSET</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../../../app/Controller/Asset_controller.php" method="post">
                <div class="modal-body">

                    <div class="form-group" style="font-size: 14px;">
                        <label for="pc_name" class="col-form-label"><b>PC NAME :</b></label>
                        <input type="text" class="form-control" id="pc_name" name="pc_name" required>
                    </div>
                    <div class="form-group" style="font-size: 14px;">
                        <label for="fleet" class="col-form-label"><b>FLEET :</b></label>
                        <select class="form-select" id="fleet" name="fleet" aria-label="Default select example" required>
                            <option value="YES">YES</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="create_asset">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>