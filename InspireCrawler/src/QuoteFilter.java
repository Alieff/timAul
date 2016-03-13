import java.io.BufferedReader;
import java.io.File;
import java.io.FileInputStream;
import java.io.InputStreamReader;
import java.io.FileReader;
import java.util.List;
import java.util.regex.Matcher;
import java.util.regex.Pattern;



public class QuoteFilter {

    /**
     * Filter the stirng
     * @return
     */
    public List<Quote> quote(String textDariWebsite){

        //	System.out.println(tagger(textDariWebsite));

        //FOR unix
        String pattern = "(\"\\{.*\\}\\\\NP .*\\{.*\\}\\\\VP\"|\\{.*\\}\\\\NP .*\\{.*\\}\\\\VP)(\\n(-|~|)(.*\\\\People)*|\\s*(-|~)(.*\\\\People)*)";

        //FOR windows
        String pattern2 = "(\"\\{.*\\}\\\\NP .*\\{.*\\}\\\\VP\"|\\{.*\\}\\\\NP .*\\{.*\\}\\\\VP)(\\r\\n(-|~|)(.*\\\\People)*|\\s*(-|~)(.*\\\\People)*)";

        //Filter these out...
        Pattern p = Pattern.compile(pattern2);

        //System.out.println(tagger(textDariWebsite));
        Matcher m = p.matcher(tagger(textDariWebsite));

        while(m.find()){
            System.out.println("Found a quote sentence :\n " + m.group(0));
            //	System.out.println("Total Group : " + m.groupCount());
            for(int i = 0 ; i < m.groupCount(); i++){
                //	System.out.println("Group " + i + " : \n" + m.group(i) );
            }
            System.out.println("Quote : " + m.group(1));
            System.out.println("Author : " + m.group(4));

            System.out.println("--Delete These Tagger!!--");
            String quote = m.group(1);
            String author = m.group(4); //TODO differ for each...

            //TODO MASIH BOROS
            quote = quote.replace("{", "");
            quote = quote.replace("}", "");
            quote = quote.replace("\\NP", "");
            quote = quote.replace("\\VP", "");


            //TODO BOROS JUGA
            author = author.replace("\\People","");
            System.out.println("Clear Quote : " + quote);
            System.out.println("Clear Author : " + author);
        }
        return null;
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
        String str = "jh";
        try{
            File file = new File("test.txt");
            FileInputStream fis = new FileInputStream(file);
            byte[] data = new byte[(int) file.length()];
            fis.read(data);
            fis.close();

            str = new String(data, "UTF-8");
        }
        catch(Exception e){}
        return str;
        //return "\"{Heheheheheh}\\NP {Shahahaahah}\\VP\"\nHaha\\People Hehe\\People";
    }
}