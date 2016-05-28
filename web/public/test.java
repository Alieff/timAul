import java.util.*;
import java.io.*;

public class test{
	public static void main(String argv[]) throws Exception
	{
		System.out.println("Hehe berhasil");
		Thread.sleep(3000332);
		System.out.println("Woi");
		PrintWriter writer = new PrintWriter("/var/www/html/timAul/web/public/tees.txt", "UTF-8");
		writer.println("The first line");
		writer.println("The second line");
		writer.close();
		System.out.println("Masuk ga sih?");
	}	
}
