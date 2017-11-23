<html>
<head>
    <title>iMaGiARy</title>
    <link rel="stylesheet" href="mystyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
</html>
<body>
    <nav class="navbar navbar-default navbar-fixed-top side">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#" id="demo" >iMAGiARy</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">UPLOAD</a></li>
            </ul>
        </div>
    </div>
</nav>
<div id="load"></div>
<br>
<br>
    <br>
<div class="col-md-12">
    <br>
    <div class="col-md-5">
       <div class="panel panel-primary">
           <div class="panel-body">
               <?php
               $filename='images/pig.jpg';
               if(file_exists($filename)){
                   echo '<img src="images/pig.jpg" class="img-responsive">';
               }else
               {   echo'
        <img src="images/pig.png" class="img-responsive">';
               }
               ?>
           </div>

           </div>
       </div>

    <div class="col-md-7">
        <div class="panel panel-success">
            <div class="panel-body">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Type</a></li>
                    <li><a data-toggle="tab" href="#menu1">Plate</a></li>
                    <li><a data-toggle="tab" href="#menu2">Color</a></li>
<!--                    <li><a data-toggle="tab" href="#menu3">Time</a></li>-->
                    <li><a data-toggle="tab" href="#menu4">Make</a></li>
                </ul>

                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <h3>Type</h3>
                      <emp>  <?php
                        
                        $file_handle = fopen("file.txt", "r");
                        $line=fgets($file_handle);
                          echo $line;
                          fclose($file_handle);
                          ?></emp>
                    </div>
                    
                    <div id="menu1" class="tab-pane fade">
                        <h3>Plate</h3>
                        <emp><?php
                        $file_handle = fopen("reg.txt", "r");
                            $line=fgets($file_handle);
                            echo $line;
                            fclose($file_handle);
                            ?></emp>
                    </div>
                    
                    <div id="menu2" class="tab-pane fade">
                        <h3>Color</h3>
                        <emp><?php
                        $file_handle = fopen("color.txt", "r");
                            $line=fgets($file_handle);
                            echo $line;
                            fclose($file_handle);
                        ?></emp>
                    </div>
<!--
                    <div id="menu3" class="tab-pane fade">
                        <h3>Time</h3>
                        <emp>"12/07/2011 03:34:90"
                        </emp>
                    </div>
-->
                        <div id="menu4" class="tab-pane fade">
                        <H3>Make</H3>
                            <emp><?php
                        $file_handle = fopen("make.txt", "r");
                            $line=fgets($file_handle);
                            echo $line;
                            fclose($file_handle);
                        ?></emp>
                    </div>

                </div>
                <hr>
      <h4>Description/Tags</h4>
                <?php
                $file_handle = fopen("file.txt", "r");
while (!feof($file_handle)) {
   $line = fgets($file_handle);
   
   echo $line."<br>";
}
fclose($file_handle);
                ?>
            </div>
        </div>
    </div>
<div class="col-md-0"></div>
</div>
<hr>
    <div class="container-fluid">
    <div class="col-md-12">
        <div class="col-md-12">
        <div class="panel panel-primary">
        <div class="panel-heading">
            Developed By: Team: NoLuck-Exception</div>
         </div>
    </div>
    </div>
    </div>
    <div id="contents">
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