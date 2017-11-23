<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>iMaGiARy</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="jquery-3.2.1.min.js"
    type="text/javascript"></script>
<script>
$(document).ready(function(e) {
	$("#drop-container").on('dragenter', function (e){
	e.preventDefault();
	$(this).css('border', '#39b311 2px dashed');
	$(this).css('background', '#f1ffef');
	});


	$("#drop-container").on('dragover', function (e){
	e.preventDefault();
	});

	$("#drop-container").on('drop', function (e){
	$(this).css('border', '#07c6f1 2px dashed');
	$(this).css('background', '#FFF');
    e.preventDefault();
	var image = e.originalEvent.dataTransfer.files;
	createFormData(image);
	});
    $("#uploadForm").on('submit',(function(e) {
        e.preventDefault();
        $.ajax({
            url: "upload2.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data)
            {
                $("#targetLayer").html(data);
                location.href="test.php";
                },
            error: function()
            {
            }
        });
    }));
});

function createFormData(image) {
	var formImage = new FormData();
	formImage.append('dropImage', image[0]);
	uploadFormData(formImage);
}

function uploadFormData(formData) {
	$.ajax({
	url: "upload.php",
	type: "POST",
	data: formData,
	contentType:false,
	cache: false,
	processData: false,
	success: function(response){
       // var imagePreview = $(".drop-image").clone();
        //imagePreview.attr("src", response);
        //imagePreview.removeClass("drop-image");
		//imagePreview.addClass("preview");
        //$('#drop-container').append(imagePreview);
	    location.href="test.php";
	}
});
}
</script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
        .side{
        margin-left:20px;
        margin-right:20px;
    }
    .navbar-default{
        background-color: #3679B6;
    }
    .navbar-default .navbar-brand {
        color:  white;
    }
    .navbar-default .navbar-brand:hover {
        color:  white;
    }
    .nav.navbar-nav.navbar-right li a {
        color:  white;    
    }
    </style>
    </head>
<body>
    
    <nav class="navbar navbar-default navbar-top side" >
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#" id="demo">iMAGiARy</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">UPLOAD</a></li>
            </ul>
        </div>
    </div>
</nav>
<div id="load"></div>
<div class="container">
    <div id="drop-container">
        <div class="drop-area-text">Drag and Drop Images Here</div>
    </div>
    <img src="" class="drop-image" />
    <div class="bgColor">
        <form id="uploadForm" action="upload.php" method="post">
            <div id="targetLayer">No Image</div>
            <div id="uploadFormLayer">
                <input name="userImage" type="file" class="inputFile" /><br/>
                <input type="submit" value="Submit" class="btnSubmit" />
            </div>
        </form>
    </div>
    </div>
    <div id="contents">
    </div>
    <div class="col-md-12">
        <div class="col-md-12">
        <div class="panel panel-primary">
        <div class="panel-heading">
            Developed By: Team: NoLuck-Exception</div>
         </div>
    </div>
    </div>
<script>
    document.onreadystatechange = function () {
        var state = document.readyState
        if (state == 'interactive') {
            document.getElementById('contents').style.visibility="hidden";
        } else if (state == 'complete') {
            setTimeout(function(){
                document.getElementById('interactive');
                document.getElementById('load').style.visibility="hidden";
                document.getElementById('contents').style.visibility="visible";
            },1000);
        }
    }
</script>
</body>
</html>