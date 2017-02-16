import java.util.ArrayList;

import sensores.Sensor;

public class Robot {
	private int id;
	private ArrayList<Sensor> listaSensores;

	public Robot (int id) {
		this.id = id;
		this.listaSensores = new ArrayList<Sensor>();
	}
	
/*// COMPROBANDO SI EXISTE UNO CON EL MISMO SENSOR	
	public boolean añadirSensor(Sensor nuevoSensor) {
		// Primero comprobamos si ya existe
		for (int i = 0; i < listaSensores.size(); i++) {
			Sensor s = listaSensores.get(i);
			if (s.getCodigoSensor() == nuevoSensor.getCodigoSensor()) {
				System.out.println(
						"Error al añadir sensor, ya existe uno con el código " + nuevoSensor.getCodigoSensor());
				return false;
			}
		}
		// Si llegamos a este punto, es que todo va bien y no existe
		listaSensores.add(nuevoSensor);
		return true;
	}
*/

	public boolean añadirSensor(Sensor nuevoSensor) {
		listaSensores.add(nuevoSensor);
		return true;
	}

	
	public boolean eliminarSensorlistaSensores(int codigoSensor) {
		// primero la buscamos
		for (int i = 0; i < listaSensores.size(); i++) {
			Sensor s = listaSensores.get(i);
			if (s.getCodigoSensor() == codigoSensor) {
				listaSensores.remove(s);
				System.out.println("Eliminado sensor " + s.getCodigoSensor() + " del robot " + id);
				return true;
			}
		}
		// si llegamos aquí, es que no existía y no se puede eliminar
		System.out.println("Error al eliminar: no se encontró el sensor " + codigoSensor + " en el robot " + id);
		return false;
	}

	public double calcularPrecioVenta() {
		double precioSensores = 0;
		for (int i = 0; i < listaSensores.size(); i++) {
			Sensor s = listaSensores.get(i);
			precioSensores += s.getPrecioFabrica();
		}
		double precioTotal = precioSensores * 1.85;
		return precioTotal;
	}

	public void mostrarInfo() {
		if (listaSensores.isEmpty()) {
			System.out.println("El robot " + id + " no tiene sensores.");
		} else {
			System.out.println("Sensores del robot " + id + ": ");
			for (int i = 0; i < listaSensores.size(); i++) {
				Sensor s = listaSensores.get(i);
				s.printInfo();
			}
		}
		System.out.println("El precio del robot " + id + " es: " + this.calcularPrecioVenta());
		System.out.println("--------------");
	}

	public int getId() {
		return id;
	}

	public void setId(int id) {
		this.id = id;
	}

	public ArrayList<Sensor> getListaSensores() {
		return listaSensores;
	}

	public void setListaSensores(ArrayList<Sensor> listaSensores) {
		this.listaSensores = listaSensores;
	}

}
