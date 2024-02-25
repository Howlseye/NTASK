<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include 'crud.php'; ?>
	<link rel="icon" type="image/x-icon" href="assets/icons/logo2.png">
    <style>
				
		@font-face {
		font-display: swap;
		font-family: 'Comfortaa';
		font-style: normal;
		font-weight: 400;
		src: url('assets/font/comfortaa-v45-latin_latin-ext-regular.woff2') format('woff2'),
			url('assets/font/comfortaa-v45-latin_latin-ext-regular.ttf') format('truetype');
		}

		@font-face {
		font-display: swap;
		font-family: 'Comfortaa';
		font-style: normal;
		font-weight: 500;
		src: url('assets/font/comfortaa-v45-latin_latin-ext-500.woff2') format('woff2'),
			url('assets/font/comfortaa-v45-latin_latin-ext-500.ttf') format('truetype');
		}


		*{
		font-family: 'Comfortaa', sans-serif;
		scrollbar-width: none;
		}

		body {
			background: rgb(2,0,36);
			background: linear-gradient(180deg, rgba(2,0,36,1) 28%, rgba(6,4,41,1) 68%, rgba(6,5,62,1) 100%); 
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
			/* font-family: 'Montserrat', sans-serif; */
			/* padding-top: 80px; */
			height: 100%;
			overflow: hidden;
		}

		canvas{
		position: fixed;
		width: 100%;
		height: calc(100% + 80px);
		top: -80px;
		/* margin-top: -60px; */
		}

		h1 {
			font-weight: bold;
			font-size: 25px;
			margin: 10px;
		}

		.lol{
			margin-left: 85px;
		}

		.lal{
			margin-right: 85px;
		}

		img.lol, img.lal{
			position: relative;
			top: -100px;
			width: 220px;
		}

		h1.lol, h1.lal{
			position: relative;
			top: -30px;
		}

		button {
			border-radius: 20px;
			border: 1px solid rgba(6,5,56,1);
			background-color: rgba(6,5,56,1);
			color: #FFFFFF;
			font-size: 12px;
			font-weight: bold;
			padding: 12px 45px;
			letter-spacing: 1px;
			text-transform: uppercase;
			transition: transform 80ms ease-in;
		}

		button:active {
			transform: scale(0.95);
		}

		button:focus {
			outline: none;
		}

		button.ghost {
			background-color: transparent;
			border-color: #FFFFFF;
		}

		form {
			background-color: #ffffff;
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
			padding: 0 50px;
			height: 100%;
			text-align: center;
		}

		input {
			background-color: #eee;
			border: none;
			padding: 12px 15px;
			margin: 8px 0;
			width: 100%;
		}

		input:focus{
			border: 1px solid rgb(2,0,36);
		}

		.container {
			background: rgb(2,0,36);
			background: radial-gradient(circle, rgba(2,0,36,1) 28%, rgba(6,5,56,1) 78%); 
			border-radius: 10px;
			box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
					0 10px 10px rgba(0,0,0,0.22);
			position: relative;
			overflow: hidden;
			width: 768px;
			max-width: 100%;
			min-height: 480px;
		}

		.form-container {
			position: absolute;
			top: 0;
			height: 100%;
			transition: all 0.6s ease-in-out;
		}

		.sign-in-container {
			left: 0;
			width: 50%;
			z-index: 2;
		}

		.container.right-panel-active .sign-in-container {
			transform: translateX(100%);
		}

		.sign-up-container {
			left: 0;
			width: 50%;
			opacity: 0;
			z-index: 1;
		}

		.container.right-panel-active .sign-up-container {
			transform: translateX(100%);
			opacity: 1;
			z-index: 5;
			animation: show 0.6s;
		}

		@keyframes show {
			0%, 49.99% {
				opacity: 0;
				z-index: 1;
			}
			
			50%, 100% {
				opacity: 1;
				z-index: 5;
			}
		}

		.overlay-container {
			position: absolute;
			top: 0;
			left: 50%;
			width: 50%;
			height: 100%;
			overflow: hidden;
			transition: transform 0.6s ease-in-out;
			z-index: 100;
		}

		.container.right-panel-active .overlay-container{
			transform: translateX(-100%);
		}

		.overlay {
			background: rgb(2,0,36);
		background: radial-gradient(circle, rgba(2,0,36,1) 28%, rgba(6,5,56,1) 78%); 
			background-repeat: no-repeat;
			background-size: cover;
			background-position: 0 0;
			color: #FFFFFF;
			position: relative;
			left: -100%;
			height: 100%;
			width: 200%;
			transform: translateX(0);
			transition: transform 0.6s ease-in-out;
		}

		.container.right-panel-active .overlay {
			transform: translateX(50%);
		}

		.overlay-panel {
			position: absolute;
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
			padding: 0 40px;
			text-align: center;
			top: 0;
			height: 100%;
			width: 50%;
			transform: translateX(0);
			transition: transform 0.6s ease-in-out;
		}

		.overlay-left {
			transform: translateX(-20%);
		}

		.container.right-panel-active .overlay-left {
			transform: translateX(0);
		}

		.overlay-right {
			right: 0;
			transform: translateX(0);
		}

		.container.right-panel-active .overlay-right {
			transform: translateX(20%);
		}

    </style>
    <title>NTASK</title>
</head>
<body>
    <canvas class="anim"><script src="js/script.js"></script></canvas>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form method="post">
                <h1>Buat Akun</h1>
                <input type="text" name="nama" placeholder="Nama" required/>
                <input type="email" name="email" placeholder="Email" required/>
                <input type="password" name="sandi" placeholder="Kata Sandi" required/>
                <button name="daftar">Daftar</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form method="post">
                <h1>Masuk</h1>
                <input type="email" name="email" placeholder="Email" required/>
                <input type="password" name="sandi" placeholder="Kata Sandi" required/>
                <button name="login">Masuk</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
					<img class="lal" src="assets/icons/logo.png">
                    <h1 class="lal">Sudah Punya Akun ?</h1>
                    <button class="ghost lal" id="signIn">Masuk</button>
                </div>
                <div class="overlay-panel overlay-right">
					<img class="lol" src="assets/icons/logo.png">
                    <h1 class="lol" style="left: 10px;">Pengguna Baru ?</h1>
					<p style="position: relative; left: 40px; margin-top: -20px; font-size: 17px; margin-bottom: 20px;"><label style="font-weight: bold;">NTASK</label> Menjadikan Tugas-tugasmu Lebih Terstruktur</p>
                    <button class="ghost lol" id="signUp">Daftar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    </script>

</body>
</html>