var trigger = document.getElementsByClassName('trigger');
var modal = document.getElementById('modal');
var smallModal = document.getElementById('small-modal');
var overlay = document.getElementById('overlay');
var closeBtn = document.getElementById('close-button');
var closeBtn2 = document.getElementById('close-button2');

overlay.addEventListener('click', modalClose);
closeBtn.addEventListener('click', modalClose);
closeBtn2.addEventListener('click', modalClose);

for (let i = 0; i < trigger.length; i++) {
    trigger[i].addEventListener('click', showPost);
}

function showPost(e) {
    modalOpen();
    var id = e.target.dataset.id;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("show-post").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "/ajax?found=" + id, true);
    xmlhttp.send();
}
function modalOpen() {
    modal.classList.add('active');
    overlay.classList.add('active');
}
function modalClose() {
    modal.classList.remove('active');
    smallModal.classList.remove('active');
    overlay.classList.remove('active');
}
function smallModalOpen() {
    smallModal.classList.add('active');
    overlay.classList.add('active');
}
/* Edit post buttons */
function editFoundPost(id) {
    modalOpen();
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("show-post").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "/ajax?editFound=" + id, true);
    xmlhttp.send();
}

function deleteFoundPost(id) {
    smallModalOpen();
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("show-post2").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "/ajax?deleteFound=" + id, true);
    xmlhttp.send();
}
