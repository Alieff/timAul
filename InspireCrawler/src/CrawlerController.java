import edu.uci.ics.crawler4j.crawler.Page;
import edu.uci.ics.crawler4j.crawler.WebCrawler;
import edu.uci.ics.crawler4j.url.WebURL;

/**
 *
 *
 *
 */


public class CrawlerController {

    /**
     * Memulai crawler dengan aturan yang sudah ditentukan.
     * @param argv parameter config, file, dll TODO: FIX INI
     */
    public static void main(String argv[]){
        //TODO: Initiate Crawler
        InspireCrawler testCraw = new InspireCrawler();


        WebURL coba = new WebURL();
        coba.setURL("http://www.dftft.com/dfsafs.html");

        Page test = new Page(new WebURL());
        testCraw.shouldVisit(test,coba);

        Quote contohQuote = new Quote("Jangan lupa berdoa","anon","www.google.com");
        Quote contoh2 = new Quote("Jangan lupa ya","anon","www.google.com");
        LogCrawl logCrawl = new LogCrawl(contohQuote);
        LogCrawl logCrawl2 = new LogCrawl(contoh2);
        logCrawl2.getLogFile();
        logCrawl.getLogFile();


    }
}
