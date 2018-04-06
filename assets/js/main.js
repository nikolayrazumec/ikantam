var rec = 1;
window.onload = getRecord;

function getRecord() {
    var req = getXmlHttp();
    var x = document.getElementById('blog');
    rec = x.childElementCount;
    var searchString = "main=getRecord&rec=" + rec;

    req.onreadystatechange = function () {
        if (req.readyState != 4) return;
        try {
            var newDiv = document.createElement("div");
            newDiv.innerHTML = req.responseText;
            x.appendChild(newDiv);
            rec = x.childElementCount;
        }
        catch (e) {
        }
    };
    req.open("POST", "model/main.php", true);
    req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    req.send(searchString);
}

function moreRecord() {
    var req = getXmlHttp();
    var searchString = "main=getMax";
    req.onreadystatechange = function () {
        if (req.readyState != 4) return;
        try {
            var recmax = req.responseText;
            recmax = recmax * 1;
            var rec4 = rec * 4;

            console.log(recmax);
            console.log(rec4);
            console.log('\n');

            if (recmax > rec4) {
                getRecord();
            }
            else {
                document.getElementById('pagination').hidden = true;
            }
        }
        catch (e) {
        }
    };
    req.open("POST", "model/main.php", true);
    req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    req.send(searchString);
}