<h1>Welcome to Home!</h1>
<a href="/account/login">Login</a>
<a href="/account/register">Register</a>

<button id="show-books">
    Show books
</button>
<div id="books"></div>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script>
    $('#show-books').on('click', function(ev) {
        $.ajax({
            url: '/books/showbooks',
            method: 'GET',
        }).success(function(data) {
            $('#books').html(data);
        })
    })
</script>