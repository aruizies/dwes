package sensores;

public class SensorPresion extends Sensor {

	private double umbral;

	public SensorPresion(String nombreFabricante, int codigoFabricante, int codigoSensor, String descripcion,
			double precioFabrica, double umbral) {
		super(nombreFabricante, codigoFabricante, codigoSensor, descripcion, precioFabrica);
		this.umbral = umbral;
	}
	
	public void printInfo() {
		super.printInfo();
		System.out.println(" * Es un sensor de presión con umbral en N/mm2: " + umbral);
	}
	
	public double getUmbral() {
		return umbral;
	}

	public void setUmbral(double umbral) {
		this.umbral = umbral;
	}
}
