package main;

import edu.uci.ics.crawler4j.crawler.CrawlConfig;
import edu.uci.ics.crawler4j.crawler.CrawlController;
import edu.uci.ics.crawler4j.fetcher.PageFetcher;
import edu.uci.ics.crawler4j.robotstxt.RobotstxtConfig;
import edu.uci.ics.crawler4j.robotstxt.RobotstxtServer;
import test.TestCrawler;
import java.util.ArrayList;

/**
 * Class ini adalah class untuk memulai crawlernya dan melakukan setting
 * config pada crawler.
 *
 * @author haryoaw
 */


public class CrawlerController {

    /**
     * Memulai crawler dengan aturan yang sudah ditentukan.
     * @param argv parameter config, file, dll
     */
    public static QuoteFilter quoteFilter;

    public static void main(String argv[]) throws Exception {
        String crawlStorageFolder = "data/crawl/root";
        int numberOfCrawlers = 4;

        CrawlConfig config = new CrawlConfig();
        config.setCrawlStorageFolder(crawlStorageFolder);

        /*
         * Instantiate the controller for this crawl.
         */
        PageFetcher pageFetcher = new PageFetcher(config);
        RobotstxtConfig robotstxtConfig = new RobotstxtConfig();
        RobotstxtServer robotstxtServer = new RobotstxtServer(robotstxtConfig, pageFetcher);
        CrawlController controller = new CrawlController(config, pageFetcher, robotstxtServer);
        config.setPolitenessDelay(1000);

        /*
         * For each crawl, you need to add some seed urls. These are the first
         * URLs that are fetched and then the crawler starts following links
         * which are found in these pages
         */
        ConfigReader configReader = new ConfigReader();
        ArrayList<String> listWeb = configReader.getWebAddress();

        for(int i = 0; i < listWeb.size(); i++){
            controller.addSeed(listWeb.get(i));
        }

        config.setResumableCrawling(configReader.isResumable());

        quoteFilter = new QuoteFilter();
        /*
         * Start the crawl. This is a blocking operation, meaning that your code
         * will reach the line after this only when crawling is finished.
         */
        controller.start(InspireCrawler.class, numberOfCrawlers);

        //TESTING
        //controller.start(TestCrawler.class, numberOfCrawlers);
    }
}
