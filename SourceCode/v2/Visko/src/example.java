import java.io.IOException;
import java.util.ArrayList;

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

@WebServlet("/example")
public class example extends HttpServlet
{
	static int count = 0;
	static int counter = 0;
	static PipelineSet pipes; 
	
	static boolean activeJob = false;
	
	static Query sourceQuery;
	
	static PipelineExecutorJob job;
	static PipelineExecutor executor;
	
	//Will store all the jobs, pipeline executions, to be removed from the system
	static ArrayList<PipelineExecutorJob> completedJobs = new ArrayList<PipelineExecutorJob>();
	static ArrayList<PipelineExecutorJob> jobs = new ArrayList<PipelineExecutorJob>();
	/**
	 * 
	 */
	private static final long serialVersionUID = 1L;
	
	//TEST METHOD
	//this will be able to talk to any other Java class 
	//PHP will know what is the string, so we just pass this string in here 


	

	
	public int pipeSize(){
		int size=pipes.size();
		return size;
	}
	
	public PipelineSet getPipeSet(){
		return pipes;
	}
	
	public void executeQuery(String queryString){
		
		SPARQL_EndpointFactory.setUpEndpointConnection("visko-web/WebContent/registry-tdb/");
	   	 //completedJobs.removeAll(completedJobs);
	   	 //jobs.removeAll(jobs);
		completedJobs=new ArrayList<PipelineExecutorJob>();
		jobs=new ArrayList<PipelineExecutorJob>();
		Query query = new Query(getSampleQuery());
	   	QueryEngine engine = new QueryEngine(query);
	   	sourceQuery=query;
	   	 pipes = engine.getPipelines();
	   	 System.out.println("pipeline test: " + pipes.size());
	    }
	
	
	
	
	public String abstractions()
	{
	    String abs="";
		
		for(int i=0; i<pipes.size(); i++)
			
		{
			abs+=splitAtHashtag(pipes.get(i).getViewURI())+":";
		}
	
		return abs;
	}
	
	
	public String outputs()
	{
	    String out="";
		
		for(int i=0; i<pipes.size(); i++)
			
		{
			out+=splitAtHashtag(pipes.get(i).getOutputFormat())+":";
		}
	
		return out;
	}
	
	public String formats()
	{
	    String format="";
		
		for(int i=0; i<pipes.size(); i++)
			
		{
			format+=splitAtHashtag(pipes.get(i).getToolkitThatGeneratesView())+":";
		}
	
		return format;
	}
       
       public void executePipeline3(int pipeIndex){
    	   
    	   //If no active job then begin execution right away
    	   if(!activeJob){
	    	   executor = new PipelineExecutor();
	    	   job = new PipelineExecutorJob(pipes.get(pipeIndex));
	    	   
	    	   executor.setJob(job);
	    	   executor.process();
	    	   
	    	   activeJob = true;
    	   }
    	   
    	   //Add to queue
    	   else{
    		   jobs.add(new PipelineExecutorJob(pipes.get(pipeIndex)));
    	   }
    	   
       }
		
		public String updateJobStatus(){
		
			if(activeJob){
				System.out.println(executor.getJob().getJobStatus().isJobCompleted());
				if(executor.getJob().getJobStatus().isJobCompleted()){
					String visualization = job.getFinalResultURL();
					continueExecution();
					return visualization;
				}
				return "";
			}
			
			else
				return "";
		}
		
		public int getVisualizationIndex(){
			return completedJobs.size() - 1;
		}
		
		//Gets rid of the current job and sets the next one to be executed
		private void continueExecution(){
			
			if(!jobs.isEmpty()){
			//add the completed job
			completedJobs.add(job);
			job = jobs.get(0); //gets the next job to be executed
			jobs.remove(0);
			
			//begins the process
			executor.setJob(job);
			executor.process();
			activeJob = true;
			}
			
			else{
				completedJobs.add(job);
				activeJob = false;
			}
		}
		
		public String url(){
		   	 String url="";
		   	 
		   	 for(int i=0; i<pipes.size(); i++)
		   		 
		   	 {
		   		 url+=splitAtHashtag(pipes.get(i).getArtifactURL())+":";
		   	 }
		   	 
		   	 return url;
		    }
		    
		  public String getQuery(){
		   	 return sourceQuery.toString();
		    }
		
			public String viewerSet(){
			   	 String viewerSet="";
			   	 
			   	 for(int i=0; i<pipes.size(); i++)
			   		 
			   	 {
			   		 viewerSet+=splitAtHashtag(pipes.get(i).getViewer().toString())+":";
			   	 }
			   	 
			   	 return viewerSet;
			    }
		  
		
		//Will remove the item at the selected index
		public void removeQueueItem(int queueIndex){
			
			//Remove completed Jobs
			if(queueIndex < completedJobs.size()){
				completedJobs.remove(queueIndex);
			}
			//Remove currently running job
			else if(queueIndex == completedJobs.size()){
				continueExecution();
				
			}
			//Remove item to be executed
			else{
				jobs.remove(queueIndex - completedJobs.size() + 1);
			}
		}
		
		
		
		public String getPipeInfo(int index){
		   	 String pipeInfo = "";
		   	 
		   	 pipeInfo+= pipes.get(index).getViewURI() + "|";
		   	 pipeInfo+=pipes.get(index).getArtifactURL() + "|";
		   	 pipeInfo+=pipes.get(index).getViewer().toString() + "|";
		   	 pipeInfo+="http://openvisko.org/rdf/pml2/formats/PNG.owl#PNG|";
		   	 pipeInfo+="http://www.w3.org/2002/07/owl#Thing|";
		   	 pipeInfo+=sourceQuery.toString();
		   	 pipeInfo+=pipes.get(index).getToolkitThatGeneratesView()+":";
		   	 pipeInfo+="No error.";
		   	 
		   	 return pipeInfo;
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
	
	public static String splitAtHashtag(String toBeSplit){
		String[] toReturn = toBeSplit.split("#");
		return toReturn[1];
	}
	
	public static String getPipes(PipelineSet pipes){
		String toReturn = "";
		for(int i = 0; i < pipes.size(); i++){
			toReturn = splitAtHashtag(pipes.get(i).getViewURI()) + " | " + splitAtHashtag(pipes.get(i).getOutputFormat() + " | " + splitAtHashtag(pipes.get(i).getToolkitThatGeneratesView()) + "\n" );
		}
		
		return toReturn;
	}
	
}
