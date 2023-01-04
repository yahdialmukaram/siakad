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
						Tambah Jurusan
					</button>

					<div class="x_content">

						<table id="datatable" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th style="width: 1%;">No</th>
									<th style="width: 13%;">Kode Jurusan</th>
									<th>Nama Jurusan</th>
									<th>Opsi</th>
								</tr>
							</thead>
							<tbody id='show_jurusan'>
								

							</tbody>
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
						<h5 class="modal-title">Tambah Jurusan</h5>
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
	$(document).ready(function () {

		tampilJurusan();
		// $('#datatable').dataTable();
		

		function tampilJurusan() {
			$.ajax({
				type: "post",
				url: "<?=base_url();?>c_admin/getJurusan",
				async : false,  //async jangan lupa untuk datatable
				dataType: "json",
				success: function (response) {
					console.log(response);
					var i;
					var nomor = 0;
					var iniTable = '';
					for (i = 0; i < response.length; i++) {
						nomor++;
						iniTable = iniTable + '<tr>' +
							'<td>' + nomor + '</td>' +
							'<td>' + response[i].kode_jurusan + '</td>' +
							'<td>' + response[i].nama_jurusan + '</td>' +
							'<td style="width: 16.66%;">' + '<span><button data-id="' + response[i]
							.id_jurusan +
							'" class="btn btn-primary fa fa-edit btn_edit"> Edit</button><button style="margin-left: 5px;" data-id="' +
							response[i].id_jurusan +
							'" class="btn btn-danger fa fa-trash konfirmasi_hapus"> Hapus</button></span>' + '</td>' +
							'</tr>';
					}
					$('#show_jurusan').html(iniTable);

				}

			});
		}
		
			// save jurusan 
		$('.btn_save').on('click', function(){
		
				var kode_jurusan = $('input[name="kode_jurusan"]').val();
				var nama_jurusan = $('input[name="nama_jurusan"]').val();
				$.ajax({
					type: "post",
					url: "<?=base_url();?>c_admin/addJurusan",
					data: {kode_jurusan:kode_jurusan, nama_jurusan:nama_jurusan},
					// data:{kode_jurusan}
					dataType: "json",
					success: function (response) {
						console.log(response);
						// $('#pesan').html(response.pesan);
						if (response.status=='validation_error') {
							$('.kode_error').text(response.errors.kode_jurusan);
							$('.jurusan_error').text(response.errors.nama_jurusan);
						}else{
							$('#tambah_jurusan').modal('hide');

							swal({
								title:'Berhasil',
								text:'data jurusan berhasil di tambah',
								icon:'success',
								button:'ok'
							})

							tampilJurusan();
							$('[name="kode_jurusan"]').val(''); //untuk mhilangakaanisi form stelah tambah berhasil
							$('[name="nama_jurusan"]').val('');
						}
				
					},
					error: function () {
				swal({
					title: "Gagal!",
					text: "Data Gagal Diperbarui",
					icon: "error",
					button: "Ok",
				});
			}
				});
			
		})

		$('#show_jurusan').on('click','.konfirmasi_hapus', function(){
			var id_jurusan = $(this).attr('data-id');
			$('#konfirmasi').modal('show');
			$('input[name="id_jurusan"]').val(id_jurusan);
			$('#id').attr('hidden', true);
			
		});
		$('#btn_hapus').on('click', function(e){
			e.preventDefault();
			
			var id_jurusan= $('#id').val();
			$.ajax({
				type: "POST",
				url: "<?=base_url();?>c_admin/deleteJurusan",
				data: {id_jurusan:id_jurusan},
				dataType: "json",
				success: function (response) {
					swal({
								  title:'Berhasil Delete',
								  text:'delete ok',
								  icon:'success',
								  button:'ok'
							  })
					$('#konfirmasi').modal('hide');
					tampilJurusan();
					
				}
			 });
		})

		$('#show_jurusan').on('click','.btn_edit', function(){
			let id_jurusan = $(this).attr('data-id');
			$('#edit_jurusan').modal('show');

			$.ajax({
				type: "post",
				url: "<?=base_url();?>c_admin/editjurusan",
				data: {id_jurusan:id_jurusan},
				dataType: "json",
				success: function (response) {
					// console.log(response);
					$('#id_jurusan').attr('hidden', true);
					$('#id_jurusan').val(id_jurusan);
					$('#kode_jurusan_edit').val(response[0].kode_jurusan);
					$('#nama_jurusan_edit').val(response[0].nama_jurusan);
				}
			});

		})

		$('.btn_update').on('click', function (e) { 
			e.preventDefault();
			let id_jurusan = $('#id_jurusan').val();
			let kode_jurusan = $('#kode_jurusan_edit').val();
			let nama_jurusan = $('#nama_jurusan_edit').val();

			$.ajax({
				type: "post",
				url: "<?=base_url()?>c_admin/updateJurusan",
				data: {
					  id_jurusan:id_jurusan,
					  kode_jurusan:kode_jurusan,
					  nama_jurusan:nama_jurusan
				},
				dataType: "json",
				success: function (response) {
					console.log(response);
					swal({
								title:'Berhasil Update',
								text:'data jurusan berhasil update',
								icon:'success',
								button:'ok'
							})
					$('#kode_jurusan_edit').val('');
					$('#nama_jurusan_edit').val('');
					$('#edit_jurusan').modal('hide');

					tampilJurusan();

					
				}
			});
		 })

		
		
	})

</script>
