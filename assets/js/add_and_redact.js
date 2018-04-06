var abc;
var form = document.forms.namedItem("fileinfo");

form.addEventListener('submit', function (ev) {
    //var oOutput = document.querySelector("div"),
    form = document.forms.namedItem("fileinfo");
    var oData = new FormData(form);


    var oReq = getXmlHttp();
    oReq.open("POST", adresspost, true);
    oReq.onload = function (oEvent) {
        if (oReq.readyState != 4) return;
        if (oReq.status == 200) {
            console.log(oReq.responseText);

            abc = JSON.parse(oReq.responseText);
            writeEr();
            console.log(abc);
        }
    };
    oReq.send(oData);
    ev.preventDefault();
}, false);

function writeEr() {

    document.getElementById('Text1Status').innerText = '';
    document.getElementById('Title1Status').innerText = '';
    document.getElementById('p1').hidden = true;
    document.getElementById('Title1div').className = "bs-example";
    document.getElementById('Text11div').className = "bs-example";

    if (abc['insert']) {
        window.location.href = "/";
    }
    if (abc['title']) {
        document.getElementById('Title1div').className = "bs-example has-error";
        document.getElementById('Title1Status').innerText = abc['title'];
    }
    if (abc['text']) {
        document.getElementById('Text11div').className = "bs-example has-error";
        document.getElementById('Text1Status').innerText = abc['text'];
    }
    if (abc['file']) {
        document.getElementById('p1').innerText = abc['file'];
        document.getElementById('p1').hidden = false;
    }
}