document.addEventListener('DOMContentLoaded', () => {
  const editBtn = document.getElementById('editBtn');
  const saveBtn = document.getElementById('saveBtn');
  const inputs = document.querySelectorAll('#profileForm input:not([name="email"])');

  editBtn.addEventListener('click', () => {
    inputs.forEach(input => input.removeAttribute('readonly'));
    editBtn.style.display = 'none';
    saveBtn.style.display = 'inline-block';
  });
});

document.querySelectorAll('.menu li').forEach(tab => {
  tab.addEventListener('click', () => {
    document.querySelectorAll('.menu li').forEach(el => el.classList.remove('active'));
    tab.classList.add('active');

    const tabName = tab.getAttribute('data-tab');
    document.querySelectorAll('.tab-content').forEach(content => {
      content.style.display = content.id === tabName ? 'block' : 'none';
    });
  });
});
