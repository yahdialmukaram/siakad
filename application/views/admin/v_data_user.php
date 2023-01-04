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
						data-target="#tambah_data_account">
						Tambah Pengguna Siakad
					</button>

					<div class="x_content">

						<table id="datatable" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th style="width: 1%;">No</th>
									<th>Username</th>
									<!-- <th style="width: 11%;">Edit Password</th> -->
									<th>Email</th>
									<th style="width: 13%;">Waktu</th>
									<th>Level</th>
									<th>Opsi</th>
								</tr>
							</thead>
							<tbody id='show_data'>


							</tbody>
						</table>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>




<!-- Modal -->
<div class="modal fade" id="tambah_data_account" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna Account</h5>
			</div>
			<div class="modal-body">

				<form>

					<div class="form-group">
						<label class="control-label col-md-12 col-sm-3 col-xs-12">Username</label>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<input type="text" name="username" class="form-control" required placeholder="masukan username">
							<small style="color: red;" class="text-error username_error"></small>
						</div>
					</div>
					
					
					<div class="form-group">
						<label class="control-label col-md-12 col-sm-3 col-xs-12">Email</label>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<input type="email" name="email" class="form-control" required placeholder="masukan email">
							<small style="color: red;" class="text-error email_error"></small>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-12 col-sm-3 col-xs-12">Password</label>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<input type="password" name="password" class="form-control" required placeholder="masukan password">
							<small style="color: red;" class="text-error password_error"></small>
						</div>
					</div>

					<!-- <div class="form-group">
						<label class="control-label col-md-12 col-sm-3 col-xs-12">Waktu</label>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<input type="text" name="waktu" class="form-control" placeholder="masukan waktu">
							<small>
								<font color="red">waktu</font>
							</small>
						</div>
					</div> -->

					<div class="form-group">
						<label class="control-label col-md-12 col-sm-3 col-xs-12">Level
						</label>
						<div class="col-md-3 col-sm-9 col-xs-12">
							<!-- <input type="text" name="level"> -->
							<select name="level" id="level" class="form-control">
								<option>admin</option>
								<option>kepala sekolah</option>
								<option>guru</option>
								<option>siswa</option>
							</select>
						</div>
					</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<!-- <button class="btn btn-info" onclick="save_data_account()" class="btn btn-primary">Save</button> -->
				<button type="button" id="btn_tambah" class="btn btn-primary">Save</button>
			</div>
			</form>
		</div>
	</div>
</div>



<!-- modal konfirmasi hapus data -->
<div class="modal fade" id="konfirmasi" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<form>
				<div class="modal-header">
					<h5 class="modal-title">Konfirmasi Hapus</h5>

				</div>
				<div class="modal-body">Yakin Akan Hapus Data User ?
					<input type="" name="id" id="id" hidden>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
					<button type="button" id="btn_hapus" class="btn btn-primary">Ya</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal edit passsowd -->
<div class="modal fade" id="edit-password" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
	aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 style="text-align: center;" class="modal-title">Edit Password</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?=base_url();?>c_admin/updateUser" method="post" enctype="multipart/form-data">
					<input type="text" hidden name="id" id="id_u">

					<div class="form-group">
						<label for="">Username</label>
						<input type="text" name="username" id="username_u" class="form-control" placeholder=""
							aria-describedby="helpId">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input type="text" name="email" id="email_u" class="form-control" placeholder="" aria-describedby="helpId">
					</div>

					<div class="form-group">
						<label for="">Edit Password</label>
						<input type="password" name="password" id="password_u" class="form-control" placeholder="*******"
							aria-describedby="helpId">
					</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
				<!-- <button type="submit" class="btn btn-primary btn-sm fa fa-save"> Update</button> -->
				<button type="submit" class="btn btn-primary btn-sm fa fa-save"> Update</button>
			</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal edit  -->
<div class="modal fade" id="edit_data" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 style="text-align: center;" class="modal-title">Edit Data </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<input type="text" hidden id="id_user">

					<div class="form-group">
						<label for="">Username</label>
						<input type="text" name="username" id="username_edit" class="form-control" placeholder=""
							aria-describedby="helpId">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input type="text" name="email" id="email_edit" class="form-control" placeholder=""
							aria-describedby="helpId">
					</div>
					<!-- <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" id="nama_u" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
 -->
					<div class="form-group">
						<label for="">Password</label>
						<input type="password" name="password" id="password_edit" class="form-control" placeholder="*******"
							aria-describedby="helpId">
					</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary btn_update btn-sm fa fa-save"> Update</button>
			</div>
			</form>
		</div>
	</div>
</div>


<script type='text/javascript'>
	$(document).ready(function () {

		tampil_data();
		// $('#dataTable').dataTable();
		// Menampilkan Data di tabel
		function tampil_data() {
			$.ajax({
				type: "POST",
				url: "<?=base_url();?>c_admin/getDataUser",
				async:false,
				dataType: "json",
				success: function (response) {
					console.log(response);
					var i;
					var no = 0;
					var html = '';
					for (i = 0; i < response.length; i++) {
						no++;
						html = html + '<tr>' +
							'<td>' + no + '</td>' +
							'<td>' + response[i].username + '</td>' +
							'<td>' + response[i].email + '</td>' +
							'<td>' + response[i].waktu + '</td>' +
							'<td>' + response[i].level + '</td>' +
							'<td style="width: 16.66%;">' + '<span><button data-id="' + response[i].id_user +
							'" class="btn btn-primary fa fa-edit btn_edit"> Edit </button><button style="margin-left: 5px;" data-id="' +
							response[i].id_user + '"  class="btn btn-danger fa fa-trash konfirmasi_hapus"> Hapus </button></span>' + '</td>' +
							'</tr>';
					}
					$('#show_data').html(html);

				}
			});
		}
		
	$('#btn_tambah').on('click', function () {
		// e.preventDefault();

		var username = $('input[name="username"]').val();
		var email = $('input[name="email"]').val();
		var password = $('input[name="password"]').val();
		var waktu = $('input[name="waktu"]').val();
		var level = $('select[name="level"]').val();

		// $('#tambah_data').modal('show');
		$.ajax({
			type: "post",
			url: "<?=base_url();?>c_admin/addUser",
			data: {
				username: username,
				email: email,
				password: password,
				waktu: waktu,
				level: level
			},
			dataType: "json",
			success: function (response) {
				console.log(response);
				if (response.status=='validation_error') {
					$('.username_error').text(response.errors.username);
					$('.email_error').text(response.errors.email);
					$('.password_error').text(response.errors.password);
					
				}else{
					$('#tambah_data_account').modal('hide');
					swal({
								title:'Berhasil',
								text:'data jurusan berhasil di tambah',
								icon:'success',
								button:'ok'
							});
						}

				tampil_data();
				$('input[name="username"]').val("");
				$('input[name="email"]').val("");
				$('input[name="password"]').val("");
				$('#level').val("");
				$('select[name="level"]').val("");
				
			}
		});

	})
	
	// edit
		$('#show_data').on('click', '.btn_edit', function () {
			var id_user = $(this).attr('data-id');
	
			$.ajax({
				type: "post",
				url: "<?=base_url();?>c_admin/editUser",
				data: {
					id_user: id_user
				},
				dataType: "json",
				success: function (response) {
					console.log(response);
					$('#edit_data').modal('show');
	
					$('#id_user').val(id_user);
					$('#username_edit').val(response[0].username);
					$('#email_edit').val(response[0].email);
					// $('#password_edit').val(response[0].password);
	
	
				}
			});
			
		})
		// update
		$('.btn_update').on('click', function () {
				var username = $('#username_edit').val();
				var email = $('#email_edit').val();
				var password = $('#password_edit').val();
				var id_user = $('#id_user').val();

				$.ajax({
					type: "post",
					url: "<?=base_url();?>c_admin/updateUser",
					data: {
							username: username,
							email: email,
							password: password,
							id_user: id_user
						},
					dataType: "json",
					success: function (response) {
						console.log(response);
						swal({
								title:'Berhasil Update',
								text:'data user berhasil update',
								icon:'success',
								button:'ok'
							})
						$('#username_edit').val('');
						$('#email_edit').val('');
						$('#password_edit').val('');
						$('#edit_data').modal('hide');
						tampil_data();
					}
				});
			  })
		

// delete
		$('#show_data').on('click','.konfirmasi_hapus', function () {
			var id_user = $(this).attr('data-id');
			$('#konfirmasi').modal('show');
			$('input[name="id"]').val(id_user);
		  
		});

		  $('#btn_hapus').on('click', function(e){
			e.preventDefault();

			var id_user =$('#id').val(); 
			$.ajax({
				  type: "POST",
				  url: "<?=base_url();?>c_admin/deleteUser",
				  data: {id_user:id_user},
				  dataType: "json",
				  success: function (response) {
					  swal({
								  title:'Berhasil Delete',
								  text:'delete ok',
								  icon:'success',
								  button:'ok'
							  })
					//   console.log(response);
					$('#konfirmasi').modal('hide');
					tampil_data();
				  }
			  });
		  })


		

	})

	// function save_data_account()
	// {
	// 	var username = $('input[name="username"]').val();
	// 	var email = $('input[name="email"]').val();
	// 	var password = $('input[name="password"]').val();
	// 	var waktu = $('input[name="waktu"]').val();
	// 	// var level = $('input[name="level"]').val();

	// 	// $('#tambah_data').modal('show');
	// 	$.ajax({
	// 		type: "post",
	// 		url: "<?=base_url();?>c_admin/addUser",
	// 		data: {username:username, email:email, password:password, waktu:waktu},
	// 		dataType: "json",
	// 		success: function (response) {
	// 			console.log(response);
	// 			$('input[name="username"]').val("");
	// 			$('input[name="email"]').val("");
	// 			$('input[name="password"]').val("");
	// 			$('input[name="waktu"]').val("");
	// 			// $('input[name="level"]').val("");
	// 			$('#tambah_data_account').modal('hide');

	// 			tampil_data();
	// 		}
	// 	});
	// }

	// function deleteUser()
	// {
	// 	var id_user = $(this).attr('data-id');
	// 	$('#id').val(id_user);
	// 	$('#konfirmasi').modal('show');
	// }

// 	function deleteUser(id){
//   $("#id").val(id);
//   $("#konfirmasi").modal("show");
// }


// </script>


<!-- 
<script>
    $('.edit-password').on('click', function(e) {

        e.preventDefault();

        $('#edit-password').modal();
        let id = $(this).data('id')
        $.ajax({
            type: "POST",
            url: "<?=base_url('c_admin/getDataPassword')?>",
            data: {
                id: id
            },
            dataType: "JSON",
            success: function(response) {
                console.log(response);
                $('#id').attr('hidden', true);
                $('input[name=id]').val(response.id_user);
                $('#username_u').val(response.username);
                $('#email_u').val(response.email);
                $('#edit-password').modal('show');
            }
        });

    })
</script>

<script>
function deleteUser(id){
  $("#id").val(id);
  $("#konfirmasi").modal("show");
}
</script> -->
