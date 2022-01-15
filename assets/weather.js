const $ = require('jquery');
$(function(){
    // console.warn("hello from weather.js!");
    window.setInterval(()=>{
        $.get("/weather")
            .then(html=>$("#weather").next("p").html(html))
            .fail(()=>{});
    },300000)
});
