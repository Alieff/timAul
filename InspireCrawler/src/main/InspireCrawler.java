package main;

import de.l3s.boilerpipe.BoilerpipeProcessingException;
import edu.uci.ics.crawler4j.crawler.Page;
import edu.uci.ics.crawler4j.crawler.WebCrawler;
import edu.uci.ics.crawler4j.parser.HtmlParseData;
import edu.uci.ics.crawler4j.url.WebURL;
import de.l3s.boilerpipe.extractors.KeepEverythingExtractor;

import java.util.ArrayList;
import java.util.List;
import java.util.Set;
import java.util.regex.Pattern;

public class InspireCrawler extends WebCrawler {

    /**
     * FILTER untuk mencegah crawler masuk ke alamat url yang mempunyai extensi yang disebut dibawah
     * Dibawah ini contoh
     * Konten website yang tidak mungkin di kunjungi
     */
    private final static Pattern FILTERS = Pattern.compile(".*(\\.(css|js|gif|jpg"
            + "|png|mp3|mp4|zip|gz|pdf))$");


     private LogCrawl logCrawl;
     private DBConnect dbConnect;
     private ConfigReader configReader;
     private QuoteFilter quoteFilter;

    /**
     * Constructor
     */
    public InspireCrawler (){
        this.quoteFilter =  CrawlerController.quoteFilter;
        this.logCrawl = new LogCrawl();
        this.dbConnect = new DBConnect();
        this.configReader = new ConfigReader();
    }
    /**
     * Disini adalah aturan dari crawler untuk dapat mengakses web yang akan dijelajahi.
     * Baca config dengan menginisialisasi class config yang dibuat EGA
     * Buat batasan konten yang crawler bisa baca untuk Pattern FILTERS
     * @param referringPage page halaman yang merefer ke url
     * @param url page halaman yang akan dikunjungi
     * @return apakah boleh menuju halaman
     */
    @Override
    public boolean shouldVisit(Page referringPage, WebURL url) {



        //arraylist daftar web yang boleh di crawl
        ArrayList<String> daftarWeb = configReader.getWebAddress();

        //web yang akan dikunjungi
        String href = url.getURL().toLowerCase();

        //flag
        boolean yesVisit = false;

        //cek apakah web yang akan dikunjungi ada di list daftar web
        for(int i=0; i<daftarWeb.size(); i++) {
            yesVisit = !FILTERS.matcher(href).matches() && href.startsWith(daftarWeb.get(i));

            if(yesVisit == true){
                break;
            }
        }

        return yesVisit;
    }

    /**
     * Method ini akan memproses halaman yang sedang dijelajahi
     *
     * @param page halaman dari website yang sedang dijelajahi
     */
    @Override
    public void visit(Page page) {

        if (page.getParseData() instanceof HtmlParseData) {
            String url = page.getWebURL().getURL();
            HtmlParseData htmlParseData = (HtmlParseData) page.getParseData();
            String text = htmlParseData.getText();
            String html = htmlParseData.getHtml();
            Set<WebURL> links = htmlParseData.getOutgoingUrls();
            String textExtracted = "";
            try {
                textExtracted = KeepEverythingExtractor.INSTANCE.getText(html);
                //System.out.println(textExtracted);
            } catch (BoilerpipeProcessingException e) {
                e.printStackTrace();
            }

            List<Quote> listQuote = quoteFilter.getListQuote(textExtracted,url);


            //System.out.println("Terdapat " + listQuote.size() + " Quote disini");
            //Add to database & put log
            for(int i = 0; i < listQuote.size(); i++){
                Quote tempQuote = listQuote.get(i);
                //System.out.println("Masuk " + tempQuote.getAuthor());
                dbConnect.putData(tempQuote);
                logCrawl.getLogFile(tempQuote);


                System.out.println("The crawler is still running...CTRL + C to STOP");
            }

            System.out.println("The crawler is still running...CTRL + C to STOP");
        }

        logger.debug("=============");
    }
}