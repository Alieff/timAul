package junittest;

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
 * Created by haryoaw on 03/05/16.
 */
public class QuoteFilterTest {
    private QuoteFilter quoteFilter;
    private String textDariWebsite;
    private String sourceWebsite;
    private List expectedGetListQuote;
    private String expectedTagger;
    @Before
    public void initialize() {
        System.out.println("in before class");
        Quote quote = new Quote("See that star", "John", "aweea");
        List<Quote> listtc1 = new ArrayList<>();
        listtc1.add(quote);
        System.out.println(listtc1.size());
        quoteFilter = new QuoteFilter();
    }

    public QuoteFilterTest(){
        this.textDariWebsite = textDariWebsite;
        this.sourceWebsite = sourceWebsite;
        this.expectedGetListQuote = expectedGetListQuote;
        this.expectedTagger = expectedTagger;
    }



    @Test
    public void getListQuoteTC1() throws Exception {
        String website = "ngaco.com";
        String tc1Text = "See that star -John";
        Quote quote = new Quote("See that star", "John", website);
        List<Quote> listtc1 = new ArrayList<>();
        listtc1.add(quote);
        assertEquals(listtc1,quoteFilter.getListQuote(tc1Text,website));
    }

    @Test
    public void getListQuoteTC2() throws Exception {
        String website = "ngaco.com";
        String tc1Text = "";

        List<Quote> listtc1 = new ArrayList<>();

        //Expected zero
        assertEquals(listtc1,quoteFilter.getListQuote(tc1Text,website));
    }
}