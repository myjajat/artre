/*$(".sidebar-menu a").click(function(){
    $("#content").load(this.getAttribute("href"),{ ajax:true });
    window.history.pushState({}, "Title", this.getAttribute("href"));
    return false;
});*/

$(function(){
    
});

function setMenuActive(title){
    $('#m'+title).addClass('active');
    $('.navbar-brand').text(title);
}