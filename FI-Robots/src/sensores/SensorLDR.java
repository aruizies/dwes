package sensores;

public class SensorLDR extends Sensor {

	private SensibilidadLDR sensibilidad;

	public SensorLDR(String nombreFabricante, int codigoFabricante, int codigoSensor, String descripcion,
			double precioFabrica, SensibilidadLDR sensibilidad) {
		super(nombreFabricante, codigoFabricante, codigoSensor, descripcion, precioFabrica);
		this.sensibilidad = sensibilidad;
	}
	
	public void printInfo() {
		super.printInfo();
		System.out.println(" * Es un sensor LDR con sensibilidad " + sensibilidad);
	}
	
	public SensibilidadLDR getSensibilidad() {
		return sensibilidad;
	}

	public void setSensibilidad(SensibilidadLDR sensibilidad) {
		this.sensibilidad = sensibilidad;
	}
}
