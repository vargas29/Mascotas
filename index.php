<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
   

<body>
    <div class="container">
    		<div class="row">
            <img align="center" src="img/fondo.jpg"  >
       		</div>
                 <nav class="navbar navbar-default">
                  <div class="container-fluid">
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="#">Brand</a>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Administracion <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">Ventas</a></li>
                        <li><a href="#">servicios</a></li>
                        <li><a href="#">Kadex</a></li>
                        <li><a href="#">Facturacion</a></li>


                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                            <li class="divider"></li>
                            <li><a href="#">One more separated link</a></li>
                          </ul>
                        </li>
                      </ul>
                     
                       <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                      </ul>
                    </div>
                  </div>
                </nav>


			<div class="row">
				
				<ul>
				  <li><a href="clientes.php" class="btn btn-success">clientes</a></li>
				  <li><a href="proveedor.php" class="btn btn-success">proveedor</a></li>
				  <li><a href="articulo.php" class="btn btn-success">Articulos</a></li>
				  <li><a href="servicios.php" class="btn btn-success">Servicios</a></li>
				</ul>
    	</div>
    </div> <!-- /container -->
     <script src="js/bootstrap.min.js"></script>
    <script src="js/dropdown.js"></script>
    <script src="js/jquery-1.11.2.js"></script>

    <script type="text/javascript"  src="js/bootswatch.js">  </script>
    <script type="text/javascript">


     
/* <![CDATA[ */
(function(){try{var s,a,i,j,r,c,l=document.getElementsByTagName("a"),t=document.createElement("textarea");
    for(i=0;l.length-i;i++){try{a=l[i].getAttribute("href");
    if(a&&a.indexOf("/cdn-cgi/l/email-protection") > -1  && (a.length > 28)){s='';j=27+ 1 + a.indexOf("/cdn-cgi/l/email-protection");
if (a.length > j) {r=parseInt(a.substr(j,2),16);
    for(j+=2;a.length>j&&a.substr(j,1)!='X';j+=2){c=parseInt(a.substr(j,2),16)^r;
        s+=String.fromCharCode(c);}j+=1;s+=a.substr(j,a.length-j);}t.innerHTML=s.replace(/</g,"&lt;").replace(/>/g,"&gt;");l[i].setAttribute("href","mailto:"+t.value);}}catch(e){}}}catch(e){}})();
/* ]]> */

    
    </script>

    <script type="text/javascript" async="" src="http://www.google-analytics.com/ga.js"></script>
</head>
  </body>
</html>