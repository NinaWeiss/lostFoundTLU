var trigger = document.getElementsByClassName('trigger');
var modal = document.getElementById('modal');
var overlay = document.getElementById('overlay');
var closeBtn = document.getElementById('close-button');

overlay.addEventListener('click', modalClose);
closeBtn.addEventListener('click', modalClose);

for (let i = 0; i < trigger.length; i++) {
    trigger[i].addEventListener('click', showPost);
}

function showPost(e) {
    modal.classList.add('active');
    overlay.classList.add('active');

    var id = e.target.dataset.id;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("show-post").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "/ajax?lost=" + id, true);
    xmlhttp.send();
}

function modalClose() {
    modal.classList.remove('active');
    overlay.classList.remove('active');
}