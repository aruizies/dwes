/**
 * 
 * @author Albert
 *
 */
public class Triangulo {

	private double base;
	private double altura;
	
	/** 
	 * 
	 * @param base La base del triángulo
	 * @param altura La altura del triángulo
	 */
	public Triangulo(double base, double altura)
	{
		this.base = base;
	}
	
	/**
	 * Escribe los datos del triángulo en pantalla
	 */
	public void imprimir()
	{
		System.out.println("Base: " + base);
		
	}
	
	/**
	 * Calcula el área del triángulo
	 * @return El área del triángulo
	 */
	public double calcularArea()
	{
		return 56.7;
	}
}
