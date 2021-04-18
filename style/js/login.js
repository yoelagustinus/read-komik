function tabs(evt, targetTab) {
    var i, tab_content, tab_button;

    tab_content = document.getElementsByClassName("tab_content");
    for (i = 0; i < tab_content.length; i++) {
        tab_content[i].style.display = "none";
    }

    tab_button = document.getElementsByClassName("tab_button");
    for (i = 0; i < tab_button.length; i++) {
        tab_button[i].className = "tab_button";
    }

    document.getElementById(targetTab).style.display = "block";
    if (targetTab == "signup") {
        signup_page(0);
    }

    evt.currentTarget.className += " active";
}

function signup_page(page) {
    var i, signup_div;

    signup_div = document.getElementsByClassName("signup_div");
    for (i = 0; i < signup_div.length; i++) {
        signup_div[i].style.display = "none";
    }

    signup_div[page].style.display = "block";
}

function check_username(str) {
    var xhttp;

    if (window.XMLHttpRequest) {
        xhttp = new XMLHttpRequest();
    } else {
        xhttp = new ActiveXObject("Microsoft.XMLHttp");
    }

    if (str.length < 3) {
        document.getElementById("username_valid").style.display = "none";
        document.getElementById("username_not_valid").style.display = "none";
    } else {
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (xhttp.responseText == "true") {
                    document.getElementById("username_valid").style.display = "inline-block";
                    document.getElementById("username_not_valid").style.display = "none";
                } else {
                    document.getElementById("username_not_valid").style.display = "inline-block";
                    document.getElementById("username_valid").style.display = "none";
                }
            }
        };
    
        xhttp.open("POST", "check_username.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("str=" + str)
    }
}