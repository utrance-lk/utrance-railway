<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link
      href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500&display=swap"
      rel="stylesheet"
    />
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
    />

    
    <link rel="stylesheet" href="../../../utrance-railway/public/css/layout/flashSuccess.css" />

    <title>Utrance Railway</title>
</head>

<body>
<button>Show Alert</button>
<div class="alert hide">
<span class="fas fa-check-circle"></span>
<span class="msg ">Sucess:Your File has been uploaded!!</span>
<span class="close-btn">
<span class="fas fa-times"></span>
</span>
</div>

<script>
$('button').click(function(){
    $('.alert').removeClass("hide");
    $('.alert').addClass("show");
});

$('.close-btn').click(function(){
    $('.alert').addClass("hide");
    $('.alert').removeClass("show");
});
</script>

</body>
</html>