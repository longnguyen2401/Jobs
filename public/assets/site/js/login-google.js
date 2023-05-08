$.ajax({
    url: '/api/get-google-sign-in-url',
    method: 'POST',
    dataType: 'json',
    success: function (response) {
        var a = document.getElementById('login-goolge');
        a.href = response.url;
    },
    error: function (xhr, status, error) {
        // Handle the error
        console.log(error);
    }
});