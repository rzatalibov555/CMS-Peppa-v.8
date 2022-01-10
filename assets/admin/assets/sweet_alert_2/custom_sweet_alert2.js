$(document).ready(function(){

    $(".button_remove").click(function(){
        // e.preventDefault();    // href-e getmemesi ucun.

        $data_url = $(this).data("url");

        Swal.fire({
            title: 'Silmək istədiyinizə əminsiniz?',
            text: "Siləcəyiniz məlumatı bərpa edə bilməyəcəksiniz!",
            icon: 'Diqqət!',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Bəli, sil!',
            cancelButtonText: 'Xeyr, silmə',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = $data_url;
            }
        })
    })


    // Swal.fire({
    //     title: 'Error!',
    //     text: 'Do you want to continue',
    //     icon: 'error',
    //     confirmButtonText: 'Cool'
    // })





})