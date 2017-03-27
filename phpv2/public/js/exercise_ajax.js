$(function() {
    $("#answer").submit(function(event) {
        event.preventDefault();
        var myanswer = $("#myanswer").val();
        $.post("/resolve", {
            answer: myanswer
        }, function(data) {
            console.log(data);
        }).done(function () {
        });
    })
});
