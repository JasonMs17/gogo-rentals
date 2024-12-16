document.addEventListener('DOMContentLoaded', function () {
    const fileDropArea = document.getElementById('fileDropArea');
    const fileInput = document.getElementById('gambar');
    const selectedFileName = document.getElementById('selectedFileName');
    const removeFileBtn = document.getElementById('removeFileBtn');

    let isImageRemoved = false;

    fileDropArea.addEventListener('dragover', function (e) {
        e.preventDefault();
        fileDropArea.classList.add('drag-over');
    });

    fileDropArea.addEventListener('dragleave', function () {
        fileDropArea.classList.remove('drag-over');
    });

    fileDropArea.addEventListener('drop', function (e) {
        e.preventDefault();
        fileDropArea.classList.remove('drag-over');
        const files = e.dataTransfer.files;
        handleFile(files[0]);
    });

    fileInput.addEventListener('change', function (e) {
        const files = e.target.files;
        handleFile(files[0]);
    });

    removeFileBtn.addEventListener('click', function (e) {
        e.stopPropagation();
        fileInput.value = '';
        selectedFileName.textContent = '';
        fileDropArea.classList.remove('file-selected');
        removeFileBtn.style.display = 'none';

        isImageRemoved = true;
        document.getElementById('isImageRemovedInput').value = '1';
    });

    fileDropArea.addEventListener('click', function () {
        fileInput.click();
    });

    function handleFile(file) {
        selectedFileName.textContent = file.name;
        fileDropArea.classList.add('file-selected');
        removeFileBtn.style.display = 'inline-block';

        isImageRemoved = false;
        document.getElementById('isImageRemovedInput').value = '0';

        const fileList = new DataTransfer();
        fileList.items.add(file);
        fileInput.files = fileList.files;
    }

    //form
    let body = document.querySelector('body');
    let close = document.querySelector('.close');
    let form = document.getElementById('form');

    body.addEventListener('click', function (event) {
        if (event.target.classList.contains('add-button')) {
            form.action = '/admin/kendaraan/saveKendaraan';
            showPopup('Tambah');
        } else if (event.target.closest('.edit-button')) {
            event.preventDefault();
            let editButton = event.target.closest('.edit-button');
            let id = editButton.dataset.id;
            form.action = '/admin/kendaraan/updateKendaraan/' + id;
            showPopup('Edit', id);
        }
    });

    close.addEventListener('click', () => {
        body.classList.remove('active');
    });

    function showPopup(action, id = null) {
        let popupTitle = document.getElementById('popupTitle');
        let submitButton = document.getElementById('submitButton');
        let editIdInput = document.getElementById('editId');
        let fileInput = document.getElementById('gambar');
        let fileDropArea = document.getElementById('fileDropArea');
        let selectedFileName = document.getElementById('selectedFileName');
        let removeFileBtn = document.getElementById('removeFileBtn');

        if (action === 'Tambah') {
            popupTitle.innerText = 'Tambah Data Kendaraan';
            submitButton.innerText = 'Tambah';

            document.getElementById('kode_kategori').value = "";
            document.getElementById('merk_kendaraan').value = "";
            document.getElementById('varian').value = "";
            document.getElementById('kapasitas_penumpang').value = "";
            document.getElementById('tahun_produksi').value = "";
            document.getElementById('nomor_polisi').value = "";
            document.getElementById('harga_sewa').value = "";
            document.getElementById('gambar').value = "";
            selectedFileName.textContent = '';
            removeFileBtn.style.display = 'none';

        } else if (action === 'Edit' && id !== null) {
            fetch(`/edit/` + id)
                .then(response => response.json())
                .then(data => {
                    // console.log(data);
                    popupTitle.innerText = 'Edit Data Kendaraan';
                    submitButton.innerText = 'Update';
                    editIdInput.value = id;

                    document.getElementById('kode_kategori').value = data.kode_kategori;
                    document.getElementById('merk_kendaraan').value = data.merk_kendaraan;
                    document.getElementById('varian').value = data.varian;
                    document.getElementById('kapasitas_penumpang').value = data.kapasitas_penumpang;
                    document.getElementById('tahun_produksi').value = data.tahun_produksi;
                    document.getElementById('nomor_polisi').value = data.nomor_polisi;
                    document.getElementById('harga_sewa').value = data.harga_sewa;

                    selectedFileName.textContent = '';

                    if (data.gambar) {
                        selectedFileName.textContent = data.gambar;
                        fileDropArea.classList.add('file-selected');
                        isImageRemoved = false;
                        removeFileBtn.style.display = 'inline-block';
                    } else {
                        removeFileBtn.style.display = 'none';
                        isImageRemoved = true;
                    }

                    body.classList.add('active');
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        body.classList.add('active');
    }
});

$(document).on('click', '.delete-button', function (event) {
    event.preventDefault();

    Swal.fire({
        title: 'Confirmation',
        text: 'Confirm Delete?',
        icon: 'warning',
        showCancelButton: true,
    }).then((result) => {
        if (result.value) {
            window.location.href = $(this).attr('href');
        }
    });
});