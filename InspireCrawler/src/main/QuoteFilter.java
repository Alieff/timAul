package main;

import java.util.ArrayList;
import java.util.List;
import java.util.regex.Matcher;
import java.util.regex.Pattern;



public class QuoteFilter {

    private SentenceTagger sentenceTagger;

    /**
     * Set the sentence tagger
     */
    public QuoteFilter(){
        this.sentenceTagger = new SentenceTagger();
    }
    /**
     * Filter the string
     * @param sourceWebsite source websitenya
     * @param textDariWebsite teks websitenya
     * @return list semuaquote yang ada di teks tersebut
     */
    public List<Quote> getListQuote(String textDariWebsite, String sourceWebsite){

        List<Quote> hasilFilter = new ArrayList<>();

        //FOR unix file
        //String pattern = "(\"\\{.*\\}\\\\NP .*\\{.*\\}\\\\VP\"|\\{.*\\}\\\\NP .*\\{.*\\}\\\\VP)(\\n(-|~|)(.*\\\\People)*|\\s*(-|~)(.*\\\\People)*)";

        //FOR windows file
        //String pattern2 = "(\".*\"|.*|)(\\n(-|—|~)(\\s([a-zA-Z]*\\/PERSON\\s*)*)|(-|—|~)(.*\\\\PERSON)+)";

        //Regex For only NER
        //String pattern3 = "(\".*\"|.*)(\\n(-|—|~|)\\s*(([a-zA-Z]*\\/PERSON\\s*)+)|(-|—|~)(.*\\\\PERSON)+)";

        //Regex For only NER v2.0
        String pattern4 = "(\"([a-zA-Z]+(\\.|,|;)*\\s*)*\"|.*)(\\n(-|—|~|)\\s*(([a-zA-Z]*\\/PERSON\\s *)+)|(-|—|~)(.*\\\\PERSON)+)";

        //Filter these out...
        Pattern p = Pattern.compile(pattern4);

        //REAL
        String hasilTag = tagger(textDariWebsite);

        // akan memberikan tag VP NP ke textDariWebsite
        SentenceIdentifier sen = new SentenceIdentifier();
        String result = sen.partialIdentify(hasilTag);

        Matcher m = p.matcher(hasilTag);

        //TODO : make regex for NP VP

        while(m.find()){
            String quote = m.group(1);
            String author = m.group(6);

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