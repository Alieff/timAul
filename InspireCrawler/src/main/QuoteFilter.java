package main;

import test.SentenceSplitter;

import java.util.ArrayList;
import java.util.List;
import java.util.regex.Matcher;
import java.util.regex.Pattern;



public class QuoteFilter {

    private SentenceTagger sentenceTagger;

    public QuoteFilter(){
        this.sentenceTagger = new SentenceTagger();
    }
    /**
     * Filter the stirng
     * @return
     */
    public List<Quote> getListQuote(String textDariWebsite, String sourceWebsite){
        List<Quote> hasilFilter = new ArrayList<>();

        //FOR unix
        String pattern = "(\"\\{.*\\}\\\\NP .*\\{.*\\}\\\\VP\"|\\{.*\\}\\\\NP .*\\{.*\\}\\\\VP)(\\n(-|~|)(.*\\\\People)*|\\s*(-|~)(.*\\\\People)*)";

        //FOR windows
        String pattern2 = "(\".*\"|.*|)(\\n(-|—|~)(\\s([a-zA-Z]*\\/PERSON\\s*)*)|(-|—|~)(.*\\\\PERSON)+)";

        //Regex For only NER
        String pattern3 = "(\".*\"|.*)(\\n(-|—|~|)\\s*(([a-zA-Z]*\\/PERSON\\s*)+)|(-|—|~)(.*\\\\PERSON)+)";

        //Filter these out...
        Pattern p = Pattern.compile(pattern3);

        //System.out.println(tagger(textDariWebsite));
        //REAL
        String hasilTag = tagger(textDariWebsite);
        //UNTUK TEST
        //SentenceSplitter kunyuk = new SentenceSplitter(sentenceTagger);
        //String hasilTag = kunyuk.kunyuk(textDariWebsite);


        Matcher m = p.matcher(hasilTag);


        while(m.find()){
            String quote = m.group(1);
            String author = m.group(4); //TODO differ for each...
            /*
            //TODO MASIH BOROS
            quote = quote.replace("{", "");
            quote = quote.replace("}", "");
            quote = quote.replace("\\NP", "");
            quote = quote.replace("\\VP", "");


            //TODO BOROS JUGA

            System.out.println("Clear Quote : " + quote);
            System.out.println("Clear Author : " + author);
            */
            quote = quote.replace("/PERSON","");
            author = author.replace("/PERSON","");

            //Avoid blank
            quote = quote.trim();
            author = author.trim();
            if(!quote.isEmpty() && !author.isEmpty()) {
                Quote quoteModel = new Quote(quote, author, sourceWebsite);
                hasilFilter.add(quoteModel);
            }
        }

        return hasilFilter;
    }


    /**
     * Tag the text with structural Tag and PERSON.
     *
     * @param textDariWebsite teks yang berasal dari website
     * @return teks yang sudah di tag
     */
    public String tagger(String textDariWebsite){
        String[] splitter = textDariWebsite.split("\n");


        String textWithTag = "";
        for(int i = 0; i < splitter.length; i++){
            String hasilNer = sentenceTagger.addNer(splitter[i]);
            textWithTag += hasilNer;
            textWithTag += "\n";
        }

        return textWithTag;
    }
}