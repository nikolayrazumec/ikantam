var abc;
var form = document.forms.namedItem("fileinfo");


form.addEventListener('submit', function (ev) {
    //var oOutput = document.querySelector("div"),
    form = document.forms.namedItem("fileinfo");
    var oData = new FormData(form);


    var oReq = getXmlHttp();
    oReq.open("POST", "model/add.php", true);
    oReq.onload = function (oEvent) {
        if (oReq.readyState != 4) return;
        if (oReq.status == 200) {
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
        document.getElementById('p1').hidden = false;
    }


}

/*


var form = document.forms.namedItem("fileinfo");

form.addEventListener('submit', function (ev) {
    var oOutput = document.querySelector("div"),
        oData = new FormData(form);

    oData.append("CustomField", "This is some extra data");

    var oReq = new getXmlHttp();
    oReq.open("POST", "model/add.php", true);
    oReq.onload = function (oEvent) {
        if (oReq.status == 200) {
            console.log(oReq.responseText);
            //oOutput.innerHTML = "Uploaded!";
            oOutput.innerHTML = oReq.responseText;
        } else {
            oOutput.innerHTML = "Error " + oReq.status + " occurred when trying to upload your file.<br \/>";
        }
    };

    oReq.send(oData);
    ev.preventDefault();
}, false);*/
