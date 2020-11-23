window.onload = function submit() {

	    document.getElementById('submit').addEventListener('click', function() {

        var email = document.getElementById('email').value;
        $.ajax({
            url: "./controller/exe.php?do=api&email="+email,
            method: "GET",
            dataType: "JSON",
            success: function(data) {
                console.log(data);
            },
            error: function(err) {
                console.log(err);
            }
        });
    });

}