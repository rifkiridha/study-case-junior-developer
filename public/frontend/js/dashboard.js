document.addEventListener('DOMContentLoaded', function () {
    const token = localStorage.getItem('token');
    const role = localStorage.getItem('role');
    const kantorCabangId = localStorage.getItem('kantor_cabang_id');
    const usernameElem = document.getElementById('username');
    const roleElem = document.getElementById('role');
    const kantorCabangElem = document.getElementById('kantorCabang');
    const alamatElem = document.getElementById('alamat');
    const tableBody = document.getElementById('tableBody');
    const inputNasabahBtn = document.getElementById('inputNasabahBtn');
    const logoutBtn = document.getElementById('logoutBtn');

    console.log('Token:', token);
    console.log('Role:', role);
    console.log('Kantor Cabang ID:', kantorCabangId);

    if (!token) {
        window.location.href = 'index.html';
        return;
    }

    if (usernameElem) usernameElem.textContent += localStorage.getItem('username') || 'N/A';
    if (roleElem) roleElem.textContent += role || 'N/A';

    // Fetch Kantor Cabang data
    if (kantorCabangId) {
        fetch(`http://localhost:8000/api/kantor-cabang/${kantorCabangId}`, {
            headers: {
                'Authorization': `Bearer ${token}`
            }
        })
        .then(response => response.json())
        .then(data => {
            console.log('Kantor Cabang data:', data);
            if (kantorCabangElem) kantorCabangElem.textContent = `Kantor Cabang: ${data.nama_cabang}`;
            if (alamatElem) alamatElem.textContent = `Alamat: ${data.alamat_cabang}`;
        })
        .catch(error => console.error('Error:', error));
    }

    function formatRupiah(amount) {
        const number = parseFloat(amount).toFixed(2);
        const parts = number.split('.');
        const integerPart = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        return `Rp. ${integerPart},${parts[1]}`;
    }

    fetch('http://localhost:8000/api/calon-nasabah', {
        headers: {
            'Authorization': `Bearer ${token}`
        }
    })
    .then(response => response.json())
    .then(data => {
        console.log('Fetched data:', data);

        data.forEach(nasabah => {
            const row = document.createElement('tr');

            row.innerHTML = `
                <td>${nasabah.nama}</td>
                <td>${nasabah.tempat_lahir}</td>
                <td>${nasabah.tanggal_lahir}</td>
                <td>${nasabah.jenis_kelamin}</td>
                <td>${nasabah.nama_jalan}</td>
                <td>${nasabah.rt}</td>
                <td>${nasabah.rw}</td>
                <td>${formatRupiah(nasabah.nominal_setor)}</td>
                <td>${nasabah.status}</td>
                <td>
                    <button class="details-btn" data-id="${nasabah.id}">Details</button>
                    ${role === 'Supervisor' && nasabah.status === 'Menunggu Approval' ? 
                        `<button class="approve-btn" data-id="${nasabah.id}">Approve</button>` 
                        : ''}
                </td>
            `;

            // Add click event listener to the details button
            row.querySelector('.details-btn').addEventListener('click', function () {
                // Store the selected nasabah in localStorage
                localStorage.setItem('selectedNasabah', JSON.stringify(nasabah));
                window.location.href = 'details.html';
            });

            tableBody.appendChild(row);
        });

        document.querySelectorAll('.approve-btn').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.getAttribute('data-id');

                fetch(`http://localhost:8000/api/calon-nasabah/${id}/approve`, {
                    method: 'POST',
                    headers: {
                        'Authorization': `Bearer ${token}`
                    }
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Approval response:', data);
                    alert('Nasabah approved successfully');
                    window.location.reload();
                })
                .catch(error => console.error('Error:', error));
            });
        });
    })
    .catch(error => console.error('Error:', error));

    if (role === 'Customer Service') {
        if (inputNasabahBtn) {
            inputNasabahBtn.addEventListener('click', () => {
                window.location.href = 'input-calon-nasabah.html';
            });
        }
    } else {
        if (inputNasabahBtn) inputNasabahBtn.style.display = 'none'; 
    }

    if (logoutBtn) {
        logoutBtn.addEventListener('click', function () {
            localStorage.removeItem('token');
            localStorage.removeItem('username');
            localStorage.removeItem('role');
            localStorage.removeItem('cabang');
            localStorage.removeItem('kantor_cabang_id');
            window.location.href = 'index.html';
        });
    }
});
