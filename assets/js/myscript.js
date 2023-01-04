const flashdata = $('.flash-data').data('flashdata');
// console.log(flashdata);
if (flashdata == 'success') {
    Swal.fire(
        'Save success!',
        'Data di simpan !',
        'success'
    )

}


// tombol hapus 
$('.tombol-hapus').on('click', function(e) {

    e.preventDefault(); //mematikan fungsi href hapus

    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah ada yakin?',
        text: "Hapus data user !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes !'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
            document.location.href = href; //mengembalikan ke location href
        }
    })

});

// tombol hapus 


// tombol edit 
// $('.edit-barang').on('click', function(e) {

//     e.preventDefault(); //mematikan fungsi href hapus

//     const href = $(this).attr('href');

//     Swal.fire(
//         'update success!',
//         'Data di simpan !',
//         'success'
//     )

// });