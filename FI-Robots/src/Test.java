
public class Test {

	public static void main(String [] args) {
		Sensor s1 = new Sensor("LG", 100, 1, "Giroscopio", 20.1 );
		Sensor s2 = new Sensor("Motorola", 200, 4, "Acelerómetro", 30.5 );
		
		s1.printInfo();
		s2.printInfo();
		
	}
	
}
