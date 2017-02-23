import java.time.LocalDate;
import java.time.LocalDateTime;
import java.time.LocalTime;
import java.time.Month;

public class FechasJava8 {

	/*
	 * La versi�n 8 de Java introduce nuevas clases para la gesti�n de fechas,
	 * un asunto tradicionalmente engorroso que ahora resulta m�s sencillo de
	 * tratar. Aqu� encontrar�s algunos ejemplos. Para m�s informaci�n:
	 * http://www.oracle.com/technetwork/articles/java/jf14-date-time-2125367.
	 * html
	 */

	public static void main(String args[]) {
		// Obtener la fecha y hora actuales
		LocalDateTime fechaHoraActual = LocalDateTime.now();
		System.out.println("Fecha y hora actuales: " + fechaHoraActual);

		// Si s�lo queremos la fecha
		LocalDate fechaActual = fechaHoraActual.toLocalDate();
		System.out.println("Fecha actual: " + fechaActual);

		// Si queremos partes concretas
		System.out.println("Mes (nombre): " + fechaHoraActual.getMonth());
		System.out.println("Mes (n�mero): " + fechaHoraActual.getMonthValue());
		System.out.println("D�a (nombre): " + fechaHoraActual.getDayOfWeek());
		System.out.println("D�a (n�mero): " + fechaHoraActual.getDayOfMonth());
		System.out.println("Hora: " + fechaHoraActual.getHour());
		System.out.println("Minuto: " + fechaHoraActual.getMinute());
		System.out.println("Segundo: " + fechaHoraActual.getSecond());

		// Si queremos una fecha concreta
		LocalDate navidad2010 = LocalDate.of(2010, Month.DECEMBER, 25);
		System.out.println("Navidad 2010: " + navidad2010);

		// Si queremos una hora concreta
		LocalTime mediodia = LocalTime.of(12, 00);
		System.out.println("hora: " + mediodia);

		// Si queremos interpretar la fecha a partir de un String
		LocalDateTime fechaInterpretada = LocalDateTime.parse("2017-02-23T16:01:01");
		System.out.println("Fecha interpretada de String: " + fechaInterpretada);

		// Lo mismo con s�lo la hora
		LocalTime horaInterpretada = LocalTime.parse("20:15:30");
		System.out.println("Hora le�da de String: " + horaInterpretada);

		// Comparaci�n de fechas
		if (fechaActual.isAfter(navidad2010)) {
			System.out.println("La Navidad de 2010 ya pas�");
		}
		if (navidad2010.isBefore(fechaActual)) {
			System.out.println("En serio, la Navidad de 2010 ya pas�");
		}
		if (fechaActual.isEqual(LocalDate.now())) {
			System.out.println("Hoy es... hoy.");
		}
		// Se puede hacer lo mismo con horas:
		if (mediodia.isBefore(LocalTime.now())) {
			System.out.println("Buenas tardes");
		} else {
			System.out.println("Buenos d�as");
		}
	}
}