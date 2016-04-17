package main; /**
 * Class LogCrawl yang akan digunakan untuk men-generate log crawler
 * Created by pflarasati on 3/19/16.
 */

/**
 * @author pflarasati
 * Created on 3/19/16.
 * Updated on 26/03/2016
 *
 * Class LogCrawl
 * Class ini adalah class untuk merepresentasikan log hasil kerja crawler
 * Class ini bertujuan untuk mengenerate log dari hasil kerja crawler
 *
 */
import java.io.File;
import java.io.FileWriter;
import java.io.PrintWriter;
import java.io.BufferedWriter;
import java.io.IOException;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.Calendar;

public class LogCrawl {

    /**
     * Constructor dari class LogCrawls
     */
    public LogCrawl() {}

    /**
     * Methof getLogFile()
     * Method ini digunakan untuk membuat log_results.txt berisi log aktivitas crawler
     * @return void
     */
    public void getLogFile(Quote hasilCrawler){
        Quote hasilCrawl = hasilCrawler;
        try{
            File file =new File("../log_results.txt");
            if(!file.exists()){
                file.createNewFile();
            }
            FileWriter fw = new FileWriter(file,true);
            BufferedWriter bw = new BufferedWriter(fw);
            PrintWriter pw = new PrintWriter(bw);
            //This will add a new line to the file content
            pw.println("");

            // Add text to log results
            DateFormat dateFormat = new SimpleDateFormat("yyyy/MM/dd HH:mm:ss");
            Calendar cal = Calendar.getInstance();
            pw.println(cal.getTime()); //2014/08/06 16:00:22
            pw.println("Quotes : " + hasilCrawl.getQuote());
            pw.println("Author : " + hasilCrawl.getAuthor());
            pw.println("Source : " + hasilCrawl.getSource());

            System.out.println(cal.getTime()); //2014/08/06 16:00:22
            System.out.println("Quotes : " + hasilCrawl.getQuote());
            System.out.println("Author : " + hasilCrawl.getAuthor());
            System.out.println("Source : " + hasilCrawl.getSource());

            System.out.println();

            pw.close();

        } catch(IOException ioe){
            System.out.println("Exception occurred:");
            ioe.printStackTrace();
        }

    }
}
