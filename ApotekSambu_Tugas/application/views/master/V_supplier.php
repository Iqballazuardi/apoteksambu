<?php $this->load->view('template/headbar'); ?>

<?php
$url = base_url();
?>

<section id="basic-datatable">
    <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="mt-2 mb-1 d-flex justify-content-center">
                        <img style="width: 100px;" src="<?php echo base_url('assets/images/apoteksambu.png') ?>" />
                        <img style="width: 75px;" src="<?php echo base_url('assets/images/logo-baru.png') ?>" />
                    </div>
                    <div class="d-flex justify-content-center">
                        <h2><?php echo $this->config->item("nama_perusahaan"); ?></h2>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url('index.php/master/C_supplier/index/simpan') ?>" id="master_supplier" name="master_supplier" method="post" role="form" enctype="multipart/form-data">
                            <div class="row mb-1">
                                <div class="col-md-3">
                                    <strong>Tambah Supplier</strong>
                                </div>
                                <div class="col-md-12">

                                    <?php if (isset($message)) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <h4 class="alert-heading">Warning!</h4>
                                            <p class="mb-0">
                                                <?php echo $message; ?>
                                            </p>
                                        </div> <?php } ?>

                                    <input type="hidden" name="id" value="" id="id" size="5">

                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            Nama
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="nama" id="nama" class="form-control nama" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            Alamat
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="alamat" id="alamat" class="form-control alamat" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            email
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="email" id="email" class="form-control email" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            Nomor
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="nomor" id="nomor" class="form-control nomor" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            Ditambah Oleh
                                        </div>
                                        <div class="col-md-3">
                                            <input readonly type="text"  name="updated_by" id="updated_by" class="form-control updated_by" value="<?= $dtpersonil ?>" >
                                        </div>
                                        <div class="col-md-3" align="right">
                                            <button type="submit" class="btn bg-gradient-primary" id="btnsimpan"><i class="feather icon-save"></i> Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <br>
                        <br>
                        <div class="row mb-1">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                    <strong>Master Suppler</strong>
                                </div>
                                <div class="table-responsive" style="max-height: 800px;">
                                    <table class="table table-striped table-bordered sticky-header">
                                        <thead>
                                            <tr style="color: black;">
                                                <th class="table-primary align-middle text-center" style="color: black" rowspan="3" width="10">&#x2714;</th>
                                                <th class="table-primary align-middle text-center">Nama</th>
                                                <th class="table-primary align-middle text-center">Alamat</th>
                                                <th class="table-primary align-middle text-center">Email</th>
                                                <th class="table-primary align-middle text-center">Nomor</th>
                                                <th class=" table-primary align-middle text-center">Last Update</th>
                                                <th class=" table-primary align-middle text-center" colspan='2'>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="dtable">
                                            <?php
                                            if (!isset($dtsupplier)) { ?>
                                                <tr>
                                                    <td valign="top"><input name="chk[]" type="checkbox" /></td>
                                                    <td><input type="text" name="nama[]" id="nama" class="form-control w-auto nama" style="text-align: center;" value=""> </td>
                                                    <td><input type="text" name="alamat[]" id="alamat" class="form-control w-auto alamat" style="text-align: center;" value=""> </td>
                                                    <td><input type="text" name="email[]" id="email" class="form-control w-auto email" style="text-align: center;" value=""> </td>
                                                    <td><input type="text" name="nomor[]" id="nomor" class="form-control w-auto nomor" style="text-align: center;" value=""> </td>
                                                    <td>
                                                        <select name="updated_by[]" id="updated_by" class="hitung_spec form-control updated_by w-auto" style="text-align:center;" readonly>
                                                            <option value=""> - Pilih -</option>
                                                            <?php foreach ($get_personil as $get_personil_row) { ?>
                                                                <option value="<?= $get_personil_row?>"> <?= $get_personil_row?></option>
                                                            <?php
                                                            } ?>
                                                        </select>
                                                    </td>
                                                <tr>
                                                    <?php
                                                } else {
                                                    $no = 1;
                                                    foreach ($dtsupplier as $dtsupplier_row) { ?>
                                                <tr>
                                                    <td valign="top"><input name="chk[]" type="checkbox" class="chk" />
                                                        <input type="hidden" name="id[]" id="id" class="id_supplier" value="<?=$dtsupplier_row->id; ?>" size="1" />
                                                    </td>
                                                    <td> <input type="text" name="nama[]" id="nama" class="form-control nama" style="text-align: center;" value="<?= $dtsupplier_row->nama;  ?>" readonly></td>
                                                    <td> <input type="text" name="alamat[]" id="alamat" class="form-control alamat" style="text-align: center;" value="<?= $dtsupplier_row->alamat;  ?>" readonly></td>
                                                    <td> <input type="text" name="email[]" id="email" class="form-control email" style="text-align: center;" value="<?= $dtsupplier_row->email;  ?>" readonly></td>
                                                    <td> <input type="text" name="nomor[]" id="nomor" class="form-control nomor" style="text-align: center;" value="<?= $dtsupplier_row->nomor;  ?>" readonly></td>
                                                    <td> <input type="text" name="updated_by[]" id="updated_by" class="form-control updated_by" style="text-align: center;" value="<?= $dtsupplier_row->updated_by;  ?>" readonly></td>
                                                    
                                                    <td>
                                                    <td>
                                                        <button class="btn bg-gradient-info edit_button" disabled>Edit</button>
                                                        <button class="btn bg-gradient-danger delete_button" disabled>Delete</button>
                                                    </td>
                                                <tr>
                                            <?php }
                                                } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td class="table-primary align-middle text-center fixed-column" colspan="6" align="center">
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div class="table-responsive" style="max-height: 800px;">
                                        <div class="box-footer">
                                            <div align="left">
                                                <button class="btn bg-gradient-success" id="btn_export"><i class="feather icon-download"></i> Export PDF</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('template/footbar'); ?>
<script>
    $(document).on('input', '.harga', function(){
        let value = $(this).val(); 
        value = value.replace(/[^0-9]/g, '');
        value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        $(this).val("RP " + value)
    });

    $(document).on('click', '.chk', function() {
        var isChecked = $(this).is(':checked');
        $(this).closest('tr').find('.nama').prop('readonly', !isChecked);
        $(this).closest('tr').find('.alamat').prop('readonly', !isChecked);
        $(this).closest('tr').find('.email').prop('readonly', !isChecked);
        $(this).closest('tr').find('.nomor').prop('readonly', !isChecked);
        $(this).closest('tr').find('.edit_button').prop('disabled', !isChecked);
        $(this).closest('tr').find('.delete_button').prop('disabled', !isChecked);
    });

    $(document).on('click', '.edit_button', function() {
        let nama = $(this).closest('tr').find('.nama').val();
        let alamat = $(this).closest('tr').find('.alamat').val();
        let email = $(this).closest('tr').find('.email').val();
        let nomor = $(this).closest('tr').find('.nomor').val();
        let updated_by = $(this).closest('tr').find('.updated_by').val();
        let id = $(this).closest('tr').find('.id_supplier').val();

       

        
        if (id != 'undefined') {
            console.log('ini')
            $.ajax({
                type: "post",
                url: "url",
                data: {
                    id_supplier: id,
                    nama: nama,
                    alamat: alamat,
                    email: email,
                    nomor: nomor,
                    updated_by: updated_by
                },
                dataType: "json",
                url: "<?php echo base_url(); ?>index.php/master/C_supplier/update",
                success: function(response) {
                    console.log(response)
                    if (response.status === 1) {
                        alert(response.pesan)
                        window.location.reload();
                    } else {
                        alert(response.pesan)
                        window.location.reload();
                    }
                }
            });
        }
    })

    $(document).on('click', '.delete_button', function() {
        let id = $(this).closest('tr').find('.id_supplier').val();
        console.log(id);


        if (id != 'undefined') {
            let confirmation = confirm("Anda Yakin Ingin Menghapus Data penting ini?");
            if (confirmation) {
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url(); ?>index.php/master/C_supplier/delete",
                    data: {
                        id_supplier: id,
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        alert(response.pesan);
                            window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        alert("An error occurred: " + error);
                    }
                });
            } else {
                console.log("Batal Hapus");
            }
        } else {
            alert("Invalid ID!");
        }
    });

    $(document).on('click', '#btn_export', function() {
        window.location.href = "<?php echo base_url(); ?>index.php/master/C_supplier/generate_pdf";
    });
</script>

<?php $this->load->view('template/footbarend'); ?>