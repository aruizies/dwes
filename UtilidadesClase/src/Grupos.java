import java.util.ArrayList;
import java.util.Random;

public class Grupos {

	public static void main(String[] args) {

		String[] nombres = { "Geyse", "Iván Hidalgo", "Rodrigo", 
				"Fernando", "Iván Gallego",	"Álvaro", "Javier", 
				"Jesús Martín", "Guzmán", "Jesús Viera", "Pablo", 
				"David", "Daniel Soriano", "América", "César", 
				"Cristian", "Hugo",	"Daniel Vicho", "Sergio" };

		int numMiembros = 3;

		ArrayList<String> alumnos = new ArrayList<String>();
		for (String nombre : nombres) {
			alumnos.add(nombre);
		}
		int numAlumnos = alumnos.size();
		int sobrantes = numAlumnos % numMiembros;
		System.out.println("Hay " + numAlumnos + " alumnos en clase y queremos grupos de "+numMiembros);
		if (sobrantes > 0) System.out.println("Habrá " + sobrantes + " grupo/s con un@ alumn@ adicional.");

		Random generadorAleatorios = new Random(); 

		for (int i = 1; i <= numAlumnos / numMiembros; i++) {
			System.out.println("GRUPO " + i + ": ");
			for (int j=0; j<numMiembros; j++) {
				int aleatorio = generadorAleatorios.nextInt(alumnos.size());
				System.out.println(" * " + alumnos.get(aleatorio));
				alumnos.remove(aleatorio);
				// Asignar alumn@ adicional si es necesario
				if (sobrantes > 0)
				{
					aleatorio = generadorAleatorios.nextInt(alumnos.size());
					System.out.println(" * " + alumnos.get(aleatorio));
					alumnos.remove(aleatorio);
					sobrantes --;
				}
			}
		}
	}

}
