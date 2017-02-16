import java.util.Date;

import sensores.*;

public class Test {

	public static void main(String [] args) {
		
		/* PRUEBAS ETAPA 1 */

		Sensor giroscopio = new Sensor("LG", 100, 1, "Giroscopio", 20.1 );
		Sensor acelerometro = new Sensor("Motorola", 200, 4, "Aceler�metro", 30.5 );
		Sensor proximidad = new Sensor("Apple", 300, 6, "Sensor de proximidad", 30.5 );
		Sensor luz = new Sensor("LG", 100, 9, "Detecci�n de luminosidad", 30.5 );
		
		giroscopio.printInfo();
		acelerometro.printInfo();
		
		/* PRUEBAS ETAPA 2.1*/
		
		Robot r1 = new Robot(1000);
		r1.mostrarInfo();
		r1.a�adirSensor(giroscopio);
		r1.a�adirSensor(acelerometro);
		r1.a�adirSensor(acelerometro); // error
		r1.mostrarInfo();
			
		Robot r2 = new Robot(2000);
		r2.a�adirSensor(proximidad);
		r2.a�adirSensor(luz);
		
		Pedido pedido1 = new Pedido(192,"C/Mayor 59",new Date(),900);
		pedido1.a�adirRobot(r1);
		pedido1.a�adirRobot(r1);
		pedido1.a�adirRobot(r2);
		pedido1.imprimirPedido();
		
		Pedido pedido2 = new Pedido(544,"C/Llana 1",new Date(),1230);
		pedido2.a�adirRobot(r1);
		pedido2.a�adirRobot(r1);
		pedido2.a�adirRobot(r2);
		pedido2.a�adirRobot(r2);
		pedido2.a�adirRobot(r2);
		pedido2.imprimirPedido(); // este tiene descuento
		pedido2.eliminarRobot(1000); 
		pedido2.eliminarRobot(5555); // no existe 
		pedido2.imprimirPedido(); // ya no tiene descuento

		/* PRUEBAS ETAPA 2.2*/

		Pedido pedido22 = new Pedido(653,"C/Baja 6",new Date(),5432);

		SensorLDR sLDR1 = new SensorLDR("LG", 100, 55, "LDR", 5, SensibilidadLDR.BAJA );
		SensorPresion sPresion1 = new SensorPresion("LG", 100, 56, "Presi�n", 25, 1);
		SensorObstaculos sObstaculos1 = new SensorObstaculos("LG", 100, 57, "LDR", 5.5, SensibilidadObstaculos.MEDIA );

		Robot primerRobot = new Robot(2100);
		primerRobot.a�adirSensor(sLDR1);
		primerRobot.a�adirSensor(sPresion1);
		primerRobot.a�adirSensor(sPresion1);		
		primerRobot.a�adirSensor(sPresion1);
		primerRobot.a�adirSensor(sPresion1);		
		primerRobot.a�adirSensor(sPresion1);
		primerRobot.a�adirSensor(sPresion1);		
		primerRobot.a�adirSensor(sPresion1);
		primerRobot.a�adirSensor(sPresion1);		
		primerRobot.a�adirSensor(sPresion1);
		primerRobot.a�adirSensor(sPresion1);
		primerRobot.a�adirSensor(sObstaculos1);

		primerRobot.mostrarInfo();
		
		SensorUltrasonido sUltra2 = new SensorUltrasonido("Motorola", 200, 66, "Ultrasonidos", 30, 10, 1);
		SensorPresion sPresion2 = new SensorPresion("Motorola", 200, 77, "Presi�n", 29, 1.5);
		Sensor sObstaculos2 = new SensorObstaculos("Motorola", 200, 88, "Obst�culos", 15, SensibilidadObstaculos.ALTA);
		
		Robot segundoRobot = new Robot(2200);
		segundoRobot.a�adirSensor(sUltra2);
		segundoRobot.a�adirSensor(sPresion2);
		segundoRobot.a�adirSensor(sObstaculos2);
		
		segundoRobot.mostrarInfo();

		SensorLDR sLDR3 = new SensorLDR("Apple", 300, 55, "LDR", 7 , SensibilidadLDR.ALTA );
		SensorPresion sPresion3 = new SensorPresion("Apple", 300, 56, "Presi�n", 20, 0.8);
		SensorInfrarrojos sInfra3 = new SensorInfrarrojos("Apple",  33,  99,  "Infra",  45,  0.1, 100); 
		SensorCCD sCCD3 = new SensorCCD("Apple", 300,  88,  "CCD", 75, 1024);
		SensorObstaculos sObstaculos3 = new SensorObstaculos("Apple", 300, 56, "Obst�culos", 12, SensibilidadObstaculos.BAJA);
		
		Robot tercerRobot = new Robot(2300);
		tercerRobot.a�adirSensor(sLDR3);
		tercerRobot.a�adirSensor(sPresion3);
		tercerRobot.a�adirSensor(sPresion3);
		tercerRobot.a�adirSensor(sPresion3);
		tercerRobot.a�adirSensor(sPresion3);
		tercerRobot.a�adirSensor(sPresion3);
		tercerRobot.a�adirSensor(sInfra3);
		tercerRobot.a�adirSensor(sCCD3);
		tercerRobot.a�adirSensor(sCCD3);
		tercerRobot.a�adirSensor(sCCD3);
		tercerRobot.a�adirSensor(sCCD3);
		tercerRobot.a�adirSensor(sObstaculos3);
		
		tercerRobot.mostrarInfo();

		pedido22.a�adirRobot(primerRobot);
		pedido22.a�adirRobot(segundoRobot);
		pedido22.a�adirRobot(tercerRobot);
		
		pedido22.imprimirPedido();
		
		pedido22.eliminarRobot(2200);
		
		pedido22.imprimirPedido();
	}
	
}
