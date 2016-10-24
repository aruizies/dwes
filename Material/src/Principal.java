import java.util.HashMap;

public class Principal {

	public static void main(String[] args) {
		HashMap<String,Integer> agenda = new HashMap<String,Integer>();
		// introducir valores
		agenda.put("Alberto", 55512345);
		agenda.put("Luis", 55598765);
		agenda.put("Félix", 55567544);

		// obtener un valor
		System.out.println("Número de Luis:" + agenda.get("Luis"));

		// ¿Existe un valor?
		if (agenda.containsValue(55512345)) {
			System.out.println("La agenda ya contiene el número");
		}

		// ¿Existe una clave?
		if (agenda.containsKey("Alberto")) {
			System.out.println("La agenda ya contiene el nombre");
		}

		// Imprimir contenido, versión clásica
		for (HashMap.Entry<String,Integer> actual : agenda.entrySet())
		{
		    System.out.println(actual.getKey() + ":" + actual.getValue());
		}

		// Imprimir contenido En Java 8
		agenda.forEach((clave,valor)-> 
			System.out.println(clave + ": " + valor));

		// Obtener la clave correspondiente a un valor, versión clásica
		int buscado = 55512345;
		for (HashMap.Entry<String,Integer> actual : agenda.entrySet())
		{
			if (actual.getValue() == buscado)
				System.out.println("El número era de " + actual.getKey());
		}

		// Obtener la clave correspondiente a un valor con Java 8
		agenda.forEach((clave,valor)->
			{
				if (valor == buscado) {
					System.out.println("El número era de " + clave);
				}
			});
	}

}
