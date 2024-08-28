document.addEventListener('DOMContentLoaded', function () {
    const token = localStorage.getItem('token');
    const role = localStorage.getItem('role');
    const selectedNasabah = JSON.parse(localStorage.getItem('selectedNasabah'));
    const kantorCabangId = localStorage.getItem('kantor_cabang_id');
    const nasabahDetailsElem = document.getElementById('nasabahDetails');
    const backBtn = document.getElementById('backBtn');
    const approveBtn = document.getElementById('approveBtn');

    console.log('Token:', token);
    console.log('Role:', role);
    console.log('Selected Nasabah:', selectedNasabah);

    if (!token || !selectedNasabah) {
        window.location.href = 'index.html';
        return;
    }

    // Function to format numbers as Rupiah currency
    function formatRupiah(amount) {
        // Convert the amount to a number with two decimal places
        const number = parseFloat(amount).toFixed(2);
        // Split the number into integer and decimal parts
        const parts = number.split('.');
        // Format the integer part with dots
        const integerPart = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        // Combine integer part and decimal part
        return `Rp. ${integerPart},${parts[1]}`;
    }

    // Display nasabah details
    if (nasabahDetailsElem) {
        nasabahDetailsElem.innerHTML = `
            <p><strong>Nama:</strong> ${selectedNasabah.nama}</p>
            <p><strong>Tempat Lahir:</strong> ${selectedNasabah.tempat_lahir}</p>
            <p><strong>Tanggal Lahir:</strong> ${selectedNasabah.tanggal_lahir}</p>
            <p><strong>Jenis Kelamin:</strong> ${selectedNasabah.jenis_kelamin}</p>
            <p><strong>Nama Jalan:</strong> ${selectedNasabah.nama_jalan}</p>
            <p><strong>RT:</strong> ${selectedNasabah.rt}</p>
            <p><strong>RW:</strong> ${selectedNasabah.rw}</p>
            <p><strong>Nominal Setor:</strong> ${formatRupiah(selectedNasabah.nominal_setor)}</p>
            <p><strong>Status:</strong> ${selectedNasabah.status}</p>
        `;
    }

    // Handle approve button click
    if (approveBtn) {
        approveBtn.addEventListener('click', function () {
            fetch(`http://localhost:8000/api/calon-nasabah/${selectedNasabah.id}/approve`, {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log('Approval response:', data);
                alert('Nasabah approved successfully');
                window.location.href = 'dashboard.html';
            })
            .catch(error => console.error('Error:', error));
        });

        // Show the approve button only if the role is Supervisor and the status is 'Menunggu Approval'
        if (role === 'Supervisor' && selectedNasabah.status === 'Menunggu Approval') {
            approveBtn.style.display = 'inline';
        } else {
            approveBtn.style.display = 'none';
        }
    }

    // Handle back button click
    if (backBtn) {
        backBtn.addEventListener('click', () => {
            window.location.href = 'dashboard.html';
        });
    }
});
