<div class="right_col" role="main">
	<div class="">
		<div class="page-title">



		</div>

		<div class="clearfix"></div>

		<!-- alert simpan data -->
		<?php if ($this->session->flashdata('success')):?>
		<div id="pesan" class="alert alert-success" role="alert">
			<strong><?=$this->session->flashdata('success');?></strong>
		</div>
		<?php endif;?>
		<!-- aler hapus data -->
		<?php if ($this->session->flashdata('error')):?>
		<div id="pesan" class="alert alert-danger" role="alert">
			<strong><?=$this->session->flashdata('error');?></strong>
		</div>
		<?php endif; ?>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Data User</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>

							<li><a class="close-link"><i class="fa fa-close"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>

					<!-- <button type="button" id="tambah_data_user" class="btn btn-primary fa fa-plus " data-toggle="modal"
                    data-target="#tambah_data_user">
                    Tambah Pengguna Siakad
                  </button> -->


					<!-- Button trigger modal -->
					<button type="button" class="btn btn-primary fa fa-plus" data-toggle="modal"
						data-target="#tambah_jurusan">
						Tambah Guru
					</button>

					<div class="x_content">

						<table id="datatable" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th style="width: 1%;">No</th>
									<th style="width: 13%;">Nama Guru</th>
									<th>Alamat Guru</th>
									<th>Tanggal Lahir</th>
									<th>Jenis Kelamin</th>
									<th>Opsi</th>
								</tr>
							</thead>
							<tbody>
				
							</tbody>
							<tfoot>
								<tr>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>


<!-- Modal tambah data jurusan-->
<div class="modal fade" id="tambah_jurusan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
				<div class="modal-header">
						<h5 class="modal-title">Tambah Guru</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
					</div>
			<div class="modal-body">
				<form action="">
				<!-- <center> <font color='reed'></font><p id='pesan'></p></center>	 -->
					<div class="form-group">
						<label for="">kode jurusan</label>
						<input type="text" name="kode_jurusan" class="form-control"></input>
						<small style="color: red;" class="text-error kode_error"></small>
					</div>
					<div class="form-group">
						<label for="">nama jurusan</label>
						<input type="text" name="nama_jurusan" class="form-control"></input>
						<small style="color: red;" class="text-error jurusan_error"></small>
					</div>
				</form>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button"  class="btn btn-primary btn_save ">Save</button>
			</div>
		</div>
	</div>
</div>

<!-- modal hapus -->

<!-- modal konfirmasi hapus data -->
<div class="modal fade" id="konfirmasi" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<form>
				<div class="modal-header">
					<h5 class="modal-title">Konfirmasi Hapus</h5>
				</div>
				<div class="modal-body">Yakin Akan Hapus Data User ?
					<input type="text" name="id_jurusan" id="id">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
					<button type="button" id="btn_hapus" class="btn btn-primary">Ya</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- modal edit -->

<!-- Modal -->
<div class="modal fade" id="edit_jurusan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
				<div class="modal-header">
						<h5 class="modal-title">Edit Jurusan</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
					</div>
					<div class="modal-body">
				<form action="">
					<input type="text" id="id_jurusan">

				<!-- </div> -->
				<div class="form-group">
						<label for="">Kode Jurusan</label>
						<input type="text" name="kode_jurusan" id="kode_jurusan_edit" class="form-control" placeholder=""
							aria-describedby="helpId">
					</div>
						<label for="">Nama Jurusan</label>
						<input type="text" name="nama_jurusan" id="nama_jurusan_edit" class="form-control" placeholder=""
							aria-describedby="helpId">
					</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary btn_update">Update</button>
				</div>
			</form>
		</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var table;
	$(document).ready(function () {
		table = $('#datatable').DataTable({
			'processing':true,
			'serverSide':true,
			'order':[],
			'ajax':{
				"url":"<?=base_url();?>c_admin/getGuru",
				"type":"POST"
			},
			'colomDefs':[
				{
					"targets":[0],
					"orderable": false,
				},
			],
			// "colomDefs" : [ {
            //         "data" : "id_guru"
            //     }, {
            //         "data" : "nama_guru"
            //     }, {
            //         "data" : "alamat_guru"
            //     }, {
            //         "data" : "tgl_lahir_guru"
            //     }, {
            //         "data" : "jenis_kelamin_guru"
            //     }, 
			// ],

		})
	  })


</script>
