const ImagePreview = () => {
    const fileInput = document.getElementById('image');
    const previewImg = document.getElementById('preview');

    fileInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.addEventListener('load', function() {
                previewImg.setAttribute('src', this.result);
                previewImg.style.display = 'block';
            });
            reader.readAsDataURL(file);
        }
    });
};

const initImagePreview = () => {
    ImagePreview();
};
document.addEventListener('DOMContentLoaded', initImagePreview());
