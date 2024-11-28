 // JavaScript untuk mengisi nama otomatis
 function fillName(nis) {
    if (nis === "") {
        document.getElementById("nama").value = "";
        return;
    }

    const xhr = new XMLHttpRequest();
    xhr.open("GET", "get_nama_santri.php?nis=" + nis, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("nama").value = xhr.responseText;
        }
    };
    xhr.send();
}