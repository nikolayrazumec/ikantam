function delButton() {
    var delbutton = document.getElementById('delete').name;
    var searchString = "delete=" + delbutton;
    var req = getXmlHttp();
    req.onreadystatechange = function () {
        if (req.readyState != 4) return;
        console.log(req.responseText);
        try {
            eval(req.responseText);
        }
        catch (e) {
        }
    };
    req.open("POST", "control/delete.php", true);
    req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    req.send(searchString);
}