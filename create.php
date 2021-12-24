<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<?php $this->load->view("admin/_partials/css.php"); ?>

</head>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		<!-- Topbar -->
		<?php $this->load->view("admin/_partials/topbar.php"); ?>
		<!-- End of Topbar -->

		<!-- Sidebar -->
		<?php $this->load->view("admin/_partials/sidebar.php"); ?>
		<!-- End of Sidebar -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->

			<!-- Main content -->
			<!-- Main content -->
			<section class="content">
				<div class="row ml-5">
					<!-- left column -->
					<div class="col-md-12">
						<!-- general form elements -->
						<div class="box box-primary">
							<div class="box-header with-border">

								<div class="col-auto pull-right">
									<a href="<?php echo site_url('master_data/rute_kereta') ?>"
										class="btn btn-sm btn-primary btn-icon-split">
										<span class="icon"><i class="fa fa-arrow-left"></i></span>
										<span class="text">Kembali</span>
									</a>
								</div>

								<h3 class="box-title">Tambah Data Rute Kereta</h3>
							</div>
							<!-- /.box-header -->
							<!-- form start -->
							<form role="form" method="POST" action="<?=base_url();?>master_data/create_rute_kereta"
								enctype="multipart/form-data">

								<div class="row">
									<div class="col-md-6">
										<?= $this->session->flashdata('add'); ?>
									</div>
								</div>

								<div class="box-body">
									<div class="row">
										<div class="col-12">
											<div class="col-md-2">
												<div class="form-group">
													<label for="asal"></label>
													<input type="text" class="form-control"
														style="border: none; font-weight:bold;" value="Asal" id="asal"
														placeholder="Rute Kereta">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="rute_asal">Rute Kereta</label>
													<input type="text" class="form-control" name="rute_asal"
														id="rute_asal" placeholder="Rute Kereta">
													<small
														class="text-danger"><?php echo form_error('rute_asal') ?></small>
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label for="kode_asal">Kode Rute</label>
													<input type="text" class="form-control" name="kode_asal"
														id="kode_asal" placeholder="Kode Rute">
													<small
														class="text-danger"><?php echo form_error('kode_asal') ?></small>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<div class="col-md-2">
												<div class="form-group">
													<label for="Tujuan"></label>
													<input type="text" class="form-control"
														style="border: none; font-weight:bold;" value="Tujuan" id="Tujuan">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="rute_tujuan">Rute Kereta</label>
													<input type="text" class="form-control" name="rute_tujuan"
														id="rute_tujuan" placeholder="Rute Kereta">
													<small
														class="text-danger"><?php echo form_error('rute_tujuan') ?></small>
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<label for="kode_tujuan">Kode Rute</label>
													<input type="text" class="form-control" name="kode_tujuan"
														id="kode_tujuan" placeholder="Kode Rute">
													<small
														class="text-danger"><?php echo form_error('kode_tujuan') ?></small>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<div class="col-md-2">
												<div class="form-group">
													<label for="Kelas-kereta"></label>
													<input type="text" class="form-control"
														style="border: none; font-weight:bold;" value="Kelas Kereta"
														id="Kelas-kereta" >
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="kelas-kereta">Kelas Kereta</label>
													<select name="kelas_kereta" id="kelas-kereta" class="form-control">
														<?php foreach($kelas_kereta as $data_kelas_kereta): ?>
														<option value="<?= $data_kelas_kereta->id_kelas; ?>">
															<?=$data_kelas_kereta->kls_kereta; ?></option>
														<?php endforeach; ?>
													</select>
												</div>
												<small class="text-danger"><?php echo form_error('kelas_kereta') ?></small>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<div class="col-md-2">
												<div class="form-group">
													<label for="Tarif"></label>
													<input type="text" class="form-control"
														style="border: none; font-weight:bold;" value="Tarif"
														id="Tarif" >
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="tarif">Tarif</label>
													<input type="number" class="form-control" name="tarif"
														id="tarif" placeholder="Tarif Rute">
													<small class="text-danger"><?php echo form_error('tarif') ?></small>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /.box-body -->

								<div class="box-footer ">
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>
			<!-- /.box -->
			<!-- /.box -->
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
		<!-- /.control-sidebar -->
		<!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
		<div class="control-sidebar-bg"></div>
	</div>
	<!-- ./wrapper -->

	<!-- JS -->
	<?php  $this->load->view("admin/_partials/js.php"); ?>

</body>

</html>
