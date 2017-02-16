package sensores;

public class SensorUltrasonido extends Sensor {

	private double distancia;
	private double alcanceMinimo;

	public SensorUltrasonido(String nombreFabricante, int codigoFabricante, int codigoSensor, String descripcion,
			double precioFabrica, double distancia, double alcanceMinimo) {
		super(nombreFabricante, codigoFabricante, codigoSensor, descripcion, precioFabrica);
		this.distancia = distancia;
		this.alcanceMinimo = alcanceMinimo;
	}
	
	public void printInfo() {
		super.printInfo();
		System.out.println(" * Es un sensor de infrarrojos con distancia mínima " + distancia + " cm y alcance mínimo " + alcanceMinimo);
	}
	
	public double getDistancia() {
		return distancia;
	}

	public void setDistancia(double distancia) {
		this.distancia = distancia;
	}

	public double getAlcanceMinimo() {
		return alcanceMinimo;
	}

	public void setAlcanceMinimo(double alcanceMinimo) {
		this.alcanceMinimo = alcanceMinimo;
	}

	
	
}
