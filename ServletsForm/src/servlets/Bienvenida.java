package servlets;

import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebInitParam;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 * Servlet implementation class DatosPersonales
 */
/*
@WebServlet(value="/Bienvenida", 
            loadOnStartup=1,
            initParams={
            	@WebInitParam(name="usuarioRemoto", value="aruiz"),
            	@WebInitParam(name="usuarioRemoto2", value="aruiz2")
            }
            )
*/
@WebServlet(urlPatterns={"/Bienvenida","/bienvenida"}, 
loadOnStartup=1,
initParams={
	@WebInitParam(name="usuarioRemoto", value="aruiz"),
	@WebInitParam(name="usuarioRemoto2", value="aruiz2")
}
)

public class Bienvenida extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public Bienvenida() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		PrintWriter out = response.getWriter();
		out.println(getInitParameter("usuarioRemoto"));
		out.println(getServletName());
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
	}

}
