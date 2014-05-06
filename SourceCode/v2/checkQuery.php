
<!--Import Header with VisKo logo-->
<?php
	require_once("regHeader.inc");
    require_once("dbc.inc");
    ?>

<!-- start visko-->
<link rel="stylesheet" type="text/css" href="style1.css" media="screen" />

<div id="wrapper">
<div id="main_container">
<div>
<br/><br/>
<!-- Import Navigation side bar for regular user-->

<?php
    require_once("regNavigation.inc");
	?>

<!--Body of regular user home page-->
<div id="middle_box">
<div class="middle_box_content">

<?php
//3 lines to include in every page that needs to talk to Java
define ("JAVA_HOSTS", "localhost:8080");
define ("JAVA_SERVLET", "/Visko/example");
require_once("Java.inc")
?>

<script type="text/javascript">

var table;

function drawTable(tbody,id) {

    var img = document.createElement('img');
    img.src = "loading4.gif";
    img.style.height = '50px';
    img.style.width = '50px';
    
    
    var tr, td;

    tbody = document.getElementById(tbody);
    // loop through data source
  
        tr = tbody.insertRow(tbody.rows.length);
        td = tr.insertCell(tr.cells.length);
        td.setAttribute("align", "center");
        td.innerHTML = id;
        td = tr.insertCell(tr.cells.length);
        td.appendChild(img);
        td = tr.insertCell(tr.cells.length);
        td.innerHTML="<button onclick='myFunction(" + (tr.rowIndex - 1) + ")'>Remove</button>";
    
    
}

function myFunction(id)
{
    
    var table = document.getElementById("matchData");
    
    table.deleteRow(id);
    
}


function refresh()
{
    
    var status = "<?php $status=java_context()->getServlet()->updateJobStatus(); echo $status;?>";
    
    if(status!="")
    {
        var index="<?php $getIndex=java_context()->getServlet()->getVisualizationIndex(); echo $getIndex;?>";
        
        myFunction(index);
        drawTable2("matchData",index,status);
    }
    
    var refTab = document.getElementById("matchData");
    
}

function drawTable2(tbody,id,pic) {
    
    var img = document.createElement('img');
    img.src = pic;
    img.style.height = '50px';
    img.style.width = '50px';
    
    
    var tr, td;
    
    tbody = document.getElementById(tbody);
    // loop through data source
    
    tr = tbody.insertRow(tbody.rows.length);
    td = tr.insertCell(tr.cells.length);
    td.setAttribute("align", "center");
    td.innerHTML = id;
    td = tr.insertCell(tr.cells.length);
    td.appendChild(img);
    td = tr.insertCell(tr.cells.length);
    td.innerHTML="<button onclick='myFunction(" + (tr.rowIndex - 1) + ")'>Remove</button>";
    
}



</SCRIPT>
                  <?php
                  
                  
                
                  
                  
                  $query=$_POST['queryText'];
                  
                  //check query syntax
   
                  //$javaCheck=java_context()->getServlet()->practiceQuery($query);
                  //echo "Java checks query<br/>'".$javaCheck."'";
                  
                      
                  
                  
                  //get details
                  $javaExec=java_context()->getServlet()->executeQuery($query);
                  //echo "Details:<br/>'".$javaExec."'";
                  
                  
                  //getPipelinesSize
                  $pipeSize=java_context()->getServlet()->pipeSize();
                  //echo $pipeSize;
                  
                  
                  //get abstractions and split
                  $jAbs=java_context()->getServlet()->abstractions();
                  $abstraction = explode(":", $jAbs);
                  
                  //get formats and split
                  $jFormat=java_context()->getServlet()->formats();
                  $format = explode(":", $jFormat);
                  
                  //get outputs and split
                  $jOutput=java_context()->getServlet()->outputs();
                  $output = explode(":", $jOutput);
                  
            
                  
                  
                  
                  ?>
                  
                  
                  
                  
                  </div>
                  </div>
                  
                  </div>
                  
                  <div id="middle_box">
                  
                  
                  
                  
                  
                  <!DOCTYPE html>
                  <html>
                  
                  <head>
                  <style>
                  table,th,td
                  {
                  border:1px solid black;
                  border-collapse:collapse;
                  }
                  th,td
                  {
                  padding:5px;
                  }
                  th
                  {
                  text-align:left;
                  }
                  </style>
                  </head>
                  
                  <body>
                  <table id="div1" style="float:left; margin-right:10px;" border="1" width="280px">
                <h3>Pipelines</h1>
                  <tr>
                  <th>ID</th>
                  <th>Abstractions</th>
                  <th>Output</th>
                  <th>Format</th>
                  <th></th>
                  <th></th>
                  </tr>
                  
                  
                  
                  
                  
                  <tr>
                  <tr>
                  
                  <?php
                  error_reporting(0);
                      
                  
                  for ($i = 0; $i <= $pipeSize-1; $i++) {
                      
                      
        
                  
                  ?><td><?php echo $i;?></td>
                  <td><?php echo $abstraction[$i];?></td>
                  <td><?php echo $output[$i];?></td>
                  <td><?php echo $format[$i];?></td>
                  <td><button type="submit">Edit</button></td>
                  <td>
                  <button onclick="drawTable('matchData',<?php $execute=java_context()->getServlet()->executePipeline3($i); echo json_encode($i); ?>)">Run</button>
                  </td>
                  <tr>
                  <?php  }
                      
                      
                      $details=java_context()->getServlet()->getPipeInfo(0);
                      $dArray = explode("|", $details);
                      $user=$_SESSION['email'];
        
                      
                      $sql="INSERT INTO Pipeline(abstraction, url, viewerset, sourceformat, sourcetype, targettype, targetformat, user, date, query, outputformat, error) 
                      VALUES ('$dArray[0]', '$dArray[1]', '$dArray[2]', '$dArray[3]', '$dArray[4]','PNG', 'PNG', '$user', '05-06-2014', '$dArray[5]', '$dArray[6]', '$dArray[7]')";
                      
                      if (!mysql_query($sql,$connection))
                      {
                          die('Error:' .mysql_error());
                      }
                      
                  ?>

                  
                  
                  </tr>
                  </table>
                  
                  
                  
                  <table id="div" style="float:left" border="1" width="200px" name"results">
                  <thead>
                    <h3>Execution Queue</h3>
                  <tr><th>ID</th>
                  <th>Results</th>
                  <th></th>
                  </tr>
                  </thead>
                  <tbody id="matchData"></tbody>
                  </table>
            
                    


                    <button onclick="refresh()">Refresh</button>
                  
                  </body>
                  
                  </html>
                  
                  
                  
                  
