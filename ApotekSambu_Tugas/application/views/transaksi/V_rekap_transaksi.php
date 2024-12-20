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
                        <div class="row mb-1">
                            <div class="col-md-12">
                                <div class="col-md-3 mb-5 d-flex justify-content-center">
                                    <strong><h4>Rekap Transaksi</h4></strong>
                                </div>
                                <div class="table-responsive" style="max-height: 800px;">
                                    <table class="table table-striped table-bordered sticky-header">
                                        <thead>
                                            <tr style="color: black;">
                                                
                                                <th class="table-primary align-middle text-center">Nama</th>
                                                <th class="table-primary align-middle text-center">Keluhan</th>
                                                <th class="table-primary align-middle text-center">Tanggal</th>
                                                <!-- <th class="table-primary align-middle text-center">Obat</th>
                                                <th class="table-primary align-middle text-center">Pcs</th>
                                                <th class="table-primary align-middle text-center">Harga Satuan</th>
                                                <th class="table-primary align-middle text-center">Total Harga</th>
                                                <th class="table-primary align-middle text-center">Kasir</th> -->
                                                <th class="table-primary align-middle text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="dtable" class="table-hover-animation">
                                            <?php
                                            if (!isset($dtrekap_transaksi))  {; ?>
                                                <tr>
                                                    <td><input readonly type="text" name="nama[]" id="nama" class="form-control w-auto nama" style="text-align: center;" value=""> </td>
                                                    <td><input readonly type="text" name="keluhan[]" id="keluhan" class="form-control w-auto keluhan" style="text-align: center;" value=""> </td>
                                                    <td><input readonly type="text" name="obat[]" id="email" class="form-control w-auto email" style="text-align: center;" value=""> </td>
                                                    <td><input readonly type="text" name="pcs[]" id="pcs" class="form-control w-auto pcs" style="text-align: center;" value=""> </td>
                                                    <td><input readonly type="text" name="harga_satuan[]" id="harga_satuan" class="form-control w-auto harga_satuan" style="text-align: center;" value=""> </td>
                                                    <td><input readonly type="text" name="total_harga[]" id="total_harga" class="form-control w-auto total_harga" style="text-align: center;" value=""> </td>
                                                    <td><input readonly type="text" name="updated_by[]" id="updated_by" class="form-control w-auto updated_by" style="text-align: center;" value=""> </td>
                                                    
                                                <tr>
                                                    <?php
                                                } else {
                                                    $no = 1;
                                                    foreach ($dtrekap_transaksi as $data) { ?>
                                                <tr>
                                            
                                                    <td> <input readonly type="text" transksi-id="<?= $data->transaksi_id; ?>" name="nama" id="nama" class="form-control nama" style="text-align: center;" value="<?= $data->pasien_nama;  ?>" readonly></td>
                                                    <td> <input readonly type="text" name="keluhan" id="keluhan" class="form-control keluhan" style="text-align: center;" value="<?= $data->keluhan;  ?>" readonly></td>
                                                    <td> <input readonly type="text" name="create_at" id="create_at" class="form-control create_at" style="text-align: center;" value="<?= $data->create_at;  ?>" readonly></td>
                                                    <!-- <td> <input type="text" name="obat_transaksi" id="obat_transaksi" class="form-control obat_transaksi" style="text-align: center;" value="<?= $data->nama_obat;  ?>" readonly></td>
                                                    <td> <input type="text" name="pcs" id="pcs" class="form-control pcs" style="text-align: center;" value="<?= $data->pcs;  ?>" readonly></td>
                                                    <td> <input type="text" name="harga_satuan" id="harga_satuan" class="form-control harga_satuan" style="text-align: center;" value="RP <?= number_format($data->harga_satuan, 0, ',', '.');  ?>" readonly></td>
                                                    <td> <input type="text" name="total_harga" id="total_harga" class="form-control total_harga" style="text-align: center;" value="RP <?= number_format($data->total_harga, 0, ',', '.');  ?>" readonly></td>
                                                    <td> <input type="text" name="updated_by" id="updated_by" class="form-control updated_by" style="text-align: center;" value="<?= $data->transaksi_updated_by;  ?>" readonly></td> -->
                                                    <td>
                                                       
                                                        <div align="center">
                                                            <button  class="btn bg-gradient-success" id="btn_struk"><i class="feather icon-download"></i>Cetak Struk</button>
                                                        </div>
                                                        
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
     

     $(document).on('click', '#btn_export', function() {
        window.location.href = "<?php echo base_url(); ?>index.php/transaksi/C_rekap_transaksi/generate_pdf_rekap_transaksi";
    });
     $(document).on('click', '#btn_struk', function() {

        let id = $(this).closest('tr').find('.nama').attr('transksi-id');
        window.location.href = "<?php echo base_url(); ?>index.php/transaksi/C_rekap_transaksi/generate_pdf_struk?id=" + id;
    });
</script>

<?php $this->load->view('template/footbarend'); ?>