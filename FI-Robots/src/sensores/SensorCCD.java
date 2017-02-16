package sensores;
public class SensorCCD extends Sensor {

	private double resolucion;
	
	public SensorCCD(String nombreFabricante, int codigoFabricante, int codigoSensor, String descripcion,
			double precioFabrica, double resolucion) {
		super(nombreFabricante, codigoFabricante, codigoSensor, descripcion, precioFabrica);
		this.resolucion = resolucion;
	}

	public void printInfo() {
		super.printInfo();
		System.out.println(" * Es un sensor CCD con resolución máxima " + resolucion);
	}

	public double getResolucion() {
		return resolucion;
	}

	public void setResolucion(double resolucion) {
		this.resolucion = resolucion;
	}


}
