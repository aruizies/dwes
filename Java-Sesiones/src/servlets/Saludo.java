package servlets;

import java.io.IOException;
import java.io.PrintWriter;
import java.util.Date;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.Cookie;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

/**
 * Servlet implementation class Saludo
 */
@WebServlet("/Saludo")
public class Saludo extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public Saludo() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// Crear una sesión o recuperar la existente si se encuentra la cookie de sesión
		HttpSession session = request.getSession();

		String errorUsuario = "";
		String usuario = "";

		if (request.getParameter("cerrarSesion") != null) {
			session.invalidate();
			session = request.getSession(true);
		}
		
		if (request.getParameter("enviar") != null) {
			// validar nombre
			usuario = request.getParameter("usuario");
			if (usuario == "") {
				errorUsuario = "Debes introducir un nombre";
			} else {
				session.setAttribute("usuario", usuario);
			}
		}
		
		// Comienza la salida
		PrintWriter out = response.getWriter();
		out.println("<html><head><meta charset='UTF-8'/>" + "<style> .error {color: red}</style>"
				+ "<title>Sesiones en JavaEE</title></head><body>");
		response.setContentType("text/html;UTF-8");

		if (session.getAttribute("usuario") != null) {
			out.println("<h2>Bienvenid@, " + session.getAttribute("usuario") + "</h2>");
		} else {
			out.println("<form action='"+request.getRequestURI()+"' method='post'>"
					+ "<label>Introduce tu nombre para dirigirnos a ti:</label>" + "<input type='text' name='usuario'/>"
					+ "<span class='error'>" + errorUsuario + "</span><br/>"
					+ "<input type='submit' name='enviar' value='Enviar'/></form>");
		}
		out.println("<p><a href='" + request.getRequestURI() + "'>Refrescar</a></p>");
		out.println("<p><a href='" + request.getRequestURI() + "?cerrarSesion=true'>Cerrar sesión</a></p>");
		out.println("</body></html>");
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
	}

}
