import java.util.ArrayList;

public class Grupos {

	public static void main(String[] args) {

		String[] nombres = { "Geyse", "Iv�n Hidalgo", "Rodrigo", 
				"Fernando", "Iv�n Gallego",	"�lvaro", "Javier", 
				"Jes�s Mart�n", "Guzm�n", "Jes�s Viera", "Pablo", 
				"David", "Daniel Soriano", "Am�rica", "C�sar", 
				"Cristian", "Hugo",	"Daniel Vicho", "Sergio" };

		ArrayList<String> alumnos = new ArrayList<String>();

		for (String nombre : nombres) {
			alumnos.add(nombre);
		}
		
		int numAlumnos = alumnos.size();
		boolean impar = alumnos.size() % 2 == 0 ? false : true;

		System.out.println("Hay " + numAlumnos + " alumnos en clase.");

		for (int i = 1; i <= numAlumnos / 2; i++) {
			System.out.println("GRUPO " + i + ": ");

		}
	}

}
