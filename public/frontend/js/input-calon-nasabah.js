document.addEventListener('DOMContentLoaded', function () {
    const token = localStorage.getItem('token');
    const form = document.getElementById('inputForm');
    const provinsiSelect = document.getElementById('provinsi');
    const kabKotaSelect = document.getElementById('kab_kota');
    const kecamatanSelect = document.getElementById('kecamatan');
    const kelurahanSelect = document.getElementById('kelurahan');
    const pekerjaanSelect = document.getElementById('pekerjaan');
    const nominalSetorInput = document.getElementById('nominal_setor');
    const cancelBtn = document.getElementById('cancelBtn'); // Select the Cancel button

    if (!token) {
        window.location.href = 'index.html';
        return;
    }

    // Populate Pekerjaan dropdown
    fetch('http://localhost:8000/api/pekerjaan', {
        headers: { 'Authorization': `Bearer ${token}` }
    })
        .then(response => response.json())
        .then(data => {
            data.forEach(pekerjaan => {
                const option = document.createElement('option');
                option.value = pekerjaan.id;
                option.textContent = pekerjaan.nama_pekerjaan;
                pekerjaanSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error:', error));

    // Populate Provinsi dropdown
    fetch('http://localhost:8000/api/provinsi', {
        headers: { 'Authorization': `Bearer ${token}` }
    })
        .then(response => response.json())
        .then(data => {
            data.forEach(provinsi => {
                const option = document.createElement('option');
                option.value = provinsi.id;
                option.textContent = provinsi.nama_provinsi;
                provinsiSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error:', error));

    provinsiSelect.addEventListener('change', function () {
        const provinsiId = this.value;

        // Clear previous options
        kabKotaSelect.innerHTML = '<option value="" disabled selected>Select Kabupaten/Kota</option>';
        kecamatanSelect.innerHTML = '<option value="" disabled selected>Select Kecamatan</option>';
        kelurahanSelect.innerHTML = '<option value="" disabled selected>Select Kelurahan</option>';
        kabKotaSelect.disabled = true;
        kecamatanSelect.disabled = true;
        kelurahanSelect.disabled = true;

        if (provinsiId) {
            fetch(`http://localhost:8000/api/kab-kota/provinsi/${provinsiId}`, {
                headers: { 'Authorization': `Bearer ${token}` }
            })
                .then(response => response.json())
                .then(data => {
                    data.forEach(kabKota => {
                        const option = document.createElement('option');
                        option.value = kabKota.id;
                        option.textContent = kabKota.nama_kab_kota;
                        kabKotaSelect.appendChild(option);
                    });
                    kabKotaSelect.disabled = false;
                })
                .catch(error => console.error('Error:', error));
        }
    });

    kabKotaSelect.addEventListener('change', function () {
        const kabKotaId = this.value;

        // Clear previous options
        kecamatanSelect.innerHTML = '<option value="" disabled selected>Select Kecamatan</option>';
        kelurahanSelect.innerHTML = '<option value="" disabled selected>Select Kelurahan</option>';
        kecamatanSelect.disabled = true;
        kelurahanSelect.disabled = true;

        if (kabKotaId) {
            fetch(`http://localhost:8000/api/kecamatan/kab-kota/${kabKotaId}`, {
                headers: { 'Authorization': `Bearer ${token}` }
            })
                .then(response => response.json())
                .then(data => {
                    data.forEach(kecamatan => {
                        const option = document.createElement('option');
                        option.value = kecamatan.id;
                        option.textContent = kecamatan.nama_kecamatan;
                        kecamatanSelect.appendChild(option);
                    });
                    kecamatanSelect.disabled = false;
                })
                .catch(error => console.error('Error:', error));
        }
    });

    kecamatanSelect.addEventListener('change', function () {
        const kecamatanId = this.value;

        // Clear previous options
        kelurahanSelect.innerHTML = '<option value="" disabled selected>Select Kelurahan</option>';
        kelurahanSelect.disabled = true;

        if (kecamatanId) {
            fetch(`http://localhost:8000/api/kelurahan/kecamatan/${kecamatanId}`, {
                headers: { 'Authorization': `Bearer ${token}` }
            })
                .then(response => response.json())
                .then(data => {
                    data.forEach(kelurahan => {
                        const option = document.createElement('option');
                        option.value = kelurahan.id;
                        option.textContent = kelurahan.nama_kelurahan;
                        kelurahanSelect.appendChild(option);
                    });
                    kelurahanSelect.disabled = false;
                })
                .catch(error => console.error('Error:', error));
        }
    });

    form.addEventListener('submit', function (event) {
        event.preventDefault();

        const payload = {
            nama: form.nama.value,
            tempat_lahir: form.tempat_lahir.value,
            tanggal_lahir: form.tanggal_lahir.value,
            jenis_kelamin: form.jenis_kelamin.value,
            pekerjaan_id: parseInt(pekerjaanSelect.value),
            provinsi_id: parseInt(provinsiSelect.value),
            kab_kota_id: parseInt(kabKotaSelect.value),
            kecamatan_id: parseInt(kecamatanSelect.value),
            kelurahan_id: parseInt(kelurahanSelect.value),
            nama_jalan: form.nama_jalan.value,
            rt: form.rt.value,
            rw: form.rw.value,
            nominal_setor: parseFloat(nominalSetorInput.value.replace(/\D/g, '')),
            kantor_cabang_id: parseInt(localStorage.getItem('kantor_cabang_id')),
            status: "Menunggu Approval",
            approved_by: null
        };

        // Log the payload to the console
        console.log('Request Payload:', payload);

        fetch('http://localhost:8000/api/calon-nasabah', {
            method: 'POST',
            headers: {
                'Authorization': `Bearer ${token}`,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(payload)
        })
            .then(response => response.json())
            .then(data => {
                if (data.id) {
                    alert('Calon Nasabah submitted successfully');
                    window.location.href = 'dashboard.html';
                } else {
                    alert('Submission failed');
                }
            })
            .catch(error => console.error('Error:', error));
    });

    // Cancel button event listener
    cancelBtn.addEventListener('click', function () {
        window.location.href = 'dashboard.html';
    });
});
