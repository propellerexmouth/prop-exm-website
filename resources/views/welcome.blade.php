<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Propeller:Exmouth is a vibrant, inclusive community of passionate and experienced entrepreneurs, creatives, problem solvers, engineers, technologists and makers. We love Exmouth and believe it is uniquely positioned to provide the ultimate work/life balance.">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="theme-color" content="#ffffff">
<title>Propeller:Exmouth</title>
<!-- Styles -->
<style>
html, body {
background-color: #fff;
color: #636b6f;
font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
font-weight: 100;
height: 100vh;
margin: 0;
}
p {
	line-height: 1.5em;
}
.full-height {
height: 100vh;
}
.hero {
background: url("/img/bg.jpg") center center;
background-size:cover;
}
.flex-center {
align-items: center;
display: flex;
justify-content: center;
}
.content {
text-align: center;
}
h1 {
display:none;
}
.logo {
width:200px;
}
a {
	color:#864BFF;
}
.cls-1{fill:#fff}

.mission {
	background:#fff;
	color:#222;
	padding:50px 20px;
}
.mission__container {
	max-width: 700px;
	margin:auto;
}
.mission__title {
	position: relative;
	font-family: monaco;
	font-size: 1.8em;
	font-weight:normal;
}
.mission__title:before {
	content:"";
	position:absolute;
	top:-20px;
	left:0;
	width:30px;
	height:2px;
	background:#222;
}
.contact {
	background:#FBFE56;
	padding:50px 20px;
	text-align:center;
	color:#000;
}
.contact .fa {
	font-size:2em;
}
i.fa.fa-temp-messenger::before {
  content: "";
  display: inline-block;
  width: 1.0rem; /* Set to your font-size */
  height: 1.0rem; /* Set to your font-size */
  position: relative;
  top: 1px;
  background: rgb(114, 144, 201) /* set to your font color */ url('data:image/png;base64,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') no-repeat scroll center center/100%;
}
.button--messenger {
	display:block;
	margin:20px auto;
	height:50px;
	line-height: 50px;
	width:300px;
	background:#fff;
	font-size:0.9em;
	text-decoration: none;
	color:#000;
	transition: box-shadow 0.2s;
	box-shadow: 2px 2px 0 2px rgba(0,0,0,0.1);
}
.button--messenger:hover {
	box-shadow: 4px 4px 20px 4px rgba(0,0,0,0.1);
}
.socialIcons a {
	margin:10px;
}
</style>
</head>
<body>
<div class="hero flex-center full-height">
	<div class="content">
		<svg class="logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 157.66 87.77"><defs></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><g id="logo"><path class="cls-1" d="M44.42 61.73h1.19v14.51h-1.19zm67.25 1.92h1.19v14.51h-1.19zM59.38 60.6h4.08v27.17h-4.08zm34.45 0h4.08v27.17h-4.08zM47.61 42.37v1h-4.86v2.77h4.53v1h-4.53v3h4.9v1h-6.06v-8.77zm3.09 0h1.4l2.17 3.41 2.27-3.41h1.3L55 46.6l3 4.49h-1.4l-2.35-3.6-2.42 3.6h-1.28l3-4.48zm12.3 0l2.75 7.33 2.76-7.33h1.59v8.72H69v-7.26l-2.72 7.26h-1l-2.72-7.26v7.26h-1.1v-8.72zM74.27 45a4.31 4.31 0 0 1 .79-1.46 3.84 3.84 0 0 1 1.31-1 4.56 4.56 0 0 1 3.64 0 3.85 3.85 0 0 1 1.31 1A4.35 4.35 0 0 1 82.1 45a5.74 5.74 0 0 1 0 3.43 4.35 4.35 0 0 1-.79 1.46 3.78 3.78 0 0 1-1.31 1 4.63 4.63 0 0 1-3.64 0 3.77 3.77 0 0 1-1.31-1 4.31 4.31 0 0 1-.79-1.46 5.74 5.74 0 0 1 0-3.43zm1.07 3a3.55 3.55 0 0 0 .54 1.15 2.75 2.75 0 0 0 .94.82 3.16 3.16 0 0 0 2.74 0 2.76 2.76 0 0 0 .94-.82A3.54 3.54 0 0 0 81 48a5 5 0 0 0 0-2.6 3.54 3.54 0 0 0-.54-1.15 2.76 2.76 0 0 0-.94-.82 3.16 3.16 0 0 0-2.74 0 2.75 2.75 0 0 0-.94.82 3.55 3.55 0 0 0-.54 1.15 5 5 0 0 0 0 2.6zm16.95 2.45a3.58 3.58 0 0 1-2.54.84 4 4 0 0 1-2.63-.8 3.16 3.16 0 0 1-.95-2.55v-5.57h1.16v5.57a2.37 2.37 0 0 0 .67 1.77 2.48 2.48 0 0 0 1.8.6 2.24 2.24 0 0 0 1.69-.6 2.47 2.47 0 0 0 .51-1.77v-5.57h1.16v5.57a3.28 3.28 0 0 1-.87 2.51zm4.27-7.11v-1h7v1h-2.91v7.75h-1.19v-7.75zm11.54-.97v3.75h4.59v-3.75h1.16v8.72h-1.16v-4h-4.59v4h-1.16v-8.72zm-95.83-8.52H0v-4.14h3V12H0V7.83h8.85v2.28a6.58 6.58 0 0 1 5.21-2.55c4.33 0 7.64 4 7.64 9.35 0 5.47-3.19 9.31-7.71 9.31A6.82 6.82 0 0 1 8.85 24v5.74h3.42zm0-21.58c-2.2 0-3.46 1.75-3.46 4.71s1.37 4.79 3.53 4.79 3.46-1.82 3.46-4.86c.01-2.91-1.32-4.64-3.53-4.64zM34.88 25.8H22.23v-4.14h3.34V12h-3V7.83h8.25v4.56h.08c1.06-3.12 3.31-4.83 6.27-4.83H38V13h-.68c-4.64 0-5.89 3.12-5.89 6.76v1.9h3.5z"/><path class="cls-1" d="M47.19 26.22c-5.32 0-9.42-3.46-9.42-9.42 0-6.31 4.56-9.38 9.42-9.38 5.24 0 9.46 3.34 9.46 9.38 0 5.65-3.83 9.42-9.46 9.42zm0-14.36c-2.28 0-3.53 1.82-3.53 5.05 0 3 1.33 4.86 3.53 4.86s3.57-1.82 3.57-5-1.29-4.92-3.57-4.92zm21.93 21.99H56.85v-4.14h3V12h-3V7.83h8.85v2.28a6.58 6.58 0 0 1 5.2-2.55c4.33 0 7.64 4 7.64 9.35 0 5.47-3.19 9.31-7.71 9.31A6.82 6.82 0 0 1 65.7 24v5.74h3.42zm0-21.58c-2.2 0-3.46 1.75-3.46 4.71s1.34 4.79 3.54 4.79 3.46-1.82 3.46-4.86c-.01-2.91-1.34-4.64-3.54-4.64zm29.3 9.54c-1.86 2.89-4.9 4.41-8.81 4.41-6.23 0-10.14-3.5-10.14-9.08a9.39 9.39 0 0 1 9.69-9.73c5.4 0 9.73 4.14 9.27 10.6H85.27c0 2.05 1.14 4.48 4.41 4.48 1.52 0 2.51-.49 4.18-2.09zm-5.66-7c-.3-2.28-1.71-3.65-3.8-3.65s-3.34 1.18-3.69 3.65zm6.53 6.85h2.77V4.14h-2.77V0h8.59v21.66h2.58v4.14H99.29zm11.56 0h2.77V4.14h-2.77V0h8.59v21.66H122v4.14h-11.15zm30.54.15c-1.86 2.89-4.9 4.41-8.81 4.41-6.23 0-10.14-3.5-10.14-9.08a9.39 9.39 0 0 1 9.69-9.73c5.4 0 9.73 4.14 9.27 10.6h-13.15c0 2.05 1.14 4.48 4.41 4.48 1.52 0 2.51-.49 4.18-2.09zm-5.66-7c-.3-2.28-1.71-3.65-3.8-3.65s-3.34 1.18-3.69 3.65zm18.85 10.99h-12.65v-4.14h3.34V12h-3V7.83h8.25v4.56h.08c1.06-3.12 3.31-4.83 6.27-4.83h.84V13H157c-4.63 0-5.89 3.12-5.89 6.76v1.9h3.5z"/></g></g></g></svg>
		<h1>Propeller:Exmouth</h1>
	</div>
</div>
<div class="mission">
	<div class="mission__container">
		<h2 class="mission__title">The Mission</h2>
		<p><strong>Propeller:Exmouth</strong> is a vibrant, inclusive community of passionate and experienced entrepreneurs, creatives, problem solvers, engineers, technologists and makers.</p>
		<p>We share a culture of curiosity, knowledge-sharing and professionalism with a love of living by the sea. We love Exmouth and believe it is uniquely positioned to provide the ultimate work/life balance.</p>
		<p>We aim to provide exciting spaces for new opportunities to surface and existing ventures to thrive via collaboration, experimentation and business support. Our first location will include a mix of desk/office/meeting space, presentation space, maker space, media rooms and group spaces - NOT a bunch of desks to rent in a serviced office, but a space to succeed.</p>
		<p>By adopting a pay-it-forward attitude and embracing reciprocal business models we also encourage our community members to share their skills with local businesses, schools and groups through activities such as workshops, talks and mentor-programmes to ultimately grow our local economy and provide exciting job opportunities for future generations.</p>
		<p>You can think of our mission as cultivating an ecosystem that paves the way for world-class companies to be created - a stone’s throw from the beach.</p>
	</div>
</div>
<div class="contact">
	<div class="contact__container">
		<p><a class="button--messenger" href="https://m.me/propellerexmouth"><i class="fa fa-temp-messenger"></i> Chat on Messenger</a></p>
		<div class="socialIcons">
			<a href="https://www.facebook.com/propellerexmouth/"><i class="fa fa-facebook-official"></i></a>
			<a href="https://twitter.com/PropellerExm"><i class="fa fa-twitter-square"></i></a>
		</div>
	</div>
</div>
</body>
</html>
