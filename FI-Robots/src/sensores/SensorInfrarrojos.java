package sensores;

public class SensorInfrarrojos extends Sensor {

	private double distancia;
	private double alcanceMaximo;

	public SensorInfrarrojos(String nombreFabricante, int codigoFabricante, int codigoSensor, String descripcion,
			double precioFabrica, double distancia, double alcanceMaximo) {
		super(nombreFabricante, codigoFabricante, codigoSensor, descripcion, precioFabrica);
		this.distancia = distancia;
		this.alcanceMaximo = alcanceMaximo;
	}
	
	public void printInfo() {
		super.printInfo();
		System.out.println(" * Es un sensor de ultrasonidos con distancia " + distancia + " metros y alcance máximo " + alcanceMaximo);
	}
	
	public double getDistancia() {
		return distancia;
	}

	public void setDistancia(double distancia) {
		this.distancia = distancia;
	}

	public double getAlcanceMaximo() {
		return alcanceMaximo;
	}

	public void setAlcanceMaximo(double alcanceMaximo) {
		this.alcanceMaximo = alcanceMaximo;
	}
	
	
	
}
