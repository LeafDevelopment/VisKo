<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Visualize</title>
<script src="SpryAssets/SpryAccordion.js" type="text/javascript"></script>
<link href="SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/team2/sessionvars.js"></script>
<script type="text/javascript" src="/team2/setVariables.js"></script>

</head>
<style>
.one {
width: 40%;
    float: left;
}

.two {
    margin-left: 20%;
}
</style>






<body>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Visualize</title>
<script src="SpryAssets/SpryAccordion.js" type="text/javascript"></script>
<link href="SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/team2/sessionvars.js"></script>
<script type="text/javascript" src="/team2/setVariables.js"></script>

</head>
<style>
.one {
width: 40%;
    float: left;
}

.two {
    margin-left: 20%;
}
</style>
<body>
<div><center>Option 1: Submit Visualization Query
<form id="form1" name="form1" method="post" action="checkQuery.php">
<label for="queryText"></label>
<textarea name="queryText" id="queryText" cols="45" rows="5" onkeyup="checkTextArea()"></textarea>
<p>Syntax is <b id='syntaxStatus'>incorrect.</b> </p>
<p><input type="submit" value="Submit" name="Submit"></p>

<script>

var correctSyntax = false;
var abstraction = "";
var viewerSet = "";
var inputDataFormat = "";
var inputDataType = ""; //not required
var inputDataURL = ""; //not required

function showSyntaxStatus(){
    if(correctSyntax === false){
        document.getElementById('syntaxStatus').innerHTML = 'incorrect.';
    }
    else{
        document.getElementById('syntaxStatus').innerHTML = 'correct.';
    }
}
function checkTextArea(){
    var queryText = document.getElementById("queryText").value; //get input text
    
    if(!isEmpty(queryText)){
        queryText = queryText.replace(/\t/g, '');
        //alert(queryText.indexOf("\t"));
        queryText = queryText.trim();
        var queryArray = queryText.split(" ");
        //alert(queryArray[0].indexOf("\n"));
        queryArray = splitAtNewLine(queryArray);
        //alert(queryArray.toString());
        //var queryArrayLength = queryArray.length;
        
        //keeps track of keywords that can only be encountered once
        var visualize = false;
        var as = false;
        var where = false;
        var format = false;
        
        for(var i = 0; i<queryArray.length; i++){
            //alert(queryArray[i] === 'VISUALIZE');
            switch(queryArray[i]){
                case 'PREFIX':
                    if(!visualize){ //Visualization not encountered yet so check for prefixes
                        checkPrefix(queryArray.slice(i, queryArray.length));
                        i = i + 2 //move to the next block
                    }
                    else{
                        correctSyntax = false;
                        i = i + length; //exit loop
                    }
                    break;
                case 'VISUALIZE':
                    if(!visualize){ //No visualization item has been found
                        checkVisualize(queryArray.slice(i, queryArray.length));
                        visualize = true;
                        i++; //move to the next block
                    }
                    else{ //There was already a visualize item found
                        correctSyntax = false;
                        i = i + length; //exit loop
                    }
                    break;
                case 'AS':
                    if(visualize == true){ //Visualization found already
                        checkAs(queryArray.slice(i, queryArray.length));
                        as = true;
                        i = i + 3;
                    }
                    else{ //Visualization not found yet
                        correctSyntax = false;
                        i = i + length; //exit loop
                    }
                    break;
                case 'WHERE':
                    if(as == false){ //WHERE is out of order
                        correctSyntax = false;
                        i = i + length; //exit loop
                    }
                    where = true;
                    break;
                case 'FORMAT':
                    if(!where){ //Out of order
                        correctSyntax = false;
                        i = i + length; //exit loop
                    }
                    else{ //Format is in order
                        checkFormat(queryArray.slice(i, queryArray.length));
                        format = true;
                        i = i + 2;
                    }
                    break;
                case 'AND':
                    if(!format){ //Out of order
                        correctSyntax = false;
                        i = i + length; //exit loop
                    }
                    else{ //Format is in order
                        checkAnd(queryArray.slice(i, queryArray.length));
                        i = i + 3;
                    }
                    break;
                default:
                    correctSyntax = false;
                    //checkEnd(i, queryArrayLength, queryArray[i]); //Checks to see if the last element is a space or more input
            }
            //alert(queryArray.length);
        }
    }
    showSyntaxStatus(); //Update syntax text
    
}

function checkPrefix(queryArray){
    correctSyntax = false; //reset each time
    if(queryArray[0]==="PREFIX" && !isEmpty(queryArray[1]) && !isEmpty(queryArray[2])){
        if(!queryArray[1] === ' ' && !queryArray[2] === ' '){ //Check the second and third parameters are not a space
            correctSyntax = true;
        }
    }
}

function checkVisualize(queryArray){
    correctSyntax = false; //reset each time
    if(queryArray[0]==="VISUALIZE" && !isEmpty(queryArray[1])){
        if(!queryArray[1] === ' '){ //Check the second parameter is not a space
            correctSyntax = true;
        }
    }
}

function checkAs(queryArray){
    correctSyntax = false; //reset each
    if(queryArray[0]==="AS" && queryArray[2]==="IN"){
        //Check the second and third parameters are not a space
        abstraction = queryArray[1].substring(queryArray[1].indexOf(":") + 1); //the abstraction is everything after :
        viewerSet = queryArray[3].substring(queryArray[3].indexOf(":") + 1); //the viewer set is everything after :
        
        if(!(isEmpty(abstraction)) && !(isEmpty(viewerSet)) ){
            correctSyntax = true;
        }
    }
}

function checkFormat(queryArray){
    correctSyntax = false; //reset each time
    if(queryArray[0]==="FORMAT" && queryArray[1]==="="){
        inputDataFormat = queryArray[2].substring(queryArray[2].indexOf("#") + 1); // the format is everything after #
        if(!(isEmpty(inputDataFormat))){ //Check the second and third parameters are not a space
            correctSyntax = true;
        }
    }
}

function checkAnd(queryArray){
    correctSyntax = false; //reset each time
    
    //Check for the input data type and store that value
    if(queryArray[0]==="AND" && queryArray[1]==="TYPE" && queryArray[2]==="="){
        inputDataType = queryArray[3].substring(queryArray[3].indexOf(":") + 1); // the type is everything after :
        
        if(!(isEmpty(inputDataType))){
            correctSyntax = true;
        }
    }
    
    //Check for the input data url and store that value
    else if(queryArray[0]==="AND" && queryArray[1]==="URL" && queryArray[2]==="="){
        inputDataURL = queryArray[3].substring(queryArray[3].indexOf(":") + 1); // the url is everything after :
        
        if(!(isEmpty(inputDataURL))){
            correctSyntax = true;
        }
    }
    
    //Check for any other AND value
    else if(queryArray[0]==="AND" && !isEmpty(queryArray[1]) && queryArray[2]==="=" && !isEmpty(queryArray[3])){
        correctSyntax = true;
    }
}

function isEmpty(str) {
    return (!str || 0 === str.length);
}

function sendInfo() {
    
    //alert("the abstraction was : " + abstraction + "\nthe viewerSet was : " + viewerSet + "\ndata format : " + inputDataFormat);
    //alert("the input data type was : " + inputDataType + "\n the input data url was : " + inputDataURL);
    
    var readyToSend = true;
    
    if(isEmpty(abstraction) || isEmpty(viewerSet) || isEmpty(inputDataFormat)){
        readyToSend = false;
    }
    
    if(!readyToSend){
        alert("not ready to send!");
    }
    
    else{
        alert("ready to send!");
        
        setQueryText(abstraction, viewerSet, inputDataFormat, inputDataType, inputDataURL);
        
    }
}

function splitAtNewLine(queryArray){
    var fixedArray = new Array();
    
    /*if(queryArray[0].indexOf("\n") === 0){
     queryArray[0] = queryArray[0].substring(1);
     }
     */
    //go through the array and split every string that has a new line character in it
    for(var i = 0; i < queryArray.length; i++){
        
        //Checks if the current string has a new line character or a tab character
        if(queryArray[i].indexOf("\n") != -1) {
            
            var newArray = removeSpecialCharacters(queryArray[i]);
            
            for(var j = 0; j < newArray.length; j++){
                fixedArray.push(newArray[j]);
            }
            //fixedArray.concat(removeSpecialCharacters(queryArray[i])); //split the string with \n and add it to the end of fixed array
        }
        else{ //if the current string has no new line characters add it to the fixed array
            fixedArray.push(queryArray[i]);
        }
    }
    
    //alert('length of array that came in ' + queryArray.length + '\n length of array that came out '+ fixedArray.length);
    //alert(fixedArray.length);
    //alert(fixedArray.toString());
    return fixedArray;
}

function removeSpecialCharacters(string){
    var noNewLineArray = string.split("\n");
    //var noTabArray = new Array(); //an array of strings that have no new line or tab character
    
    /*
     for(var i = 0; i < noNewLineArray.length; i++){
     if(!isEmpty(noNewLineArray[i]) ){ //check the string is not empty
     if(noNewLineArray[i].indexOf("\t") != -1){
     var splitArray = noNewLineArray[i].split("\t");
     
     for(var j = 0; j < splitArray.length; j++){
     noTabArray.push(splitArray[i]);
     }
     }
     
     else{
     noTabArray.push(noNewLineArray[i]);
     }
     }
     }
     */
    
    //alert('string that came in ' + string + '\narray that came out is size '+ noTabArray.length);
    //return noTabArray;
    
    return noNewLineArray;
}

function removeNewLine(string){//remove new line characters
    return string.split("\n");
}

function removeTab(string){//remove tab character
    return string.split("\t");
}
</script>
</form>
<br />
<center>
Option 2: Interact with Generation Wizard
</center>
<br />
<br />
<div id="Accordion1" class="Accordion" tabindex="0">
<div class="AccordionPanel">
<center><div class="AccordionPanelTab">1D Abstractions</div></center>
<div class="AccordionPanelContent">
<div onclick="setAbstraction(this.id);" class="absch" id="http://openvisko.org/rdf/ontology/visko-view.owl#1D_Timeline">
<p>1. Timeline</p>
<p><div class="one"><img src="http://upload.wikimedia.org/wikipedia/commons/2/29/Minard.png" alt="" name="abstraction" width="200" height="110" id="abstraction" style="background-color: #3333FF" /></div>
<div class="two">A timeline is a way of displaying a list of events in chronological order, sometimes described as a project artifact. It is typically a graphic design showing a long bar labelled with dates alongside itself and (usually) events labelled on points where they would have happened.</div></p>
<p>&nbsp;</p>
</div>
</div>
</div>
<div class="AccordionPanel">
<center><div class="AccordionPanelTab">2D Abstractions</div></center>
<div class="AccordionPanelContent">

<div onclick="setAbstraction(this.id);" class="abstraction" id="http://openvisko.org/rdf/ontology/visko-view.owl#2D_ContourMap">
<p>1. Contour Map</p>
<p><div class="one"><img src="http://upload.wikimedia.org/wikipedia/commons/6/68/IGRF_2000_magnetic_declination.gif" alt="" name="abstraction" width="200" height="110" id="abstraction" style="background-color: #3333FF" /></div>
<div class="two">A contour line (also isoline, isopleth, or isarithm) of a function of two variables is a curve along which the function has a constant value.[1] In cartography, a contour line (often just called a "contour") joins points of equal elevation (height) above a given level, such as mean sea level.[2] A contour map is a map illustrated with contour lines, for example a topographic map, which thus shows valleys and hills, and the steepness of slopes.[3] The contour interval of a contour map is the difference in elevation between successive contour lines.</div></p>
<p>&nbsp;</p>
</div>
<br />

<div onclick="setAbstraction(this.id);" class="abstraction" id="http://openvisko.org/rdf/ontology/visko-view.owl#2D_ForceGraph">
<p>2. Force Graph</p>
<p><div class="one"><img src="http://upload.wikimedia.org/wikipedia/commons/9/90/Visualization_of_wiki_structure_using_prefuse_visualization_package.png" alt="" name="abstraction" width="200" height="110" id="abstraction" style="background-color: #3333FF" /></div>
<div class="two">Force-directed graph drawing algorithms are a class of algorithms for drawing graphs in an aesthetically pleasing way. Their purpose is to position the nodes of a graph in two-dimensional or three-dimensional space so that all the edges are of more or less equal length and there are as few crossing edges as possible, by assigning forces among the set of edges and the set of nodes, based on their relative positions, and then using these forces either to simulate the motion of the edges and nodes or to minimize their energy.</div></p>
<p>&nbsp;</p>
</div>
<br />

<div onclick="setAbstraction(this.id);" class="abstraction" id="http://openvisko.org/rdf/ontology/visko-view.owl#2D_PointMap">
<p>3. Point Map</p>
<p><div class="one"><img src="http://www.rockware.com/assets/products/165/features/980/3506/rockworks_pointmapsb.gif" alt="" name="abstraction" width="200" height="110" id="abstraction" style="background-color: #3333FF" /></div>
<div class="two">Missed approach point (MAP or MAPt) is the point prescribed in each instrument approach at which a missed approach procedure shall be executed if the required visual reference does not exist.[1] It defines the point for both precision and non-precision approaches where the missed approach segment of an approach procedure begins. A pilot must execute a missed approach if a required visual reference (normally the runway or its environment) is not in sight upon reaching the MAP or the pilot decides it is unsafe to continue with the approach and landing to the runway. The missed approach point is published in the approach plates and contains instructions for missed approach procedures to be executed at this point.</div></p>
<p>&nbsp;</p>
</div>
<br />

<div onclick="setAbstraction(this.id);" class="abstraction" id="http://openvisko.org/rdf/ontology/visko-view.owl#2D_RasterMap">
<p>4. Raster Map</p>
<p><div class="one"><img src="http://www.mglavionics.co.za/Images/Odyssey%20screen%205%20raster%20map.jpg" alt="" name="abstraction" width="200" height="110" id="abstraction" style="background-color: #3333FF" /></div>
<div class="two">In computer graphics, a raster graphics image, or bitmap, is a dot matrix data structure representing a generally rectangular grid of pixels, or points of color, viewable via a monitor, paper, or other display medium. Raster images are stored in image files with varying formats.</div></p>
<p>&nbsp;</p>
</div>
<br />

<div onclick="setAbstraction(this.id);" class="abstraction" id="http://openvisko.org/rdf/ontology/visko-view.owl#2D_SpeciesDistribution_Map">
<p>5. Species Distribution Map</p>
<p><div class="one"><img src="http://upload.wikimedia.org/wikipedia/en/c/ce/Juniperus_communis_range_map.gif" alt="" name="abstraction" width="200" height="110" id="abstraction" style="background-color: #3333FF" /></div>
<div class="two">Species distribution is the manner in which a biological taxon is spatially arranged. Species distribution is not to be confused with dispersal, which is the movement of individuals away from their area of origin or from centers of high population density. A similar concept is the species range. A species range is often represented with a species range map. Biogeographers try to understand the factors determining a species' distribution. The pattern of distribution is not permanent for each species. Distribution patterns can change seasonally, in response to the availability of resources, and also depending on the scale at which they are viewed. Dispersion usually takes place at the time of reproduction. Populations within a species are translocated through many methods, including dispersal by people, wind, water and animals. Humans are one of the largest distributors due to the current trends in globalization and the expanse of the transportation industry. For example, large tankers often fill their ballasts with water at one port and empty them in another, causing a wider distribution of aquatic species.</div></p>

</div>
<br />

<div onclick="setAbstraction(this.id);" class="abstraction" id="http://openvisko.org/rdf/ontology/visko-view.owl#2D_SpherizedRaster">
<p>6. Spherized Raster</p>
<p><div class="one"><img src="http://2.bp.blogspot.com/-aAgRWVP7pPs/UaYdVdk5FAI/AAAAAAAAAxY/fueZ8WSFQAQ/s1600/sphereoid.PNG" alt="" name="abstraction" width="200" height="110" id="abstraction" style="background-color: #3333FF" /></div>
<div class="two">To spherize an image, you must map it onto the surface of a sphere. Like the wave effect, this requires a fair amount of calculations using trigonometry.</div></p>
<p>&nbsp;</p><p>&nbsp;</p>
</div>
<br />

<div onclick="setAbstraction(this.id);" class="abstraction" id="http://openvisko.org/rdf/ontology/visko-view.owl#2D_TimeSeriesPlot">
<p>7. Time Series Plot</p>
<p><div class="one"><img src="http://upload.wikimedia.org/wikipedia/commons/7/77/Random-data-plus-trend-r2.png" alt="" name="abstraction" width="200" height="110" id="abstraction" style="background-color: #3333FF" /></div>
<div class="two">A time series is a sequence of data points, measured typically at successive points in time spaced at uniform time intervals. Examples of time series are the daily closing value of the Dow Jones Industrial Average and the annual flow volume of the Nile River at Aswan. Time series are very frequently plotted via line charts. Time series are used in statistics, signal processing, pattern recognition, econometrics, mathematical finance, weather forecasting, earthquake prediction, electroencephalography, control engineering, astronomy, and communications engineering .</div></p>
<p>&nbsp;</p>
</div>
<br />

<div onclick="setAbstraction(this.id);" class="abstraction" id="http://openvisko.org/rdf/ontology/visko-view.owl#2D_VisKo_DataTransformations_ForceGraph">
<p>8. VisKo Data Transformations Force Graph</p>
<p><div class="one"><img src="http://www.stanford.edu/~messing/i96e-kk.jpeg" alt="" name="abstraction" width="200" height="110" id="abstraction" style="background-color: #3333FF" /></div>
<div class="two">Data clustering is essential problem in database technology – successful solutions in this field provide data storing and accessing optimizations, which yield better performance characteristics. Another advantage of clustering is in relation with ability to distinguish similar data patterns and semantically interconnected entities. This in turn is very valuable for data mining and knowledge discovery activities. Although many general clustering strategies and algorithms were developed in past years, this search is still far from end, as there are many potential implementation fields, each stating its own unique requirements. This paper describes data clustering based on original spatial partitioning of force-based graph layout, which provides natural way for data organization in relational databases. Practical usage of developed approach is demonstrated.</div></p>
<p>&nbsp;</p>
</div>
<br />

<div onclick="setAbstraction(this.id);" class="abstraction" id="http://openvisko.org/rdf/ontology/visko-view.owl#2D_VisKo_Instances_BarChart">
<p>9. VisKo Instances Bar Chart</p>
<p><div class="one"><img src="http://www.enfovis.com/wp-content/uploads/2010/10/Bar-Graph-showing-Time.jpg" alt="" name="abstraction" width="200" height="110" id="abstraction" style="background-color: #3333FF" /></div>
<div class="two">A bar chart or bar graph is a chart with rectangular bars with lengths proportional to the values that they represent. The bars can be plotted vertically or horizontally. A vertical bar chart is sometimes called a column bar chart.</div></p>
<p>&nbsp;</p>
</div>
<br />

<div onclick="setAbstraction(this.id);" class="abstraction" id="http://openvisko.org/rdf/ontology/visko-view.owl#2D_VisKo_OperatorPaths_ForceGraph">
<p>10. VisKo Operator Paths Force Graph</p>
<p><div class="one"><img src="http://posecco.eu/fileadmin/POSECCO/user_upload/images/Vulnerability_Assessment/vul1.jpg" alt="" name="abstraction" width="200" height="110" id="abstraction" style="background-color: #3333FF" /></div>
<div class="two">Force-directed graph drawing algorithms are a class of algorithms for drawing graphs in an aesthetically pleasing way. Their purpose is to position the nodes of a graph in two-dimensional or three-dimensional space so that all the edges are of more or less equal length and there are as few crossing edges as possible, by assigning forces among the set of edges and the set of nodes, based on their relative positions, and then using these forces either to simulate the motion of the edges and nodes or to minimize their energy.</div></p>
<p>&nbsp;</p>
</div>
<br />
</div>
</div>
<div class="AccordionPanel">
<center><div class="AccordionPanelTab">3D Abstractions</div></center>
<div class="AccordionPanelContent">

<div onclick="setAbstraction(this.id);" class="abstraction" id="http://openvisko.org/rdf/ontology/visko-view.owl#3D_BarChart">
<p>1. Bar Chart</p>
<p><div class="one"><img src="http://wc1.smartdraw.com/examples/content/examples/03_charts/1_bar_charts/older_population_expressed_in_a_3d_bar_chart_l.jpg" alt="" name="abstraction" width="200" height="110" id="abstraction" style="background-color: #3333FF" /></div>
<div class="two">A bar chart or bar graph is a chart with rectangular bars with lengths proportional to the values that they represent. The bars can be plotted vertically or horizontally. A vertical bar chart is sometimes called a column bar chart.</div></p>
<p>&nbsp;</p>
</div>
<br />

<div onclick="setAbstraction(this.id);" class="abstraction" id="http://openvisko.org/rdf/ontology/visko-view.owl#3D_IsoSurfacesRendering">
<p>2. Iso Sufaces Rendering</p>
<p><div class ="one"><img src="http://upload.wikimedia.org/wikipedia/en/c/c2/Isosurface_on_molecule.jpg" alt="" name="abstraction" width="200" height="110" id="abstraction" style="background-color: #3333FF" /></div>
<div class ="two">An isosurface is a three-dimensional analog of an isoline. It is a surface that represents points of a constant value (e.g. pressure, temperature, velocity, density) within a volume of space; in other words, it is a level set of a continuous function whose domain is 3D-space.
Isosurfaces are normally displayed using computer graphics, and are used as data visualization methods in computational fluid dynamics (CFD), allowing engineers to study features of a fluid flow (gas or liquid) around objects, such as aircraft wings. An isosurface may represent an individual shock wave in supersonic flight, or several isosurfaces may be generated showing a sequence of pressure values in the air flowing around a wing. Isosurfaces tend to be a popular form of visualization for volume datasets since they can be rendered by a simple polygonal model, which can be drawn on the screen very quickly.</div></p>
<p>&nbsp;</p>
</div>
<br />

<div onclick="setAbstraction(this.id);" class="abstraction" id="http://openvisko.org/rdf/ontology/visko-view.owl#3D_MeshPlot">
<p>3. Mesh Plot</p>
<p><div class="one"><img src="http://upload.wikimedia.org/wikipedia/commons/thumb/c/c4/MATLAB_mesh_sinc3D.svg/512px-MATLAB_mesh_sinc3D.svg.png" alt="" name="abstraction" width="200" height="110" id="abstraction" style="background-color: #3333FF" /></div>
<div class="two">A lattice graph, mesh graph, or grid graph, is a graph whose drawing, embedded in some Euclidean space Rn, forms a regular tiling. This implies that the group of bijective transformations that send the graph to itself is a lattice in the group-theoretical sense.</div></p>
<p>&nbsp;</p>
</div>
<br />

<div onclick="setAbstraction(this.id);" class="abstraction" id="http://openvisko.org/rdf/ontology/visko-view.owl#3D_MolecularStructure">
<p>4. Molecular Structure</p>
<p><div class="one"><img src="http://www.wired.com/images_blogs/wiredscience/2013/08/test-molecule.jpg" alt="" name="abstraction" width="200" height="110" id="abstraction" style="background-color: #3333FF" /></div>
<div class="two">Molecular geometry is the three-dimensional arrangement of the atoms that constitute a molecule. It determines several properties of a substance including its reactivity, polarity, phase of matter, color, magnetism, and biological activity.[1][2] The angles between bonds that an atom forms depend only weakly on the rest of molecule, i.e. they can be understood as approximately local and hence transferable properties.</div></p>
<p>&nbsp;</p>
</div>
<br />

<div onclick="setAbstraction(this.id);" class="abstraction" id="http://openvisko.org/rdf/ontology/visko-view.owl#3D_MolecularStructure_Cartoon">
<p>5. Molecular Structure Cartoon</p>
<p><div class="one"><img src="http://www.bio.davidson.edu/courses/molbio/molstudents/spring2005/heiner/hemoglobin_molecular_structure.jpg" alt="" name="abstraction" width="200" height="110" id="abstraction" style="background-color: #3333FF" /></div>
<div class="two">The structural formula of a chemical compound is a graphic representation of the molecular structure, showing how the atoms are arranged. The chemical bonding within the molecule is also shown, either explicitly or implicitly. Also several other formats are used, as in chemical databases, such as SMILES, InChI and CML.</div></p>
<p>&nbsp;</p>
</div>
<br />

<div onclick="setAbstraction(this.id);" class="abstraction" id="http://openvisko.org/rdf/ontology/visko-view.owl#3D_MolecularStructure_Ribbon">
<p>6. Molecular Structure Ribbon</p>
<p><div class="one"><img src="http://wallpaperskd.com/wp-content/uploads/2012/10/Chemical-Structure-3d.jpg" alt="" name="abstraction" width="200" height="110" id="abstraction" style="background-color: #3333FF" /></div>
<div class="two">Molecular geometry is the three-dimensional arrangement of the atoms that constitute a molecule. It determines several properties of a substance including its reactivity, polarity, phase of matter, color, magnetism, and biological activity.[1][2] The angles between bonds that an atom forms depend only weakly on the rest of molecule, i.e. they can be understood as approximately local and hence transferable properties.</div></p>
<p>&nbsp;</p>
</div>
<br />

<div onclick="setAbstraction(this.id);" class="abstraction" id="http://openvisko.org/rdf/ontology/visko-view.owl#3D_PointPlot">
<p>7. Point Plot</p>
<p><div class="one"><img src="http://i.stack.imgur.com/I5e8b.png" alt="" name="abstraction" width="200" height="110" id="abstraction" style="background-color: #3333FF" /></div>
<div class="two">Point plotting is an elementary mathematical skill required in analytic geometry. Invented by René Descartes and originally used to locate positions on military maps, this skill is now assumed of everyone who wants to locate grid 7A on any map.</div></p>
<p>&nbsp;</p>
</div>
<br />

<div onclick="setAbstraction(this.id);" class="abstraction" id="http://openvisko.org/rdf/ontology/visko-view.owl#3D_RasterCube">
<p>8. Raster Cube</p>
<p><div class="one"><img src="https://pbs.twimg.com/media/BB9SMUeCEAEKbcN.jpg" alt="" name="abstraction" width="200" height="110" id="abstraction" style="background-color: #3333FF" /></div>
<div class="two">A raster layer is an image with each pixel representing one data value. The contrast and brightness of the image are based on the values selected in the Properties dialog. A raster layer is sometimes created as results from an algorithm plug-in.</div></p>
<p>&nbsp;</p>
</div>
<br />

<div onclick="setAbstraction(this.id);" class="abstraction" id="http://openvisko.org/rdf/ontology/visko-view.owl#3D_SurfacePlot">
<p>9. Surface Plot</p>
<p><div class="one"><img src="http://www.dplot.com/examples/surface-plot-phong-shading.png" alt="" name="abstraction" width="200" height="110" id="abstraction" style="background-color: #3333FF" /></div>
<div class="two">A contour line (also isoline, isopleth, or isarithm) of a function of two variables is a curve along which the function has a constant value.[1] In cartography, a contour line (often just called a "contour") joins points of equal elevation (height) above a given level, such as mean sea level.[2] A contour map is a map illustrated with contour lines, for example a topographic map, which thus shows valleys and hills, and the steepness of slopes.[3] The contour interval of a contour map is the difference in elevation between successive contour lines.</div></p>
<p>&nbsp;</p>
</div>
<br />

<div onclick="setAbstraction(this.id);" class="abstraction" id="http://openvisko.org/rdf/ontology/visko-view.owl#3D_VolumeRendering">
<p>10. Volume Rendering</p>
<p><div class="one"><img src="http://www.vacet.org/gallery/images_video/AMRVolRend.png" alt="" name="abstraction" width="200" height="110" id="abstraction" style="background-color: #3333FF" /></div>
<div class="two">In scientific visualization and computer graphics, volume rendering is a set of techniques used to display a 2D projection of a 3D discretely sampled data set.
A typical 3D data set is a group of 2D slice images acquired by a CT, MRI, or MicroCT scanner. Usually these are acquired in a regular pattern (e.g., one slice every millimeter) and usually have a regular number of image pixels in a regular pattern. This is an example of a regular volumetric grid, with each volume element, or voxel represented by a single value that is obtained by sampling the immediate area surrounding the voxel.</div></p>
<p>&nbsp;</p>
</div>
<br />
</div>
</div>
<script type="text/javascript">
var Accordion1 = new Spry.Widget.Accordion("Accordion1");

</script>
</body>
</html>