import com.sun.tools.internal.jxc.ConfigReader;
import edu.uci.ics.crawler4j.crawler.Page;
import edu.uci.ics.crawler4j.crawler.WebCrawler;
import edu.uci.ics.crawler4j.url.WebURL;


import java.util.ArrayList;
import java.util.regex.Pattern;

public class InspireCrawler extends WebCrawler {

    /**
     * FILTER untuk mencegah crawler masuk ke alamat url yang mempunyai extensi yang disebut dibawah
     * Konten website yang tidak mungkin di kunjungi
     */
    private final static Pattern FILTERS = Pattern.compile(".*(\\.(css|js|gif|jpg"
            + "|png|mp3|mp4|zip|gz|pdf))$");

    // Ambil arraylist dari class ConfigReader
    ConfigReader config = new ConfigReader();

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

        //arraylist daftar web yang boleh di crawl
        ArrayList<String> daftarWeb = config.getWebAddress();

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
     * @param page halaman dari website yang sedang dijelajahi
     */
    @Override
    public void visit(Page page) {
        //TODO Buat suruh ngapain


    }
}

