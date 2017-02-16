package sensores;
public class Sensor {

	protected String nombreFabricante;
	protected int codigoFabricante;
	protected int codigoSensor;
	protected String descripcion;
	protected double precioFabrica;
	
	
	public Sensor(String nombreFabricante, int codigoFabricante, int codigoSensor, String descripcion, double precioFabrica) {
		this.nombreFabricante = nombreFabricante;
		this.codigoFabricante = codigoFabricante;
		this.codigoSensor = codigoSensor;
		this.descripcion = descripcion;
		this.precioFabrica = precioFabrica;
	}
	
	public void printInfo() {
		System.out.println("Sensor [nombreFabricante=" + nombreFabricante + ", codigoFabricante=" + codigoFabricante
				+ ", codigoSensor=" + codigoSensor + ", descripcion=" + descripcion + ", precioFabrica=" + precioFabrica + "]");
	}
	
	public String getNombreFabricante() {
		return nombreFabricante;
	}
	public void setNombreFabricante(String nombreFabricante) {
		this.nombreFabricante = nombreFabricante;
	}
	public int getCodigoFabricante() {
		return codigoFabricante;
	}
	public void setCodigoFabricante(int codigoFabricante) {
		this.codigoFabricante = codigoFabricante;
	}
	public int getCodigoSensor() {
		return codigoSensor;
	}
	public void setCodigoSensor(int codigoSensor) {
		this.codigoSensor = codigoSensor;
	}
	public String getDescripcion() {
		return descripcion;
	}
	public void setDescripcion(String descripcion) {
		this.descripcion = descripcion;
	}
	public double getPrecioFabrica() {
		return precioFabrica;
	}
	public void setPrecioFabrica(double precioFabrica) {
		this.precioFabrica = precioFabrica;
	}
}
