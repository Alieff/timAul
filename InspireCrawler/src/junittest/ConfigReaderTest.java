package junittest;


import main.ConfigReader;
import main.Quote;
import main.QuoteFilter;
import org.junit.AfterClass;
import org.junit.Before;
import org.junit.BeforeClass;
import org.junit.Test;
import org.junit.runner.JUnitCore;
import org.junit.runner.Result;
import org.junit.runner.notification.Failure;
import org.junit.runners.Parameterized;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.Collection;
import java.util.List;

import static org.junit.Assert.*;

/**
 * Created by haryoaw on 16/05/16.
 */

public class ConfigReaderTest {
    private ConfigReader configReader;

    @Before
    public void initialize() {
        configReader = new ConfigReader();
    }

    @Test
    public void getPageToCrawlTest() throws Exception {

        assertEquals(-1,configReader.getPageToCrawl());
    }

    @Test
    public void getCrawlDepthTest() throws Exception {
        assertEquals(-1,configReader.getCrawlDepth());
    }

    @Test
    public void getProxyUserTest() throws Exception {
        assertEquals("-1",configReader.getProxyUser());
    }

    @Test
    public void getProxyPassTest() throws Exception {
        assertEquals("-1",configReader.getProxyPass());
    }

    @Test
    public void isResumableTest() throws Exception {
        assertEquals(true,configReader.isResumable());
    }

    @Test
    public void getListWebTest() throws Exception {
        ArrayList<String> expected = new ArrayList<>();
        expected.add("http://www.motivatingquotes.com/");
        expected.add("http://quotelicious.com/");
        expected.add("http://www.brainyquote.com/");
        assertEquals(expected, configReader.getWebAddress());
    }
}
