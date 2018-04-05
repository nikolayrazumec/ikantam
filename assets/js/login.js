var namediv = document.getElementById('namediv');
var emaildiv = document.getElementById('emaildiv');
var passdiv = document.getElementById('passdiv');
var conpassdiv = document.getElementById('conpassdiv');
var singdiv = document.getElementById('singdiv');
var asing = singdiv.getElementsByTagName('a')[0];
var shidden = true;

var spanName = namediv.getElementsByTagName('span')[0];
var spanEmail = emaildiv.getElementsByTagName('span')[0];
var spanPass = passdiv.getElementsByTagName('span')[0];
var spanConPass = conpassdiv.getElementsByTagName('span')[0];


function validFormJs(email, pass, shidden, name, conpass) {
    var rename = name;
    var reconpass = conpass;
    var reNa = /^[a-zA-Z0-9]{1,16}$/;
    var rePa = /^.+$/;
    var reEm = /^.+@.+\.\w+$/;

    var reemail = reEm.test(email);
    var repass = rePa.test(pass);
    if (!shidden) {
        rename = reNa.test(name);
        reconpass = rePa.test(conpass);
    }
    return validForm(reemail, repass, shidden, rename, reconpass);
}


function validForm(reemail, repass, shidden, rename, reconpass) {
    namediv.className = "form-group";
    emaildiv.className = "form-group";
    passdiv.className = "form-group";
    conpassdiv.className = "form-group";
    spanName.innerText = '';
    spanEmail.innerText = '';
    spanPass.innerText = '';
    spanConPass.innerText = '';

    if (!reemail) {
        emaildiv.className = "form-group  has-warning";
        spanEmail.innerText = 'Incorrect E-Mail Address';
    }
    if (arguments[5]) {
        emaildiv.className = "form-group  has-warning";
        spanEmail.innerText = 'This E-Mail is already registered';
    }

    if (!repass) {
        passdiv.className = "form-group  has-warning";
        spanPass.innerText = 'Must be at least 8 characters. Must contain lowercase and uppercase letters and at least one digit';
    }
    if (!shidden) {
        if (!rename) {
            namediv.className = "form-group  has-warning";
            spanName.innerText = 'Use the symbols [a-zA-Z0-9] max-16';
        }
        if (reconpass !== repass) {
            conpassdiv.className = "form-group  has-warning";
            spanConPass.innerText = 'Must repeat Password value';
        }
        if (reemail && repass && rename && reconpass && (reconpass === repass)) {
            return true;
        }
    }
    else {
        if (reemail && repass) {
            return true;
        }
    }
    return null;
}

function hiddenForm() {
    conpassdiv = document.getElementById('conpassdiv');
    namediv = document.getElementById('namediv');
    asing = singdiv.getElementsByTagName('a')[0];

    shidden = !shidden;
    if (!shidden) {
        document.getElementById('enter1').innerText = 'Sing up';
        document.getElementById('singdiv').getElementsByTagName('h2')[0].innerText = 'Sing up';
        document.getElementById('singdiv').getElementsByTagName('a')[0].innerText = 'Already registered? Sing In.';
    }
    else {
        document.getElementById('enter1').innerText = 'Sing in';
        document.getElementById('singdiv').getElementsByTagName('h2')[0].innerText = 'Sing in';
        document.getElementById('singdiv').getElementsByTagName('a')[0].innerText = 'Don’t have an account? Join now.';
    }
    namediv.hidden = shidden;
    conpassdiv.hidden = shidden;
}

function handler1(e) {
    e = e || event;
    e.preventDefault();
    hiddenForm();
}

asing.addEventListener("click", handler1);


function sendLogin() {
    var email = document.getElementById('email').value;
    var pass = document.getElementById('pass').value;
    var name = document.getElementById('name').value;
    var conpass = document.getElementById('conpass').value;

    //if (!validFormJs(email, pass, shidden, name, conpass)) return;
    if (!validForm(email, pass, shidden, name, conpass)) return;
    var searchString = "email=" + email + "&" + "pass=" + pass + "&" + "shidden=" + shidden + "&" + "name=" + name + "&" + "conpass=" + conpass;
    //alert(searchString);

    var req = getXmlHttp();
    req.onreadystatechange = function () {
        if (req.readyState != 4) return;
        //console.log(req.responseText);
        eval(req.responseText);
    };
    req.open("POST", "model/login.php", true);
    req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    req.send(searchString);
}