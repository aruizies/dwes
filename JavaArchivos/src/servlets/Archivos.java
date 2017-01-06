package servlets;

import java.io.IOException;
import java.io.PrintWriter;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.util.stream.Stream;

import javax.servlet.ServletContext;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 * Servlet implementation class Archvios
 */
@WebServlet("/Archivos")
public class Archivos extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public Archivos() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		ServletContext contexto = getServletContext();
		PrintWriter out = response.getWriter();
		

	/*	
		String ruta = contexto.getRealPath("/files/modulos.txt");
	    BufferedReader br = new BufferedReader(new InputStreamReader(
	    	    new FileInputStream(ruta), "UTF-8"));
	    String linea;
	    while((linea = br.readLine()) != null)
            out.println(linea);
	    br.close();
	    
	  */
/* escritura sin append
		String ruta = contexto.getRealPath("/files/modulos.txt");
	    BufferedWriter bw = new BufferedWriter(new OutputStreamWriter(
	    	    new FileOutputStream(ruta), "UTF-8"));
	    bw.write("Lenguajes de marcas\n");
	    bw.write("Entornos de desarrollo\n");
	    bw.close();
*/
	    
	    // escritura con append
		/*
	    String ruta = contexto.getRealPath("/files/modulos.txt");
	    BufferedWriter bw = new BufferedWriter(new OutputStreamWriter(
	    	    new FileOutputStream(ruta,true), "UTF-8"));
	    bw.write("¿He podido añadir esta línea? Contiene UTF-8\n");
	    bw.close();
*/
		/*
		String ruta = contexto.getRealPath("/files/nuevo.txt");
		File archivo = new File(ruta);
		archivo.createNewFile();
		*/
		/*
		String ruta = contexto.getRealPath("/files/nuevo.txt");
		File archivo = new File(ruta);
		archivo.delete();
		*/ 
		
		
		
	   /* 
	    
		Path path = Paths.get(contexto.getRealPath("/files/modulos.txt"));
		try (Stream<String> stream = Files.lines(path)) {
			stream.forEach(out::println);
		} catch (Exception e) {
			out.println(e.toString());
		}
*/
		/* Lo anterior permite resumir código mediante expresiones lambda, diciendo 
		 * "por cada elemento del stream, imprímelo".
		 * Si necesitamos hacer algo más elaborado, necesitaremos nombrar el elemento actual: 
		 * */
		
		Path path = Paths.get(contexto.getRealPath("/files/modulos.txt"));
		try (Stream<String> stream = Files.lines(path)) {
			stream.forEach(s -> {
				out.println(s);
			});
		} catch (Exception e) {
			out.println(e.toString());
		}
	
		
		
		/*
		 * Al tener un nombre para cada elemento, podemos añadir un salto de línea
		 */
/*		try (Stream<String> stream = Files.lines(path)) {
			stream.forEach(s -> {
				out.println(s + "<br/>");
			});
		} catch (Exception e) {
			out.println(e.toString());
		}
			
	}
*/
	/*
	 * Podríamos también aplicar algún filtro
	 */
/*
  	try (Stream<String> stream = Files.lines(path)) {

		stream.forEach(s -> {
			if (s.startsWith("D"))
				out.println(s + "<br/>");
		});
	} catch (Exception e) {
		out.println(e.toString());
	}
*/

		/* Uso avanzado de Streams: */
		/*
	  	try (Stream<String> stream = Files.lines(path)) {
	  		stream
	  		.filter(s -> s.startsWith("D"))
	  	    .map(String::toUpperCase)
	  	    .sorted()
	  	    .forEach(s -> out.println(s + "<br/>"));
	  	}
	  	*/

	/* VIEEJO
	Path rutaArchivoEscritura = Paths.get(contexto.getRealPath("/files/nuevo.txt"));
	out.println("Ruta: " + rutaArchivoEscritura);
	try {
		BufferedWriter writer = Files.newBufferedWriter(rutaArchivoEscritura);
	    writer.write("print('Hello World');");
	    writer.close();
	} catch (Exception e) {
		out.println(e.toString());
	}
*/
	
	  	// Ejemplo sin append
	/* VIEEJO
	File nuevoArchivo = new File(contexto.getRealPath("/files/nuevo.txt"));
	if (!nuevoArchivo.exists())
		nuevoArchivo.createNewFile();
    FileWriter fileOut = new FileWriter(nuevoArchivo);
    fileOut.append("Línea añadida\n");
    fileOut.close();	
*/
  	// Ejemplo con append
	  	/*VIEEJO
		File nuevoArchivo = new File(contexto.getRealPath("/files/nuevo.txt"));

	Charset charset = Charset.forName("UTF-8");
	
	if (!nuevoArchivo.exists())
		nuevoArchivo.createNewFile();
    FileWriter fileOut = new FileWriter(nuevoArchivo, true);
    fileOut.append("Lnea aadida\n");
    fileOut.close();	
	*/
/*
	String rutaArchivoEscritura = contexto.getRealPath("/files/prueba2.txt");
    OutputStreamWriter writer = new OutputStreamWriter(
    	     new FileOutputStream(rutaArchivoEscritura,true),
    	     Charset.forName("UTF-8").newEncoder() 
    );
        writer.write("fhfháñoJava\n");
        writer.write("Python\n");
        writer.write("Clojure\n");
        writer.write("Scala\n");
        writer.write("JavaScript\n");
        writer.close();
  */  
	  	
	  	/*
	  	 * 
	  	 * 
	  	 * Observa que en PHP los archivos se creaban siempre en el servidor, pero ahora estamos trabajando en Eclipse
	  	 * Los archivos originales los incluimos en nuestro espacio de trabajo (workspace), pero Eclipse despliega 
	  	 * luego el proyecto en una carpeta personal, y es allí donde estarán.
	  	 * 
	  	Hay muchas soluciones para la escritura de archivos. El problema con el que tenemos que lidiar es la 
	  	codificación de caracteres UTF-8, para evitar problemas
	  	 */
	  	/*
        Path rutaArchivoEscritura = Paths.get(contexto.getRealPath("/files/modulos.txt"));        
        try (BufferedWriter writer = Files.newBufferedWriter(rutaArchivoEscritura, StandardCharsets.UTF_8)) {
          writer.write("Desarrollo web en entorno servidor\n");
          writer.write("Inglés técnico\n");   
        }
        
        try (BufferedWriter writer = Files.newBufferedWriter(rutaArchivoEscritura, StandardCharsets.UTF_8, StandardOpenOption.APPEND)) {
            writer.write("Lenguajes de Marcas\n");
            writer.write("Entornos de desarrollo\n");   
          }
        
        
        Path rutaArchivoSecreto = Paths.get(contexto.getRealPath("/WEB-INF/secreto.txt"));
        
        try (BufferedWriter writer = Files.newBufferedWriter(rutaArchivoSecreto, StandardCharsets.UTF_8)) {
          writer.write("Información no visible por los usuarios\n");  
        }
        */
        
}
	
	

	
	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
	}

}
