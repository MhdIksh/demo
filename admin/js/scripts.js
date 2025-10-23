// Add JavaScript code here for client-side interactivity

// Validate form data
document.addEventListener('DOMContentLoaded', () => {
    const galleryForm = document.getElementById('galleryForm');
    const gigsForm = document.getElementById('gigsForm');
    const modifyPlanForm = document.getElementById('modify-plan-form');

    if (galleryForm) {
        galleryForm.addEventListener('submit', (e) => {
            const category = document.getElementById('category');
            const image = document.getElementById('image');

            if (category.value === '' || image.value === '') {
                alert('Please fill out all fields.');
                e.preventDefault();
            }
        });
    }

    if (gigsForm) {
        gigsForm.addEventListener('submit', (e) => {
            const title = document.getElementById('title');
            const description = document.getElementById('description');
            const price = document.getElementById('price');

            if (title.value === '' || description.value === '' || price.value === '') {
                alert('Please fill out all fields.');
                e.preventDefault();
            }
        });
    }
});

document.querySelectorAll('.delete form').forEach(form => {
    form.addEventListener('submit', function(e) {
        if (!confirm('Are you sure want to delete?')) {
            e.preventDefault();
        }
    });
});

window.openModifyPlanForm = function(id, name, price, description) {
    document.getElementById('modify-plan-id').value = id;
    document.getElementById('modify-plan-name').value = name;
    document.getElementById('modify-price').value = price;
    document.getElementById('modify-description').value = description;
    modifyPlanForm.style.display = 'block';
}

window.closeModifyPlanForm = function() {
    modifyPlanForm.style.display = 'none';
}
