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
                        <form action="<?php echo base_url('index.php/transaksi/C_transaksi/index/simpan') ?>" id="master_obat" name="master_obat" method="post" role="form" enctype="multipart/form-data">
                            <div class="row mb-1">
                                <div class="col-md-3 mb-5">
                                    <strong><h1>Input Pembelian</h1></strong>
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
                                            Nama
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="nama" id="nama" class="form-control nama" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            Keluhan
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="keluhan" id="keluhan" class="form-control keluhan" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            Obat
                                        </div>
                                        <div class="col-md-3">
                                            <select type="text" name="obat" id="obat" class="hitung_spec form-control select-obat" style="text-align:center;" readonly>
                                                <option  value=""> - Pilih -</option>
                                                <?php foreach ($dtobat as $data) { ?>
                                                                <option id="option-obat-<?= $data->obat_id?>" data-harga="RP <?= number_format($data->harga, 0, ',', '.');  ?>" value="<?= $data->obat_id?>"> <?= $data->nama_obat ?></option>
                                                            <?php
                                                            } ?> 
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            Pcs
                                        </div>
                                        <div class="col-md-3">
                                            <input type="number" name="pcs" id="pcs" class="form-control pcs" value="" required>
                                        </div>
                                    </div>                       
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            Harga Satuan
                                        </div>
                                        <div class="col-md-3">
                                            <input readonly type="text" name="harga_satuan" id="harga_satuan" class="form-control harga_satuan" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            Total Harga
                                        </div>
                                        <div class="col-md-3">
                                            <input readonly type="text"  name="total_harga" id="total_harga" class="form-control total_harga" value="" >
                                        </div>
                    
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            Kasir
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('template/footbar'); ?>
<script>

  
  $(document).on('change', '.select-obat',function(){
      let value = $(this).val();
      let harga = $('#option-obat-' + value).attr('data-harga')

      $('#harga_satuan').val(harga);
      console.log(value);
      console.log(harga);

  });
  $("#pcs").blur(function() {
      let pcs = $(this).val();
      let harga = $('#harga_satuan').val();
      harga = harga.replace(/[^0-9]/g, '');
      let total_harga = pcs * harga;
      total_harga = total_harga.toString()
      total_harga = total_harga.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
      $('#total_harga').val('RP ' + total_harga);
      console.log(pcs);
      console.log(harga);
      console.log(total_harga);
  })

</script>

<?php $this->load->view('template/footbarend'); ?>