import java.util.Date;

public class Test {

	public static void main(String [] args) {
		
		/* PRUEBAS ETAPA 1 */

		Sensor giroscopio = new Sensor("LG", 100, 1, "Giroscopio", 20.1 );
		Sensor acelerometro = new Sensor("Motorola", 200, 4, "Acelerómetro", 30.5 );
		Sensor proximidad = new Sensor("Apple", 300, 6, "Sensor de proximidad", 30.5 );
		Sensor luz = new Sensor("LG", 100, 9, "Detección de luminosidad", 30.5 );
		
		giroscopio.printInfo();
		acelerometro.printInfo();
		
		/* PRUEBAS ETAPA 2*/
		
		Robot r1 = new Robot(1000);
		r1.mostrarInfo();
		r1.añadirSensor(giroscopio);
		r1.añadirSensor(acelerometro);
		r1.añadirSensor(acelerometro); // error
		r1.mostrarInfo();
			
		Robot r2 = new Robot(2000);
		r2.añadirSensor(proximidad);
		r2.añadirSensor(luz);
		
		Pedido pedido1 = new Pedido(192,"C/Mayor 59",new Date(),900);
		pedido1.añadirRobot(r1);
		pedido1.añadirRobot(r1);
		pedido1.añadirRobot(r2);
		pedido1.imprimirPedido();
		
		Pedido pedido2 = new Pedido(544,"C/Llana 1",new Date(),1230);
		pedido2.añadirRobot(r1);
		pedido2.añadirRobot(r1);
		pedido2.añadirRobot(r2);
		pedido2.añadirRobot(r2);
		pedido2.añadirRobot(r2);
		pedido2.imprimirPedido(); // este tiene descuento
		
	}
	
}
