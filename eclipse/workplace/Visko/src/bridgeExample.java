import java.io.IOException;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import php.java.servlet.RemoteHttpServletContextFactory;

import edu.utep.trustlab.visko.planning.pipelines.PipelineSet;
import edu.utep.trustlab.visko.sparql.SPARQL_EndpointFactory;
import edu.utep.trustlab.visko.execution.*;
import edu.utep.trustlab.visko.planning.Query;
import edu.utep.trustlab.visko.planning.QueryEngine;

/**
 * Servlet implementation class Server
 * Super of all GUI Interface classes
 * this is who the 'JavaBridge' communicates to
 */

@WebServlet("/bridgeExample")
public class bridgeExample extends HttpServlet
{
	static int count = 0;
	/**
	 * 
	 */
	private static final long serialVersionUID = 1L;
	
	//TEST METHOD
	//this will be able to talk to any other Java class 
	//PHP will know what is the string, so we just pass this string in here 
	public static String javaMethodName()
	{
		System.out.println("begins");
		
		String query = getSampleQuery();
		
		System.out.println("got query");
		
		String getvisualization = practiceQuery(query);
		
		System.out.println("turned in query");
		
		String visualization = "Visualization: " + getvisualization;
		
		System.out.println("returning visualization to php");
		
		return visualization;
	
	}

	
	public static String practiceQuery(String queryString)
	{
		System.out.println("starts");
		
		//Specify Location of Triple Store (created with visko/visko-build/build with target build-triple-store)
		SPARQL_EndpointFactory.setUpEndpointConnection("visko-web/WebContent/registry-tdb/");
		
		
		System.out.println("gets here");

		Query query = new Query(queryString);
		
		System.out.println("and gets here");

		QueryEngine engine = new QueryEngine(query);
		
		PipelineSet pipes = engine.getPipelines();
		
		System.out.println("plus here");

		PipelineExecutor executor = new PipelineExecutor();
		
		System.out.println("then gets here");

		if(pipes.size() > 0){
			System.out.println(pipes.firstElement());
				
			PipelineExecutorJob job = new PipelineExecutorJob(pipes.firstElement());
			
			executor.setJob(job);
			
			//fork thread to run service
			executor.process();
		
			while(executor.isAlive()){
				System.out.println("executing serivce with index: " + job.getJobStatus().getCurrentServiceIndex());
				System.out.println("executing: " + job.getJobStatus().getCurrentServiceURI());
				System.out.println(job.getJobStatus().getPipelineState());
			}
			
			System.out.println("Did Job complete normally? " + job.getJobStatus().didJobCompletedNormally());
			System.out.println("Final Result = " + job.getFinalResultURL());
			
		
			return job.getFinalResultURL();
		}
		
		return "fail";
		
	}
	
	
	
	//TWO REQUIRED METHODS
	@Override
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException 
	{
		response.getWriter().write(	"Servlet is running!\n\n" +
									"Requests may begin");

	}
	
	
	/**
	 * @see HttpServlet#doPut(HttpServletRequest, HttpServletResponse)
	 */
	@Override
	protected void doPut(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		RemoteHttpServletContextFactory ctx = new RemoteHttpServletContextFactory(this, 
				  getServletContext(), request, request, response);

				response.setHeader("X_JAVABRIDGE_CONTEXT", ctx.getId());
				response.setHeader("Pragma", "no-cache");
				response.setHeader("Cache-Control", "no-cache");

				try { 
				  ctx.handleRequests(request.getInputStream(), response.getOutputStream()); 
				} finally { 
				  ctx.destroy(); 
				}
	}
	
	private static final String NEWLINE = "\n";
		
	public static String getSampleQuery(){
		String queryString =
				 	"PREFIX views http://openvisko.org/rdf/ontology/visko-view.owl#"  + NEWLINE +
				 	"PREFIX visko http://visko.cybershare.utep.edu:5080/visko-web/registry/module_webbrowser.owl#" + NEWLINE +
				 	"VISUALIZE http://visko.cybershare.utep.edu:5080/visko-web/test-data/jpl/20120717_120115_304_color.png" + NEWLINE +
				 	"AS views:3D_SurfacePlot IN visko:web-browser " + NEWLINE +
				 	"WHERE" + NEWLINE +
			        "FORMAT = http://openvisko.org/rdf/pml2/formats/PNG.owl#PNG" + NEWLINE +
			        "AND TYPE = http://www.w3.org/2002/07/owl#Thing";

		return queryString;	
	}
	
}
