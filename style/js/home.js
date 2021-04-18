//Function untuk slide show
var slideIndex = 0;
var intervalSlideShow = setInterval(function() {plusDivs(1)}, 4000);
window.addEventListener('resize', function() {plusDivs(0)});

function plusDivs(n) {
    clearInterval(intervalSlideShow);
    var element_slide = document.getElementById("slide_show");
    var position_slide = element_slide.getBoundingClientRect();
    var width_slide = position_slide.width;
    width_slide = width_slide - (width_slide * 0.04)

    var element_img = document.getElementById("slide_img");
    element_img.style.display = "inline-block";
    var img_width = element_img.getBoundingClientRect().width;
    element_img.style.display = "none";

    var total_img = parseInt(width_slide / img_width);
    var margin_img = (width_slide - (total_img * img_width)) / (total_img + 1) / 2;
    slideIndex += n;
    
    showDivs(slideIndex, total_img, margin_img);
}

function showDivs(n, total, permargin) {
    var i;
    var x = document.getElementsByClassName("img_container");
    var margin = permargin + "px";

    //Jika slide sudah lebih besar dari panjang dari class img-container, index mulai dari 1 lagi
    if ((n + total) > x.length) {
        slideIndex = 0;
    } else if (n < 0) {
        slideIndex = x.length - total;
    }

    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }

    for (i = slideIndex; i < slideIndex + total; i++) {
        x[i].style.marginLeft = margin;
        x[i].style.display = "inline-block";
        x[i].style.marginRight = margin;
    }

    intervalSlideShow = setInterval(function() {plusDivs(1)}, 4000);
}