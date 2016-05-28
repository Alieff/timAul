package junittest;

import edu.uci.ics.crawler4j.crawler.Page;
import edu.uci.ics.crawler4j.url.WebURL;
import main.SentenceTagger;
import org.junit.Before;
import org.junit.Test;
import main.InspireCrawler;

import static org.junit.Assert.assertEquals;

/**
 * Created by haryoaw on 16/05/16.
 */
public class InspireCrawlerTest {
    private InspireCrawler inspireCrawler;
    @Before
    public void initialize() {
        inspireCrawler = new InspireCrawler();
    }

    @Test
    public void shouldVisitMustTrue() throws Exception {
        //IF there is a person thereee
        WebURL urlRefer = new WebURL();
        urlRefer.setURL("http://www.kunyuk.com/");
        Page referringPage = new Page(urlRefer);
        WebURL urlTo = new WebURL();
        urlTo.setURL("http://quotelicious.com/");

        assertEquals(true,inspireCrawler.shouldVisit(referringPage,urlTo));

    }

    @Test
    public void shouldVisitMustFalse() throws Exception {

        WebURL urlRefer = new WebURL();
        urlRefer.setURL("http://www.kunyuk.com/");
        Page referringPage = new Page(urlRefer);
        WebURL urlTo = new WebURL();
        urlTo.setURL("http://www.aliefkabur.com/");

        assertEquals(false,inspireCrawler.shouldVisit(referringPage,urlTo));
    }
}
