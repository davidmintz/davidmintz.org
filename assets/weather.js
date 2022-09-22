const $ = require('jquery');
$(function(){
    window.setInterval(()=>{
        console.log("and again... ");
        $.get("/weather")
            .then(html=>$("#weather").next("p").html(html))
            .fail(()=>{});
    },300 * 1000)
});
