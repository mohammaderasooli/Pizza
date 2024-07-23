<?php 

session_start();

//unset($_SESSION['name']);

$name = isset($_SESSION['name']) ? ($_SESSION['name'] =='') ? 'Guest' : $_SESSION['name'] : 'Guest';

$gender = isset($_COOKIE['gender']) ? ($_COOKIE['gender'] =='') ? 'Unknown' : $_COOKIE['gender'] : 'Unknown';



?>

<head>
	<title>OpenCode Pizza</title>
	<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <style>
    	.brand{
    		background: #cbb09c !important;
    	}
    	.brand-text{
    		color: #cbb09c !important;
    	}
    	form{
    		max-width: 460px;
    		margin: 20px auto;
    		padding: 20px;
    	}
        .pizza{
            width: 100px;
            margin: 40px auto -10px;
            display: block;
            position: relative;
            top: auto;
        }
    </style>







</head>
<body class="brown lighten-4">
	<nav class="white z-depth-0 ">
		<div class="container">
			<a href="index.php" class="brand-logo brand-text">OpenCode Pizza</a>
			<ul id="nav-mobile" class="right hide-on-small-and-down">
                <li class="brown-text">Hello <?php echo htmlspecialchars($name) ?></li>
                <li class="brown-text">  (<?php echo htmlspecialchars($gender)?>) </li>
				<li><a href="add.php" class="btn brand z-depth-0">Add a Pizaa</a></li>
			</ul>
		</div>
	</nav>