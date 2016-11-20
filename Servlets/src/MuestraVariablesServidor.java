import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.ServletContext;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

public class MuestraVariablesServidor extends HttpServlet {

	private static final long serialVersionUID = 1L;

    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html");
        response.setCharacterEncoding("UTF-8");
        response.addHeader("usuarioRemoto", "aruiz");
        PrintWriter out = response.getWriter();
        try {         
            out.println("<!DOCTYPE html>");
            out.println("<html><head><title>MostrarVariables</title><meta charset='UTF-8'/>"
            		+ "<style>table,td {border:solid 1px black;}</style></head>");
            out.println("<body><h1>MostrarVariables</h1>");
            out.println("<h3>Variables contenidas en la petici�n (objeto request)</h3>");

            out.println("<table style='border-collapse: collapse;margin:10px'>");
            out.println("<tr><td><b>Variable</b></td><td><b>Valor</b></td></tr>");
            out.println ("<tr> <td>Direcci�n remota (request.getRemoteAddress)</td> <td>" + request.getRemoteAddr() + "</td></tr>");
            out.println ("<tr> <td>Puerto remoto (request.getRemotePort)</td> <td>" + request.getRemotePort() + "</td></tr>");
            out.println("<tr><td>URL invocada (request.getRequestURL)</td><td>" + request.getRequestURL() + "</td></tr>");
            out.println ("<tr><td>M�todo de petici�n (request.getMethod)</td> <td>" + request.getMethod() + "</td></tr>");
            out.println ("<tr><td>Protocolo (request.getProtocol)</td> <td>" + request.getProtocol() + "</td></tr>");
            out.println ("<tr><td>Nombre del Servidor (request.getServerName)</td> <td>" + request.getServerName() + "</td></tr>");
            out.println ("<tr><td>Puerto del Servidor (request.getServerPort)</td> <td>" + request.getServerPort() + "</td></tr>");
            out.println ("<tr><td>Nombre del ServletPath (request.getServletPath)</td> <td>" + request.getServletPath()+ "</td></tr>");
            out.println("</table><br/>");

            out.println("<h3>Variables contenidas en el contexto (objeto servletContext)</h3>");
        	ServletContext contexto = getServletContext();
            out.println("<table style='border-collapse: collapse;margin:10px'>");
            out.println("<tr><td><b>Variable</b></td><td><b>Valor</b></td></tr>");
            out.println("<tr><td>Software de SERVIDOR</td><td>" + contexto.getServerInfo() + "</td></tr>");
            out.println("<tr><td>Directorio de DESPLIEGUE</td><td>" + contexto.getRealPath("/")+ "</td></tr>");
            out.println("<tr><td>Nombre de la aplicaci�n</td><td>" + contexto.getServletContextName()+ "</td></tr>");
            out.println("</table>");

			out.println("<h3>Par�metros iniciales</h3>");
            out.println("<table style='border-collapse: collapse;margin:10px'>");
            out.println("<tr><td>Del contexto (aplicaci�n web)</td><td>" + contexto.getInitParameter("creador")+ "</td></tr>");
            out.println("<tr><td>De este servlet</td><td>" + getInitParameter("clase")+ "</td></tr>");
			
             out.println("</table></body></html>");

           /* 
            ServletContext contexto = getServletContext();
            Enumeration <String> parametros = contexto.getInitParameterNames();
            while (parametros.hasMoreElements()) {
	            String actual = parametros.nextElement();
            out.print("<p>"+actual+": "+contexto.getInitParameter(actual));
            out.println("</p>");
            }*/
        } finally {            
            out.close();
        }
    }
}
