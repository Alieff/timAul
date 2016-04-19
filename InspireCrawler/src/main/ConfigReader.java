package main;
import java.io.*;

import java.util.ArrayList;

/**
 *
 * @author kevin.ega
 */
public class ConfigReader {
    
    private int pageToCrawl;
    private int crawlDepth;
    private String proxyUser;
    private String proxyPass;
    private boolean resumable;
    private ArrayList<String> webAddress;


    /**
     * Constructor for config reader
	 */
	public ConfigReader(){
        String line;
        ArrayList<String> result = new ArrayList<>();
        final String CONFIG = "config.txt";

        try {

            //File Reader to read the CONFIG
            FileReader fileReader = new FileReader(CONFIG);
            BufferedReader bufferedReader = new BufferedReader(fileReader);

            //with buffered reader read each line and add to ArrayList result
            while((line = bufferedReader.readLine()) != null) {
                result.add(line);
            }

            //set nilai-nilai CONFIG dengan file hasil baca
            pageToCrawl = Integer.parseInt(result.get(0).substring(12));
            crawlDepth = Integer.parseInt(result.get(1).substring(11));
            String[] proxy = result.get(2).substring(6).split(",");
            proxyUser = proxy[0];
            proxyPass = proxy[1];
            resumable = Boolean.parseBoolean(result.get(3).substring(12));
           
            webAddress = new ArrayList<>();
            
            for (int i = 5; i< result.size(); i++){
                webAddress.add((result.get(i)));
            }
            bufferedReader.close();     

        }catch(FileNotFoundException ex) {
            System.out.println(
                "Unable to open file '" +
                        CONFIG + "'");
        }
        catch(IOException ex) {
            System.out.println(
                "Error reading file '" 
                + CONFIG + "'");                  
        }
	}
    
    public int getPageToCrawl()
    {
        return pageToCrawl;
    }

    public int getCrawlDepth() {
        return crawlDepth;
    }

    public String getProxyUser() {
        return proxyUser;
    }


    public String getProxyPass() {
        return proxyPass;
    }


    public boolean isResumable() {
        return resumable;
    }
    
    public ArrayList<String> getWebAddress(){
    	return webAddress;
    }
}
