$(document).ready(function () {
    $("#tgl_sewa").change(function () {
        var selectedTanggalSewa = $(this).val();
    
        var currentTanggalPengembalian = $("#tgl_pengembalian").val();
    
        if (currentTanggalPengembalian <= selectedTanggalSewa) {
            var nextDay = new Date(selectedTanggalSewa);
            nextDay.setDate(nextDay.getDate() + 1);
    
            $("#tgl_pengembalian").val(nextDay.toISOString().split('T')[0]).change();
        }

        $("#tgl_pengembalian").attr('min', nextDay.toISOString().split('T')[0]);
    });

    let body = document.querySelector('body');

    $('.button').on('click', function (event) {
        event.preventDefault();

        if (!userLoggedIn) {
            Swal.fire({
                text: 'Silakan login terlebih dahulu!',
                icon: 'warning'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/login';
                }
            });
        } else {
            body.classList.add('active');
        }
    });

    $('.book-now').on('click', function (event) {
        event.preventDefault();

        if (document.querySelector('form').checkValidity()) {
            Swal.fire({
                title: 'Confirmation',
                text: 'Confirm Booking?',
                icon: 'info',
                showCancelButton: true,
            }).then((result) => {
                if (result.value) {
                    document.querySelector('form').submit();
                }
            });
        } else {
            Swal.fire({
                title: 'Error',
                text: 'Tolong lengkapi semua data.',
                icon: 'error'
            });
        }
    });

    $('.closeReservasi').on('click', function () {
        body.classList.remove('active');
    });

    const revealCard = document.getElementsByClassName('reveal-card');
    const showFrontCardButton = document.getElementsByClassName("showFrontCardButton");

    for (let rCard of revealCard) {
        rCard.addEventListener("click", function () {
            let card = rCard.parentElement;
            if (!card.classList.contains("revealed")) {
                card.classList.add("revealed");
            }
        });
    }

    for (let showFront of showFrontCardButton) {
        showFront.addEventListener("click", function () {
            let card = showFront.parentElement.parentElement;
            if (card.classList.contains("revealed")) {
                card.classList.remove("revealed");
            }
        });
    }
});
