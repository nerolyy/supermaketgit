document.querySelectorAll('table tbody tr').forEach(tr => {
        const editBtn = tr.querySelector('.edit-btn');
        const saveBtn = tr.querySelector('.save-btn');
        const cancelBtn = tr.querySelector('.cancel-btn');
        const inputs = tr.querySelectorAll('input:not([type=hidden])');

        editBtn.addEventListener('click', () => {
            
            inputs.forEach(input => input.removeAttribute('readonly'));
            editBtn.style.display = 'none';
            saveBtn.style.display = 'inline-block';
            cancelBtn.style.display = 'inline-block';
        });

        cancelBtn.addEventListener('click', () => {
            inputs.forEach(input => {
                input.setAttribute('readonly', 'readonly');
                location.reload();
            });
            editBtn.style.display = 'inline-block';
            saveBtn.style.display = 'none';
            cancelBtn.style.display = 'none';
        });
    });