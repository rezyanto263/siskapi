export default function uploadImagePreview(buttonEl, containerEl) {
    buttonEl.addEventListener('change', (e) => {
        var file = URL.createObjectURL(e.target.files[0]);

        if (file) {
            containerEl.dataset.src = file;
            containerEl.querySelector('img').setAttribute('src', file);
        }
    });
}
