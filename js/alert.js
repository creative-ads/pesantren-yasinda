// Fungsi untuk menampilkan alert
function showAlert(message, type = "success") {
  const alertBox = document.getElementById("alertBox");
  alertBox.textContent = message; // Set pesan
  alertBox.className = `alert alert-${type} alert-dismissible fade show`; // Gaya Bootstrap
  alertBox.innerHTML += `
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        `; // Tombol close

  // Sembunyikan alert setelah 3 detik
  setTimeout(() => {
    alertBox.className = "alert d-none";
  }, 3000);
}

// Event untuk checkbox Acc
document.addEventListener("click", function (e) {
  if (e.target.classList.contains("acc-checkbox")) {
    const checkbox = e.target;
    const id = checkbox.getAttribute("data-id");
    const isChecked = checkbox.checked;

    // Kirim status Acc ke server
    fetch("update_acc.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ id, acc: isChecked ? 1 : 0 }),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          // Tampilkan pesan sukses
          showAlert(data.message, "success");
          if (isChecked) {
            checkbox.disabled = true; // Nonaktifkan checkbox jika dicentang
          }
        } else {
          // Tampilkan pesan gagal
          showAlert(data.message, "danger");
          checkbox.checked = !isChecked; // Batalkan perubahan
        }
      })
      .catch(() => {
        // Tampilkan pesan error
        showAlert("Terjadi kesalahan saat memproses permintaan.", "danger");
        checkbox.checked = !isChecked; // Batalkan perubahan
      });
  }
});
