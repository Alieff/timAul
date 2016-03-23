import de.l3s.boilerpipe.BoilerpipeProcessingException;
import edu.uci.ics.crawler4j.crawler.Page;
import edu.uci.ics.crawler4j.crawler.WebCrawler;
import edu.uci.ics.crawler4j.parser.HtmlParseData;
import edu.uci.ics.crawler4j.url.WebURL;
import org.apache.http.Header;
import de.l3s.boilerpipe.extractors.KeepEverythingExtractor;
import java.awt.datatransfer.SystemFlavorMap;
import java.util.ArrayList;
import java.util.Set;
import java.util.regex.Pattern;

public class InspireCrawler extends WebCrawler {

    /**
     * FILTER untuk mencegah crawler masuk ke alamat url yang mempunyai extensi yang disebut dibawah
     * Dibawah ini contoh TODO: HAPUS
     * Konten website yang tidak mungkin di kunjungi
     */
    private final static Pattern FILTERS = Pattern.compile(".*(\\.(css|js|gif|jpg"
            + "|png|mp3|mp4|zip|gz|pdf))$");

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
        //TODO: Buat Aturannya
        //Class yang ega buat akan ada banyak list website
        //list website itu dimasukkin ke arraylist dan dicocokan


        //arraylist daftar web yang boleh di crawl
        ArrayList<String> daftarWeb = new ArrayList<String>();
        daftarWeb.add("http://www.facebook.com");
        daftarWeb.add("http://www.twitter.com");

        //web yang akan dikunjungi
        String href = url.getURL().toLowerCase();

        //flag
        boolean yesVisit = false;

        //cek apakah web yang akan dikunjungi ada di list daftar web
        for(int i=0; i<daftarWeb.size(); i++) {
            System.out.println("cek web " + daftarWeb.get(i) + " File boleh dicrawl " + !FILTERS.matcher(href).matches());
            System.out.println("Web boleh dicrawl " + href.startsWith(daftarWeb.get(i)));
            yesVisit = !FILTERS.matcher(href).matches() && href.startsWith(daftarWeb.get(i));

            if(yesVisit == true){
                break;
            }
        }

        System.out.println("Jadiii " + href + " boleh dicrawl = " + yesVisit);
        return yesVisit;
    }

    /**
     * Method ini akan memproses halaman yang sedang dijelajahi
     *
     * @param page halaman dari website yang sedang dijelajahi
     */
    @Override
    public void visit(Page page) {
        //TODO : menggunakan crawler4J untuk mendapatkan html yang dicrawl
        int docid = page.getWebURL().getDocid();
        String url = page.getWebURL().getURL();
        String domain = page.getWebURL().getDomain();
        String path = page.getWebURL().getPath();
        String subDomain = page.getWebURL().getSubDomain();
        String parentUrl = page.getWebURL().getParentUrl();
        String anchor = page.getWebURL().getAnchor();

        logger.debug("Docid: {}", docid);
        logger.info("URL: {}", url);
        logger.debug("Domain: '{}'", domain);
        logger.debug("Sub-domain: '{}'", subDomain);
        logger.debug("Path: '{}'", path);
        logger.debug("Parent page: {}", parentUrl);
        logger.debug("Anchor text: {}", anchor);

        if (page.getParseData() instanceof HtmlParseData) {
            HtmlParseData htmlParseData = (HtmlParseData) page.getParseData();
            String text = htmlParseData.getText();
            String html = htmlParseData.getHtml();
            Set<WebURL> links = htmlParseData.getOutgoingUrls();

            try {
                String extractResult = KeepEverythingExtractor.INSTANCE.getText(html);
            } catch (BoilerpipeProcessingException e) {
                e.printStackTrace();
            }

            /**
             * TODO : 1. Panggil method filter dari class QuoteFIlter sehingga mendapatkan list of quotes
             * TODO : 2. kemudian akan dimasukkan ke database dengan memanggil class database
             *
             *
             */

            logger.debug("Text length: {}", text.length());
            logger.debug("Html length: {}", html.length());
            logger.debug("Number of outgoing links: {}", links.size());
        }

        Header[] responseHeaders = page.getFetchResponseHeaders();
        if (responseHeaders != null) {
            logger.debug("Response headers:");
            for (Header header : responseHeaders) {
                logger.debug("\t{}: {}", header.getName(), header.getValue());
            }
        }

        logger.debug("=============");
    }
}

