<h1>Register</h1>

<form method="post" action="/account/register">
    <label for="username">Username: </label>
    <input id="username" type="text" name="username"/>
    <br/>
    <label for="password">Password: </label>
    <input id="password" type="password" name="password"/>
    <br/>
    <input type="submit" value="Register"/>
    <a href="/account/login">Login with existing account</a>
</form>