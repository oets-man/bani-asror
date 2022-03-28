<link href="<?= base_url(); ?>/assets/vendors/datatables/DataTables-1.11.3/css/dataTables.bootstrap5.min.css" type="text/css" rel="stylesheet">


<div class="modal fade" id="modal-cari" tabindex="-1" aria-labelledby="modal-cariLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-cariLabel">Cari <span id="request-from">Anak</span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="tabel-member" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center"><i class="bi bi-check2-circle"></i></th>
                                <th>Nama</th>
                                <th>Bin-1</th>
                                <th>Bin-2</th>
                                <th>Bin-3</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- data table -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- datatables -->
<script src="<?= base_url(); ?>/assets/vendors/datatables/DataTables-1.11.3/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>/assets/vendors/datatables/DataTables-1.11.3/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        let token = "<?= csrf_hash() ?>";
        let table = $('#tabel-member').DataTable({
            processing: true,
            serverSide: true,
            order: [],
            ajax: {
                url: "<?= site_url('member/membersparents/') ?>" + $('#request-from').html(),
                type: "POST",
                data: function(d) {
                    d.<?= csrf_token() ?> = token;
                },
            },
            columnDefs: [{
                    targets: [0],
                    orderable: false,
                    className: 'dt-body-center'
                },
                // {
                //     targets: [2,3],
                //     className: 'dt-body-center'
                // },
            ]
        });

        table.on('xhr.dt', function(e, settings, json, xhr) {
            token = json.<?= csrf_token() ?>;
        });
    });

    function setMember(id, req) {
        alert(req);
        if (req == 'Anak') {

        } else if (req == 'Suami') {

        } else if (req == 'Istri') {

        }
    }
</script>