/**
 * Class LogCrawl yang akan digunakan untuk men-generate log crawler
 * Created by pflarasati on 3/19/16.
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
    private Quote hasilCrawl;

    /**
     * Constructor dari class LogCrawl
     * @param hasilCrawl
     */
    public LogCrawl(Quote hasilCrawl) {
        this.hasilCrawl = hasilCrawl;
    }

    /**
     * Method untuk mengambil quote hasil crawl
     * @param hasilCrawl
     */
    public void setHasilCrawl(Quote hasilCrawl) {
        this.hasilCrawl = hasilCrawl;
    }

    /**
     * Method untuk mengupdate quote hasil crawl
     * @return Quote hasilCrawl
     */
    public Quote getHasilCrawl() {
        return hasilCrawl;
    }

    /**
     * Method ini digunakan untuk membuat log_results.txt berisi log aktivitas crawler
     * @return void
     */
    public void getLogFile(){
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
            pw.close();

        } catch(IOException ioe){
            System.out.println("Exception occurred:");
            ioe.printStackTrace();
        }

    }
}
