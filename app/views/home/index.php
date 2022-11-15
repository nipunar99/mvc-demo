<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UpKeep</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
      rel="stylesheet">
  <link rel="stylesheet" href=<?=ROOT."/assets/css/homestyles.css"?>>
</head>
<body>
  <header>
    <div class="logo">
      <img src=<?=ROOT."/assets/images/logo.png"?> alt="">
      <img src=<?=ROOT."/assets/images/title.png"?> alt="">
    </div>

    <div class="nav">
      <ul class="navlist">
        <li><a href="#">Home</a></li>
        <li><a href="#">How Get Started</a></li>
      </ul>
    </div>

    <div class="logbtn">
      <a class="createBtn" href="#" >Create</a></li>
      <a href=<?=ROOT."/login"?> >Sign in</a></li>
    </div>
  </header>

  <main>

    <div class="content-left">
      <h1><b> From out of sight , To done right</b></h1>
      <p>UpKeep makes it simple to see where everything stands, all in one place. That means less guess works for you and more time to focus on what matters.</p>
      <button class="cta"><span class="material-icons-sharp">
        arrow_forward
        </span><span>Create</span></button>
      <button class="cta cta-com">Community</button>
    </div>

    <div class="content-right">
      <img src=<?=ROOT."/assets/images/mainImg.png"?> alt="">
    </div>

  </main>
</body>
</html>