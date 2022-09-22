const $ = require('jquery');
$(function(){
    window.setInterval(()=>{
        console.log("and again... ");
        $.get("/weather")
            .then(html=>$("#weather").next("p").html(html))
            .fail(()=>{});
    },120 * 1000)
});
