$('.alert-Success').removeClass("hide-Success");
$('.alert-Success').addClass("show-Success");


$('.close-btn-Success').click(function(){
$('.alert-Success').addClass("hide-Success");
$('.alert-Success').removeClass("show-Success");
});


$('.alert').removeClass("hide");
$('.alert').addClass("show");


$('.close-btn').click(function(){
$('.alert').addClass("hide");
$('.alert').removeClass("show");
});


$(function() {
    setTimeout(function() { $(".alert").fadeOut(1500); }, 5000)
    
    });

$(function() {
        setTimeout(function() { $(".alert-Success").fadeOut(1500); }, 5000)
        
        });