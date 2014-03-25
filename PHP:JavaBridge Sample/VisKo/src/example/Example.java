package example;
import java.io.IOException;
import java.util.LinkedList;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import php.java.servlet.RemoteHttpServletContextFactory;
import edu.utep.trustlab.visko.planning.*;
import edu.utep.trustlab.visko.web.html.QueryMessages;
import edu.utep.trustlab.visko.web.html.ResultsTableHTML;
import example2.TestThis2;
import test.TestThisW;
/**
 * Servlet implementation class Server
 * Super of all GUI Interface classes
 * this is who the 'JavaBridge' communicates to
 */
@WebServlet("/Example")
public class Example extends HttpServlet
{
	static int count = 0;
	/**
	 * 
	 */
	private static final long serialVersionUID = 1L;
	
	//TEST METHOD
	//this will be able to talk to any other Java class 
	//PHP will know what is the string, so we just pass this string in here 
	public static String javaMethodName(String php)
	{
		count++;
		System.out.println("Method 'javaMethodName' accessed for the ("+count+") time.\nThis time with parameter:'"+php+"'\n"
				+ "Degugging is way nice, "
				+ "because I can see whats going on in "
				+ "3rd person prespective using the console");
		
		return "Hi PHP, This is java responding! Thanks for saying '" + php + "' to me";
	
	}

	
	public static String [] practiceQuery(String queryString)
	{
		System.out.println("1");
		QueryEngine engine; 
		System.out.println("2");
		LinkedList bitch = new LinkedList<String>();
		System.out.println("3");
		String trythis = TestThis2.test();
		System.out.println("4");
		String trythis2 = TestThisW.test();
		System.out.println("5");
		Query query= new Query(queryString);  
		System.out.println("6");
		if (query.isValidQuery()) 
		{
			engine = new QueryEngine(query);
			return new String[] {"PASS", trythis, ResultsTableHTML.getHTML(engine, true), QueryMessages.getQueryMessagesHTML(query)};
		}
		return new String[] {"FAIL", trythis, "", ""};
	}
	
	
	
	//TWO REQUIRED METHODS
	@Override
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException 
	{
		// TODO Auto-generated method stub
		response.getWriter().write(	"Servlet is running!\n\n" +
									"Requests may begin");

	}

	

	/**
	 * @see HttpServlet#doPut(HttpServletRequest, HttpServletResponse)
	 */
	@Override
	protected void doPut(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
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
}
