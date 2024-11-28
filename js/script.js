// Menangani interaksi hover dan posisi kursor
document.querySelectorAll('.zoom-container').forEach(container => {
    const img = container.querySelector('img');

    container.addEventListener('mousemove', (e) => {
        const rect = container.getBoundingClientRect();
        const x = e.clientX - rect.left; // Posisi X relatif ke container
        const y = e.clientY - rect.top;  // Posisi Y relatif ke container

        // Mengatur titik zoom berdasarkan posisi kursor
        img.style.transformOrigin = `${x}px ${y}px`;
        img.classList.add('zoom');
    });

    container.addEventListener('mouseleave', () => {
        img.classList.remove('zoom'); // Reset zoom
        img.style.transformOrigin = 'center center';
    });
});
