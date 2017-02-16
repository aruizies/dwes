package sensores;

public class SensorObstaculos extends Sensor {

	private SensibilidadObstaculos sensibilidad;
	
	public SensorObstaculos(String nombreFabricante, int codigoFabricante, int codigoSensor, String descripcion,
			double precioFabrica, SensibilidadObstaculos sensibilidad) {
		super(nombreFabricante, codigoFabricante, codigoSensor, descripcion, precioFabrica);
		this.sensibilidad = sensibilidad;
	}

	public void printInfo() {
		super.printInfo();
		System.out.println(" * Es un sensor de obstáculos con sensibilidad " + sensibilidad);
	}

	public SensibilidadObstaculos getSensibilidad() {
		return sensibilidad;
	}

	public void setSensibilidad(SensibilidadObstaculos sensibilidad) {
		this.sensibilidad = sensibilidad;
	}

}
