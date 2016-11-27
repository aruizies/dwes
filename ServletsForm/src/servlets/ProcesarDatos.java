package servlets;

import java.io.IOException;
import java.io.PrintWriter;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.Enumeration;
import java.util.Map;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 * Servlet implementation class ProcesarDatos
 */
@WebServlet("/ProcesarDatos")
public class ProcesarDatos extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public ProcesarDatos() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		PrintWriter out = response.getWriter();
		out.println("<html><head><meta charset='UTF-8'/></head><body>");
		
		out.println("Fecha: "+ request.getParameter("fecha") + "<br/>");
		
		
		SimpleDateFormat formatoFechaFormulario = new SimpleDateFormat("yyyy-MM-dd");
		try {
			Date fecha = formatoFechaFormulario.parse(request.getParameter("fecha"));
			SimpleDateFormat formatoFechaSalida = new SimpleDateFormat("dd/MM/yyyy");
			out.println("Fecha: "+ formatoFechaSalida.format(fecha));
		} catch (ParseException e) {
			e.printStackTrace();
		}
		
		
				
		
        Map<String, String[]> paresPeticion = request.getParameterMap();
        paresPeticion.forEach((parametro,valores)->
        {
        	out.println("<p>"+parametro+": ");
        	for (String v: valores) {
        		out.print("- "+v);
        	}
        });
out.println(request.getParameter("genero"));
        
        

        out.println("<ul>");
        Enumeration<String> parametros = request.getParameterNames();
        while(parametros.hasMoreElements()) {
           out.print("<li>" + parametros.nextElement() + "</li>");
        }
        out.println("</ul>");

        String fecha2 = request.getParameter("fecha");
        
        
   
           String[] valores = request.getParameterValues("vehiculo");
           out.println("<ul>");
           for(int i=0; i < valores.length; i++) {
                  out.println("<li>" + valores[i] + "</li>");
           }
           out.println("</ul>");
		
				
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
	}

}
