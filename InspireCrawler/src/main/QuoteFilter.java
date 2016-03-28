package main;

import java.util.ArrayList;
import java.util.List;
import java.util.regex.Matcher;
import java.util.regex.Pattern;



public class QuoteFilter {

    private SentenceIdentifier sentenceIdentifier;

    public QuoteFilter(){
        this.sentenceIdentifier = new SentenceIdentifier();
    }
    /**
     * Filter the stirng
     * @return
     */
    public List<Quote> getListQuote(String textDariWebsite, String sourceWebsite){
        List<Quote> hasilFilter = new ArrayList<>();
        //	System.out.println(tagger(textDariWebsite));

        //FOR unix
        String pattern = "(\"\\{.*\\}\\\\NP .*\\{.*\\}\\\\VP\"|\\{.*\\}\\\\NP .*\\{.*\\}\\\\VP)(\\n(-|~|)(.*\\\\People)*|\\s*(-|~)(.*\\\\People)*)";

        //FOR windows
        String pattern2 = "(\".*\"|.*|)(\\n(-|—|~)(\\s([a-zA-Z]*\\/PERSON\\s*)*)|(-|—|~)(.*\\\\PERSON)+)";

        //Regex For only NER
        String pattern3 = "(\".*\"|.*)(\\n(-|—|~|)\\s*(([a-zA-Z]*\\/PERSON\\s*)+)|(-|—|~)(.*\\\\PERSON)+)";

        //Filter these out...
        Pattern p = Pattern.compile(pattern3);

        //System.out.println(tagger(textDariWebsite));
        Matcher m = p.matcher(tagger(textDariWebsite));

        while(m.find()){
      //      System.out.println("Found a quote sentence :\n " + m.group(0));
            //	System.out.println("Total Group : " + m.groupCount());
            for(int i = 0 ; i < m.groupCount(); i++){
                //	System.out.println("Group " + i + " : \n" + m.group(i) );
            }
            //System.out.println("Quote : " + m.group(1));
            //System.out.println("Author : " + m.group(4));

           // System.out.println("--Delete These Tagger!!--");
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
            author = author.replace("/PERSON","");
            Quote quoteModel = new Quote(quote,author,sourceWebsite);
            hasilFilter.add(quoteModel);
        }

        return hasilFilter;
    }


    public String tagger(String textDariWebsite){
		/*String webText = textDariWebsite;
		String ambil = "";
		try{
			BufferedReader reader = new BufferedReader(new FileReader("test.txt"));
			while(( ambil = reader.readLine()) != null){
				webText += ambil;
			}
		}
		catch (Exception e){}
		return webText;*/
        /*String str = "jh";
        try{
            File file = new File("test.txt");
            FileInputStream fis = new FileInputStream(file);
            byte[] data = new byte[(int) file.length()];
            fis.read(data);
            fis.close();

            str = new String(data, "UTF-8");
        }
        catch(Exception e){}*/

        return sentenceIdentifier.addNer(textDariWebsite);
        //return "\"{Heheheheheh}\\NP {Shahahaahah}\\VP\"\nHaha\\People Hehe\\People";
    }
}