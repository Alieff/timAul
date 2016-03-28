/*
* @ KEVIN EGA PRATAMA
*/
import java.io.*;
import static java.lang.Integer.parseInt;
import java.util.ArrayList;
import java.util.Arrays;
public class myReader {
    public static void main(String [] args) {
   
        String fileName = "config.txt";
        String line = null;

        try {
            FileReader fileReader = new FileReader(fileName);
            
            BufferedReader bufferedReader;
            bufferedReader = new BufferedReader(fileReader);
            
            ArrayList<String> result = new ArrayList();
            while((line = bufferedReader.readLine()) != null) {
                result.add(line);
            }
            
            int pageToCrawl = parseInt(result.get(0));
            int crawlDepth = parseInt(result.get(1));
            String[] proxy;
            proxy = ((String)result.get(2)).split(",");
            String proxyUser = proxy[0];
            String proxyPass = proxy[1];
            boolean resumable = Boolean.parseBoolean(result.get(3));
           
            ArrayList<String> webAddress = new ArrayList();
            
            for (int i = 4;i<result.size();i++){
                webAddress.add((String)(result.get(i)));
            }
          //  System.out.println(pageToCrawl);
            //System.out.println(crawlDepth);
            //System.out.println(proxyUser);
            //System.out.println(proxyPass);
            //System.out.println(resumable);
            for(int i = 0; i < webAddress.size();i++){

              //  System.out.println(webAddress.get(i));
            }
            
            bufferedReader.close();         
        }
        catch(FileNotFoundException ex) {
            System.out.println(
                "Unable to open file '" + 
                fileName + "'");                
        }
        catch(IOException ex) {
            System.out.println(
                "Error reading file '" 
                + fileName + "'");                  
        }
    }
}
