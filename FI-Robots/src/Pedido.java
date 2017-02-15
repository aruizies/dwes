import java.util.ArrayList;
import java.util.Date;

public class Pedido {
	private int id;
	private String direccionEnvio;
	private Date fecha;
	private int idCliente;
	private ArrayList<Robot> listaRobots;
	

	public Pedido(int id, String direccionEnvio, Date fecha, int idCliente) {
		this.id = id;
		this.direccionEnvio = direccionEnvio;
		this.fecha = fecha;
		this.idCliente = idCliente;
		this.listaRobots = new ArrayList<Robot>();
	}

	public void añadirRobot(Robot nuevoRobot) {
		listaRobots.add(nuevoRobot);
	}

	public boolean eliminarRobot(int idRobot) {
		// primero la buscamos
		for (int i = 0; i < listaRobots.size(); i++) {
			Robot r = listaRobots.get(i);
			if (r.getId() == idRobot) {
				listaRobots.remove(r);
				System.out.println("Eliminado Robot " + r.getId() + " del pedido " + id);
				return true;
			}
		}
		// si llegamos aquí, es que no existía y no se puede eliminar
		System.out.println("Error al eliminar: no se encontró el Robot " + idRobot + " en el pedido " + id);
		return false;
	}

	public void imprimirPedido() {
		System.out.println("Coste del pedido " + id + " (direccionEnvio=" + direccionEnvio + ", fecha=" + fecha + ", idCliente=" + idCliente + ")");
		double precioTotal  = 0;
		for (int i = 0; i < listaRobots.size(); i++) {
			Robot r = listaRobots.get(i);
			precioTotal += r.calcularPrecioVenta();
			System.out.println(" * El robot " + r.getId() + " cuesta " + r.calcularPrecioVenta());
		}
		int porcentajeDescuento = listaRobots.size()/5 * 10;
		if (porcentajeDescuento > 0) {
			System.out.println("El coste total sin descuento es: " + precioTotal);
			double descuento = precioTotal * porcentajeDescuento/100.0;
			precioTotal = precioTotal - descuento;
			System.out.println("Se ha aplicado un descuento del " + porcentajeDescuento + "% : " + descuento);
		}
		System.out.println("El coste total del pedido  es: " + precioTotal);
		System.out.println("---------------------");
	}

	public Date getFecha() {
		return fecha;
	}

	public void setFecha(Date fecha) {
		this.fecha = fecha;
	}

	public int getIdCliente() {
		return idCliente;
	}

	public void setIdCliente(int idCliente) {
		this.idCliente = idCliente;
	}

	public String getDireccionEnvio() {
		return direccionEnvio;
	}

	public void setDireccionEnvio(String direccionEnvio) {
		this.direccionEnvio = direccionEnvio;
	}

	public ArrayList<Robot> getlistaRobots() {
		return listaRobots;
	}

	public void setlistaRobots(ArrayList<Robot> listaRobots) {
		this.listaRobots = listaRobots;
	}

	public int getId() {
		return id;
	}

	public void setId(int id) {
		this.id = id;
	}

	
}
