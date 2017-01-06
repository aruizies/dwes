package servlets;

import java.util.ArrayList;

public class PruebaStream {

	public static void main(String[] args)
	{
		
		
  	ArrayList<String> nombres = new ArrayList<String>();
  	nombres.add("Julia");
  	nombres.add("Ana");
  	nombres.add("Sergio");
  	nombres.add("Alberto");
  	
  	nombres.stream()
  		.filter(s -> s.startsWith("A"))
  		.map(String::toUpperCase)
  		.sorted()
  		.forEach(s -> System.out.println(s + ";"));
	}
	
	

}
