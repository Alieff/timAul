import edu.uci.ics.crawler4j.crawler.Page;
import edu.uci.ics.crawler4j.crawler.WebCrawler;
import edu.uci.ics.crawler4j.url.WebURL;

import java.util.regex.Pattern;

public class InspireCrawler extends WebCrawler {

    /**
     * FILTER untuk mencegah crawler masuk ke alamat url yang mempunyai extensi yang disebut dibawah
     * Dibawah ini contoh TODO: HAPUS
     */
    private final static Pattern FILTERS = Pattern.compile(".*(\\.(css|js|gif|jpg"
            + "|png|mp3|mp3|zip|gz))$");

    /**
     * Disini adalah aturan dari crawler untuk dapat mengakses web yang akan dijelajahi.
     *
     * @param referringPage page halaman yang merefer ke url
     * @param url page halaman yang akan dikunjungi
     * @return apakah boleh menuju halaman
     */
    @Override
    public boolean shouldVisit(Page referringPage, WebURL url) {
        //TODO: Buat Aturannya
        return false;
    }

    /**
     * Method ini akan memproses halaman yang sedang dijelajahi
     *
     * @param page halaman dari website yang sedang dijelajahi
     */
    @Override
    public void visit(Page page) {
        //TODO Buat suruh ngapain
    }
}
