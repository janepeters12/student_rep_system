$(document).ready(function(){
    $('select').formSelect();
    $('carousel').carousel();
    setInterval(function(){
        $('.carousel').carousel('next');
    },5000); 
});




    
    

    