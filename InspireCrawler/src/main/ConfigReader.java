package main;/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
import java.io.*;
import static java.lang.Integer.parseInt;
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
    private ArrayList<String> result; 
    private ArrayList<String> webAddress;
    String line;
    final String CONFIG = "main/config.txt";
    
    //Read CONFIG with parameter CONFIG
	
	public ConfigReader(){
		line = "";
        result = new ArrayList<String>();
        try {
            /*
            * File Reader to read the CONFIG
            */
            FileReader fileReader = new FileReader(CONFIG);
            BufferedReader bufferedReader;
            bufferedReader = new BufferedReader(fileReader);
            //with buffered reader read each line and add to ArrayList result
            while((line = bufferedReader.readLine()) != null) {
                result.add(line);
            }
            //set nilai-nilai CONFIG dengan file hasil baca
            pageToCrawl = parseInt(result.get(0).substring(12));
            crawlDepth = parseInt(result.get(1).substring(11));
            String[] proxy;
            proxy = ((String)result.get(2)).substring(6).split(",");
            proxyUser = proxy[0];
            proxyPass = proxy[1];
            resumable = Boolean.parseBoolean(result.get(3).substring(12));
           
            webAddress = new ArrayList();
            
            for (int i = 5;i<result.size();i++){
                webAddress.add((String)(result.get(i)));
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

    public void setPageToCrawl(int pageToCrawl) {
        this.pageToCrawl = pageToCrawl;
    }

    public int getCrawlDepth() {
        return crawlDepth;
    }

    public void setCrawlDepth(int crawlDepth) {
        this.crawlDepth = crawlDepth;
    }

    public String getProxyUser() {
        return proxyUser;
    }

    public void setProxyUser(String proxyUser) {
        this.proxyUser = proxyUser;
    }

    public String getProxyPass() {
        return proxyPass;
    }

    public void setProxyPass(String proxyPass) {
        this.proxyPass = proxyPass;
    }

    public boolean isResumable() {
        return resumable;
    }

    public void setResumable(boolean resumable) {
        this.resumable = resumable;
    }
    
    public ArrayList<String> getWebAddress(){
    	return webAddress;
    }
}
