function star_rating_hover(input) {
    var star = document.getElementsByClassName("rating");
    
    for (var i = 0; i <= input; i++) {
        star[i].style.color = "blue";
    }
}

function star_rating_out() {
    var star = document.getElementsByClassName("rating");
    
    for (var i = 0; i < star.length; i++) {
        star[i].style.color = "rgb(235, 235, 235)";
    }

    star_rating_checked();
}

function star_rating_checked() {
    var checked;
    var radio_button = document.getElementsByName("manga_rating");
    var star = document.getElementsByClassName("rating");

    for (var i = 0; i < radio_button.length; i++) {
        if (radio_button[i].checked) {
            checked = i;
        }
    }

    for (var i = 0; i <= checked; i++) {
        star[i].style.color = "#f9d932";
    }
}