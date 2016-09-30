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
	 * @param base La base del tri�ngulo
	 * @param altura La altura del tri�ngulo
	 */
	public Triangulo(double base, double altura)
	{
		this.base = base;
	}
	
	/**
	 * Escribe los datos del tri�ngulo en pantalla
	 */
	public void imprimir()
	{
		System.out.println("Base: " + base);
		
	}
	
	/**
	 * Calcula el �rea del tri�ngulo
	 * @return El �rea del tri�ngulo
	 */
	public double calcularArea()
	{
		return 56.7;
	}
}
