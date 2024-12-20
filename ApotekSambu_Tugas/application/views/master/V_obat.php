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
                        <form action="<?php echo base_url('index.php/master/C_obat/index/simpan') ?>" id="master_obat" name="master_obat" method="post" role="form" enctype="multipart/form-data">
                            <div class="row mb-1">
                                <div class="col-md-3">
                                    <strong>Tambah Obat</strong>
                                </div>
                                <div class="col-md-12">

                                    <?php if (isset($message)) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <h4 class="alert-heading">Warning!</h4>
                                            <p class="mb-0">
                                                <?php echo $message; ?>
                                            </p>
                                        </div> <?php } ?>

                                    <input type="hidden" name="id_obat" value="" id="id_obat" size="5">

                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            Nama Obat
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="nama_obat" id="nama_obat" class="form-control nama_obat" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            Supplier
                                        </div>
                                        <div class="col-md-3">
                                            <select type="text" name="supplier" id="supplier" class="hitung_spec form-control supplier" style="text-align:center;" readonly>
                                                <option value=""> - Pilih -</option>
                                                <?php foreach ($dtsupplier as $data) { ?>
                                                                <option value="<?= $data->id?>"> <?= $data->nama ?></option>
                                                            <?php
                                                            } ?> 
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            Stock
                                        </div>
                                        <div class="col-md-3">
                                            <input type="number" name="stock" id="stock" class="form-control stock" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            Harga
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="harga" id="harga" class="form-control harga" value="" required>
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
                                    <strong>Master Obat</strong>
                                </div>
                                <div class="table-responsive" style="max-height: 800px;">
                                    <table class="table table-striped table-bordered sticky-header">
                                        <thead>
                                            <tr style="color: black;">
                                                <th class="table-primary align-middle text-center" style="color: black" rowspan="3" width="10">&#x2714;</th>
                                                <th class="table-primary align-middle text-center">Nama Obat</th>
                                                <th class="table-primary align-middle text-center">Suppiler</th>
                                                <th class="table-primary align-middle text-center">Stock</th>
                                                <th class="table-primary align-middle text-center">Harga</th>
                                                <th class=" table-primary align-middle text-center">Last Update</th>
                                                <th class=" table-primary align-middle text-center" colspan='2'>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="dtable">
                                            <?php
                                            if (!isset($dtobat)) { ?>
                                                <tr>
                                                    <td valign="top"><input name="chk[]" type="checkbox" /></td>
                                                    <td><input type="text" name="nama_obat[]" id="nama_obat" class="form-control w-auto nama_obat" style="text-align: center;" value=""> </td>
                                                    <td><input type="text" name="supplier[]" id="supplier" class="form-control w-auto supplier" style="text-align: center;" value=""> </td>
                                                    <td><input type="number" name="stock[]" id="stock" class="form-control w-auto stock" style="text-align: center;" value=""> </td>
                                                    <td><input type="text" name="harga[]" id="harga" class="form-control w-auto harga" style="text-align: center;" value=""> </td>
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
                                                    foreach ($dtobat as $dtobat_row) {  ?>
                                                <tr>
                                                    <td valign="top"><input name="chk[]" type="checkbox" class="chk" />
                                                        <input type="hidden" name="id[]" id="id" class="id_obat" value="<?= $dtobat_row->obat_id; ?>" size="1" />
                                                    </td>
                                                    <td> <input type="text" name="nama_obat[]" id="nama_obat" class="form-control nama_obat" style="text-align: center;" value="<?= $dtobat_row->nama_obat;  ?>" readonly></td>
                                                    <td> 
                                                    <select type="text" name="supplier[]" id="supplier" class="hitung_spec form-control supplier" style="text-align:center;" disabled>
                                                            <option value="<?= $dtobat_row->supplier_id;  ?>"> <?= $dtobat_row->supplier_name;  ?></option>
                                                                    <?php foreach ($dtsupplier as $data) { ?>
                                                                                    <option value="<?= $data->id?>"> <?= $data->nama ?></option>
                                                                                <?php
                                                                                } ?> 
                                                            
                                                             </select>
                                                    </td>
                                                    <td> <input type="number" name="stock[]" id="stock" class="form-control stock" style="text-align: center;" value="<?= $dtobat_row->stock;  ?>" readonly></td>
                                                    <td> <input type="text" name="harga[]" id="harga" class="form-control harga" style="text-align: center;" value="RP <?= number_format($dtobat_row->harga, 0, ',', '.');  ?>" readonly></td>
                                                    <td> <input type="text" name="updated_by[]" id="updated_by" class="form-control updated_by" style="text-align: center;" value="<?= $dtobat_row->obat_updated_by;  ?>" readonly></td>
                                                    
                                                    <td>
                                                        <button data-supplier-id="<?= $dtobat_row->supplier_id?>" class="btn bg-gradient-info edit_button" disabled>Edit</button>
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
        $(this).closest('tr').find('.nama_obat').prop('readonly', !isChecked);
        $(this).closest('tr').find('.supplier').prop('disabled', !isChecked);
        $(this).closest('tr').find('.stock').prop('readonly', !isChecked);
        $(this).closest('tr').find('.harga').prop('readonly', !isChecked);
        $(this).closest('tr').find('.edit_button').prop('disabled', !isChecked);
        $(this).closest('tr').find('.delete_button').prop('disabled', !isChecked);
    });

    $(document).on('click', '.edit_button', function() {

        let nama_obat = $(this).closest('tr').find('.nama_obat').val();
        // let supplier_id = $(this).attr('data-supplier-id');
        let supplier_id = $(this).closest('tr').find('.supplier').val();
        let stock = $(this).closest('tr').find('.stock').val();
        let harga = $(this).closest('tr').find('.harga').val();
        let updated_by = $(this).closest('tr').find('.updated_by').val();
        let obat_id = $(this).closest('tr').find('.id_obat').val();

        if(!nama_obat){
            alert('Nama Obat Tidak Boleh Kosong')
            return 
        }
        if(stock === ''){
            alert('Stock Tidak Boleh Kosong')
            return 
        }
        console.log({harga:parseInt(harga.replace('RP ',''))});
        if(!parseInt(harga.replace('RP ',''))){
            
            alert('Harga Obat Tidak Boleh Kosong / 0')
            
            return 
        }
        

        
        
        if (id != 'undefined') {
            $.ajax({
                type: "post",
                url: "url",
                data: {
                    obat_id,
                    nama_obat,
                    supplier_id,
                    stock,
                    updated_by,
                    harga,
                },
                dataType: "json",
                url: "<?php echo base_url(); ?>index.php/master/C_obat/update",
                success: function(response) {
                    console.log(response)
                    alert(response.pesan)
                    window.location.reload();
                }
            });
        }
    })

    $(document).on('click', '.delete_button', function() {
        let obat_id = $(this).closest('tr').find('.id_obat').val();

        if (obat_id != 'undefined') {
            let confirmation = confirm("Anda Yakin Ingin Menghapus Data penting ini?");
            if (confirmation) {
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url(); ?>index.php/master/C_obat/delete",
                    data: {
                        obat_id: obat_id,
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        alert(response.pesan);
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                       console.log("An error occurred: " + error);
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
        window.location.href = "<?php echo base_url(); ?>index.php/master/C_obat/generate_pdf";
    });
</script>

<?php $this->load->view('template/footbarend'); ?>