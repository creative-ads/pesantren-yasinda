const sidebar = document.querySelector('.sidebar');
const btn = document.getElementById('btn');

btn.onclick = function () {
    sidebar.classList.toggle('closed');
};
