function showForm() {
    $('#formModal').modal('show');
}

function saveData() {
    // وضع كود الحفظ هنا
}

function editRow(button) {
    const row = button.closest('tr');
    const cells = row.children;
    document.getElementById('name').value = cells[0].innerText;
    $('#formModal').modal('show');
}

function deleteRow(button) {
    button.closest('tr').remove();
}
