<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 		<script src="https://kit.fontawesome.com/115fa09537.js" crossorigin="anonymous"></script>
		<style>
			HTML CSSResult Skip Results Iframe
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap');


html {
    box-sizing: border-box;
    font: 62.5% "Open Sans", sans-serif;
}

*,
*::before,
*::after {
    box-sizing: inherit;
}

body {
    color: #353b48;
    font-size: 1.6rem;
    margin: 0;
    padding: 0;
}

h1, h3, p {
    margin: 0;
}

/* login */

section {
    display: flex;
}

.login-img {
    display: none;
}

.login-form {
    height: 100vh;
    max-width: 80%;
    margin: auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

#company-name {
    display: none;
}

.login-form h1 {
    color: #c31432;
    font-size: 5rem;
    padding-bottom: 20px;
}

.login-form p {
    font-size: 1.8rem;
}

.login-form h3 {
    padding-bottom: 10px;
}

form {
    display: flex;
    flex-wrap: wrap;
    margin: 25px 0;
}

form > * {
    flex: 100%;
}

input {
    border:1px solid #dcdde1;
    margin-bottom: 15px;
}

input:focus {
    outline: none;
    border-color: rgba(195, 20, 50, 0.4);
    box-shadow: 0 0 4px rgba(195, 20, 50, 0.5);
}

label {
    margin-bottom: 5px;
}

input, button {
    border-radius: 5px;
    padding: 15px;
}

button {
    background-color: #c31432;
    border: none;
    color: #f5f6fa;
    font-family: inherit;
    font-weight: 700;
    font-size: 1.5rem;
    text-transform: uppercase;
    transition: background-color linear .3s;
}

button:active,
button:hover {
    background-color: #a21129;
}

.text-info {
    text-align: center;
}

.text-info a,
.text-info p {
    font-size: 1.5rem;
}

.text-info p {
    padding-top: 10px;
}

.text-info a {
    color: #a21129;
    text-decoration: none;
    transition: color ease-in .3s;
}

.text-info a:active,
.text-info a:hover {
    color: #353b48;
}

/* media queries */
@media screen and (min-width:990px) {
    .login-img,
    .login-form {
        padding: 5%;
    }
    .login-form #company-name {
        display: inline;
    }

    .login-form h1 {
        font-size: 3rem;
    }

    .login-form i {
        font-size: 2.5rem;
        vertical-align: super;
    }

    .login-img {
        background: linear-gradient(to bottom, rgba(195, 20, 50, 0.8), rgba(36, 11, 54, 0.8)),
        url(https://images.unsplash.com/photo-1521737711867-e3b97375f902?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1234&q=80);
        background-position: center;
        background-size: cover;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        align-items: flex-end;
    }

    .login-img h1,
    .login-img p {
        width: 300px;
    }

    .login-img h1 {
        color: #f5f6fa;
        font-size: 3.5rem;
    }

    .login-img p {
        color: #bebebe;
        line-height: 1.5;
    }
}



Resources1× 0.5× 0.25×Rerun


		</style>
	</head>

	<body>
    <section>
        <div class="login-form">
            <h1><span id="company-name">Admin panel</span> <i class="fas fa-atlas"></i></h1>
            <h3>Sign in</h3> 
            

            <?php if($this->session->flashdata('err')) { ?>
                <div class="alert alert-danger alert-dismissible">
 			        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 			            <?php echo $this->session->flashdata('err') ; ?>
			    </div>
            <?php } ?>
            
            

            <form action="<?php echo base_url ('admin_loginAct') ?>" method="post" >
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash();?>" />
                <label for="name">Username</label>
                <input type="text" id="name" name="username">

                <label for="password">Password</label>
                <input type="password" id="password" name="password">

                <button type="submit">Log in</button>
            </form>

            <!-- <div class="text-info">
                <a href="#">Forgot password?</a>
                <p>No account yet? <a href="#">Get a free trial</a></p>
            </div> -->
        </div>

    </section>
	</body>



</html>