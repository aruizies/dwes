package servlets;

import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.ServletContext;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.w3c.dom.Document;
import org.w3c.dom.Element;
import org.w3c.dom.Node;
import org.w3c.dom.NodeList;

import util.UtilXML;

/**
 * Servlet implementation class LeerTrabajadores
 */
@WebServlet("/LeerTrabajadores")
public class LeerTrabajadores extends HttpServlet {
	private static final long serialVersionUID = 1L;

	/**
	 * @see HttpServlet#HttpServlet()
	 */
	public LeerTrabajadores() {
		super();
		// TODO Auto-generated constructor stub
	}

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse
	 *      response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		ServletContext contexto = getServletContext();
		PrintWriter out = response.getWriter();

/*		
		// Paso 1: inicializar el parser
		DocumentBuilderFactory builderFactory = DocumentBuilderFactory.newInstance();
		DocumentBuilder builder = null;
		try {
			builder = builderFactory.newDocumentBuilder();
		} catch (Exception e) {
			System.out.println("Error al crear el parser XML");
		}

		// Paso 2: procesar un archivo
		Document document = null;
		String ruta = contexto.getRealPath("/files/trabajadores.xml");
		try {
			document = builder.parse(new FileInputStream(ruta));
		} catch (Exception e) {
			System.out.println("Error al procesar el archivo XML");
		}
*/

		String ruta = contexto.getRealPath("/files/trabajadores.xml");
		Document document = UtilXML.abrirDocumentoXML(ruta);
		// Paso 3: recorrer el árbol
		Element raiz = document.getDocumentElement();
		System.out.println("El elemento raíz es " + raiz.getTagName());

		NodeList nodos = raiz.getChildNodes();
		for (int i = 0; i < nodos.getLength(); i++) {
			Node n = nodos.item(i);
			if (n instanceof Element) {
				Element hijo = (Element) n;
				System.out.println(hijo.getTagName() + " de tipo " + hijo.getAttribute("categoria"));
			}
		}

		// Salida más detallada:
		System.out.println("-------------------");
		System.out.println("|    PLANTILLA    |");
		System.out.println("-------------------");

		// para cada elemento trabajador...
		for (int i = 0; i < nodos.getLength(); i++) {
			Node n = nodos.item(i);
			if (n instanceof Element) {
				Element trabajador = (Element) n;
				// Nombre
				Node nodoNombre = trabajador.getElementsByTagName("nombre").item(0);
				if (nodoNombre instanceof Element) {
					Element nombre = (Element) nodoNombre;
					Node contenidoNombre = nombre.getFirstChild();
					System.out.println("Nombre: " + contenidoNombre.getNodeValue());
				}
				// Categoria
				System.out.println("Categoria: " + trabajador.getAttribute("categoria"));
				// Direccion
				Node nodoDir = trabajador.getElementsByTagName("direccion").item(0);
				if (nodoDir instanceof Element) {
					Element dir = (Element) nodoDir;
					Node contenidoDir = dir.getFirstChild();
					System.out.println("Dirección: " + contenidoDir.getNodeValue());
				}
				// Teléfonos
				System.out.println("Teléfonos");
				Node nodoTel = trabajador.getElementsByTagName("telefonos").item(0);
				if (nodoTel instanceof Element) {
					Element tel = (Element) nodoTel;
					NodeList numeros = tel.getChildNodes();
					for (int j = 0; j < numeros.getLength(); j++) {
						Node t = numeros.item(j);
						if (t instanceof Element) {
							Element numero = (Element) t;
							Node contenidoNum = numero.getFirstChild();
							System.out.println("Tel: " + contenidoNum.getNodeValue());
						}
					}
				}
				System.out.println("---------------------");

			}
		}

	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse
	 *      response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
	}

}
